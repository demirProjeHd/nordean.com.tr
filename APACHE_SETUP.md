# NORDEAN - Apache Hızlı Kurulum Kılavuzu

## 🚀 Apache ile Kurulum Komutları

### 1. Repository'yi Clone Et (veya Pull)

```bash
cd /var/www/html/nordean.com.tr
sudo chown -R $USER:$USER /var/www/html/nordean.com.tr
git pull origin master

# VEYA ilk kez clone ediyorsan:
# cd /var/www/html
# git clone https://github.com/demirProjeHd/nordean.com.tr.git
```

### 2. Composer Install

```bash
cd /var/www/html/nordean.com.tr
composer install --optimize-autoloader --no-dev
```

### 3. Environment Ayarları

```bash
# .env dosyasını oluştur
cp .env.production .env

# .env dosyasını düzenle
nano .env
```

**Düzenlenmesi Gereken:**
- `DB_DATABASE=nordean_db`
- `DB_USERNAME=nordean_user`
- `DB_PASSWORD=YourPassword`
- `MAIL_HOST=smtp.example.com`
- `MAIL_USERNAME=info@nordean.com.tr`
- `MAIL_PASSWORD=YourMailPassword`

### 4. APP_KEY Generate

```bash
php artisan key:generate
```

### 5. Database Oluştur ve Migrate

```bash
# MySQL'e bağlan
mysql -u root -p

# Database oluştur
CREATE DATABASE nordean_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'nordean_user'@'localhost' IDENTIFIED BY 'YourPassword';
GRANT ALL PRIVILEGES ON nordean_db.* TO 'nordean_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;

# Migration'ları çalıştır
php artisan migrate --force
```

### 6. Apache Virtual Host Yapılandırması

```bash
# Eski konfigürasyonu yedekle
sudo cp /etc/apache2/sites-available/nordean.com.tr.conf /etc/apache2/sites-available/nordean.com.tr.conf.backup

# Yeni konfigürasyonu kopyala
sudo cp apache-vhost.conf /etc/apache2/sites-available/nordean.com.tr.conf

# Gerekli Apache modüllerini aktifleştir
sudo a2enmod rewrite
sudo a2enmod ssl
sudo a2enmod headers
sudo a2enmod expires
sudo a2enmod proxy_fcgi

# Virtual host'u aktifleştir
sudo a2ensite nordean.com.tr.conf

# Apache test
sudo apache2ctl configtest

# Apache restart
sudo systemctl restart apache2
```

### 7. İzinleri Ayarla

```bash
# Ownership ayarla
sudo chown -R www-data:www-data /var/www/html/nordean.com.tr
sudo chown -R www-data:www-data storage bootstrap/cache

# İzinleri ayarla
sudo chmod -R 775 storage bootstrap/cache
sudo chmod -R 755 /var/www/html/nordean.com.tr
```

### 8. Cache ve Optimize

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### 9. SSL Kurulumu (Let's Encrypt)

```bash
# Certbot kur
sudo apt update
sudo apt install certbot python3-certbot-apache -y

# SSL sertifikası al (Apache otomatik yapılandırır)
sudo certbot --apache -d nordean.com.tr -d www.nordean.com.tr

# Email gir ve soruları cevapla
# Certbot otomatik olarak apache config'i güncelleyecek

# Auto-renewal test
sudo certbot renew --dry-run
```

## ✅ Test Et

```bash
# Apache status
sudo systemctl status apache2

# Apache logs
sudo tail -f /var/log/apache2/nordean_error.log
sudo tail -f storage/logs/laravel.log
```

**Tarayıcıda Test:**
- http://nordean.com.tr (HTTPS'e redirect olmalı)
- https://nordean.com.tr
- https://www.nordean.com.tr

## 🔧 Troubleshooting

### 500 Internal Server Error

```bash
# Laravel logs kontrol
tail -f storage/logs/laravel.log

# Apache error logs
sudo tail -f /var/log/apache2/nordean_error.log

# .env kontrol
cat .env | grep APP_KEY

# APP_KEY yoksa generate et
php artisan key:generate

# Cache temizle
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### 403 Forbidden

```bash
# İzinleri kontrol et
sudo chown -R www-data:www-data /var/www/html/nordean.com.tr
sudo chmod -R 755 /var/www/html/nordean.com.tr
sudo chmod -R 775 storage bootstrap/cache

# Apache user kontrol
ps aux | grep apache2
```

### mod_rewrite hatası

```bash
# mod_rewrite enabled mi?
sudo a2enmod rewrite
sudo systemctl restart apache2
```

### SSL hatası

```bash
# SSL certificates kontrol
sudo certbot certificates

# SSL modülü enabled mi?
sudo a2enmod ssl
sudo systemctl restart apache2
```

## 📝 Önemli Notlar

1. **PHP Version**: PHP 8.1 kullanıyoruz
2. **Database**: MySQL/MariaDB kurulu olmalı
3. **Composer**: Global olarak kurulu olmalı
4. **Apache Modülleri**: Yukarıdaki modüller aktif olmalı

## 🔄 Güncelleme

```bash
cd /var/www/html/nordean.com.tr
git pull origin master
composer install --optimize-autoloader --no-dev
php artisan migrate --force
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
sudo systemctl restart apache2
```

## 📞 Log Dosyaları

1. Apache error log: `/var/log/apache2/nordean_error.log`
2. Apache access log: `/var/log/apache2/nordean_access.log`
3. Laravel log: `storage/logs/laravel.log`

## 🔒 Güvenlik Kontrol Listesi

- [ ] .env dosyası web'den erişilemiyor
- [ ] APP_DEBUG=false (production)
- [ ] HTTPS çalışıyor
- [ ] Security headers aktif
- [ ] Directory listing kapalı
- [ ] Storage/cache izinleri doğru (775)

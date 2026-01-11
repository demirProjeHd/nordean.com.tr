# NORDEAN - Nginx Hızlı Kurulum Kılavuzu

## 🚀 Hızlı Kurulum Komutları

### 1. Repository'yi Clone Et

```bash
cd /var/www/html
sudo git clone https://github.com/demirProjeHd/nordean.com.tr.git
cd nordean.com.tr
```

### 2. Ownership ve Git Safe Directory

```bash
# Ownership düzelt
sudo chown -R $USER:$USER /var/www/html/nordean.com.tr

# Git safe directory ekle (gerekirse)
git config --global --add safe.directory /var/www/html/nordean.com.tr
```

### 3. Composer Install

```bash
composer install --optimize-autoloader --no-dev
```

### 4. Environment Ayarları

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

### 5. APP_KEY Generate

```bash
php artisan key:generate
```

### 6. Database Oluştur ve Migrate

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

### 7. Nginx Yapılandırması

```bash
# Nginx config'i kopyala
sudo cp nginx.conf /etc/nginx/sites-available/nordean.com.tr

# Symlink oluştur
sudo ln -s /etc/nginx/sites-available/nordean.com.tr /etc/nginx/sites-enabled/

# Default site'ı kaldır (gerekirse)
sudo rm /etc/nginx/sites-enabled/default

# Nginx test
sudo nginx -t

# Nginx restart
sudo systemctl restart nginx
```

### 8. PHP-FPM Ayarları

```bash
# PHP-FPM başlat ve enable et
sudo systemctl start php8.1-fpm
sudo systemctl enable php8.1-fpm
sudo systemctl status php8.1-fpm
```

### 9. İzinleri Ayarla

```bash
# Ownership ayarla
sudo chown -R www-data:www-data /var/www/html/nordean.com.tr
sudo chown -R www-data:www-data storage bootstrap/cache

# İzinleri ayarla
sudo chmod -R 775 storage bootstrap/cache
sudo chmod -R 755 /var/www/html/nordean.com.tr
```

### 10. Cache ve Optimize

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### 11. SSL Kurulumu (Let's Encrypt)

```bash
# Certbot kur
sudo apt update
sudo apt install certbot python3-certbot-nginx -y

# SSL sertifikası al (Nginx otomatik yapılandırır)
sudo certbot --nginx -d nordean.com.tr -d www.nordean.com.tr

# Email gir ve soruları cevapla
# Certbot otomatik olarak nginx.conf'u SSL için güncelleyecek

# Auto-renewal test
sudo certbot renew --dry-run
```

## ✅ Test Et

```bash
# Nginx status
sudo systemctl status nginx

# PHP-FPM status
sudo systemctl status php8.1-fpm

# Logs
sudo tail -f /var/log/nginx/nordean_error.log
sudo tail -f storage/logs/laravel.log
```

**Tarayıcıda Test:**
- http://nordean.com.tr
- http://www.nordean.com.tr
- https://nordean.com.tr (SSL kurulumundan sonra)

## 🔧 Troubleshooting

### 502 Bad Gateway

```bash
# PHP-FPM çalışıyor mu?
sudo systemctl status php8.1-fpm

# PHP-FPM başlat
sudo systemctl start php8.1-fpm

# Socket path kontrol
ls -la /var/run/php/php8.1-fpm.sock
```

### 403 Forbidden

```bash
# İzinleri kontrol et
sudo chown -R www-data:www-data /var/www/html/nordean.com.tr
sudo chmod -R 755 /var/www/html/nordean.com.tr
sudo chmod -R 775 storage bootstrap/cache
```

### 500 Internal Server Error

```bash
# Laravel logs
tail -f storage/logs/laravel.log

# .env kontrol
cat .env | grep APP_KEY

# APP_KEY yoksa generate et
php artisan key:generate

# Cache temizle
php artisan cache:clear
php artisan config:clear
```

## 📝 Önemli Notlar

1. **PHP Version**: PHP 8.1 kullanıyoruz. Eğer farklı versiyonsa:
   - nginx.conf'ta `php8.1-fpm.sock` kısmını güncelleyin
   - `php8.x-fpm` komutlarını güncelleyin

2. **Database**: MySQL/MariaDB kurulu olmalı

3. **Composer**: Global olarak kurulu olmalı

4. **Nginx ve PHP-FPM**: İkisi de çalışır durumda olmalı

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
```

## 📞 Destek

Sorun yaşarsan:
1. Nginx error log: `/var/log/nginx/nordean_error.log`
2. Laravel log: `storage/logs/laravel.log`
3. PHP-FPM log: `/var/log/php8.1-fpm.log`

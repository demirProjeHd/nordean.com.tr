# NORDEAN Website Deployment Guide

## Sunucu Gereksinimleri
- PHP 8.1.28 veya üzeri
- MySQL 5.7+ veya MariaDB 10.3+
- Composer
- Git
- Apache/Nginx web server

## Deployment Adımları

### 1. Repository'yi Sunucuya Clone Et

```bash
cd /var/www/html
git clone https://github.com/demirProjeHd/nordean.com.tr.git
cd nordean.com.tr
```

### 2. Composer Dependencies Kur

```bash
composer install --optimize-autoloader --no-dev
```

### 3. Environment Dosyasını Yapılandır

```bash
# .env.production dosyasını .env olarak kopyala
cp .env.production .env

# Aşağıdaki ayarları düzenle:
nano .env
```

**Düzenlenmesi Gereken Ayarlar:**

```env
# Veritabanı Ayarları
DB_DATABASE=nordean_db
DB_USERNAME=nordean_user
DB_PASSWORD=GERCEK_VERITABANI_SIFRESI

# Mail Ayarları (SMTP)
MAIL_HOST=smtp.nordean.com.tr
MAIL_PORT=587
MAIL_USERNAME=info@nordean.com.tr
MAIL_PASSWORD=GERCEK_MAIL_SIFRESI
MAIL_ENCRYPTION=tls
```

### 4. Application Key Generate Et

```bash
php artisan key:generate
```

### 5. Storage ve Cache Klasör İzinlerini Ayarla

```bash
# Apache kullanıcısı için
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# Nginx kullanıcısı için (alternatif)
# sudo chown -R nginx:nginx storage bootstrap/cache
# sudo chmod -R 775 storage bootstrap/cache
```

### 6. Veritabanı Migration'larını Çalıştır

```bash
# Önce veritabanını oluştur
mysql -u root -p
CREATE DATABASE nordean_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'nordean_user'@'localhost' IDENTIFIED BY 'GERCEK_SIFRE';
GRANT ALL PRIVILEGES ON nordean_db.* TO 'nordean_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;

# Migration'ları çalıştır
php artisan migrate --force
```

### 7. Production Optimizasyonları

```bash
# Config cache
php artisan config:cache

# Route cache
php artisan route:cache

# View cache
php artisan view:cache

# Optimize
php artisan optimize
```

### 8. Apache Virtual Host Yapılandırması

```apache
<VirtualHost *:80>
    ServerName nordean.com.tr
    ServerAlias www.nordean.com.tr
    DocumentRoot /var/www/html/nordean.com.tr/public

    <Directory /var/www/html/nordean.com.tr/public>
        AllowOverride All
        Require all granted
        Options -Indexes +FollowSymLinks
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/nordean_error.log
    CustomLog ${APACHE_LOG_DIR}/nordean_access.log combined
</VirtualHost>
```

```bash
# Virtual host'u aktifleştir
sudo a2ensite nordean.conf
sudo a2enmod rewrite
sudo systemctl restart apache2
```

### 9. SSL Sertifikası Kurulumu (Let's Encrypt)

```bash
# Certbot kur
sudo apt install certbot python3-certbot-apache

# SSL sertifikası al
sudo certbot --apache -d nordean.com.tr -d www.nordean.com.tr

# Auto-renewal test et
sudo certbot renew --dry-run
```

### 10. Güvenlik Ayarları

**.htaccess** dosyasına ekle (public klasörü):

```apache
# Disable directory listing
Options -Indexes

# Protect .env file
<Files .env>
    Order allow,deny
    Deny from all
</Files>

# Force HTTPS
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

## Güncelleme Adımları

```bash
cd /var/www/html/nordean.com.tr

# Git pull
git pull origin master

# Composer update
composer install --optimize-autoloader --no-dev

# Cache temizle ve yeniden oluştur
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Yeniden cache oluştur
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Migration'ları çalıştır (gerekirse)
php artisan migrate --force
```

## İletişim Formu Test

Test için:

```bash
# Mail ayarlarını test et
php artisan tinker

# Tinker içinde:
Mail::raw('Test email', function($message) {
    $message->to('info@nordean.com.tr')->subject('Test');
});
```

## Troubleshooting

### Storage İzin Hatası
```bash
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache
```

### 500 Internal Server Error
```bash
# Log dosyalarını kontrol et
tail -f storage/logs/laravel.log
tail -f /var/log/apache2/nordean_error.log
```

### Cache Problemleri
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
composer dump-autoload
```

## Önemli Notlar

1. **Asla .env dosyasını git'e commit etmeyin**
2. **Production'da APP_DEBUG=false olmalı**
3. **Düzenli yedekleme yapın (database + dosyalar)**
4. **SSL sertifikası sürekli aktif olmalı**
5. **Log dosyalarını düzenli kontrol edin**

## Yedekleme

```bash
# Database backup
mysqldump -u nordean_user -p nordean_db > backup_$(date +%Y%m%d).sql

# Dosya backup
tar -czf nordean_files_$(date +%Y%m%d).tar.gz /var/www/html/nordean.com.tr
```

## İletişim

Sorularınız için: info@nordean.com.tr

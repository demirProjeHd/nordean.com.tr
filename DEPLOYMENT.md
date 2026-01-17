# NORDEAN.COM.TR - Production Deployment Guide

## 📋 Gereksinimler

### Sunucu
- Ubuntu 22.04 LTS (önerilen)
- Nginx 1.18+
- PHP 8.2+
- MySQL 8.0+
- Composer 2.x
- SSL Sertifikası (Let's Encrypt)

### PHP Extensions
```bash
php8.2-fpm
php8.2-mysql
php8.2-mbstring
php8.2-xml
php8.2-zip
php8.2-curl
php8.2-gd
```

---

## 🚀 Hızlı Kurulum (Otomatik)

```bash
# 1. Projeyi sunucuya yükle
cd /var/www
git clone https://github.com/demirProjeHd/nordean.com.tr.git

# 2. Deployment script'i çalıştır
cd nordean.com.tr
sudo ./deploy.sh
```

---

## 📝 Manuel Kurulum Adımları

### 1. Sunucu Hazırlığı
```bash
sudo apt update
sudo apt install -y nginx php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-zip php8.2-curl php8.2-gd mysql-server composer
```

### 2. Database Kurulumu
```bash
# MySQL'e giriş yap
sudo mysql -u root

# Database oluştur
CREATE DATABASE nordean CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'nordean_user'@'localhost' IDENTIFIED BY 'GÜÇLÜ_ŞİFRE';
GRANT ALL PRIVILEGES ON nordean.* TO 'nordean_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;

# Database'i import et
mysql -u nordean_user -p nordean < database/nordean_production_20260117.sql
```

### 3. Laravel Konfigürasyonu
```bash
# Environment dosyasını ayarla
cp .env.production .env
nano .env

# APP_KEY güncelle
DB_PASSWORD=GÜÇLÜ_ŞİFRE  # MySQL şifresini gir

# Composer bağımlılıkları
composer install --optimize-autoloader --no-dev

# Laravel setup
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
```

### 4. Dosya ve Klasör İzinleri
```bash
sudo chown -R www-data:www-data /var/www/nordean.com.tr
sudo chmod -R 755 /var/www/nordean.com.tr
sudo chmod -R 775 /var/www/nordean.com.tr/storage
sudo chmod -R 775 /var/www/nordean.com.tr/bootstrap/cache
```

### 5. Nginx Konfigürasyonu
```bash
# Nginx config'i kopyala
sudo cp nginx.conf /etc/nginx/sites-available/nordean.com.tr
sudo ln -s /etc/nginx/sites-available/nordean.com.tr /etc/nginx/sites-enabled/

# Test ve restart
sudo nginx -t
sudo systemctl restart nginx
```

### 6. SSL Sertifikası (Let's Encrypt)
```bash
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d nordean.com.tr -d www.nordean.com.tr
```

---

## 📂 Dosya Yapısı (Production)

### Taşınması Gereken Dosyalar
```
/var/www/nordean.com.tr/
├── public/
│   ├── images/                    # Hero, solutions görselleri (77 dosya)
│   │   ├── hero1.jpg ... hero4.jpg
│   │   ├── floor-solution.jpg
│   │   ├── wall-solution.jpg
│   │   ├── ceiling-solution.jpg
│   │   ├── vibration-solution.jpg
│   │   └── products/*.jpg         # 31 ürün görseli
│   └── admin/                     # Admin panel assets
├── storage/
│   └── app/public/products/pdfs/  # PDF dosyaları (63 adet)
└── database/
    └── nordean_production_20260117.sql  # Database dump (120KB)
```

### Görsel Dosyaları
```bash
# Local'den production'a kopyala
rsync -avz public/images/ user@server:/var/www/nordean.com.tr/public/images/
rsync -avz storage/app/public/ user@server:/var/www/nordean.com.tr/storage/app/public/
```

---

## ⚙️ Database İçeriği (KONTROL EDİLMİŞ)

### ✅ Seeder'larla Sağlanan İçerik
- **Sliders**: 4 adet (Hero images)
- **Solutions**: 4 adet (Zemin, Duvar, Tavan, Titreşim)
- **Categories**: 6 adet (Ürün kategorileri)
- **Products**: 31 adet (BIFLOOR, ROLL, POINT, vs.)
- **References**: 16 adet (Doğuş, Astoria, Swiss Hotel, vs.)
- **Settings**: 32 adet (SEO, mail, contact bilgileri)
- **Page Contents**: About, Mission, Vision
- **Admin User**: info@nordean.com.tr / Beril2021#

### ⚠️ ÖNEMLİ: Database Dump Kullanın!
Seeder'lar yerine **database/nordean_production_20260117.sql** dosyasını import edin.
Bu dosya tüm içeriği içerir ve günceldir.

---

## 🔧 Production Sonrası Ayarlar

### 1. Mail Ayarları (Admin Panel)
```
https://nordean.com.tr/admin/settings
→ Mail Ayarları bölümü
→ SMTP bilgilerini girin (Google Workspace)
```

### 2. Google Workspace SMTP Relay
```
1. admin.google.com → Apps → Gmail → Routing
2. SMTP relay service → Configure
3. IP adresi ekle: SUNUCU_IP
4. Require Authentication: OFF
```

### 3. SEO Ayarları (Hazır)
✅ Meta tags (title, description, keywords)
✅ Open Graph tags
✅ Schema.org structured data
✅ Sitemap.xml
✅ Robots.txt

---

## 🔐 Güvenlik

### Firewall (UFW)
```bash
sudo ufw allow 22/tcp
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp
sudo ufw enable
```

### Fail2ban (DDoS koruması)
```bash
sudo apt install fail2ban
sudo systemctl enable fail2ban
```

---

## 📊 Test Checklist

### ✅ Deployment Sonrası Kontroller
- [ ] Ana sayfa açılıyor: `https://nordean.com.tr`
- [ ] SSL çalışıyor (yeşil kilit)
- [ ] Hero slider görselleri yükleniyor
- [ ] Ürünler gösteriliyor (31 adet)
- [ ] PDF'ler indiriliyor
- [ ] Referanslar gösteriliyor (16 adet)
- [ ] İletişim formu çalışıyor
- [ ] Admin panel açılıyor: `/admin`
- [ ] Admin login çalışıyor
- [ ] TR/EN dil değiştirme çalışıyor
- [ ] Sitemap.xml erişilebilir: `/sitemap.xml`
- [ ] Robots.txt erişilebilir: `/robots.txt`

---

## 🐛 Sorun Giderme

### Laravel Hataları
```bash
# Log dosyalarını kontrol et
tail -f storage/logs/laravel.log

# Cache temizle
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Nginx Hataları
```bash
# Nginx error log
tail -f /var/log/nginx/nordean_error.log

# Nginx test
sudo nginx -t
```

### Database Bağlantısı
```bash
# MySQL'e bağlanabilir mi?
mysql -u nordean_user -p nordean

# .env dosyasındaki bilgileri kontrol et
nano .env
```

---

## 📞 Destek

**Canlıya geçiş sırasında problem olursa:**
- Laravel log: `/var/www/nordean.com.tr/storage/logs/laravel.log`
- Nginx log: `/var/log/nginx/nordean_error.log`
- PHP-FPM log: `/var/log/php8.2-fpm.log`

**Admin Bilgileri:**
- Email: info@nordean.com.tr
- Password: Beril2021#

---

## 📈 Performans Optimizasyonu (İsteğe Bağlı)

### OPcache
```bash
sudo nano /etc/php/8.2/fpm/php.ini
# opcache.enable=1 aktif et
sudo systemctl restart php8.2-fpm
```

### Redis Cache (İleri Seviye)
```bash
sudo apt install redis-server
# .env dosyasında CACHE_DRIVER=redis
```

---

**Son Güncelleme**: 17 Ocak 2026
**Database Dump**: nordean_production_20260117.sql (120KB)
**Toplam Görsel**: 77 dosya
**Toplam PDF**: 63 dosya

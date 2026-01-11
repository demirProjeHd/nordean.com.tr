# NORDEAN Website - Deployment Talimatları

## 🚀 Tamamlanan Adımlar

### ✅ Kod Geliştirme
- [x] Contact form database entegrasyonu
- [x] Email gönderim sistemi (ContactFormMail)
- [x] SEO optimizasyonları (meta tags, Open Graph, Twitter Cards)
- [x] Dinamik sitemap.xml
- [x] robots.txt
- [x] Production .env yapılandırması

### ✅ Dosya Yapısı
- [x] Vendor dependencies (kopyalandı)
- [x] Storage/cache folder permissions (755)
- [x] Migration dosyaları oluşturuldu

## 📋 Manuel Adımlar (Yapılması Gerekenler)

### 1. **XAMPP MySQL Servisini Başlatın**
```
XAMPP Control Panel'den MySQL'i başlatın
```

### 2. **Database Migration'larını Çalıştırın**
```bash
cd C:\xampp\htdocs\nordean.com.tr
C:\xampp\php\php.exe artisan migrate --force
```

Bu komut aşağıdaki tabloları oluşturacak:
- users
- password_resets
- failed_jobs
- personal_access_tokens
- **contact_messages** (iletişim formu mesajları)

### 3. **Mail Konfigürasyonu**

`.env` dosyasında mail ayarlarını güncelleyin:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=info@nordean.com.tr
MAIL_PASSWORD=your_app_password_here  # ← BURAYA ŞİFRE EKLEYİN
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="info@nordean.com.tr"
```

**Gmail için App Password oluşturma:**
1. Gmail Settings → Security
2. 2-Step Verification açın
3. App Passwords bölümünden yeni şifre oluşturun
4. Oluşan şifreyi MAIL_PASSWORD'e ekleyin

### 4. **Production Cache Optimizasyonları**

```bash
cd C:\xampp\htdocs\nordean.com.tr

# Config cache
C:\xampp\php\php.exe artisan config:cache

# Route cache
C:\xampp\php\php.exe artisan route:cache

# View cache
C:\xampp\php\php.exe artisan view:cache
```

### 5. **Test Edilmesi Gerekenler**

#### ✅ Navigation Testi
- [ ] Tüm menu linkleri çalışıyor mu? (About, Solutions, Products, References, Contact)
- [ ] Smooth scroll düzgün çalışıyor mu?
- [ ] Dil değiştirme (TR/EN) çalışıyor mu?

#### ✅ Contact Form Testi
- [ ] Form gönderimi çalışıyor mu?
- [ ] Email gönderiliyor mu?
- [ ] Database'e kayıt düşüyor mu?
- [ ] Validation çalışıyor mu?

#### ✅ Responsive Test
- [ ] Mobile (375px - iPhone)
- [ ] Tablet (768px - iPad Air)
- [ ] Desktop (1920px)

#### ✅ SEO Testi
- [ ] `/sitemap.xml` açılıyor mu?
- [ ] `/robots.txt` açılıyor mu?
- [ ] Meta tags görünüyor mu? (Kaynak kodda kontrol)
- [ ] Open Graph tags doğru mu?

#### ✅ Performance
- [ ] Sayfa yüklenme hızı
- [ ] Görseller optimize mi?
- [ ] Cache çalışıyor mu?

### 6. **Server Upload (Canlı Ortam)**

Eğer canlı sunucuya upload edecekseniz:

```bash
# Sunucuda
cd /var/www/html/nordean.com.tr

# GitHub'dan güncellemeleri çek
git pull origin master

# Vendor dependencies kur (eğer yoksa)
composer install --no-dev --optimize-autoloader

# Permissions
chmod -R 775 storage bootstrap/cache

# Migration
php artisan migrate --force

# Cache
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 🔧 Troubleshooting

### Mail Gönderilmiyor
- MAIL_PASSWORD doğru girilmiş mi?
- Gmail 2FA ve App Password kullanılıyor mu?
- `storage/logs/laravel.log` dosyasını kontrol edin

### Database Bağlantı Hatası
- MySQL servisi çalışıyor mu?
- .env dosyasında DB_PASSWORD boş mu? (XAMPP default)
- Database oluşturulmuş mu? (`CREATE DATABASE nordean;`)

### 404 Hatası
- Route cache temizleyin: `php artisan route:clear`
- `.htaccess` dosyası var mı?

### Permission Hatası
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

## 📞 Destek

Herhangi bir sorun için:
- Laravel logs: `storage/logs/laravel.log`
- Apache logs: XAMPP logs klasörü
- Browser console: F12 Developer Tools

---

✨ **Hazırlayan:** Claude Code
📅 **Tarih:** 2026-01-11

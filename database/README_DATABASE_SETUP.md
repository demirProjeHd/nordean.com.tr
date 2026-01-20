# MySQL Veritabanı Kurulum Rehberi

## 📋 Gereksinimler
- XAMPP kurulu olmalı
- MySQL servisi çalışıyor olmalı

## 🚀 Kurulum Yöntemleri

### Yöntem 1: phpMyAdmin ile (Kolay - Önerilen)

1. **XAMPP Control Panel'i aç** ve MySQL'i başlat
2. **phpMyAdmin'i aç**: http://localhost/phpmyadmin
3. **SQL sekmesine** tıkla
4. **setup_database.sql** dosyasının içeriğini kopyala yapıştır
5. **Git (Go)** butonuna tıkla

### Yöntem 2: MySQL Komut Satırı ile

#### Windows (CMD veya PowerShell):
```cmd
cd C:\xampp\mysql\bin
mysql -u root -p
```

Şifre sorduğunda ENTER'a bas (XAMPP'te varsayılan root şifresi boş)

Sonra SQL komutlarını çalıştır:
```sql
-- Veritabanını oluştur
CREATE DATABASE nordean CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Kullanıcı oluştur (isteğe bağlı)
CREATE USER 'nordean_user'@'localhost' IDENTIFIED BY 'nordean_secure_password_2024';
GRANT ALL PRIVILEGES ON nordean.* TO 'nordean_user'@'localhost';
FLUSH PRIVILEGES;

-- Kontrol et
SHOW DATABASES LIKE 'nordean';
USE nordean;
```

#### Veya direkt SQL dosyasını çalıştır:
```cmd
cd C:\xampp\mysql\bin
mysql -u root < C:\xampp\htdocs\nordean.com.tr\database\setup_database.sql
```

### Yöntem 3: Laravel Artisan ile (Veritabanı zaten varsa)

```bash
# Projeye git
cd /mnt/c/xampp/htdocs/nordean.com.tr

# Migration'ları çalıştır
php artisan migrate

# Seeder'ları çalıştır (varsa)
php artisan db:seed
```

## ⚙️ .env Dosyası Ayarları

### Seçenek 1: Root kullanıcısı ile (XAMPP varsayılan)
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nordean
DB_USERNAME=root
DB_PASSWORD=
```

### Seçenek 2: Özel kullanıcı ile (Daha güvenli)
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nordean
DB_USERNAME=nordean_user
DB_PASSWORD=nordean_secure_password_2024
```

## 🔍 Kurulumu Kontrol Et

### 1. Veritabanının oluşturulduğunu kontrol et:
```sql
SHOW DATABASES LIKE 'nordean';
```

### 2. Kullanıcı yetkilerini kontrol et:
```sql
SHOW GRANTS FOR 'nordean_user'@'localhost';
```

### 3. Laravel ile bağlantıyı test et:
```bash
php artisan migrate:status
```

Veya:
```bash
php artisan tinker
DB::connection()->getPdo();
```

## 📝 Tablolari Oluştur

Veritabanı oluşturulduktan sonra Laravel migration'ları çalıştır:

```bash
cd /mnt/c/xampp/htdocs/nordean.com.tr

# Tüm migration'ları çalıştır
php artisan migrate

# Fresh migration (tüm tabloları sıfırla ve yeniden oluştur)
php artisan migrate:fresh

# Seed ile birlikte (test verisi ile)
php artisan migrate:fresh --seed
```

## 🔧 Sorun Giderme

### Hata: "Access denied for user"
- MySQL servisinin çalıştığından emin olun
- Kullanıcı adı ve şifrenin doğru olduğunu kontrol edin
- .env dosyasındaki bilgileri kontrol edin

### Hata: "Database does not exist"
- Veritabanının oluşturulduğunu kontrol edin: `SHOW DATABASES;`
- setup_database.sql dosyasını tekrar çalıştırın

### Hata: "SQLSTATE[HY000] [2002] Connection refused"
- MySQL servisinin çalıştığından emin olun
- XAMPP Control Panel'den MySQL'i restart edin

### XAMPP MySQL başlamıyor
- Port 3306'nın başka bir program tarafından kullanılmadığını kontrol edin
- XAMPP'i yönetici olarak çalıştırın
- MySQL log'larını kontrol edin: `C:\xampp\mysql\data\mysql_error.log`

## 📊 Veritabanı Yedekleme

### Yedek alma:
```bash
cd C:\xampp\mysql\bin
mysqldump -u root nordean > C:\xampp\htdocs\nordean.com.tr\database\backup.sql
```

### Yedekten geri yükleme:
```bash
cd C:\xampp\mysql\bin
mysql -u root nordean < C:\xampp\htdocs\nordean.com.tr\database\backup.sql
```

## 🔐 Güvenlik Önerileri

1. **Production'da kesinlikle root kullanıcısı kullanmayın**
2. **Güçlü bir şifre belirleyin**
3. **Sadece gerekli olan yetkileri verin**
4. **Düzenli yedek alın**
5. **.env dosyasını asla git'e eklemeyin** (zaten .gitignore'da)

## 📚 Ek Kaynaklar

- [Laravel Database Documentation](https://laravel.com/docs/database)
- [XAMPP Documentation](https://www.apachefriends.org/docs/)
- [MySQL Documentation](https://dev.mysql.com/doc/)

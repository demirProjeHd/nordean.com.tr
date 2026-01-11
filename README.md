# NORDEAN - Isolgomma Türkiye Distribütörü

Laravel tabanlı kurumsal web sitesi projesi.

## Teknolojiler

- **PHP**: 8.1.28
- **Laravel**: 9.38.0
- **Frontend**: Tailwind CSS + Alpine.js
- **Build Tool**: Vite

## Özellikler

- ✅ Tek sayfalık (single-page) responsive tasarım
- ✅ İki dilli destek (Türkçe/İngilizce)
- ✅ 4 slide'lı hero carousel
- ✅ Dinamik içerik yönetimi
- ✅ Modern UI/UX tasarımı
- ✅ SEO dostu yapı

## Sayfa Bölümleri

1. **Header** - Logo, navigasyon ve dil değiştirici
2. **Hero Section** - 4 slide'lı otomatik carousel
3. **About Section** - Nordean tanıtımı
4. **Isolgomma Section** - İtalyan Isolgomma markası tanıtımı
5. **Solutions Section** - Yalıtım çözümleri
6. **Products Section** - Ürün kategorileri
7. **CTA Section** - İletişim çağrısı
8. **Footer** - İletişim bilgileri ve sosyal medya

## Kurulum

### 1. Bağımlılıkları Yükle

```bash
# PHP bağımlılıkları (vendor klasörü zaten mevcut)
composer install

# Frontend bağımlılıkları
npm install
```

### 2. Ortam Değişkenlerini Yapılandır

`.env` dosyası zaten oluşturulmuştur. Gerekirse düzenleyin:

```
APP_NAME="Nordean - Isolgomma Turkey"
APP_ENV=local
APP_KEY=base64:z7gMDE/MlL8Moz9H4ZbQmXYnirLsnooortjkdryNhdc=
APP_DEBUG=true
APP_URL=http://localhost
```

### 3. Frontend Asset'leri Derle

```bash
# Development modu
npm run dev

# Production build
npm run build
```

### 4. Uygulamayı Çalıştır

XAMPP üzerinden Apache'yi başlatın ve tarayıcınızda açın:

```
http://localhost/nordean.com.tr/public
```

## Klasör Yapısı

```
nordean.com.tr/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php
│   │   │   └── HomeController.php
│   │   └── Middleware/
│   │       └── SetLocale.php
│   └── Providers/
├── config/
├── public/
│   └── images/          # Tüm görsel dosyalar
├── resources/
│   ├── css/
│   │   └── app.css      # Tailwind CSS
│   ├── js/
│   │   ├── app.js       # Alpine.js setup
│   │   └── bootstrap.js
│   ├── lang/
│   │   ├── tr/          # Türkçe çeviriler
│   │   │   └── messages.php
│   │   └── en/          # İngilizce çeviriler
│   │       └── messages.php
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── partials/
│       │   ├── header.blade.php
│       │   ├── hero.blade.php
│       │   └── footer.blade.php
│       └── welcome.blade.php
├── routes/
│   └── web.php
├── .env
├── composer.json
├── package.json
├── tailwind.config.js
└── vite.config.js
```

## Routes

- `GET /` - Ana sayfa
- `GET /lang/{locale}` - Dil değiştirme (tr/en)

## Çok Dilli Destek

Dil dosyaları `resources/lang/{locale}/messages.php` konumundadır.

Kullanım:
```php
{{ __('messages.hero.slide1.title') }}
```

Session üzerinden dil yönetimi yapılmaktadır.

## Kullanılan Paketler

- laravel/framework: ^9.19
- laravel/sanctum: ^3.0
- laravel/tinker: ^2.7
- laravel/ui: ^4.1
- guzzlehttp/guzzle: ^7.2

## Frontend Bağımlılıkları

- Tailwind CSS: ^3.3.0
- Alpine.js: ^3.13.3
- Vite: ^4.0.0
- Axios: ^1.1.2

## Geliştirme Notları

- Vendor klasörü comlandltd projesinden kopyalandı
- Tüm görseller nordean.com.tr.v0 projesinden public/images'e aktarıldı
- Alpine.js ile hero slider yönetimi yapılmaktadır
- Tailwind CSS ile responsive tasarım uygulanmıştır

## Sonraki Adımlar

- [ ] npm install ve vite build
- [ ] İletişim formu eklenmesi
- [ ] Admin paneli entegrasyonu
- [ ] Veritabanı yapılandırması
- [ ] Ürün ve çözüm detay sayfaları
- [ ] Blog/haberler bölümü

## Lisans

MIT License

---

**Geliştirme:** PHASE 2 Tamamlandı
**Tarih:** 11 Ocak 2026
**Status:** Ana sayfa hazır, frontend build bekleniyor

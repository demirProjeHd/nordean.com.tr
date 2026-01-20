# Custom Error Pages

Modern ve kullanıcı dostu hata sayfaları. Laravel otomatik olarak bu sayfaları ilgili HTTP hata kodları için kullanır.

## Oluşturulan Sayfalar

### 🔍 404 - Sayfa Bulunamadı
- **Dosya:** `404.blade.php`
- **Açıklama:** Kullanıcı var olmayan bir sayfaya erişmeye çalıştığında gösterilir
- **Özellikler:**
  - URL temizleme (hassas parametreleri gizler)
  - Keyboard shortcuts (H: Ana sayfa, Backspace/Esc: Geri)
  - Modern gradient tasarım
  - Animasyonlu elementler

### 🔐 401 - Yetkilendirme Gerekli
- **Dosya:** `401.blade.php`
- **Açıklama:** Giriş yapılması gereken sayfalarda gösterilir
- **Özellikler:**
  - Login sayfasına yönlendirme
  - Intended URL kaydetme
  - Keyboard shortcuts (L: Login, H: Ana sayfa)

### 🔒 403 - Erişim Engellendi
- **Dosya:** `403.blade.php`
- **Açıklama:** Kullanıcının yetkisi olmayan sayfalarda gösterilir
- **Özellikler:**
  - Auth durumu gösterimi
  - Giriş yapmış/yapmamış kullanıcı kontrolü
  - URL temizleme

### ⏱️ 419 - Oturum Süresi Doldu
- **Dosya:** `419.blade.php`
- **Açıklama:** CSRF token hataları veya oturum zaman aşımında gösterilir
- **Özellikler:**
  - Otomatik sayfa yenileme (10 saniye)
  - Countdown timer
  - Keyboard shortcuts (R: Yenile, Esc: Geri)

### 🚦 429 - Çok Fazla İstek
- **Dosya:** `429.blade.php`
- **Açıklama:** Rate limiting devreye girdiğinde gösterilir
- **Özellikler:**
  - Bekleme süresi countdown
  - Retry-After header desteği
  - Otomatik yenileme (süre dolduğunda)
  - Disabled buton (countdown bitene kadar)

### ⚠️ 500 - Sunucu Hatası
- **Dosya:** `500.blade.php`
- **Açıklama:** Sunucu tarafında beklenmeyen hatalar oluştuğunda gösterilir
- **Özellikler:**
  - Debug mode'da hata detayları
  - Otomatik yenileme desteği
  - Keyboard shortcuts (H: Ana sayfa, R: Yenile)

### 🔧 503 - Bakım Modu
- **Dosya:** `503.blade.php`
- **Açıklama:** Site bakım modundayken gösterilir
- **Özellikler:**
  - Otomatik yenileme (60 saniye)
  - Countdown gösterimi
  - İletişim butonu
  - Tahmini süre gösterimi

## Ortak Özellikler

### 🎨 Tasarım
- Modern gradient arka plan (mor-pembe)
- Glassmorphism card tasarımı
- Smooth animations
- Responsive tasarım (mobil uyumlu)
- Floating decorative shapes

### ⌨️ Keyboard Shortcuts
Tüm sayfalarda çalışan kısayollar:
- `H` - Ana sayfaya dön
- `R` - Sayfayı yenile
- `Esc` - Geri dön
- `L` - Login sayfasına git (401/403'te)

### 🔒 Güvenlik
- URL temizleme (hassas parametreler gizlenir)
- Browser history temizleme
- CSRF token kontrolü
- XSS koruması

### 🎯 UX İyileştirmeleri
- Açıklayıcı hata mesajları
- Kullanıcı dostu dil
- İşlevsel butonlar
- Animasyonlu feedback
- Auto-refresh özelliği (gerekli sayfalarda)

## Özelleştirme

### Renkleri Değiştirme
`layout.blade.php` dosyasındaki CSS'te:
```css
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
```

### Email Adresini Değiştirme
503 sayfasında mail adresi `config('mail.from.address')` ile alınır.
`.env` dosyasında:
```env
MAIL_FROM_ADDRESS=destek@nordean.com.tr
```

### Countdown Sürelerini Değiştirme
Her sayfanın `@section('scripts')` bölümündeki JavaScript'te:
```javascript
let countdown = 60; // saniye cinsinden
```

## Test Etme

Laravel'de hata sayfalarını test etmek için:

```php
// routes/web.php
Route::get('/test-404', function() {
    abort(404);
});

Route::get('/test-500', function() {
    abort(500);
});

Route::get('/test-503', function() {
    abort(503);
});
```

## Notlar

- Tüm sayfalar `errors::layout` layout'unu extend eder
- Laravel otomatik olarak HTTP status koduna göre doğru sayfayı gösterir
- Debug mode açıkken (`APP_DEBUG=true`) bazı sayfalarda ek bilgiler gösterilir
- Sayfalar SEO dostu title tag'lere sahiptir
- Tüm sayfalar Türkçe içerik kullanır

## Bakım

Hata sayfaları genelde nadiren güncellenir, ancak:
- Site tasarımı değiştiğinde layout güncellenmelidir
- Yeni özellikler eklendiğinde ilgili sayfalar güncellenmelidir
- Email veya iletişim bilgileri değiştiğinde 503 sayfası güncellenmelidir

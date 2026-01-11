@component('mail::message')
# Yeni İletişim Formu Mesajı

**Gönderen:** {{ $contactData['name'] }}
**E-posta:** {{ $contactData['email'] }}
@if(!empty($contactData['phone']))
**Telefon:** {{ $contactData['phone'] }}
@endif
**Konu:** {{ $subjectText }}

---

## Mesaj İçeriği:

{{ $contactData['message'] }}

---

@component('mail::button', ['url' => config('app.url')])
Web Sitesine Git
@endcomponent

Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent

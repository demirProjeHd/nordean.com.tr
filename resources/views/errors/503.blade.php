@extends('errors::layout')

@section('title', '503 - Bakım Modu')

@section('content')
<div class="error-icon">🔧</div>
<h1 class="error-code">503</h1>
<h2 class="error-title">Bakım Yapılıyor</h2>
<p class="error-message">
    Sitemiz şu anda bakım modunda!
    <br>
    Size daha iyi hizmet verebilmek için sistemimizi güncelliyoruz.
    <br>
    Kısa süre içinde tekrar hizmetinizdeyiz.
</p>

<div class="btn-group">
    <button onclick="location.reload()" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="23 4 23 10 17 10"></polyline>
            <polyline points="1 20 1 14 7 14"></polyline>
            <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
        </svg>
        Yeniden Dene
    </button>
    <a href="mailto:{{ config('mail.from.address', 'info@nordean.com.tr') }}" class="btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
        </svg>
        Bize Ulaşın
    </a>
</div>

<div class="error-details">
    <p style="font-size: 14px; color: #a0aec0; margin-bottom: 0.5rem;">Tahmini Süre:</p>
    <div class="error-url" id="estimatedTime">
        @if(isset($exception) && method_exists($exception, 'retryAfter'))
            {{ $exception->retryAfter }} saniye
        @else
            Birkaç dakika içinde
        @endif
    </div>
    <p style="font-size: 14px; color: #a0aec0; margin: 1rem 0 0.5rem;">Son Kontrol:</p>
    <div class="error-url" id="lastCheck">{{ now()->format('d.m.Y H:i:s') }}</div>
</div>
@endsection

@section('scripts')
<script>
    // Auto-refresh every 60 seconds
    let countdown = 60;
    const countdownElement = document.createElement('div');
    countdownElement.style.cssText = 'margin-top: 1rem; font-size: 14px; color: #a0aec0;';
    document.querySelector('.error-details').appendChild(countdownElement);

    const refreshTimer = setInterval(function() {
        countdown--;
        countdownElement.innerHTML = `Sayfa <strong>${countdown}</strong> saniye içinde otomatik olarak yenilenecek...`;

        if (countdown <= 0) {
            clearInterval(refreshTimer);
            location.reload();
        }
    }, 1000);

    // Update last check time
    countdownElement.innerHTML = `Sayfa <strong>${countdown}</strong> saniye içinde otomatik olarak yenilenecek...`;

    // Cancel auto-refresh if user clicks anything
    document.addEventListener('click', function() {
        clearInterval(refreshTimer);
        countdownElement.innerHTML = 'Otomatik yenileme iptal edildi.';
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.key === 'r' || e.key === 'R') {
            location.reload();
        }
    });
</script>
@endsection

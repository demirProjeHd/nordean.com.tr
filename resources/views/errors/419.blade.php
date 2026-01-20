@extends('errors::layout')

@section('title', '419 - Oturum Süresi Doldu')

@section('content')
<div class="error-icon">⏱️</div>
<h1 class="error-code">419</h1>
<h2 class="error-title">Oturum Süresi Doldu</h2>
<p class="error-message">
    Güvenliğiniz için oturumunuz zaman aşımına uğradı!
    <br>
    Lütfen sayfayı yenileyip işleminizi tekrar deneyin.
    <br>
    Bu genellikle uzun süre sayfada işlem yapmadığınızda gerçekleşir.
</p>

<div class="btn-group">
    <button onclick="location.reload()" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="23 4 23 10 17 10"></polyline>
            <polyline points="1 20 1 14 7 14"></polyline>
            <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
        </svg>
        Sayfayı Yenile
    </button>
    <button onclick="window.history.back()" class="btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        Geri Dön
    </button>
</div>

<div class="error-details">
    <p style="font-size: 14px; color: #a0aec0; margin-bottom: 0.5rem;">Hata Nedeni:</p>
    <div class="error-url">CSRF Token uyumsuzluğu veya oturum süresi doldu</div>
    <p style="font-size: 14px; color: #a0aec0; margin: 1rem 0 0.5rem;">Çözüm:</p>
    <div class="error-url">Sayfayı yenileyip işleminizi tekrar deneyin</div>
</div>
@endsection

@section('scripts')
<script>
    // Show countdown for auto-refresh
    let countdown = 10;
    const countdownElement = document.createElement('div');
    countdownElement.style.cssText = 'margin-top: 1.5rem; font-size: 14px; color: #a0aec0; padding: 0.75rem; background: #f7fafc; border-radius: 8px;';
    document.querySelector('.error-details').appendChild(countdownElement);

    const refreshTimer = setInterval(function() {
        countdown--;
        countdownElement.innerHTML = `Sayfa <strong style="color: #667eea;">${countdown}</strong> saniye içinde otomatik olarak yenilenecek...`;

        if (countdown <= 0) {
            clearInterval(refreshTimer);
            location.reload();
        }
    }, 1000);

    // Initial message
    countdownElement.innerHTML = `Sayfa <strong style="color: #667eea;">${countdown}</strong> saniye içinde otomatik olarak yenilenecek...`;

    // Cancel auto-refresh if user clicks reload
    document.querySelector('.btn-primary').addEventListener('click', function() {
        clearInterval(refreshTimer);
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.key === 'r' || e.key === 'R' || e.key === 'Enter') {
            location.reload();
        }
        if (e.key === 'Escape') {
            e.preventDefault();
            window.history.back();
        }
    });
</script>
@endsection

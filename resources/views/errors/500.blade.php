@extends('errors::layout')

@section('title', '500 - Sunucu Hatası')

@section('content')
<div class="error-icon">⚠️</div>
<h1 class="error-code">500</h1>
<h2 class="error-title">Sunucu Hatası</h2>
<p class="error-message">
    Üzgünüz, bir şeyler ters gitti!
    <br>
    Sunucu tarafında bir hata oluştu. Teknik ekibimiz bu sorun hakkında bilgilendirildi.
    <br>
    Lütfen daha sonra tekrar deneyin.
</p>

<div class="btn-group">
    <a href="{{ url('/') }}" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
        </svg>
        Ana Sayfaya Dön
    </a>
    <button onclick="location.reload()" class="btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="23 4 23 10 17 10"></polyline>
            <polyline points="1 20 1 14 7 14"></polyline>
            <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
        </svg>
        Yenile
    </button>
</div>

<div class="error-details">
    <p style="font-size: 14px; color: #a0aec0; margin-bottom: 0.5rem;">Hata Zamanı:</p>
    <div class="error-url">{{ now()->format('d.m.Y H:i:s') }}</div>
    @if(config('app.debug') && isset($exception))
        <p style="font-size: 14px; color: #a0aec0; margin: 1rem 0 0.5rem;">Hata Mesajı:</p>
        <div class="error-url">{{ $exception->getMessage() }}</div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    // Auto-refresh after 30 seconds
    let countdown = 30;
    const refreshTimer = setInterval(function() {
        countdown--;
        if (countdown <= 0) {
            clearInterval(refreshTimer);
            location.reload();
        }
    }, 1000);

    // Cancel auto-refresh if user interacts with the page
    document.addEventListener('click', function() {
        clearInterval(refreshTimer);
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.key === 'h' || e.key === 'H') {
            window.location.href = '{{ url('/') }}';
        }
        if (e.key === 'r' || e.key === 'R') {
            location.reload();
        }
    });
</script>
@endsection

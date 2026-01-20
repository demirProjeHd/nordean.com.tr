@extends('errors::layout')

@section('title', '403 - Erişim Engellendi')

@section('content')
<div class="error-icon">🔒</div>
<h1 class="error-code">403</h1>
<h2 class="error-title">Erişim Engellendi</h2>
<p class="error-message">
    Üzgünüz, bu sayfaya erişim yetkiniz yok!
    <br>
    Bu içeriği görüntülemek için gerekli izinlere sahip değilsiniz.
    <br>
    Eğer bu bir hata olduğunu düşünüyorsanız, lütfen yönetici ile iletişime geçin.
</p>

<div class="btn-group">
    <a href="{{ url('/') }}" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
        </svg>
        Ana Sayfaya Dön
    </a>
    @auth
        <button onclick="window.history.back()" class="btn btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Geri Dön
        </button>
    @else
        <a href="{{ route('admin.login') }}" class="btn btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                <polyline points="10 17 15 12 10 7"></polyline>
                <line x1="15" y1="12" x2="3" y2="12"></line>
            </svg>
            Giriş Yap
        </a>
    @endauth
</div>

<div class="error-details">
    <p style="font-size: 14px; color: #a0aec0; margin-bottom: 0.5rem;">Erişim Durumu:</p>
    <div class="error-url">
        @auth
            <span style="color: #48bb78;">✓</span> Giriş yapıldı
            <span style="color: #718096; margin: 0 0.5rem;">|</span>
            <span style="color: #f56565;">✗</span> Yetki yok
        @else
            <span style="color: #f56565;">✗</span> Giriş yapılmadı
        @endauth
    </div>
    @if(config('app.debug') && isset($exception))
        <p style="font-size: 14px; color: #a0aec0; margin: 1rem 0 0.5rem;">Hata Detayı:</p>
        <div class="error-url">{{ $exception->getMessage() ?: 'Bu kaynağa erişim için yetkiniz bulunmuyor.' }}</div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.key === 'h' || e.key === 'H') {
            window.location.href = '{{ url('/') }}';
        }
        if (e.key === 'Escape') {
            e.preventDefault();
            window.history.back();
        }
        @guest
        if (e.key === 'l' || e.key === 'L') {
            window.location.href = '{{ route('admin.login') }}';
        }
        @endguest
    });

    // Clean URL from browser
    if (window.history.replaceState) {
        const url = new URL(window.location.href);
        const cleanPath = url.origin + url.pathname;
        window.history.replaceState({}, document.title, cleanPath);
    }
</script>
@endsection

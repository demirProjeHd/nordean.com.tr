@extends('errors::layout')

@section('title', '401 - Yetkilendirme Gerekli')

@section('content')
<div class="error-icon">🔐</div>
<h1 class="error-code">401</h1>
<h2 class="error-title">Yetkilendirme Gerekli</h2>
<p class="error-message">
    Bu içeriğe erişebilmek için giriş yapmanız gerekiyor!
    <br>
    Lütfen hesabınıza giriş yapın veya kayıt olun.
</p>

<div class="btn-group">
    <a href="{{ route('admin.login') }}" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
            <polyline points="10 17 15 12 10 7"></polyline>
            <line x1="15" y1="12" x2="3" y2="12"></line>
        </svg>
        Giriş Yap
    </a>
    <a href="{{ url('/') }}" class="btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
        </svg>
        Ana Sayfa
    </a>
</div>

<div class="error-details">
    <p style="font-size: 14px; color: #a0aec0; margin-bottom: 0.5rem;">Giriş Durumu:</p>
    <div class="error-url">
        <span style="color: #f56565;">✗</span> Oturum açılmamış
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Save intended URL for redirect after login
    if (window.location.pathname !== '{{ route('admin.login') }}') {
        sessionStorage.setItem('intended_url', window.location.href);
    }

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.key === 'l' || e.key === 'L') {
            window.location.href = '{{ route('admin.login') }}';
        }
        if (e.key === 'h' || e.key === 'H') {
            window.location.href = '{{ url('/') }}';
        }
    });

    // Clean URL from browser
    if (window.history.replaceState) {
        const url = new URL(window.location.href);
        const cleanPath = url.origin + url.pathname;
        window.history.replaceState({}, document.title, cleanPath);
    }
</script>
@endsection

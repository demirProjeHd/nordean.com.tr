@extends('errors::layout')

@section('title', '404 - Sayfa Bulunamadı')

@section('content')
<div class="error-icon">🔍</div>
<h1 class="error-code">404</h1>
<h2 class="error-title">Sayfa Bulunamadı</h2>
<p class="error-message">
    Aradığınız sayfa silinmiş, taşınmış veya hiç var olmamış olabilir.
    <br>
    Lütfen URL'i kontrol edin veya ana sayfaya dönün.
</p>

<div class="btn-group">
    <a href="{{ url('/') }}" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
        </svg>
        Ana Sayfaya Dön
    </a>
    <button onclick="window.history.back()" class="btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        Geri Dön
    </button>
</div>

<div class="error-details">
    <p style="font-size: 14px; color: #a0aec0; margin-bottom: 0.5rem;">İstenen URL:</p>
    <div class="error-url" id="requestedUrl">{{ request()->fullUrl() }}</div>
</div>
@endsection

@section('scripts')
<script>
    // Clean the URL for security and privacy
    document.addEventListener('DOMContentLoaded', function() {
        const urlElement = document.getElementById('requestedUrl');
        const currentUrl = window.location.href;

        try {
            const url = new URL(currentUrl);
            // Remove sensitive query parameters
            const sensitiveParams = ['token', 'password', 'key', 'secret', 'api_key', 'auth'];

            sensitiveParams.forEach(param => {
                if (url.searchParams.has(param)) {
                    url.searchParams.set(param, '***');
                }
            });

            // Clean the URL
            let cleanUrl = url.origin + url.pathname;

            // Add non-sensitive query parameters if any remain
            const queryString = url.search;
            if (queryString && queryString !== '?') {
                cleanUrl += queryString;
            }

            // Limit URL length for display
            if (cleanUrl.length > 80) {
                cleanUrl = cleanUrl.substring(0, 77) + '...';
            }

            urlElement.textContent = cleanUrl;

            // Update browser history to clean URL (remove hash and query if needed)
            if (window.history.replaceState) {
                const cleanPath = url.origin + url.pathname;
                window.history.replaceState({}, document.title, cleanPath);
            }
        } catch (e) {
            // If URL parsing fails, just display the pathname
            urlElement.textContent = window.location.pathname;
        }
    });

    // Add keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Press 'H' to go home
        if (e.key === 'h' || e.key === 'H') {
            window.location.href = '{{ url('/') }}';
        }
        // Press 'Backspace' or 'Escape' to go back
        if (e.key === 'Backspace' || e.key === 'Escape') {
            e.preventDefault();
            window.history.back();
        }
    });
</script>
@endsection

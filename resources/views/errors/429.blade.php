@extends('errors::layout')

@section('title', '429 - Çok Fazla İstek')

@section('content')
<div class="error-icon">🚦</div>
<h1 class="error-code">429</h1>
<h2 class="error-title">Çok Fazla İstek</h2>
<p class="error-message">
    Çok fazla istek gönderdiniz!
    <br>
    Lütfen bir süre bekleyin ve tekrar deneyin.
    <br>
    Bu, spam ve kötü niyetli aktiviteleri önlemek için uygulanan bir güvenlik önlemidir.
</p>

<div class="btn-group">
    <button onclick="location.reload()" class="btn btn-primary" id="retryButton" disabled>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="23 4 23 10 17 10"></polyline>
            <polyline points="1 20 1 14 7 14"></polyline>
            <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
        </svg>
        <span id="retryText">Bekleyin...</span>
    </button>
    <a href="{{ url('/') }}" class="btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
        </svg>
        Ana Sayfa
    </a>
</div>

<div class="error-details">
    <p style="font-size: 14px; color: #a0aec0; margin-bottom: 0.5rem;">Bekleme Süresi:</p>
    <div class="error-url" id="waitTime">
        @if(isset($exception) && method_exists($exception, 'getHeaders'))
            @php
                $retryAfter = $exception->getHeaders()['Retry-After'] ?? 60;
            @endphp
            {{ $retryAfter }} saniye
        @else
            60 saniye
        @endif
    </div>
    <p style="font-size: 14px; color: #a0aec0; margin: 1rem 0 0.5rem;">İpucu:</p>
    <div class="error-url">Daha yavaş istek gönderin ve otomatik bot kullanmayın</div>
</div>
@endsection

@section('scripts')
<script>
    // Get retry after seconds
    @if(isset($exception) && method_exists($exception, 'getHeaders'))
        @php
            $retryAfter = (int)($exception->getHeaders()['Retry-After'] ?? 60);
        @endphp
        let retryAfter = {{ $retryAfter }};
    @else
        let retryAfter = 60;
    @endif

    const retryButton = document.getElementById('retryButton');
    const retryText = document.getElementById('retryText');
    const waitTimeElement = document.getElementById('waitTime');

    // Countdown timer
    const countdownTimer = setInterval(function() {
        retryAfter--;

        // Update button text
        retryText.textContent = `Tekrar Dene (${retryAfter}s)`;

        // Update wait time
        waitTimeElement.innerHTML = `<span style="color: #667eea; font-weight: 600;">${retryAfter}</span> saniye`;

        if (retryAfter <= 0) {
            clearInterval(countdownTimer);
            retryButton.disabled = false;
            retryText.textContent = 'Tekrar Dene';
            waitTimeElement.innerHTML = '<span style="color: #48bb78; font-weight: 600;">✓</span> Artık deneyebilirsiniz!';

            // Auto reload after countdown
            setTimeout(function() {
                location.reload();
            }, 1000);
        }
    }, 1000);

    // Initial update
    retryText.textContent = `Bekleyin (${retryAfter}s)`;

    // Keyboard shortcuts (disabled until countdown completes)
    document.addEventListener('keydown', function(e) {
        if (retryAfter <= 0) {
            if (e.key === 'r' || e.key === 'R' || e.key === 'Enter') {
                location.reload();
            }
        }
        if (e.key === 'h' || e.key === 'H') {
            window.location.href = '{{ url('/') }}';
        }
    });
</script>
@endsection

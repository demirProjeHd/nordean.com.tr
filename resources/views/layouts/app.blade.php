<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'NORDEAN - Isolgomma Türkiye Distribütörü | Ses ve Titreşim Yalıtımı' }}</title>
    <meta name="description" content="{{ $description ?? 'İtalyan Isolgomma ses ve titreşim yalıtım malzemelerinin Türkiye\'deki tek yetkili distribütörü. Zemin, duvar, tavan yalıtımı ve titreşim kontrolü çözümleri.' }}">
    <meta name="keywords" content="{{ $keywords ?? 'isolgomma türkiye, isolgomma distribütör, ses yalıtımı, titreşim yalıtımı, akustik malzeme, nordean, zemin yalıtımı, duvar yalıtımı, tavan yalıtımı, bifloor, sylomer, isolgomma ürünleri, sound insulation, vibration control' }}">
    <meta name="author" content="NORDEAN Mühendislik">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'NORDEAN - Isolgomma Türkiye Distribütörü | Ses ve Titreşim Yalıtımı' }}">
    <meta property="og:description" content="{{ $description ?? 'İtalyan Isolgomma ses ve titreşim yalıtım malzemelerinin Türkiye\'deki tek yetkili distribütörü. Bifloor, Sylomer, Roll, Point ürünleri.' }}">
    <meta property="og:image" content="{{ asset('images/nordean-logo.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="{{ app()->getLocale() == 'tr' ? 'tr_TR' : 'en_US' }}">
    <meta property="og:locale:alternate" content="{{ app()->getLocale() == 'tr' ? 'en_US' : 'tr_TR' }}">
    <meta property="og:site_name" content="NORDEAN - Isolgomma Türkiye">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $title ?? 'NORDEAN - Isolgomma Türkiye Distribütörü | Ses ve Titreşim Yalıtımı' }}">
    <meta name="twitter:description" content="{{ $description ?? 'İtalyan Isolgomma ses ve titreşim yalıtım malzemelerinin Türkiye\'deki tek yetkili distribütörü. Bifloor, Sylomer, Roll, Point ürünleri.' }}">
    <meta name="twitter:image" content="{{ asset('images/nordean-logo.png') }}">
    <meta name="twitter:image:alt" content="NORDEAN - Isolgomma Türkiye Distribütörü Logo">

    <!-- Alternate Language Links (hreflang) -->
    <link rel="alternate" hreflang="tr" href="{{ url('/tr' . (request()->getPathInfo() === '/' ? '' : request()->getPathInfo())) }}" />
    <link rel="alternate" hreflang="en" href="{{ url('/en' . (request()->getPathInfo() === '/' ? '' : request()->getPathInfo())) }}" />
    <link rel="alternate" hreflang="x-default" href="{{ url('/') }}" />

    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-XXXXXXX');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/icon-light-32x32.png') }}" media="(prefers-color-scheme: light)">
    <link rel="icon" type="image/png" href="{{ asset('images/icon-dark-32x32.png') }}" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/icon.svg') }}">

    <!-- Styles -->
    @if(!file_exists(public_path('build/manifest.json')))
        <!-- CDN fallback (for development and production without build) -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: {
                                DEFAULT: '#B83226',
                                foreground: '#ffffff',
                            },
                            secondary: {
                                DEFAULT: '#1e293b',
                                foreground: '#ffffff',
                            },
                        }
                    }
                }
            }
        </script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <!-- Pristine.js for form validation -->
        <script src="https://cdn.jsdelivr.net/npm/pristinejs@0.1.9/dist/pristine.min.js"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
            body { font-family: 'Inter', sans-serif; }

            /* Pristine validation styles */
            .form-field {
                position: relative;
            }
            .pristine-error {
                color: #dc2626;
                font-size: 0.875rem;
                margin-top: 0.5rem;
                display: block;
            }
            .has-danger input,
            .has-danger select,
            .has-danger textarea {
                border-color: #dc2626 !important;
                background-color: #fef2f2 !important;
            }
            .has-success input,
            .has-success select,
            .has-success textarea {
                border-color: #16a34a !important;
            }
        </style>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- Flickity CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    @stack('styles')
</head>
<body class="antialiased bg-white text-gray-900">
    <!-- Header -->
    @include('partials.header')

    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Flickity JS -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    @stack('scripts')

    <!-- Smooth Scroll Navigation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll function
            function smoothScrollTo(targetElement) {
                if (!targetElement) return;

                const headerOffset = 80; // Height of fixed header + some padding
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }

            // Handle smooth scroll for all navigation links
            document.querySelectorAll('a[href*="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');

                    if (!href || href === '#') return;

                    // Extract the hash/anchor part
                    const hashIndex = href.indexOf('#');
                    if (hashIndex === -1) return;

                    const hash = href.substring(hashIndex + 1);
                    if (!hash) return;

                    // Find target element
                    const targetElement = document.getElementById(hash);

                    if (targetElement) {
                        e.preventDefault();
                        smoothScrollTo(targetElement);

                        // Update URL without jumping
                        if (history.pushState) {
                            history.pushState(null, null, '#' + hash);
                        }
                    }
                });
            });

            // Handle URL hash on page load
            if (window.location.hash) {
                setTimeout(() => {
                    const hash = window.location.hash.substring(1);
                    const targetElement = document.getElementById(hash);
                    if (targetElement) {
                        smoothScrollTo(targetElement);
                    }
                }, 100);
            }
        });
    </script>
</body>
</html>

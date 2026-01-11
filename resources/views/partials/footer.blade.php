<footer class="bg-secondary text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <!-- Company Info -->
            <div class="md:col-span-2">
                <div class="flex items-center gap-4 mb-4">
                    <img src="{{ asset('images/nordean-logo.png') }}" alt="NORDEAN Logo" class="h-12 w-auto">
                    <div class="border-l border-white/30 pl-4">
                        <h3 class="font-bold text-white tracking-wide leading-none mb-1" style="font-size: 23px;">NORDEAN</h3>
                        <p class="text-primary font-semibold tracking-wider leading-none" style="font-size: 11px;">{{ __('messages.footer.subtitle') }}</p>
                    </div>
                </div>
                <p class="text-sm text-white/80 mb-4 max-w-md leading-relaxed">
                    {{ __('messages.footer.about_description') }}
                </p>
                <div class="flex flex-col gap-2 text-sm">
                    <div class="flex items-start gap-2">
                        <svg class="h-4 w-4 mt-1 flex-shrink-0 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-white/80">
                            Yeşilkent Mah. Ardıçlı Manolya Cad. Ardıçlı Göl Evleri No:28/6 İç Kapı No:1, Avcılar, İstanbul
                        </span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="h-4 w-4 flex-shrink-0 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:+905326421443" class="text-white/80 hover:text-primary transition-colors">
                            +90 532 642 14 43
                        </a>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="h-4 w-4 flex-shrink-0 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:info@nordean.com.tr" class="text-white/80 hover:text-primary transition-colors">
                            info@nordean.com.tr
                        </a>
                    </div>
                </div>
            </div>

            <!-- Solutions -->
            <div>
                <h3 class="font-semibold mb-4">{{ __('messages.footer.solutions_title') }}</h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="#solutions" class="nav-link text-white/80 hover:text-primary transition-colors">
                            {{ __('messages.solutions.floor') }}
                        </a>
                    </li>
                    <li>
                        <a href="#solutions" class="nav-link text-white/80 hover:text-primary transition-colors">
                            {{ __('messages.solutions.wall') }}
                        </a>
                    </li>
                    <li>
                        <a href="#solutions" class="nav-link text-white/80 hover:text-primary transition-colors">
                            {{ __('messages.solutions.ceiling') }}
                        </a>
                    </li>
                    <li>
                        <a href="#solutions" class="nav-link text-white/80 hover:text-primary transition-colors">
                            {{ __('messages.solutions.vibration') }}
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Company -->
            <div>
                <h3 class="font-semibold mb-4">{{ __('messages.footer.company_title') }}</h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="#about" class="nav-link text-white/80 hover:text-primary transition-colors">
                            {{ __('messages.nav.about') }}
                        </a>
                    </li>
                    <li>
                        <a href="#products" class="nav-link text-white/80 hover:text-primary transition-colors">
                            {{ __('messages.nav.products') }}
                        </a>
                    </li>
                    <li>
                        <a href="https://www.isolgomma.com" target="_blank" rel="noopener noreferrer" class="text-white/80 hover:text-primary transition-colors">
                            Isolgomma
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-white/60">
                    &copy; {{ date('Y') }} NORDEAN Mühendislik. {{ __('messages.footer.rights') }}
                </p>
                <p class="text-sm text-white/60">www.nordean.com.tr</p>
            </div>
        </div>
    </div>
</footer>

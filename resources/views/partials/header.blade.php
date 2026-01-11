<header class="fixed top-0 left-0 right-0 z-50 bg-white backdrop-blur-md border-b border-gray-200" x-data="{ mobileMenuOpen: false }">
    <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/nordean-logo.png') }}" alt="NORDEAN Logo" class="h-16 w-auto">
                    <div class="hidden sm:block border-l border-gray-300 pl-3">
                        <div class="font-bold text-gray-900 leading-none tracking-wide" style="font-size: 17px;">NORDEAN</div>
                        <div class="font-semibold text-primary leading-none tracking-wider" style="font-size: 11px;">{{ __('messages.footer.subtitle') }}</div>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:gap-8">
                <a href="#home" class="nav-link text-sm font-medium text-gray-900 hover:text-primary transition-colors">
                    {{ __('messages.nav.home') }}
                </a>
                <a href="#about" class="nav-link text-sm font-medium text-gray-900 hover:text-primary transition-colors">
                    {{ __('messages.nav.about') }}
                </a>
                <a href="#solutions" class="nav-link text-sm font-medium text-gray-900 hover:text-primary transition-colors">
                    {{ __('messages.nav.solutions') }}
                </a>
                <a href="#products" class="nav-link text-sm font-medium text-gray-900 hover:text-primary transition-colors">
                    {{ __('messages.nav.products') }}
                </a>
                <a href="#contact" class="nav-link text-sm font-medium text-gray-900 hover:text-primary transition-colors">
                    {{ __('messages.nav.contact') }}
                </a>

                <!-- Language Switcher -->
                <div class="flex items-center gap-2 border-l pl-4 ml-4">
                    <a href="{{ route('lang.switch', 'tr') }}"
                       class="px-3 py-1 text-sm font-medium rounded {{ app()->getLocale() == 'tr' ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                        TR
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}"
                       class="px-3 py-1 text-sm font-medium rounded {{ app()->getLocale() == 'en' ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                        EN
                    </a>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="flex md:hidden items-center gap-3">
                <!-- Language Switcher Mobile -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('lang.switch', 'tr') }}"
                       class="px-2 py-1 text-xs font-medium rounded {{ app()->getLocale() == 'tr' ? 'bg-primary text-white' : 'text-gray-700' }}">
                        TR
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}"
                       class="px-2 py-1 text-xs font-medium rounded {{ app()->getLocale() == 'en' ? 'bg-primary text-white' : 'text-gray-700' }}">
                        EN
                    </a>
                </div>
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2">
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden py-4 border-t border-gray-200"
             style="display: none;">
            <div class="flex flex-col gap-4">
                <a href="#home" @click="mobileMenuOpen = false"
                   class="nav-link text-sm font-medium text-gray-900 hover:text-primary transition-colors">
                    {{ __('messages.nav.home') }}
                </a>
                <a href="#about" @click="mobileMenuOpen = false"
                   class="nav-link text-sm font-medium text-gray-900 hover:text-primary transition-colors">
                    {{ __('messages.nav.about') }}
                </a>
                <a href="#solutions" @click="mobileMenuOpen = false"
                   class="nav-link text-sm font-medium text-gray-900 hover:text-primary transition-colors">
                    {{ __('messages.nav.solutions') }}
                </a>
                <a href="#products" @click="mobileMenuOpen = false"
                   class="nav-link text-sm font-medium text-gray-900 hover:text-primary transition-colors">
                    {{ __('messages.nav.products') }}
                </a>
                <a href="#contact" @click="mobileMenuOpen = false"
                   class="nav-link text-sm font-medium text-gray-900 hover:text-primary transition-colors">
                    {{ __('messages.nav.contact') }}
                </a>
            </div>
        </div>
    </nav>
</header>

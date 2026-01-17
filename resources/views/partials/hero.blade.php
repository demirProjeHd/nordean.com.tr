<section id="{{ __('messages.slugs.home') }}"
         class="relative min-h-[600px] md:min-h-[700px] flex items-center overflow-hidden"
         x-data="heroSlider()">
    <!-- Slider Images -->
    <div class="absolute inset-0">
        <template x-for="(slide, index) in slides" :key="index">
            <div class="absolute inset-0 transition-opacity duration-1000"
                 :class="index === currentSlide ? 'opacity-100' : 'opacity-0'">
                <img :src="slide.image"
                     alt="Acoustic insulation"
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/95 to-gray-900/70"></div>
            </div>
        </template>
    </div>

    <!-- Content -->
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-24 z-10">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6 text-white transition-all duration-500"
                x-text="getCurrentSlideText('title')">
            </h1>
            <p class="text-lg md:text-xl text-white/90 leading-relaxed mb-8 transition-all duration-500"
               x-text="getCurrentSlideText('subtitle')">
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#{{ __('messages.slugs.solutions') }}" class="nav-link inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white rounded-lg font-semibold hover:bg-primary/90 transition-all shadow-lg hover:shadow-xl">
                    {{ __('messages.hero.cta') }}
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                <a href="#{{ __('messages.slugs.contact') }}" class="nav-link inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/10 text-white rounded-lg font-semibold border-2 border-white hover:bg-white hover:text-gray-900 transition-all backdrop-blur-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    {{ __('messages.hero.contact') }}
                </a>
            </div>
        </div>
    </div>

    <!-- Navigation Arrows -->
    <button @click="prevSlide()"
            class="absolute left-4 top-1/2 -translate-y-1/2 z-20 p-2 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-sm transition-all"
            aria-label="Previous slide">
        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
    <button @click="nextSlide()"
            class="absolute right-4 top-1/2 -translate-y-1/2 z-20 p-2 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-sm transition-all"
            aria-label="Next slide">
        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </button>

    <!-- Slide Indicators -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-2">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="goToSlide(index)"
                    class="h-2 rounded-full transition-all"
                    :class="index === currentSlide ? 'bg-primary w-8' : 'bg-white/40 w-2 hover:bg-white/60'"
                    :aria-label="'Go to slide ' + (index + 1)">
            </button>
        </template>
    </div>

    <!-- Decorative Element -->
    <div class="absolute -right-32 top-1/2 -translate-y-1/2 w-96 h-96 bg-primary/20 rounded-full blur-3xl"></div>
</section>

@push('scripts')
<script>
function heroSlider() {
    return {
        currentSlide: 0,
        slides: @json($sliders->map(function($slider) {
            return [
                'image' => asset($slider->background_image),
                'title' => $slider->{"title_" . app()->getLocale()},
                'subtitle' => $slider->{"subtitle_" . app()->getLocale()}
            ];
        })),
        init() {
            setInterval(() => {
                this.nextSlide();
            }, 5000);
        },
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        },
        prevSlide() {
            this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
        },
        goToSlide(index) {
            this.currentSlide = index;
        },
        getCurrentSlideText(type) {
            return this.slides[this.currentSlide][type];
        }
    }
}
</script>
@endpush

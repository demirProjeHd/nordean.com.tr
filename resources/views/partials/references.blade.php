<!-- References Section -->
<section id="{{ __('messages.slugs.references') }}" class="py-16 md:py-24 bg-gray-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-red-100 text-primary rounded-full text-sm font-semibold mb-4">
                {{ __('messages.references.badge') }}
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ __('messages.references.title') }}
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                {{ __('messages.references.subtitle') }}
            </p>
        </div>

        <!-- References Slider -->
        <div class="relative" x-data="referencesLightbox()" x-on:keydown.escape.window="closeLightbox()">
            <!-- Flickity Container -->
            <div class="references-carousel max-w-[1216px] mx-auto px-4 mb-6">
                @php
                    // Group references by 8 (2 rows x 4 columns on desktop)
                    $chunked = $references->chunk(8);
                @endphp
                @foreach($chunked as $chunk)
                <div class="carousel-cell w-full px-2">
                    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 grid-rows-2 gap-3">
                        @foreach($chunk as $reference)
                        <div @click="openLightbox({{ json_encode([
                            'name' => $reference->{'name_' . app()->getLocale()},
                            'description' => $reference->{'description_' . app()->getLocale()},
                            'category' => $reference->{'category_' . app()->getLocale()},
                            'image' => $reference->image
                        ]) }})"
                             class="group bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 cursor-pointer h-36 lg:h-40">
                            <div class="relative w-full h-full overflow-hidden bg-gray-100">
                                <img src="{{ asset($reference->image) }}"
                                     alt="{{ $reference->{'name_' . app()->getLocale()} }}"
                                     loading="lazy"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                <!-- Category Badge -->
                                <div class="absolute top-2 right-2">
                                    <span class="inline-block px-2 py-1 bg-primary/90 backdrop-blur-sm text-white rounded-full text-xs font-semibold">
                                        {{ $reference->{'category_' . app()->getLocale()} }}
                                    </span>
                                </div>

                                <!-- Project Info on Hover -->
                                <div class="absolute inset-0 p-3 flex flex-col justify-end opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <h3 class="text-white font-bold text-xs mb-0.5 leading-tight line-clamp-2">
                                        {{ $reference->{'name_' . app()->getLocale()} }}
                                    </h3>
                                    <p class="text-white/90 text-[10px] leading-tight line-clamp-2">
                                        {{ $reference->{'description_' . app()->getLocale()} }}
                                    </p>
                                </div>

                                <!-- Click indicator -->
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-full p-2">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Navigation - Centered Below Slider -->
            <div class="flex items-center justify-center gap-2 mt-4">
                <!-- Previous Button -->
                <button class="references-button-prev w-11 h-11 flex items-center justify-center rounded-full bg-white hover:bg-primary hover:text-white text-gray-900 transition-all shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed flex-shrink-0"
                        aria-label="Previous references">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <!-- Pagination Dots -->
                <div class="references-pagination flex gap-2 w-auto justify-center"></div>

                <!-- Next Button -->
                <button class="references-button-next w-11 h-11 flex items-center justify-center rounded-full bg-primary hover:bg-primary/90 text-white transition-all shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed flex-shrink-0"
                        aria-label="Next references">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Lightbox Modal -->
            <div x-show="lightboxOpen"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm"
                 style="display: none;"
                 @click="closeLightbox()">

                <!-- Modal Content -->
                <div @click.stop
                     x-show="lightboxOpen"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="relative bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden">

                    <!-- Close Button -->
                    <button @click="closeLightbox()"
                            class="absolute top-4 right-4 z-10 p-2 bg-black/50 hover:bg-black/70 text-white rounded-full transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <div class="grid md:grid-cols-2 gap-0 max-h-[90vh] overflow-y-auto">
                        <!-- Image Side -->
                        <div class="relative aspect-[4/3] md:aspect-auto md:min-h-[500px] bg-gray-100">
                            <!-- Reference Image -->
                            <template x-if="selectedProject && selectedProject.image">
                                <img :src="`{{ asset('') }}${selectedProject.image}`"
                                     :alt="selectedProject.name"
                                     onerror="this.style.display='none';"
                                     class="w-full h-full object-cover absolute inset-0">
                            </template>
                            <!-- Logo Fallback (always in background) -->
                            <div class="w-full h-full flex items-center justify-center bg-white p-12">
                                <img src="{{ asset('images/nordean-logo.png') }}" alt="NORDEAN Logo" class="max-w-[60%] max-h-[60%] object-contain opacity-40">
                            </div>
                            <!-- Category Badge -->
                            <template x-if="selectedProject && selectedProject.category">
                                <div class="absolute top-4 left-4 z-10">
                                    <span class="inline-block px-3 py-1.5 bg-primary text-white rounded-full text-sm font-semibold"
                                          x-text="selectedProject?.category"></span>
                                </div>
                            </template>
                        </div>

                        <!-- Content Side -->
                        <div class="p-8 md:p-10 flex flex-col justify-center">
                            <div class="mb-4">
                                <div class="flex items-center gap-2 mb-4">
                                    <div class="h-1 w-12 bg-primary rounded-full"></div>
                                    <span class="text-sm font-semibold text-primary uppercase tracking-wider">
                                        {{ __('messages.references.badge') }}
                                    </span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-4"
                                    x-text="selectedProject?.name"></h3>
                                <p class="text-lg text-gray-600 leading-relaxed"
                                   x-text="selectedProject?.description"></p>
                            </div>

                            <!-- Additional Info -->
                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <div class="flex items-center gap-3 text-sm text-gray-500">
                                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    <span>
                                        <span class="font-semibold text-gray-900">{{ __('messages.products.badge') }}:</span>
                                        <span x-text="selectedProject?.category"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
function referencesLightbox() {
    return {
        lightboxOpen: false,
        selectedProject: null,
        openLightbox(project) {
            this.selectedProject = project;
            this.lightboxOpen = true;
            document.body.style.overflow = 'hidden';
        },
        closeLightbox() {
            this.lightboxOpen = false;
            document.body.style.overflow = '';
            setTimeout(() => {
                this.selectedProject = null;
            }, 300);
        }
    }
}

// Initialize References Flickity
document.addEventListener('DOMContentLoaded', function() {
    const referencesCarousel = document.querySelector('.references-carousel');
    if (referencesCarousel) {
        const referencesCount = referencesCarousel.querySelectorAll('.carousel-cell').length;
        const referencesFlickity = new Flickity(referencesCarousel, {
            cellAlign: 'left',
            contain: true,
            pageDots: false,
            prevNextButtons: false,
            groupCells: false,
            wrapAround: false,
            adaptiveHeight: false,
            watchCSS: false,
            autoPlay: 4000,
            pauseAutoPlayOnHover: true,
        });

        // Custom navigation buttons
        const prevButton = document.querySelector('.references-button-prev');
        const nextButton = document.querySelector('.references-button-next');

        if (prevButton) {
            prevButton.addEventListener('click', function() {
                referencesFlickity.previous();
            });
        }

        if (nextButton) {
            nextButton.addEventListener('click', function() {
                referencesFlickity.next();
            });
        }

        // Custom pagination dots
        const paginationContainer = document.querySelector('.references-pagination');
        const navigationContainer = paginationContainer?.parentElement;

        if (paginationContainer) {
            // Wait for Flickity to be ready
            setTimeout(() => {
                const pageCount = referencesFlickity.slides.length;
                console.log('References:', referencesCount, 'cards,', pageCount, 'pages');

                // Hide navigation if only 1 page
                if (pageCount <= 1) {
                    if (navigationContainer) {
                        navigationContainer.style.display = 'none';
                    }
                    return;
                }

                // Show navigation if hidden
                if (navigationContainer) {
                    navigationContainer.style.display = 'flex';
                }

                // Create dots based on page count (not card count)
                for (let i = 0; i < pageCount; i++) {
                    const dot = document.createElement('button');
                    dot.className = 'w-3 h-3 rounded-full bg-black transition-all';

                    // First bullet is active (expanded) by default
                    if (i === 0) {
                        dot.style.width = '40px';
                        dot.style.borderRadius = '6px';
                        dot.style.opacity = '1';
                    } else {
                        dot.style.width = '12px';
                        dot.style.borderRadius = '50%';
                        dot.style.opacity = '0.3';
                    }

                    dot.setAttribute('aria-label', 'Go to page ' + (i + 1));
                    dot.addEventListener('click', function() {
                        referencesFlickity.select(i);
                    });
                    paginationContainer.appendChild(dot);
                }

                // Update dots on slide change
                referencesFlickity.on('change', function(index) {
                    const dots = paginationContainer.querySelectorAll('button');
                    dots.forEach((dot, i) => {
                        if (i === index) {
                            dot.style.width = '40px';
                            dot.style.borderRadius = '6px';
                            dot.style.opacity = '1';
                        } else {
                            dot.style.width = '12px';
                            dot.style.borderRadius = '50%';
                            dot.style.opacity = '0.3';
                        }
                    });
                });
            }, 100);
        }
    }
});
</script>
@endpush

<?php $__env->startSection('content'); ?>
    <!-- Hero Section with Slider -->
    <?php echo $__env->make('partials.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- About Section -->
    <section id="<?php echo e(__('messages.slugs.about')); ?>" class="py-20 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Left Side - Content -->
                <div>
                    <span class="inline-block px-4 py-2 bg-red-100 text-primary rounded-full text-sm font-semibold mb-4">
                        <?php echo e(__('messages.about.badge')); ?>

                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                        <?php echo e($pageContents['about']->{'title_' . app()->getLocale()} ?? ''); ?>

                    </h2>
                    <p class="text-lg text-gray-600 leading-relaxed mb-8">
                        <?php echo e($pageContents['about']->{'content_' . app()->getLocale()} ?? ''); ?>

                    </p>

                    <div class="relative rounded-lg overflow-hidden aspect-video">
                        <img src="<?php echo e(asset('images/professional-sound-insulation-consultation-archite.jpg')); ?>"
                             alt="NORDEAN Professional Team"
                             loading="lazy"
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>
                </div>

                <!-- Right Side - Mission & Vision -->
                <div class="grid gap-6">
                    <div class="bg-white rounded-xl p-8 shadow-md hover:shadow-lg transition-shadow border border-gray-100">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-red-100 rounded-lg">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo e($pageContents['mission']->{'title_' . app()->getLocale()} ?? ''); ?></h3>
                                <p class="text-gray-600 leading-relaxed"><?php echo e($pageContents['mission']->{'content_' . app()->getLocale()} ?? ''); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-8 shadow-md hover:shadow-lg transition-shadow border border-gray-100">
                        <div class="flex items-start gap-4">
                            <div class="p-3 bg-red-100 rounded-lg">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo e($pageContents['vision']->{'title_' . app()->getLocale()} ?? ''); ?></h3>
                                <p class="text-gray-600 leading-relaxed"><?php echo e($pageContents['vision']->{'content_' . app()->getLocale()} ?? ''); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Isolgomma Section -->
    <section id="<?php echo e(__('messages.slugs.isolgomma')); ?>" class="py-20 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-red-100 text-primary rounded-full text-sm font-semibold mb-4">
                    <?php echo e(__('messages.isolgomma.badge')); ?>

                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    <?php echo e($pageContents['isolgomma']->{'title_' . app()->getLocale()} ?? ''); ?>

                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    <?php echo e($pageContents['isolgomma']->{'content_' . app()->getLocale()} ?? ''); ?>

                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <?php
                    $features = $pageContents['isolgomma_features']->extra_data ?? [];
                    $locale = app()->getLocale();
                    $colors = ['red', 'green', 'purple'];
                ?>
                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="text-center p-6 bg-white rounded-xl shadow-sm">
                    <div class="w-16 h-16 bg-<?php echo e($colors[$index % 3]); ?>-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-<?php echo e($colors[$index % 3]); ?>-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <?php if($index == 0): ?>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                            <?php elseif($index == 1): ?>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            <?php else: ?>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            <?php endif; ?>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2"><?php echo e($feature['title_' . $locale] ?? ''); ?></h3>
                    <p class="text-gray-600"><?php echo e($feature['description_' . $locale] ?? ''); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- Solutions Section -->
    <section id="<?php echo e(__('messages.slugs.solutions')); ?>" class="py-20 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-red-100 text-primary rounded-full text-sm font-semibold mb-4">
                    <?php echo e(__('messages.solutions.badge')); ?>

                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    <?php echo e(__('messages.solutions.title')); ?>

                </h2>
            </div>

            <!-- Flickity Container -->
            <div class="relative" x-data="solutionsLightbox()" x-on:keydown.escape.window="closeLightbox()">
                <div class="solutions-carousel max-w-[1216px] mx-auto px-4 mb-6">
                    <?php $__currentLoopData = $solutions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-cell px-3">
                        <div @click="openLightbox(<?php echo e(json_encode([
                            'title' => $solution->{'title_' . app()->getLocale()},
                            'description' => $solution->{'description_' . app()->getLocale()},
                            'image' => $solution->image,
                            'icon' => $solution->icon
                        ])); ?>)"
                             class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 h-full cursor-pointer flex flex-col">
                            <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
                                <img src="<?php echo e(asset($solution->image)); ?>"
                                     alt="<?php echo e($solution->{'title_' . app()->getLocale()}); ?>"
                                     loading="lazy"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                                <div class="absolute bottom-3 left-3 p-2.5 bg-primary rounded-lg shadow-lg">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <?php echo $solution->icon; ?>

                                    </svg>
                                </div>
                                <!-- Zoom Icon -->
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-full p-2">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-primary transition-colors">
                                    <?php echo e($solution->{'title_' . app()->getLocale()}); ?>

                                </h3>
                                <p class="text-sm text-gray-600 leading-relaxed"><?php echo e($solution->{'description_' . app()->getLocale()}); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Navigation - Centered Below Slider -->
                <div class="flex items-center justify-center gap-2 mt-4">
                    <!-- Previous Button -->
                    <button class="solutions-button-prev w-11 h-11 flex items-center justify-center rounded-full bg-white hover:bg-primary hover:text-white text-gray-900 transition-all shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed flex-shrink-0"
                            aria-label="Previous solutions">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>

                    <!-- Pagination Dots -->
                    <div class="solutions-pagination flex gap-2 w-auto justify-center"></div>

                    <!-- Next Button -->
                    <button class="solutions-button-next w-11 h-11 flex items-center justify-center rounded-full bg-primary hover:bg-primary/90 text-white transition-all shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed flex-shrink-0"
                            aria-label="Next solutions">
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
                                <!-- Solution Image -->
                                <template x-if="selectedSolution && selectedSolution.image">
                                    <img :src="`<?php echo e(asset('')); ?>${selectedSolution.image}`"
                                         :alt="selectedSolution.title"
                                         onerror="this.style.display='none';"
                                         class="w-full h-full object-cover absolute inset-0">
                                </template>
                                <!-- Logo Fallback (always in background) -->
                                <div class="w-full h-full flex items-center justify-center bg-white p-12">
                                    <img src="<?php echo e(asset('images/nordean-logo.png')); ?>" alt="NORDEAN Logo" class="max-w-[60%] max-h-[60%] object-contain opacity-40">
                                </div>
                                <!-- Icon Badge -->
                                <template x-if="selectedSolution && selectedSolution.icon">
                                    <div class="absolute top-4 left-4 z-10">
                                        <div class="p-2.5 bg-primary rounded-lg shadow-lg">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-html="selectedSolution?.icon">
                                            </svg>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <!-- Content Side -->
                            <div class="p-8 md:p-10 flex flex-col justify-center">
                                <div class="mb-4">
                                    <div class="flex items-center gap-2 mb-4">
                                        <div class="h-1 w-12 bg-primary rounded-full"></div>
                                        <span class="text-sm font-semibold text-primary uppercase tracking-wider">
                                            <?php echo e(__('messages.solutions.badge')); ?>

                                        </span>
                                    </div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-4"
                                        x-text="selectedSolution?.title"></h3>
                                    <p class="text-lg text-gray-600 leading-relaxed"
                                       x-text="selectedSolution?.description"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $__env->startPush('scripts'); ?>
    <script>
    function solutionsLightbox() {
        return {
            lightboxOpen: false,
            selectedSolution: null,
            openLightbox(solution) {
                this.selectedSolution = solution;
                this.lightboxOpen = true;
                document.body.style.overflow = 'hidden';
            },
            closeLightbox() {
                this.lightboxOpen = false;
                document.body.style.overflow = '';
                setTimeout(() => {
                    this.selectedSolution = null;
                }, 300);
            }
        }
    }

    // Initialize Solutions Flickity
    document.addEventListener('DOMContentLoaded', function() {
        const solutionsCarousel = document.querySelector('.solutions-carousel');
        if (solutionsCarousel) {
            const solutionsCount = solutionsCarousel.querySelectorAll('.carousel-cell').length;
            const solutionsFlickity = new Flickity(solutionsCarousel, {
                cellAlign: 'left',
                contain: true,
                pageDots: false,
                prevNextButtons: false,
                groupCells: true,
                wrapAround: false,
                adaptiveHeight: false,
                watchCSS: false,
                autoPlay: 4000,
                pauseAutoPlayOnHover: true,
                on: {
                    ready: function() {
                        const pageCount = this.slides.length;
                        console.log('Solutions Flickity ready:', solutionsCount, 'cards,', pageCount, 'pages');
                    }
                }
            });

            // Custom navigation buttons
            const prevButton = document.querySelector('.solutions-button-prev');
            const nextButton = document.querySelector('.solutions-button-next');

            if (prevButton) {
                prevButton.addEventListener('click', function() {
                    solutionsFlickity.previous();
                });
            }

            if (nextButton) {
                nextButton.addEventListener('click', function() {
                    solutionsFlickity.next();
                });
            }

            // Custom pagination dots
            const paginationContainer = document.querySelector('.solutions-pagination');
            const navigationContainer = paginationContainer?.parentElement;

            if (paginationContainer) {
                // Wait for Flickity to be ready and get actual page count
                setTimeout(() => {
                    const pageCount = solutionsFlickity.slides.length;
                    console.log('Creating', pageCount, 'pagination dots for Solutions');

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

                    // Create dots based on page count
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
                            solutionsFlickity.select(i);
                        });
                        paginationContainer.appendChild(dot);
                    }

                    // Update dots on slide change
                    solutionsFlickity.on('change', function(index) {
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
    <?php $__env->stopPush(); ?>

    <!-- Product Categories Table Section -->
    <section id="<?php echo e(__('messages.slugs.products')); ?>" class="py-20 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-red-100 text-primary rounded-full text-sm font-semibold mb-4">
                    <?php echo e(app()->getLocale() == 'tr' ? 'Ürün Grupları' : 'Product Groups'); ?>

                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    <?php echo e(app()->getLocale() == 'tr' ? 'Kategorilere Göre Ürünler' : 'Products by Category'); ?>

                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    <?php echo e(app()->getLocale() == 'tr' ? 'Tüm akustik yalıtım ürünlerimizi kategorilere göre inceleyin' : 'Browse all our acoustic insulation products by category'); ?>

                </p>
            </div>

            <!-- Category Tabs -->
            <div x-data="{
                activeTab: <?php echo e($categories->first()->id ?? 1); ?>,
                switchTab(tabId) {
                    this.activeTab = tabId;
                    // Reinitialize Flickity after tab switch
                    this.$nextTick(() => {
                        setTimeout(() => {
                            if (window.productCarousels && window.productCarousels[tabId]) {
                                const carousel = window.productCarousels[tabId];
                                // Destroy and reinitialize to fix layout issues
                                carousel.destroy();

                                // Reinitialize the carousel
                                const carouselElement = document.querySelector('.products-carousel-' + tabId);
                                if (carouselElement) {
                                    window.initProductCarousel(tabId);
                                }
                            }
                        }, 50);
                    });
                }
            }">
                <!-- Tab Navigation -->
                <div class="border-b border-gray-200 mb-8">
                    <nav class="flex flex-wrap -mb-px justify-center gap-x-8" aria-label="Tabs">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button
                            @click="switchTab(<?php echo e($category->id); ?>)"
                            :class="activeTab === <?php echo e($category->id); ?> ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="product-tab-btn group inline-flex items-center gap-2 py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                            <?php if($category->icon): ?>
                            <div class="w-5 h-5" :class="activeTab === <?php echo e($category->id); ?> ? 'text-primary' : 'text-gray-400 group-hover:text-gray-500'">
                                <?php echo $category->icon; ?>

                            </div>
                            <?php endif; ?>
                            <span><?php echo e($category->{'name_' . app()->getLocale()}); ?></span>
                        </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </nav>
                </div>

                <!-- Tab Content -->
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    x-show="activeTab === <?php echo e($category->id); ?>"
                    x-cloak
                    class="product-tab-content relative"
                    x-data="categoryLightbox<?php echo e($category->id); ?>()"
                    x-on:keydown.escape.window="closeLightbox()">

                    <?php if($category->products->count() > 0): ?>
                    <!-- Flickity Carousel -->
                    <div class="products-carousel-<?php echo e($category->id); ?> max-w-[1216px] mx-auto mb-6">
                        <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-cell w-full sm:w-1/2 lg:w-1/3 xl:w-1/4 px-3">
                                <div @click="openLightbox(<?php echo e(json_encode([
                                    'name' => $product->{'name_' . app()->getLocale()},
                                    'description' => $product->{'description_' . app()->getLocale()},
                                    'image' => $product->image,
                                    'pdfs' => $product->pdfs
                                ])); ?>)"
                                     class="product-card group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 cursor-pointer flex flex-col h-full">
                                    <!-- Product Image - Fixed Height: 230px on desktop, responsive on mobile -->
                                    <div class="relative w-full h-40 sm:h-48 md:h-52 lg:h-[230px] overflow-hidden bg-gray-100 flex-shrink-0">
                                        <?php if($product->image): ?>
                                        <img src="<?php echo e(asset($product->image)); ?>"
                                             alt="<?php echo e($product->{'name_' . app()->getLocale()}); ?>"
                                             loading="lazy"
                                             onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');"
                                             class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-500">
                                        <div class="hidden w-full h-full flex items-center justify-center bg-white p-8">
                                            <img src="<?php echo e(asset('images/nordean-logo.png')); ?>" alt="NORDEAN Logo" class="max-w-[70%] max-h-[70%] object-contain opacity-40">
                                        </div>
                                        <?php else: ?>
                                        <div class="w-full h-full flex items-center justify-center bg-white p-8">
                                            <img src="<?php echo e(asset('images/nordean-logo.png')); ?>" alt="NORDEAN Logo" class="max-w-[70%] max-h-[70%] object-contain opacity-40">
                                        </div>
                                        <?php endif; ?>
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                        <!-- Click indicator -->
                                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <div class="bg-white/20 backdrop-blur-sm rounded-full p-3">
                                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card Content -->
                                    <div class="p-4 flex-grow flex flex-col">
                                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-1">
                                            <?php echo e($product->{'name_' . app()->getLocale()}); ?>

                                        </h3>
                                        <p class="text-sm text-gray-600 line-clamp-3">
                                            <?php echo e(Str::limit($product->{'description_' . app()->getLocale()}, 120)); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Navigation - Centered Below Slider -->
                    <div class="flex items-center justify-center gap-2 mt-4">
                        <!-- Previous Button -->
                        <button class="products-button-prev-<?php echo e($category->id); ?> w-11 h-11 flex items-center justify-center rounded-full bg-white hover:bg-primary hover:text-white text-gray-900 transition-all shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed flex-shrink-0"
                                aria-label="Previous products">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>

                        <!-- Pagination Dots -->
                        <div class="products-pagination-<?php echo e($category->id); ?> flex gap-2 w-auto justify-center"></div>

                        <!-- Next Button -->
                        <button class="products-button-next-<?php echo e($category->id); ?> w-11 h-11 flex items-center justify-center rounded-full bg-primary hover:bg-primary/90 text-white transition-all shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed flex-shrink-0"
                                aria-label="Next products">
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
                             class="relative bg-white rounded-2xl shadow-2xl max-w-5xl w-full max-h-[90vh] overflow-hidden">

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
                                    <!-- Product Image -->
                                    <template x-if="selectedProduct && selectedProduct.image">
                                        <img :src="`<?php echo e(asset('')); ?>${selectedProduct.image}`"
                                             :alt="selectedProduct.name"
                                             onerror="this.style.display='none';"
                                             class="w-full h-full object-cover absolute inset-0">
                                    </template>
                                    <!-- Logo Fallback (always in background) -->
                                    <div class="w-full h-full flex items-center justify-center bg-white p-12">
                                        <img src="<?php echo e(asset('images/nordean-logo.png')); ?>" alt="NORDEAN Logo" class="max-w-[60%] max-h-[60%] object-contain opacity-40">
                                    </div>
                                </div>

                                <!-- Content Side -->
                                <div class="p-8 md:p-10 flex flex-col justify-center">
                                    <div class="mb-6">
                                        <div class="flex items-center gap-2 mb-4">
                                            <div class="h-1 w-12 bg-primary rounded-full"></div>
                                            <span class="text-sm font-semibold text-primary uppercase tracking-wider">
                                                <?php echo e(app()->getLocale() == 'tr' ? 'Ürün Detayı' : 'Product Detail'); ?>

                                            </span>
                                        </div>
                                        <h3 class="text-3xl font-bold text-gray-900 mb-4"
                                            x-text="selectedProduct?.name"></h3>
                                        <div class="text-base text-gray-600 leading-relaxed whitespace-pre-wrap"
                                             x-text="selectedProduct?.description"></div>
                                    </div>

                                    <!-- Technical Documentation PDFs -->
                                    <template x-if="selectedProduct?.pdfs && selectedProduct.pdfs.length > 0">
                                        <div class="pt-6 border-t border-gray-200">
                                            <h4 class="text-sm font-semibold text-gray-900 mb-3 uppercase tracking-wider">
                                                <?php echo e(app()->getLocale() == 'tr' ? 'Teknik Dökümanlar' : 'Technical Documents'); ?>

                                            </h4>
                                            <div class="space-y-2">
                                                <template x-for="(pdf, index) in selectedProduct.pdfs" :key="index">
                                                    <a :href="`/storage/${pdf}`"
                                                       target="_blank"
                                                       class="flex items-center gap-3 p-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors group">
                                                        <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                        </svg>
                                                        <span class="text-sm text-gray-700 group-hover:text-gray-900 font-medium flex-1" x-text="pdf.split('/').pop()"></span>
                                                        <svg class="w-4 h-4 text-gray-400 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                        </svg>
                                                    </a>
                                                </template>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php else: ?>
                    <div class="p-12 text-center bg-white rounded-xl shadow-lg border border-gray-200">
                        <div class="text-gray-400 mb-4">
                            <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <p class="text-gray-500">
                            <?php echo e(app()->getLocale() == 'tr' ? 'Bu kategoride henüz ürün bulunmamaktadır.' : 'No products in this category yet.'); ?>

                        </p>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <?php $__env->startPush('scripts'); ?>
    <script>
    // Lightbox functions for each category
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    function categoryLightbox<?php echo e($category->id); ?>() {
        return {
            lightboxOpen: false,
            selectedProduct: null,
            openLightbox(product) {
                this.selectedProduct = product;
                this.lightboxOpen = true;
                document.body.style.overflow = 'hidden';
            },
            closeLightbox() {
                this.lightboxOpen = false;
                document.body.style.overflow = '';
                setTimeout(() => {
                    this.selectedProduct = null;
                }, 300);
            }
        }
    }
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    // Initialize Flickity for product carousels
    window.productCarousels = {};
    window.productCarouselHandlers = {};

    // Function to initialize a single product carousel
    window.initProductCarousel = function(categoryId) {
        const carouselElement = document.querySelector('.products-carousel-' + categoryId);
        if (!carouselElement) return;

        const productsCount = carouselElement.querySelectorAll('.carousel-cell').length;

        // Initialize Flickity
        window.productCarousels[categoryId] = new Flickity(carouselElement, {
            cellAlign: 'left',
            contain: true,
            pageDots: false,
            prevNextButtons: false,
            groupCells: true,
            adaptiveHeight: false,
            watchCSS: false,
            autoPlay: 4000,
            pauseAutoPlayOnHover: true,
            on: {
                ready: function() {
                    console.log('Flickity ready for category', categoryId);
                }
            }
        });

        const flickityInstance = window.productCarousels[categoryId];

        // Custom navigation buttons
        const prevButton = document.querySelector('.products-button-prev-' + categoryId);
        const nextButton = document.querySelector('.products-button-next-' + categoryId);

        // Remove old event listeners if they exist
        if (window.productCarouselHandlers[categoryId]) {
            if (prevButton && window.productCarouselHandlers[categoryId].prev) {
                prevButton.removeEventListener('click', window.productCarouselHandlers[categoryId].prev);
            }
            if (nextButton && window.productCarouselHandlers[categoryId].next) {
                nextButton.removeEventListener('click', window.productCarouselHandlers[categoryId].next);
            }
        }

        // Create new handlers
        const prevHandler = function() {
            flickityInstance.previous();
        };
        const nextHandler = function() {
            flickityInstance.next();
        };

        // Store handlers for cleanup
        window.productCarouselHandlers[categoryId] = {
            prev: prevHandler,
            next: nextHandler
        };

        if (prevButton) {
            prevButton.addEventListener('click', prevHandler);
        }

        if (nextButton) {
            nextButton.addEventListener('click', nextHandler);
        }

        // Custom pagination dots
        const paginationContainer = document.querySelector('.products-pagination-' + categoryId);
        const navigationContainer = paginationContainer?.parentElement;

        if (paginationContainer) {
            // Clear existing dots
            paginationContainer.innerHTML = '';

            // Wait for Flickity to be ready
            setTimeout(() => {
                const pageCount = flickityInstance.slides.length;
                console.log('Category', categoryId + ':', productsCount, 'cards,', pageCount, 'pages');

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
                        flickityInstance.select(i);
                    });
                    paginationContainer.appendChild(dot);
                }

                // Update dots on slide change
                flickityInstance.on('change', function(index) {
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
    };

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize all Flickity carousels
        setTimeout(() => {
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            window.initProductCarousel(<?php echo e($category->id); ?>);
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        }, 500);
    });
    </script>
    <?php $__env->stopPush(); ?>

    <!-- References Section -->
    <?php echo $__env->make('partials.references', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Contact Section -->
    <section id="<?php echo e(__('messages.slugs.contact')); ?>" class="py-20 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-red-100 text-primary rounded-full text-sm font-semibold mb-4">
                    <?php echo e(__('messages.contact.badge')); ?>

                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    <?php echo e(__('messages.contact.title')); ?>

                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    <?php echo e(__('messages.contact.description')); ?>

                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="bg-white rounded-2xl shadow-lg p-8" x-data="contactForm()">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6"><?php echo e(__('messages.contact.form_title')); ?></h3>

                    <!-- Success Message -->
                    <div x-show="success"
                         x-transition
                         class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        <p class="font-semibold"><?php echo e(__('messages.contact.success_title')); ?></p>
                        <p class="text-sm"><?php echo e(__('messages.contact.success_message')); ?></p>
                    </div>

                    <!-- Error Message -->
                    <div x-show="error"
                         x-transition
                         class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <p class="font-semibold"><?php echo e(__('messages.contact.error_title')); ?></p>
                        <p class="text-sm" x-text="errorMessage"></p>
                    </div>

                    <form id="contactForm" @submit.prevent="submitForm" class="space-y-4" novalidate>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-field">
                                <label for="contact_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    <?php echo e(__('messages.contact.name')); ?> *
                                </label>
                                <input type="text"
                                       id="contact_name"
                                       name="name"
                                       x-model="formData.name"
                                       required
                                       data-pristine-required-message="<?php echo e(__('validation.custom.name.required')); ?>"
                                       minlength="3"
                                       data-pristine-minlength-message="<?php echo e(__('validation.custom.name.minlength')); ?>"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition"
                                       placeholder="<?php echo e(__('messages.contact.name_placeholder')); ?>">
                            </div>
                            <div class="form-field">
                                <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">
                                    <?php echo e(__('messages.contact.email')); ?> *
                                </label>
                                <input type="email"
                                       id="contact_email"
                                       name="email"
                                       x-model="formData.email"
                                       required
                                       data-pristine-required-message="<?php echo e(__('validation.custom.email.required')); ?>"
                                       data-pristine-email-message="<?php echo e(__('validation.custom.email.email')); ?>"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition"
                                       placeholder="ornek@email.com">
                            </div>
                        </div>

                        <div class="form-field">
                            <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-2">
                                <?php echo e(__('messages.contact.phone')); ?>

                            </label>
                            <input type="tel"
                                   id="contact_phone"
                                   name="phone"
                                   x-model="formData.phone"
                                   required
                                   data-pristine-required-message="<?php echo e(__('validation.custom.phone.required')); ?>"
                                   data-pristine-phone-validator-message="<?php echo e(__('validation.custom.phone.pattern')); ?>"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition"
                                   placeholder="+90 (5XX) XXX XX XX">
                        </div>

                        <div class="form-field">
                            <label for="contact_subject" class="block text-sm font-medium text-gray-700 mb-2">
                                <?php echo e(__('messages.contact.subject')); ?> *
                            </label>
                            <select id="contact_subject"
                                    name="subject"
                                    x-model="formData.subject"
                                    required
                                    data-pristine-required-message="<?php echo e(__('validation.custom.subject.required')); ?>"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition">
                                <option value=""><?php echo e(__('messages.contact.subject_select')); ?></option>
                                <option value="quote"><?php echo e(__('messages.contact.subject_quote')); ?></option>
                                <option value="technical"><?php echo e(__('messages.contact.subject_technical')); ?></option>
                                <option value="sample"><?php echo e(__('messages.contact.subject_sample')); ?></option>
                                <option value="other"><?php echo e(__('messages.contact.subject_other')); ?></option>
                            </select>
                        </div>

                        <div class="form-field">
                            <label for="contact_message" class="block text-sm font-medium text-gray-700 mb-2">
                                <?php echo e(__('messages.contact.message')); ?> *
                            </label>
                            <textarea id="contact_message"
                                      name="message"
                                      x-model="formData.message"
                                      required
                                      data-pristine-required-message="<?php echo e(__('validation.custom.message.required')); ?>"
                                      minlength="10"
                                      data-pristine-minlength-message="<?php echo e(__('validation.custom.message.minlength')); ?>"
                                      rows="4"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition resize-none"
                                      placeholder="<?php echo e(__('messages.contact.message_placeholder')); ?>"></textarea>
                        </div>

                        <button type="submit"
                                :disabled="loading"
                                class="w-full py-4 bg-primary hover:bg-primary/90 text-white font-semibold rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2">
                            <span x-show="!loading"><?php echo e(__('messages.contact.send')); ?></span>
                            <span x-show="loading"><?php echo e(__('messages.contact.sending')); ?></span>
                            <svg x-show="!loading" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Map & Contact Info -->
                <div class="space-y-6">
                    <!-- Map -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-80">
                        <iframe
                            src="<?php echo e($settings['contact_map_url'] ?? ''); ?>"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    <!-- Contact Info Cards -->
                    <div class="grid grid-cols-1 gap-4">
                        <!-- Address -->
                        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow">
                            <div class="flex items-start gap-4">
                                <div class="p-3 bg-red-100 rounded-lg">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1"><?php echo e(__('messages.contact.address')); ?></h4>
                                    <p class="text-sm text-gray-600">
                                        <?php echo e($settings['address_' . app()->getLocale()] ?? ''); ?>

                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow">
                            <div class="flex items-start gap-4">
                                <div class="p-3 bg-red-100 rounded-lg">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1"><?php echo e(__('messages.contact.phone_title')); ?></h4>
                                    <a href="tel:<?php echo e($settings['phone'] ?? ''); ?>" class="text-sm text-primary hover:underline">
                                        <?php echo e($settings['phone_display'] ?? ''); ?>

                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow">
                            <div class="flex items-start gap-4">
                                <div class="p-3 bg-red-100 rounded-lg">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1"><?php echo e(__('messages.contact.email_title')); ?></h4>
                                    <a href="mailto:<?php echo e($settings['email'] ?? ''); ?>" class="text-sm text-primary hover:underline">
                                        <?php echo e($settings['email'] ?? ''); ?>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-primary text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                <?php echo e($pageContents['cta']->{'title_' . app()->getLocale()} ?? ''); ?>

            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                <?php echo e($pageContents['cta']->{'content_' . app()->getLocale()} ?? ''); ?>

            </p>
            <a href="#<?php echo e(__('messages.slugs.contact')); ?>" class="nav-link inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-primary rounded-lg font-semibold hover:bg-white/90 transition-all shadow-lg hover:shadow-xl">
                <?php echo e(__('messages.cta.button')); ?>

                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function contactForm() {
    return {
        loading: false,
        success: false,
        error: false,
        errorMessage: '',
        pristine: null,
        formData: {
            name: '',
            email: '',
            phone: '',
            subject: '',
            message: ''
        },
        init() {
            // Initialize Pristine validation
            const form = document.getElementById('contactForm');

            // Pristine configuration
            const config = {
                classTo: 'form-field',
                errorClass: 'has-danger',
                successClass: 'has-success',
                errorTextParent: 'form-field',
                errorTextTag: 'div',
                errorTextClass: 'pristine-error'
            };

            // Add custom phone validator before initializing Pristine
            Pristine.addValidator('phone-validator', function(value) {
                // If empty, it's valid (optional field)
                if (!value || value.trim() === '') return true;

                // If not empty, validate pattern
                const phoneRegex = /^[\d\s\+\-\(\)]{10,}$/;
                return phoneRegex.test(value);
            }, '<?php echo e(__("validation.custom.phone.pattern")); ?>', 2, false);

            this.pristine = new Pristine(form, config);
        },
        async submitForm() {
            // Validate form with Pristine
            const valid = this.pristine.validate();

            if (!valid) {
                // Scroll to first error
                const firstError = document.querySelector('.has-danger');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                return;
            }

            this.loading = true;
            this.success = false;
            this.error = false;

            try {
                const response = await fetch('<?php echo e(route("contact.send")); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(this.formData)
                });

                const data = await response.json();

                if (response.ok) {
                    this.success = true;

                    // Reset form
                    this.formData = {
                        name: '',
                        email: '',
                        phone: '',
                        subject: '',
                        message: ''
                    };

                    // Reset Pristine validation state
                    this.pristine.reset();

                    // Scroll to success message
                    setTimeout(() => {
                        const contactSection = document.getElementById('<?php echo e(__("messages.slugs.contact")); ?>');
                        if (contactSection) {
                            const headerOffset = 80;
                            const elementPosition = contactSection.getBoundingClientRect().top;
                            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                            window.scrollTo({
                                top: offsetPosition,
                                behavior: 'smooth'
                            });
                        }
                    }, 100);
                } else {
                    this.error = true;
                    this.errorMessage = data.message || '<?php echo e(__("messages.contact.error_response")); ?>';
                }
            } catch (err) {
                this.error = true;
                this.errorMessage = '<?php echo e(__("messages.contact.error_response")); ?>';
                console.error('Contact form error:', err);
            } finally {
                this.loading = false;
            }
        }
    }
}

// Structured Data (Schema.org) for SEO
const structuredData = {
    "@context": "https://schema.org",
    "@graph": [
        // Organization
        {
            "@type": "Organization",
            "@id": "<?php echo e(url('/')); ?>#organization",
            "name": "<?php echo e($settings['company_name_full'] ?? 'NORDEAN Mühendislik'); ?>",
            "url": "<?php echo e(url('/')); ?>",
            "logo": {
                "@type": "ImageObject",
                "url": "<?php echo e(asset('images/nordean-logo.png')); ?>",
                "width": "250",
                "height": "60"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "<?php echo e($settings['phone'] ?? '+905326421443'); ?>",
                "contactType": "customer service",
                "areaServed": "TR",
                "availableLanguage": ["Turkish", "English"]
            },
            "sameAs": [
                "<?php echo e($settings['facebook_url'] ?? ''); ?>",
                "<?php echo e($settings['instagram_url'] ?? ''); ?>",
                "<?php echo e($settings['linkedin_url'] ?? ''); ?>"
            ],
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "<?php echo e($settings['address_tr'] ?? ''); ?>",
                "addressLocality": "İstanbul",
                "addressRegion": "İstanbul",
                "addressCountry": "TR"
            }
        },
        // LocalBusiness
        {
            "@type": "LocalBusiness",
            "@id": "<?php echo e(url('/')); ?>#localbusiness",
            "name": "<?php echo e($settings['company_name_full'] ?? 'NORDEAN Mühendislik'); ?>",
            "image": "<?php echo e(asset('images/nordean-logo.png')); ?>",
            "description": "<?php echo e($description ?? 'İtalyan Isolgomma ses ve titreşim yalıtım malzemelerinin Türkiye\'deki tek yetkili distribütörü.'); ?>",
            "url": "<?php echo e(url('/')); ?>",
            "telephone": "<?php echo e($settings['phone'] ?? '+905326421443'); ?>",
            "email": "<?php echo e($settings['email'] ?? 'info@nordean.com.tr'); ?>",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "<?php echo e($settings['address_tr'] ?? ''); ?>",
                "addressLocality": "İstanbul",
                "addressRegion": "İstanbul",
                "postalCode": "34307",
                "addressCountry": "TR"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "40.9925",
                "longitude": "28.7264"
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                "opens": "09:00",
                "closes": "18:00"
            }
        },
        // WebSite
        {
            "@type": "WebSite",
            "@id": "<?php echo e(url('/')); ?>#website",
            "url": "<?php echo e(url('/')); ?>",
            "name": "<?php echo e($settings['company_name_full'] ?? 'NORDEAN Mühendislik'); ?>",
            "description": "<?php echo e($description); ?>",
            "publisher": {
                "@id": "<?php echo e(url('/')); ?>#organization"
            },
            "inLanguage": ["tr", "en"]
        }
        <?php if(isset($products) && $products->count() > 0): ?>
        ,
        // Product Catalog
        {
            "@type": "ItemList",
            "itemListElement": [
                <?php $__currentLoopData = $products->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                {
                    "@type": "ListItem",
                    "position": <?php echo e($index + 1); ?>,
                    "item": {
                        "@type": "Product",
                        "name": "<?php echo e($product->{'name_' . app()->getLocale()}); ?> - Isolgomma",
                        "description": "<?php echo e(Str::limit($product->{'description_' . app()->getLocale()}, 150)); ?>",
                        "brand": {
                            "@type": "Brand",
                            "name": "Isolgomma"
                        },
                        "manufacturer": {
                            "@type": "Organization",
                            "name": "Isolgomma"
                        },
                        "image": "<?php echo e(asset($product->image)); ?>",
                        "offers": {
                            "@type": "Offer",
                            "availability": "https://schema.org/InStock",
                            "seller": {
                                "@id": "<?php echo e(url('/')); ?>#organization"
                            }
                        }
                    }
                }<?php echo e($loop->last ? '' : ','); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ]
        }
        <?php endif; ?>
    ]
};

// Inject structured data into page
const script = document.createElement('script');
script.type = 'application/ld+json';
script.text = JSON.stringify(structuredData);
document.head.appendChild(script);
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nordean.com.tr\resources\views/welcome.blade.php ENDPATH**/ ?>
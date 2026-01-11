<!-- References Section -->
<section id="<?php echo e(__('messages.slugs.references')); ?>" class="py-16 md:py-24 bg-gray-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-red-100 text-primary rounded-full text-sm font-semibold mb-4">
                <?php echo e(__('messages.references.badge')); ?>

            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                <?php echo e(__('messages.references.title')); ?>

            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                <?php echo e(__('messages.references.subtitle')); ?>

            </p>
        </div>

        <!-- References Slider -->
        <div class="relative" x-data="referencesLightbox()" x-on:keydown.escape.window="closeLightbox()">
            <?php
                $projects = __('messages.references.projects');
            ?>

            <!-- Swiper Container -->
            <div class="swiper references-swiper max-w-[1216px] mx-auto px-4">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <div @click="openLightbox(<?php echo e(json_encode($project)); ?>)"
                             class="group bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 w-full cursor-pointer h-full">
                            <div class="relative w-full h-full overflow-hidden bg-gray-100">
                                <img src="<?php echo e(asset('images/references/' . $project['image'])); ?>"
                                     alt="<?php echo e($project['name']); ?>"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                <!-- Category Badge -->
                                <div class="absolute top-2 right-2">
                                    <span class="inline-block px-2 py-1 bg-primary/90 backdrop-blur-sm text-white rounded-full text-xs font-semibold">
                                        <?php echo e($project['category']); ?>

                                    </span>
                                </div>

                                <!-- Project Info on Hover -->
                                <div class="absolute inset-0 p-3 flex flex-col justify-end opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <h3 class="text-white font-bold text-xs mb-0.5 leading-tight line-clamp-2">
                                        <?php echo e($project['name']); ?>

                                    </h3>
                                    <p class="text-white/90 text-[10px] leading-tight line-clamp-2">
                                        <?php echo e($project['description']); ?>

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
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Navigation -->
            <div class="flex items-center justify-center gap-4 mt-8">
                <!-- Previous Button -->
                <button class="references-button-prev p-3 rounded-full bg-white hover:bg-primary hover:text-white text-gray-900 transition-all shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                        aria-label="Previous references">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <!-- Pagination Dots -->
                <div class="references-pagination flex gap-2"></div>

                <!-- Next Button -->
                <button class="references-button-next p-3 rounded-full bg-primary hover:bg-primary/90 text-white transition-all shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
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
                            <img :src="`<?php echo e(asset('images/references/')); ?>/${selectedProject?.image}`"
                                 :alt="selectedProject?.name"
                                 class="w-full h-full object-cover">
                            <div class="absolute top-4 left-4">
                                <span class="inline-block px-3 py-1.5 bg-primary text-white rounded-full text-sm font-semibold"
                                      x-text="selectedProject?.category"></span>
                            </div>
                        </div>

                        <!-- Content Side -->
                        <div class="p-8 md:p-10 flex flex-col justify-center">
                            <div class="mb-4">
                                <div class="flex items-center gap-2 mb-4">
                                    <div class="h-1 w-12 bg-primary rounded-full"></div>
                                    <span class="text-sm font-semibold text-primary uppercase tracking-wider">
                                        <?php echo e(__('messages.references.badge')); ?>

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
                                        <span class="font-semibold text-gray-900"><?php echo e(__('messages.products.badge')); ?>:</span>
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

<?php $__env->startPush('scripts'); ?>
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
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\nordean.com.tr\resources\views/partials/references.blade.php ENDPATH**/ ?>
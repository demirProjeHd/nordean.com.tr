<section id="about" class="py-20 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" x-data="{ show: false }" x-intersect="show = true">
            <span class="inline-block px-4 py-2 bg-blue-100 text-blue-600 rounded-full text-sm font-semibold mb-4"
                  x-show="show"
                  x-transition:enter="transition ease-out duration-500"
                  x-transition:enter-start="opacity-0 -translate-y-4"
                  x-transition:enter-end="opacity-100 translate-y-0">
                {{ __('messages.about.badge') }}
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"
                x-show="show"
                x-transition:enter="transition ease-out duration-500 delay-100"
                x-transition:enter-start="opacity-0 -translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0">
                {{ __('messages.about.title') }}
            </h2>
        </div>

        <div class="max-w-4xl mx-auto mb-16" x-data="{ show: false }" x-intersect="show = true">
            <p class="text-lg text-gray-600 leading-relaxed text-center mb-8"
               x-show="show"
               x-transition:enter="transition ease-out duration-500 delay-200"
               x-transition:enter-start="opacity-0"
               x-transition:enter-end="opacity-100">
                {{ __('messages.about.description') }}
            </p>
        </div>

        <!-- Mission & Vision -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
            <!-- Mission -->
            <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow"
                 x-data="{ show: false }" x-intersect="show = true">
                <div class="flex items-center gap-3 mb-4"
                     x-show="show"
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 -translate-x-4"
                     x-transition:enter-end="opacity-100 translate-x-0">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">{{ __('messages.mission.title') }}</h3>
                </div>
                <p class="text-gray-600 leading-relaxed"
                   x-show="show"
                   x-transition:enter="transition ease-out duration-500 delay-100"
                   x-transition:enter-start="opacity-0"
                   x-transition:enter-end="opacity-100">
                    {{ __('messages.mission.description') }}
                </p>
            </div>

            <!-- Vision -->
            <div class="bg-gradient-to-br from-purple-50 to-white rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow"
                 x-data="{ show: false }" x-intersect="show = true">
                <div class="flex items-center gap-3 mb-4"
                     x-show="show"
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 translate-x-4"
                     x-transition:enter-end="opacity-100 translate-x-0">
                    <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">{{ __('messages.vision.title') }}</h3>
                </div>
                <p class="text-gray-600 leading-relaxed"
                   x-show="show"
                   x-transition:enter="transition ease-out duration-500 delay-100"
                   x-transition:enter-start="opacity-0"
                   x-transition:enter-end="opacity-100">
                    {{ __('messages.vision.description') }}
                </p>
            </div>
        </div>
    </div>
</section>

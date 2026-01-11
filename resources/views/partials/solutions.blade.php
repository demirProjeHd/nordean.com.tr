<section id="solutions" class="py-20 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" x-data="{ show: false }" x-intersect="show = true">
            <span class="inline-block px-4 py-2 bg-blue-100 text-blue-600 rounded-full text-sm font-semibold mb-4"
                  x-show="show"
                  x-transition:enter="transition ease-out duration-500"
                  x-transition:enter-start="opacity-0 -translate-y-4"
                  x-transition:enter-end="opacity-100 translate-y-0">
                {{ __('messages.solutions.badge') }}
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"
                x-show="show"
                x-transition:enter="transition ease-out duration-500 delay-100"
                x-transition:enter-start="opacity-0 -translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0">
                {{ __('messages.solutions.title') }}
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Floor Insulation -->
            <div class="group relative bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-blue-200 overflow-hidden"
                 x-data="{ show: false, hover: false }"
                 x-intersect="show = true"
                 @mouseenter="hover = true"
                 @mouseleave="hover = false">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-blue-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                <div class="relative z-10"
                     x-show="show"
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="w-14 h-14 bg-blue-100 group-hover:bg-white/20 rounded-lg flex items-center justify-center mb-4 transition-colors duration-300">
                        <svg class="w-7 h-7 text-blue-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-2 transition-colors duration-300">
                        {{ __('messages.solutions.floor') }}
                    </h3>
                    <p class="text-gray-600 group-hover:text-white/90 transition-colors duration-300">
                        {{ __('messages.solutions.floor_desc') }}
                    </p>
                </div>
            </div>

            <!-- Wall Insulation -->
            <div class="group relative bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-green-200 overflow-hidden"
                 x-data="{ show: false }"
                 x-intersect="show = true">
                <div class="absolute inset-0 bg-gradient-to-br from-green-600 to-green-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                <div class="relative z-10"
                     x-show="show"
                     x-transition:enter="transition ease-out duration-500 delay-100"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="w-14 h-14 bg-green-100 group-hover:bg-white/20 rounded-lg flex items-center justify-center mb-4 transition-colors duration-300">
                        <svg class="w-7 h-7 text-green-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-2 transition-colors duration-300">
                        {{ __('messages.solutions.wall') }}
                    </h3>
                    <p class="text-gray-600 group-hover:text-white/90 transition-colors duration-300">
                        {{ __('messages.solutions.wall_desc') }}
                    </p>
                </div>
            </div>

            <!-- Ceiling Insulation -->
            <div class="group relative bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-purple-200 overflow-hidden"
                 x-data="{ show: false }"
                 x-intersect="show = true">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-600 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                <div class="relative z-10"
                     x-show="show"
                     x-transition:enter="transition ease-out duration-500 delay-200"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="w-14 h-14 bg-purple-100 group-hover:bg-white/20 rounded-lg flex items-center justify-center mb-4 transition-colors duration-300">
                        <svg class="w-7 h-7 text-purple-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-2 transition-colors duration-300">
                        {{ __('messages.solutions.ceiling') }}
                    </h3>
                    <p class="text-gray-600 group-hover:text-white/90 transition-colors duration-300">
                        {{ __('messages.solutions.ceiling_desc') }}
                    </p>
                </div>
            </div>

            <!-- Vibration Control -->
            <div class="group relative bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-orange-200 overflow-hidden"
                 x-data="{ show: false }"
                 x-intersect="show = true">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-600 to-orange-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                <div class="relative z-10"
                     x-show="show"
                     x-transition:enter="transition ease-out duration-500 delay-300"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="w-14 h-14 bg-orange-100 group-hover:bg-white/20 rounded-lg flex items-center justify-center mb-4 transition-colors duration-300">
                        <svg class="w-7 h-7 text-orange-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-2 transition-colors duration-300">
                        {{ __('messages.solutions.vibration') }}
                    </h3>
                    <p class="text-gray-600 group-hover:text-white/90 transition-colors duration-300">
                        {{ __('messages.solutions.vibration_desc') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

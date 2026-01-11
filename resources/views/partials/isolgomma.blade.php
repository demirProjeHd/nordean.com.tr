<section id="isolgomma" class="py-20 bg-gray-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" x-data="{ show: false }" x-intersect="show = true">
            <span class="inline-block px-4 py-2 bg-blue-100 text-blue-600 rounded-full text-sm font-semibold mb-4"
                  x-show="show"
                  x-transition:enter="transition ease-out duration-500"
                  x-transition:enter-start="opacity-0 -translate-y-4"
                  x-transition:enter-end="opacity-100 translate-y-0">
                {{ __('messages.isolgomma.badge') }}
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"
                x-show="show"
                x-transition:enter="transition ease-out duration-500 delay-100"
                x-transition:enter-start="opacity-0 -translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0">
                {{ __('messages.isolgomma.title') }}
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto"
               x-show="show"
               x-transition:enter="transition ease-out duration-500 delay-200"
               x-transition:enter-start="opacity-0"
               x-transition:enter-end="opacity-100">
                {{ __('messages.isolgomma.description') }}
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
            <!-- Feature 1: European Leader -->
            <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2"
                 x-data="{ show: false }" x-intersect="show = true">
                <div x-show="show"
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 scale-90"
                     x-transition:enter-end="opacity-100 scale-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">
                        {{ __('messages.isolgomma.feature1') }}
                    </h3>
                    <p class="text-gray-600 text-center">
                        {{ __('messages.isolgomma.feature1_desc') }}
                    </p>
                </div>
            </div>

            <!-- Feature 2: Eco-Friendly -->
            <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2"
                 x-data="{ show: false }" x-intersect="show = true">
                <div x-show="show"
                     x-transition:enter="transition ease-out duration-500 delay-100"
                     x-transition:enter-start="opacity-0 scale-90"
                     x-transition:enter-end="opacity-100 scale-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">
                        {{ __('messages.isolgomma.feature2') }}
                    </h3>
                    <p class="text-gray-600 text-center">
                        {{ __('messages.isolgomma.feature2_desc') }}
                    </p>
                </div>
            </div>

            <!-- Feature 3: Wide Product Range -->
            <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2"
                 x-data="{ show: false }" x-intersect="show = true">
                <div x-show="show"
                     x-transition:enter="transition ease-out duration-500 delay-200"
                     x-transition:enter-start="opacity-0 scale-90"
                     x-transition:enter-end="opacity-100 scale-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">
                        {{ __('messages.isolgomma.feature3') }}
                    </h3>
                    <p class="text-gray-600 text-center">
                        {{ __('messages.isolgomma.feature3_desc') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Image Gallery -->
        <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-4"
             x-data="{ show: false }" x-intersect="show = true">
            <div class="aspect-square rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100">
                <img src="{{ asset('images/green-sustainable-recycled-rubber-materials-textur.jpg') }}"
                     alt="Sustainable Materials"
                     class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
            </div>
            <div class="aspect-square rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-500 delay-100"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100">
                <img src="{{ asset('images/industrial-vibration-damping-system-with-rubber-ma.jpg') }}"
                     alt="Vibration Damping"
                     class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
            </div>
            <div class="aspect-square rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-500 delay-200"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100">
                <img src="{{ asset('images/industrial-machinery-with-vibration-isolation-and-.jpg') }}"
                     alt="Industrial Machinery"
                     class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
            </div>
            <div class="aspect-square rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-500 delay-300"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100">
                <img src="{{ asset('images/professional-sound-insulation-consultation-archite.jpg') }}"
                     alt="Professional Consultation"
                     class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
            </div>
        </div>
    </div>
</section>

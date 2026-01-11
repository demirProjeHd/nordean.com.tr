@extends('layouts.app')

@section('content')
    <!-- Hero Section with Slider -->
    @include('partials.hero')

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Left Side - Content -->
                <div>
                    <span class="inline-block px-4 py-2 bg-red-100 text-primary rounded-full text-sm font-semibold mb-4">
                        {{ __('messages.about.badge') }}
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                        {{ __('messages.about.title') }}
                    </h2>
                    <p class="text-lg text-gray-600 leading-relaxed mb-8">
                        {{ __('messages.about.description') }}
                    </p>

                    <div class="relative rounded-lg overflow-hidden aspect-video">
                        <img src="{{ asset('images/professional-sound-insulation-consultation-archite.jpg') }}"
                             alt="NORDEAN Professional Team"
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
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('messages.mission.title') }}</h3>
                                <p class="text-gray-600 leading-relaxed">{{ __('messages.mission.description') }}</p>
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
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('messages.vision.title') }}</h3>
                                <p class="text-gray-600 leading-relaxed">{{ __('messages.vision.description') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Isolgomma Section -->
    <section id="isolgomma" class="py-20 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-red-100 text-primary rounded-full text-sm font-semibold mb-4">
                    {{ __('messages.isolgomma.badge') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    {{ __('messages.isolgomma.title') }}
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    {{ __('messages.isolgomma.description') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <div class="text-center p-6 bg-white rounded-xl shadow-sm">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('messages.isolgomma.feature1') }}</h3>
                    <p class="text-gray-600">{{ __('messages.isolgomma.feature1_desc') }}</p>
                </div>

                <div class="text-center p-6 bg-white rounded-xl shadow-sm">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('messages.isolgomma.feature2') }}</h3>
                    <p class="text-gray-600">{{ __('messages.isolgomma.feature2_desc') }}</p>
                </div>

                <div class="text-center p-6 bg-white rounded-xl shadow-sm">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('messages.isolgomma.feature3') }}</h3>
                    <p class="text-gray-600">{{ __('messages.isolgomma.feature3_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Solutions Section -->
    <section id="solutions" class="py-20 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-red-100 text-primary rounded-full text-sm font-semibold mb-4">
                    {{ __('messages.solutions.badge') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    {{ __('messages.solutions.title') }}
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Floor Solutions -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/acoustic-floating-floor-installation-with-insulati.jpg') }}"
                             alt="{{ __('messages.solutions.floor') }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-3 left-3 p-2.5 bg-primary rounded-lg shadow-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-primary transition-colors">
                            {{ __('messages.solutions.floor') }}
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ __('messages.solutions.floor_desc') }}</p>
                    </div>
                </div>

                <!-- Wall Solutions -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/soundproof-wall-with-acoustic-panels-installation.jpg') }}"
                             alt="{{ __('messages.solutions.wall') }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-3 left-3 p-2.5 bg-primary rounded-lg shadow-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-primary transition-colors">
                            {{ __('messages.solutions.wall') }}
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ __('messages.solutions.wall_desc') }}</p>
                    </div>
                </div>

                <!-- Ceiling Solutions -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/acoustic-ceiling-insulation-with-suspended-system.jpg') }}"
                             alt="{{ __('messages.solutions.ceiling') }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-3 left-3 p-2.5 bg-primary rounded-lg shadow-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-primary transition-colors">
                            {{ __('messages.solutions.ceiling') }}
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ __('messages.solutions.ceiling_desc') }}</p>
                    </div>
                </div>

                <!-- Vibration Solutions -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
                        <img src="{{ asset('images/industrial-vibration-damping-system-with-rubber-ma.jpg') }}"
                             alt="{{ __('messages.solutions.vibration') }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-3 left-3 p-2.5 bg-primary rounded-lg shadow-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-primary transition-colors">
                            {{ __('messages.solutions.vibration') }}
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ __('messages.solutions.vibration_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-20 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-red-100 text-primary rounded-full text-sm font-semibold mb-4">
                    {{ __('messages.products.badge') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    {{ __('messages.products.title') }}
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow">
                    <img src="{{ asset('images/modern-apartment-interior-with-sound-insulation.jpg') }}" alt="Residential" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('messages.products.residential') }}</h3>
                        <p class="text-gray-600">{{ __('messages.products.residential_desc') }}</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow">
                    <img src="{{ asset('images/modern-office-meeting-room-with-acoustic-panels-so.jpg') }}" alt="Commercial" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('messages.products.commercial') }}</h3>
                        <p class="text-gray-600">{{ __('messages.products.commercial_desc') }}</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow">
                    <img src="{{ asset('images/industrial-factory-floor.jpg') }}" alt="Industrial" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('messages.products.industrial') }}</h3>
                        <p class="text-gray-600">{{ __('messages.products.industrial_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-red-100 text-primary rounded-full text-sm font-semibold mb-4">
                    {{ __('messages.contact.badge') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    {{ __('messages.contact.title') }}
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    {{ __('messages.contact.description') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="bg-white rounded-2xl shadow-lg p-8" x-data="contactForm()">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">{{ __('messages.contact.form_title') }}</h3>

                    <!-- Success Message -->
                    <div x-show="success"
                         x-transition
                         class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        <p class="font-semibold">{{ __('messages.contact.success_title') }}</p>
                        <p class="text-sm">{{ __('messages.contact.success_message') }}</p>
                    </div>

                    <!-- Error Message -->
                    <div x-show="error"
                         x-transition
                         class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <p class="font-semibold">{{ __('messages.contact.error_title') }}</p>
                        <p class="text-sm" x-text="errorMessage"></p>
                    </div>

                    <form id="contactForm" @submit.prevent="submitForm" class="space-y-4" novalidate>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-field">
                                <label for="contact_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __('messages.contact.name') }} *
                                </label>
                                <input type="text"
                                       id="contact_name"
                                       name="name"
                                       x-model="formData.name"
                                       required
                                       data-pristine-required-message="{{ __('validation.custom.name.required') }}"
                                       minlength="3"
                                       data-pristine-minlength-message="{{ __('validation.custom.name.minlength') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition"
                                       placeholder="{{ __('messages.contact.name_placeholder') }}">
                            </div>
                            <div class="form-field">
                                <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ __('messages.contact.email') }} *
                                </label>
                                <input type="email"
                                       id="contact_email"
                                       name="email"
                                       x-model="formData.email"
                                       required
                                       data-pristine-required-message="{{ __('validation.custom.email.required') }}"
                                       data-pristine-email-message="{{ __('validation.custom.email.email') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition"
                                       placeholder="ornek@email.com">
                            </div>
                        </div>

                        <div class="form-field">
                            <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('messages.contact.phone') }}
                            </label>
                            <input type="tel"
                                   id="contact_phone"
                                   name="phone"
                                   x-model="formData.phone"
                                   required
                                   data-pristine-required-message="{{ __('validation.custom.phone.required') }}"
                                   data-pristine-phone-validator-message="{{ __('validation.custom.phone.pattern') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition"
                                   placeholder="+90 (5XX) XXX XX XX">
                        </div>

                        <div class="form-field">
                            <label for="contact_subject" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('messages.contact.subject') }} *
                            </label>
                            <select id="contact_subject"
                                    name="subject"
                                    x-model="formData.subject"
                                    required
                                    data-pristine-required-message="{{ __('validation.custom.subject.required') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition">
                                <option value="">{{ __('messages.contact.subject_select') }}</option>
                                <option value="quote">{{ __('messages.contact.subject_quote') }}</option>
                                <option value="technical">{{ __('messages.contact.subject_technical') }}</option>
                                <option value="sample">{{ __('messages.contact.subject_sample') }}</option>
                                <option value="other">{{ __('messages.contact.subject_other') }}</option>
                            </select>
                        </div>

                        <div class="form-field">
                            <label for="contact_message" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('messages.contact.message') }} *
                            </label>
                            <textarea id="contact_message"
                                      name="message"
                                      x-model="formData.message"
                                      required
                                      data-pristine-required-message="{{ __('validation.custom.message.required') }}"
                                      minlength="10"
                                      data-pristine-minlength-message="{{ __('validation.custom.message.minlength') }}"
                                      rows="4"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition resize-none"
                                      placeholder="{{ __('messages.contact.message_placeholder') }}"></textarea>
                        </div>

                        <button type="submit"
                                :disabled="loading"
                                class="w-full py-4 bg-primary hover:bg-primary/90 text-white font-semibold rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2">
                            <span x-show="!loading">{{ __('messages.contact.send') }}</span>
                            <span x-show="loading">{{ __('messages.contact.sending') }}</span>
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
                            src="https://maps.google.com/maps?q=Yeşilkent+Mah.+Ardıçlı+Manolya+Cad.+Ardıçlı+Göl+Evleri+No:28/6+İç+Kapı+No:1,+Avcılar,+İstanbul&t=&z=15&ie=UTF8&iwloc=&output=embed"
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
                                    <h4 class="font-semibold text-gray-900 mb-1">{{ __('messages.contact.address') }}</h4>
                                    <p class="text-sm text-gray-600">
                                        Yeşilkent Mah. Ardıçlı Manolya Cad.<br>
                                        Ardıçlı Göl Evleri No:28/6 İç Kapı No:1<br>
                                        Avcılar, İstanbul
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
                                    <h4 class="font-semibold text-gray-900 mb-1">{{ __('messages.contact.phone_title') }}</h4>
                                    <a href="tel:+905326421443" class="text-sm text-primary hover:underline">
                                        +90 532 642 14 43
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
                                    <h4 class="font-semibold text-gray-900 mb-1">{{ __('messages.contact.email_title') }}</h4>
                                    <a href="mailto:info@nordean.com.tr" class="text-sm text-primary hover:underline">
                                        info@nordean.com.tr
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
                {{ __('messages.cta.title') }}
            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                {{ __('messages.cta.description') }}
            </p>
            <a href="#contact" class="nav-link inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-primary rounded-lg font-semibold hover:bg-white/90 transition-all shadow-lg hover:shadow-xl">
                {{ __('messages.cta.button') }}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>
    </section>
@endsection

@push('scripts')
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
            }, '{{ __("validation.custom.phone.pattern") }}', 2, false);

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
                const response = await fetch('{{ route("contact.send") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
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
                        document.getElementById('contact').scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 100);
                } else {
                    this.error = true;
                    this.errorMessage = data.message || '{{ __("messages.contact.error_response") }}';
                }
            } catch (err) {
                this.error = true;
                this.errorMessage = '{{ __("messages.contact.error_response") }}';
                console.error('Contact form error:', err);
            } finally {
                this.loading = false;
            }
        }
    }
}
</script>
@endpush

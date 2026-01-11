<section class="py-20 bg-gradient-to-br from-primary to-red-700 text-white relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/10 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Side: CTA Content -->
            <div x-data="{ show: false }" x-intersect="show = true">
                <h2 class="text-3xl md:text-4xl font-bold mb-4"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 -translate-x-4"
                    x-transition:enter-end="opacity-100 translate-x-0">
                    {{ __('messages.cta.title') }}
                </h2>
                <p class="text-xl text-blue-100 mb-8"
                   x-show="show"
                   x-transition:enter="transition ease-out duration-500 delay-100"
                   x-transition:enter-start="opacity-0 -translate-x-4"
                   x-transition:enter-end="opacity-100 translate-x-0">
                    {{ __('messages.cta.description') }}
                </p>

                <!-- Features List -->
                <ul class="space-y-4"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-500 delay-200"
                    x-transition:enter-start="opacity-0 -translate-x-4"
                    x-transition:enter-end="opacity-100 translate-x-0">
                    <li class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-white/80 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Ücretsiz keşif ve teknik danışmanlık</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-white/80 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Projeye özel çözüm tasarımı</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-white/80 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Hızlı teklif ve numune hizmeti</span>
                    </li>
                </ul>
            </div>

            <!-- Right Side: Contact Form -->
            <div class="bg-white rounded-2xl shadow-2xl p-8"
                 x-data="contactForm()"
                 x-intersect="show = true">
                <div x-show="show"
                     x-transition:enter="transition ease-out duration-500 delay-300"
                     x-transition:enter-start="opacity-0 translate-x-4"
                     x-transition:enter-end="opacity-100 translate-x-0">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">İletişime Geçin</h3>

                    <!-- Success Message -->
                    <div x-show="success"
                         x-transition
                         class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        <p class="font-semibold">Mesajınız başarıyla gönderildi!</p>
                        <p class="text-sm">En kısa sürede size dönüş yapacağız.</p>
                    </div>

                    <!-- Error Message -->
                    <div x-show="error"
                         x-transition
                         class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <p class="font-semibold">Bir hata oluştu!</p>
                        <p class="text-sm" x-text="errorMessage"></p>
                    </div>

                    <form @submit.prevent="submitForm" class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Ad Soyad *</label>
                            <input type="text"
                                   id="name"
                                   x-model="formData.name"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition"
                                   placeholder="Adınız ve soyadınız">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">E-posta *</label>
                            <input type="email"
                                   id="email"
                                   x-model="formData.email"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition"
                                   placeholder="ornek@email.com">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Telefon</label>
                            <input type="tel"
                                   id="phone"
                                   x-model="formData.phone"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition"
                                   placeholder="+90 (5XX) XXX XX XX">
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Konu *</label>
                            <select id="subject"
                                    x-model="formData.subject"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition">
                                <option value="">Konu seçiniz</option>
                                <option value="quote">Fiyat Teklifi</option>
                                <option value="technical">Teknik Danışmanlık</option>
                                <option value="sample">Numune Talebi</option>
                                <option value="other">Diğer</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Mesajınız *</label>
                            <textarea id="message"
                                      x-model="formData.message"
                                      required
                                      rows="4"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition resize-none"
                                      placeholder="Projeniz hakkında detaylı bilgi veriniz..."></textarea>
                        </div>

                        <button type="submit"
                                :disabled="loading"
                                class="w-full py-4 bg-secondary hover:bg-secondary/80 text-white font-semibold rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2">
                            <span x-show="!loading">Gönder</span>
                            <span x-show="loading">Gönderiliyor...</span>
                            <svg x-show="!loading" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
function contactForm() {
    return {
        show: false,
        loading: false,
        success: false,
        error: false,
        errorMessage: '',
        formData: {
            name: '',
            email: '',
            phone: '',
            subject: '',
            message: ''
        },
        async submitForm() {
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
                    this.formData = {
                        name: '',
                        email: '',
                        phone: '',
                        subject: '',
                        message: ''
                    };
                } else {
                    this.error = true;
                    this.errorMessage = data.message || 'Bir hata oluştu.';
                }
            } catch (err) {
                this.error = true;
                this.errorMessage = 'Bağlantı hatası. Lütfen tekrar deneyin.';
            } finally {
                this.loading = false;
            }
        }
    }
}
</script>
@endpush

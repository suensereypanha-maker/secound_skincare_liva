@php
    $isKm = app()->getLocale() === 'km';
    $pageTitle = ($isKm ? 'ទំនាក់ទំនង LIVA' : 'Contact Us') . ' | LIVA Botanical Skincare';
@endphp

<x-layouts.app :title="$pageTitle">
    <!-- Breadcrumbs Navigation -->
    <div class="bg-white/60 border-b border-liva-border/60 py-3.5 px-4 sm:px-6 lg:px-8 text-xs text-liva-muted">
        <div class="max-w-7xl mx-auto flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-liva-dark transition-colors" data-i18n="navHome">{{ __('skincare.nav_home') }}</a>
            <span>/</span>
            <span class="text-liva-dark font-medium" data-i18n="navContact">{{ __('skincare.nav_contact') }}</span>
        </div>
    </div>

    <!-- Contact Header & Main Grid -->
    <section class="py-10 sm:py-14 md:py-18 bg-[#FAF7F2]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            <div class="max-w-2xl space-y-2">
                <div class="inline-flex items-center gap-2 text-[10px] font-bold tracking-widest uppercase text-liva-olive">
                    <span class="w-1.5 h-1.5 rounded-full bg-liva-olive"></span>
                    <span>{{ $isKm ? 'ផ្នែកបម្រើអតិថិជន' : 'CLIENT CONCIERGE' }}</span>
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-serif font-bold text-liva-dark tracking-tight" data-i18n="navContact">
                    {{ $isKm ? 'ទំនាក់ទំនងមកកាន់ LIVA' : 'Contact LIVA Concierge' }}
                </h1>
                <p class="text-xs sm:text-sm text-liva-muted leading-relaxed">
                    {{ $isKm
                        ? 'ត្រូវការជំនួយក្នុងការជ្រើសរើសផលិតផលសមនឹងប្រភេទស្បែក តាមដានការបញ្ជាទិញ ឬសហការអាជីវកម្ម? សូមទាក់ទងមកកាន់ក្រុមការងាររបស់យើងតាមរយៈទម្រង់ខាងក្រោម ឬបណ្តាញសង្គមផ្ទាល់។'
                        : 'Have a question about our botanical formulas, customizing a ritual set, or tracking your delivery? Reach out via our direct channels or send us a message below.' }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <!-- Left Column: Direct Channels & Studio Info -->
                <div class="lg:col-span-5 space-y-4">
                    <!-- Direct Social Chat Cards -->
                    <div class="bg-white rounded-3xl border border-liva-border/80 p-6 space-y-4 shadow-xs">
                        <h2 class="text-lg font-serif font-bold text-liva-dark">
                            {{ $isKm ? 'បណ្តាញទំនាក់ទំនងផ្ទាល់' : 'Direct Support Channels' }}
                        </h2>

                        <div class="space-y-3">
                            <!-- Telegram -->
                            <a href="https://t.me/livaskincare" target="_blank" rel="noopener noreferrer"
                               class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-[#FAF8F5] hover:bg-[#229ED9]/10 border border-liva-border/80 hover:border-[#229ED9] transition-all group">
                                <div class="w-10 h-10 rounded-xl bg-[#229ED9] text-white flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="m20.665 3.717-17.73 6.837c-1.21.486-1.203 1.161-.222 1.462l4.552 1.42 10.532-6.645c.498-.303.953-.14.579.192l-8.533 7.701h-.002l-.313 4.693c.46 0 .663-.211.921-.46l2.211-2.15 4.599 3.397c.848.467 1.457.227 1.668-.785l3.019-14.228c.309-1.239-.473-1.8-1.282-1.434z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="text-xs font-bold text-liva-dark">Telegram Concierge</div>
                                    <div class="text-xs text-liva-muted truncate">@livaskincare · {{ $isKm ? 'ឆ្លើយតបរហ័ស' : 'Instant Reply' }}</div>
                                </div>
                                <svg class="w-4 h-4 text-liva-muted group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>

                            <!-- Facebook -->
                            <a href="https://facebook.com/livaskincare" target="_blank" rel="noopener noreferrer"
                               class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-[#FAF8F5] hover:bg-[#1877F2]/10 border border-liva-border/80 hover:border-[#1877F2] transition-all group">
                                <div class="w-10 h-10 rounded-xl bg-[#1877F2] text-white flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="text-xs font-bold text-liva-dark">Facebook Page</div>
                                    <div class="text-xs text-liva-muted truncate">fb.com/livaskincare</div>
                                </div>
                                <svg class="w-4 h-4 text-liva-muted group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>

                            <!-- Instagram -->
                            <a href="https://instagram.com/livaskincare" target="_blank" rel="noopener noreferrer"
                               class="flex items-center gap-3.5 p-3.5 rounded-2xl bg-[#FAF8F5] hover:bg-rose-50 border border-liva-border/80 hover:border-rose-400 transition-all group">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-[#F77737] via-[#FD1D1D] to-[#833AB4] text-white flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.8A3.95 3.95 0 003.8 7.75v8.5a3.95 3.95 0 003.95 3.95h8.5a3.95 3.95 0 003.95-3.95v-8.5a3.95 3.95 0 00-3.95-3.95h-8.5zm8.95 1.35a1.15 1.15 0 110 2.3 1.15 1.15 0 010-2.3zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.8A3.2 3.2 0 1012 15.2 3.2 3.2 0 0012 8.8z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="text-xs font-bold text-liva-dark">Instagram</div>
                                    <div class="text-xs text-liva-muted truncate">@livaskincare</div>
                                </div>
                                <svg class="w-4 h-4 text-liva-muted group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Studio Address & Hours -->
                    <div class="bg-white rounded-3xl border border-liva-border/80 p-6 space-y-4 shadow-xs text-xs">
                        <h2 class="text-lg font-serif font-bold text-liva-dark">
                            {{ $isKm ? 'ទីតាំង និងម៉ោងធ្វើការ' : 'Studio & Client Care Hours' }}
                        </h2>
                        <div class="space-y-2.5 text-liva-charcoal">
                            <div class="flex items-start gap-2.5">
                                <span class="font-semibold text-liva-dark w-20 shrink-0">{{ $isKm ? 'អាសយដ្ឋាន៖' : 'Studio:' }}</span>
                                <span class="text-liva-muted">Boeng Keng Kang 1 (BKK1), Phnom Penh, Cambodia</span>
                            </div>
                            <div class="flex items-start gap-2.5">
                                <span class="font-semibold text-liva-dark w-20 shrink-0">{{ $isKm ? 'អ៊ីមែល៖' : 'Email:' }}</span>
                                <a href="mailto:concierge@liva-skincare.com" class="text-liva-olive hover:underline">concierge@liva-skincare.com</a>
                            </div>
                            <div class="flex items-start gap-2.5">
                                <span class="font-semibold text-liva-dark w-20 shrink-0">{{ $isKm ? 'ម៉ោងធ្វើការ៖' : 'Hours:' }}</span>
                                <span class="text-liva-muted">{{ $isKm ? 'ចន្ទ - អាទិត្យ · 8:30 AM - 8:00 PM' : 'Mon – Sun · 8:30 AM – 8:00 PM (ICT)' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Contact Form -->
                <div class="lg:col-span-7 bg-white rounded-3xl border border-liva-border/80 p-6 sm:p-8 shadow-xs space-y-6">
                    <div>
                        <h2 class="text-xl sm:text-2xl font-serif font-bold text-liva-dark">
                            {{ $isKm ? 'ផ្ញើសារមកកាន់យើង' : 'Send Us a Message' }}
                        </h2>
                        <p class="text-xs text-liva-muted mt-1">
                            {{ $isKm ? 'ក្រុមការងាររបស់យើងនឹងឆ្លើយតបក្នុងរយៈពេលប៉ុន្មានម៉ោង។' : 'Our botanical concierge team typically responds within a few hours.' }}
                        </p>
                    </div>

                    @if(session('contact_success'))
                        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs sm:text-sm font-medium flex items-center gap-2.5">
                            <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>{{ session('contact_success') }}</span>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs space-y-1">
                            @foreach($errors->all() as $error)
                                <div>• {{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <div id="static-contact-success" class="hidden p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs sm:text-sm font-medium flex items-center gap-2.5">
                        <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span id="static-contact-success-text"></span>
                    </div>

                    <form id="liva-contact-form" action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="contact-name" class="block text-xs font-semibold uppercase tracking-wider text-liva-charcoal mb-1.5">
                                    {{ $isKm ? 'ឈ្មោះពេញ' : 'Full Name' }} <span class="text-rose-500">*</span>
                                </label>
                                <input type="text"
                                       id="contact-name"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required
                                       placeholder="{{ $isKm ? 'ឧ. សុខា' : 'e.g. Sokha Mean' }}"
                                       class="w-full px-4 py-2.5 rounded-xl bg-[#FAF8F5] border border-liva-border text-sm text-liva-dark focus:bg-white focus:outline-hidden focus:border-liva-olive transition-all">
                            </div>

                            <div>
                                <label for="contact-info" class="block text-xs font-semibold uppercase tracking-wider text-liva-charcoal mb-1.5">
                                    {{ $isKm ? 'លេខទូរស័ព្ទ ឬ អ៊ីមែល' : 'Phone / Telegram / Email' }} <span class="text-rose-500">*</span>
                                </label>
                                <input type="text"
                                       id="contact-info"
                                       name="contact_info"
                                       value="{{ old('contact_info') }}"
                                       required
                                       placeholder="012 345 678 / email@example.com"
                                       class="w-full px-4 py-2.5 rounded-xl bg-[#FAF8F5] border border-liva-border text-sm text-liva-dark focus:bg-white focus:outline-hidden focus:border-liva-olive transition-all">
                            </div>
                        </div>

                        <div>
                            <label for="contact-topic" class="block text-xs font-semibold uppercase tracking-wider text-liva-charcoal mb-1.5">
                                {{ $isKm ? 'ប្រធានបទ' : 'Topic' }}
                            </label>
                            <select id="contact-topic"
                                    name="topic"
                                    class="w-full px-4 py-2.5 rounded-xl bg-[#FAF8F5] border border-liva-border text-sm text-liva-dark focus:bg-white focus:outline-hidden focus:border-liva-olive transition-all">
                                <option value="Product Consultation" {{ old('topic') === 'Product Consultation' ? 'selected' : '' }}>
                                    {{ $isKm ? 'ប្រឹក្សាជ្រើសរើសផលិតផល' : 'Product & Skin/Hair Consultation' }}
                                </option>
                                <option value="Order & Delivery" {{ old('topic') === 'Order & Delivery' ? 'selected' : '' }}>
                                    {{ $isKm ? 'ការបញ្ជាទិញ និងដឹកជញ្ជូន' : 'Order & Express Delivery' }}
                                </option>
                                <option value="Custom Set & Wholesale" {{ old('topic') === 'Custom Set & Wholesale' ? 'selected' : '' }}>
                                    {{ $isKm ? 'ឈុតកាដូ ឬការទិញបោះដុំ' : 'Gift Sets & Wholesale Inquiry' }}
                                </option>
                                <option value="Returns & Feedback" {{ old('topic') === 'Returns & Feedback' ? 'selected' : '' }}>
                                    {{ $isKm ? 'ការប្តូរទំនិញ និងមតិយោបល់' : '30-Day Guarantee & Feedback' }}
                                </option>
                            </select>
                        </div>

                        <div>
                            <label for="contact-message" class="block text-xs font-semibold uppercase tracking-wider text-liva-charcoal mb-1.5">
                                {{ $isKm ? 'សាររបស់អ្នក' : 'Message' }} <span class="text-rose-500">*</span>
                            </label>
                            <textarea id="contact-message"
                                      name="message"
                                      rows="5"
                                      required
                                      placeholder="{{ $isKm ? 'សូមសរសេរសំណួរ ឬតម្រូវការរបស់អ្នកនៅទីនេះ...' : 'Tell us how we can help with your daily ritual...' }}"
                                      class="w-full px-4 py-3 rounded-xl bg-[#FAF8F5] border border-liva-border text-sm text-liva-dark focus:bg-white focus:outline-hidden focus:border-liva-olive transition-all">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit"
                                class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-liva-dark hover:bg-liva-olive text-white text-xs font-semibold uppercase tracking-widest shadow-md hover:shadow-lg transition-all cursor-pointer inline-flex items-center justify-center gap-2">
                            <span>{{ $isKm ? 'ផ្ញើសារឥឡូវនេះ' : 'Send Message' }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('liva-contact-form');
            if (!form) return;

            form.addEventListener('submit', (e) => {
                // On static hosts (like GitHub Pages), handle form submission gracefully without POST 405
                if (window.location.hostname.endsWith('github.io')) {
                    e.preventDefault();
                    const name = document.getElementById('contact-name')?.value.trim() || 'Guest';
                    const isKm = window.livaApp ? window.livaApp.currentLang === 'km' : {{ $isKm ? 'true' : 'false' }};
                    const msg = isKm
                        ? `អរគុណ ${name}! សាររបស់អ្នកត្រូវបានកត់ត្រា។ សូមទាក់ទងមកយើងតាម Telegram (@livaskincare) សម្រាប់ការឆ្លើយតបរហ័សបំផុត។`
                        : `Thank you, ${name}! Your message has been noted. For immediate assistance on static preview, feel free to chat with us on Telegram (@livaskincare).`;

                    const box = document.getElementById('static-contact-success');
                    const txt = document.getElementById('static-contact-success-text');
                    if (box && txt) {
                        txt.textContent = msg;
                        box.classList.remove('hidden');
                    }
                    form.reset();
                    if (window.livaApp) {
                        window.livaApp.showToast(msg);
                    }
                }
            });
        });
    </script>
</x-layouts.app>

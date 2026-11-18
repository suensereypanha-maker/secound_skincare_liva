<footer class="bg-liva-dark text-white pt-16 pb-12 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Main Footer Columns -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 pb-14 border-b border-white/10">
            
            <!-- Brand Column (Left) -->
            <div class="lg:col-span-4 space-y-4">
                <x-logo height="h-10 sm:h-12" variant="light" />
                
                <p class="text-xs sm:text-sm text-[#A8B3AA] max-w-sm leading-relaxed" data-i18n="footerBrandDesc">
                    {{ __('skincare.footer_brand_desc') }}
                </p>

                <!-- Language Switcher in Footer -->
                <div class="pt-2 flex items-center gap-2">
                    <span class="text-xs text-[#717D75]" data-i18n="langSelect">Language:</span>
                    <button type="button" data-set-lang="en" class="px-2.5 py-1 rounded bg-white/10 hover:bg-white/20 text-xs font-medium text-white transition-colors">
                        English
                    </button>
                    <button type="button" data-set-lang="km" class="px-2.5 py-1 rounded bg-white/10 hover:bg-white/20 text-xs font-medium text-white transition-colors">
                        ភាសាខ្មែរ
                    </button>
                </div>
            </div>

            <!-- Column 1: Shop -->
            <div class="lg:col-span-2 space-y-3">
                <h4 class="text-xs font-bold uppercase tracking-widest text-liva-gold-light" data-i18n="colShopTitle">
                    Shop
                </h4>
                <ul class="space-y-2 text-xs text-[#A8B3AA]">
                    <li><a href="#collection" class="hover:text-white transition-colors" data-i18n="tabAll">All Essentials</a></li>
                    <li><a href="#collection" class="hover:text-white transition-colors" data-i18n="tabBody">Body Care</a></li>
                    <li><a href="#collection" class="hover:text-white transition-colors" data-i18n="tabHair">Hair Care</a></li>
                    <li><a href="#collection" class="hover:text-white transition-colors" data-i18n="tabSets">Ritual Sets</a></li>
                </ul>
            </div>

            <!-- Column 2: About -->
            <div class="lg:col-span-2 space-y-3">
                <h4 class="text-xs font-bold uppercase tracking-widest text-liva-gold-light" data-i18n="colAboutTitle">
                    About LIVA
                </h4>
                <ul class="space-y-2 text-xs text-[#A8B3AA]">
                    <li><a href="#philosophy" class="hover:text-white transition-colors" data-i18n="banner1Tag">Philosophy</a></li>
                    <li><a href="#spotlight" class="hover:text-white transition-colors" data-i18n="spotlightTag">Signature Formula</a></li>
                    <li><a href="#results" class="hover:text-white transition-colors" data-i18n="resultsTag">Clinical Proof</a></li>
                    <li><a href="#hero" class="hover:text-white transition-colors" data-i18n="feature4Title">Sustainability</a></li>
                </ul>
            </div>

            <!-- Column 3: Customer Care -->
            <div class="lg:col-span-2 space-y-3">
                <h4 class="text-xs font-bold uppercase tracking-widest text-liva-gold-light" data-i18n="colCareTitle">
                    Client Care
                </h4>
                <ul class="space-y-2 text-xs text-[#A8B3AA]">
                    <li><a href="#hero" class="hover:text-white transition-colors" data-i18n="linkFaq">Frequently Asked Questions</a></li>
                    <li><a href="#hero" class="hover:text-white transition-colors" data-i18n="linkShipping">Shipping & Global Delivery</a></li>
                    <li><a href="#hero" class="hover:text-white transition-colors" data-i18n="linkContactUs">Contact Concierge</a></li>
                </ul>
                <div class="pt-2 text-xs text-[#717D75]">
                    concierge@liva-skincare.com
                </div>
            </div>

            <!-- Column 4: Support KH QR (Exact place marked in screenshot) -->
            <div class="lg:col-span-2 space-y-3">
                <h4 class="text-xs font-bold uppercase tracking-widest text-liva-gold-light" data-i18n="colKhqrTitle">
                    {{ __('skincare.col_khqr_title') ?? 'Support KH QR' }}
                </h4>
                
                <p class="text-xs text-[#A8B3AA] leading-relaxed" data-i18n="khqrDesc">
                    {{ __('skincare.khqr_desc') ?? 'We support KHQR scan & pay across all Cambodian mobile banking apps.' }}
                </p>

                <!-- KHQR Logo Card / Badge with uploaded image -->
                <div class="pt-1">
                    <div class="inline-flex items-center gap-2.5 p-2 rounded-xl bg-white/5 border border-white/10 hover:border-white/20 transition-all shadow-xs group">
                        <img src="/img/payments/bakong-khqr-icon.png" alt="Bakong KHQR" class="w-8 h-8 rounded-lg object-contain shadow-xs shrink-0 group-hover:scale-105 transition-transform" />
                        <div>
                            <span class="text-xs font-bold text-white tracking-wide block">KHQR</span>
                            <span class="text-[9px] uppercase tracking-wider text-rose-400 font-semibold block">Bakong Supported</span>
                        </div>
                    </div>
                </div>

                <!-- Accepted Bank Tags -->
                <div class="flex flex-wrap items-center gap-1.5 pt-0.5 text-[10px]">
                    <span class="px-2 py-0.5 rounded-md bg-white/5 border border-white/10 text-white/90 font-medium">ABA</span>
                    <span class="px-2 py-0.5 rounded-md bg-white/5 border border-white/10 text-white/90 font-medium">ACLEDA</span>
                    <span class="px-2 py-0.5 rounded-md bg-white/5 border border-white/10 text-white/90 font-medium">Wing</span>
                </div>
            </div>

        </div>

        <!-- Bottom Copyright & Legal -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-[#717D75]">
            <div data-i18n="copyright">
                {{ __('skincare.copyright') }}
            </div>
            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-white transition-colors" data-i18n="privacy">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors" data-i18n="terms">Terms of Service</a>
                <a href="#" class="hover:text-white transition-colors" data-i18n="cookies">Cookie Settings</a>
            </div>
        </div>

    </div>
</footer>


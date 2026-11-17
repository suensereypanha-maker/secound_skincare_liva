<section id="philosophy" class="py-16 md:py-24 bg-liva-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Two Equal Horizontal Split Cards (Wireframe Section 3) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-10">
            
            <!-- Banner Card 1: Our Botanical Philosophy -->
            <div class="luxury-card rounded-3xl overflow-hidden flex flex-col sm:flex-row justify-between bg-white border border-liva-border/80 group">
                <!-- Left Content -->
                <div class="p-6 sm:p-8 lg:p-9 flex-1 flex flex-col justify-between order-2 sm:order-1">
                    <div>
                        <div class="inline-flex items-center gap-2 text-[10px] font-bold tracking-widest uppercase text-liva-gold mb-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-liva-gold"></span>
                            <span data-i18n="banner1Tag">{{ __('skincare.banner_1_tag') }}</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-serif font-bold text-liva-dark leading-snug mb-3 group-hover:text-liva-sage transition-colors" data-i18n="banner1Title">
                            {{ __('skincare.banner_1_title') }}
                        </h3>
                        <p class="text-xs sm:text-sm text-liva-muted leading-relaxed" data-i18n="banner1Desc">
                            {{ __('skincare.banner_1_desc') }}
                        </p>
                    </div>

                    <div class="pt-6">
                        <a href="#collection" 
                           class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-liva-dark hover:text-liva-olive transition-colors pb-1 border-b-2 border-liva-gold"
                           data-i18n="banner1Cta">
                            <span>{{ __('skincare.banner_1_cta') }}</span>
                            <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Right Image ('X' in Wireframe) -->
                <div class="w-full sm:w-2/5 aspect-[4/3] sm:aspect-auto overflow-hidden bg-[#F2EDE4] order-1 sm:order-2 shrink-0">
                    <img src="/img/botanical.webp" 
                         alt="LIVA Botanical Philosophy" 
                         class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-108"
                         loading="lazy" />
                </div>
            </div>

            <!-- Banner Card 2: Mindful Everyday Ritual -->
            <div class="luxury-card rounded-3xl overflow-hidden flex flex-col sm:flex-row justify-between bg-white border border-liva-border/80 group">
                <!-- Left Content -->
                <div class="p-6 sm:p-8 lg:p-9 flex-1 flex flex-col justify-between order-2 sm:order-1">
                    <div>
                        <div class="inline-flex items-center gap-2 text-[10px] font-bold tracking-widest uppercase text-liva-terracotta mb-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-liva-terracotta"></span>
                            <span data-i18n="banner2Tag">{{ __('skincare.banner_2_tag') }}</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-serif font-bold text-liva-dark leading-snug mb-3 group-hover:text-liva-sage transition-colors" data-i18n="banner2Title">
                            {{ __('skincare.banner_2_title') }}
                        </h3>
                        <p class="text-xs sm:text-sm text-liva-muted leading-relaxed" data-i18n="banner2Desc">
                            {{ __('skincare.banner_2_desc') }}
                        </p>
                    </div>

                    <div class="pt-6">
                        <a href="#collection" 
                           class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-liva-dark hover:text-liva-olive transition-colors pb-1 border-b-2 border-liva-terracotta"
                           data-i18n="banner2Cta">
                            <span>{{ __('skincare.banner_2_cta') }}</span>
                            <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Right Image ('X' in Wireframe) -->
                <div class="w-full sm:w-2/5 aspect-[4/3] sm:aspect-auto overflow-hidden bg-[#F2EDE4] order-1 sm:order-2 shrink-0">
                    <img src="/img/daily-edit.webp" 
                         alt="LIVA Everyday Ritual" 
                         class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-108"
                         loading="lazy" />
                </div>
            </div>

        </div>
    </div>
</section>


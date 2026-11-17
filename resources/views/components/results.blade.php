<section id="results" class="py-16 md:py-24 bg-white border-t border-liva-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-14 md:mb-18">
          
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-liva-dark tracking-tight leading-tight" data-i18n="resultsTitle">
                {{ __('skincare.results_title') }}
            </h2>
            <p class="text-sm text-liva-muted mt-3" data-i18n="resultsSubtitle">
                {{ __('skincare.results_subtitle') }}
            </p>
        </div>

        <!-- 3 Clinical Result Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Result 1 -->
            <div class="luxury-card rounded-2xl overflow-hidden bg-liva-cream border border-liva-border flex flex-col justify-between">
                <div class="aspect-[4/3] overflow-hidden bg-[#EAE4D9]">
                    <img src="/img/result-1.webp" alt="LIVA Skin Result 1" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy" />
                </div>
                <div class="p-6">
                    <div class="text-3xl sm:text-4xl font-serif font-bold text-liva-olive mb-2" data-i18n="result1Pct">
                        {{ __('skincare.result_1_pct') }}
                    </div>
                    <p class="text-xs sm:text-sm text-liva-charcoal leading-relaxed" data-i18n="result1Label">
                        {{ __('skincare.result_1_label') }}
                    </p>
                </div>
            </div>

            <!-- Result 2 -->
            <div class="luxury-card rounded-2xl overflow-hidden bg-liva-cream border border-liva-border flex flex-col justify-between">
                <div class="aspect-[4/3] overflow-hidden bg-[#EAE4D9]">
                    <img src="/img/result-2.webp" alt="LIVA Skin Result 2" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy" />
                </div>
                <div class="p-6">
                    <div class="text-3xl sm:text-4xl font-serif font-bold text-liva-gold mb-2" data-i18n="result2Pct">
                        {{ __('skincare.result_2_pct') }}
                    </div>
                    <p class="text-xs sm:text-sm text-liva-charcoal leading-relaxed" data-i18n="result2Label">
                        {{ __('skincare.result_2_label') }}
                    </p>
                </div>
            </div>

            <!-- Result 3 -->
            <div class="luxury-card rounded-2xl overflow-hidden bg-liva-cream border border-liva-border flex flex-col justify-between">
                <div class="aspect-[4/3] overflow-hidden bg-[#EAE4D9]">
                    <img src="/img/result-3.webp" alt="LIVA Skin Result 3" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy" />
                </div>
                <div class="p-6">
                    <div class="text-3xl sm:text-4xl font-serif font-bold text-liva-terracotta mb-2" data-i18n="result3Pct">
                        {{ __('skincare.result_3_pct') }}
                    </div>
                    <p class="text-xs sm:text-sm text-liva-charcoal leading-relaxed" data-i18n="result3Label">
                        {{ __('skincare.result_3_label') }}
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>


<section id="spotlight" class="py-16 md:py-24 bg-[#F5F2EB] relative border-y border-liva-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header (Top Center of Wireframe Section 2) -->
        <div class="text-center max-w-3xl mx-auto mb-14 md:mb-20">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif font-bold text-liva-dark tracking-tight leading-tight" data-i18n="spotlightTitle">
                {{ __('skincare.spotlight_title') }}
            </h2>
            <p class="text-sm sm:text-base text-liva-muted mt-3 font-normal max-w-xl mx-auto leading-relaxed" data-i18n="spotlightSubtitle">
                {{ __('skincare.spotlight_subtitle') }}
            </p>
        </div>

        <!-- 3-Column Layout: Left 2 Features | Center Featured Bottle | Right 2 Features -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-6 items-center">
            
            <!-- Left Features (2 blocks) -->
            <div class="lg:col-span-4 space-y-8 sm:space-y-12">
                
                <!-- Left Feature 1 -->
                <div class="flex items-start gap-4 p-5 rounded-2xl bg-white/70 backdrop-blur-xs border border-white/80 shadow-xs hover:bg-white transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-liva-sage-light text-liva-olive flex items-center justify-center shrink-0 shadow-2xs">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-[11px] font-bold text-liva-gold uppercase tracking-wider mb-1">01 / FORMULA</div>
                        <h3 class="font-semibold text-base text-liva-dark mb-1" data-i18n="leftFeature1Title">
                            {{ __('skincare.left_feat_1_title') }}
                        </h3>
                        <p class="text-xs text-liva-muted leading-relaxed" data-i18n="leftFeature1Desc">
                            {{ __('skincare.left_feat_1_desc') }}
                        </p>
                    </div>
                </div>

                <!-- Left Feature 2 -->
                <div class="flex items-start gap-4 p-5 rounded-2xl bg-white/70 backdrop-blur-xs border border-white/80 shadow-xs hover:bg-white transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-[#F2EDE4] text-liva-dark-olive flex items-center justify-center shrink-0 shadow-2xs">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-[11px] font-bold text-liva-gold uppercase tracking-wider mb-1">02 / PROTECTION</div>
                        <h3 class="font-semibold text-base text-liva-dark mb-1" data-i18n="leftFeature2Title">
                            {{ __('skincare.left_feat_2_title') }}
                        </h3>
                        <p class="text-xs text-liva-muted leading-relaxed" data-i18n="leftFeature2Desc">
                            {{ __('skincare.left_feat_2_desc') }}
                        </p>
                    </div>
                </div>

            </div>

            <!-- Center Showcase Bottle (Tall Center Visual from Wireframe) -->
            <div class="lg:col-span-4 flex flex-col items-center justify-center relative my-4 lg:my-0">
                <div class="relative w-full max-w-[340px] aspect-[3/4] rounded-3xl bg-gradient-to-b from-[#EFEAE0] via-[#E4DDD0] to-[#D9D0C1] p-6 flex flex-col items-center justify-center shadow-xl border border-white/80 group overflow-hidden">
                    
                    <!-- Ambient circular halo -->
                    <div class="absolute w-52 h-52 rounded-full bg-white/60 blur-2xl pointer-events-none"></div>

                    <!-- Center Featured Bottle Image -->
                    <img src="/img/ritual-duo.webp" 
                         alt="LIVA Signature Ritual Formula" 
                         class="max-h-[88%] w-auto object-contain drop-shadow-2xl transition-all duration-700 group-hover:scale-105"
                         loading="lazy" />

                    <!-- Floating Badge -->
                    <div class="absolute bottom-4 inset-x-6 bg-white/95 backdrop-blur-md py-2.5 px-4 rounded-xl shadow-md border border-liva-border text-center">
                        <div class="text-[10px] tracking-widest uppercase font-bold text-liva-gold">PATENTED PHYTOTECH</div>
                        <div class="text-xs font-semibold text-liva-dark">Liva Restorative Ritual Duo</div>
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <button type="button" 
                            onclick="window.livaApp.addToCart('liva-ritual-duo')"
                            class="px-6 py-2.5 bg-liva-dark hover:bg-liva-olive text-white text-xs tracking-wider uppercase font-semibold rounded-full shadow-md hover:shadow-lg transition-all"
                            data-i18n="spotlightCta">
                        {{ __('skincare.spotlight_cta') }}
                    </button>
                </div>
            </div>

            <!-- Right Features (2 blocks) -->
            <div class="lg:col-span-4 space-y-8 sm:space-y-12">
                
                <!-- Right Feature 1 -->
                <div class="flex items-start gap-4 p-5 rounded-2xl bg-white/70 backdrop-blur-xs border border-white/80 shadow-xs hover:bg-white transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-[#F6ECE6] text-liva-terracotta flex items-center justify-center shrink-0 shadow-2xs">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-[11px] font-bold text-liva-gold uppercase tracking-wider mb-1">03 / GLOW</div>
                        <h3 class="font-semibold text-base text-liva-dark mb-1" data-i18n="rightFeature1Title">
                            {{ __('skincare.right_feat_1_title') }}
                        </h3>
                        <p class="text-xs text-liva-muted leading-relaxed" data-i18n="rightFeature1Desc">
                            {{ __('skincare.right_feat_1_desc') }}
                        </p>
                    </div>
                </div>

                <!-- Right Feature 2 -->
                <div class="flex items-start gap-4 p-5 rounded-2xl bg-white/70 backdrop-blur-xs border border-white/80 shadow-xs hover:bg-white transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-[#E8ECE9] text-liva-olive flex items-center justify-center shrink-0 shadow-2xs">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-[11px] font-bold text-liva-gold uppercase tracking-wider mb-1">04 / SATIN VEIL</div>
                        <h3 class="font-semibold text-base text-liva-dark mb-1" data-i18n="rightFeature2Title">
                            {{ __('skincare.right_feat_2_title') }}
                        </h3>
                        <p class="text-xs text-liva-muted leading-relaxed" data-i18n="rightFeature2Desc">
                            {{ __('skincare.right_feat_2_desc') }}
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>


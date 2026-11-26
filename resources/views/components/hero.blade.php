<section id="hero-slider-section" class="relative w-full overflow-hidden select-none">
    
    <!-- Full-Bleed Viewport Container -->
    <div id="hero-carousel-card" class="relative w-full h-[440px] sm:h-[500px] md:h-[580px] lg:h-[640px] overflow-hidden">
        
        <!-- Slide Track Wrapper -->
        <div id="hero-carousel-track" class="flex h-full transition-transform duration-700 ease-out will-change-transform" style="transform: translateX(0%);">
            
            <!-- ========================================== -->
            <!-- SLIDE 1: FULL BG IMG + TITLE + DESC ONLY  -->
            <!-- ========================================== -->
            <div class="hero-slide relative w-full h-full shrink-0 min-w-full flex items-center overflow-hidden" data-slide-index="0">
                <!-- Full Background Image -->
                <img src="/img/hero.webp" 
                     alt="LIVA Botanical Skincare Ritual" 
                     class="absolute inset-0 w-full h-full object-cover object-center" 
                     loading="eager" />

                <!-- Subtle Film Scrim Gradient for Crisp Text Legibility -->
                <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/40 to-transparent sm:from-black/70 sm:via-black/30"></div>

                <!-- Content: Title and Some Description Only -->
                <div class="relative z-10 max-w-7xl mx-auto w-full px-14 sm:px-16">
                    <div class="max-w-xl lg:max-w-2xl space-y-3 sm:space-y-4 text-white">
                        <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-white leading-[1.14] tracking-tight drop-shadow-md" data-i18n="slide1Title">
                            {{ __('skincare.slide1_title') ?? 'Pure Botanical Alchemy for Radiant, Timeless Skin' }}
                        </h2>

                        <p class="text-sm sm:text-base md:text-lg text-white/90 font-normal leading-relaxed drop-shadow-sm max-w-xl" data-i18n="slide1Desc">
                            {{ __('skincare.slide1_desc') ?? 'Formulated with potent bio-compatible botanicals, cold-pressed plant extracts, and clinical actives to deeply nourish, fortify the lipid barrier, and reveal your natural luminescence.' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- SLIDE 2: FULL BG IMG + TITLE + DESC ONLY  -->
            <!-- ========================================== -->
            <div class="hero-slide relative w-full h-full shrink-0 min-w-full flex items-center overflow-hidden" data-slide-index="1">
                <!-- Full Background Image -->
                <img src="/img/campaign/hair-pair.webp" 
                     alt="Liva Restorative Ritual Duo" 
                     class="absolute inset-0 w-full h-full object-cover object-center" 
                     loading="lazy" />

                <!-- Subtle Film Scrim Gradient for Crisp Text Legibility -->
                <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/40 to-transparent sm:from-black/70 sm:via-black/30"></div>

                <!-- Content: Title and Some Description Only -->
                <div class="relative z-10 max-w-7xl mx-auto w-full px-14 sm:px-16">
                    <div class="max-w-xl lg:max-w-2xl space-y-3 sm:space-y-4 text-white">
                        <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-white leading-[1.14] tracking-tight drop-shadow-md" data-i18n="slide2Title">
                            {{ __('skincare.slide2_title') ?? 'Patented Phytotech for Deep Cellular Hydration' }}
                        </h2>

                        <p class="text-sm sm:text-base md:text-lg text-white/90 font-normal leading-relaxed drop-shadow-sm max-w-xl" data-i18n="slide2Desc">
                            {{ __('skincare.slide2_desc') ?? 'Our iconic dual-step ritual combines cold-pressed camellia seed elixir and restorative oat ceramide. Locks in dermal moisture for 72 hours while defending against fatigue.' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- SLIDE 3: FULL BG IMG + TITLE + DESC ONLY  -->
            <!-- ========================================== -->
            <div class="hero-slide relative w-full h-full shrink-0 min-w-full flex items-center overflow-hidden" data-slide-index="2">
                <!-- Full Background Image -->
                <img src="/img/campaign/your-moment.webp" 
                     alt="LIVA Daily Botanical Care Edit" 
                     class="absolute inset-0 w-full h-full object-cover object-center" 
                     loading="lazy" />

                <!-- Subtle Film Scrim Gradient for Crisp Text Legibility -->
                <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/40 to-transparent sm:from-black/70 sm:via-black/30"></div>

                <!-- Content: Title and Some Description Only -->
                <div class="relative z-10 max-w-7xl mx-auto w-full px-14 sm:px-16">
                    <div class="max-w-xl lg:max-w-2xl space-y-3 sm:space-y-4 text-white">
                        <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-white leading-[1.14] tracking-tight drop-shadow-md" data-i18n="slide3Title">
                            {{ __('skincare.slide3_title') ?? 'Mindful Everyday Rituals for Body and Scalp' }}
                        </h2>

                        <p class="text-sm sm:text-base md:text-lg text-white/90 font-normal leading-relaxed drop-shadow-sm max-w-xl" data-i18n="slide3Desc">
                            {{ __('skincare.slide3_desc') ?? 'Infused with cold-pressed camellia, nourishing shea butter, and clarifying bergamot. Transforms everyday cleansing into an aromatic sanctuary of restorative wellness.' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- SLIDE 4: FULL BG IMG + TITLE + DESC ONLY  -->
            <!-- ========================================== -->
            <div class="hero-slide relative w-full h-full shrink-0 min-w-full flex items-center overflow-hidden" data-slide-index="3">
                <!-- Full Background Image -->
                <img src="/img/campaign/everyday-poster.webp" 
                     alt="LIVA Botanical Travel Radiance Set" 
                     class="absolute inset-0 w-full h-full object-cover object-center" 
                     loading="lazy" />

                <!-- Subtle Film Scrim Gradient for Crisp Text Legibility -->
                <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/40 to-transparent sm:from-black/70 sm:via-black/30"></div>

                <!-- Content: Title and Some Description Only -->
                <div class="relative z-10 max-w-7xl mx-auto w-full px-14 sm:px-16">
                    <div class="max-w-xl lg:max-w-2xl space-y-3 sm:space-y-4 text-white">
                        <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-white leading-[1.14] tracking-tight drop-shadow-md" data-i18n="slide4Title">
                            {{ __('skincare.slide4_title') ?? 'Radiant Skin Anywhere Your Journey Leads' }}
                        </h2>

                        <p class="text-sm sm:text-base md:text-lg text-white/90 font-normal leading-relaxed drop-shadow-sm max-w-xl" data-i18n="slide4Desc">
                            {{ __('skincare.slide4_desc') ?? 'Four curated TSA-friendly travel miniatures formulated to prevent cabin dehydration and shield against climate stress wherever your journey leads.' }}
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Navigation Controls: Left & Right Arrows -->
        <button type="button" 
                id="hero-slide-prev"
                class="absolute left-3 sm:left-6 md:left-8 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-black/35 hover:bg-black/60 text-white border border-white/25 shadow-lg flex items-center justify-center transition-all duration-300 z-20 cursor-pointer backdrop-blur-md group hover:scale-105 active:scale-95"
                aria-label="Previous Slide">
            <svg class="w-5 h-5 text-white/90 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        <button type="button" 
                id="hero-slide-next"
                class="absolute right-3 sm:right-6 md:right-8 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-black/35 hover:bg-black/60 text-white border border-white/25 shadow-lg flex items-center justify-center transition-all duration-300 z-20 cursor-pointer backdrop-blur-md group hover:scale-105 active:scale-95"
                aria-label="Next Slide">
            <svg class="w-5 h-5 text-white/90 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

    </div>

</section>

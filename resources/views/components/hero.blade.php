<section id="hero-slider-section" class="relative overflow-hidden bg-gradient-to-b from-[#F9F6F0] via-[#F4EFE6] to-[#FAF7F2] border-b border-liva-border select-none">
    <!-- Subtle Ambient Glow -->
    <div class="absolute -top-20 left-1/4 w-[500px] h-[300px] bg-[#E8DEC8]/35 blur-[100px] pointer-events-none rounded-full"></div>
    <div class="absolute -bottom-20 right-1/4 w-[500px] h-[300px] bg-[#D8E3D7]/30 blur-[100px] pointer-events-none rounded-full"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 md:py-10">
        
        <!-- Main Carousel Card -->
        <div id="hero-carousel-card" class="relative overflow-hidden rounded-3xl bg-white border border-liva-border/70 shadow-xl group">
            
            <!-- Slide Track Wrapper -->
            <div id="hero-carousel-track" class="flex transition-transform duration-700 ease-out will-change-transform" style="transform: translateX(0%);">
                
                <!-- ========================================== -->
                <!-- SLIDE 1: IMAGE + TITLE + DESCRIPTION ONLY  -->
                <!-- ========================================== -->
                <div class="hero-slide w-full shrink-0 min-w-full p-6 sm:p-10 md:p-12 lg:p-14 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center" data-slide-index="0">
                    
                    <!-- Image Only -->
                    <div class="lg:col-span-6 flex items-center justify-center">
                        <div class="relative w-full aspect-[4/3] sm:aspect-[16/10] md:aspect-[16/11] rounded-2xl sm:rounded-3xl overflow-hidden bg-[#F2EDE4] shadow-sm">
                            <img src="/img/hero.webp" 
                                 alt="LIVA Skincare Botanical Ritual" 
                                 class="w-full h-full object-cover" 
                                 loading="eager" />
                        </div>
                    </div>

                    <!-- Title and Some Description Only -->
                    <div class="lg:col-span-6 space-y-4 sm:space-y-6 flex flex-col justify-center">
                        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif font-bold text-liva-dark leading-[1.18] tracking-tight" data-i18n="slide1Title">
                            {{ __('skincare.slide1_title') ?? 'Pure Botanical Alchemy for Radiant, Timeless Skin' }}
                        </h2>

                        <p class="text-sm sm:text-base md:text-lg text-liva-muted font-normal leading-relaxed max-w-xl" data-i18n="slide1Desc">
                            {{ __('skincare.slide1_desc') ?? 'Formulated with potent bio-compatible botanicals, cold-pressed plant extracts, and clinical actives to deeply nourish, fortify the lipid barrier, and reveal your natural luminescence.' }}
                        </p>
                    </div>

                </div>

                <!-- ========================================== -->
                <!-- SLIDE 2: IMAGE + TITLE + DESCRIPTION ONLY  -->
                <!-- ========================================== -->
                <div class="hero-slide w-full shrink-0 min-w-full p-6 sm:p-10 md:p-12 lg:p-14 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center" data-slide-index="1">
                    
                    <!-- Image Only -->
                    <div class="lg:col-span-6 flex items-center justify-center">
                        <div class="relative w-full aspect-[4/3] sm:aspect-[16/10] md:aspect-[16/11] rounded-2xl sm:rounded-3xl overflow-hidden bg-gradient-to-b from-[#EFEAE0] via-[#E4DDD0] to-[#D9D0C1] p-6 flex items-center justify-center shadow-sm">
                            <img src="/img/ritual-duo.webp" 
                                 alt="Liva Restorative Ritual Duo" 
                                 class="max-h-[85%] w-auto object-contain drop-shadow-xl" 
                                 loading="lazy" />
                        </div>
                    </div>

                    <!-- Title and Some Description Only -->
                    <div class="lg:col-span-6 space-y-4 sm:space-y-6 flex flex-col justify-center">
                        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif font-bold text-liva-dark leading-[1.18] tracking-tight" data-i18n="slide2Title">
                            {{ __('skincare.slide2_title') ?? 'Patented Phytotech for Deep Cellular Hydration' }}
                        </h2>

                        <p class="text-sm sm:text-base md:text-lg text-liva-muted font-normal leading-relaxed max-w-xl" data-i18n="slide2Desc">
                            {{ __('skincare.slide2_desc') ?? 'Our iconic dual-step ritual combines cold-pressed camellia seed elixir and restorative oat ceramide. Locks in dermal moisture for 72 hours while defending against fatigue.' }}
                        </p>
                    </div>

                </div>

                <!-- ========================================== -->
                <!-- SLIDE 3: IMAGE + TITLE + DESCRIPTION ONLY  -->
                <!-- ========================================== -->
                <div class="hero-slide w-full shrink-0 min-w-full p-6 sm:p-10 md:p-12 lg:p-14 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center" data-slide-index="2">
                    
                    <!-- Image Only -->
                    <div class="lg:col-span-6 flex items-center justify-center">
                        <div class="relative w-full aspect-[4/3] sm:aspect-[16/10] md:aspect-[16/11] rounded-2xl sm:rounded-3xl overflow-hidden bg-[#F5F1E9] shadow-sm">
                            <img src="/img/daily-edit.webp" 
                                 alt="LIVA Daily Botanical Care Edit" 
                                 class="w-full h-full object-cover" 
                                 loading="lazy" />
                        </div>
                    </div>

                    <!-- Title and Some Description Only -->
                    <div class="lg:col-span-6 space-y-4 sm:space-y-6 flex flex-col justify-center">
                        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif font-bold text-liva-dark leading-[1.18] tracking-tight" data-i18n="slide3Title">
                            {{ __('skincare.slide3_title') ?? 'Mindful Everyday Rituals for Body and Scalp' }}
                        </h2>

                        <p class="text-sm sm:text-base md:text-lg text-liva-muted font-normal leading-relaxed max-w-xl" data-i18n="slide3Desc">
                            {{ __('skincare.slide3_desc') ?? 'Infused with cold-pressed camellia, nourishing shea butter, and clarifying bergamot. Transforms everyday cleansing into an aromatic sanctuary of restorative wellness.' }}
                        </p>
                    </div>

                </div>

                <!-- ========================================== -->
                <!-- SLIDE 4: IMAGE + TITLE + DESCRIPTION ONLY  -->
                <!-- ========================================== -->
                <div class="hero-slide w-full shrink-0 min-w-full p-6 sm:p-10 md:p-12 lg:p-14 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center" data-slide-index="3">
                    
                    <!-- Image Only -->
                    <div class="lg:col-span-6 flex items-center justify-center">
                        <div class="relative w-full aspect-[4/3] sm:aspect-[16/10] md:aspect-[16/11] rounded-2xl sm:rounded-3xl overflow-hidden bg-gradient-to-b from-[#EAE6DF] via-[#DFDBD0] to-[#D5CFBF] p-6 flex items-center justify-center shadow-sm">
                            <img src="/img/travel-set.webp" 
                                 alt="LIVA Botanical Travel Radiance Set" 
                                 class="max-h-[85%] w-auto object-contain drop-shadow-xl" 
                                 loading="lazy" />
                        </div>
                    </div>

                    <!-- Title and Some Description Only -->
                    <div class="lg:col-span-6 space-y-4 sm:space-y-6 flex flex-col justify-center">
                        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif font-bold text-liva-dark leading-[1.18] tracking-tight" data-i18n="slide4Title">
                            {{ __('skincare.slide4_title') ?? 'Radiant Skin Anywhere Your Journey Leads' }}
                        </h2>

                        <p class="text-sm sm:text-base md:text-lg text-liva-muted font-normal leading-relaxed max-w-xl" data-i18n="slide4Desc">
                            {{ __('skincare.slide4_desc') ?? 'Four curated TSA-friendly travel miniatures formulated to prevent cabin dehydration and shield against climate stress wherever your journey leads.' }}
                        </p>
                    </div>

                </div>

            </div>

            <!-- Navigation Controls: Left & Right Arrows -->
            <button type="button" 
                    id="hero-slide-prev"
                    class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/90 hover:bg-white text-liva-dark border border-liva-border shadow-md hover:shadow-xl flex items-center justify-center transition-all duration-300 z-20 cursor-pointer backdrop-blur-md group hover:scale-105 active:scale-95"
                    aria-label="Previous Slide">
                <svg class="w-5 h-5 text-liva-charcoal group-hover:text-liva-dark transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button type="button" 
                    id="hero-slide-next"
                    class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/90 hover:bg-white text-liva-dark border border-liva-border shadow-md hover:shadow-xl flex items-center justify-center transition-all duration-300 z-20 cursor-pointer backdrop-blur-md group hover:scale-105 active:scale-95"
                    aria-label="Next Slide">
                <svg class="w-5 h-5 text-liva-charcoal group-hover:text-liva-dark transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            <!-- Bottom Pagination Pill Bar: Dots & Counter -->
            <div class="absolute bottom-4 sm:bottom-6 left-1/2 -translate-x-1/2 flex items-center gap-3 z-20 bg-white/90 backdrop-blur-md px-4 sm:px-5 py-2 rounded-full border border-white/90 shadow-md">
                <div class="flex items-center gap-1.5" id="hero-slide-dots">
                    <button type="button" class="hero-dot w-8 h-2 rounded-full bg-liva-dark transition-all duration-300 cursor-pointer" data-dot-index="0" aria-label="Slide 1"></button>
                    <button type="button" class="hero-dot w-2.5 h-2 rounded-full bg-liva-charcoal/25 hover:bg-liva-charcoal/50 transition-all duration-300 cursor-pointer" data-dot-index="1" aria-label="Slide 2"></button>
                    <button type="button" class="hero-dot w-2.5 h-2 rounded-full bg-liva-charcoal/25 hover:bg-liva-charcoal/50 transition-all duration-300 cursor-pointer" data-dot-index="2" aria-label="Slide 3"></button>
                    <button type="button" class="hero-dot w-2.5 h-2 rounded-full bg-liva-charcoal/25 hover:bg-liva-charcoal/50 transition-all duration-300 cursor-pointer" data-dot-index="3" aria-label="Slide 4"></button>
                </div>
                <div class="h-3.5 w-[1px] bg-liva-border"></div>
                <span id="hero-slide-counter" class="text-[11px] sm:text-xs font-bold text-liva-charcoal tracking-widest select-none">01 / 04</span>
            </div>

        </div>

    </div>
</section>

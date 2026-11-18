<section id="hero-slider-section" class="relative overflow-hidden bg-gradient-to-b from-[#F9F6F0] via-[#F4EFE6] to-[#FAF7F2] border-b border-liva-border select-none">
    <!-- Ambient Organic Background Glows -->
    <div class="absolute -top-20 left-1/4 w-[520px] h-[340px] bg-[#E8DEC8]/45 blur-[110px] pointer-events-none rounded-full"></div>
    <div class="absolute -bottom-20 right-1/4 w-[520px] h-[340px] bg-[#D8E3D7]/40 blur-[110px] pointer-events-none rounded-full"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10 md:py-14">
        
        <!-- Main Carousel Viewport Card -->
        <div id="hero-carousel-card" class="relative overflow-hidden rounded-3xl bg-white/70 backdrop-blur-md border border-white/90 shadow-2xl shadow-liva-stone/50 group">
            
            <!-- Progress Line Indicator at Top of Banner -->
            <div class="absolute top-0 left-0 right-0 h-1 bg-liva-stone/40 z-30 overflow-hidden">
                <div id="hero-slide-progress" class="h-full bg-liva-gold transition-all ease-linear w-0"></div>
            </div>

            <!-- Slide Track Wrapper -->
            <div id="hero-carousel-track" class="flex transition-transform duration-700 ease-out will-change-transform" style="transform: translateX(0%);">
                
                <!-- ========================================== -->
                <!-- SLIDE 1: PURE BOTANICAL ALCHEMY (Hero)    -->
                <!-- ========================================== -->
                <div class="hero-slide w-full shrink-0 min-w-full p-6 sm:p-10 md:p-14 lg:p-16 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center" data-slide-index="0">
                    
                    <!-- Text / Content Column -->
                    <div class="lg:col-span-7 space-y-5 sm:space-y-6 order-2 lg:order-1">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-liva-sage-light/80 text-liva-olive text-xs font-semibold tracking-wider uppercase border border-liva-sage/30 shadow-2xs">
                            <span class="w-2 h-2 rounded-full bg-liva-olive animate-pulse"></span>
                            <span data-i18n="slide1Tag">{{ __('skincare.slide1_tag') ?? '100% ORGANIC BOTANICAL SKINCARE' }}</span>
                        </div>

                        <h2 class="text-2xl sm:text-4xl md:text-5xl font-serif font-bold text-liva-dark leading-[1.12] tracking-tight" data-i18n="slide1Title">
                            {{ __('skincare.slide1_title') ?? 'Pure Botanical Alchemy for Radiant, Timeless Skin' }}
                        </h2>

                        <p class="text-xs sm:text-base text-liva-muted font-normal max-w-xl leading-relaxed" data-i18n="slide1Desc">
                            {{ __('skincare.slide1_desc') ?? 'Formulated with potent bio-compatible botanicals, cold-pressed plant extracts, and clinical actives to deeply nourish, fortify the lipid barrier, and reveal your natural luminescence.' }}
                        </p>

                        <!-- CTA Actions -->
                        <div class="pt-2 flex flex-wrap items-center gap-3 sm:gap-4">
                            <a href="#collection" 
                               class="px-6 sm:px-7 py-3 sm:py-3.5 bg-liva-dark hover:bg-liva-olive text-white text-xs sm:text-sm tracking-wider uppercase font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5 inline-flex items-center gap-2.5"
                               data-i18n="slide1BtnPrimary">
                                <span>{{ __('skincare.slide1_btn_primary') ?? 'Explore Collection' }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>

                            <a href="/product/liva-ritual-duo" 
                               class="px-5 sm:px-6 py-3 sm:py-3.5 bg-white hover:bg-liva-stone text-liva-dark border border-liva-border hover:border-liva-charcoal text-xs sm:text-sm tracking-wider uppercase font-semibold rounded-full shadow-xs transition-all duration-200 inline-flex items-center gap-2"
                               data-i18n="slide1BtnSecondary">
                                <span>{{ __('skincare.slide1_btn_secondary') ?? 'Shop Ritual Duo ($59.50)' }}</span>
                            </a>
                        </div>

                        <!-- Botanical Quality Perks -->
                        <div class="pt-2 flex flex-wrap items-center gap-x-5 gap-y-2 text-[11px] sm:text-xs text-liva-charcoal/80 font-medium">
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-liva-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>100% Organic Extracts</span>
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-liva-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>Dermatologist Approved</span>
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-liva-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>Free Shipping over $50</span>
                            </span>
                        </div>
                    </div>

                    <!-- Image Showcase Column -->
                    <div class="lg:col-span-5 order-1 lg:order-2 flex items-center justify-center">
                        <div class="relative w-full max-w-md aspect-[4/3] sm:aspect-square rounded-3xl overflow-hidden bg-gradient-to-b from-[#F2EDE4] to-[#E5DDD0] p-4 sm:p-6 shadow-xl border border-white/80 group/img">
                            <img src="/img/hero.webp" 
                                 alt="LIVA Skincare Hero Ritual" 
                                 class="w-full h-full object-cover rounded-2xl shadow-inner group-hover/img:scale-103 transition-transform duration-700" 
                                 loading="eager" />

                            <!-- Floating Botanical Badge -->
                            <div class="absolute bottom-6 left-6 right-6 bg-white/95 backdrop-blur-md p-3.5 rounded-2xl border border-white/80 shadow-lg flex items-center justify-between gap-3">
                                <div>
                                    <div class="text-[10px] font-bold tracking-wider uppercase text-liva-gold">Daily Ritual Duo</div>
                                    <div class="text-xs font-semibold text-liva-dark truncate">Camellia Seed & Restorative Oat Ceramide</div>
                                </div>
                                <span class="px-2.5 py-1 rounded-full bg-liva-dark text-white text-[11px] font-bold tracking-wider shrink-0">$59.50</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ========================================== -->
                <!-- SLIDE 2: SIGNATURE RITUAL DUO (Bestseller)-->
                <!-- ========================================== -->
                <div class="hero-slide w-full shrink-0 min-w-full p-6 sm:p-10 md:p-14 lg:p-16 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center" data-slide-index="1">
                    
                    <!-- Text / Content Column -->
                    <div class="lg:col-span-7 space-y-5 sm:space-y-6 order-2 lg:order-1">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-50 text-amber-800 text-xs font-semibold tracking-wider uppercase border border-amber-200/60 shadow-2xs">
                            <span class="w-2 h-2 rounded-full bg-amber-600"></span>
                            <span data-i18n="slide2Tag">{{ __('skincare.slide2_tag') ?? 'SIGNATURE RITUAL • SAVE 15%' }}</span>
                        </div>

                        <h2 class="text-2xl sm:text-4xl md:text-5xl font-serif font-bold text-liva-dark leading-[1.12] tracking-tight" data-i18n="slide2Title">
                            {{ __('skincare.slide2_title') ?? 'Patented Phytotech for Deep Cellular Hydration' }}
                        </h2>

                        <p class="text-xs sm:text-base text-liva-muted font-normal max-w-xl leading-relaxed" data-i18n="slide2Desc">
                            {{ __('skincare.slide2_desc') ?? 'Our iconic dual-step ritual combines cold-pressed camellia seed elixir and restorative oat ceramide. Locks in dermal moisture for 72 hours while defending against fatigue.' }}
                        </p>

                        <!-- CTA Actions -->
                        <div class="pt-2 flex flex-wrap items-center gap-3 sm:gap-4">
                            <a href="/product/liva-ritual-duo" 
                               class="px-6 sm:px-7 py-3 sm:py-3.5 bg-liva-dark hover:bg-liva-olive text-white text-xs sm:text-sm tracking-wider uppercase font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5 inline-flex items-center gap-2.5"
                               data-i18n="slide2BtnPrimary">
                                <span>{{ __('skincare.slide2_btn_primary') ?? 'Shop Ritual Duo ($59.50)' }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>

                            <button type="button" 
                                    onclick="window.livaApp.addToCart('liva-ritual-duo')"
                                    class="px-5 sm:px-6 py-3 sm:py-3.5 bg-white hover:bg-liva-stone text-liva-dark border border-liva-border hover:border-liva-charcoal text-xs sm:text-sm tracking-wider uppercase font-semibold rounded-full shadow-xs transition-all duration-200 inline-flex items-center gap-2 cursor-pointer"
                                    data-i18n="slide2BtnSecondary">
                                <svg class="w-4 h-4 text-liva-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                <span>{{ __('skincare.slide2_btn_secondary') ?? 'Quick Add to Bag' }}</span>
                            </button>
                        </div>

                        <!-- Features -->
                        <div class="pt-2 flex flex-wrap items-center gap-x-5 gap-y-2 text-[11px] sm:text-xs text-liva-charcoal/80 font-medium">
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-liva-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>2 Full Size Bottles (600ml Total)</span>
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-liva-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>15% Bundle Discount Included</span>
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-liva-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>Complimentary Gift Box</span>
                            </span>
                        </div>
                    </div>

                    <!-- Image Showcase Column -->
                    <div class="lg:col-span-5 order-1 lg:order-2 flex items-center justify-center">
                        <div class="relative w-full max-w-md aspect-[4/3] sm:aspect-square rounded-3xl overflow-hidden bg-gradient-to-b from-[#EFEAE0] via-[#E4DDD0] to-[#D9D0C1] p-6 flex flex-col items-center justify-center shadow-xl border border-white/80 group/img">
                            <div class="absolute w-56 h-56 rounded-full bg-white/70 blur-2xl pointer-events-none"></div>
                            
                            <img src="/img/ritual-duo.webp" 
                                 alt="Liva Restorative Ritual Duo" 
                                 class="max-h-[85%] w-auto object-contain drop-shadow-2xl transition-all duration-700 group-hover/img:scale-105" 
                                 loading="lazy" />

                            <div class="absolute bottom-5 inset-x-6 bg-white/95 backdrop-blur-md py-2.5 px-4 rounded-xl shadow-md border border-liva-border text-center flex items-center justify-between">
                                <div class="text-left">
                                    <div class="text-[10px] tracking-widest uppercase font-bold text-liva-gold">PATENTED PHYTOTECH</div>
                                    <div class="text-xs font-semibold text-liva-dark">Liva Restorative Ritual Duo</div>
                                </div>
                                <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-200">Save 15%</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ========================================== -->
                <!-- SLIDE 3: BOTANICAL BODY & HAIR CARE EDIT  -->
                <!-- ========================================== -->
                <div class="hero-slide w-full shrink-0 min-w-full p-6 sm:p-10 md:p-14 lg:p-16 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center" data-slide-index="2">
                    
                    <!-- Text / Content Column -->
                    <div class="lg:col-span-7 space-y-5 sm:space-y-6 order-2 lg:order-1">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#EBF0EA] text-[#2C4A32] text-xs font-semibold tracking-wider uppercase border border-[#2C4A32]/20 shadow-2xs">
                            <span class="w-2 h-2 rounded-full bg-[#2C4A32]"></span>
                            <span data-i18n="slide3Tag">{{ __('skincare.slide3_tag') ?? 'LUXURY BODY & HAIR CARE' }}</span>
                        </div>

                        <h2 class="text-2xl sm:text-4xl md:text-5xl font-serif font-bold text-liva-dark leading-[1.12] tracking-tight" data-i18n="slide3Title">
                            {{ __('skincare.slide3_title') ?? 'Mindful Everyday Rituals for Body and Scalp' }}
                        </h2>

                        <p class="text-xs sm:text-base text-liva-muted font-normal max-w-xl leading-relaxed" data-i18n="slide3Desc">
                            {{ __('skincare.slide3_desc') ?? 'Infused with cold-pressed camellia, nourishing shea butter, and clarifying bergamot. Transforms everyday cleansing into an aromatic sanctuary of restorative wellness.' }}
                        </p>

                        <!-- CTA Actions -->
                        <div class="pt-2 flex flex-wrap items-center gap-3 sm:gap-4">
                            <button type="button" 
                                    onclick="window.livaApp.openAllProductsModal('all')"
                                    class="px-6 sm:px-7 py-3 sm:py-3.5 bg-liva-dark hover:bg-liva-olive text-white text-xs sm:text-sm tracking-wider uppercase font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5 inline-flex items-center gap-2.5 cursor-pointer"
                                    data-i18n="slide3BtnPrimary">
                                <span>{{ __('skincare.slide3_btn_primary') ?? 'Explore All Products' }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>

                            <a href="/product/liva-shower-gel" 
                               class="px-5 sm:px-6 py-3 sm:py-3.5 bg-white hover:bg-liva-stone text-liva-dark border border-liva-border hover:border-liva-charcoal text-xs sm:text-sm tracking-wider uppercase font-semibold rounded-full shadow-xs transition-all duration-200 inline-flex items-center gap-2"
                               data-i18n="slide3BtnSecondary">
                                <span>{{ __('skincare.slide3_btn_secondary') ?? 'Discover Shower Gel' }}</span>
                            </a>
                        </div>

                        <!-- Features -->
                        <div class="pt-2 flex flex-wrap items-center gap-x-5 gap-y-2 text-[11px] sm:text-xs text-liva-charcoal/80 font-medium">
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-liva-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>Zero Sulfates or Silicones</span>
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-liva-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>Aromatherapy Botanicals</span>
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-liva-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>100% Recyclable Glass</span>
                            </span>
                        </div>
                    </div>

                    <!-- Image Showcase Column -->
                    <div class="lg:col-span-5 order-1 lg:order-2 flex items-center justify-center">
                        <div class="relative w-full max-w-md aspect-[4/3] sm:aspect-square rounded-3xl overflow-hidden bg-gradient-to-b from-[#F5F1E9] to-[#EBE4D6] p-4 sm:p-6 shadow-xl border border-white/80 group/img">
                            <img src="/img/daily-edit.webp" 
                                 alt="LIVA Daily Botanical Care Edit" 
                                 class="w-full h-full object-cover rounded-2xl shadow-inner group-hover/img:scale-103 transition-transform duration-700" 
                                 loading="lazy" />

                            <div class="absolute bottom-6 left-6 right-6 bg-white/95 backdrop-blur-md p-3.5 rounded-2xl border border-white/80 shadow-lg flex items-center justify-between gap-3">
                                <div>
                                    <div class="text-[10px] font-bold tracking-wider uppercase text-liva-gold">Daily Care Edit</div>
                                    <div class="text-xs font-semibold text-liva-dark truncate">Velvet Nourishing Body Formulations</div>
                                </div>
                                <span class="px-2.5 py-1 rounded-full bg-liva-olive text-white text-[11px] font-bold tracking-wider shrink-0">Pure Clean</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ========================================== -->
                <!-- SLIDE 4: TRAVEL RADIANCE ESSENTIALS       -->
                <!-- ========================================== -->
                <div class="hero-slide w-full shrink-0 min-w-full p-6 sm:p-10 md:p-14 lg:p-16 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center" data-slide-index="3">
                    
                    <!-- Text / Content Column -->
                    <div class="lg:col-span-7 space-y-5 sm:space-y-6 order-2 lg:order-1">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#EBF3F5] text-[#1B4D58] text-xs font-semibold tracking-wider uppercase border border-[#1B4D58]/20 shadow-2xs">
                            <span class="w-2 h-2 rounded-full bg-[#1B4D58]"></span>
                            <span data-i18n="slide4Tag">{{ __('skincare.slide4_tag') ?? 'TRAVEL EDITION' }}</span>
                        </div>

                        <h2 class="text-2xl sm:text-4xl md:text-5xl font-serif font-bold text-liva-dark leading-[1.12] tracking-tight" data-i18n="slide4Title">
                            {{ __('skincare.slide4_title') ?? 'Radiant Skin Anywhere Your Journey Leads' }}
                        </h2>

                        <p class="text-xs sm:text-base text-liva-muted font-normal max-w-xl leading-relaxed" data-i18n="slide4Desc">
                            {{ __('skincare.slide4_desc') ?? 'Four curated TSA-friendly travel miniatures formulated to prevent cabin dehydration and shield against climate stress. Housed in a bespoke linen travel case.' }}
                        </p>

                        <!-- CTA Actions -->
                        <div class="pt-2 flex flex-wrap items-center gap-3 sm:gap-4">
                            <a href="/product/liva-travel-set" 
                               class="px-6 sm:px-7 py-3 sm:py-3.5 bg-liva-dark hover:bg-liva-olive text-white text-xs sm:text-sm tracking-wider uppercase font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5 inline-flex items-center gap-2.5"
                               data-i18n="slide4BtnPrimary">
                                <span>{{ __('skincare.slide4_btn_primary') ?? 'Shop Travel Set ($48.00)' }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>

                            <button type="button" 
                                    onclick="window.livaApp.addToCart('liva-travel-set')"
                                    class="px-5 sm:px-6 py-3 sm:py-3.5 bg-white hover:bg-liva-stone text-liva-dark border border-liva-border hover:border-liva-charcoal text-xs sm:text-sm tracking-wider uppercase font-semibold rounded-full shadow-xs transition-all duration-200 inline-flex items-center gap-2 cursor-pointer"
                                    data-i18n="slide4BtnSecondary">
                                <svg class="w-4 h-4 text-liva-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                <span>{{ __('skincare.slide4_btn_secondary') ?? 'Quick Add to Bag' }}</span>
                            </button>
                        </div>

                        <!-- Features -->
                        <div class="pt-2 flex flex-wrap items-center gap-x-5 gap-y-2 text-[11px] sm:text-xs text-liva-charcoal/80 font-medium">
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-liva-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>TSA Carry-On Approved</span>
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-liva-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>Organic Linen Pouch Included</span>
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-liva-olive" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>Refillable Amber Glass Vials</span>
                            </span>
                        </div>
                    </div>

                    <!-- Image Showcase Column -->
                    <div class="lg:col-span-5 order-1 lg:order-2 flex items-center justify-center">
                        <div class="relative w-full max-w-md aspect-[4/3] sm:aspect-square rounded-3xl overflow-hidden bg-gradient-to-b from-[#EAE6DF] via-[#DFDBD0] to-[#D5CFBF] p-6 flex flex-col items-center justify-center shadow-xl border border-white/80 group/img">
                            <div class="absolute w-56 h-56 rounded-full bg-white/70 blur-2xl pointer-events-none"></div>
                            
                            <img src="/img/travel-set.webp" 
                                 alt="LIVA Botanical Travel Radiance Set" 
                                 class="max-h-[85%] w-auto object-contain drop-shadow-2xl transition-all duration-700 group-hover/img:scale-105" 
                                 loading="lazy" />

                            <div class="absolute bottom-5 inset-x-6 bg-white/95 backdrop-blur-md py-2.5 px-4 rounded-xl shadow-md border border-liva-border text-center flex items-center justify-between">
                                <div class="text-left">
                                    <div class="text-[10px] tracking-widest uppercase font-bold text-liva-gold">LIMITED EDITION</div>
                                    <div class="text-xs font-semibold text-liva-dark">Liva Travel Radiance Set</div>
                                </div>
                                <span class="px-2.5 py-1 rounded-full bg-liva-dark text-white text-[11px] font-bold tracking-wider shrink-0">$48.00</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Navigation Controls: Left & Right Arrows -->
            <button type="button" 
                    id="hero-slide-prev"
                    class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/85 hover:bg-white text-liva-dark border border-liva-border/80 shadow-md hover:shadow-xl flex items-center justify-center transition-all duration-300 z-20 cursor-pointer backdrop-blur-md group hover:scale-105 active:scale-95"
                    aria-label="Previous Slide">
                <svg class="w-5 h-5 text-liva-charcoal group-hover:text-liva-dark transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button type="button" 
                    id="hero-slide-next"
                    class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/85 hover:bg-white text-liva-dark border border-liva-border/80 shadow-md hover:shadow-xl flex items-center justify-center transition-all duration-300 z-20 cursor-pointer backdrop-blur-md group hover:scale-105 active:scale-95"
                    aria-label="Next Slide">
                <svg class="w-5 h-5 text-liva-charcoal group-hover:text-liva-dark transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            <!-- Bottom Pagination Pill Bar: Dots & Counter -->
            <div class="absolute bottom-4 sm:bottom-6 left-1/2 -translate-x-1/2 flex items-center gap-3 z-20 bg-white/90 backdrop-blur-md px-4 sm:px-5 py-2 rounded-full border border-white/90 shadow-md">
                <!-- Interactive Dots -->
                <div class="flex items-center gap-1.5" id="hero-slide-dots">
                    <button type="button" class="hero-dot w-8 h-2 rounded-full bg-liva-dark transition-all duration-300 cursor-pointer" data-dot-index="0" aria-label="Slide 1"></button>
                    <button type="button" class="hero-dot w-2.5 h-2 rounded-full bg-liva-charcoal/25 hover:bg-liva-charcoal/50 transition-all duration-300 cursor-pointer" data-dot-index="1" aria-label="Slide 2"></button>
                    <button type="button" class="hero-dot w-2.5 h-2 rounded-full bg-liva-charcoal/25 hover:bg-liva-charcoal/50 transition-all duration-300 cursor-pointer" data-dot-index="2" aria-label="Slide 3"></button>
                    <button type="button" class="hero-dot w-2.5 h-2 rounded-full bg-liva-charcoal/25 hover:bg-liva-charcoal/50 transition-all duration-300 cursor-pointer" data-dot-index="3" aria-label="Slide 4"></button>
                </div>

                <!-- Slide Counter -->
                <div class="h-3.5 w-[1px] bg-liva-border"></div>
                <span id="hero-slide-counter" class="text-[11px] sm:text-xs font-bold text-liva-charcoal tracking-widest select-none">01 / 04</span>
            </div>

        </div>

    </div>
</section>

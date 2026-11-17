<section id="hero" class="relative pt-10 sm:pt-14 lg:pt-18 pb-16 md:pb-24 overflow-hidden">
    <!-- Subtle Background Ambient Glow -->
    <div class="absolute top-10 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-gradient-to-b from-[#EBE4D6]/50 via-transparent to-transparent blur-3xl pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Hero Text & Editorial Presentation Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <!-- Left Text Column (Wireframe Top-Left) -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Tag / Badge -->
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-liva-sage-light text-liva-olive text-xs font-semibold tracking-wider uppercase border border-liva-sage/30 shadow-2xs">
                    <span class="w-2 h-2 rounded-full bg-liva-olive"></span>
                    <span data-i18n="heroTag">{{ __('skincare.hero_tag') }}</span>
                </div>

                <!-- Main Bold Editorial Heading -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-liva-dark leading-[1.12] tracking-tight" data-i18n="heroTitle">
                    {{ __('skincare.hero_title') }}
                </h1>

                <!-- Subtitle / Descriptive Copy -->
                <p class="text-base sm:text-lg text-liva-muted font-normal max-w-2xl leading-relaxed" data-i18n="heroDesc">
                    {{ __('skincare.hero_desc') }}
                </p>

                <!-- Two CTA Buttons (from Wireframe) -->
                <div class="pt-2 flex flex-wrap items-center gap-4">
                    <!-- Primary CTA Button (Opens Complete Catalog Modal) -->
                    <button type="button" 
                       onclick="window.livaApp.openAllProductsModal('all')"
                       class="px-7 py-3.5 bg-liva-dark hover:bg-liva-olive text-white text-xs sm:text-sm tracking-wider uppercase font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5 inline-flex items-center gap-2.5 cursor-pointer"
                       data-i18n="exploreCollection">
                        <span>{{ __('skincare.explore_collection') }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>

                    <!-- Secondary CTA Button -->
                    <a href="#spotlight" 
                       class="px-7 py-3.5 bg-white hover:bg-liva-stone text-liva-dark border border-liva-border hover:border-liva-charcoal text-xs sm:text-sm tracking-wider uppercase font-semibold rounded-full shadow-xs transition-all duration-200 inline-flex items-center gap-2"
                       data-i18n="takeRoutineQuiz">
                        <svg class="w-4 h-4 text-liva-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>{{ __('skincare.take_routine_quiz') }}</span>
                    </a>
                </div>

             
            </div>

            <!-- Right Visual Showcase Column -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <!-- Elegant Rounded Container with Glass Border -->
                    <div class="relative rounded-3xl overflow-hidden bg-gradient-to-b from-[#F2EDE4] to-[#E5DDD0] p-4 sm:p-6 shadow-2xl border border-white/60">
                        <img src="/img/hero.webp" 
                             alt="LIVA Skincare Hero Ritual" 
                             class="w-full h-auto rounded-2xl object-cover shadow-inner hover:scale-102 transition-transform duration-700" 
                             loading="eager" />

                        <!-- Floating Botanical Note Badge -->
                        <div class="absolute bottom-8 left-8 right-8 bg-white/90 backdrop-blur-md p-4 rounded-2xl border border-white/80 shadow-lg flex items-center gap-3.5">
                            
                            <div>
                                <div class="text-[11px] font-bold tracking-wider uppercase text-liva-gold">Daily Ritual Duo</div>
                                <div class="text-xs font-semibold text-liva-dark">Camellia Seed & Restorative Oat Ceramide</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4 Feature Cards (from UX Wireframe: Row of 4 cards at bottom of Hero) -->
       
        </div>
    </div>
</section>


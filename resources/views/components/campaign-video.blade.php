<section class="py-16 md:py-24 bg-[#1F2421] text-white overflow-hidden relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <!-- Video Column -->
            <div class="lg:col-span-7">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-white/10 bg-black aspect-video group">
                    <video class="w-full h-full object-cover" 
                           poster="/img/campaign/everyday-poster.webp" 
                           autoplay 
                           muted 
                           loop 
                           playsinline>
                        <source src="/img/campaign/everyday-film.mp4" type="video/mp4">
                        Your browser does not support HTML5 video.
                    </video>
                    
                    <div class="absolute top-4 left-4 z-10 px-3 py-1 rounded-full bg-black/60 backdrop-blur-md text-[10px] uppercase tracking-wider font-semibold text-white/90 border border-white/20">
                        LIVA CINEMATIC STUDY
                    </div>
                </div>
            </div>

            <!-- Story Copy Column -->
            <div class="lg:col-span-5 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-liva-gold-light text-xs font-semibold tracking-wider uppercase border border-white/15">
                    <span class="w-1.5 h-1.5 rounded-full bg-liva-gold"></span>
                    <span data-i18n="videoTag">{{ __('skincare.video_tag') }}</span>
                </div>

                <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-[#FAF8F5] leading-tight" data-i18n="videoTitle">
                    {{ __('skincare.video_title') }}
                </h2>

                <p class="text-sm sm:text-base text-[#A8B3AA] leading-relaxed" data-i18n="videoDesc">
                    {{ __('skincare.video_desc') }}
                </p>

                <div class="pt-2 flex items-center gap-4">
                    <a href="#collection" 
                       class="px-6 py-3 rounded-full bg-white text-liva-dark text-xs uppercase font-semibold tracking-wider hover:bg-liva-gold hover:text-white transition-all shadow-md inline-flex items-center gap-2"
                       data-i18n="shopNow">
                        <span>{{ __('skincare.shop_now') }}</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>


@php
    $newArrivals = \App\Services\ProductCatalog::newArrivals();
    $promotions = \App\Services\ProductCatalog::promotions();
    $topProducts = \App\Services\ProductCatalog::topProducts();
@endphp

<section id="collection" class="py-12 md:py-20 bg-[#FAF7F2] border-t border-liva-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-14 md:space-y-20">

        <!-- ============================================================== -->
        <!-- SLIDER ROW 1: NEW ARRIVALS (1 Title, 1 Row Slider with Arrows) -->
        <!-- ============================================================== -->
        <div class="relative">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-6 md:mb-8 pb-4 border-b border-liva-border/80">
                <div>
                    <div class="inline-flex items-center gap-2 text-[10px] font-bold tracking-widest uppercase text-liva-olive mb-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-liva-olive"></span>
                        <span data-i18n="tagNewArrivals">{{ __('skincare.tag_new_arrivals') }}</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-serif font-bold text-liva-dark tracking-tight" data-i18n="titleNewArrivals">
                        {{ __('skincare.title_new_arrivals') }}
                    </h2>
                    <p class="text-xs sm:text-sm text-liva-muted mt-1 max-w-lg" data-i18n="subtitleNewArrivals">
                        {{ __('skincare.subtitle_new_arrivals') }}
                    </p>
                </div>

                <div class="flex items-center gap-3 sm:gap-4 shrink-0 self-end sm:self-auto">
                    <a href="{{ route('products.index', ['filter' => 'new-arrivals']) }}"
                       class="text-xs sm:text-sm font-semibold text-liva-olive hover:text-liva-dark transition-colors inline-flex items-center gap-1 group"
                       data-i18n="viewMore">
                        <span>{{ __('skincare.view_more') }}</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>

                    <div class="flex items-center gap-1.5">
                        <button type="button"
                                onclick="window.livaApp.slide('slider-new-arrivals', -1)"
                                class="w-9 h-9 rounded-full bg-white hover:bg-liva-olive hover:text-white text-liva-charcoal border border-liva-border flex items-center justify-center transition-all duration-200 shadow-2xs hover:shadow-sm active:scale-95"
                                aria-label="Previous slide">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button type="button"
                                onclick="window.livaApp.slide('slider-new-arrivals', 1)"
                                class="w-9 h-9 rounded-full bg-white hover:bg-liva-olive hover:text-white text-liva-charcoal border border-liva-border flex items-center justify-center transition-all duration-200 shadow-2xs hover:shadow-sm active:scale-95"
                                aria-label="Next slide">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="relative group/track">
                <button type="button"
                        onclick="window.livaApp.slide('slider-new-arrivals', -1)"
                        class="hidden md:flex absolute -left-4 top-1/2 -translate-y-1/2 z-30 w-11 h-11 rounded-full bg-white/95 text-liva-dark shadow-xl border border-liva-border items-center justify-center opacity-0 group-hover/track:opacity-100 transition-all duration-300 hover:scale-110 active:scale-95"
                        aria-label="Slide Left">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>

                <div id="slider-new-arrivals" class="flex gap-3 sm:gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory no-scrollbar pb-3">
                    @foreach($newArrivals as $product)
                        <x-product-card :product="$product" :isSlider="true" />
                    @endforeach
                </div>

                <button type="button"
                        onclick="window.livaApp.slide('slider-new-arrivals', 1)"
                        class="hidden md:flex absolute -right-4 top-1/2 -translate-y-1/2 z-30 w-11 h-11 rounded-full bg-white/95 text-liva-dark shadow-xl border border-liva-border items-center justify-center opacity-0 group-hover/track:opacity-100 transition-all duration-300 hover:scale-110 active:scale-95"
                        aria-label="Slide Right">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>


        <!-- ============================================================== -->
        <!-- SLIDER ROW 2: PROMOTIONS (1 Title, 1 Row Slider with Arrows)   -->
        <!-- ============================================================== -->
        <div class="relative">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-6 md:mb-8 pb-4 border-b border-liva-border/80">
                <div>
                    <div class="inline-flex items-center gap-2 text-[10px] font-bold tracking-widest uppercase text-amber-700 mb-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-600 animate-pulse"></span>
                        <span data-i18n="tagPromotions">{{ __('skincare.tag_promotions') }}</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-serif font-bold text-liva-dark tracking-tight" data-i18n="titlePromotions">
                        {{ __('skincare.title_promotions') }}
                    </h2>
                    <p class="text-xs sm:text-sm text-liva-muted mt-1 max-w-lg" data-i18n="subtitlePromotions">
                        {{ __('skincare.subtitle_promotions') }}
                    </p>
                </div>

                <div class="flex items-center gap-3 sm:gap-4 shrink-0 self-end sm:self-auto">
                    <a href="{{ route('products.index', ['filter' => 'promotions']) }}"
                       class="text-xs sm:text-sm font-semibold text-amber-700 hover:text-amber-900 transition-colors inline-flex items-center gap-1 group"
                       data-i18n="viewMore">
                        <span>{{ __('skincare.view_more') }}</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>

                    <div class="flex items-center gap-1.5">
                        <button type="button"
                                onclick="window.livaApp.slide('slider-promotions', -1)"
                                class="w-9 h-9 rounded-full bg-white hover:bg-liva-olive hover:text-white text-liva-charcoal border border-liva-border flex items-center justify-center transition-all duration-200 shadow-2xs hover:shadow-sm active:scale-95"
                                aria-label="Previous slide">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button type="button"
                                onclick="window.livaApp.slide('slider-promotions', 1)"
                                class="w-9 h-9 rounded-full bg-white hover:bg-liva-olive hover:text-white text-liva-charcoal border border-liva-border flex items-center justify-center transition-all duration-200 shadow-2xs hover:shadow-sm active:scale-95"
                                aria-label="Next slide">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="relative group/track">
                <button type="button"
                        onclick="window.livaApp.slide('slider-promotions', -1)"
                        class="hidden md:flex absolute -left-4 top-1/2 -translate-y-1/2 z-30 w-11 h-11 rounded-full bg-white/95 text-liva-dark shadow-xl border border-liva-border items-center justify-center opacity-0 group-hover/track:opacity-100 transition-all duration-300 hover:scale-110 active:scale-95"
                        aria-label="Slide Left">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>

                <div id="slider-promotions" class="flex gap-3 sm:gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory no-scrollbar pb-3">
                    @foreach($promotions as $product)
                        <x-product-card :product="$product" :isPromo="true" :isSlider="true" />
                    @endforeach
                </div>

                <button type="button"
                        onclick="window.livaApp.slide('slider-promotions', 1)"
                        class="hidden md:flex absolute -right-4 top-1/2 -translate-y-1/2 z-30 w-11 h-11 rounded-full bg-white/95 text-liva-dark shadow-xl border border-liva-border items-center justify-center opacity-0 group-hover/track:opacity-100 transition-all duration-300 hover:scale-110 active:scale-95"
                        aria-label="Slide Right">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>


        <!-- ============================================================== -->
        <!-- SLIDER ROW 3: TOP PRODUCTS (1 Title, 1 Row Slider with Arrows) -->
        <!-- ============================================================== -->
        <div class="relative">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-6 md:mb-8 pb-4 border-b border-liva-border/80">
                <div>
                    <div class="inline-flex items-center gap-2 text-[10px] font-bold tracking-widest uppercase text-liva-gold mb-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-liva-gold"></span>
                        <span data-i18n="tagTopProducts">{{ __('skincare.tag_top_products') }}</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-serif font-bold text-liva-dark tracking-tight" data-i18n="titleTopProducts">
                        {{ __('skincare.title_top_products') }}
                    </h2>
                    <p class="text-xs sm:text-sm text-liva-muted mt-1 max-w-lg" data-i18n="subtitleTopProducts">
                        {{ __('skincare.subtitle_top_products') }}
                    </p>
                </div>

                <div class="flex items-center gap-3 sm:gap-4 shrink-0 self-end sm:self-auto">
                    <a href="{{ route('products.index', ['filter' => 'top-products']) }}"
                       class="text-xs sm:text-sm font-semibold text-liva-dark hover:text-liva-olive transition-colors inline-flex items-center gap-1 group"
                       data-i18n="viewMore">
                        <span>{{ __('skincare.view_more') }}</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>

                    <div class="flex items-center gap-1.5">
                        <button type="button"
                                onclick="window.livaApp.slide('slider-top-products', -1)"
                                class="w-9 h-9 rounded-full bg-white hover:bg-liva-olive hover:text-white text-liva-charcoal border border-liva-border flex items-center justify-center transition-all duration-200 shadow-2xs hover:shadow-sm active:scale-95"
                                aria-label="Previous slide">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button type="button"
                                onclick="window.livaApp.slide('slider-top-products', 1)"
                                class="w-9 h-9 rounded-full bg-white hover:bg-liva-olive hover:text-white text-liva-charcoal border border-liva-border flex items-center justify-center transition-all duration-200 shadow-2xs hover:shadow-sm active:scale-95"
                                aria-label="Next slide">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="relative group/track">
                <button type="button"
                        onclick="window.livaApp.slide('slider-top-products', -1)"
                        class="hidden md:flex absolute -left-4 top-1/2 -translate-y-1/2 z-30 w-11 h-11 rounded-full bg-white/95 text-liva-dark shadow-xl border border-liva-border items-center justify-center opacity-0 group-hover/track:opacity-100 transition-all duration-300 hover:scale-110 active:scale-95"
                        aria-label="Slide Left">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>

                <div id="slider-top-products" class="flex gap-3 sm:gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory no-scrollbar pb-3">
                    @foreach($topProducts as $product)
                        <x-product-card :product="$product" :isSlider="true" />
                    @endforeach
                </div>

                <button type="button"
                        onclick="window.livaApp.slide('slider-top-products', 1)"
                        class="hidden md:flex absolute -right-4 top-1/2 -translate-y-1/2 z-30 w-11 h-11 rounded-full bg-white/95 text-liva-dark shadow-xl border border-liva-border items-center justify-center opacity-0 group-hover/track:opacity-100 transition-all duration-300 hover:scale-110 active:scale-95"
                        aria-label="Slide Right">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- BOTTOM CALLOUT: VIEW ALL PRODUCTS PAGE                         -->
        <!-- ============================================================== -->
        <div class="pt-2 pb-6 text-center">
            <a href="{{ route('products.index') }}"
               class="inline-flex items-center gap-3 px-8 sm:px-10 py-3.5 sm:py-4 rounded-full bg-liva-dark hover:bg-liva-olive text-white text-xs sm:text-sm font-semibold uppercase tracking-widest shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-102 active:scale-98 group">
                <span data-i18n="allProductsTitle">{{ __('skincare.all_products_title') ?? 'All Botanical Products' }}</span>
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

    </div>
</section>

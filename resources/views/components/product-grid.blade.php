<section id="collection" class="py-12 md:py-20 bg-[#FAF7F2] border-t border-liva-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16 md:space-y-20">
        


        <!-- Inline All Products Grid (Revealed when "Show all product" is clicked) -->
        <div id="inline-all-products-section" class="hidden transition-all duration-500 pb-10 border-b border-liva-border/80 space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <div class="inline-flex items-center gap-2 text-[10px] font-bold tracking-widest uppercase text-liva-olive mb-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-liva-olive"></span>
                        <span data-i18n="allProductsTag">{{ __('skincare.all_products_tag') ?? 'COMPLETE CATALOG' }}</span>
                        <span class="text-liva-muted">·</span>
                        <span id="inline-product-count" class="text-liva-muted font-semibold">10 Products</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-serif font-bold text-liva-dark tracking-tight" data-i18n="allProductsTitle">
                        {{ __('skincare.all_products_title') ?? 'All Botanical Products' }}
                    </h3>
                </div>

                <!-- Category Filters -->
                <div class="inline-flex flex-wrap items-center p-1 bg-[#F4EFE6] rounded-2xl sm:rounded-full text-xs font-medium self-start sm:self-auto gap-1" id="inline-category-filters">
                    <button type="button" 
                            onclick="window.livaApp.filterInlineProducts('all', this)"
                            class="inline-filter-btn px-3.5 py-1.5 rounded-full bg-liva-dark text-white font-semibold shadow-xs transition-all cursor-pointer"
                            data-i18n="filterAll">
                        All (10)
                    </button>
                    <button type="button" 
                            onclick="window.livaApp.filterInlineProducts('single', this)"
                            class="inline-filter-btn px-3.5 py-1.5 rounded-full text-liva-charcoal hover:text-liva-dark transition-all cursor-pointer"
                            data-i18n="navSingleProduct">
                        Single Products (6)
                    </button>
                    <button type="button" 
                            onclick="window.livaApp.filterInlineProducts('sets', this)"
                            class="inline-filter-btn px-3.5 py-1.5 rounded-full text-liva-charcoal hover:text-liva-dark transition-all cursor-pointer inline-flex items-center gap-1"
                            data-i18n="navSetProduct">
                        <span>Set Products (2+) (4)</span>
                    </button>

                    <!-- Category Dropdown -->
                    <div class="relative inline-block text-left" id="inline-category-dropdown">
                        <button type="button" 
                                onclick="document.getElementById('inline-category-dropdown-menu').classList.toggle('hidden')"
                                class="inline-filter-btn px-3.5 py-1.5 rounded-full text-liva-charcoal hover:text-liva-dark transition-all cursor-pointer flex items-center gap-1.5">
                            <span id="inline-category-label">Category: All</span>
                            <svg class="w-3 h-3 text-liva-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div id="inline-category-dropdown-menu" class="hidden absolute right-0 mt-1.5 w-44 bg-white rounded-2xl shadow-xl border border-liva-border py-1.5 z-30">
                            <button type="button" onclick="window.livaApp.filterInlineByCategory('all', 'Category: All')" class="w-full text-left px-3.5 py-2 text-xs text-liva-dark hover:bg-liva-stone/70 flex items-center justify-between font-medium cursor-pointer">
                                <span>All Categories</span>
                                <span class="text-[10px] text-liva-muted font-bold">10</span>
                            </button>
                            <button type="button" onclick="window.livaApp.filterInlineByCategory('body', 'Body Care')" class="w-full text-left px-3.5 py-2 text-xs text-liva-dark hover:bg-liva-stone/70 flex items-center justify-between font-medium cursor-pointer">
                                <span>Body Care</span>
                                <span class="text-[10px] text-liva-muted font-bold">3</span>
                            </button>
                            <button type="button" onclick="window.livaApp.filterInlineByCategory('hair', 'Hair Care')" class="w-full text-left px-3.5 py-2 text-xs text-liva-dark hover:bg-liva-stone/70 flex items-center justify-between font-medium cursor-pointer">
                                <span>Hair Care</span>
                                <span class="text-[10px] text-liva-muted font-bold">3</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="inline-all-products-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-2">
                <!-- Rendered dynamically by window.livaApp -->
            </div>
        </div>
        
        <!-- ============================================================== -->
        <!-- SLIDER ROW 1: NEW ARRIVALS (1 Title, 1 Row Slider with Arrows) -->
        <!-- ============================================================== -->
        <div class="relative">
            <!-- Row Header: Title on Left, View More & Nav Buttons on Right -->
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

                <!-- Right Controls: View More Link + Arrow Buttons (< and >) -->
                <div class="flex items-center gap-3 sm:gap-4 shrink-0 self-end sm:self-auto">
                    <button type="button" 
                            onclick="window.livaApp.openAllProductsModal('new-arrivals')"
                            class="text-xs sm:text-sm font-semibold text-liva-olive hover:text-liva-dark transition-colors inline-flex items-center gap-1 group cursor-pointer" 
                            data-i18n="viewMore">
                        <span>{{ __('skincare.view_more') }}</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>

                    <!-- Navigation Arrows -->
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

            <!-- Horizontal Slider Track: 1 Row with Snap Scroll & Side Buttons -->
            <div class="relative group/track">
                <!-- Floating Side Arrow Left -->
                <button type="button" 
                        onclick="window.livaApp.slide('slider-new-arrivals', -1)"
                        class="hidden md:flex absolute -left-4 top-1/2 -translate-y-1/2 z-30 w-11 h-11 rounded-full bg-white/95 text-liva-dark shadow-xl border border-liva-border items-center justify-center opacity-0 group-hover/track:opacity-100 transition-all duration-300 hover:scale-110 active:scale-95"
                        aria-label="Slide Left">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>

                <!-- Slider Scroll Container -->
                <div id="slider-new-arrivals" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory no-scrollbar pb-3">
                    <!-- Populated dynamically by window.livaApp -->
                </div>

                <!-- Floating Side Arrow Right -->
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
            <!-- Row Header: Title on Left, View More & Nav Buttons on Right -->
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

                <!-- Right Controls: View More Link + Arrow Buttons (< and >) -->
                <div class="flex items-center gap-3 sm:gap-4 shrink-0 self-end sm:self-auto">
                    <button type="button" 
                            onclick="window.livaApp.openAllProductsModal('promotions')"
                            class="text-xs sm:text-sm font-semibold text-amber-700 hover:text-amber-900 transition-colors inline-flex items-center gap-1 group cursor-pointer" 
                            data-i18n="viewMore">
                        <span>{{ __('skincare.view_more') }}</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>

                    <!-- Navigation Arrows -->
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

            <!-- Horizontal Slider Track -->
            <div class="relative group/track">
                <!-- Floating Side Arrow Left -->
                <button type="button" 
                        onclick="window.livaApp.slide('slider-promotions', -1)"
                        class="hidden md:flex absolute -left-4 top-1/2 -translate-y-1/2 z-30 w-11 h-11 rounded-full bg-white/95 text-liva-dark shadow-xl border border-liva-border items-center justify-center opacity-0 group-hover/track:opacity-100 transition-all duration-300 hover:scale-110 active:scale-95"
                        aria-label="Slide Left">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>

                <!-- Slider Scroll Container -->
                <div id="slider-promotions" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory no-scrollbar pb-3">
                    <!-- Populated dynamically by window.livaApp -->
                </div>

                <!-- Floating Side Arrow Right -->
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
            <!-- Row Header: Title on Left, View More & Nav Buttons on Right -->
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

                <!-- Right Controls: View More Link + Arrow Buttons (< and >) -->
                <div class="flex items-center gap-3 sm:gap-4 shrink-0 self-end sm:self-auto">
                    <button type="button" 
                            onclick="window.livaApp.openAllProductsModal('top-products')"
                            class="text-xs sm:text-sm font-semibold text-liva-dark hover:text-liva-olive transition-colors inline-flex items-center gap-1 group cursor-pointer" 
                            data-i18n="viewMore">
                        <span>{{ __('skincare.view_more') }}</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>

                    <!-- Navigation Arrows -->
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

            <!-- Horizontal Slider Track -->
            <div class="relative group/track">
                <!-- Floating Side Arrow Left -->
                <button type="button" 
                        onclick="window.livaApp.slide('slider-top-products', -1)"
                        class="hidden md:flex absolute -left-4 top-1/2 -translate-y-1/2 z-30 w-11 h-11 rounded-full bg-white/95 text-liva-dark shadow-xl border border-liva-border items-center justify-center opacity-0 group-hover/track:opacity-100 transition-all duration-300 hover:scale-110 active:scale-95"
                        aria-label="Slide Left">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>

                <!-- Slider Scroll Container -->
                <div id="slider-top-products" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory no-scrollbar pb-3">
                    <!-- Populated dynamically by window.livaApp -->
                </div>

                <!-- Floating Side Arrow Right -->
                <button type="button" 
                        onclick="window.livaApp.slide('slider-top-products', 1)"
                        class="hidden md:flex absolute -right-4 top-1/2 -translate-y-1/2 z-30 w-11 h-11 rounded-full bg-white/95 text-liva-dark shadow-xl border border-liva-border items-center justify-center opacity-0 group-hover/track:opacity-100 transition-all duration-300 hover:scale-110 active:scale-95"
                        aria-label="Slide Right">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- BOTTOM CALLOUT: VIEW ALL 8 PRODUCTS BUTTON                     -->
        <!-- ============================================================== -->
        <div class="pt-2 pb-6 text-center">
            <button type="button"
                    onclick="window.livaApp.openAllProductsModal('all')"
                    class="inline-flex items-center gap-3 px-8 sm:px-10 py-3.5 sm:py-4 rounded-full bg-liva-dark hover:bg-liva-olive text-white text-xs sm:text-sm font-semibold uppercase tracking-widest shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-102 active:scale-98 cursor-pointer group">
                <span data-i18n="allProductsTitle">{{ __('skincare.all_products_title') ?? 'View All Products (8 Formulations)' }}</span>
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </button>
        </div>

    </div>

    <!-- All Products Modal Window -->
    <x-all-products-modal />
</section>

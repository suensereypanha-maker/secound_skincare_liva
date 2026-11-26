<!-- Wishlist / Favorites Drawer Backdrop -->
<div id="favorites-backdrop" 
     onclick="window.livaApp.toggleFavorites(false)"
     class="fixed inset-0 bg-black/50 backdrop-blur-xs z-50 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Slide-Out Wishlist Panel -->
<div id="favorites-drawer" 
     role="dialog"
     aria-modal="true"
     aria-labelledby="favorites-title"
     class="fixed top-0 right-0 h-full w-full max-w-md bg-[#FAF8F5] shadow-2xl z-50 translate-x-full transition-transform duration-300 ease-out flex flex-col border-l border-liva-border">
    
    <!-- Drawer Header -->
    <div class="p-5 sm:p-6 border-b border-liva-border bg-white flex items-center justify-between">
        <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center">
                <svg class="w-4 h-4 fill-rose-500" viewBox="0 0 24 24">
                    <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>
                </svg>
            </div>
            <div>
                <h3 id="favorites-title" class="font-serif font-bold text-lg sm:text-xl text-liva-dark" data-i18n="wishlistTitle">
                    My Saved Wishlist
                </h3>
                <span id="favorites-count-label" class="text-xs text-liva-muted">0 saved items</span>
            </div>
        </div>
        <button type="button" 
                onclick="window.livaApp.toggleFavorites(false)" 
                class="p-2 text-liva-muted hover:text-liva-dark rounded-full hover:bg-liva-stone transition-colors cursor-pointer" 
                aria-label="Close Wishlist">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <!-- Items Scrollable List -->
    <div class="flex-1 overflow-y-auto px-5 sm:px-6 divide-y divide-liva-border/60">
        <!-- Dynamic list populated by JavaScript -->
        <div id="favorites-items-container" class="py-2 space-y-3"></div>

        <!-- Empty State -->
        <div id="favorites-empty-state" class="py-20 text-center">
            <div class="w-16 h-16 rounded-full bg-rose-50 text-rose-400 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>
                </svg>
            </div>
            <h4 class="font-medium text-base text-liva-dark mb-1" data-i18n="wishlistEmpty">
                Your wishlist is currently empty
            </h4>
            <p class="text-xs text-liva-muted max-w-xs mx-auto mb-6 leading-relaxed" data-i18n="wishlistEmptyDesc">
                Tap the heart icon on any botanical formulation to save your favorites here.
            </p>
            <a href="{{ route('products.index') }}"
               onclick="window.livaApp.toggleFavorites(false);" 
               class="inline-flex px-6 py-2.5 rounded-full bg-liva-dark text-white text-xs font-semibold uppercase tracking-wider hover:bg-liva-olive transition-colors cursor-pointer" 
               data-i18n="exploreCollection">
                Explore Collection
            </a>
        </div>
    </div>

    <!-- Wishlist Drawer Footer Actions -->
    <div id="favorites-footer" class="p-5 sm:p-6 bg-white border-t border-liva-border hidden space-y-3">
        <button type="button" 
                onclick="window.livaApp.moveAllFavoritesToCart()"
                class="w-full py-3.5 px-4 bg-liva-dark hover:bg-liva-olive text-white text-xs tracking-wider uppercase font-semibold rounded-full shadow-lg transition-colors flex items-center justify-center gap-2 cursor-pointer"
                data-i18n="addAllToCart">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            <span>Move All to Bag</span>
        </button>
        <button type="button" 
                onclick="window.livaApp.clearFavorites()" 
                class="w-full text-center text-xs text-liva-muted hover:text-rose-600 font-medium transition-colors cursor-pointer" 
                data-i18n="clearWishlist">
            Clear Wishlist
        </button>
    </div>

</div>

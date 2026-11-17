<!-- Cart Drawer Backdrop -->
<div id="cart-backdrop" class="fixed inset-0 bg-black/50 backdrop-blur-xs z-50 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Slide-Out Cart Panel -->
<div id="cart-drawer" class="fixed top-0 right-0 h-full w-full max-w-md bg-[#FAF8F5] shadow-2xl z-50 translate-x-full transition-transform duration-300 ease-out flex flex-col border-l border-liva-border">
    
    <!-- Drawer Header -->
    <div class="p-5 sm:p-6 border-b border-liva-border bg-white flex items-center justify-between">
        <div class="flex items-center gap-2.5">
            <h3 class="font-serif font-bold text-lg sm:text-xl text-liva-dark" data-i18n="cartTitle">Your Shopping Bag</h3>
            <span class="cart-count-badge hidden px-2 py-0.5 rounded-full bg-liva-stone text-liva-dark text-xs font-semibold">0</span>
        </div>
        <button type="button" id="close-cart-btn" class="p-2 text-liva-muted hover:text-liva-dark rounded-full hover:bg-liva-stone transition-colors" aria-label="Close Shopping Bag">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <!-- Free Shipping Progress Indicator ($50 goal) -->
    <div class="px-5 sm:px-6 py-3.5 bg-[#F4EFE6] border-b border-liva-border text-xs">
        <div id="free-shipping-text" class="text-liva-charcoal font-medium mb-1.5" data-i18n="freeShippingGoal">
            Complimentary shipping on orders over $50
        </div>
        <div class="w-full h-1.5 bg-[#E2DBD0] rounded-full overflow-hidden">
            <div id="free-shipping-progress" class="h-full bg-liva-gold transition-all duration-300 rounded-full" style="width: 0%"></div>
        </div>
    </div>

    <!-- Cart Items Scrollable List -->
    <div class="flex-1 overflow-y-auto px-5 sm:px-6 divide-y divide-liva-border/60">
        <!-- Dynamic list populated by JavaScript -->
        <div id="cart-items-container"></div>

        <!-- Empty State -->
        <div id="cart-empty-state" class="py-16 text-center">
            <div class="w-16 h-16 rounded-full bg-liva-stone text-liva-muted flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            </div>
            <h4 class="font-medium text-base text-liva-dark mb-1" data-i18n="cartEmpty">Your bag is currently empty</h4>
            <p class="text-xs text-liva-muted max-w-xs mx-auto mb-6 leading-relaxed" data-i18n="cartEmptyDesc">
                Explore our botanical formulations to begin your daily ritual.
            </p>
            <a href="#collection" onclick="window.livaApp.toggleCart(false)" class="inline-flex px-6 py-2.5 rounded-full bg-liva-dark text-white text-xs font-semibold uppercase tracking-wider hover:bg-liva-olive transition-colors" data-i18n="exploreCollection">
                Explore Collection
            </a>
        </div>
    </div>

    <!-- Cart Drawer Footer (Subtotal, Checkout) -->
    <div id="cart-footer-state" class="p-5 sm:p-6 bg-white border-t border-liva-border hidden space-y-4">
        <div class="flex justify-between items-center text-sm">
            <span class="text-liva-muted font-medium" data-i18n="subtotal">Subtotal</span>
            <span id="cart-subtotal-price" class="text-lg font-bold text-liva-dark">$0.00</span>
        </div>
        <p class="text-[11px] text-liva-muted leading-tight" data-i18n="taxShippingNote">
            Taxes and shipping calculated at checkout.
        </p>
        <button type="button" 
                onclick="window.livaApp.openCheckoutModal()"
                class="w-full py-3.5 px-4 bg-liva-dark hover:bg-liva-olive text-white text-xs tracking-wider uppercase font-semibold rounded-full shadow-lg transition-colors flex items-center justify-center gap-2 cursor-pointer"
                data-i18n="checkout">
            <span>Proceed to Checkout</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </button>
        <div class="text-center">
            <button type="button" onclick="window.livaApp.toggleCart(false)" class="text-xs text-liva-muted hover:text-liva-dark font-medium underline" data-i18n="continueShopping">
                Continue Shopping
            </button>
        </div>
    </div>

</div>


<!-- Announcement Top Bar -->
<div class="bg-liva-dark text-white text-[11px] sm:text-xs py-2 px-4 text-center font-normal tracking-wide relative z-40 border-b border-white/5">
    <div class="max-w-7xl mx-auto flex items-center justify-center gap-2">
        <span class="inline-block w-1.5 h-1.5 rounded-full bg-liva-gold animate-pulse shrink-0"></span>
        <span data-i18n="announcement" class="truncate">
            {{ __('skincare.announcement') }}
        </span>
    </div>
</div>

<!-- Main Sticky Header -->
<header class="sticky top-0 z-40 w-full glass-nav border-b border-liva-border/80 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-18 sm:h-20 gap-3 lg:gap-6">
            
            <!-- Logo Section (Left) - Single Unified Bilingual Logo -->
            <div class="flex items-center shrink-0">
                <x-logo height="h-9 sm:h-11" variant="dark" />
            </div>

            <!-- Desktop Navigation Menu (Center) - Never wraps to 2 lines -->
            <nav class="hidden lg:flex items-center gap-4 xl:gap-7 text-xs xl:text-[13px] tracking-widest uppercase font-medium text-liva-charcoal shrink-0">
                <a href="#hero" class="whitespace-nowrap hover:text-liva-sage transition-colors duration-200 py-1" data-i18n="navHome">
                    {{ __('skincare.nav_home') }}
                </a>
                <a href="#collection" class="whitespace-nowrap hover:text-liva-sage transition-colors duration-200 py-1" data-i18n="navProducts">
                    {{ __('skincare.nav_products') }}
                </a>
                <a href="#spotlight" class="whitespace-nowrap hover:text-liva-sage transition-colors duration-200 py-1" data-i18n="navSpotlight">
                    {{ __('skincare.nav_spotlight') }}
                </a>
                <a href="#rituals" class="whitespace-nowrap hover:text-liva-sage transition-colors duration-200 py-1" data-i18n="navRituals">
                    {{ __('skincare.nav_rituals') }}
                </a>
                <a href="#philosophy" class="whitespace-nowrap hover:text-liva-sage transition-colors duration-200 py-1" data-i18n="navPhilosophy">
                    {{ __('skincare.nav_philosophy') }}
                </a>
                <a href="#results" class="whitespace-nowrap hover:text-liva-sage transition-colors duration-200 py-1" data-i18n="navReviews">
                    {{ __('skincare.nav_reviews') }}
                </a>
            </nav>

            <!-- Right Controls: Language Switcher, Cart Drawer Trigger, CTA Button -->
            <div class="flex items-center gap-2.5 sm:gap-4 shrink-0">
                
                <!-- Language Switcher (EN / ខ្មែរ) -->
                <div class="flex items-center p-0.5 rounded-full bg-liva-stone/90 border border-liva-border shadow-2xs text-xs font-semibold">
                    <button type="button" 
                            data-set-lang="en"
                            class="px-2.5 py-1 rounded-full transition-all duration-200 text-xs {{ app()->getLocale() !== 'km' ? 'bg-liva-olive text-white shadow-xs' : 'text-liva-muted hover:text-liva-dark' }}">
                        EN
                    </button>
                    <button type="button" 
                            data-set-lang="km"
                            class="px-2.5 py-1 rounded-full transition-all duration-200 text-xs {{ app()->getLocale() === 'km' ? 'bg-liva-olive text-white shadow-xs' : 'text-liva-muted hover:text-liva-dark' }}">
                        ខ្មែរ
                    </button>
                </div>

                <!-- Wishlist / Favorites Trigger -->
                <button type="button" 
                        data-favorites-toggle
                        class="relative p-2 text-liva-charcoal hover:text-rose-600 hover:bg-liva-stone/70 rounded-full transition-colors"
                        title="View Wishlist"
                        aria-label="View Wishlist">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>
                    </svg>
                    <!-- Favorite Count Badge -->
                    <span class="favorite-count-badge hidden absolute -top-1 -right-1 w-4 h-4 sm:w-5 sm:h-5 bg-rose-500 text-white text-[10px] sm:text-[11px] font-bold rounded-full flex items-center justify-center shadow-xs">
                        0
                    </span>
                </button>

                <!-- Shopping Bag / Cart Trigger -->
                <button type="button" 
                        data-cart-toggle
                        class="relative p-2 text-liva-charcoal hover:text-liva-dark hover:bg-liva-stone/70 rounded-full transition-colors"
                        aria-label="View Shopping Bag">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <!-- Cart Count Badge -->
                    <span class="cart-count-badge hidden absolute -top-1 -right-1 w-4 h-4 sm:w-5 sm:h-5 bg-liva-terracotta text-white text-[10px] sm:text-[11px] font-bold rounded-full flex items-center justify-center shadow-xs">
                        0
                    </span>
                </button>

                <!-- Header CTA Button (from Wireframe: [Button]) -->
                <a href="#collection" 
                   class="hidden md:inline-flex items-center justify-center px-4 sm:px-5 py-2 text-xs tracking-wider uppercase font-semibold text-white bg-liva-dark hover:bg-liva-olive rounded-full transition-all duration-200 shadow-sm hover:shadow-md hover:-translate-y-0.5 whitespace-nowrap"
                   data-i18n="shopNow">
                    {{ __('skincare.shop_now') }}
                </a>

                <!-- Mobile Hamburger Menu Button -->
                <button type="button" 
                        id="mobile-menu-toggle"
                        class="lg:hidden p-2 text-liva-charcoal hover:text-liva-dark hover:bg-liva-stone/70 rounded-lg transition-colors"
                        aria-label="Toggle navigation menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Dropdown -->
        <div id="mobile-menu" class="hidden lg:hidden border-t border-liva-border/80 py-4 px-2 space-y-2 bg-white/95 backdrop-blur-md rounded-b-2xl shadow-xl">
            <a href="#hero" class="block px-3 py-2 rounded-lg text-sm font-medium text-liva-charcoal hover:bg-liva-stone" data-i18n="navHome">
                {{ __('skincare.nav_home') }}
            </a>
            <a href="#collection" class="block px-3 py-2 rounded-lg text-sm font-medium text-liva-charcoal hover:bg-liva-stone" data-i18n="navProducts">
                {{ __('skincare.nav_products') }}
            </a>
            <a href="#spotlight" class="block px-3 py-2 rounded-lg text-sm font-medium text-liva-charcoal hover:bg-liva-stone" data-i18n="navSpotlight">
                {{ __('skincare.nav_spotlight') }}
            </a>
            <a href="#rituals" class="block px-3 py-2 rounded-lg text-sm font-medium text-liva-charcoal hover:bg-liva-stone" data-i18n="navRituals">
                {{ __('skincare.nav_rituals') }}
            </a>
            <a href="#philosophy" class="block px-3 py-2 rounded-lg text-sm font-medium text-liva-charcoal hover:bg-liva-stone" data-i18n="navPhilosophy">
                {{ __('skincare.nav_philosophy') }}
            </a>
            <a href="#results" class="block px-3 py-2 rounded-lg text-sm font-medium text-liva-charcoal hover:bg-liva-stone" data-i18n="navReviews">
                {{ __('skincare.nav_reviews') }}
            </a>
            <div class="pt-2">
                <a href="#collection" class="block text-center w-full py-2.5 px-4 bg-liva-dark text-white text-xs font-semibold uppercase tracking-wider rounded-xl" data-i18n="shopNow">
                    {{ __('skincare.shop_now') }}
                </a>
            </div>
        </div>
    </div>
</header>

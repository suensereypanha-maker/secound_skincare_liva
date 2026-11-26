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
            
            <!-- Logo Section (Left) - Luxury LIVA Logo -->
            <div class="flex items-center shrink-0">
                <x-logo height="h-10 sm:h-12" variant="dark" />
            </div>

            <!-- Desktop Navigation Menu (Center) - Never wraps to 2 lines -->
            <nav class="hidden lg:flex items-center gap-3 xl:gap-5 text-xs xl:text-[13px] tracking-wider uppercase font-medium text-liva-charcoal shrink-0">
                <a href="{{ route('home') }}" class="whitespace-nowrap hover:text-liva-sage transition-colors duration-200 py-1 {{ request()->routeIs('home') ? 'text-liva-sage font-semibold underline underline-offset-4' : '' }}" data-i18n="navHome">
                    {{ __('skincare.nav_home') }}
                </a>

                <!-- All Products (Dedicated Catalog Page) -->
                <a href="{{ route('products.index') }}" 
                   class="whitespace-nowrap hover:text-liva-sage transition-colors duration-200 py-1 font-semibold {{ request()->routeIs('products.index') ? 'text-liva-sage underline underline-offset-4' : '' }}" 
                   data-i18n="navAllProducts">
                    {{ __('skincare.nav_all_products') ?? 'All Products' }}
                </a>
                
                <!-- About -->
                <a href="{{ route('about') }}" class="whitespace-nowrap hover:text-liva-sage transition-colors duration-200 py-1 {{ request()->routeIs('about') ? 'text-liva-sage font-semibold underline underline-offset-4' : '' }}" data-i18n="navAbout">
                    {{ __('skincare.nav_about') ?? 'About' }}
                </a>

                <!-- Contact -->
                <a href="{{ route('contact') }}" class="whitespace-nowrap hover:text-liva-sage transition-colors duration-200 py-1 {{ request()->routeIs('contact') ? 'text-liva-sage font-semibold underline underline-offset-4' : '' }}" data-i18n="navContact">
                    {{ __('skincare.nav_contact') ?? 'Contact' }}
                </a>
            </nav>

            <!-- Right Controls: Search, Language Switcher, Wishlist, Cart, CTA Button -->
            <div class="flex items-center gap-2 sm:gap-3.5 shrink-0">
                
                <!-- Navbar Search Box (Desktop) -->
                <div class="relative hidden lg:block w-36 xl:w-52" id="navbar-search-wrapper">
                    <input type="text" 
                           id="navbar-search-input"
                           oninput="window.livaApp.handleNavSearch(this.value)"
                           onfocus="window.livaApp.openNavSearchDropdown()"
                           onkeydown="if(event.key==='Enter') window.livaApp.submitNavSearch(this.value)"
                           placeholder="Search..."
                           data-i18n-placeholder="navSearchPlaceholder"
                           class="w-full pl-8 pr-7 py-1.5 rounded-full bg-liva-stone/80 hover:bg-liva-stone focus:bg-white border border-liva-border text-xs text-liva-dark placeholder-liva-muted focus:outline-hidden focus:border-liva-olive transition-all shadow-2xs">
                    <svg class="w-3.5 h-3.5 text-liva-muted absolute left-2.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <button type="button" 
                            id="navbar-search-clear" 
                            onclick="window.livaApp.clearNavSearch()" 
                            class="hidden absolute right-2 top-1/2 -translate-y-1/2 text-liva-muted hover:text-liva-dark p-0.5 cursor-pointer">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>

                    <!-- Instant Nav Search Suggestions Dropdown -->
                    <div id="navbar-search-dropdown" class="hidden absolute right-0 top-full mt-2 w-80 bg-white rounded-2xl shadow-xl border border-liva-border p-3 z-50 max-h-96 overflow-y-auto">
                        <div id="navbar-search-results-list" class="space-y-1.5"></div>
                    </div>
                </div>

                <!-- Mobile / Tablet Search Trigger Button -->
                <a href="{{ route('products.index', ['focus' => 'search']) }}" 
                   class="lg:hidden p-2 text-liva-charcoal hover:text-liva-dark hover:bg-liva-stone/70 rounded-full transition-colors cursor-pointer"
                   title="Search Products">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </a>
                
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
        <div id="mobile-menu" class="hidden lg:hidden border-t border-liva-border/80 py-4 px-3 space-y-2 bg-white/95 backdrop-blur-md rounded-b-2xl shadow-xl">
            <!-- Mobile Search Input -->
            <div class="relative w-full pb-1">
                <input type="text" 
                       id="mobile-nav-search-input"
                       onkeydown="if(event.key==='Enter') { window.livaApp.submitNavSearch(this.value); document.getElementById('mobile-menu').classList.add('hidden'); }"
                       placeholder="Search products, serums, shampoo..."
                       data-i18n-placeholder="navSearchPlaceholder"
                       class="w-full pl-9 pr-4 py-2 rounded-full bg-liva-stone/80 border border-liva-border text-xs text-liva-dark placeholder-liva-muted focus:outline-hidden focus:border-liva-olive focus:bg-white shadow-2xs">
                <svg class="w-4 h-4 text-liva-muted absolute left-3 top-3 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-sm font-medium text-liva-charcoal hover:bg-liva-stone" data-i18n="navHome">
                {{ __('skincare.nav_home') }}
            </a>

            <!-- All Products -->
            <a href="{{ route('products.index') }}" 
               onclick="document.getElementById('mobile-menu').classList.add('hidden')" 
               class="w-full text-left block px-3 py-2 rounded-lg text-sm font-semibold text-liva-charcoal hover:bg-liva-stone" 
               data-i18n="navAllProducts">
                {{ __('skincare.nav_all_products') ?? 'All Products' }}
            </a>
            
            <!-- About -->
            <a href="{{ route('about') }}" 
               onclick="document.getElementById('mobile-menu').classList.add('hidden')"
               class="block px-3 py-2 rounded-lg text-sm font-medium text-liva-charcoal hover:bg-liva-stone" 
               data-i18n="navAbout">
                {{ __('skincare.nav_about') ?? 'About' }}
            </a>

            <!-- Contact -->
            <a href="{{ route('contact') }}" 
               onclick="document.getElementById('mobile-menu').classList.add('hidden')"
               class="block px-3 py-2 rounded-lg text-sm font-medium text-liva-charcoal hover:bg-liva-stone" 
               data-i18n="navContact">
                {{ __('skincare.nav_contact') ?? 'Contact' }}
            </a>
        </div>
    </div>
</header>

import { translations, allProducts, newArrivalsProducts, promotionsProducts, topProductsList } from './i18n.js';

class LivaApp {
    constructor() {
        this.products = allProducts;
        this.newArrivals = newArrivalsProducts;
        this.promotions = promotionsProducts;
        this.topProducts = topProductsList;

        this.currentLang = localStorage.getItem('liva_lang') || document.documentElement.lang || 'en';
        this.cart = this.loadCart();
        this.favorites = this.loadFavorites();

        this.init();
    }

    init() {
        // Apply initial language
        this.applyLanguage(this.currentLang, false);

        // Render all product sliders
        this.renderAllSliders();

        // Render cart & favorites badges
        this.renderCart();
        this.updateFavoriteBadges();

        // Setup event listeners
        this.bindEvents();
    }

    loadCart() {
        try {
            const saved = localStorage.getItem('liva_cart');
            return saved ? JSON.parse(saved) : [];
        } catch {
            return [];
        }
    }

    saveCart() {
        localStorage.setItem('liva_cart', JSON.stringify(this.cart));
        this.renderCart();
    }

    loadFavorites() {
        try {
            const saved = localStorage.getItem('liva_favorites');
            return saved ? JSON.parse(saved) : [];
        } catch {
            return [];
        }
    }

    saveFavorites() {
        localStorage.setItem('liva_favorites', JSON.stringify(this.favorites));
        this.updateFavoriteBadges();
    }

    toggleFavorite(productId) {
        const product = this.products.find((p) => p.id === productId);
        if (!product) return;

        const isKm = this.currentLang === 'km';
        const name = isKm ? product.nameKm : product.nameEn;
        const t = translations[this.currentLang] || translations.en;

        const index = this.favorites.indexOf(productId);
        if (index > -1) {
            this.favorites.splice(index, 1);
            this.showToast(t.favoriteRemovedToast.replace('{name}', name));
        } else {
            this.favorites.push(productId);
            this.showToast(t.favoriteAddedToast.replace('{name}', name));
        }

        this.saveFavorites();
        this.renderAllSliders();
    }

    updateFavoriteBadges() {
        const count = this.favorites.length;
        document.querySelectorAll('.favorite-count-badge').forEach((badge) => {
            badge.textContent = count;
            if (count > 0) {
                badge.classList.remove('hidden');
            } else {
                badge.classList.add('hidden');
            }
        });
    }

    slide(sliderId, direction) {
        const slider = document.getElementById(sliderId);
        if (!slider) return;

        const card = slider.querySelector('.product-slide-card');
        const scrollAmount = card ? (card.offsetWidth + 24) : 320;
        slider.scrollBy({
            left: direction * scrollAmount,
            behavior: 'smooth'
        });
    }

    bindEvents() {
        // Language Switcher Buttons
        document.querySelectorAll('[data-set-lang]').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                const lang = e.currentTarget.getAttribute('data-set-lang');
                this.setLanguage(lang);
            });
        });

        // Cart Drawer Toggles
        document.querySelectorAll('[data-cart-toggle]').forEach((btn) => {
            btn.addEventListener('click', () => {
                this.toggleCart();
            });
        });

        // Wishlist Quick View / Scroll
        document.querySelectorAll('[data-favorites-toggle]').forEach((btn) => {
            btn.addEventListener('click', () => {
                if (this.favorites.length === 0) {
                    const isKm = this.currentLang === 'km';
                    this.showToast(isKm ? 'អ្នកមិនទាន់មានទំនិញក្នុងបញ្ជីពេញចិត្តនៅឡើយទេ' : 'Your wishlist is currently empty');
                    return;
                }
                const isKm = this.currentLang === 'km';
                this.showToast(isKm ? `បង្ហាញទំនិញពេញចិត្ត ${this.favorites.length} មុខ` : `Showing ${this.favorites.length} saved favorites`);
                const collectionEl = document.getElementById('collection');
                if (collectionEl) {
                    collectionEl.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Close Cart on backdrop click
        const cartBackdrop = document.getElementById('cart-backdrop');
        if (cartBackdrop) {
            cartBackdrop.addEventListener('click', () => this.toggleCart(false));
        }

        const closeCartBtn = document.getElementById('close-cart-btn');
        if (closeCartBtn) {
            closeCartBtn.addEventListener('click', () => this.toggleCart(false));
        }

        // Mobile Nav Menu Toggle
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuToggle && mobileMenu) {
            mobileMenuToggle.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
            mobileMenu.querySelectorAll('a').forEach((link) => {
                link.addEventListener('click', () => mobileMenu.classList.add('hidden'));
            });
        }

        // Newsletter Form
        const newsletterForm = document.getElementById('newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const emailInput = document.getElementById('newsletter-email');
                const feedbackEl = document.getElementById('newsletter-feedback');
                if (emailInput && emailInput.value) {
                    const t = translations[this.currentLang] || translations.en;
                    if (feedbackEl) {
                        feedbackEl.textContent = t.subscribeSuccess;
                        feedbackEl.classList.remove('hidden');
                        feedbackEl.classList.add('text-emerald-700', 'font-medium');
                    }
                    emailInput.value = '';
                    setTimeout(() => {
                        if (feedbackEl) feedbackEl.classList.add('hidden');
                    }, 6000);
                }
            });
        }
    }

    setLanguage(lang) {
        if (!translations[lang]) return;
        this.currentLang = lang;
        localStorage.setItem('liva_lang', lang);
        document.cookie = `liva_locale=${lang};path=/;max-age=31536000`;
        this.applyLanguage(lang, true);
    }

    applyLanguage(lang, notify = false) {
        document.documentElement.lang = lang;
        const dict = translations[lang] || translations.en;

        // Update all data-i18n text content
        document.querySelectorAll('[data-i18n]').forEach((el) => {
            const key = el.getAttribute('data-i18n');
            if (dict[key]) {
                el.textContent = dict[key];
            }
        });

        // Update all data-i18n-html
        document.querySelectorAll('[data-i18n-html]').forEach((el) => {
            const key = el.getAttribute('data-i18n-html');
            if (dict[key]) {
                el.innerHTML = dict[key];
            }
        });

        // Update placeholder attributes
        document.querySelectorAll('[data-i18n-placeholder]').forEach((el) => {
            const key = el.getAttribute('data-i18n-placeholder');
            if (dict[key]) {
                el.setAttribute('placeholder', dict[key]);
            }
        });

        // Update active class on language toggle buttons
        document.querySelectorAll('[data-set-lang]').forEach((btn) => {
            const btnLang = btn.getAttribute('data-set-lang');
            if (btnLang === lang) {
                btn.classList.add('bg-liva-olive', 'text-white', 'shadow-xs');
                btn.classList.remove('text-liva-muted', 'hover:text-liva-dark');
            } else {
                btn.classList.remove('bg-liva-olive', 'text-white', 'shadow-xs');
                btn.classList.add('text-liva-muted', 'hover:text-liva-dark');
            }
        });

        // Re-render all sliders to update localized titles, badges & stock text
        this.renderAllSliders();
        this.renderCart();

        if (notify) {
            this.showToast(lang === 'km' ? 'បានផ្លាស់ប្តូរភាសាទៅ ភាសាខ្មែរ' : 'Language switched to English');
        }
    }

    renderCard(product, isPromo = false) {
        const isKm = this.currentLang === 'km';
        const t = translations[this.currentLang] || translations.en;

        const name = isKm ? product.nameKm : product.nameEn;
        const benefit = isKm ? product.benefitKm : product.benefitEn;
        let badge = isKm ? product.badgeKm : product.badgeEn;

        if (isPromo && product.promoBadgeEn) {
            badge = isKm ? product.promoBadgeKm : product.promoBadgeEn;
        }

        const isFav = this.favorites.includes(product.id);
        const hasHover = !!product.hoverImage;

        // Stock quantity status
        const isLowStock = product.stock <= 8;
        const stockText = isLowStock
            ? t.lowStockStatus.replace('{count}', product.stock)
            : t.inStockStatus.replace('{count}', product.stock);

        return `
        <div class="product-slide-card w-[280px] sm:w-[320px] lg:w-[calc(25%-18px)] shrink-0 snap-start luxury-card group rounded-2xl overflow-hidden flex flex-col justify-between bg-white border border-liva-border/80 shadow-xs hover:shadow-xl transition-all duration-300" data-product-id="${product.id}">
            
            <!-- FULL Image Showcase Container (Clickable -> View Detail) -->
            <div class="relative w-full aspect-[4/5] overflow-hidden bg-[#F4F1EA]">
                
                <a href="/product/${product.id}" class="absolute inset-0 z-0 block cursor-pointer">
                    <!-- Primary FULL Product Image -->
                    <img src="${product.image}"
                         alt="${name}"
                         class="w-full h-full object-cover object-center transition-all duration-700 ease-out group-hover:scale-106 ${hasHover ? 'group-hover:opacity-0' : ''}"
                         loading="lazy" />

                    ${hasHover ? `
                    <!-- Secondary Alternate Image (Shown on Hover) -->
                    <img src="${product.hoverImage}"
                         alt="${name} alternate detail"
                         class="absolute inset-0 w-full h-full object-cover object-center opacity-0 transition-all duration-700 ease-out group-hover:opacity-100 group-hover:scale-106"
                         loading="lazy" />
                    ` : ''}
                </a>

                <!-- Top-Left Badge -->
                <span class="absolute top-3 left-3 z-10 text-[10px] tracking-wider uppercase font-semibold px-2.5 py-1 rounded-full ${isPromo ? 'bg-amber-600 text-white' : 'bg-white/95 text-liva-olive'} backdrop-blur-md border border-white/80 shadow-xs pointer-events-none">
                    ${badge}
                </span>

                <!-- Top-Right Add to Favorite Button (Heart) -->
                <button type="button"
                        onclick="event.stopPropagation(); event.preventDefault(); window.livaApp.toggleFavorite('${product.id}')"
                        class="absolute top-3 right-3 z-20 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white/90 backdrop-blur-md flex items-center justify-center shadow-xs border border-white/70 transition-all duration-300 hover:scale-110 active:scale-95 ${isFav ? 'text-rose-500 bg-white' : 'text-liva-muted hover:text-rose-500'}"
                        title="${isFav ? t.removeFromFavorites : t.addToFavorites}"
                        aria-label="Toggle favorite">
                    <svg class="w-4 h-4 sm:w-4.5 sm:h-4.5 transition-transform duration-200 ${isFav ? 'fill-rose-500 text-rose-500 scale-110' : 'fill-none stroke-current'}" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>
                    </svg>
                </button>

                <!-- Desktop Hover Quick Add to Bag Overlay Button -->
                <div class="absolute inset-x-3 bottom-3 opacity-0 translate-y-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0 hidden sm:block z-20">
                    <button type="button"
                            onclick="event.stopPropagation(); event.preventDefault(); window.livaApp.addToCart('${product.id}')"
                            class="w-full py-2.5 px-4 bg-liva-dark/95 backdrop-blur-md text-white text-xs tracking-wider uppercase font-semibold rounded-xl hover:bg-liva-olive transition-colors shadow-lg flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        ${t.addToCart}
                    </button>
                </div>
            </div>

            <!-- Product Details -->
            <div class="p-5 flex-1 flex flex-col justify-between">
                <div>
                    <!-- Size + Rating -->
                    <div class="flex items-center justify-between text-xs mb-1.5">
                        <span class="text-[11px] font-medium text-liva-muted tracking-wide">${product.size}</span>
                    </div>

                    <!-- Title (Links to View Detail) -->
                    <a href="/product/${product.id}" class="block group/title">
                        <h3 class="font-medium text-sm sm:text-base text-liva-dark line-clamp-1 group-hover/title:text-liva-sage transition-colors">
                            ${name}
                        </h3>
                    </a>

                    <!-- Benefit / Key Ingredients -->
                    <p class="text-xs text-liva-muted mt-1 line-clamp-1">
                        ${benefit}
                    </p>
                </div>

                <!-- Price & Stock QTY on 1 Row (as requested) -->
                <div class="mt-4 pt-3 border-t border-liva-border/60 flex items-center justify-between gap-2">
                    <div class="flex items-baseline gap-1.5 shrink-0">
                        <span class="text-base sm:text-lg font-bold text-liva-dark">
                            $${product.price.toFixed(2)}
                        </span>
                        ${isPromo && product.originalPrice ? `
                        <span class="text-xs sm:text-sm text-liva-muted line-through font-normal">
                            $${product.originalPrice.toFixed(2)}
                        </span>
                        ` : ''}
                    </div>

                    <!-- Stock Badge (Right side of the same row) -->
                    <div class="shrink-0">
                        ${isLowStock ? `
                        <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-amber-800 bg-amber-50/95 border border-amber-200/90 px-2.5 py-1 rounded-full shadow-2xs">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                            <span>${stockText}</span>
                        </span>
                        ` : `
                        <span class="inline-flex items-center gap-1.5 text-[11px] font-medium text-emerald-800 bg-emerald-50/95 border border-emerald-200/90 px-2.5 py-1 rounded-full shadow-2xs">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            <span>${stockText}</span>
                        </span>
                        `}
                    </div>
                </div>
            </div>
        </div>
        `;
    }

    renderAllSliders() {
        // Slider 1: New Arrivals
        const containerNew = document.getElementById('slider-new-arrivals');
        if (containerNew) {
            containerNew.innerHTML = this.newArrivals.map((p) => this.renderCard(p, false)).join('');
        }

        // Slider 2: Promotions
        const containerPromo = document.getElementById('slider-promotions');
        if (containerPromo) {
            containerPromo.innerHTML = this.promotions.map((p) => this.renderCard(p, true)).join('');
        }

        // Slider 3: Top Products
        const containerTop = document.getElementById('slider-top-products');
        if (containerTop) {
            containerTop.innerHTML = this.topProducts.map((p) => this.renderCard(p, false)).join('');
        }
    }

    addToCart(productId, qty = 1, size = null, price = null) {
        const product = this.products.find((p) => p.id === productId);
        if (!product) return;

        const itemSize = size || product.size;
        const itemPrice = price !== null ? price : product.price;
        const cartKey = `${productId}-${itemSize}`;

        const existing = this.cart.find((item) => (item.cartKey ? item.cartKey === cartKey : item.id === productId));
        if (existing) {
            existing.qty += qty;
        } else {
            this.cart.push({ id: productId, cartKey, qty, size: itemSize, price: itemPrice });
        }

        this.saveCart();

        const isKm = this.currentLang === 'km';
        const name = isKm ? product.nameKm : product.nameEn;
        this.showToast(isKm ? `បានដាក់ ${name} (${itemSize}) ចូលកន្ត្រក` : `Added ${name} (${itemSize}) to your bag`);
        this.toggleCart(true);
    }

    updateCartQty(cartKeyOrId, delta) {
        const item = this.cart.find((i) => (i.cartKey ? i.cartKey === cartKeyOrId : i.id === cartKeyOrId));
        if (!item) return;

        item.qty += delta;
        if (item.qty <= 0) {
            this.cart = this.cart.filter((i) => (i.cartKey ? i.cartKey !== cartKeyOrId : i.id !== cartKeyOrId));
        }

        this.saveCart();
    }

    removeFromCart(cartKeyOrId) {
        this.cart = this.cart.filter((i) => (i.cartKey ? i.cartKey !== cartKeyOrId : i.id !== cartKeyOrId));
        this.saveCart();
    }

    toggleCart(forceOpen) {
        const drawer = document.getElementById('cart-drawer');
        const backdrop = document.getElementById('cart-backdrop');
        if (!drawer || !backdrop) return;

        const isOpen = forceOpen !== undefined ? forceOpen : drawer.classList.contains('translate-x-full');

        if (isOpen) {
            backdrop.classList.remove('hidden');
            setTimeout(() => backdrop.classList.add('opacity-100'), 10);
            drawer.classList.remove('translate-x-full');
            document.body.classList.add('overflow-hidden');
        } else {
            backdrop.classList.remove('opacity-100');
            drawer.classList.add('translate-x-full');
            document.body.classList.remove('overflow-hidden');
            setTimeout(() => backdrop.classList.add('hidden'), 300);
        }
    }

    renderCart() {
        const isKm = this.currentLang === 'km';
        const t = translations[this.currentLang] || translations.en;

        const totalCount = this.cart.reduce((sum, item) => sum + item.qty, 0);
        const subtotal = this.cart.reduce((sum, item) => {
            const product = this.products.find((p) => p.id === item.id);
            const unitPrice = item.price !== undefined ? item.price : (product ? product.price : 0);
            return sum + (unitPrice * item.qty);
        }, 0);

        // Update badge counts in navbar
        document.querySelectorAll('.cart-count-badge').forEach((badge) => {
            badge.textContent = totalCount;
            if (totalCount > 0) {
                badge.classList.remove('hidden');
            } else {
                badge.classList.add('hidden');
            }
        });

        // Cart Drawer elements
        const itemsContainer = document.getElementById('cart-items-container');
        const emptyState = document.getElementById('cart-empty-state');
        const footerState = document.getElementById('cart-footer-state');
        const subtotalEl = document.getElementById('cart-subtotal-price');
        const shippingProgress = document.getElementById('free-shipping-progress');
        const shippingText = document.getElementById('free-shipping-text');

        if (!itemsContainer) return;

        if (this.cart.length === 0) {
            itemsContainer.innerHTML = '';
            if (emptyState) emptyState.classList.remove('hidden');
            if (footerState) footerState.classList.add('hidden');
        } else {
            if (emptyState) emptyState.classList.add('hidden');
            if (footerState) footerState.classList.remove('hidden');

            itemsContainer.innerHTML = this.cart.map((item) => {
                const product = this.products.find((p) => p.id === item.id);
                if (!product) return '';
                const name = isKm ? product.nameKm : product.nameEn;
                const itemSize = item.size || product.size;
                const unitPrice = item.price !== undefined ? item.price : product.price;
                const itemKey = item.cartKey || item.id;

                return `
                <div class="flex gap-4 py-4 border-b border-liva-border/60">
                    <div class="w-20 h-20 bg-[#F7F5F0] rounded-xl overflow-hidden shrink-0 border border-liva-border/50">
                        <img src="${product.image}" alt="${name}" class="w-full h-full object-cover" />
                    </div>
                    <div class="flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start gap-2">
                                <h4 class="font-medium text-sm text-liva-dark leading-tight">${name}</h4>
                                <button type="button" onclick="window.livaApp.removeFromCart('${itemKey}')" class="text-liva-muted hover:text-rose-600 transition-colors p-1" title="${t.remove}">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                            <div class="text-xs text-liva-muted mt-0.5">${itemSize}</div>
                        </div>

                        <div class="flex justify-between items-center mt-3">
                            <!-- Qty Stepper -->
                            <div class="flex items-center border border-liva-border rounded-lg bg-white overflow-hidden shadow-2xs">
                                <button type="button" onclick="window.livaApp.updateCartQty('${itemKey}', -1)" class="w-7 h-7 flex items-center justify-center text-liva-charcoal hover:bg-liva-stone text-xs transition-colors">-</button>
                                <span class="w-8 text-center text-xs font-semibold text-liva-dark">${item.qty}</span>
                                <button type="button" onclick="window.livaApp.updateCartQty('${itemKey}', 1)" class="w-7 h-7 flex items-center justify-center text-liva-charcoal hover:bg-liva-stone text-xs transition-colors">+</button>
                            </div>
                            <!-- Price -->
                            <div class="font-semibold text-sm text-liva-dark">
                                $${(unitPrice * item.qty).toFixed(2)}
                            </div>
                        </div>
                    </div>
                </div>
                `;
            }).join('');
        }

        if (subtotalEl) {
            subtotalEl.textContent = `$${subtotal.toFixed(2)}`;
        }

        // Free Shipping calculation ($50 threshold)
        if (shippingProgress && shippingText) {
            const freeThreshold = 50.0;
            const pct = Math.min(100, (subtotal / freeThreshold) * 100);
            shippingProgress.style.width = `${pct}%`;

            if (subtotal >= freeThreshold) {
                shippingText.textContent = t.freeShippingQualified;
                shippingProgress.classList.remove('bg-liva-gold');
                shippingProgress.classList.add('bg-emerald-600');
            } else {
                const diff = (freeThreshold - subtotal).toFixed(2);
                shippingText.textContent = t.freeShippingRemaining.replace('{amount}', `$${diff}`);
                shippingProgress.classList.remove('bg-emerald-600');
                shippingProgress.classList.add('bg-liva-gold');
            }
        }
    }

    showToast(message) {
        let toast = document.getElementById('liva-toast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'liva-toast';
            toast.className = 'fixed bottom-6 right-6 z-50 px-5 py-3 rounded-xl bg-liva-dark text-white text-xs sm:text-sm font-medium shadow-2xl transition-all duration-300 opacity-0 translate-y-3 pointer-events-none flex items-center gap-2.5 border border-white/10';
            document.body.appendChild(toast);
        }

        toast.innerHTML = `
            <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>${message}</span>
        `;

        toast.classList.remove('opacity-0', 'translate-y-3');
        toast.classList.add('opacity-100', 'translate-y-0');

        clearTimeout(this.toastTimeout);
        this.toastTimeout = setTimeout(() => {
            toast.classList.remove('opacity-100', 'translate-y-0');
            toast.classList.add('opacity-0', 'translate-y-3');
        }, 3000);
    }
}

// Instantiate on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    window.livaApp = new LivaApp();
});

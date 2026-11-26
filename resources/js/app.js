import { translations, allProducts, newArrivalsProducts, promotionsProducts, topProductsList, getBasePath } from './i18n.js';

class LivaApp {
    constructor() {
        this.products = allProducts;
        this.newArrivals = newArrivalsProducts;
        this.promotions = promotionsProducts;
        this.topProducts = topProductsList;

        this.currentLang = localStorage.getItem('liva_lang') || document.documentElement.lang || 'en';
        this.cart = this.loadCart();
        this.favorites = this.loadFavorites();
        this.selectedCustomSetItems = new Set();
        this.modalSearchQuery = '';
        this.navSearchQuery = '';

        this.init();
    }

    init() {
        // Apply initial language
        this.applyLanguage(this.currentLang, false);

        // Render all product sliders
        this.renderAllSliders();

        // Start Product Sliders Auto-sliding
        this.startAutoSlide();

        // Initialize Top Section Slide Banner
        this.initHeroSlider();

        // Render cart & favorites badges
        this.renderCart();
        this.updateFavoriteBadges();

        // Initialize Custom Set Builder UI
        this.updateCustomSetBuilderUI();

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
        this.renderCheckoutSummary();
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
        this.renderFavorites();
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

    toggleFavorites(forceOpen) {
        const drawer = document.getElementById('favorites-drawer');
        const backdrop = document.getElementById('favorites-backdrop');
        if (!drawer || !backdrop) return;

        const isOpen = forceOpen !== undefined ? forceOpen : drawer.classList.contains('translate-x-full');

        if (isOpen) {
            this.renderFavorites();
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

    renderFavorites() {
        const container = document.getElementById('favorites-items-container');
        const emptyState = document.getElementById('favorites-empty-state');
        const footer = document.getElementById('favorites-footer');
        const countLabel = document.getElementById('favorites-count-label');
        if (!container) return;

        const isKm = this.currentLang === 'km';
        const count = this.favorites.length;

        if (countLabel) {
            countLabel.textContent = isKm ? `${count} មុខទំនិញបានរក្សាទុក` : `${count} saved items`;
        }

        if (count === 0) {
            container.innerHTML = '';
            if (emptyState) emptyState.classList.remove('hidden');
            if (footer) footer.classList.add('hidden');
            return;
        }

        if (emptyState) emptyState.classList.add('hidden');
        if (footer) footer.classList.remove('hidden');

        container.innerHTML = this.favorites.map((id) => {
            const product = this.products.find((p) => p.id === id);
            if (!product) return '';

            const name = isKm ? product.nameKm : product.nameEn;

            return `
            <div class="flex items-center gap-3.5 py-2 group transition-all">
                <a href="${getBasePath()}/product/${product.id}/" class="w-16 h-16 rounded-xl overflow-hidden bg-[#F4F1EA] shrink-0 border border-liva-border/60 block">
                    <img src="${product.image}" alt="${name}" class="w-full h-full object-cover" />
                </a>
                <div class="flex-1 min-w-0">
                    <a href="${getBasePath()}/product/${product.id}/" class="font-medium text-xs sm:text-sm text-liva-dark truncate block hover:text-liva-olive transition-colors">
                        ${name}
                    </a>
                    <div class="flex items-center gap-2 mt-0.5 text-[11px] text-liva-muted">
                        <span class="font-bold text-liva-dark">$${product.price.toFixed(2)}</span>
                        <span>·</span>
                        <span class="text-emerald-700 font-semibold">Stock: ${product.stock}</span>
                    </div>
                    <div class="flex items-center gap-2 mt-2">
                        <button type="button" 
                                onclick="window.livaApp.addToCart('${product.id}');"
                                class="px-2.5 py-1 text-[11px] font-semibold bg-liva-dark hover:bg-liva-olive text-white rounded-lg transition-colors cursor-pointer">
                            + Add to Bag
                        </button>
                        <button type="button" 
                                onclick="window.livaApp.toggleFavorite('${product.id}');"
                                class="p-1 text-liva-muted hover:text-rose-500 transition-colors cursor-pointer"
                                title="Remove from wishlist">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                </div>
            </div>
            `;
        }).join('');
    }

    moveAllFavoritesToCart() {
        if (this.favorites.length === 0) return;
        this.favorites.forEach((id) => {
            const product = this.products.find((p) => p.id === id);
            if (product) {
                const existing = this.cart.find((i) => i.id === id);
                if (existing) {
                    existing.qty += 1;
                } else {
                    this.cart.push({ id, cartKey: `${id}-${product.size}`, qty: 1, size: product.size, price: product.price });
                }
            }
        });
        this.saveCart();
        this.toggleFavorites(false);
        this.toggleCart(true);
        const isKm = this.currentLang === 'km';
        this.showToast(isKm ? 'បានដាក់ទំនិញពេញចិត្តទាំងអស់ចូលកន្ត្រក!' : 'Moved all favorites to your shopping bag!');
    }

    clearFavorites() {
        this.favorites = [];
        this.saveFavorites();
        this.renderFavorites();
        this.renderAllSliders();
        const isKm = this.currentLang === 'km';
        this.showToast(isKm ? 'បានសម្អាតបញ្ជីពេញចិត្ត' : 'Cleared your wishlist');
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

        // Reset auto-slide timer so user gets full interval before next auto-slide
        this.resumeSlider(sliderId);
    }

    initHeroSlider() {
        const track = document.getElementById('hero-carousel-track');
        if (!track) return;

        const slides = track.querySelectorAll('.hero-slide');
        if (!slides || slides.length === 0) return;

        const prevBtn = document.getElementById('hero-slide-prev');
        const nextBtn = document.getElementById('hero-slide-next');
        const dots = document.querySelectorAll('.hero-dot');
        const counter = document.getElementById('hero-slide-counter');
        const progress = document.getElementById('hero-slide-progress');
        const card = document.getElementById('hero-carousel-card');

        let currentSlide = 0;
        const totalSlides = slides.length;
        let slideInterval = null;
        const slideDuration = 5000;
        let progressStart = 0;
        let progressFrame = null;

        const updateDotsAndCounter = () => {
            dots.forEach((dot, idx) => {
                if (idx === currentSlide) {
                    dot.className = 'hero-dot w-8 h-2 rounded-full bg-white transition-all duration-300 cursor-pointer';
                } else {
                    dot.className = 'hero-dot w-2.5 h-2 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-300 cursor-pointer';
                }
            });

            if (counter) {
                counter.textContent = `0${currentSlide + 1} / 0${totalSlides}`;
            }
        };

        const startProgressBar = () => {
            if (!progress) return;
            if (progressFrame) cancelAnimationFrame(progressFrame);
            progress.style.transition = 'none';
            progress.style.width = '0%';
            progressStart = performance.now();

            const step = (now) => {
                const elapsed = now - progressStart;
                const pct = Math.min((elapsed / slideDuration) * 100, 100);
                progress.style.width = `${pct}%`;
                if (pct < 100) {
                    progressFrame = requestAnimationFrame(step);
                }
            };
            progressFrame = requestAnimationFrame(step);
        };

        const goToSlide = (index) => {
            if (index < 0) {
                currentSlide = totalSlides - 1;
            } else if (index >= totalSlides) {
                currentSlide = 0;
            } else {
                currentSlide = index;
            }

            track.style.transform = `translateX(-${currentSlide * 100}%)`;
            updateDotsAndCounter();
            startProgressBar();
        };

        const nextSlide = () => goToSlide(currentSlide + 1);
        const prevSlide = () => goToSlide(currentSlide - 1);

        const startHeroTimer = () => {
            stopHeroTimer();
            startProgressBar();
            slideInterval = setInterval(() => {
                nextSlide();
            }, slideDuration);
        };

        const stopHeroTimer = () => {
            if (slideInterval) {
                clearInterval(slideInterval);
                slideInterval = null;
            }
            if (progressFrame) {
                cancelAnimationFrame(progressFrame);
                progressFrame = null;
            }
            if (progress) {
                progress.style.width = '0%';
            }
        };

        const resetHeroTimer = () => {
            stopHeroTimer();
            startHeroTimer();
        };

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                prevSlide();
                resetHeroTimer();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                nextSlide();
                resetHeroTimer();
            });
        }

        dots.forEach((dot) => {
            dot.addEventListener('click', () => {
                const idx = parseInt(dot.getAttribute('data-dot-index'), 10);
                if (!isNaN(idx)) {
                    goToSlide(idx);
                    resetHeroTimer();
                }
            });
        });

        if (card) {
            card.addEventListener('mouseenter', () => {
                stopHeroTimer();
            });
            card.addEventListener('mouseleave', () => {
                startHeroTimer();
            });

            // Touch Swipe Support
            let touchStartX = 0;
            let touchEndX = 0;
            card.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
                stopHeroTimer();
            }, { passive: true });

            card.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].clientX;
                const diff = touchStartX - touchEndX;
                if (Math.abs(diff) > 40) {
                    if (diff > 0) {
                        nextSlide();
                    } else {
                        prevSlide();
                    }
                }
                resetHeroTimer();
            }, { passive: true });
        }

        // Initialize state & start auto-timer
        goToSlide(0);
        startHeroTimer();
    }

    startAutoSlide() {
        this.stopAutoSlide();
        this.autoSlideIntervals = {};
        const sliderIds = ['slider-new-arrivals', 'slider-promotions', 'slider-top-products'];

        sliderIds.forEach((id, index) => {
            const slider = document.getElementById(id);
            if (!slider) return;

            // Pause on hover & touch
            if (!slider.dataset.autoSlideBound) {
                slider.dataset.autoSlideBound = 'true';
                slider.addEventListener('mouseenter', () => this.pauseSlider(id));
                slider.addEventListener('mouseleave', () => this.resumeSlider(id));
                slider.addEventListener('touchstart', () => this.pauseSlider(id), { passive: true });
                slider.addEventListener('touchend', () => this.resumeSlider(id), { passive: true });
            }

            // Stagger slightly so each row glides smoothly
            const intervalTime = 3600 + (index * 600);
            this.autoSlideIntervals[id] = setInterval(() => {
                this.autoSlideStep(id);
            }, intervalTime);
        });
    }

    pauseSlider(id) {
        if (this.autoSlideIntervals && this.autoSlideIntervals[id]) {
            clearInterval(this.autoSlideIntervals[id]);
            this.autoSlideIntervals[id] = null;
        }
    }

    resumeSlider(id) {
        this.pauseSlider(id);
        const slider = document.getElementById(id);
        if (!slider) return;

        this.autoSlideIntervals[id] = setInterval(() => {
            this.autoSlideStep(id);
        }, 4000);
    }

    stopAutoSlide() {
        if (this.autoSlideIntervals) {
            Object.values(this.autoSlideIntervals).forEach((interval) => {
                if (interval) clearInterval(interval);
            });
        }
        this.autoSlideIntervals = {};
    }

    autoSlideStep(sliderId) {
        const slider = document.getElementById(sliderId);
        if (!slider) return;

        const card = slider.querySelector('.product-slide-card');
        const scrollAmount = card ? (card.offsetWidth + 24) : 320;
        const maxScroll = slider.scrollWidth - slider.clientWidth;

        // Loop back smoothly if reached or near the end
        if (slider.scrollLeft >= maxScroll - 15) {
            slider.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            slider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        }
    }

    openAllProductsModal(category = 'all') {
        const base = getBasePath();
        const url = category && category !== 'all'
            ? `${base}/products?filter=${encodeURIComponent(category)}`
            : `${base}/products`;
        window.location.href = url;
    }

    closeAllProductsModal() {
        // Legacy no-op: All Products now uses a dedicated page (/products)
    }

    toggleModalCategoryDropdown() {
        const menu = document.getElementById('modal-category-dropdown-menu');
        const arrow = document.getElementById('modal-category-dropdown-arrow');
        if (!menu) return;
        const isHidden = menu.classList.contains('hidden');
        if (isHidden) {
            menu.classList.remove('hidden');
            if (arrow) arrow.classList.add('rotate-180');
        } else {
            menu.classList.add('hidden');
            if (arrow) arrow.classList.remove('rotate-180');
        }
    }

    filterModalByCategory(category, label) {
        const menu = document.getElementById('modal-category-dropdown-menu');
        const arrow = document.getElementById('modal-category-dropdown-arrow');
        const labelEl = document.getElementById('modal-category-dropdown-label');
        if (menu) menu.classList.add('hidden');
        if (arrow) arrow.classList.remove('rotate-180');

        const isKm = this.currentLang === 'km';
        if (labelEl) {
            if (category === 'all') {
                labelEl.textContent = isKm ? 'ប្រភេទ៖ ទាំងអស់' : 'Category: All';
            } else if (category === 'body') {
                labelEl.textContent = isKm ? 'ដងខ្លួន' : 'Body Care';
            } else if (category === 'hair') {
                labelEl.textContent = isKm ? 'សរសៃសក់' : 'Hair Care';
            } else if (category === 'sets') {
                labelEl.textContent = isKm ? 'ឈុតពិសេស' : 'Ritual Sets';
            } else {
                labelEl.textContent = label || category;
            }
        }

        // Reset type tabs
        const container = document.getElementById('modal-category-filters');
        if (container) {
            container.querySelectorAll('.modal-filter-btn').forEach((btn) => {
                btn.className = 'modal-filter-btn px-3.5 py-1.5 rounded-full text-liva-charcoal hover:text-liva-dark transition-all cursor-pointer';
            });
        }

        this.currentModalCategory = category;
        this.renderModalProducts(category);
    }

    handleModalSearch(query) {
        this.modalSearchQuery = (query || '').trim();
        const clearBtn = document.getElementById('modal-search-clear');
        if (clearBtn) {
            if (this.modalSearchQuery.length > 0) {
                clearBtn.classList.remove('hidden');
            } else {
                clearBtn.classList.add('hidden');
            }
        }
        this.renderModalProducts();
    }

    clearModalSearch() {
        const input = document.getElementById('modal-search-input');
        if (input) input.value = '';
        this.handleModalSearch('');
    }

    handleNavSearch(query) {
        this.navSearchQuery = (query || '').trim();
        const clearBtn = document.getElementById('navbar-search-clear');
        const dropdown = document.getElementById('navbar-search-dropdown');
        const listEl = document.getElementById('navbar-search-results-list');

        if (clearBtn) {
            if (this.navSearchQuery.length > 0) {
                clearBtn.classList.remove('hidden');
            } else {
                clearBtn.classList.add('hidden');
            }
        }

        if (!this.navSearchQuery) {
            if (dropdown) dropdown.classList.add('hidden');
            return;
        }

        const isKm = this.currentLang === 'km';
        const q = this.navSearchQuery.toLowerCase();
        const matches = this.products.filter((p) => {
            const nameEn = (p.nameEn || '').toLowerCase();
            const nameKm = (p.nameKm || '').toLowerCase();
            const benefitEn = (p.benefitEn || '').toLowerCase();
            const benefitKm = (p.benefitKm || '').toLowerCase();
            const cat = (p.category || '').toLowerCase();
            return nameEn.includes(q) || nameKm.includes(q) || benefitEn.includes(q) || benefitKm.includes(q) || cat.includes(q);
        });

        if (dropdown && listEl) {
            dropdown.classList.remove('hidden');
            if (matches.length === 0) {
                listEl.innerHTML = `
                    <div class="py-4 text-center text-xs text-liva-muted">
                        ${isKm ? 'រកមិនឃើញផលិតផលទេ' : 'No products found'}
                    </div>
                `;
            } else {
                const itemsHtml = matches.slice(0, 5).map((p) => {
                    const name = isKm ? p.nameKm : p.nameEn;
                    return `
                    <a href="${getBasePath()}/product/${p.id}/" class="flex items-center gap-2.5 p-2 rounded-xl hover:bg-liva-stone/80 transition-colors">
                        <img src="${p.image}" alt="${name}" class="w-10 h-10 object-cover rounded-lg bg-[#FAF8F5] border border-liva-border/60 shrink-0" />
                        <div class="min-w-0 flex-1">
                            <h5 class="text-xs font-semibold text-liva-dark truncate">${name}</h5>
                            <span class="text-[10px] text-liva-muted block">${p.size} · $${p.price.toFixed(2)}</span>
                        </div>
                    </a>
                    `;
                }).join('');

                const viewAllBtn = `
                <div class="pt-2 border-t border-liva-border/70 mt-1">
                    <button type="button" 
                            onclick="window.livaApp.submitNavSearch('${this.navSearchQuery}')" 
                            class="w-full py-2 px-3 rounded-lg bg-liva-dark hover:bg-liva-olive text-white text-[11px] font-semibold text-center transition-colors cursor-pointer flex items-center justify-center gap-1.5">
                        <span>${isKm ? `មើលលទ្ធផលទាំងអស់ (${matches.length})` : `View all ${matches.length} results in Catalog`}</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </div>
                `;

                listEl.innerHTML = itemsHtml + viewAllBtn;
            }
        }
    }

    openNavSearchDropdown() {
        if (this.navSearchQuery && this.navSearchQuery.length > 0) {
            this.handleNavSearch(this.navSearchQuery);
        }
    }

    clearNavSearch() {
        const input = document.getElementById('navbar-search-input');
        if (input) input.value = '';
        this.handleNavSearch('');
    }

    submitNavSearch(query) {
        const navDropdown = document.getElementById('navbar-search-dropdown');
        if (navDropdown) navDropdown.classList.add('hidden');

        const q = (query || '').trim();
        if (window.livaCatalogPage) {
            const catalogInput = document.getElementById('catalog-search-input');
            if (catalogInput) catalogInput.value = q;
            window.livaCatalogPage.handleSearch(q);
            return;
        }

        const base = getBasePath();
        window.location.href = q ? `${base}/products?q=${encodeURIComponent(q)}` : `${base}/products`;
    }

    filterModalProducts(category, btnElement) {
        this.currentModalCategory = category;

        // Reset category dropdown label if switching to a type tab
        const labelEl = document.getElementById('modal-category-dropdown-label');
        if (labelEl && (category === 'all' || category === 'single' || category === 'sets')) {
            const isKm = this.currentLang === 'km';
            labelEl.textContent = isKm ? 'ប្រភេទ៖ ទាំងអស់' : 'Category: All';
        }

        const container = document.getElementById('modal-category-filters');
        if (container) {
            container.querySelectorAll('.modal-filter-btn').forEach((btn) => {
                btn.className = 'modal-filter-btn px-3.5 py-1.5 rounded-full text-liva-charcoal hover:text-liva-dark transition-all cursor-pointer';
            });
        }
        if (btnElement) {
            btnElement.className = 'modal-filter-btn px-3.5 py-1.5 rounded-full bg-liva-dark text-white font-semibold shadow-xs transition-all cursor-pointer';
        }

        this.renderModalProducts(category);
    }

    renderModalProducts(category) {
        if (category !== undefined) {
            this.currentModalCategory = category;
        } else {
            category = this.currentModalCategory || 'all';
        }

        const grid = document.getElementById('modal-all-products-grid');
        const emptyState = document.getElementById('modal-empty-search');
        if (!grid) return;

        let list = this.products;
        if (category === 'body') {
            list = this.products.filter((p) => p.category === 'body');
        } else if (category === 'hair') {
            list = this.products.filter((p) => p.category === 'hair');
        } else if (category === 'sets') {
            list = this.products.filter((p) => p.category === 'sets');
        } else if (category === 'single') {
            list = this.products.filter((p) => p.category !== 'sets');
        } else if (category === 'new-arrivals') {
            list = this.newArrivals;
        } else if (category === 'promotions') {
            list = this.promotions;
        } else if (category === 'top-products') {
            list = this.topProducts;
        }

        // Apply search query filter if user typed in modal search
        if (this.modalSearchQuery) {
            const q = this.modalSearchQuery.toLowerCase();
            list = list.filter((p) => {
                const nameEn = (p.nameEn || '').toLowerCase();
                const nameKm = (p.nameKm || '').toLowerCase();
                const benefitEn = (p.benefitEn || '').toLowerCase();
                const benefitKm = (p.benefitKm || '').toLowerCase();
                const cat = (p.category || '').toLowerCase();
                const size = (p.size || '').toLowerCase();
                return nameEn.includes(q) || nameKm.includes(q) || benefitEn.includes(q) || benefitKm.includes(q) || cat.includes(q) || size.includes(q);
            });
        }

        const countEl = document.getElementById('modal-product-count');
        if (countEl) {
            const isKm = this.currentLang === 'km';
            countEl.textContent = isKm ? `${list.length} មុខទំនិញ` : `${list.length} Products`;
        }

        if (list.length === 0) {
            grid.innerHTML = '';
            if (emptyState) emptyState.classList.remove('hidden');
        } else {
            if (emptyState) emptyState.classList.add('hidden');
            grid.innerHTML = list.map((p) => this.renderCard(p, p.category === 'sets' || !!p.promoBadgeEn, true)).join('');
        }
    }

    toggleInlineAllProducts() {
        const section = document.getElementById('inline-all-products-section');
        const btnText = document.getElementById('show-all-btn-text');
        if (!section) return;

        const isHidden = section.classList.contains('hidden');
        const isKm = this.currentLang === 'km';

        if (isHidden) {
            this.renderInlineProducts('all');
            section.classList.remove('hidden');
            if (btnText) {
                btnText.textContent = isKm ? 'លាក់ផលិតផលទាំងអស់' : 'Hide all product';
            }
            section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } else {
            section.classList.add('hidden');
            if (btnText) {
                btnText.textContent = isKm ? 'បង្ហាញផលិតផលទាំងអស់' : 'Show all product';
            }
        }
    }

    filterInlineProducts(category, btnElement) {
        this.currentInlineCategory = category;

        const container = document.getElementById('inline-category-filters');
        if (container) {
            container.querySelectorAll('.inline-filter-btn').forEach((btn) => {
                btn.className = 'inline-filter-btn px-3.5 py-1.5 rounded-full text-liva-charcoal hover:text-liva-dark transition-all cursor-pointer';
            });
        }
        if (btnElement) {
            btnElement.className = 'inline-filter-btn px-3.5 py-1.5 rounded-full bg-liva-dark text-white font-semibold shadow-xs transition-all cursor-pointer';
        }

        this.renderInlineProducts(category);
    }

    filterInlineByCategory(category, label) {
        const menu = document.getElementById('inline-category-dropdown-menu');
        if (menu) menu.classList.add('hidden');
        const labelEl = document.getElementById('inline-category-label');
        if (labelEl) labelEl.textContent = label;
        this.filterInlineProducts(category);
    }

    renderInlineProducts(category = 'all') {
        const grid = document.getElementById('inline-all-products-grid');
        if (!grid) return;

        let list = this.products;
        if (category === 'body') {
            list = this.products.filter((p) => p.category === 'body');
        } else if (category === 'hair') {
            list = this.products.filter((p) => p.category === 'hair');
        } else if (category === 'sets') {
            list = this.products.filter((p) => p.category === 'sets');
        } else if (category === 'single') {
            list = this.products.filter((p) => p.category !== 'sets');
        }

        const countEl = document.getElementById('inline-product-count');
        if (countEl) {
            const isKm = this.currentLang === 'km';
            countEl.textContent = isKm ? `${list.length} មុខទំនិញ` : `${list.length} Products`;
        }

        grid.innerHTML = list.map((p) => this.renderCard(p, p.category === 'sets' || !!p.promoBadgeEn, true)).join('');
    }

    showSingleProducts() {
        const section = document.getElementById('collection');
        const inlineSection = document.getElementById('inline-all-products-section');
        const btnText = document.getElementById('show-all-btn-text');
        const isKm = this.currentLang === 'km';

        if (inlineSection && inlineSection.classList.contains('hidden')) {
            inlineSection.classList.remove('hidden');
            if (btnText) {
                btnText.textContent = isKm ? 'លាក់ផលិតផលទាំងអស់' : 'Hide all product';
            }
        }

        // Highlight single button in filter tabs
        const container = document.getElementById('inline-category-filters');
        if (container) {
            container.querySelectorAll('.inline-filter-btn').forEach((btn) => {
                const isSingle = btn.getAttribute('data-i18n') === 'navSingleProduct';
                if (isSingle) {
                    btn.className = 'inline-filter-btn px-3.5 py-1.5 rounded-full bg-liva-dark text-white font-semibold shadow-xs transition-all cursor-pointer';
                } else {
                    btn.className = 'inline-filter-btn px-3.5 py-1.5 rounded-full text-liva-charcoal hover:text-liva-dark transition-all cursor-pointer';
                }
            });
        }

        this.renderInlineProducts('single');

        if (section) {
            section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    showSetProducts() {
        const section = document.getElementById('collection');
        const inlineSection = document.getElementById('inline-all-products-section');
        const btnText = document.getElementById('show-all-btn-text');
        const isKm = this.currentLang === 'km';

        if (inlineSection && inlineSection.classList.contains('hidden')) {
            inlineSection.classList.remove('hidden');
            if (btnText) {
                btnText.textContent = isKm ? 'លាក់ផលិតផលទាំងអស់' : 'Hide all product';
            }
        }

        // Highlight sets button in filter tabs
        const container = document.getElementById('inline-category-filters');
        if (container) {
            container.querySelectorAll('.inline-filter-btn').forEach((btn) => {
                const isSets = btn.getAttribute('data-i18n') === 'navSetProduct';
                if (isSets) {
                    btn.className = 'inline-filter-btn px-3.5 py-1.5 rounded-full bg-liva-dark text-white font-semibold shadow-xs transition-all cursor-pointer';
                } else {
                    btn.className = 'inline-filter-btn px-3.5 py-1.5 rounded-full text-liva-charcoal hover:text-liva-dark transition-all cursor-pointer';
                }
            });
        }

        this.renderInlineProducts('sets');

        if (section) {
            section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    showSetBuilder() {
        const el = document.getElementById('custom-set-builder');
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    toggleCustomSetItem(productId) {
        if (this.selectedCustomSetItems.has(productId)) {
            this.selectedCustomSetItems.delete(productId);
        } else {
            this.selectedCustomSetItems.add(productId);
        }
        this.updateCustomSetBuilderUI();
    }

    updateCustomSetBuilderUI() {
        const isKm = this.currentLang === 'km';
        const count = this.selectedCustomSetItems.size;

        // 1. Update cards visual state
        document.querySelectorAll('.set-builder-card').forEach((card) => {
            const pid = card.getAttribute('data-product-id');
            const isSelected = this.selectedCustomSetItems.has(pid);
            const checkIcon = card.querySelector('.selection-check svg');
            const checkContainer = card.querySelector('.selection-check');
            const btnLabel = card.querySelector('.select-btn-label');

            if (isSelected) {
                card.classList.add('border-liva-olive', 'bg-amber-50/20', 'ring-2', 'ring-liva-olive/20');
                card.classList.remove('border-liva-border/90');
                if (checkContainer) {
                    checkContainer.classList.add('bg-liva-olive', 'border-liva-olive');
                    checkContainer.classList.remove('bg-white', 'border-liva-border');
                }
                if (checkIcon) {
                    checkIcon.classList.remove('opacity-0');
                    checkIcon.classList.add('opacity-100');
                }
                if (btnLabel) {
                    btnLabel.textContent = isKm ? '✓ បានជ្រើសរើស' : '✓ Selected';
                    btnLabel.classList.add('font-bold', 'text-liva-dark');
                    btnLabel.classList.remove('text-liva-olive');
                }
            } else {
                card.classList.remove('border-liva-olive', 'bg-amber-50/20', 'ring-2', 'ring-liva-olive/20');
                card.classList.add('border-liva-border/90');
                if (checkContainer) {
                    checkContainer.classList.remove('bg-liva-olive', 'border-liva-olive');
                    checkContainer.classList.add('bg-white', 'border-liva-border');
                }
                if (checkIcon) {
                    checkIcon.classList.remove('opacity-100');
                    checkIcon.classList.add('opacity-0');
                }
                if (btnLabel) {
                    btnLabel.textContent = isKm ? '+ បន្ថែមក្នុងឈុត' : '+ Add to Set';
                    btnLabel.classList.remove('font-bold', 'text-liva-dark');
                    btnLabel.classList.add('text-liva-olive');
                }
            }
        });

        // 2. Calculations
        const selectedList = Array.from(this.selectedCustomSetItems)
            .map((id) => this.products.find((p) => p.id === id))
            .filter(Boolean);

        const subtotal = selectedList.reduce((sum, p) => sum + p.price, 0);
        const hasDiscount = count >= 2;
        const discountAmount = hasDiscount ? Math.round(subtotal * 0.15 * 100) / 100 : 0;
        const finalPrice = subtotal - discountAmount;

        // 3. Update summary elements
        const countPill = document.getElementById('set-builder-count-pill');
        const statusText = document.getElementById('set-builder-status-text');
        const statusPct = document.getElementById('set-builder-status-pct');
        const progressBar = document.getElementById('set-builder-progress-bar');
        const origPriceEl = document.getElementById('set-builder-original-price');
        const discountEl = document.getElementById('set-builder-discount-amount');
        const finalPriceEl = document.getElementById('set-builder-final-price');
        const addBtn = document.getElementById('set-builder-add-btn');
        const btnLabelEl = document.getElementById('set-builder-btn-label');
        const selectedContainer = document.getElementById('set-builder-selected-list');

        if (countPill) {
            countPill.textContent = isKm ? `${count} / ២+ មុខ` : `${count} / 2+ items`;
        }

        const pct = Math.min(100, Math.round((count / 2) * 100));
        if (progressBar) progressBar.style.width = `${pct}%`;
        if (statusPct) statusPct.textContent = `${pct}%`;

        if (statusText) {
            if (count === 0) {
                statusText.textContent = isKm ? 'ជ្រើសរើសយ៉ាងតិច ២ មុខដើម្បីទទួលបានការបញ្ចុះតម្លៃ ១៥%' : 'Select at least 2 products for 15% discount';
                statusText.className = 'text-amber-800';
            } else if (count === 1) {
                statusText.textContent = isKm ? 'ជ្រើសរើស ១ មុខទៀតដើម្បីទទួលបានការបញ្ចុះតម្លៃ ១៥%!' : 'Add 1 more product to unlock 15% OFF!';
                statusText.className = 'text-amber-600 font-semibold';
            } else {
                statusText.textContent = isKm ? `✓ បានបញ្ចុះតម្លៃ ១៥% រួចរាល់! (${count} មុខ)` : `✓ 15% Bundle Discount applied! (${count} items)`;
                statusText.className = 'text-emerald-700 font-semibold';
            }
        }

        if (origPriceEl) origPriceEl.textContent = `$${subtotal.toFixed(2)}`;
        if (discountEl) discountEl.textContent = `-$${discountAmount.toFixed(2)}`;
        if (finalPriceEl) finalPriceEl.textContent = `$${finalPrice.toFixed(2)}`;

        // Button state
        if (addBtn && btnLabelEl) {
            if (count >= 2) {
                addBtn.disabled = false;
                addBtn.className = 'w-full py-3.5 px-5 rounded-full bg-liva-dark hover:bg-liva-olive text-white cursor-pointer font-semibold text-xs uppercase tracking-wider transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center gap-2 hover:-translate-y-0.5';
                btnLabelEl.textContent = isKm
                    ? `ដាក់ឈុតផ្ទាល់ខ្លួន (${count} មុខ) ចូលកន្ត្រក · $${finalPrice.toFixed(2)}`
                    : `Add Custom Set (${count} Items) to Bag · $${finalPrice.toFixed(2)}`;
            } else {
                addBtn.disabled = true;
                addBtn.className = 'w-full py-3.5 px-5 rounded-full bg-liva-stone text-liva-muted cursor-not-allowed font-semibold text-xs uppercase tracking-wider transition-all duration-200 shadow-xs flex items-center justify-center gap-2';
                btnLabelEl.textContent = isKm
                    ? `ជ្រើសរើសចាប់ពី ២ មុខឡើងទៅ (ខ្វះ ${2 - count} ទៀត)`
                    : `Choose 2+ Products to Create Set (${2 - count} more needed)`;
            }
        }

        // Selected list inside summary panel
        if (selectedContainer) {
            if (count === 0) {
                selectedContainer.innerHTML = `
                    <p class="text-xs text-liva-muted text-center py-6 italic" id="set-builder-empty-msg">
                        ${isKm ? 'ចុចលើផលិតផលខាងលើដើម្បីជ្រើសរើស។ ជ្រើសរើសចាប់ពី ២ មុខឡើងទៅដើម្បីទទួលបានការបញ្ចុះតម្លៃ ១៥%!' : 'Click on any products above to add them to your custom set. Choose 2 or more to get 15% off!'}
                    </p>
                `;
            } else {
                selectedContainer.innerHTML = selectedList.map((p) => {
                    const name = isKm ? p.nameKm : p.nameEn;
                    return `
                    <div class="flex items-center justify-between gap-3 p-2 rounded-xl bg-liva-stone/60 border border-liva-border/60">
                        <div class="flex items-center gap-2.5 min-w-0">
                            <img src="${p.image}" alt="${name}" class="w-9 h-9 object-cover rounded-lg bg-white shrink-0 border border-liva-border/60" />
                            <div class="min-w-0">
                                <h5 class="text-xs font-semibold text-liva-dark truncate">${name}</h5>
                                <span class="text-[10px] text-liva-muted">${p.size} · $${p.price.toFixed(2)}</span>
                            </div>
                        </div>
                        <button type="button" 
                                onclick="window.livaApp.toggleCustomSetItem('${p.id}')" 
                                class="text-liva-muted hover:text-rose-600 p-1 transition-colors cursor-pointer"
                                title="Remove">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                    `;
                }).join('');
            }
        }
    }

    addCustomSetToCart() {
        if (this.selectedCustomSetItems.size < 2) {
            this.showToast(this.currentLang === 'km' ? 'សូមជ្រើសរើសចាប់ពី ២ មុខឡើងទៅ' : 'Please select at least 2 products to build your set');
            return;
        }

        const isKm = this.currentLang === 'km';
        const selectedList = Array.from(this.selectedCustomSetItems)
            .map((id) => this.products.find((p) => p.id === id))
            .filter(Boolean);

        const count = selectedList.length;
        const subtotal = selectedList.reduce((sum, p) => sum + p.price, 0);
        const finalPrice = Math.round(subtotal * 0.85 * 100) / 100;
        const setKey = 'custom-set-' + Date.now();
        const namesEn = selectedList.map(p => p.nameEn).join(' + ');
        const namesKm = selectedList.map(p => p.nameKm).join(' + ');

        const customSetItem = {
            id: setKey,
            cartKey: setKey,
            isCustomSet: true,
            nameEn: `Custom Botanical Set (${count} Items)`,
            nameKm: `ឈុតរុក្ខជាតិរៀបចំផ្ទាល់ខ្លួន (${count} មុខ)`,
            sizeEn: `${count} Items Bundle (15% OFF)`,
            sizeKm: `ឈុតផលិតផល ${count} មុខ (ចុះ ១៥%)`,
            detailsEn: namesEn,
            detailsKm: namesKm,
            image: getBasePath() + '/img/ritual-duo.webp',
            price: finalPrice,
            originalPrice: subtotal,
            qty: 1
        };

        this.cart.push(customSetItem);
        this.saveCart();

        // Clear builder selections
        this.selectedCustomSetItems.clear();
        this.updateCustomSetBuilderUI();

        this.showToast(isKm ? 'បានដាក់ឈុតផ្ទាល់ខ្លួនចូលកន្ត្រកដោយជោគជ័យ! 🎉' : 'Added your custom bundle (15% off) to Bag! 🎉');
        this.toggleCart(true);
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

        // Wishlist Drawer Toggles
        document.querySelectorAll('[data-favorites-toggle]').forEach((btn) => {
            btn.addEventListener('click', () => {
                this.toggleFavorites();
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

        // Close Favorites on backdrop click
        const favBackdrop = document.getElementById('favorites-backdrop');
        if (favBackdrop) {
            favBackdrop.addEventListener('click', () => this.toggleFavorites(false));
        }

        // Close Checkout on backdrop click
        const checkoutBackdrop = document.getElementById('checkout-backdrop');
        if (checkoutBackdrop) {
            checkoutBackdrop.addEventListener('click', () => this.closeCheckoutModal());
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
        // Click outside dropdowns to close them
        document.addEventListener('click', (e) => {
            // Close modal category dropdown
            const catWrapper = document.getElementById('modal-category-dropdown');
            if (catWrapper && !catWrapper.contains(e.target)) {
                const catMenu = document.getElementById('modal-category-dropdown-menu');
                const catArrow = document.getElementById('modal-category-dropdown-arrow');
                if (catMenu) catMenu.classList.add('hidden');
                if (catArrow) catArrow.classList.remove('rotate-180');
            }

            // Close navbar search dropdown
            const navSearchWrapper = document.getElementById('navbar-search-wrapper');
            if (navSearchWrapper && !navSearchWrapper.contains(e.target)) {
                const navSearchDropdown = document.getElementById('navbar-search-dropdown');
                if (navSearchDropdown) navSearchDropdown.classList.add('hidden');
            }

            // Close inline category dropdown
            const inlineCatWrapper = document.getElementById('inline-category-dropdown');
            if (inlineCatWrapper && !inlineCatWrapper.contains(e.target)) {
                const inlineMenu = document.getElementById('inline-category-dropdown-menu');
                if (inlineMenu) inlineMenu.classList.add('hidden');
            }
        });

        // Escape key to close drawers and modals
        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                this.closeAllProductsModal();
                this.closeCheckoutModal();
                this.toggleFavorites(false);
                this.toggleCart(false);
                const navSearchDropdown = document.getElementById('navbar-search-dropdown');
                if (navSearchDropdown) navSearchDropdown.classList.add('hidden');
            }
        });
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

        // Re-render all sliders, inline catalog, modal, cart, favorites and checkout
        this.renderAllSliders();
        this.renderInlineProducts(this.currentInlineCategory || 'all');
        this.renderModalProducts(this.currentModalCategory || 'all');
        this.renderFavorites();
        this.renderCart();
        this.renderCheckoutSummary();
        this.updateCustomSetBuilderUI();
        this.startAutoSlide();

        if (notify) {
            this.showToast(lang === 'km' ? 'បានផ្លាស់ប្តូរភាសាទៅ ភាសាខ្មែរ' : 'Language switched to English');
        }
    }

    renderCard(product, isPromo = false, isGridCard = false) {
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

        // Stock quantity status: user explicitly requested "only stock:qty"
        const isLowStock = product.stock <= 8;
        const stockText = isKm ? `Stock: ${product.stock}` : `Stock: ${product.stock}`;

        const widthClass = isGridCard
            ? 'w-full'
            : 'w-[calc(50%-6px)] sm:w-[calc(50%-12px)] md:w-[calc(33.333%-16px)] lg:w-[calc(25%-18px)] shrink-0 snap-start';

        return `
        <div class="product-slide-card ${widthClass} luxury-card group rounded-2xl overflow-hidden flex flex-col justify-between bg-white border border-liva-border/80 shadow-xs hover:shadow-xl transition-all duration-300" data-product-id="${product.id}">
            
            <!-- FULL Image Showcase Container (Clickable -> View Detail) -->
            <div class="relative w-full aspect-[4/5] overflow-hidden bg-[#F4F1EA]">
                
                <a href="${getBasePath()}/product/${product.id}/" class="absolute inset-0 z-0 block cursor-pointer">
                    <!-- Primary FULL Product Image -->
                    <img src="${product.image}"
                         alt="${name}"
                         class="product-primary-img w-full h-full object-cover object-center"
                         loading="lazy" />

                    ${hasHover ? `
                    <!-- Secondary Alternate Image (Shown on Hover) -->
                    <img src="${product.hoverImage}"
                         alt="${name} alternate view"
                         class="product-hover-img absolute inset-0 w-full h-full object-cover object-center"
                         loading="lazy" />
                    ` : ''}
                </a>

                <!-- Top-Right Add to Favorite Button (Heart) -->
                <button type="button"
                        onclick="event.stopPropagation(); event.preventDefault(); window.livaApp.toggleFavorite('${product.id}')"
                        class="absolute top-3 right-3 z-20 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-transparent flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-95 ${isFav ? 'text-rose-500' : 'text-liva-muted hover:text-rose-500'}"
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
                    <a href="${getBasePath()}/product/${product.id}/" class="block group/title">
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

                    <!-- Stock Badge: Only stock:qty -->
                    <div class="shrink-0">
                        <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold ${isLowStock ? 'text-amber-800 bg-amber-50/95 border-amber-200/90' : 'text-emerald-800 bg-emerald-50/95 border-emerald-200/90'} border px-2.5 py-1 rounded-full shadow-2xs">
                            <span class="w-1.5 h-1.5 rounded-full ${isLowStock ? 'bg-amber-500 animate-pulse' : 'bg-emerald-500'}"></span>
                            <span>${stockText}</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        `;
    }

    renderAllSliders() {
        this.syncBladeProductCards();
    }

    syncBladeProductCards() {
        const isKm = this.currentLang === 'km';
        const t = translations[this.currentLang] || translations.en;

        document.querySelectorAll('.product-slide-card[data-product-id]').forEach((card) => {
            const productId = card.getAttribute('data-product-id');
            if (!productId) return;

            const isFav = this.favorites.includes(productId);
            const favBtn = card.querySelector('.js-favorite-btn');
            const favIcon = card.querySelector('.js-favorite-icon');
            if (favBtn && favIcon) {
                favBtn.title = isFav ? t.removeFromFavorites : t.addToFavorites;
                if (isFav) {
                    favBtn.classList.add('text-rose-500');
                    favBtn.classList.remove('text-liva-muted');
                    favIcon.classList.add('fill-rose-500', 'text-rose-500', 'scale-110');
                    favIcon.classList.remove('fill-none');
                } else {
                    favBtn.classList.remove('text-rose-500');
                    favBtn.classList.add('text-liva-muted');
                    favIcon.classList.remove('fill-rose-500', 'text-rose-500', 'scale-110');
                    favIcon.classList.add('fill-none');
                }
            }

            const badgeEl = card.querySelector('.js-card-badge');
            if (badgeEl) {
                const text = isKm ? badgeEl.dataset.km : badgeEl.dataset.en;
                if (text) badgeEl.textContent = text;
            }

            const nameEl = card.querySelector('.js-card-name');
            if (nameEl) {
                const text = isKm ? nameEl.dataset.km : nameEl.dataset.en;
                if (text) nameEl.textContent = text;
            }

            const benefitEl = card.querySelector('.js-card-benefit');
            if (benefitEl) {
                const text = isKm ? benefitEl.dataset.km : benefitEl.dataset.en;
                if (text) benefitEl.textContent = text;
            }
        });
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
                let name, image, itemSize, unitPrice, details;
                const itemKey = item.cartKey || item.id;

                if (item.isCustomSet) {
                    name = isKm ? item.nameKm : item.nameEn;
                    image = item.image;
                    itemSize = isKm ? item.sizeKm : item.sizeEn;
                    unitPrice = item.price;
                    details = isKm ? item.detailsKm : item.detailsEn;
                } else {
                    const product = this.products.find((p) => p.id === item.id);
                    if (!product) return '';
                    name = isKm ? product.nameKm : product.nameEn;
                    image = product.image;
                    itemSize = item.size || product.size;
                    unitPrice = item.price !== undefined ? item.price : product.price;
                    details = null;
                }

                return `
                <div class="flex gap-4 py-4 border-b border-liva-border/60">
                    <div class="w-20 h-20 bg-[#F7F5F0] rounded-xl overflow-hidden shrink-0 border border-liva-border/50">
                        <img src="${image}" alt="${name}" class="w-full h-full object-cover" />
                    </div>
                    <div class="flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start gap-2">
                                <h4 class="font-medium text-sm text-liva-dark leading-tight">${name}</h4>
                                <button type="button" onclick="window.livaApp.removeFromCart('${itemKey}')" class="text-liva-muted hover:text-rose-600 transition-colors p-1 cursor-pointer" title="${t.remove}">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                            <div class="text-xs text-liva-muted mt-0.5">${itemSize}</div>
                            ${details ? `<div class="text-[10px] text-liva-olive font-medium line-clamp-1 mt-0.5">🌿 ${details}</div>` : ''}
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

    // Checkout Flow methods
    openCheckoutModal() {
        const modal = document.getElementById('checkout-modal');
        const backdrop = document.getElementById('checkout-backdrop');
        if (!modal || !backdrop) return;

        // Ensure cart drawer is closed
        this.toggleCart(false);

        // Reset views
        const formView = document.getElementById('checkout-form-view');
        const successView = document.getElementById('checkout-success-view');
        if (formView) formView.classList.remove('hidden');
        if (successView) successView.classList.add('hidden');

        this.selectedPaymentMethod = 'cod';
        this.selectedBank = 'aba';
        this.selectPaymentMethod('cod');

        this.renderCheckoutSummary();

        backdrop.classList.remove('hidden');
        modal.classList.remove('hidden');

        setTimeout(() => {
            backdrop.classList.add('opacity-100');
            modal.classList.remove('opacity-0', 'scale-95');
            modal.classList.add('opacity-100', 'scale-100');
        }, 10);

        document.body.classList.add('overflow-hidden');
    }

    closeCheckoutModal() {
        const modal = document.getElementById('checkout-modal');
        const backdrop = document.getElementById('checkout-backdrop');
        if (!modal || !backdrop) return;

        backdrop.classList.remove('opacity-100');
        modal.classList.remove('opacity-100', 'scale-100');
        modal.classList.add('opacity-0', 'scale-95');

        setTimeout(() => {
            backdrop.classList.add('hidden');
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }, 300);
    }

    selectPaymentMethod(type) {
        this.selectedPaymentMethod = type;
        const subpanel = document.getElementById('bank-payment-subpanel');
        if (subpanel) {
            if (type === 'bank') {
                subpanel.classList.remove('hidden');
                this.switchBankChoice(this.selectedBank || 'aba');
            } else {
                subpanel.classList.add('hidden');
            }
        }
    }

    switchBankChoice(bank) {
        this.selectedBank = bank;

        const tabs = {
            aba: document.getElementById('bank-tab-aba'),
            acleda: document.getElementById('bank-tab-acleda'),
            wing: document.getElementById('bank-tab-wing')
        };

        Object.keys(tabs).forEach((k) => {
            const btn = tabs[k];
            if (!btn) return;
            if (k === bank) {
                btn.className = 'bank-choice-btn p-3 rounded-2xl border-2 border-liva-olive bg-white flex flex-col items-center justify-center text-center shadow-md transition-all cursor-pointer ring-2 ring-liva-olive/20';
            } else {
                btn.className = 'bank-choice-btn p-3 rounded-2xl border-2 border-liva-border hover:border-liva-olive bg-white flex flex-col items-center justify-center text-center shadow-xs transition-all cursor-pointer opacity-80 hover:opacity-100';
            }
        });

        const bankData = {
            aba: {
                name: 'LIVA BOTANICAL SKINCARE CO., LTD.',
                num: '001 829 344 (USD)',
                label: 'ABA BANK',
                logo: getBasePath() + '/img/payments/aba.png'
            },
            acleda: {
                name: 'LIVA BOTANICAL CO.',
                num: '0100-298374-12 (USD)',
                label: 'ACLEDA BANK',
                logo: getBasePath() + '/img/payments/acleda.png'
            },
            wing: {
                name: 'LIVA SKINCARE',
                num: '0389 4412 (USD)',
                label: 'WING BANK',
                logo: getBasePath() + '/img/payments/wing.jpg'
            }
        };

        const current = bankData[bank] || bankData.aba;
        const nameEl = document.getElementById('active-bank-account-name');
        const numEl = document.getElementById('active-bank-account-num');
        const labelEl = document.getElementById('active-qr-bank-label');
        const logoEl = document.getElementById('active-qr-bank-logo');

        if (nameEl) nameEl.textContent = current.name;
        if (numEl) numEl.textContent = current.num;
        if (labelEl) labelEl.textContent = current.label;
        if (logoEl) logoEl.src = current.logo;
    }

    copyBankAccount() {
        const numEl = document.getElementById('active-bank-account-num');
        if (numEl) {
            const num = numEl.textContent.trim();
            navigator.clipboard.writeText(num).then(() => {
                const isKm = this.currentLang === 'km';
                this.showToast(isKm ? `បានចម្លងលេខគណនី៖ ${num}` : `Copied Account No: ${num}`);
            });
        }
    }

    handleSlipUpload(input) {
        const label = document.getElementById('slip-upload-label');
        if (input.files && input.files[0] && label) {
            label.textContent = `✓ Attached: ${input.files[0].name.substring(0, 18)}...`;
            label.classList.add('text-emerald-700', 'font-semibold');
        }
    }

    renderCheckoutSummary() {
        const listContainer = document.getElementById('checkout-items-list');
        const subtotalEl = document.getElementById('checkout-subtotal-val');
        const shippingEl = document.getElementById('checkout-shipping-val');
        const totalEl = document.getElementById('checkout-total-val');
        const totalKhrEl = document.getElementById('checkout-total-khr');
        const qrAmountEl = document.getElementById('active-qr-amount');
        if (!listContainer) return;

        const isKm = this.currentLang === 'km';
        const subtotal = this.cart.reduce((sum, item) => {
            const product = this.products.find((p) => p.id === item.id);
            const price = item.price !== undefined ? item.price : (product ? product.price : 0);
            return sum + price * item.qty;
        }, 0);

        const shipping = subtotal >= 50.0 || subtotal === 0 ? 0 : 2.0;
        const total = subtotal + shipping;
        const totalKhr = Math.round(total * 4100);

        if (subtotalEl) subtotalEl.textContent = `$${subtotal.toFixed(2)}`;
        if (shippingEl) shippingEl.textContent = shipping === 0 ? (isKm ? 'ឥតគិតថ្លៃ' : 'FREE') : `$${shipping.toFixed(2)}`;
        if (totalEl) totalEl.textContent = `$${total.toFixed(2)}`;
        if (totalKhrEl) totalKhrEl.textContent = `≈ ${totalKhr.toLocaleString()} KHR`;
        if (qrAmountEl) qrAmountEl.textContent = `$${total.toFixed(2)}`;

        if (this.cart.length === 0) {
            listContainer.innerHTML = `<div class="py-6 text-center text-xs text-liva-muted">${isKm ? 'កន្ត្រករបស់អ្នកទទេ' : 'Your shopping bag is empty'}</div>`;
            return;
        }

        const t = translations[this.currentLang] || translations.en;

        listContainer.innerHTML = this.cart.map((item) => {
            let name, image, itemSize, unitPrice, details;
            const itemKey = item.cartKey || item.id;

            if (item.isCustomSet) {
                name = isKm ? item.nameKm : item.nameEn;
                image = item.image;
                itemSize = isKm ? item.sizeKm : item.sizeEn;
                unitPrice = item.price;
                details = isKm ? item.detailsKm : item.detailsEn;
            } else {
                const product = this.products.find((p) => p.id === item.id);
                if (!product) return '';
                name = isKm ? product.nameKm : product.nameEn;
                image = product.image;
                itemSize = item.size || product.size;
                unitPrice = item.price !== undefined ? item.price : product.price;
                details = null;
            }

            return `
            <div class="py-3 border-b border-liva-border/60 last:border-b-0 space-y-2">
                <div class="flex items-start gap-3">
                    <!-- Thumbnail -->
                    <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-xl bg-[#FAF8F5] border border-liva-border/70 overflow-hidden shrink-0">
                        <img src="${image}" alt="${name}" class="w-full h-full object-cover" />
                    </div>

                    <!-- Info & Controls -->
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-1">
                            <h4 class="font-medium text-xs sm:text-sm text-liva-dark truncate pr-1">${name}</h4>
                            <!-- Remove Button -->
                            <button type="button" 
                                    onclick="window.livaApp.removeFromCart('${itemKey}')" 
                                    class="text-liva-muted hover:text-rose-600 transition-colors p-0.5 -mt-0.5 cursor-pointer" 
                                    title="${t.remove || 'Remove'}">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                        <div class="text-[11px] text-liva-muted mt-0.5">${itemSize} · $${unitPrice.toFixed(2)}</div>
                        ${details ? `<div class="text-[10px] text-liva-olive font-medium line-clamp-1 mt-0.5">🌿 ${details}</div>` : ''}

                        <!-- Stepper and Line Price -->
                        <div class="flex items-center justify-between mt-2 pt-1">
                            <!-- + - Stepper -->
                            <div class="flex items-center border border-liva-border rounded-lg bg-white overflow-hidden shadow-2xs">
                                <button type="button" 
                                        onclick="window.livaApp.updateCartQty('${itemKey}', -1)" 
                                        class="w-6 h-6 sm:w-7 sm:h-7 flex items-center justify-center text-liva-charcoal hover:bg-liva-stone text-xs font-bold transition-colors cursor-pointer"
                                        aria-label="Decrease quantity">
                                    -
                                </button>
                                <span class="w-7 sm:w-8 text-center text-xs font-semibold text-liva-dark">
                                    ${item.qty}
                                </span>
                                <button type="button" 
                                        onclick="window.livaApp.updateCartQty('${itemKey}', 1)" 
                                        class="w-6 h-6 sm:w-7 sm:h-7 flex items-center justify-center text-liva-charcoal hover:bg-liva-stone text-xs font-bold transition-colors cursor-pointer"
                                        aria-label="Increase quantity">
                                    +
                                </button>
                            </div>

                            <!-- Total line price -->
                            <div class="font-bold text-xs sm:text-sm text-liva-dark">
                                $${(unitPrice * item.qty).toFixed(2)}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
        }).join('');
    }

    confirmPlaceOrder() {
        if (this.cart.length === 0) {
            const isKm = this.currentLang === 'km';
            this.showToast(isKm ? 'សូមដាក់ទំនិញចូលកន្ត្រកជាមុនសិន' : 'Please add items to your shopping bag first.');
            return;
        }

        const nameInput = document.getElementById('checkout-name');
        const phoneInput = document.getElementById('checkout-phone');
        const addressInput = document.getElementById('checkout-address');

        const name = nameInput ? nameInput.value.trim() : '';
        const phone = phoneInput ? phoneInput.value.trim() : '';
        const address = addressInput ? addressInput.value.trim() : '';

        if (!name || !phone || !address) {
            const isKm = this.currentLang === 'km';
            this.showToast(isKm ? 'សូមបំពេញឈ្មោះ លេខទូរស័ព្ទ និងអាសយដ្ឋាន!' : 'Please enter your Name, Phone Number, and Delivery Address!');
            if (!name && nameInput) nameInput.focus();
            else if (!phone && phoneInput) phoneInput.focus();
            else if (!address && addressInput) addressInput.focus();
            return;
        }

        // Subtotal & Total
        const subtotal = this.cart.reduce((sum, item) => {
            const product = this.products.find((p) => p.id === item.id);
            const price = item.price !== undefined ? item.price : (product ? product.price : 0);
            return sum + price * item.qty;
        }, 0);
        const shipping = subtotal >= 50.0 || subtotal === 0 ? 0 : 2.0;
        const total = subtotal + shipping;

        // Payment method display label
        let paymentLabel = 'Cash on Delivery (COD)';
        if (this.selectedPaymentMethod === 'bank') {
            const bankNames = { aba: 'ABA Bank KHQR', acleda: 'ACLEDA Bank Transfer', wing: 'Wing Bank KHQR' };
            paymentLabel = `Cash on Bank: ${bankNames[this.selectedBank] || 'Bank Transfer'}`;
        }

        const orderId = `#LIVA-2026-${Math.floor(1000 + Math.random() * 9000)}`;

        // Populate Success Card
        const orderIdEl = document.getElementById('success-order-id');
        const custNameEl = document.getElementById('success-customer-name');
        const custPhoneEl = document.getElementById('success-customer-phone');
        const methodEl = document.getElementById('success-payment-method');
        const totalEl = document.getElementById('success-total-amount');

        if (orderIdEl) orderIdEl.textContent = orderId;
        if (custNameEl) custNameEl.textContent = name;
        if (custPhoneEl) custPhoneEl.textContent = phone;
        if (methodEl) methodEl.textContent = paymentLabel;
        if (totalEl) totalEl.textContent = `$${total.toFixed(2)}`;

        // Switch to success view
        const formView = document.getElementById('checkout-form-view');
        const successView = document.getElementById('checkout-success-view');
        if (formView) formView.classList.add('hidden');
        if (successView) successView.classList.remove('hidden');

        // Clear cart
        this.cart = [];
        this.saveCart();

        const isKm = this.currentLang === 'km';
        this.showToast(isKm ? `ការបញ្ជាទិញ ${orderId} ទទួលបានជោគជ័យ! 🎉` : `Order ${orderId} placed successfully! 🎉`);
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

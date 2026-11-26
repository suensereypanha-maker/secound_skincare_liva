@php
    $isKm = app()->getLocale() === 'km';
    $pageTitle = ($isKm ? 'ផលិតផលទាំងអស់' : 'All Botanical Products') . ' | LIVA Botanical Skincare';
@endphp

<x-layouts.app :title="$pageTitle">
    <!-- Breadcrumbs Navigation -->
    <div class="bg-white/60 border-b border-liva-border/60 py-3.5 px-4 sm:px-6 lg:px-8 text-xs text-liva-muted">
        <div class="max-w-7xl mx-auto flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-liva-dark transition-colors" data-i18n="navHome">{{ __('skincare.nav_home') }}</a>
            <span>/</span>
            <span class="text-liva-dark font-medium" data-i18n="navAllProducts">{{ __('skincare.nav_all_products') }}</span>
        </div>
    </div>

    <!-- All Products Catalog Page -->
    <section class="py-8 sm:py-10 md:py-14 bg-[#FAF7F2] min-h-[70vh]">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 space-y-6 sm:space-y-8">

            <!-- Page Header -->
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4 sm:gap-6 pb-5 sm:pb-6 border-b border-liva-border/80">
                <div class="space-y-1.5 sm:space-y-2 max-w-2xl">
                    <div class="inline-flex items-center gap-2 text-[10px] font-bold tracking-widest uppercase text-liva-olive">
                        <span class="w-1.5 h-1.5 rounded-full bg-liva-olive"></span>
                        <span data-i18n="allProductsTag">{{ __('skincare.all_products_tag') ?? 'COMPLETE CATALOG' }}</span>
                        <span class="text-liva-muted">·</span>
                        <span id="catalog-product-count" class="text-liva-muted font-semibold">
                            {{ $isKm ? count($products) . ' មុខទំនិញ' : count($products) . ' Products' }}
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-4xl lg:text-5xl font-serif font-bold text-liva-dark tracking-tight" data-i18n="allProductsTitle">
                        {{ $isKm ? 'ផលិតផលទាំងអស់' : 'All Botanical Products' }}
                    </h1>
                    <p class="text-xs sm:text-sm text-liva-muted leading-relaxed" data-i18n="allProductsSubtitle">
                        {{ $isKm ? 'ស្វែងយល់ពីរូបមន្តថែរក្សាស្បែក សក់ និងដងខ្លួនធម្មជាតិទាំងអស់របស់ LIVA។' : 'Explore our complete range of certified organic formulations for body, hair, and daily rituals.' }}
                    </p>
                </div>

                <!-- Search Input -->
                <div class="relative w-full lg:w-72 shrink-0">
                    <input type="text"
                           id="catalog-search-input"
                           value="{{ $initialQuery }}"
                           oninput="window.livaCatalogPage?.handleSearch(this.value)"
                           placeholder="{{ $isKm ? 'ស្វែងរកផលិតផល...' : 'Search products...' }}"
                           data-i18n-placeholder="searchModalPlaceholder"
                           class="w-full pl-10 pr-9 py-2.5 rounded-full bg-white border border-liva-border text-xs sm:text-sm text-liva-dark placeholder-liva-muted focus:outline-hidden focus:border-liva-olive transition-all shadow-2xs">
                    <svg class="w-4 h-4 text-liva-muted absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <button type="button"
                            id="catalog-search-clear"
                            onclick="window.livaCatalogPage?.clearSearch()"
                            class="{{ $initialQuery ? '' : 'hidden' }} absolute right-3 top-1/2 -translate-y-1/2 text-liva-muted hover:text-liva-dark p-0.5 cursor-pointer"
                            title="Clear search">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Filter & Sort Bar -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-3 sm:gap-4">
                <!-- Type & Collection Tabs -->
                <div class="flex flex-wrap items-center gap-1.5 sm:gap-2" id="catalog-filter-tabs">
                    <button type="button"
                            data-catalog-filter="all"
                            onclick="window.livaCatalogPage?.setFilter('all')"
                            class="catalog-filter-btn px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-[11px] sm:text-xs font-semibold transition-all cursor-pointer bg-liva-dark text-white shadow-xs">
                        <span data-i18n="filterAll">{{ $isKm ? 'ទាំងអស់' : 'All' }}</span> ({{ count($products) }})
                    </button>
                    <button type="button"
                            data-catalog-filter="single"
                            onclick="window.livaCatalogPage?.setFilter('single')"
                            class="catalog-filter-btn px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-[11px] sm:text-xs font-medium transition-all cursor-pointer bg-white border border-liva-border text-liva-charcoal hover:border-liva-olive">
                        <span data-i18n="navSingleProduct">{{ $isKm ? 'ផលិតផលទោល' : 'Single Products' }}</span>
                    </button>
                    <button type="button"
                            data-catalog-filter="sets"
                            onclick="window.livaCatalogPage?.setFilter('sets')"
                            class="catalog-filter-btn px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-[11px] sm:text-xs font-medium transition-all cursor-pointer bg-white border border-liva-border text-liva-charcoal hover:border-liva-olive">
                        <span data-i18n="navSetProduct">{{ $isKm ? 'ផលិតផលជាឈុត (២+)' : 'Set Products (2+)' }}</span>
                    </button>
                    <button type="button"
                            data-catalog-filter="new-arrivals"
                            onclick="window.livaCatalogPage?.setFilter('new-arrivals')"
                            class="catalog-filter-btn px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-[11px] sm:text-xs font-medium transition-all cursor-pointer bg-white border border-liva-border text-liva-charcoal hover:border-liva-olive">
                        <span data-i18n="titleNewArrivals">{{ __('skincare.title_new_arrivals') }}</span>
                    </button>
                    <button type="button"
                            data-catalog-filter="promotions"
                            onclick="window.livaCatalogPage?.setFilter('promotions')"
                            class="catalog-filter-btn px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-[11px] sm:text-xs font-medium transition-all cursor-pointer bg-white border border-liva-border text-liva-charcoal hover:border-liva-olive">
                        <span data-i18n="titlePromotions">{{ __('skincare.title_promotions') }}</span>
                    </button>
                </div>

                <!-- Category & Sort Controls -->
                <div class="grid grid-cols-2 sm:flex items-center gap-2 sm:gap-2.5 shrink-0">
                    <select id="catalog-category-select"
                            onchange="window.livaCatalogPage?.setCategory(this.value)"
                            aria-label="Filter by category"
                            class="px-3 sm:px-4 py-2 rounded-full bg-white border border-liva-border text-[11px] sm:text-xs font-semibold text-liva-dark focus:outline-hidden focus:border-liva-olive cursor-pointer shadow-2xs">
                        <option value="all" {{ $initialCategory === 'all' ? 'selected' : '' }}>{{ $isKm ? 'ប្រភេទ៖ ទាំងអស់' : 'Category: All' }}</option>
                        <option value="body" {{ $initialCategory === 'body' ? 'selected' : '' }}>{{ $isKm ? 'ដងខ្លួន (Body Care)' : 'Body Care' }}</option>
                        <option value="hair" {{ $initialCategory === 'hair' ? 'selected' : '' }}>{{ $isKm ? 'សរសៃសក់ (Hair Care)' : 'Hair Care' }}</option>
                        <option value="sets" {{ $initialCategory === 'sets' ? 'selected' : '' }}>{{ $isKm ? 'ឈុតពិសេស (Ritual Sets)' : 'Ritual Sets' }}</option>
                    </select>

                    <select id="catalog-sort-select"
                            onchange="window.livaCatalogPage?.setSort(this.value)"
                            aria-label="Sort products"
                            class="px-3 sm:px-4 py-2 rounded-full bg-white border border-liva-border text-[11px] sm:text-xs font-semibold text-liva-dark focus:outline-hidden focus:border-liva-olive cursor-pointer shadow-2xs">
                        <option value="featured">{{ $isKm ? 'តម្រៀប៖ ណែនាំ' : 'Sort: Featured' }}</option>
                        <option value="price-asc">{{ $isKm ? 'តម្លៃ៖ ទាបទៅខ្ពស់' : 'Price: Low to High' }}</option>
                        <option value="price-desc">{{ $isKm ? 'តម្លៃ៖ ខ្ពស់ទៅទាប' : 'Price: High to Low' }}</option>
                        <option value="rating">{{ $isKm ? 'ការវាយតម្លៃខ្ពស់បំផុត' : 'Top Rated' }}</option>
                    </select>
                </div>
            </div>

            <!-- 2-Column Mobile / 3-Column Tablet / 4-Column Desktop Product Grid (Rendered in Blade) -->
            <div id="catalog-products-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-5 lg:gap-6">
                @foreach($products as $product)
                    <x-product-card :product="$product" :isSlider="false" />
                @endforeach
            </div>

            <!-- Empty Search / Filter State -->
            <div id="catalog-empty-state" class="hidden py-16 text-center space-y-3 bg-white rounded-3xl border border-liva-border/80">
                <div class="w-14 h-14 mx-auto rounded-full bg-liva-stone flex items-center justify-center text-liva-muted">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <h4 class="text-base font-serif font-bold text-liva-dark" data-i18n="noProductsFound">
                    {{ $isKm ? 'រកមិនឃើញផលិតផលដែលត្រូវនឹងការស្វែងរករបស់អ្នកទេ' : 'No products found matching your search' }}
                </h4>
                <p class="text-xs text-liva-muted">
                    {{ $isKm ? 'សូមសាកល្បងពាក្យគន្លឹះផ្សេងទៀត ឬសម្អាតតម្រង។' : 'Try checking for typos or clearing your active filters.' }}
                </p>
                <button type="button"
                        onclick="window.livaCatalogPage?.resetAll()"
                        class="inline-flex px-5 py-2.5 rounded-full bg-liva-dark text-white text-xs font-semibold hover:bg-liva-olive transition-colors cursor-pointer">
                    {{ $isKm ? 'បង្ហាញផលិតផលទាំងអស់' : 'Reset Filters' }}
                </button>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const grid = document.getElementById('catalog-products-grid');
            const initialCards = grid ? Array.from(grid.querySelectorAll('.product-slide-card')) : [];

            const state = {
                filter: urlParams.get('filter') || @json($initialFilter),
                category: urlParams.get('category') || @json($initialCategory),
                query: (urlParams.get('q') ?? @json($initialQuery)).trim(),
                sort: urlParams.get('sort') || 'featured',
            };

            const catalogPage = {
                init() {
                    const searchInput = document.getElementById('catalog-search-input');
                    if (searchInput && state.query) {
                        searchInput.value = state.query;
                    }
                    if (urlParams.get('focus') === 'search' && searchInput) {
                        searchInput.focus();
                    }

                    const catSelect = document.getElementById('catalog-category-select');
                    if (catSelect && ['all', 'body', 'hair', 'sets'].includes(state.category)) {
                        catSelect.value = state.category;
                    }

                    this.updateTabStyles();
                    this.applyFilterAndSort();
                },

                setFilter(filter) {
                    state.filter = filter;
                    if (filter === 'all' || filter === 'single') {
                        state.category = 'all';
                        const catSelect = document.getElementById('catalog-category-select');
                        if (catSelect) catSelect.value = 'all';
                    } else if (filter === 'sets') {
                        state.category = 'sets';
                        const catSelect = document.getElementById('catalog-category-select');
                        if (catSelect) catSelect.value = 'sets';
                    }
                    this.updateTabStyles();
                    this.applyFilterAndSort();
                },

                setCategory(category) {
                    state.category = category;
                    if (category !== 'all') {
                        state.filter = category === 'sets' ? 'sets' : 'all';
                    }
                    this.updateTabStyles();
                    this.applyFilterAndSort();
                },

                setSort(sort) {
                    state.sort = sort;
                    this.applyFilterAndSort();
                },

                handleSearch(query) {
                    state.query = (query || '').trim();
                    const clearBtn = document.getElementById('catalog-search-clear');
                    if (clearBtn) {
                        clearBtn.classList.toggle('hidden', state.query.length === 0);
                    }
                    this.applyFilterAndSort();
                },

                clearSearch() {
                    const input = document.getElementById('catalog-search-input');
                    if (input) input.value = '';
                    this.handleSearch('');
                },

                resetAll() {
                    state.filter = 'all';
                    state.category = 'all';
                    state.query = '';
                    state.sort = 'featured';
                    const input = document.getElementById('catalog-search-input');
                    if (input) input.value = '';
                    const clearBtn = document.getElementById('catalog-search-clear');
                    if (clearBtn) clearBtn.classList.add('hidden');
                    const catSelect = document.getElementById('catalog-category-select');
                    if (catSelect) catSelect.value = 'all';
                    const sortSelect = document.getElementById('catalog-sort-select');
                    if (sortSelect) sortSelect.value = 'featured';
                    this.updateTabStyles();
                    this.applyFilterAndSort();
                },

                updateTabStyles() {
                    document.querySelectorAll('.catalog-filter-btn').forEach((btn) => {
                        const target = btn.getAttribute('data-catalog-filter');
                        const isActive = target === state.filter && state.category !== 'body' && state.category !== 'hair';
                        if (isActive) {
                            btn.className = 'catalog-filter-btn px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-[11px] sm:text-xs font-semibold transition-all cursor-pointer bg-liva-dark text-white shadow-xs';
                        } else {
                            btn.className = 'catalog-filter-btn px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-[11px] sm:text-xs font-medium transition-all cursor-pointer bg-white border border-liva-border text-liva-charcoal hover:border-liva-olive';
                        }
                    });
                },

                applyFilterAndSort() {
                    if (!grid) return;
                    const q = state.query.toLowerCase();

                    const visibleCards = [];
                    initialCards.forEach((card) => {
                        const cat = card.dataset.category || '';
                        const collections = (card.dataset.collections || '').split(',').filter(Boolean);
                        const searchText = card.dataset.searchText || '';

                        let matches = true;
                        if (state.filter === 'single') {
                            matches = cat !== 'sets';
                        } else if (state.filter === 'sets') {
                            matches = cat === 'sets';
                        } else if (['new-arrivals', 'promotions', 'top-products'].includes(state.filter)) {
                            matches = collections.includes(state.filter);
                        }

                        if (matches && state.category && state.category !== 'all') {
                            matches = cat === state.category;
                        }

                        if (matches && q) {
                            matches = searchText.includes(q);
                        }

                        card.classList.toggle('hidden', !matches);
                        if (matches) {
                            visibleCards.push(card);
                        }
                    });

                    // Sort existing Blade card nodes cleanly in place
                    const sorted = [...initialCards];
                    if (state.sort === 'price-asc') {
                        sorted.sort((a, b) => parseFloat(a.dataset.price || '0') - parseFloat(b.dataset.price || '0'));
                    } else if (state.sort === 'price-desc') {
                        sorted.sort((a, b) => parseFloat(b.dataset.price || '0') - parseFloat(a.dataset.price || '0'));
                    } else if (state.sort === 'rating') {
                        sorted.sort((a, b) => parseFloat(b.dataset.rating || '0') - parseFloat(a.dataset.rating || '0'));
                    }
                    sorted.forEach((card) => grid.appendChild(card));

                    const emptyState = document.getElementById('catalog-empty-state');
                    const countEl = document.getElementById('catalog-product-count');
                    const isKm = window.livaApp ? window.livaApp.currentLang === 'km' : {{ $isKm ? 'true' : 'false' }};

                    if (countEl) {
                        countEl.textContent = isKm ? `${visibleCards.length} មុខទំនិញ` : `${visibleCards.length} Products`;
                    }
                    if (emptyState) {
                        emptyState.classList.toggle('hidden', visibleCards.length > 0);
                    }
                }
            };

            window.livaCatalogPage = catalogPage;
            catalogPage.init();

            if (window.livaApp) {
                const origApplyLanguage = window.livaApp.applyLanguage.bind(window.livaApp);
                window.livaApp.applyLanguage = function(lang, notify) {
                    origApplyLanguage(lang, notify);
                    catalogPage.applyFilterAndSort();
                };
            }
        });
    </script>
</x-layouts.app>

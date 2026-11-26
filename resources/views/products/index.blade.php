@php
    $isKm = app()->getLocale() === 'km';
    $pageTitle = ($isKm ? 'ផលិតផលទាំងអស់' : 'All Botanical Products') . ' | LIVA Botanical Skincare';
@endphp

<x-layouts.app :title="$pageTitle">
    <!-- Breadcrumbs Navigation -->
    <div class="bg-white/60 border-b border-liva-border/60 py-3.5 px-4 sm:px-6 lg:px-8 text-xs text-liva-muted">
        <div class="max-w-7xl mx-auto flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-liva-dark transition-colors"
                data-i18n="navHome">{{ __('skincare.nav_home') }}</a>
            <span>/</span>
            <span class="text-liva-dark font-medium"
                data-i18n="navAllProducts">{{ __('skincare.nav_all_products') }}</span>
        </div>
    </div>

    <!-- All Products Catalog Page -->
    <section class="py-8 sm:py-10 md:py-14 bg-[#FAF7F2] min-h-[70vh]">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 space-y-6 sm:space-y-8">

            <!-- Page Header -->
            <div
                class="flex flex-col lg:flex-row lg:items-end justify-between gap-4 sm:gap-6 pb-5 sm:pb-6 border-b border-liva-border/80">
                <div class="space-y-1.5 sm:space-y-2 max-w-2xl">
                    <div
                        class="inline-flex items-center gap-2 text-[10px] font-bold tracking-widest uppercase text-liva-olive">
                        <span class="w-1.5 h-1.5 rounded-full bg-liva-olive"></span>
                        <span
                            data-i18n="allProductsTag">{{ __('skincare.all_products_tag') ?? 'COMPLETE CATALOG' }}</span>
                        <span class="text-liva-muted">·</span>
                        <span id="catalog-product-count" class="text-liva-muted font-semibold">
                            {{ $isKm ? count($products) . ' មុខទំនិញ' : count($products) . ' Products' }}
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-4xl lg:text-5xl font-serif font-bold text-liva-dark tracking-tight"
                        data-i18n="allProductsTitle">
                        {{ $isKm ? 'ផលិតផលទាំងអស់' : 'All Botanical Products' }}
                    </h1>
                    <p class="text-xs sm:text-sm text-liva-muted leading-relaxed" data-i18n="allProductsSubtitle">
                        {{ $isKm ? 'ស្វែងយល់ពីរូបមន្តថែរក្សាស្បែក សក់ និងដងខ្លួនធម្មជាតិទាំងអស់របស់ LIVA។' : 'Explore our complete range of certified organic formulations for body, hair, and daily rituals.' }}
                    </p>
                </div>

                <!-- Search Input -->
                <div class="relative w-full lg:w-72 shrink-0">
                    <input type="text" id="catalog-search-input" value="{{ $initialQuery }}"
                        oninput="window.livaCatalogPage?.handleSearch(this.value)"
                        placeholder="{{ $isKm ? 'ស្វែងរកផលិតផល...' : 'Search products...' }}"
                        data-i18n-placeholder="searchModalPlaceholder"
                        class="w-full pl-10 pr-9 py-2.5 rounded-full bg-white border border-liva-border text-xs sm:text-sm text-liva-dark placeholder-liva-muted focus:outline-hidden focus:border-liva-olive transition-all shadow-2xs">
                    <svg class="w-4 h-4 text-liva-muted absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <button type="button" id="catalog-search-clear" onclick="window.livaCatalogPage?.clearSearch()"
                        class="{{ $initialQuery ? '' : 'hidden' }} absolute right-3 top-1/2 -translate-y-1/2 text-liva-muted hover:text-liva-dark p-0.5 cursor-pointer"
                        title="Clear search">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Filter & Sort Bar -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-3 sm:gap-4">


                <!-- Category & Sort Controls -->
                @php
                    $categoryOptions = [
                        'all' => $isKm ? 'ប្រភេទ៖ ទាំងអស់' : 'Category: All',
                        'body' => $isKm ? 'ដងខ្លួន (Body Care)' : 'Body Care',
                        'hair' => $isKm ? 'សរសៃសក់ (Hair Care)' : 'Hair Care',
                        'sets' => $isKm ? 'ឈុតពិសេស (Ritual Sets)' : 'Ritual Sets',
                    ];
                    $sortOptions = [
                        'featured' => $isKm ? 'តម្រៀប៖ ណែនាំ' : 'Sort: Featured',
                        'price-asc' => $isKm ? 'តម្លៃ៖ ទាបទៅខ្ពស់' : 'Price: Low to High',
                        'price-desc' => $isKm ? 'តម្លៃ៖ ខ្ពស់ទៅទាប' : 'Price: High to Low',
                        'rating' => $isKm ? 'ការវាយតម្លៃខ្ពស់បំផុត' : 'Top Rated',
                    ];
                    $activeCategoryLabel = $categoryOptions[$initialCategory] ?? $categoryOptions['all'];
                @endphp
                <div class="grid grid-cols-2 sm:flex items-center gap-2 sm:gap-2.5 shrink-0">
                    <!-- Custom Category Dropdown -->
                    <div class="relative catalog-dropdown" id="catalog-category-dropdown">
                        <button type="button" onclick="window.livaCatalogPage?.toggleDropdown('category')"
                            aria-haspopup="listbox" aria-expanded="false" aria-label="Filter by category"
                            class="w-full sm:w-auto inline-flex items-center justify-between gap-2 px-3.5 sm:px-4 py-2 rounded-full bg-white border border-liva-border hover:border-liva-olive text-[11px] sm:text-xs font-semibold text-liva-dark focus:outline-hidden cursor-pointer shadow-2xs transition-all">
                            <span id="catalog-category-label" class="truncate">{{ $activeCategoryLabel }}</span>
                            <svg class="catalog-dropdown-chevron w-3.5 h-3.5 text-liva-muted shrink-0 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="catalog-category-menu" role="listbox"
                            class="hidden absolute left-0 sm:left-auto sm:right-0 mt-2 w-full min-w-[185px] bg-white rounded-2xl border border-liva-border/90 shadow-xl py-1.5 z-40">
                            @foreach ($categoryOptions as $val => $label)
                                <button type="button" role="option" data-dropdown-group="category"
                                    data-value="{{ $val }}" data-label="{{ $label }}"
                                    onclick="window.livaCatalogPage?.selectCategory('{{ $val }}')"
                                    class="catalog-dropdown-option w-full px-3.5 py-2 text-left text-[11px] sm:text-xs flex items-center justify-between gap-2 transition-colors cursor-pointer {{ $initialCategory === $val ? 'bg-liva-olive/10 text-liva-olive font-semibold' : 'text-liva-charcoal hover:bg-[#FAF7F2] hover:text-liva-dark font-medium' }}">
                                    <span class="truncate">{{ $label }}</span>
                                    <svg class="catalog-option-check w-3.5 h-3.5 text-liva-olive shrink-0 {{ $initialCategory === $val ? '' : 'hidden' }}"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Custom Sort Dropdown -->
                    <div class="relative catalog-dropdown" id="catalog-sort-dropdown">
                        <button type="button" onclick="window.livaCatalogPage?.toggleDropdown('sort')"
                            aria-haspopup="listbox" aria-expanded="false" aria-label="Sort products"
                            class="w-full sm:w-auto inline-flex items-center justify-between gap-2 px-3.5 sm:px-4 py-2 rounded-full bg-white border border-liva-border hover:border-liva-olive text-[11px] sm:text-xs font-semibold text-liva-dark focus:outline-hidden cursor-pointer shadow-2xs transition-all">
                            <span id="catalog-sort-label" class="truncate">{{ $sortOptions['featured'] }}</span>
                            <svg class="catalog-dropdown-chevron w-3.5 h-3.5 text-liva-muted shrink-0 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="catalog-sort-menu" role="listbox"
                            class="hidden absolute right-0 mt-2 w-full min-w-[190px] bg-white rounded-2xl border border-liva-border/90 shadow-xl py-1.5 z-40">
                            @foreach ($sortOptions as $val => $label)
                                <button type="button" role="option" data-dropdown-group="sort"
                                    data-value="{{ $val }}" data-label="{{ $label }}"
                                    onclick="window.livaCatalogPage?.selectSort('{{ $val }}')"
                                    class="catalog-dropdown-option w-full px-3.5 py-2 text-left text-[11px] sm:text-xs flex items-center justify-between gap-2 transition-colors cursor-pointer {{ $val === 'featured' ? 'bg-liva-olive/10 text-liva-olive font-semibold' : 'text-liva-charcoal hover:bg-[#FAF7F2] hover:text-liva-dark font-medium' }}">
                                    <span class="truncate">{{ $label }}</span>
                                    <svg class="catalog-option-check w-3.5 h-3.5 text-liva-olive shrink-0 {{ $val === 'featured' ? '' : 'hidden' }}"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2-Column Mobile / 3-Column Tablet / 4-Column Desktop Product Grid (Rendered in Blade) -->
            <div id="catalog-products-grid"
                class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-5 lg:gap-6">
                @foreach ($products as $product)
                    <x-product-card :product="$product" :isSlider="false" />
                @endforeach
            </div>

            <!-- Empty Search / Filter State -->
            <div id="catalog-empty-state"
                class="hidden py-16 text-center space-y-3 bg-white rounded-3xl border border-liva-border/80">
                <div
                    class="w-14 h-14 mx-auto rounded-full bg-liva-stone flex items-center justify-center text-liva-muted">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h4 class="text-base font-serif font-bold text-liva-dark" data-i18n="noProductsFound">
                    {{ $isKm ? 'រកមិនឃើញផលិតផលដែលត្រូវនឹងការស្វែងរករបស់អ្នកទេ' : 'No products found matching your search' }}
                </h4>
                <p class="text-xs text-liva-muted">
                    {{ $isKm ? 'សូមសាកល្បងពាក្យគន្លឹះផ្សេងទៀត ឬសម្អាតតម្រង។' : 'Try checking for typos or clearing your active filters.' }}
                </p>
                <button type="button" onclick="window.livaCatalogPage?.resetAll()"
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

                    if (!['all', 'body', 'hair', 'sets'].includes(state.category)) {
                        state.category = 'all';
                    }
                    if (!['featured', 'price-asc', 'price-desc', 'rating'].includes(state.sort)) {
                        state.sort = 'featured';
                    }

                    this.syncDropdownUI('category', state.category);
                    this.syncDropdownUI('sort', state.sort);
                    this.updateTabStyles();
                    this.applyFilterAndSort();

                    document.addEventListener('click', (e) => {
                        if (!e.target.closest('.catalog-dropdown')) {
                            this.closeAllDropdowns();
                        }
                    });
                    document.addEventListener('keydown', (e) => {
                        if (e.key === 'Escape') {
                            this.closeAllDropdowns();
                        }
                    });
                },

                toggleDropdown(group) {
                    const menu = document.getElementById(`catalog-${group}-menu`);
                    const wrapper = document.getElementById(`catalog-${group}-dropdown`);
                    if (!menu || !wrapper) return;
                    const isHidden = menu.classList.contains('hidden');
                    this.closeAllDropdowns();
                    if (isHidden) {
                        menu.classList.remove('hidden');
                        wrapper.querySelector('button[aria-haspopup]')?.setAttribute('aria-expanded', 'true');
                        wrapper.querySelector('.catalog-dropdown-chevron')?.classList.add('rotate-180');
                    }
                },

                closeAllDropdowns() {
                    ['category', 'sort'].forEach((group) => {
                        const menu = document.getElementById(`catalog-${group}-menu`);
                        const wrapper = document.getElementById(`catalog-${group}-dropdown`);
                        menu?.classList.add('hidden');
                        wrapper?.querySelector('button[aria-haspopup]')?.setAttribute('aria-expanded',
                            'false');
                        wrapper?.querySelector('.catalog-dropdown-chevron')?.classList.remove(
                            'rotate-180');
                    });
                },

                syncDropdownUI(group, value) {
                    const labelEl = document.getElementById(`catalog-${group}-label`);
                    document.querySelectorAll(`[data-dropdown-group="${group}"]`).forEach((opt) => {
                        const isSelected = opt.getAttribute('data-value') === value;
                        const check = opt.querySelector('.catalog-option-check');
                        if (isSelected) {
                            if (labelEl) labelEl.textContent = opt.getAttribute('data-label') || '';
                            opt.classList.add('bg-liva-olive/10', 'text-liva-olive', 'font-semibold');
                            opt.classList.remove('text-liva-charcoal', 'hover:bg-[#FAF7F2]',
                                'hover:text-liva-dark', 'font-medium');
                            check?.classList.remove('hidden');
                        } else {
                            opt.classList.remove('bg-liva-olive/10', 'text-liva-olive',
                            'font-semibold');
                            opt.classList.add('text-liva-charcoal', 'hover:bg-[#FAF7F2]',
                                'hover:text-liva-dark', 'font-medium');
                            check?.classList.add('hidden');
                        }
                    });
                },

                selectCategory(category) {
                    this.setCategory(category);
                    this.closeAllDropdowns();
                },

                selectSort(sort) {
                    this.setSort(sort);
                    this.closeAllDropdowns();
                },

                setFilter(filter) {
                    state.filter = filter;
                    if (filter === 'all' || filter === 'single') {
                        state.category = 'all';
                        this.syncDropdownUI('category', 'all');
                    } else if (filter === 'sets') {
                        state.category = 'sets';
                        this.syncDropdownUI('category', 'sets');
                    }
                    this.updateTabStyles();
                    this.applyFilterAndSort();
                },

                setCategory(category) {
                    state.category = category;
                    if (category !== 'all') {
                        state.filter = category === 'sets' ? 'sets' : 'all';
                    }
                    this.syncDropdownUI('category', category);
                    this.updateTabStyles();
                    this.applyFilterAndSort();
                },

                setSort(sort) {
                    state.sort = sort;
                    this.syncDropdownUI('sort', sort);
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
                    this.syncDropdownUI('category', 'all');
                    this.syncDropdownUI('sort', 'featured');
                    this.updateTabStyles();
                    this.applyFilterAndSort();
                },

                updateTabStyles() {
                    document.querySelectorAll('.catalog-filter-btn').forEach((btn) => {
                        const target = btn.getAttribute('data-catalog-filter');
                        const isActive = target === state.filter && state.category !== 'body' && state
                            .category !== 'hair';
                        if (isActive) {
                            btn.className =
                                'catalog-filter-btn px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-[11px] sm:text-xs font-semibold transition-all cursor-pointer bg-liva-dark text-white shadow-xs';
                        } else {
                            btn.className =
                                'catalog-filter-btn px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-[11px] sm:text-xs font-medium transition-all cursor-pointer bg-white border border-liva-border text-liva-charcoal hover:border-liva-olive';
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
                        } else if (['new-arrivals', 'promotions', 'top-products'].includes(state
                            .filter)) {
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
                        sorted.sort((a, b) => parseFloat(a.dataset.price || '0') - parseFloat(b.dataset.price ||
                            '0'));
                    } else if (state.sort === 'price-desc') {
                        sorted.sort((a, b) => parseFloat(b.dataset.price || '0') - parseFloat(a.dataset.price ||
                            '0'));
                    } else if (state.sort === 'rating') {
                        sorted.sort((a, b) => parseFloat(b.dataset.rating || '0') - parseFloat(a.dataset
                            .rating || '0'));
                    }
                    sorted.forEach((card) => grid.appendChild(card));

                    const emptyState = document.getElementById('catalog-empty-state');
                    const countEl = document.getElementById('catalog-product-count');
                    const isKm = window.livaApp ? window.livaApp.currentLang === 'km' :
                        {{ $isKm ? 'true' : 'false' }};

                    if (countEl) {
                        countEl.textContent = isKm ? `${visibleCards.length} មុខទំនិញ` :
                            `${visibleCards.length} Products`;
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

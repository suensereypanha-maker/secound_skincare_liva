<!-- All Products Modal Backdrop -->
<div id="all-products-backdrop" 
     onclick="window.livaApp.closeAllProductsModal()"
     class="fixed inset-0 bg-black/60 backdrop-blur-xs z-50 hidden opacity-0 transition-opacity duration-300"></div>

<!-- All Products Modal Window -->
<div id="all-products-modal" 
     role="dialog"
     aria-modal="true"
     aria-labelledby="modal-catalog-title"
     class="fixed inset-3 sm:inset-6 md:inset-8 lg:inset-10 z-50 bg-[#FAF7F2] rounded-3xl shadow-2xl border border-liva-border flex flex-col overflow-hidden max-w-7xl mx-auto hidden opacity-0 scale-95 transition-all duration-300">
    
    <!-- Modal Header -->
    <div class="px-5 py-4 sm:px-8 sm:py-5 bg-white border-b border-liva-border/80 flex flex-col xl:flex-row xl:items-center justify-between gap-4 shrink-0">
        
        <!-- Left: Tag & Title -->
        <div>
            <div class="inline-flex items-center gap-2 text-[10px] font-bold tracking-widest uppercase text-liva-olive mb-1">
                <span class="w-1.5 h-1.5 rounded-full bg-liva-olive"></span>
                <span data-i18n="allProductsTag">{{ __('skincare.all_products_tag') ?? 'COMPLETE CATALOG' }}</span>
                <span class="text-liva-muted">·</span>
                <span id="modal-product-count" class="text-liva-muted font-semibold">10 Products</span>
            </div>
            <h2 id="modal-catalog-title" class="text-xl sm:text-2xl font-serif font-bold text-liva-dark tracking-tight" data-i18n="allProductsTitle">
                {{ __('skincare.all_products_title') ?? 'All Botanical Products' }}
            </h2>
        </div>

        <!-- Right Controls: Search Here + Type Tabs + Category Dropdown + Close Button -->
        <div class="flex items-center gap-2.5 sm:gap-3 flex-wrap">
            
            <!-- Live Search Bar "HERE" in Modal -->
            <div class="relative w-full sm:w-56 md:w-64">
                <input type="text" 
                       id="modal-search-input"
                       oninput="window.livaApp.handleModalSearch(this.value)"
                       placeholder="Search products..."
                       data-i18n-placeholder="searchModalPlaceholder"
                       class="w-full pl-9 pr-8 py-2 rounded-full bg-[#F4EFE6] hover:bg-[#EFEAE0] focus:bg-white border border-liva-border text-xs text-liva-dark placeholder-liva-muted focus:outline-hidden focus:border-liva-olive transition-all shadow-2xs">
                <svg class="w-4 h-4 text-liva-muted absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <button type="button" 
                        id="modal-search-clear"
                        onclick="window.livaApp.clearModalSearch()"
                        class="hidden absolute right-2.5 top-1/2 -translate-y-1/2 text-liva-muted hover:text-liva-dark p-0.5 cursor-pointer"
                        title="Clear search">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Type Tabs: All, Single Products, Set Products (2+) -->
            <div class="inline-flex p-1 bg-[#F4EFE6] rounded-full text-xs font-medium" id="modal-category-filters">
                <button type="button" 
                        onclick="window.livaApp.filterModalProducts('all', this)"
                        class="modal-filter-btn px-3.5 py-1.5 rounded-full bg-liva-dark text-white font-semibold shadow-xs transition-all cursor-pointer"
                        data-i18n="filterAll">
                    All (10)
                </button>
                <button type="button" 
                        onclick="window.livaApp.filterModalProducts('single', this)"
                        class="modal-filter-btn px-3.5 py-1.5 rounded-full text-liva-charcoal hover:text-liva-dark transition-all cursor-pointer"
                        data-i18n="navSingleProduct">
                    Single Products (6)
                </button>
                <button type="button" 
                        onclick="window.livaApp.filterModalProducts('sets', this)"
                        class="modal-filter-btn px-3.5 py-1.5 rounded-full text-liva-charcoal hover:text-liva-dark transition-all cursor-pointer"
                        data-i18n="navSetProduct">
                    Set Products (2+) (4)
                </button>
            </div>

            <!-- Category Dropdown (Replacing loose Body Care & Hair Care buttons) -->
            <div class="relative inline-block text-left" id="modal-category-dropdown">
                <button type="button" 
                        id="modal-category-dropdown-btn"
                        onclick="window.livaApp.toggleModalCategoryDropdown()"
                        class="px-3.5 py-2 rounded-full bg-[#F4EFE6] hover:bg-liva-stone text-liva-charcoal hover:text-liva-dark text-xs font-semibold border border-liva-border flex items-center gap-2 transition-all cursor-pointer">
                    <span id="modal-category-dropdown-label">Category: All</span>
                    <svg class="w-3.5 h-3.5 text-liva-muted transition-transform" id="modal-category-dropdown-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="modal-category-dropdown-menu" 
                     class="hidden absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-liva-border py-1.5 z-40">
                    <button type="button" 
                            onclick="window.livaApp.filterModalByCategory('all', 'Category: All')"
                            class="w-full text-left px-4 py-2.5 text-xs text-liva-dark hover:bg-liva-stone/70 flex items-center justify-between font-medium cursor-pointer">
                        <span>All Categories</span>
                        <span class="text-[10px] text-liva-muted font-bold">10</span>
                    </button>
                    <button type="button" 
                            onclick="window.livaApp.filterModalByCategory('body', 'Body Care')"
                            class="w-full text-left px-4 py-2.5 text-xs text-liva-dark hover:bg-liva-stone/70 flex items-center justify-between font-medium cursor-pointer">
                        <span>Body Care</span>
                        <span class="text-[10px] text-liva-muted font-bold">3</span>
                    </button>
                    <button type="button" 
                            onclick="window.livaApp.filterModalByCategory('hair', 'Hair Care')"
                            class="w-full text-left px-4 py-2.5 text-xs text-liva-dark hover:bg-liva-stone/70 flex items-center justify-between font-medium cursor-pointer">
                        <span>Hair Care</span>
                        <span class="text-[10px] text-liva-muted font-bold">3</span>
                    </button>
                    <button type="button" 
                            onclick="window.livaApp.filterModalByCategory('sets', 'Ritual Sets')"
                            class="w-full text-left px-4 py-2.5 text-xs text-liva-dark hover:bg-liva-stone/70 flex items-center justify-between font-medium cursor-pointer">
                        <span>Ritual Sets</span>
                        <span class="text-[10px] text-liva-muted font-bold">4</span>
                    </button>
                </div>
            </div>

            <!-- Close Button (X) -->
            <button type="button" 
                    onclick="window.livaApp.closeAllProductsModal()"
                    class="w-10 h-10 rounded-full bg-[#F4EFE6] hover:bg-liva-olive hover:text-white text-liva-charcoal flex items-center justify-center transition-all duration-200 active:scale-95 shrink-0 cursor-pointer"
                    aria-label="Close All Products Modal">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    <!-- Scrollable Grid Container -->
    <div class="flex-1 overflow-y-auto p-5 sm:p-8">
        <div id="modal-all-products-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Populated dynamically by window.livaApp -->
        </div>

        <!-- Empty search results message -->
        <div id="modal-empty-search" class="hidden py-16 text-center space-y-3">
            <div class="w-14 h-14 mx-auto rounded-full bg-liva-stone flex items-center justify-center text-liva-muted">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <h4 class="text-base font-serif font-bold text-liva-dark" data-i18n="noProductsFound">No products found matching your search</h4>
            <p class="text-xs text-liva-muted">Try checking for typos or searching for a different botanical extract.</p>
            <button type="button" onclick="window.livaApp.clearModalSearch()" class="inline-flex px-4 py-2 rounded-full bg-liva-dark text-white text-xs font-semibold hover:bg-liva-olive transition-colors cursor-pointer">
                Clear Search
            </button>
        </div>
    </div>
</div>

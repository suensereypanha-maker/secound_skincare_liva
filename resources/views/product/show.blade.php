<x-layouts.app>
    @php
        $isKm = app()->getLocale() === 'km';
        $name = $isKm ? $product['name_km'] : $product['name_en'];
        $benefit = $isKm ? $product['benefit_km'] : $product['benefit_en'];
        $badge = $isKm ? $product['badge_km'] : $product['badge_en'];
        $howToUse = $isKm ? $product['how_to_use_km'] : $product['how_to_use_en'];
        $benefitsText = $isKm ? $product['benefits_km'] : $product['benefits_en'];
        $ingredientsText = $isKm ? $product['ingredients_km'] : $product['ingredients_en'];
        $returnText = $isKm ? $product['return_policy_km'] : $product['return_policy_en'];
        $isSet = ($product['category'] ?? '') === 'sets';
        $defaultItems = $product['default_items'] ?? ['liva-shampoo', 'liva-conditioner'];
        $initialSize = $product['sizes'][0] ?? ['label' => $product['size'], 'volume' => $product['size'], 'price' => $product['price'], 'stock' => $product['stock']];
        $initialPrice = $initialSize['price'];
        $initialSubPrice = number_format($initialPrice * 0.85, 2);
    @endphp

    <!-- Breadcrumbs Navigation -->
    <div class="bg-white/60 border-b border-liva-border/60 py-3.5 px-4 sm:px-6 lg:px-8 text-xs text-liva-muted">
        <div class="max-w-7xl mx-auto flex items-center gap-2">
            <a href="/" class="hover:text-liva-dark transition-colors" data-i18n="navHome">{{ __('skincare.nav_home') }}</a>
            <span>/</span>
            <a href="/#collection" class="hover:text-liva-dark transition-colors" data-i18n="navProducts">{{ __('skincare.nav_products') }}</a>
            <span>/</span>
            <span class="text-liva-dark font-medium truncate">{{ $name }}</span>
        </div>
    </div>

    <!-- Main Product Detail Section (UX 2-Column Layout) -->
    <section class="py-10 md:py-16 bg-[#FAF8F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
                
                <!-- ============================================== -->
                <!-- LEFT COLUMN: Main Showcase Image + Thumbnails  -->
                <!-- ============================================== -->
                <div class="lg:col-span-6 space-y-4">
                    
                    <!-- Main Large Featured Product Image Box -->
                    <div class="relative w-full aspect-square rounded-3xl overflow-hidden bg-[#F4F1EA] border border-liva-border shadow-md group">
                        <!-- Badge -->
                        <span class="absolute top-4 left-4 z-10 text-[11px] tracking-wider uppercase font-semibold px-3 py-1 rounded-full bg-white/95 text-liva-olive backdrop-blur-md border border-white/80 shadow-xs">
                            {{ $badge }}
                        </span>

                        <!-- Main Image Element -->
                        <img id="main-product-gallery-img" 
                             src="{{ $product['gallery'][0] ?? $product['image'] }}" 
                             alt="{{ $name }}" 
                             class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:scale-104" />
                    </div>

                    <!-- Horizontal Thumbnails Row (5 Clickable Views) -->
                    <div class="grid grid-cols-5 gap-2.5 sm:gap-3">
                        @foreach($product['gallery'] as $index => $thumb)
                        <button type="button" 
                                onclick="switchGalleryImg('{{ $thumb }}', this)"
                                class="gallery-thumb-btn relative aspect-square rounded-xl overflow-hidden bg-[#F4F1EA] border-2 transition-all duration-200 {{ $index === 0 ? 'border-liva-olive ring-2 ring-liva-olive/20' : 'border-liva-border/80 hover:border-liva-sage opacity-80 hover:opacity-100' }}"
                                aria-label="View angle {{ $index + 1 }}">
                            <img src="{{ $thumb }}" alt="Thumbnail {{ $index + 1 }}" class="w-full h-full object-cover object-center" />
                        </button>
                        @endforeach
                    </div>
                </div>


                <!-- ============================================== -->
                <!-- RIGHT COLUMN: Purchase Details & Information   -->
                <!-- ============================================== -->
                <div class="lg:col-span-6 space-y-6">
                    
                    <!-- Header with Title, Category, Rating & FAVORITE Button (at exact position marked in screenshot) -->
                    <div>
                        <!-- Category / Size & Rating Header -->
                        <div class="flex items-center justify-between text-xs mb-2">
                            <span id="detail-header-size" class="text-xs uppercase tracking-wider font-semibold text-liva-muted">
                                {{ ucfirst($product['category']) }} · {{ $initialSize['label'] }}
                            </span>

                            <div class="flex items-center gap-1.5 text-amber-500 text-xs">
                                <span>★★★★★</span>
                                <span class="font-bold text-liva-dark text-xs">{{ $product['rating'] }}</span>
                                <span class="text-liva-muted">({{ $product['reviews_count'] }} {{ __('skincare.reviews') ?? 'reviews' }})</span>
                            </div>
                        </div>

                        <!-- Title + FAVORITE Button Row -->
                        <div class="flex items-start justify-between gap-4">
                            <h1 class="text-3xl sm:text-4xl font-serif font-bold text-liva-dark tracking-tight leading-tight flex-1">
                                {{ $name }}
                            </h1>

                            <!-- Favorite Button (as boxed in screenshot next to title) -->
                            <button type="button" 
                                    id="detail-title-favorite-btn"
                                    onclick="toggleDetailFavorite()" 
                                    class="w-11 h-11 sm:w-12 sm:h-12 rounded-2xl bg-white border border-liva-border/90 flex items-center justify-center shrink-0 shadow-xs hover:shadow-md transition-all duration-300 hover:scale-105 active:scale-95 group text-liva-muted hover:text-rose-500"
                                    title="Add to Wishlist"
                                    aria-label="Add to Wishlist">
                                <svg id="detail-title-favorite-icon" class="w-5 h-5 sm:w-6 sm:h-6 transition-all duration-200 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Benefit Subtitle -->
                        <p class="text-sm text-liva-muted mt-2 leading-relaxed">
                            {{ $benefit }}
                        </p>
                    </div>

                    <!-- Price & Installment Note (Updates based on size) -->
                    <div class="pt-2 border-t border-liva-border/70 flex flex-wrap items-baseline gap-3">
                        <div class="text-3xl font-serif font-bold text-liva-dark">
                            $<span id="active-display-price">{{ number_format($initialPrice, 2) }}</span>
                        </div>
                        <span id="installment-note" class="text-xs text-liva-muted font-normal">
                            or 4 interest-free payments of ${{ number_format($initialPrice / 4, 2) }}
                        </span>
                    </div>

                    <!-- Social Proof Banner -->
                   

                    <!-- Selection and Add to Bag Section (Matching UX Reference) -->
                    <div class="space-y-6 pt-2">
                        
                        @if($isSet)
                        <!-- ============================================================== -->
                        <!-- SET PRODUCT SELECTION: IMG + TITLE + PRICE + MULTIPLE SELECT   -->
                        <!-- ============================================================== -->
                        <div class="space-y-3.5">
                            <!-- Header & Counter -->
                            <div class="flex items-center justify-between text-xs tracking-wider uppercase font-semibold">
                                <div class="flex items-center gap-2">
                                    <span class="text-liva-dark font-bold">{{ $isKm ? 'ជ្រើសរើសមុខទំនិញក្នុងឈុត' : 'CHOOSE SET ITEMS' }}</span>
                                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-amber-100 text-amber-900 font-bold border border-amber-200">
                                        {{ $isKm ? 'ជ្រើសរើសបានច្រើនមុខ (២+)' : 'MULTIPLE CHOICES (2+)' }}
                                    </span>
                                </div>
                                <span id="set-items-count-badge" class="text-xs font-semibold text-emerald-800 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                                    2 Items Selected
                                </span>
                            </div>

                            <p class="text-xs text-liva-muted">
                                {{ $isKm ? '១ ឈុតអាចជ្រើសរើសបានចាប់ពី ២ មុខឡើងទៅ។ ចុចលើរូប ឬប្រអប់ដើម្បីជ្រើសរើស (បញ្ចុះតម្លៃ ១៥% ដោយស្វ័យប្រវត្តិ)៖' : '1 Set can be 2+ items. Select multiple products to customize your set with an automatic 15% discount:' }}
                            </p>

                            <!-- Quick Preset Pills (Duo, Trio, All) -->
                            <div class="flex flex-wrap items-center gap-2 pt-0.5 pb-1">
                                <span class="text-[11px] text-liva-muted font-medium mr-1">{{ $isKm ? 'ឈុតរហ័ស៖' : 'Quick Presets:' }}</span>
                                <button type="button" 
                                        id="preset-btn-duo"
                                        onclick="applySetPreset('duo')"
                                        class="set-preset-btn px-3 py-1 rounded-full text-xs font-semibold border border-liva-dark bg-liva-dark text-white transition-all shadow-2xs hover:scale-102 cursor-pointer">
                                    {{ $isKm ? 'ឈុត ២ មុខ (Duo)' : '2-Piece Duo' }}
                                </button>
                                <button type="button" 
                                        id="preset-btn-trio"
                                        onclick="applySetPreset('trio')"
                                        class="set-preset-btn px-3 py-1 rounded-full text-xs font-medium border border-liva-border bg-white text-liva-charcoal hover:bg-liva-stone/70 transition-all shadow-2xs hover:scale-102 cursor-pointer">
                                    {{ $isKm ? 'ឈុត ៣ មុខ (Trio)' : '3-Piece Trio' }}
                                </button>
                                <button type="button" 
                                        id="preset-btn-all"
                                        onclick="applySetPreset('all')"
                                        class="set-preset-btn px-3 py-1 rounded-full text-xs font-medium border border-liva-border bg-white text-liva-charcoal hover:bg-liva-stone/70 transition-all shadow-2xs hover:scale-102 cursor-pointer">
                                    {{ $isKm ? 'ឈុតទាំងអស់ (៥ មុខ)' : 'All 5 Products' }}
                                </button>
                            </div>

                            <!-- Choice Cards List: Each has img, title, price, and can select multiple -->
                            <div class="space-y-2.5 max-h-[380px] overflow-y-auto pr-1 no-scrollbar" id="set-multi-choice-container">
                                @foreach($availableItems as $item)
                                    @php
                                        $itemTitle = $isKm ? $item['name_km'] : $item['name_en'];
                                        $itemBenefit = $isKm ? $item['benefit_km'] : $item['benefit_en'];
                                        $isPreselected = in_array($item['id'], $defaultItems);
                                    @endphp
                                    <div class="set-choice-card group relative flex items-center gap-3.5 p-3 rounded-2xl border-2 transition-all duration-200 cursor-pointer select-none {{ $isPreselected ? 'border-liva-dark bg-white shadow-sm ring-1 ring-liva-dark/10' : 'border-liva-border/90 bg-white/80 hover:bg-white hover:border-liva-olive/60 shadow-2xs' }}"
                                         id="set-card-{{ $item['id'] }}"
                                         data-id="{{ $item['id'] }}"
                                         data-price="{{ $item['price'] }}"
                                         data-name-en="{{ $item['name_en'] }}"
                                         data-name-km="{{ $item['name_km'] }}"
                                         data-image="{{ $item['image'] }}"
                                         data-size="{{ $item['size'] }}"
                                         onclick="toggleSetItem('{{ $item['id'] }}')">
                                        
                                        <!-- Multi-Select Checkbox (can select multiple) -->
                                        <div class="set-card-checkbox w-6 h-6 rounded-lg border-2 {{ $isPreselected ? 'border-liva-dark bg-liva-dark text-white' : 'border-liva-border bg-white' }} flex items-center justify-center shrink-0 transition-all shadow-2xs group-hover:scale-105">
                                            <svg class="set-card-check-icon w-3.5 h-3.5 text-white {{ $isPreselected ? 'opacity-100' : 'opacity-0' }} transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>

                                        <!-- Image (img) -->
                                        <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-xl bg-[#F7F4EE] p-1.5 shrink-0 border border-liva-border/60 overflow-hidden flex items-center justify-center">
                                            <img src="{{ $item['image'] }}" 
                                                 alt="{{ $itemTitle }}" 
                                                 class="w-full h-full object-contain mix-blend-multiply group-hover:scale-105 transition-transform duration-200" 
                                                 loading="lazy" />
                                        </div>

                                        <!-- Title & Info (title) -->
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center gap-1.5 mb-0.5">
                                                <span class="text-[10px] font-bold text-liva-muted uppercase tracking-wider">{{ $item['size'] }}</span>
                                                <span class="text-[10px] font-semibold text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200">
                                                    Stock: {{ $item['stock'] }}
                                                </span>
                                            </div>
                                            <h4 class="text-xs sm:text-sm font-semibold text-liva-dark truncate group-hover:text-liva-olive transition-colors">
                                                {{ $itemTitle }}
                                            </h4>
                                            <p class="text-[11px] text-liva-muted truncate">
                                                {{ $itemBenefit }}
                                            </p>
                                        </div>

                                        <!-- Price (price) -->
                                        <div class="text-right shrink-0 pl-1">
                                            <div class="text-xs sm:text-sm font-bold text-liva-dark">
                                                ${{ number_format($item['price'], 2) }}
                                            </div>
                                            <span class="set-card-status-label text-[10px] font-semibold {{ $isPreselected ? 'text-emerald-700' : 'text-liva-muted' }} block mt-0.5">
                                                {{ $isPreselected ? '✓ Added' : '+ Select' }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Live Set Bundle Summary & Discount Box -->
                            <div id="set-summary-banner" class="p-3.5 rounded-2xl bg-emerald-50/90 border border-emerald-200 text-xs space-y-1.5 transition-all shadow-2xs">
                                <div class="flex items-center justify-between font-semibold">
                                    <span id="set-summary-status-text" class="text-emerald-950 flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                        <span>2 Products Selected in Set</span>
                                    </span>
                                    <span id="set-summary-discount-badge" class="px-2 py-0.5 rounded-full bg-emerald-200/80 text-emerald-950 text-[10px] font-bold tracking-wide">
                                        15% OFF BUNDLE
                                    </span>
                                </div>
                                <div class="flex items-baseline justify-between text-liva-muted text-[11px] pt-0.5">
                                    <span id="set-summary-items-list" class="truncate max-w-[240px] sm:max-w-xs text-emerald-900/80 font-medium">
                                        ...
                                    </span>
                                    <div class="flex items-center gap-1.5 shrink-0">
                                        <span id="set-summary-original-price" class="line-through text-gray-400 text-xs">$70.00</span>
                                        <span id="set-summary-final-price" class="text-xs sm:text-sm font-bold text-emerald-950">$59.50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <!-- ============================================== -->
                        <!-- SINGLE PRODUCT: SELECT SIZE                    -->
                        <!-- ============================================== -->
                        <div>
                            <div class="flex items-center justify-between text-xs tracking-wider uppercase text-gray-500 font-semibold mb-3">
                                <span>SELECT SIZE</span>
                                <span id="active-size-volume-display" class="font-semibold normal-case text-sm text-liva-dark">{{ $initialSize['volume'] }}</span>
                            </div>

                            <div class="flex flex-wrap items-center gap-2.5 sm:gap-3" id="size-pills-container">
                                @foreach($product['sizes'] as $sIndex => $s)
                                <button type="button" 
                                        onclick="selectProductSize({{ $sIndex }}, {{ $s['price'] }}, {{ $s['stock'] }}, '{{ $s['label'] }}', '{{ $s['volume'] }}', this)"
                                        class="size-pill-btn px-5 py-2.5 rounded-full text-xs sm:text-sm font-medium transition-all duration-200 cursor-pointer {{ $sIndex === 0 ? 'bg-[#1F2522] text-white shadow-sm ring-1 ring-black/10' : 'bg-[#EFECE6] text-liva-dark hover:bg-[#E5E0D8]' }}">
                                    <span>{{ $s['volume'] }}</span>
                                    <span class="text-xs opacity-75 font-normal ml-1.5">· ${{ number_format($s['price'], 2) }}</span>
                                </button>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Quantity & Stepper + Add to Bag Row -->
                        <div>
                            <!-- Quantity Header -->
                            <div class="flex items-center justify-between text-xs text-gray-500 mb-2.5">
                                <div class="flex items-center gap-2">
                                    <span class="font-medium text-gray-500">{{ $isKm ? 'បរិមាណ' : 'Quantity' }}</span>
                                    <span id="detail-stock-pill" class="text-[11px] font-semibold text-emerald-800 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/70">
                                        Stock: {{ $initialSize['stock'] }}
                                    </span>
                                </div>
                                <span class="text-xs text-gray-400 font-medium tracking-wider">USD</span>
                            </div>

                            <!-- Action Row: Stepper and Add to Bag CTA -->
                            <div class="flex items-center gap-3 sm:gap-4">
                                <!-- Stepper Pill: - 1 + -->
                                <div class="flex items-center justify-between rounded-full border border-gray-300 bg-white px-3 py-1.5 w-32 sm:w-36 h-12 shadow-2xs shrink-0">
                                    <button type="button" onclick="changeDetailQty(-1)" class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-liva-dark text-lg font-light transition-colors">−</button>
                                    <span id="detail-qty-val" class="font-medium text-sm text-liva-dark select-none">1</span>
                                    <button type="button" onclick="changeDetailQty(1)" class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-liva-dark text-lg font-light transition-colors">+</button>
                                </div>

                                <!-- Add to Bag Pill Button -->
                                <button type="button" 
                                        id="detail-add-bag-btn"
                                        onclick="addDetailProductToBag()" 
                                        class="flex-1 h-12 rounded-full bg-[#27231F] hover:bg-liva-olive text-white px-6 sm:px-7 flex items-center justify-between shadow-md hover:shadow-lg transition-all duration-200 active:scale-98 group cursor-pointer">
                                    <span id="detail-add-bag-btn-text" class="font-medium text-xs sm:text-sm tracking-wide">
                                        {{ $isSet ? ($isKm ? 'ដាក់ឈុតនេះចូលកន្ត្រក' : 'Add Set to bag') : ($isKm ? 'ដាក់ចូលកន្ត្រក' : 'Add to bag') }}
                                    </span>
                                    <div class="flex items-center gap-2 font-medium text-xs sm:text-sm">
                                        <span id="btn-display-price">${{ number_format($initialPrice, 2) }}</span>
                                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </div>
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- 4 Interactive Information Tabs (from UX Reference Image) -->
                    <div class="pt-2">
                        <!-- Tab Navigation Bar -->
                        <div class="flex border-b border-liva-border gap-6 text-xs sm:text-sm font-medium">
                            <button type="button" onclick="switchDetailTab('how-to-use', this)" class="detail-tab-btn pb-3 border-b-2 border-liva-dark text-liva-dark font-semibold transition-all">How to use</button>
                            <button type="button" onclick="switchDetailTab('benefits', this)" class="detail-tab-btn pb-3 border-b-2 border-transparent text-liva-muted hover:text-liva-dark transition-all">Benefits</button>
                            <button type="button" onclick="switchDetailTab('ingredients', this)" class="detail-tab-btn pb-3 border-b-2 border-transparent text-liva-muted hover:text-liva-dark transition-all">Ingredients</button>
                            <button type="button" onclick="switchDetailTab('returns', this)" class="detail-tab-btn pb-3 border-b-2 border-transparent text-liva-muted hover:text-liva-dark transition-all">Return Policy</button>
                        </div>

                        <!-- Tab Content Panes -->
                        <div class="py-4 text-xs sm:text-sm text-liva-muted leading-relaxed">
                            <div id="tab-pane-how-to-use" class="detail-tab-pane space-y-2">
                                <p>{{ $howToUse }}</p>
                                <p class="text-xs text-liva-muted/80 pt-1">We recommend patch testing before initial application. Store in a cool, dry place away from direct sunlight.</p>
                            </div>
                            <div id="tab-pane-benefits" class="detail-tab-pane hidden space-y-2">
                                <p>{{ $benefitsText }}</p>
                            </div>
                            <div id="tab-pane-ingredients" class="detail-tab-pane hidden space-y-2">
                                <p class="font-mono text-xs text-liva-charcoal leading-relaxed">{{ $ingredientsText }}</p>
                                <p class="text-[11px] text-liva-muted pt-1">100% Vegan · Gluten-Free · Cruelty-Free · Sustainable Glass Bottle.</p>
                            </div>
                            <div id="tab-pane-returns" class="detail-tab-pane hidden space-y-2">
                                <p>{{ $returnText }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- ============================================================== -->
    <!-- SECTION: "You might also like" (Related Products Carousel)      -->
    <!-- ============================================================== -->
    <section class="py-16 md:py-20 bg-white border-t border-liva-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Row Header: Title on Left, Nav Arrows on Right -->
            <div class="flex items-end justify-between mb-8 pb-4 border-b border-liva-border/80">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-serif font-bold text-liva-dark tracking-tight">
                        You might also like
                    </h2>
                    <p class="text-xs sm:text-sm text-liva-muted mt-1">
                        Complementary formulas to complete your everyday botanical ritual.
                    </p>
                </div>

                <!-- Arrows (< and >) -->
                <div class="flex items-center gap-1.5">
                    <button type="button" 
                            onclick="document.getElementById('slider-related-products').scrollBy({left: -320, behavior: 'smooth'})"
                            class="w-9 h-9 rounded-full bg-[#FAF8F5] hover:bg-liva-olive hover:text-white text-liva-charcoal border border-liva-border flex items-center justify-center transition-all shadow-2xs active:scale-95"
                            aria-label="Previous">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button type="button" 
                            onclick="document.getElementById('slider-related-products').scrollBy({left: 320, behavior: 'smooth'})"
                            class="w-9 h-9 rounded-full bg-[#FAF8F5] hover:bg-liva-olive hover:text-white text-liva-charcoal border border-liva-border flex items-center justify-center transition-all shadow-2xs active:scale-95"
                            aria-label="Next">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>

            <!-- 1-Row Related Products Slider Track -->
            <div id="slider-related-products" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory no-scrollbar pb-3">
                @foreach($relatedProducts as $rel)
                @php
                    $relName = $isKm ? $rel['name_km'] : $rel['name_en'];
                @endphp
                <div class="product-slide-card w-[260px] sm:w-[280px] lg:w-[calc(25%-18px)] shrink-0 snap-start luxury-card group rounded-2xl overflow-hidden flex flex-col justify-between bg-white border border-liva-border/80 shadow-xs hover:shadow-xl transition-all duration-300">
                    <a href="/product/{{ $rel['id'] }}" class="relative w-full aspect-[4/5] overflow-hidden bg-[#F4F1EA] block">
                        <img src="{{ $rel['image'] }}" alt="{{ $relName }}" class="product-primary-img w-full h-full object-cover object-center" />
                        @if(!empty($rel['hover_image']))
                        <img src="{{ $rel['hover_image'] }}" alt="{{ $relName }} hover" class="product-hover-img absolute inset-0 w-full h-full object-cover object-center" />
                        @endif
                    </a>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="text-[11px] text-liva-muted mb-1">{{ $rel['size'] }}</div>
                            <a href="/product/{{ $rel['id'] }}" class="font-medium text-sm text-liva-dark hover:text-liva-sage transition-colors line-clamp-1 block">
                                {{ $relName }}
                            </a>
                        </div>
                        <div class="mt-3 pt-2.5 border-t border-liva-border/60 flex items-center justify-between gap-1.5">
                            <span class="text-sm font-bold text-liva-dark">${{ number_format($rel['price'], 2) }}</span>
                            <span class="text-[10px] font-medium text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200">
                                Stock: {{ $rel['stock'] }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- "More products ->" Button -->
            <div class="text-center pt-8">
                <a href="/#collection" class="inline-flex items-center gap-2 px-6 py-2.5 border border-liva-border hover:border-liva-dark text-liva-dark text-xs uppercase font-bold tracking-wider rounded-xl hover:bg-white transition-all shadow-2xs">
                    <span>More products</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

        </div>
    </section>


    <!-- ============================================================== -->
    <!-- SECTION: Sage Green Discount Newsletter Banner (from UX Wireframe) -->
    <!-- ============================================================== -->
    <section class="py-14 md:py-18 bg-[#58735E] text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-white mb-2">
                Subscribe to get 15% off your first order
            </h2>
            <p class="text-xs sm:text-sm text-white/80 max-w-md mx-auto mb-6">
                Receive private invitations to seasonal harvests, bespoke skin rituals, and botanical gifts.
            </p>

            <form onsubmit="event.preventDefault(); window.livaApp.showToast('Thank you for subscribing! Use code LIVA15'); this.reset();" class="max-w-md mx-auto flex gap-2">
                <input type="email" required placeholder="Drop your email here..." class="flex-1 px-5 py-3 rounded-full bg-white text-liva-dark text-xs sm:text-sm outline-none placeholder-liva-muted shadow-inner" />
                <button type="submit" class="w-12 h-12 rounded-full bg-liva-dark text-white flex items-center justify-center hover:bg-liva-gold transition-colors shrink-0 shadow-md" aria-label="Submit email">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </form>
        </div>
    </section>

    <!-- Page Specific Script for Gallery Switcher, Size Selector, Price Base Size & Favorite State -->
    <script>
        const isSetProduct = {{ $isSet ? 'true' : 'false' }};
        const availableItemsData = @json($availableItems);
        const defaultSetItemIds = @json($defaultItems);
        let selectedSetItems = new Set(defaultSetItemIds);

        let currentDetailQty = 1;
        let selectedSizeIndex = 0;
        let currentUnitPrice = {{ $initialPrice }};
        let currentMaxStock = {{ $initialSize['stock'] }};
        let currentSizeLabel = "{{ $initialSize['label'] }}";
        let currentSizeVolume = "{{ $initialSize['volume'] }}";
        let currentMethod = 'one-time';
        const productId = '{{ $product['id'] }}';
        const productNameEn = '{{ addslashes($product['name_en']) }}';
        const productNameKm = '{{ addslashes($product['name_km']) }}';
        const productMainImage = '{{ $product['image'] }}';

        function switchGalleryImg(src, btn) {
            const mainImg = document.getElementById('main-product-gallery-img');
            if (mainImg) {
                mainImg.style.opacity = '0.4';
                setTimeout(() => {
                    mainImg.src = src;
                    mainImg.style.opacity = '1';
                }, 150);
            }

            document.querySelectorAll('.gallery-thumb-btn').forEach(b => {
                b.classList.remove('border-liva-olive', 'ring-2', 'ring-liva-olive/20');
                b.classList.add('border-liva-border/80', 'opacity-80');
            });

            if (btn) {
                btn.classList.add('border-liva-olive', 'ring-2', 'ring-liva-olive/20');
                btn.classList.remove('border-liva-border/80', 'opacity-80');
            }
        }

        function toggleSetItem(id) {
            if (selectedSetItems.has(id)) {
                selectedSetItems.delete(id);
            } else {
                selectedSetItems.add(id);
            }
            updateSetCustomizerUI();
        }

        function applySetPreset(type) {
            if (type === 'duo') {
                selectedSetItems = new Set(defaultSetItemIds.slice(0, 2));
            } else if (type === 'trio') {
                const trioIds = [...defaultSetItemIds];
                availableItemsData.forEach(item => {
                    if (trioIds.length < 3 && !trioIds.includes(item.id)) {
                        trioIds.push(item.id);
                    }
                });
                selectedSetItems = new Set(trioIds.slice(0, 3));
            } else if (type === 'all') {
                selectedSetItems = new Set(availableItemsData.map(p => p.id));
            }

            document.querySelectorAll('.set-preset-btn').forEach(btn => {
                btn.className = 'set-preset-btn px-3 py-1 rounded-full text-xs font-medium border border-liva-border bg-white text-liva-charcoal hover:bg-liva-stone/70 transition-all shadow-2xs hover:scale-102 cursor-pointer';
            });
            const activeBtn = document.getElementById('preset-btn-' + type);
            if (activeBtn) {
                activeBtn.className = 'set-preset-btn px-3 py-1 rounded-full text-xs font-semibold border border-liva-dark bg-liva-dark text-white transition-all shadow-2xs hover:scale-102 cursor-pointer';
            }

            updateSetCustomizerUI();
        }

        function updateSetCustomizerUI() {
            if (!isSetProduct) return;

            const isKm = window.livaApp ? window.livaApp.currentLang === 'km' : {{ $isKm ? 'true' : 'false' }};
            const count = selectedSetItems.size;

            availableItemsData.forEach(item => {
                const card = document.getElementById('set-card-' + item.id);
                if (!card) return;
                const isSelected = selectedSetItems.has(item.id);
                const checkbox = card.querySelector('.set-card-checkbox');
                const checkIcon = card.querySelector('.set-card-check-icon');
                const statusLabel = card.querySelector('.set-card-status-label');

                if (isSelected) {
                    card.className = 'set-choice-card group relative flex items-center gap-3.5 p-3 rounded-2xl border-2 transition-all duration-200 cursor-pointer select-none border-liva-dark bg-white shadow-sm ring-1 ring-liva-dark/10';
                    if (checkbox) {
                        checkbox.className = 'set-card-checkbox w-6 h-6 rounded-lg border-2 border-liva-dark bg-liva-dark text-white flex items-center justify-center shrink-0 transition-all shadow-2xs group-hover:scale-105';
                    }
                    if (checkIcon) {
                        checkIcon.classList.remove('opacity-0');
                        checkIcon.classList.add('opacity-100');
                    }
                    if (statusLabel) {
                        statusLabel.textContent = isKm ? '✓ បានរើស' : '✓ Added';
                        statusLabel.className = 'set-card-status-label text-[10px] font-semibold text-emerald-700 block mt-0.5';
                    }
                } else {
                    card.className = 'set-choice-card group relative flex items-center gap-3.5 p-3 rounded-2xl border-2 transition-all duration-200 cursor-pointer select-none border-liva-border/90 bg-white/80 hover:bg-white hover:border-liva-olive/60 shadow-2xs';
                    if (checkbox) {
                        checkbox.className = 'set-card-checkbox w-6 h-6 rounded-lg border-2 border-liva-border bg-white flex items-center justify-center shrink-0 transition-all shadow-2xs group-hover:scale-105';
                    }
                    if (checkIcon) {
                        checkIcon.classList.remove('opacity-100');
                        checkIcon.classList.add('opacity-0');
                    }
                    if (statusLabel) {
                        statusLabel.textContent = isKm ? '+ ជ្រើសរើស' : '+ Select';
                        statusLabel.className = 'set-card-status-label text-[10px] font-semibold text-liva-muted block mt-0.5';
                    }
                }
            });

            const countBadge = document.getElementById('set-items-count-badge');
            if (countBadge) {
                countBadge.textContent = isKm ? `${count} មុខបានជ្រើសរើស` : `${count} Items Selected`;
            }

            const selectedProducts = availableItemsData.filter(p => selectedSetItems.has(p.id));
            const rawSubtotal = selectedProducts.reduce((sum, p) => sum + p.price, 0);

            const banner = document.getElementById('set-summary-banner');
            const statusText = document.getElementById('set-summary-status-text');
            const discountBadge = document.getElementById('set-summary-discount-badge');
            const itemsListEl = document.getElementById('set-summary-items-list');
            const origPriceEl = document.getElementById('set-summary-original-price');
            const finalPriceEl = document.getElementById('set-summary-final-price');
            const btnText = document.getElementById('detail-add-bag-btn-text');
            const addBtn = document.getElementById('detail-add-bag-btn');

            if (count >= 2) {
                const discountedUnit = Math.round(rawSubtotal * 0.85 * 100) / 100;
                currentUnitPrice = discountedUnit;

                const totalRaw = (rawSubtotal * currentDetailQty).toFixed(2);
                const totalFinal = (currentUnitPrice * currentDetailQty).toFixed(2);

                if (banner) {
                    banner.className = 'p-3.5 rounded-2xl bg-emerald-50/90 border border-emerald-200 text-xs space-y-1.5 transition-all shadow-2xs';
                }
                if (statusText) {
                    statusText.className = 'text-emerald-950 flex items-center gap-1.5';
                    statusText.innerHTML = `<span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span><span>${count} ${isKm ? 'មុខក្នុងឈុត (បញ្ចុះតម្លៃ ១៥%)' : 'Products Selected in Set'}</span>`;
                }
                if (discountBadge) {
                    discountBadge.className = 'px-2 py-0.5 rounded-full bg-emerald-200/80 text-emerald-950 text-[10px] font-bold tracking-wide';
                    discountBadge.textContent = isKm ? 'ចុះតម្លៃ ១៥%' : '15% OFF BUNDLE';
                }
                if (itemsListEl) {
                    const names = selectedProducts.map(p => isKm ? p.name_km : p.name_en).join(' + ');
                    itemsListEl.textContent = names;
                }
                if (origPriceEl) {
                    origPriceEl.textContent = `$${totalRaw}`;
                    origPriceEl.classList.remove('hidden');
                }
                if (finalPriceEl) {
                    finalPriceEl.textContent = `$${totalFinal}`;
                }

                if (btnText) {
                    btnText.textContent = isKm ? `ដាក់ឈុត (${count} មុខ) ចូលកន្ត្រក` : `Add Set (${count} Items) to Bag`;
                }
                if (addBtn) {
                    addBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                }
            } else {
                currentUnitPrice = rawSubtotal;
                const totalFinal = (currentUnitPrice * currentDetailQty).toFixed(2);

                if (banner) {
                    banner.className = 'p-3.5 rounded-2xl bg-amber-50/90 border border-amber-300 text-xs space-y-1.5 transition-all shadow-2xs';
                }
                if (statusText) {
                    statusText.className = 'text-amber-950 flex items-center gap-1.5 font-bold';
                    statusText.innerHTML = `<span class="w-2 h-2 rounded-full bg-amber-500"></span><span>${isKm ? 'សូមជ្រើសរើសយ៉ាងតិច ២ មុខសម្រាប់ឈុតនេះ' : 'Please select at least 2 items (1 Set = 2+ products)'}</span>`;
                }
                if (discountBadge) {
                    discountBadge.className = 'px-2 py-0.5 rounded-full bg-amber-200 text-amber-950 text-[10px] font-bold tracking-wide';
                    discountBadge.textContent = isKm ? 'ជ្រើសរើស ២ មុខឡើងទៅ' : 'SELECT 2+';
                }
                if (itemsListEl) {
                    itemsListEl.textContent = isKm ? '១ ឈុតត្រូវមានផលិតផលចាប់ពី ២ មុខឡើងទៅ' : 'A bundle requires 2 or more products to apply 15% discount.';
                }
                if (origPriceEl) {
                    origPriceEl.classList.add('hidden');
                }
                if (finalPriceEl) {
                    finalPriceEl.textContent = `$${totalFinal}`;
                }

                if (btnText) {
                    btnText.textContent = isKm ? 'សូមជ្រើសរើសចាប់ពី ២ មុខឡើងទៅ' : 'Select at least 2 items';
                }
                if (addBtn) {
                    addBtn.classList.add('opacity-60');
                }
            }

            updateDisplayPrice();
        }

        function selectProductSize(index, price, stock, label, volume, btn) {
            selectedSizeIndex = index;
            currentUnitPrice = price;
            currentMaxStock = stock;
            currentSizeLabel = label;
            currentSizeVolume = volume;

            if (currentDetailQty > currentMaxStock) {
                currentDetailQty = 1;
                const qtyEl = document.getElementById('detail-qty-val');
                if (qtyEl) qtyEl.textContent = '1';
            }

            document.querySelectorAll('.size-pill-btn').forEach(b => {
                b.className = 'size-pill-btn px-6 py-2.5 rounded-full text-xs sm:text-sm font-medium transition-all duration-200 cursor-pointer bg-[#EFECE6] text-liva-dark hover:bg-[#E5E0D8]';
            });
            if (btn) {
                btn.className = 'size-pill-btn px-6 py-2.5 rounded-full text-xs sm:text-sm font-medium transition-all duration-200 cursor-pointer bg-[#1F2522] text-white shadow-sm ring-1 ring-black/10';
            }

            const activeVolDisplay = document.getElementById('active-size-volume-display');
            if (activeVolDisplay) activeVolDisplay.textContent = volume;

            const headerSize = document.getElementById('detail-header-size');
            if (headerSize) headerSize.textContent = '{{ ucfirst($product['category']) }} · ' + volume;

            const stockPill = document.getElementById('detail-stock-pill');
            if (stockPill) {
                stockPill.textContent = 'Stock: ' + stock;
                if (stock <= 5) {
                    stockPill.className = 'text-[11px] font-semibold text-amber-800 bg-amber-50 px-2.5 py-0.5 rounded-full border border-amber-200/70';
                } else {
                    stockPill.className = 'text-[11px] font-semibold text-emerald-800 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200/70';
                }
            }

            updateDisplayPrice();
        }

        function changeDetailQty(delta) {
            currentDetailQty = Math.max(1, Math.min(currentMaxStock, currentDetailQty + delta));
            const el = document.getElementById('detail-qty-val');
            if (el) el.textContent = currentDetailQty;
            if (isSetProduct) {
                updateSetCustomizerUI();
            } else {
                updateDisplayPrice();
            }
        }

        function updateDisplayPrice() {
            const total = (currentUnitPrice * currentDetailQty).toFixed(2);
            
            const el = document.getElementById('active-display-price');
            if (el) el.textContent = total;

            const btnPrice = document.getElementById('btn-display-price');
            if (btnPrice) btnPrice.textContent = '$' + total;

            const instEl = document.getElementById('installment-note');
            if (instEl) instEl.textContent = 'or 4 interest-free payments of $' + (currentUnitPrice * currentDetailQty / 4).toFixed(2);
        }

        function addDetailProductToBag() {
            const isKm = window.livaApp ? window.livaApp.currentLang === 'km' : {{ $isKm ? 'true' : 'false' }};

            if (isSetProduct) {
                if (selectedSetItems.size < 2) {
                    if (window.livaApp) {
                        window.livaApp.showToast(isKm ? 'សូមជ្រើសរើសយ៉ាងតិច ២ មុខសម្រាប់ឈុតនេះ' : 'Please select at least 2 items to complete this set');
                    }
                    return;
                }

                const selectedProducts = availableItemsData.filter(p => selectedSetItems.has(p.id));
                const count = selectedProducts.length;
                const rawTotal = selectedProducts.reduce((sum, p) => sum + p.price, 0);
                const finalUnitPrice = Math.round(rawTotal * 0.85 * 100) / 100;
                const namesEn = selectedProducts.map(p => p.name_en).join(' + ');
                const namesKm = selectedProducts.map(p => p.name_km).join(' + ');
                const sortedIds = Array.from(selectedSetItems).sort().join('-');
                const setKey = `set-${productId}-${sortedIds}`;

                const customSetItem = {
                    id: setKey,
                    cartKey: setKey,
                    isCustomSet: true,
                    nameEn: `${productNameEn} (${count} Items Set)`,
                    nameKm: `${productNameKm} (ឈុត ${count} មុខ)`,
                    sizeEn: `${count} Selected Products (15% Bundle Discount)`,
                    sizeKm: `ជ្រើសរើស ${count} មុខ (បញ្ចុះតម្លៃ ១៥%)`,
                    detailsEn: namesEn,
                    detailsKm: namesKm,
                    image: productMainImage,
                    price: finalUnitPrice,
                    originalPrice: rawTotal,
                    qty: currentDetailQty
                };

                if (window.livaApp) {
                    const existing = window.livaApp.cart.find(i => (i.cartKey ? i.cartKey === setKey : i.id === setKey));
                    if (existing) {
                        existing.qty += currentDetailQty;
                    } else {
                        window.livaApp.cart.push(customSetItem);
                    }
                    window.livaApp.saveCart();
                    window.livaApp.renderCart();
                    window.livaApp.showToast(isKm ? `បានដាក់ ${productNameKm} (${count} មុខ) ចូលកន្ត្រក! 🎉` : `Added ${productNameEn} (${count} items) to bag! 🎉`);
                    window.livaApp.toggleCart(true);
                }
            } else {
                if (window.livaApp) {
                    window.livaApp.addToCart(productId, currentDetailQty, currentSizeVolume, currentUnitPrice);
                }
            }
        }

        function toggleDetailFavorite() {
            if (window.livaApp) {
                window.livaApp.toggleFavorite(productId);
                syncDetailFavoriteState();
            }
        }

        function syncDetailFavoriteState() {
            if (!window.livaApp) return;
            const isFav = window.livaApp.favorites.includes(productId);
            const icon = document.getElementById('detail-title-favorite-icon');
            const btn = document.getElementById('detail-title-favorite-btn');
            if (icon && btn) {
                if (isFav) {
                    icon.classList.add('fill-rose-500', 'text-rose-500');
                    btn.classList.add('border-rose-200', 'bg-rose-50/50');
                } else {
                    icon.classList.remove('fill-rose-500', 'text-rose-500');
                    btn.classList.remove('border-rose-200', 'bg-rose-50/50');
                }
            }
        }

        function switchDetailTab(tabKey, btn) {
            document.querySelectorAll('.detail-tab-btn').forEach(b => {
                b.classList.remove('border-liva-dark', 'text-liva-dark', 'font-semibold');
                b.classList.add('border-transparent', 'text-liva-muted');
            });
            if (btn) {
                btn.classList.add('border-liva-dark', 'text-liva-dark', 'font-semibold');
                btn.classList.remove('border-transparent', 'text-liva-muted');
            }

            document.querySelectorAll('.detail-tab-pane').forEach(p => p.classList.add('hidden'));
            const target = document.getElementById('tab-pane-' + tabKey);
            if (target) target.classList.remove('hidden');
        }

        // Auto-slide for related products slider
        let relatedAutoSlideTimer = null;
        function initRelatedAutoSlide() {
            const relSlider = document.getElementById('slider-related-products');
            if (!relSlider) return;

            function slideRel() {
                const card = relSlider.querySelector('.product-slide-card');
                const scrollAmount = card ? (card.offsetWidth + 24) : 320;
                const maxScroll = relSlider.scrollWidth - relSlider.clientWidth;
                if (relSlider.scrollLeft >= maxScroll - 15) {
                    relSlider.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    relSlider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                }
            }

            function startRelTimer() {
                if (relatedAutoSlideTimer) clearInterval(relatedAutoSlideTimer);
                relatedAutoSlideTimer = setInterval(slideRel, 4000);
            }

            function pauseRelTimer() {
                if (relatedAutoSlideTimer) clearInterval(relatedAutoSlideTimer);
            }

            relSlider.addEventListener('mouseenter', pauseRelTimer);
            relSlider.addEventListener('mouseleave', startRelTimer);
            relSlider.addEventListener('touchstart', pauseRelTimer, { passive: true });
            relSlider.addEventListener('touchend', startRelTimer, { passive: true });

            startRelTimer();
        }

        document.addEventListener('DOMContentLoaded', () => {
            syncDetailFavoriteState();
            initRelatedAutoSlide();
            if (isSetProduct) {
                updateSetCustomizerUI();
            }
        });
    </script>
</x-layouts.app>

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

                    @php
                        $gallery = $product['gallery'] ?? [$product['image']];
                        $galleryCount = count($gallery);
                        $hasMoreThanFour = $galleryCount > 4;
                    @endphp

                    <!-- Horizontal Thumbnails Row (Clean Responsive 4 + 4+ View) -->
                    <div class="grid {{ $hasMoreThanFour ? 'grid-cols-5' : 'grid-cols-' . min(4, $galleryCount) }} gap-2 sm:gap-2.5">
                        @foreach(array_slice($gallery, 0, 4) as $index => $thumb)
                        <button type="button" 
                                onclick="switchGalleryImg('{{ $thumb }}', this, {{ $index }})"
                                class="gallery-thumb-btn relative aspect-square rounded-xl overflow-hidden bg-[#F4F1EA] border-2 transition-all duration-200 cursor-pointer {{ $index === 0 ? 'border-liva-olive ring-2 ring-liva-olive/20 opacity-100' : 'border-liva-border/80 hover:border-liva-sage opacity-80 hover:opacity-100' }}"
                                aria-label="View angle {{ $index + 1 }}">
                            <img src="{{ $thumb }}" alt="Thumbnail {{ $index + 1 }}" class="w-full h-full object-cover object-center" />
                        </button>
                        @endforeach

                        @if($hasMoreThanFour)
                        <!-- 5th Thumbnail with 4+ More Images Overlay -->
                        @php
                            $fifthThumb = $gallery[4];
                            $remainingCount = $galleryCount - 4;
                        @endphp
                        <button type="button" 
                                id="gallery-thumb-more-btn"
                                onclick="handleMoreGalleryClick(this)"
                                class="gallery-thumb-btn group relative aspect-square rounded-xl overflow-hidden bg-[#F4F1EA] border-2 border-liva-border/80 hover:border-liva-dark transition-all duration-200 cursor-pointer opacity-90 hover:opacity-100"
                                aria-label="View more images (4+)">
                            <img id="gallery-thumb-more-img" src="{{ $fifthThumb }}" alt="More gallery photos" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-300" />
                            <div class="absolute inset-0 bg-black/55 backdrop-blur-[1px] group-hover:bg-black/65 transition-colors flex flex-col items-center justify-center text-white">
                                <span id="gallery-thumb-more-badge" class="text-xs sm:text-sm font-bold tracking-wider">4+</span>
                                <span class="text-[8px] sm:text-[9px] uppercase tracking-wider text-white/80 font-medium mt-0.5">
                                    {{ $remainingCount > 1 ? '+' . $remainingCount : ($isKm ? 'រូបភាព' : 'More') }}
                                </span>
                            </div>
                        </button>
                        @endif
                    </div>
                </div>


                <!-- ============================================== -->
                <!-- RIGHT COLUMN: Purchase Details & Information   -->
                <!-- ============================================== -->
                <div class="lg:col-span-6 space-y-6">
                    
                    <!-- Header with Title, Category, Rating & FAVORITE Button (at exact position marked in screenshot) -->
                    <!-- Header with Title, Category, Rating & FAVORITE Button (Luxury Editorial Typography) -->
                    <div class="space-y-3">
                        <!-- Category / Size & Rating Header -->
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <div class="flex items-center gap-2">
                                <span class="px-2.5 py-0.5 rounded-full bg-liva-stone/90 text-liva-dark text-[10px] font-bold uppercase tracking-wider border border-liva-border/80">
                                    {{ ucfirst($product['category']) }}
                                </span>
                                <span id="detail-header-size" class="text-xs font-medium text-liva-muted">
                                    {{ $initialSize['volume'] ?? $initialSize['label'] }}
                                </span>
                            </div>

                            <div class="flex items-center gap-1.5 text-amber-500 text-xs shrink-0">
                                <span>★★★★★</span>
                                <span class="font-bold text-liva-dark text-xs">{{ $product['rating'] }}</span>
                                <span class="text-liva-muted">({{ $product['reviews_count'] }} {{ __('skincare.reviews') ?? 'reviews' }})</span>
                            </div>
                        </div>

                        <!-- Title + FAVORITE Button Row -->
                        <div class="flex items-start justify-between gap-4">
                            <h1 class="text-2xl sm:text-3xl lg:text-[34px] font-serif font-bold text-liva-dark tracking-tight leading-[1.2] flex-1">
                                {{ $name }}
                            </h1>

                            <!-- Favorite Button -->
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
                        <p class="text-xs sm:text-sm text-liva-charcoal/80 leading-relaxed flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-liva-olive/50 shrink-0"></span>
                            <span>{{ $benefit }}</span>
                        </p>
                    </div>

                    <!-- Price & Installment Note (Updates based on size) -->
                    <div class="pt-2 border-t border-liva-border/70 flex flex-wrap items-baseline gap-3">
                        <div class="text-2xl sm:text-3xl font-serif font-bold text-liva-dark">
                            $<span id="active-display-price">{{ number_format($initialPrice, 2) }}</span>
                        </div>
                        <span id="installment-note" class="text-xs text-liva-muted font-normal bg-liva-stone/60 px-2.5 py-1 rounded-full border border-liva-border/60">
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
                        <div class="space-y-3 min-w-0 max-w-full">
                            <!-- Header & Counter & Slide Left/Right Controls -->
                            <div class="flex items-center justify-between text-xs tracking-wider uppercase font-semibold gap-2 pb-0.5">
                                <div class="flex items-center gap-2">
                                    <span class="text-liva-dark font-bold">{{ $isKm ? 'ជ្រើសរើសមុខទំនិញក្នុងឈុត' : 'CHOOSE SET ITEMS' }}</span>
                                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-amber-100 text-amber-900 font-bold border border-amber-200">
                                        {{ $isKm ? 'ជ្រើសរើសបានច្រើនមុខ (២+)' : 'MULTIPLE CHOICES (2+)' }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span id="set-items-count-badge" class="text-xs font-semibold text-emerald-800 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200 whitespace-nowrap">
                                        2 Items Selected
                                    </span>
                                    <!-- Slide Left Right Controls (Always Kept) -->
                                    <div class="flex items-center gap-1">
                                        <button type="button" 
                                                id="set-slider-prev-btn"
                                                onclick="slideSetItems('left')"
                                                class="w-7 h-7 rounded-full bg-white hover:bg-liva-dark hover:text-white text-liva-charcoal border border-liva-border flex items-center justify-center transition-all shadow-2xs active:scale-90 cursor-pointer disabled:opacity-30 disabled:cursor-not-allowed"
                                                title="{{ $isKm ? 'រំកិលទៅឆ្វេង' : 'Slide left' }}"
                                                aria-label="Slide left">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                                        </button>
                                        <button type="button" 
                                                id="set-slider-next-btn"
                                                onclick="slideSetItems('right')"
                                                class="w-7 h-7 rounded-full bg-white hover:bg-liva-dark hover:text-white text-liva-charcoal border border-liva-border flex items-center justify-center transition-all shadow-2xs active:scale-90 cursor-pointer disabled:opacity-30 disabled:cursor-not-allowed"
                                                title="{{ $isKm ? 'រំកិលទៅស្តាំ' : 'Slide right' }}"
                                                aria-label="Slide right">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Choice Cards Horizontal Slider (Card 3 Peeks In to Show More Products) -->
                            <div class="relative group/setslider min-w-0 max-w-full">
                                <div class="flex gap-2.5 overflow-x-auto scroll-smooth snap-x snap-mandatory no-scrollbar pb-2 pt-1 px-0.5 select-none cursor-grab active:cursor-grabbing" 
                                     id="set-multi-choice-container">
                                    @foreach($availableItems as $item)
                                        @php
                                            $itemTitle = $isKm ? $item['name_km'] : $item['name_en'];
                                            $itemBenefit = $isKm ? $item['benefit_km'] : $item['benefit_en'];
                                            $isPreselected = in_array($item['id'], $defaultItems);
                                        @endphp
                                        <div class="set-choice-card product-slide-card luxury-card group rounded-2xl overflow-hidden flex flex-col justify-between bg-white transition-all duration-300 cursor-pointer select-none shrink-0 snap-start w-[calc((100%-12px)/1.35)] sm:w-[calc((100%-20px)/2.35)] min-w-[195px] max-w-[235px] {{ $isPreselected ? 'border-2 border-liva-dark shadow-md ring-2 ring-liva-dark/15' : 'border border-liva-border/80 shadow-xs hover:border-liva-olive/60 hover:shadow-lg' }}"
                                             id="set-card-{{ $item['id'] }}"
                                             data-id="{{ $item['id'] }}"
                                             data-price="{{ $item['price'] }}"
                                             data-name-en="{{ $item['name_en'] }}"
                                             data-name-km="{{ $item['name_km'] }}"
                                             data-image="{{ $item['image'] }}"
                                             data-size="{{ $item['size'] }}"
                                             tabindex="0"
                                             role="checkbox"
                                             aria-checked="{{ $isPreselected ? 'true' : 'false' }}"
                                             onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleSetItem('{{ $item['id'] }}');}"
                                             onclick="toggleSetItem('{{ $item['id'] }}')">
                                            
                                            <!-- FULL Image Showcase Container (Matching Home Page Product Card) -->
                                            <div class="relative w-full aspect-[4/5] overflow-hidden bg-[#F4F1EA] block">
                                                <!-- Primary Product Image -->
                                                <img src="{{ $item['image'] }}" 
                                                     alt="{{ $itemTitle }}" 
                                                     class="product-primary-img w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500" 
                                                     loading="lazy" />

                                                @if(!empty($item['hover_image']))
                                                <!-- Alternate Hover Image -->
                                                <img src="{{ $item['hover_image'] }}" 
                                                     alt="{{ $itemTitle }} hover" 
                                                     class="product-hover-img absolute inset-0 w-full h-full object-cover object-center" 
                                                     loading="lazy" />
                                                @endif

                                                <!-- Top-Left Selection Checkbox -->
                                                <div class="set-card-checkbox absolute top-2.5 left-2.5 z-10 w-6 h-6 rounded-lg border-2 {{ $isPreselected ? 'border-liva-dark bg-liva-dark text-white' : 'border-liva-border/90 bg-white/90 text-transparent' }} flex items-center justify-center transition-all shadow-xs group-hover:scale-105 backdrop-blur-xs">
                                                    <svg class="set-card-check-icon w-3.5 h-3.5 text-white {{ $isPreselected ? 'opacity-100' : 'opacity-0' }} transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>

                                                <!-- Top-Right Selection Status Badge -->
                                                <span class="set-card-status-label absolute top-2.5 right-2.5 z-10 text-[9px] font-semibold px-2 py-0.5 rounded-full transition-all shadow-2xs backdrop-blur-md {{ $isPreselected ? 'bg-emerald-600 text-white border border-emerald-500' : 'bg-white/90 text-liva-charcoal border border-liva-border/80 opacity-0 group-hover:opacity-100' }}">
                                                    {{ $isPreselected ? ($isKm ? '✓ បានរើស' : '✓ Added') : ($isKm ? '+ ជ្រើសរើស' : '+ Select') }}
                                                </span>
                                            </div>

                                            <!-- Card Details (Matching Home Page Product Card) -->
                                            <div class="p-3.5 sm:p-4 flex-1 flex flex-col justify-between bg-white">
                                                <div>
                                                    <div class="text-[11px] text-liva-muted mb-1 truncate">{{ $item['size'] }}</div>
                                                    <h4 class="font-medium text-xs sm:text-sm text-liva-dark group-hover:text-liva-sage transition-colors line-clamp-1 block leading-snug" title="{{ $itemTitle }}">
                                                        {{ $itemTitle }}
                                                    </h4>
                                                </div>

                                                <!-- Price & Stock on 1 Row (Exact match to Home Page Card) -->
                                                <div class="mt-3 pt-2.5 border-t border-liva-border/60 flex items-center justify-between gap-1.5">
                                                    <span class="text-xs sm:text-sm font-bold text-liva-dark">${{ number_format($item['price'], 2) }}</span>
                                                    <span class="text-[10px] font-medium text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200 shrink-0">
                                                        Stock: {{ $item['stock'] }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Floating Arrow Nav for Desktop Slide UX -->
                                <button type="button" 
                                        onclick="slideSetItems('left')" 
                                        id="set-slider-float-prev"
                                        class="hidden md:flex absolute -left-3.5 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white/95 hover:bg-liva-dark hover:text-white text-liva-charcoal border border-liva-border shadow-md items-center justify-center transition-all duration-200 z-10 active:scale-95 disabled:opacity-0 disabled:pointer-events-none opacity-0 group-hover/setslider:opacity-100 cursor-pointer"
                                        aria-label="Slide Left">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                                </button>
                                <button type="button" 
                                        onclick="slideSetItems('right')" 
                                        id="set-slider-float-next"
                                        class="hidden md:flex absolute -right-3.5 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white/95 hover:bg-liva-dark hover:text-white text-liva-charcoal border border-liva-border shadow-md items-center justify-center transition-all duration-200 z-10 active:scale-95 disabled:opacity-0 disabled:pointer-events-none opacity-0 group-hover/setslider:opacity-100 cursor-pointer"
                                        aria-label="Slide Right">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </button>
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
                    $relBenefit = $isKm ? $rel['benefit_km'] : $rel['benefit_en'];
                    $relBadge = $isKm ? $rel['badge_km'] : $rel['badge_en'];
                    $isLowStock = $rel['stock'] <= 8;
                    $hasHover = !empty($rel['hover_image']);
                    $hasOriginal = !empty($rel['original_price']) && $rel['original_price'] > $rel['price'];
                @endphp
                <div class="product-slide-card w-[280px] sm:w-[320px] lg:w-[calc(25%-18px)] shrink-0 snap-start luxury-card group rounded-2xl overflow-hidden flex flex-col justify-between bg-white border border-liva-border/80 shadow-xs hover:shadow-xl transition-all duration-300" data-product-id="{{ $rel['id'] }}">
                    
                    <!-- FULL Image Showcase Container (Clickable -> View Detail) -->
                    <div class="relative w-full aspect-[4/5] overflow-hidden bg-[#F4F1EA]">
                        <a href="/product/{{ $rel['id'] }}" class="absolute inset-0 z-0 block cursor-pointer">
                            <!-- Primary FULL Product Image -->
                            <img src="{{ $rel['image'] }}"
                                 alt="{{ $relName }}"
                                 class="product-primary-img w-full h-full object-cover object-center"
                                 loading="lazy" />

                            @if($hasHover)
                            <!-- Secondary Alternate Image (Shown on Hover) -->
                            <img src="{{ $rel['hover_image'] }}"
                                 alt="{{ $relName }} hover"
                                 class="product-hover-img absolute inset-0 w-full h-full object-cover object-center"
                                 loading="lazy" />
                            @endif
                        </a>

                        <!-- Top-Left Badge -->
                        <span class="absolute top-3 left-3 z-10 text-[10px] tracking-wider uppercase font-semibold px-2.5 py-1 rounded-full bg-white/95 text-liva-olive backdrop-blur-md border border-white/80 shadow-xs pointer-events-none">
                            {{ $relBadge }}
                        </span>

                        <!-- Top-Right Add to Favorite Button (Heart) -->
                        <button type="button"
                                onclick="event.stopPropagation(); event.preventDefault(); window.livaApp.toggleFavorite('{{ $rel['id'] }}')"
                                class="absolute top-3 right-3 z-20 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white/90 backdrop-blur-md flex items-center justify-center shadow-xs border border-white/70 transition-all duration-300 hover:scale-110 active:scale-95 text-liva-muted hover:text-rose-500 cursor-pointer"
                                aria-label="Toggle favorite">
                            <svg class="w-4 h-4 sm:w-4.5 sm:h-4.5 transition-transform duration-200 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>
                            </svg>
                        </button>

                        <!-- Desktop Hover Quick Add to Bag Overlay Button -->
                        <div class="absolute inset-x-3 bottom-3 opacity-0 translate-y-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0 hidden sm:block z-20">
                            <button type="button"
                                    onclick="event.stopPropagation(); event.preventDefault(); window.livaApp.addToCart('{{ $rel['id'] }}')"
                                    class="w-full py-2.5 px-4 bg-liva-dark/95 backdrop-blur-md text-white text-xs tracking-wider uppercase font-semibold rounded-xl hover:bg-liva-olive transition-colors shadow-lg flex items-center justify-center gap-2 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                <span>{{ $isKm ? 'បន្ថែមក្នុងកន្ត្រក' : 'Add to Bag' }}</span>
                            </button>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <!-- Size -->
                            <div class="flex items-center justify-between text-xs mb-1.5">
                                <span class="text-[11px] font-medium text-liva-muted tracking-wide">{{ $rel['size'] }}</span>
                            </div>

                            <!-- Title (Links to View Detail) -->
                            <a href="/product/{{ $rel['id'] }}" class="block group/title">
                                <h3 class="font-medium text-sm sm:text-base text-liva-dark line-clamp-1 group-hover/title:text-liva-sage transition-colors">
                                    {{ $relName }}
                                </h3>
                            </a>

                            <!-- Benefit / Key Ingredients -->
                            <p class="text-xs text-liva-muted mt-1 line-clamp-1">
                                {{ $relBenefit }}
                            </p>
                        </div>

                        <!-- Price & Stock QTY on 1 Row -->
                        <div class="mt-4 pt-3 border-t border-liva-border/60 flex items-center justify-between gap-2">
                            <div class="flex items-baseline gap-1.5 shrink-0">
                                <span class="text-base sm:text-lg font-bold text-liva-dark">
                                    ${{ number_format($rel['price'], 2) }}
                                </span>
                                @if($hasOriginal)
                                <span class="text-xs sm:text-sm text-liva-muted line-through font-normal">
                                    ${{ number_format($rel['original_price'], 2) }}
                                </span>
                                @endif
                            </div>

                            <!-- Stock Badge: Only stock:qty with green/amber dot -->
                            <div class="shrink-0">
                                <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold {{ $isLowStock ? 'text-amber-800 bg-amber-50/95 border-amber-200/90' : 'text-emerald-800 bg-emerald-50/95 border-emerald-200/90' }} border px-2.5 py-1 rounded-full shadow-2xs">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $isLowStock ? 'bg-amber-500 animate-pulse' : 'bg-emerald-500' }}"></span>
                                    <span>Stock: {{ $rel['stock'] }}</span>
                                </span>
                            </div>
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

        let currentGalleryIndex = 0;
        let moreGalleryIndex = 4;
        const productGallery = @json($product['gallery'] ?? [$product['image']]);

        function switchGalleryImg(src, btn, index) {
            if (typeof index === 'number') {
                currentGalleryIndex = index;
            } else {
                const found = productGallery.indexOf(src);
                if (found !== -1) currentGalleryIndex = found;
            }

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

        function handleMoreGalleryClick(btn) {
            if (!productGallery || productGallery.length <= 4) return;
            const targetSrc = productGallery[moreGalleryIndex];
            switchGalleryImg(targetSrc, btn, moreGalleryIndex);

            // If there are more than 5 images, cycle to next on each click
            if (productGallery.length > 5) {
                moreGalleryIndex++;
                if (moreGalleryIndex >= productGallery.length) {
                    moreGalleryIndex = 4;
                }
            }
        }

        let isSetSliderDragging = false;
        let setSliderMoved = false;

        function slideSetItems(direction) {
            const container = document.getElementById('set-multi-choice-container');
            if (!container) return;
            const card = container.querySelector('.set-choice-card');
            const cardWidth = card ? (card.offsetWidth + 10) : 220;
            const scrollDistance = cardWidth * (window.innerWidth < 640 ? 1 : 2);
            container.scrollBy({
                left: direction === 'left' ? -scrollDistance : scrollDistance,
                behavior: 'smooth'
            });
        }

        function updateSetSliderNavButtons() {
            const container = document.getElementById('set-multi-choice-container');
            if (!container) return;
            const isAtStart = container.scrollLeft <= 5;
            const isAtEnd = container.scrollLeft + container.clientWidth >= container.scrollWidth - 5;

            const prevBtn = document.getElementById('set-slider-prev-btn');
            const nextBtn = document.getElementById('set-slider-next-btn');
            const floatPrev = document.getElementById('set-slider-float-prev');
            const floatNext = document.getElementById('set-slider-float-next');

            if (prevBtn) prevBtn.disabled = isAtStart;
            if (nextBtn) nextBtn.disabled = isAtEnd;
            if (floatPrev) floatPrev.disabled = isAtStart;
            if (floatNext) floatNext.disabled = isAtEnd;
        }

        function initSetItemsSlider() {
            const container = document.getElementById('set-multi-choice-container');
            if (!container) return;

            let startX = 0;
            let scrollStart = 0;

            container.addEventListener('mousedown', (e) => {
                isSetSliderDragging = true;
                setSliderMoved = false;
                startX = e.pageX - container.offsetLeft;
                scrollStart = container.scrollLeft;
                container.classList.add('cursor-grabbing');
            });

            window.addEventListener('mouseup', () => {
                if (!isSetSliderDragging) return;
                isSetSliderDragging = false;
                if (container) container.classList.remove('cursor-grabbing');
                setTimeout(() => { setSliderMoved = false; }, 60);
            });

            container.addEventListener('mousemove', (e) => {
                if (!isSetSliderDragging) return;
                const x = e.pageX - container.offsetLeft;
                const walk = (x - startX) * 1.3;
                if (Math.abs(walk) > 5) {
                    setSliderMoved = true;
                }
                container.scrollLeft = scrollStart - walk;
            });

            // Smooth mousewheel horizontal scroll (X Axis)
            container.addEventListener('wheel', (e) => {
                if (Math.abs(e.deltaX) < Math.abs(e.deltaY)) {
                    const canScrollLeft = container.scrollLeft > 0;
                    const canScrollRight = container.scrollLeft + container.clientWidth < container.scrollWidth - 2;
                    if ((e.deltaY > 0 && canScrollRight) || (e.deltaY < 0 && canScrollLeft)) {
                        e.preventDefault();
                        container.scrollLeft += e.deltaY;
                    }
                }
            }, { passive: false });

            container.addEventListener('scroll', updateSetSliderNavButtons, { passive: true });
            updateSetSliderNavButtons();
        }

        function toggleSetItem(id) {
            if (setSliderMoved) {
                return;
            }
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

            const container = document.getElementById('set-multi-choice-container');
            if (container) {
                container.scrollTo({ left: 0, behavior: 'smooth' });
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

                const baseCardClass = 'set-choice-card product-slide-card luxury-card group rounded-2xl overflow-hidden flex flex-col justify-between bg-white transition-all duration-300 cursor-pointer select-none shrink-0 snap-start w-[calc((100%-12px)/1.35)] sm:w-[calc((100%-20px)/2.35)] min-w-[195px] max-w-[235px] ';

                if (isSelected) {
                    card.className = baseCardClass + 'border-2 border-liva-dark shadow-md ring-2 ring-liva-dark/15';
                    card.setAttribute('aria-checked', 'true');
                    if (checkbox) {
                        checkbox.className = 'set-card-checkbox absolute top-2.5 left-2.5 z-10 w-6 h-6 rounded-lg border-2 border-liva-dark bg-liva-dark text-white flex items-center justify-center transition-all shadow-xs group-hover:scale-105 backdrop-blur-xs';
                    }
                    if (checkIcon) {
                        checkIcon.classList.remove('opacity-0');
                        checkIcon.classList.add('opacity-100');
                    }
                    if (statusLabel) {
                        statusLabel.textContent = isKm ? '✓ បានរើស' : '✓ Added';
                        statusLabel.className = 'set-card-status-label absolute top-2.5 right-2.5 z-10 text-[9px] font-semibold px-2 py-0.5 rounded-full transition-all shadow-2xs backdrop-blur-md bg-emerald-600 text-white border border-emerald-500 block';
                    }
                } else {
                    card.className = baseCardClass + 'border border-liva-border/80 shadow-xs hover:border-liva-olive/60 hover:shadow-lg';
                    card.setAttribute('aria-checked', 'false');
                    if (checkbox) {
                        checkbox.className = 'set-card-checkbox absolute top-2.5 left-2.5 z-10 w-6 h-6 rounded-lg border-2 border-liva-border/90 bg-white/90 text-transparent flex items-center justify-center transition-all shadow-xs group-hover:scale-105 backdrop-blur-xs';
                    }
                    if (checkIcon) {
                        checkIcon.classList.remove('opacity-100');
                        checkIcon.classList.add('opacity-0');
                    }
                    if (statusLabel) {
                        statusLabel.textContent = isKm ? '+ ជ្រើសរើស' : '+ Select';
                        statusLabel.className = 'set-card-status-label absolute top-2.5 right-2.5 z-10 text-[9px] font-semibold px-2 py-0.5 rounded-full transition-all shadow-2xs backdrop-blur-md bg-white/90 text-liva-charcoal border border-liva-border/80 opacity-0 group-hover:opacity-100 block';
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

            // Sync favorite hearts on related product cards
            document.querySelectorAll('#slider-related-products [data-product-id]').forEach(card => {
                const pid = card.getAttribute('data-product-id');
                const isCardFav = window.livaApp.favorites.includes(pid);
                const heartBtn = card.querySelector('button[aria-label="Toggle favorite"]');
                const heartSvg = heartBtn ? heartBtn.querySelector('svg') : null;
                if (heartBtn && heartSvg) {
                    if (isCardFav) {
                        heartBtn.className = 'absolute top-3 right-3 z-20 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white backdrop-blur-md flex items-center justify-center shadow-xs border border-white/70 transition-all duration-300 hover:scale-110 active:scale-95 text-rose-500 cursor-pointer';
                        heartSvg.className = 'w-4 h-4 sm:w-4.5 sm:h-4.5 transition-transform duration-200 fill-rose-500 text-rose-500 scale-110';
                    } else {
                        heartBtn.className = 'absolute top-3 right-3 z-20 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white/90 backdrop-blur-md flex items-center justify-center shadow-xs border border-white/70 transition-all duration-300 hover:scale-110 active:scale-95 text-liva-muted hover:text-rose-500 cursor-pointer';
                        heartSvg.className = 'w-4 h-4 sm:w-4.5 sm:h-4.5 transition-transform duration-200 fill-none stroke-current';
                    }
                }
            });
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
                initSetItemsSlider();
                updateSetCustomizerUI();
            }

            // Hook into favorite toggle to keep hearts updated in real time
            if (window.livaApp && !window._favHookInstalled) {
                window._favHookInstalled = true;
                const origToggle = window.livaApp.toggleFavorite.bind(window.livaApp);
                window.livaApp.toggleFavorite = function(pid) {
                    origToggle(pid);
                    syncDetailFavoriteState();
                };
            }
        });
    </script>
</x-layouts.app>

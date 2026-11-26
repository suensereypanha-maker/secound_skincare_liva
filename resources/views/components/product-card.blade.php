@props([
    'product',
    'isPromo' => false,
    'isSlider' => false,
])

@php
    $isKm = app()->getLocale() === 'km';
    $nameEn = $product['name_en'];
    $nameKm = $product['name_km'];
    $benefitEn = $product['benefit_en'];
    $benefitKm = $product['benefit_km'];
    $badgeEn = $isPromo && !empty($product['promo_badge_en']) ? $product['promo_badge_en'] : $product['badge_en'];
    $badgeKm = $isPromo && !empty($product['promo_badge_km']) ? $product['promo_badge_km'] : $product['badge_km'];

    $name = $isKm ? $nameKm : $nameEn;
    $benefit = $isKm ? $benefitKm : $benefitEn;
    $badge = $isKm ? $badgeKm : $badgeEn;

    $isLowStock = ($product['stock'] ?? 0) <= 8;
    $hasHover = !empty($product['hover_image']);
    $isSet = ($product['category'] ?? '') === 'sets';
    $hasOriginal = !empty($product['original_price']) && $product['original_price'] > $product['price'];
    $showPromoBadge = $isPromo || $isSet;

    $widthClass = $isSlider
        ? 'w-[calc(50%-6px)] sm:w-[calc(50%-12px)] md:w-[calc(33.333%-16px)] lg:w-[calc(25%-18px)] shrink-0 snap-start'
        : 'w-full';

    $collections = [];
    if (in_array($product['id'], ['liva-body-lotion', 'liva-hair-mask', 'liva-shower-gel', 'liva-conditioner', 'liva-shampoo'], true)) {
        $collections[] = 'new-arrivals';
    }
    if (in_array($product['id'], ['liva-ritual-duo', 'liva-travel-set', 'liva-body-wash', 'liva-shampoo', 'liva-body-lotion'], true)) {
        $collections[] = 'promotions';
    }
    if (in_array($product['id'], ['liva-ritual-duo', 'liva-shampoo', 'liva-body-lotion', 'liva-travel-set', 'liva-body-wash'], true)) {
        $collections[] = 'top-products';
    }
@endphp

<div class="product-slide-card {{ $widthClass }} luxury-card group rounded-2xl overflow-hidden flex flex-col justify-between bg-white border border-liva-border/80 shadow-xs hover:shadow-xl transition-all duration-300"
     data-product-id="{{ $product['id'] }}"
     data-category="{{ $product['category'] ?? '' }}"
     data-collections="{{ implode(',', $collections) }}"
     data-price="{{ $product['price'] }}"
     data-rating="{{ $product['rating'] ?? 5 }}"
     data-search-text="{{ strtolower($nameEn . ' ' . $nameKm . ' ' . $benefitEn . ' ' . $benefitKm . ' ' . ($product['category'] ?? '') . ' ' . ($product['size'] ?? '')) }}">

    <!-- Image Showcase Container -->
    <div class="relative w-full aspect-[4/5] overflow-hidden bg-[#F4F1EA]">
        <a href="{{ route('product.show', $product['id']) }}" class="absolute inset-0 z-0 block cursor-pointer">
            <img src="{{ $product['image'] }}"
                 alt="{{ $name }}"
                 class="product-primary-img w-full h-full object-cover object-center"
                 loading="lazy" />

            @if($hasHover)
                <img src="{{ $product['hover_image'] }}"
                     alt="{{ $name }} alternate view"
                     class="product-hover-img absolute inset-0 w-full h-full object-cover object-center"
                     loading="lazy" />
            @endif
        </a>

        <!-- Top-Right Favorite Button -->
        <button type="button"
                onclick="event.stopPropagation(); event.preventDefault(); window.livaApp?.toggleFavorite('{{ $product['id'] }}')"
                class="js-favorite-btn absolute top-2 right-2 sm:top-3 sm:right-3 z-20 w-7 h-7 sm:w-9 sm:h-9 rounded-full bg-transparent flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-95 text-liva-muted hover:text-rose-500 cursor-pointer"
                aria-label="Toggle favorite">
            <svg class="js-favorite-icon w-3.5 h-3.5 sm:w-4.5 sm:h-4.5 transition-transform duration-200 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>
            </svg>
        </button>

        <!-- Desktop Hover Quick Add to Bag Overlay Button -->
        <div class="absolute inset-x-3 bottom-3 opacity-0 translate-y-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0 hidden sm:block z-20">
            <button type="button"
                    onclick="event.stopPropagation(); event.preventDefault(); window.livaApp?.addToCart('{{ $product['id'] }}')"
                    class="w-full py-2.5 px-4 bg-liva-dark/95 backdrop-blur-md text-white text-xs tracking-wider uppercase font-semibold rounded-xl hover:bg-liva-olive transition-colors shadow-lg flex items-center justify-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <span data-i18n="addToCart">{{ __('skincare.add_to_cart') }}</span>
            </button>
        </div>
    </div>

    <!-- Product Details -->
    <div class="p-3 sm:p-5 flex-1 flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-between text-xs mb-1 sm:mb-1.5">
                <span class="text-[10px] sm:text-[11px] font-medium text-liva-muted tracking-wide truncate">{{ $product['size'] }}</span>
            </div>

            <a href="{{ route('product.show', $product['id']) }}" class="block group/title">
                <h3 class="js-card-name font-medium text-xs sm:text-base text-liva-dark line-clamp-1 group-hover/title:text-liva-sage transition-colors"
                    data-en="{{ $nameEn }}"
                    data-km="{{ $nameKm }}">
                    {{ $name }}
                </h3>
            </a>

            <p class="js-card-benefit text-[11px] sm:text-xs text-liva-muted mt-0.5 sm:mt-1 line-clamp-1"
               data-en="{{ $benefitEn }}"
               data-km="{{ $benefitKm }}">
                {{ $benefit }}
            </p>
        </div>

        <!-- Price & Stock on 1 Row -->
        <div class="mt-2.5 sm:mt-4 pt-2 sm:pt-3 border-t border-liva-border/60 flex items-center justify-between gap-1.5 sm:gap-2">
            <div class="flex items-baseline gap-1 sm:gap-1.5 shrink-0">
                <span class="text-sm sm:text-lg font-bold text-liva-dark">
                    ${{ number_format($product['price'], 2) }}
                </span>
                @if(($isPromo || $isSet) && $hasOriginal)
                    <span class="text-[10px] sm:text-sm text-liva-muted line-through font-normal">
                        ${{ number_format($product['original_price'], 2) }}
                    </span>
                @endif
            </div>

            <div class="shrink-0">
                <span class="inline-flex items-center gap-1 sm:gap-1.5 text-[10px] sm:text-[11px] font-semibold {{ $isLowStock ? 'text-amber-800 bg-amber-50/95 border-amber-200/90' : 'text-emerald-800 bg-emerald-50/95 border-emerald-200/90' }} border px-1.5 sm:px-2.5 py-0.5 sm:py-1 rounded-full shadow-2xs">
                    <span class="w-1.5 h-1.5 rounded-full {{ $isLowStock ? 'bg-amber-500 animate-pulse' : 'bg-emerald-500' }}"></span>
                    <span>Stock: {{ $product['stock'] }}</span>
                </span>
            </div>
        </div>
    </div>
</div>

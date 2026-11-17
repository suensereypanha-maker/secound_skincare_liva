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
                        
                        <!-- SELECT SIZE Row -->
                        <div>
                            <div class="flex items-center justify-between text-xs tracking-wider uppercase text-gray-500 font-semibold mb-3">
                                <span>SELECT SIZE</span>
                                <span id="active-size-volume-display" class="font-semibold normal-case text-sm text-liva-dark">{{ $initialSize['volume'] }}</span>
                            </div>

                            <!-- Size Pills: 100 mL, 250 mL, 500 mL -->
                            <div class="flex flex-wrap items-center gap-2.5 sm:gap-3" id="size-pills-container">
                                @foreach($product['sizes'] as $sIndex => $s)
                                <button type="button" 
                                        onclick="selectProductSize({{ $sIndex }}, {{ $s['price'] }}, {{ $s['stock'] }}, '{{ $s['label'] }}', '{{ $s['volume'] }}', this)"
                                        class="size-pill-btn px-6 py-2.5 rounded-full text-xs sm:text-sm font-medium transition-all duration-200 cursor-pointer {{ $sIndex === 0 ? 'bg-[#1F2522] text-white shadow-sm ring-1 ring-black/10' : 'bg-[#EFECE6] text-liva-dark hover:bg-[#E5E0D8]' }}">
                                    {{ $s['volume'] }}
                                </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- Quantity & Stepper + Add to Bag Row -->
                        <div>
                            <!-- Quantity Header -->
                            <div class="flex items-center justify-between text-xs text-gray-500 mb-2.5">
                                <div class="flex items-center gap-2">
                                    <span class="font-medium text-gray-500">Quantity</span>
                                    <span id="detail-stock-pill" class="text-[11px] font-semibold text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/70">
                                        • In stock: {{ $initialSize['stock'] }}
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

                                <!-- Add to Bag Pill Button: Add to bag       $20.00 -> -->
                                <button type="button" 
                                        id="detail-add-bag-btn"
                                        onclick="addDetailProductToBag()" 
                                        class="flex-1 h-12 rounded-full bg-[#27231F] hover:bg-liva-olive text-white px-6 sm:px-7 flex items-center justify-between shadow-md hover:shadow-lg transition-all duration-200 active:scale-98 group cursor-pointer">
                                    <span class="font-medium text-xs sm:text-sm tracking-wide">Add to bag</span>
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
                <div class="w-[260px] sm:w-[280px] lg:w-[calc(25%-18px)] shrink-0 snap-start luxury-card group rounded-2xl overflow-hidden flex flex-col justify-between bg-white border border-liva-border/80 shadow-xs hover:shadow-xl transition-all duration-300">
                    <a href="/product/{{ $rel['id'] }}" class="relative w-full aspect-[4/5] overflow-hidden bg-[#F4F1EA] block">
                        <img src="{{ $rel['image'] }}" alt="{{ $relName }}" class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-106" />
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
        let currentDetailQty = 1;
        let selectedSizeIndex = 0;
        let currentUnitPrice = {{ $initialPrice }};
        let currentMaxStock = {{ $initialSize['stock'] }};
        let currentSizeLabel = "{{ $initialSize['label'] }}";
        let currentSizeVolume = "{{ $initialSize['volume'] }}";
        let currentMethod = 'one-time';
        const productId = '{{ $product['id'] }}';

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

        function selectProductSize(index, price, stock, label, volume, btn) {
            selectedSizeIndex = index;
            currentUnitPrice = price;
            currentMaxStock = stock;
            currentSizeLabel = label;
            currentSizeVolume = volume;

            // Reset quantity to 1 if it exceeds stock
            if (currentDetailQty > currentMaxStock) {
                currentDetailQty = 1;
                const qtyEl = document.getElementById('detail-qty-val');
                if (qtyEl) qtyEl.textContent = '1';
            }

            // Update UI pills
            document.querySelectorAll('.size-pill-btn').forEach(b => {
                b.className = 'size-pill-btn px-6 py-2.5 rounded-full text-xs sm:text-sm font-medium transition-all duration-200 cursor-pointer bg-[#EFECE6] text-liva-dark hover:bg-[#E5E0D8]';
            });
            if (btn) {
                btn.className = 'size-pill-btn px-6 py-2.5 rounded-full text-xs sm:text-sm font-medium transition-all duration-200 cursor-pointer bg-[#1F2522] text-white shadow-sm ring-1 ring-black/10';
            }

            // Update size volume label in header (e.g. 250 mL)
            const activeVolDisplay = document.getElementById('active-size-volume-display');
            if (activeVolDisplay) activeVolDisplay.textContent = volume;

            const headerSize = document.getElementById('detail-header-size');
            if (headerSize) headerSize.textContent = '{{ ucfirst($product['category']) }} · ' + volume;

            // Update stock pill
            const stockPill = document.getElementById('detail-stock-pill');
            if (stockPill) {
                stockPill.textContent = '• In stock: ' + stock;
                if (stock <= 5) {
                    stockPill.className = 'text-[11px] font-semibold text-amber-800 bg-amber-50 px-2 py-0.5 rounded-full border border-amber-200/70';
                } else {
                    stockPill.className = 'text-[11px] font-semibold text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/70';
                }
            }

            updateDisplayPrice();
        }

        function changeDetailQty(delta) {
            currentDetailQty = Math.max(1, Math.min(currentMaxStock, currentDetailQty + delta));
            const el = document.getElementById('detail-qty-val');
            if (el) el.textContent = currentDetailQty;
            updateDisplayPrice();
        }

        function updateDisplayPrice() {
            const total = (currentUnitPrice * currentDetailQty).toFixed(2);
            
            // Header main price
            const el = document.getElementById('active-display-price');
            if (el) el.textContent = total;

            // Price inside the "Add to bag" pill button
            const btnPrice = document.getElementById('btn-display-price');
            if (btnPrice) btnPrice.textContent = '$' + total;

            // Installment note
            const instEl = document.getElementById('installment-note');
            if (instEl) instEl.textContent = 'or 4 interest-free payments of $' + (currentUnitPrice * currentDetailQty / 4).toFixed(2);
        }

        function addDetailProductToBag() {
            if (window.livaApp) {
                window.livaApp.addToCart(productId, currentDetailQty, currentSizeVolume, currentUnitPrice);
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

        document.addEventListener('DOMContentLoaded', () => {
            syncDetailFavoriteState();
        });
    </script>
</x-layouts.app>

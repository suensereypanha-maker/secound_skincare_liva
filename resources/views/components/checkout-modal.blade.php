<!-- Checkout Modal Backdrop -->
<div id="checkout-backdrop" 
     onclick="window.livaApp.closeCheckoutModal()"
     class="fixed inset-0 bg-black/60 backdrop-blur-xs z-50 hidden opacity-0 transition-opacity duration-300"></div>

<!-- Checkout Modal Window -->
<div id="checkout-modal" 
     role="dialog"
     aria-modal="true"
     aria-labelledby="checkout-modal-title"
     class="fixed inset-3 sm:inset-6 md:inset-8 lg:inset-10 z-50 bg-[#FAF7F2] rounded-3xl shadow-2xl border border-liva-border flex flex-col overflow-hidden max-w-5xl mx-auto hidden opacity-0 scale-95 transition-all duration-300">
    
    <!-- Modal Header -->
    <div class="px-5 py-4 sm:px-8 sm:py-5 bg-white border-b border-liva-border/80 flex items-center justify-between shrink-0">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-liva-olive/10 text-liva-olive flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            </div>
            <div>
                <h2 id="checkout-modal-title" class="text-lg sm:text-xl font-serif font-bold text-liva-dark tracking-tight" data-i18n="checkoutTitle">
                    Checkout & Secure Payment
                </h2>
                <span class="text-xs text-liva-muted">Certified Organic Botanical Skincare</span>
            </div>
        </div>

        <button type="button" 
                onclick="window.livaApp.closeCheckoutModal()"
                class="w-9 h-9 rounded-full bg-[#F4EFE6] hover:bg-liva-olive hover:text-white text-liva-charcoal flex items-center justify-center transition-all duration-200 active:scale-95 cursor-pointer"
                aria-label="Close Checkout Modal">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <!-- Scrollable Content -->
    <div class="flex-1 overflow-y-auto p-5 sm:p-8">
        
        <!-- Active Checkout Form (Shown before order placement) -->
        <div id="checkout-form-view" class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left Column: Delivery Info & Payment Methods -->
            <div class="lg:col-span-7 space-y-6">
                
                <!-- 1. Customer & Delivery Information -->
                <div class="bg-white p-5 sm:p-6 rounded-2xl border border-liva-border shadow-2xs space-y-4">
                    <div class="flex items-center gap-2 pb-2 border-b border-liva-border/60">
                        <span class="w-6 h-6 rounded-full bg-liva-olive text-white text-xs font-bold flex items-center justify-center">1</span>
                        <h3 class="font-serif font-bold text-base text-liva-dark" data-i18n="deliveryDetails">
                            Delivery Information
                        </h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-liva-charcoal mb-1.5" data-i18n="fullName">
                                Full Name <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" 
                                   id="checkout-name" 
                                   required 
                                   placeholder="e.g. Serey Panha" 
                                   class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-liva-border bg-[#FAF8F5] focus:bg-white focus:outline-hidden focus:ring-2 focus:ring-liva-olive/30 focus:border-liva-olive transition-all">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-liva-charcoal mb-1.5" data-i18n="phoneNumber">
                                Phone Number <span class="text-rose-500">*</span>
                            </label>
                            <input type="tel" 
                                   id="checkout-phone" 
                                   required 
                                   placeholder="e.g. 012 345 678" 
                                   class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-liva-border bg-[#FAF8F5] focus:bg-white focus:outline-hidden focus:ring-2 focus:ring-liva-olive/30 focus:border-liva-olive transition-all">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-liva-charcoal mb-1.5" data-i18n="deliveryCity">
                                City / Province <span class="text-rose-500">*</span>
                            </label>
                            <select id="checkout-city" 
                                    class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-liva-border bg-[#FAF8F5] focus:bg-white focus:outline-hidden focus:ring-2 focus:ring-liva-olive/30 focus:border-liva-olive transition-all">
                                <option value="Phnom Penh">Phnom Penh (រាជធានីភ្នំពេញ)</option>
                                <option value="Kandal">Kandal (ខេត្តកណ្តាល)</option>
                                <option value="Siem Reap">Siem Reap (ខេត្តសៀមរាប)</option>
                                <option value="Battambang">Battambang (ខេត្តបាត់ដំបង)</option>
                                <option value="Sihanoukville">Sihanoukville (ខេត្តព្រះសីហនុ)</option>
                                <option value="Kampot">Kampot (ខេត្តកំពត)</option>
                                <option value="Other Provinces">Other Provinces (ខេត្តផ្សេងៗ)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-liva-charcoal mb-1.5" data-i18n="deliveryAddress">
                                Street Address <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" 
                                   id="checkout-address" 
                                   required 
                                   placeholder="House / Street / Sangkat" 
                                   class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-liva-border bg-[#FAF8F5] focus:bg-white focus:outline-hidden focus:ring-2 focus:ring-liva-olive/30 focus:border-liva-olive transition-all">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-liva-charcoal mb-1.5">
                            Order Notes (Optional)
                        </label>
                        <input type="text" 
                               id="checkout-notes" 
                               placeholder="e.g. Leave package with security guard" 
                               class="w-full px-3.5 py-2 text-sm rounded-xl border border-liva-border bg-[#FAF8F5] focus:bg-white focus:outline-hidden focus:ring-2 focus:ring-liva-olive/30 focus:border-liva-olive transition-all">
                    </div>
                </div>


                <!-- 2. Payment Method Selection (COD & Cash on Bank: ABA, ACLEDA, Wing) -->
                <div class="bg-white p-5 sm:p-6 rounded-2xl border border-liva-border shadow-2xs space-y-4">
                    <div class="flex items-center gap-2 pb-2 border-b border-liva-border/60">
                        <span class="w-6 h-6 rounded-full bg-liva-olive text-white text-xs font-bold flex items-center justify-center">2</span>
                        <h3 class="font-serif font-bold text-base text-liva-dark" data-i18n="paymentMethod">
                            Payment Method
                        </h3>
                    </div>

                    <!-- Payment Type Tabs: COD vs Cash on Bank -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        
                        <!-- Option 1: Cash on Delivery (COD) -->
                        <label class="payment-method-card relative flex items-start gap-3 p-4 rounded-2xl border-2 border-liva-border hover:border-liva-olive bg-[#FAF8F5] cursor-pointer transition-all">
                            <input type="radio" 
                                   name="payment_method_type" 
                                   value="cod" 
                                   checked 
                                   onchange="window.livaApp.selectPaymentMethod('cod')"
                                   class="mt-1 text-liva-olive focus:ring-liva-olive">
                            <div class="flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-sm text-liva-dark" data-i18n="paymentCod">Cash on Delivery</span>
                                    <span class="text-[10px] font-semibold bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full">COD</span>
                                </div>
                                <p class="text-xs text-liva-muted mt-0.5 leading-relaxed" data-i18n="paymentCodDesc">
                                    Pay cash directly to delivery courier upon arrival.
                                </p>
                            </div>
                        </label>

                        <!-- Option 2: Cash on Bank (ABA, ACLEDA, Wing) -->
                        <label class="payment-method-card relative flex items-start gap-3 p-4 rounded-2xl border-2 border-liva-border hover:border-liva-olive bg-[#FAF8F5] cursor-pointer transition-all">
                            <input type="radio" 
                                   name="payment_method_type" 
                                   value="bank" 
                                   onchange="window.livaApp.selectPaymentMethod('bank')"
                                   class="mt-1 text-liva-olive focus:ring-liva-olive">
                            <div class="flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-sm text-liva-dark" data-i18n="paymentBank">Cash on Bank</span>
                                    <span class="text-[10px] font-semibold bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full">KHQR</span>
                                </div>
                                <p class="text-xs text-liva-muted mt-0.5 leading-relaxed" data-i18n="paymentBankDesc">
                                    Scan & pay via ABA, ACLEDA, or Wing Bank.
                                </p>
                            </div>
                        </label>

                    </div>


                    <!-- Bank Selection Sub-panel (Shown when Cash on Bank is selected) -->
                    <div id="bank-payment-subpanel" class="hidden pt-3 border-t border-liva-border/70 space-y-4">
                        <div class="text-xs font-semibold uppercase tracking-wider text-liva-charcoal">
                            Choose Your Bank:
                        </div>

                        <!-- 3 Bank Buttons: ABA, ACLEDA, Wing with Official Uploaded Logos -->
                        <div class="grid grid-cols-3 gap-3">
                            
                            <!-- ABA Bank -->
                            <button type="button" 
                                    id="bank-tab-aba"
                                    onclick="window.livaApp.switchBankChoice('aba')"
                                    class="bank-choice-btn p-3 rounded-2xl border-2 border-liva-olive bg-white flex flex-col items-center justify-center text-center shadow-xs transition-all cursor-pointer">
                                <img src="/img/payments/aba.png" alt="ABA Bank" class="h-9 w-auto object-contain rounded-lg mb-1.5" />
                                <span class="text-xs font-bold text-liva-dark">ABA Bank</span>
                                <span class="text-[10px] text-liva-muted">KHQR Instant</span>
                            </button>

                            <!-- ACLEDA Bank -->
                            <button type="button" 
                                    id="bank-tab-acleda"
                                    onclick="window.livaApp.switchBankChoice('acleda')"
                                    class="bank-choice-btn p-3 rounded-2xl border-2 border-liva-border hover:border-liva-olive bg-white flex flex-col items-center justify-center text-center shadow-xs transition-all cursor-pointer opacity-85 hover:opacity-100">
                                <img src="/img/payments/acleda.png" alt="ACLEDA Bank" class="h-9 w-auto object-contain rounded-lg mb-1.5" />
                                <span class="text-xs font-bold text-liva-dark">ACLEDA</span>
                                <span class="text-[10px] text-liva-muted">អេស៊ីលីដា</span>
                            </button>

                            <!-- Wing Bank -->
                            <button type="button" 
                                    id="bank-tab-wing"
                                    onclick="window.livaApp.switchBankChoice('wing')"
                                    class="bank-choice-btn p-3 rounded-2xl border-2 border-liva-border hover:border-liva-olive bg-white flex flex-col items-center justify-center text-center shadow-xs transition-all cursor-pointer opacity-85 hover:opacity-100">
                                <img src="/img/payments/wing.jpg" alt="Wing Bank" class="h-9 w-auto object-contain rounded-lg mb-1.5" />
                                <span class="text-xs font-bold text-liva-dark">Wing Bank</span>
                                <span class="text-[10px] text-liva-muted">វីង ធនាគារ</span>
                            </button>

                        </div>

                        <!-- Active Bank Details Box -->
                        <div class="p-4 sm:p-5 rounded-2xl bg-[#F6F3EC] border border-liva-border space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <div>
                                    <div class="text-[11px] font-semibold tracking-wider uppercase text-liva-muted">
                                        Account Name
                                    </div>
                                    <div id="active-bank-account-name" class="font-bold text-sm sm:text-base text-liva-dark">
                                        LIVA BOTANICAL SKINCARE
                                    </div>
                                </div>
                                <div>
                                    <div class="text-[11px] font-semibold tracking-wider uppercase text-liva-muted">
                                        Account Number
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span id="active-bank-account-num" class="font-mono font-bold text-base text-liva-dark">
                                            001 829 344
                                        </span>
                                        <button type="button" 
                                                onclick="window.livaApp.copyBankAccount()" 
                                                class="px-2 py-1 text-[11px] font-semibold bg-white hover:bg-liva-olive hover:text-white border border-liva-border rounded-lg shadow-2xs transition-colors cursor-pointer">
                                            Copy
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- QR Scan Box with Real KHQR Code Image -->
                            <div class="pt-3 border-t border-liva-border/80 flex flex-col sm:flex-row items-center gap-4">
                                <div class="w-36 sm:w-40 bg-white p-2.5 rounded-2xl border-2 border-liva-border shadow-sm flex flex-col items-center justify-between shrink-0 gap-1.5">
                                    <div class="w-full flex items-center justify-between text-[10px] font-bold">
                                        <span class="text-rose-600 font-extrabold tracking-wider">KHQR</span>
                                        <div class="flex items-center gap-1">
                                            <img id="active-qr-bank-logo" src="/img/payments/aba.png" alt="Bank Logo" class="w-3.5 h-3.5 object-contain" />
                                            <span id="active-qr-bank-label" class="text-liva-muted uppercase tracking-wider text-[9px]">ABA</span>
                                        </div>
                                    </div>
                                    <div class="w-28 h-28 relative flex items-center justify-center p-0.5 bg-white rounded-xl border border-gray-200 shadow-2xs overflow-hidden">
                                        <img id="active-qr-img" src="/img/payments/khqr.png" alt="KHQR Payment QR Code" class="w-full h-full object-contain" />
                                    </div>
                                    <div class="text-[10px] font-bold text-liva-dark tracking-tight" id="active-qr-amount">
                                        $0.00
                                    </div>
                                </div>

                                <div class="text-xs text-liva-muted space-y-1.5 text-center sm:text-left">
                                    <div class="font-bold text-sm text-liva-dark">
                                        Scan with Mobile Banking
                                    </div>
                                    <p>Open your bank app (ABA, ACLEDA, or Wing) and scan this QR code to complete transfer.</p>
                                    <div class="pt-1">
                                        <label class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-white border border-liva-border text-xs text-liva-charcoal cursor-pointer hover:bg-liva-stone/50 transition-colors">
                                            <svg class="w-4 h-4 text-liva-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                            <span id="slip-upload-label">Attach Transfer Slip (Optional)</span>
                                            <input type="file" accept="image/*" class="hidden" onchange="window.livaApp.handleSlipUpload(this)" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Right Column: Order Summary & Place Order CTA -->
            <div class="lg:col-span-5 space-y-6">
                
                <div class="bg-white p-5 sm:p-6 rounded-2xl border border-liva-border shadow-2xs space-y-4">
                    <h3 class="font-serif font-bold text-base text-liva-dark pb-2 border-b border-liva-border/60" data-i18n="orderSummary">
                        Order Summary
                    </h3>

                    <!-- Mini items list (Full List Without Inner Scroll) -->
                    <div id="checkout-items-list" class="divide-y divide-liva-border/50 space-y-2">
                        <!-- Populated dynamically by JavaScript -->
                    </div>

                    <!-- Price Breakdown -->
                    <div class="pt-3 border-t border-liva-border/60 space-y-2 text-xs">
                        <div class="flex justify-between text-liva-muted">
                            <span>Subtotal</span>
                            <span id="checkout-subtotal-val" class="font-semibold text-liva-dark">$0.00</span>
                        </div>
                        <div class="flex justify-between text-liva-muted">
                            <span>Shipping Fee</span>
                            <span id="checkout-shipping-val" class="font-semibold text-emerald-700">FREE</span>
                        </div>
                        <div class="flex justify-between items-baseline pt-2 border-t border-liva-border/80 text-sm">
                            <span class="font-bold text-liva-dark">Total Due</span>
                            <div class="text-right">
                                <span id="checkout-total-val" class="text-lg font-serif font-bold text-liva-dark">$0.00</span>
                                <div id="checkout-total-khr" class="text-[11px] text-liva-muted font-normal">≈ 0 KHR</div>
                            </div>
                        </div>
                    </div>

                    <!-- Confirm Order Button -->
                    <button type="button" 
                            id="confirm-place-order-btn"
                            onclick="window.livaApp.confirmPlaceOrder()"
                            class="w-full py-3.5 px-4 bg-liva-dark hover:bg-liva-olive text-white text-xs tracking-wider uppercase font-semibold rounded-full shadow-lg transition-all duration-300 hover:scale-101 active:scale-98 flex items-center justify-center gap-2 cursor-pointer"
                            data-i18n="placeOrder">
                        <span>Confirm & Place Order</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>

                    <div class="text-center text-[11px] text-liva-muted">
                        🔒 256-Bit SSL Encrypted & Protected
                    </div>
                </div>

            </div>

        </div>


        <!-- Order Success View (Shown after placing order) -->
        <div id="checkout-success-view" class="hidden py-10 px-4 text-center max-w-lg mx-auto space-y-6">
            <div class="w-20 h-20 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto shadow-md">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </div>

            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-700">Order Confirmed</span>
                <h3 class="text-2xl sm:text-3xl font-serif font-bold text-liva-dark mt-1" data-i18n="orderSuccessTitle">
                    Thank You for Your Order!
                </h3>
                <p class="text-xs sm:text-sm text-liva-muted mt-2 leading-relaxed" data-i18n="orderSuccessDesc">
                    We've received your order and are freshly preparing your botanical skincare rituals.
                </p>
            </div>

            <!-- Receipt Card -->
            <div class="p-5 rounded-2xl bg-white border border-liva-border shadow-xs text-left text-xs space-y-2.5">
                <div class="flex justify-between items-center pb-2 border-b border-liva-border/60">
                    <span class="text-liva-muted">Order ID</span>
                    <span id="success-order-id" class="font-mono font-bold text-liva-dark">#LIVA-2026-8921</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-liva-muted">Recipient</span>
                    <span id="success-customer-name" class="font-semibold text-liva-dark">Customer</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-liva-muted">Phone</span>
                    <span id="success-customer-phone" class="font-semibold text-liva-dark">-</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-liva-muted">Payment Method</span>
                    <span id="success-payment-method" class="font-semibold text-liva-olive">Cash on Delivery (COD)</span>
                </div>
                <div class="flex justify-between items-center pt-2 border-t border-liva-border/60 text-sm font-bold">
                    <span>Total Paid / Due</span>
                    <span id="success-total-amount" class="text-liva-dark font-serif">$0.00</span>
                </div>
            </div>

            <div class="pt-2">
                <button type="button" 
                        onclick="window.livaApp.closeCheckoutModal()"
                        class="w-full py-3.5 px-6 rounded-full bg-liva-dark hover:bg-liva-olive text-white text-xs font-semibold uppercase tracking-wider transition-colors shadow-md cursor-pointer">
                    Continue Shopping
                </button>
            </div>
        </div>

    </div>

</div>

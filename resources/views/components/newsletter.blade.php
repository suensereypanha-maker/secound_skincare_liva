<section class="py-16 md:py-20 bg-[#F4EFE6] border-t border-liva-border">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white text-liva-gold text-xs font-semibold tracking-wider uppercase border border-liva-border shadow-2xs mb-3">
            <span class="w-1.5 h-1.5 rounded-full bg-liva-gold"></span>
            <span data-i18n="newsletterTag">{{ __('skincare.newsletter_tag') }}</span>
        </div>

        <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-liva-dark mb-3 tracking-tight" data-i18n="newsletterTitle">
            {{ __('skincare.newsletter_title') }}
        </h2>

        <p class="text-sm sm:text-base text-liva-muted max-w-xl mx-auto mb-8 leading-relaxed" data-i18n="newsletterDesc">
            {{ __('skincare.newsletter_desc') }}
        </p>

        <form id="newsletter-form" class="max-w-md mx-auto flex flex-col sm:flex-row gap-2.5">
            <input type="email" 
                   id="newsletter-email" 
                   required 
                   placeholder="{{ __('skincare.newsletter_placeholder') }}" 
                   data-i18n-placeholder="emailPlaceholder"
                   class="flex-1 px-5 py-3 rounded-full bg-white border border-liva-border focus:border-liva-olive focus:ring-2 focus:ring-liva-olive/20 text-xs sm:text-sm text-liva-dark outline-none shadow-xs placeholder-liva-muted/60" />
            <button type="submit" 
                    class="px-7 py-3 rounded-full bg-liva-dark text-white text-xs uppercase tracking-wider font-semibold hover:bg-liva-olive transition-colors shadow-sm shrink-0"
                    data-i18n="subscribeBtn">
                {{ __('skincare.newsletter_btn') }}
            </button>
        </form>

        <div id="newsletter-feedback" class="mt-4 text-xs hidden"></div>

    </div>
</section>


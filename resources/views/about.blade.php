@php
    $isKm = app()->getLocale() === 'km';
    $pageTitle = ($isKm ? 'អំពី LIVA' : 'About LIVA') . ' | LIVA Botanical Skincare';
@endphp

<x-layouts.app :title="$pageTitle">
    <!-- Breadcrumbs Navigation -->
    <div class="bg-white/60 border-b border-liva-border/60 py-3.5 px-4 sm:px-6 lg:px-8 text-xs text-liva-muted">
        <div class="max-w-7xl mx-auto flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-liva-dark transition-colors" data-i18n="navHome">{{ __('skincare.nav_home') }}</a>
            <span>/</span>
            <span class="text-liva-dark font-medium" data-i18n="navAbout">{{ __('skincare.nav_about') }}</span>
        </div>
    </div>

    <!-- Editorial About Hero -->
    <section class="py-10 sm:py-16 md:py-20 bg-[#FAF7F2]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 items-center">
                <div class="lg:col-span-6 space-y-5">
                    <div class="inline-flex items-center gap-2 text-[10px] font-bold tracking-widest uppercase text-liva-olive">
                        <span class="w-1.5 h-1.5 rounded-full bg-liva-olive"></span>
                        <span data-i18n="banner1Tag">{{ __('skincare.banner_1_tag') }}</span>
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-serif font-bold text-liva-dark tracking-tight leading-[1.16]" data-i18n="banner1Title">
                        {{ __('skincare.banner_1_title') }}
                    </h1>

                    <p class="text-sm sm:text-base text-liva-charcoal/85 leading-relaxed" data-i18n="banner1Desc">
                        {{ __('skincare.banner_1_desc') }}
                    </p>

                    <p class="text-xs sm:text-sm text-liva-muted leading-relaxed">
                        {{ $isKm
                            ? 'LIVA បង្កើតឡើងដោយការរួមបញ្ចូលគ្នានៃរុក្ខជាតិសរីរាង្គតំបន់អាស៊ីអាគ្នេយ៍ និងស្តង់ដារវិទ្យាសាស្ត្រទំនើប ដើម្បីថែរក្សាសុខភាពស្បែក សក់ និងដងខ្លួនឱ្យមានភាពស្រស់ថ្លាជារៀងរាល់ថ្ងៃ ដោយគ្មានសារធាតុគីមីកាត់ស្បែក។'
                            : 'Rooted in Southeast Asian flora and elevated by clinical botanical science, every LIVA formulation is small-batch crafted to nourish sensitive skin, strengthen hair vitality, and turn daily routines into calming rituals.' }}
                    </p>

                    <div class="pt-2 flex flex-wrap items-center gap-3">
                        <a href="{{ route('products.index') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-liva-dark hover:bg-liva-olive text-white text-xs font-semibold uppercase tracking-wider shadow-md transition-all">
                            <span data-i18n="exploreCollection">{{ __('skincare.explore_collection') }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white hover:bg-liva-stone text-liva-dark border border-liva-border text-xs font-semibold uppercase tracking-wider transition-all">
                            <span data-i18n="navContact">{{ __('skincare.nav_contact') }}</span>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-6">
                    <div class="relative rounded-3xl overflow-hidden bg-[#EAE4D9] border border-liva-border shadow-xl aspect-[4/3] sm:aspect-[5/4]">
                        <img src="/img/botanical.webp" alt="LIVA Botanical Philosophy" class="w-full h-full object-cover object-center" />
                        <div class="absolute bottom-4 left-4 right-4 sm:right-auto sm:max-w-xs p-4 rounded-2xl bg-white/95 backdrop-blur-md border border-white/80 shadow-lg">
                            <div class="text-[10px] font-bold uppercase tracking-widest text-liva-olive">
                                {{ $isKm ? 'ការសន្យាស្អាត ១០០%' : '100% CLEAN PROMISE' }}
                            </div>
                            <p class="text-xs text-liva-dark font-medium mt-1">
                                {{ $isKm ? 'គ្មានប៉ារ៉ាបែន · គ្មានស៊ុលហ្វាត · គ្មានស៊ីលីខន' : 'Zero Parabens · Zero Sulfates · Zero Silicones · Vegan' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4 Brand Pillars -->
    <section class="py-12 sm:py-16 bg-white border-t border-liva-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12 space-y-2">
                <span class="text-[10px] font-bold tracking-widest uppercase text-liva-olive" data-i18n="spotlightTag">
                    {{ __('skincare.spotlight_tag') ?? 'THE SIGNATURE FORMULA' }}
                </span>
                <h2 class="text-2xl sm:text-3xl font-serif font-bold text-liva-dark" data-i18n="spotlightTitle">
                    {{ __('skincare.spotlight_title') }}
                </h2>
                <p class="text-xs sm:text-sm text-liva-muted" data-i18n="spotlightSubtitle">
                    {{ __('skincare.spotlight_subtitle') }}
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <div class="p-6 rounded-2xl bg-[#FAF7F2] border border-liva-border/80 space-y-2.5">
                    <div class="w-10 h-10 rounded-xl bg-liva-olive/10 text-liva-olive flex items-center justify-center font-serif font-bold text-lg">01</div>
                    <h3 class="font-serif font-bold text-lg text-liva-dark" data-i18n="feature1Title">{{ __('skincare.feature_1_title') }}</h3>
                    <p class="text-xs text-liva-muted leading-relaxed" data-i18n="feature1Desc">{{ __('skincare.feature_1_desc') }}</p>
                </div>

                <div class="p-6 rounded-2xl bg-[#FAF7F2] border border-liva-border/80 space-y-2.5">
                    <div class="w-10 h-10 rounded-xl bg-liva-olive/10 text-liva-olive flex items-center justify-center font-serif font-bold text-lg">02</div>
                    <h3 class="font-serif font-bold text-lg text-liva-dark" data-i18n="feature2Title">{{ __('skincare.feature_2_title') }}</h3>
                    <p class="text-xs text-liva-muted leading-relaxed" data-i18n="feature2Desc">{{ __('skincare.feature_2_desc') }}</p>
                </div>

                <div class="p-6 rounded-2xl bg-[#FAF7F2] border border-liva-border/80 space-y-2.5">
                    <div class="w-10 h-10 rounded-xl bg-liva-olive/10 text-liva-olive flex items-center justify-center font-serif font-bold text-lg">03</div>
                    <h3 class="font-serif font-bold text-lg text-liva-dark" data-i18n="feature3Title">{{ __('skincare.feature_3_title') }}</h3>
                    <p class="text-xs text-liva-muted leading-relaxed" data-i18n="feature3Desc">{{ __('skincare.feature_3_desc') }}</p>
                </div>

                <div class="p-6 rounded-2xl bg-[#FAF7F2] border border-liva-border/80 space-y-2.5">
                    <div class="w-10 h-10 rounded-xl bg-liva-olive/10 text-liva-olive flex items-center justify-center font-serif font-bold text-lg">04</div>
                    <h3 class="font-serif font-bold text-lg text-liva-dark" data-i18n="feature4Title">{{ __('skincare.feature_4_title') }}</h3>
                    <p class="text-xs text-liva-muted leading-relaxed" data-i18n="feature4Desc">{{ __('skincare.feature_4_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sensorial Rituals & Craftsmanship -->
    <section class="py-12 sm:py-16 md:py-20 bg-[#FAF7F2] border-t border-liva-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            <div class="lg:col-span-6 grid grid-cols-2 gap-3 sm:gap-5">
                <div class="rounded-2xl overflow-hidden border border-liva-border aspect-[4/5] bg-white shadow-sm">
                    <img src="/img/campaign/hair-pair.webp" alt="LIVA Hair Ritual" class="w-full h-full object-cover" loading="lazy" />
                </div>
                <div class="rounded-2xl overflow-hidden border border-liva-border aspect-[4/5] bg-white shadow-sm mt-6">
                    <img src="/img/daily-edit-detail.webp" alt="LIVA Body Care" class="w-full h-full object-cover" loading="lazy" />
                </div>
            </div>

            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 text-[10px] font-bold tracking-widest uppercase text-liva-olive">
                    <span class="w-1.5 h-1.5 rounded-full bg-liva-olive"></span>
                    <span data-i18n="banner2Tag">{{ __('skincare.banner_2_tag') }}</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-serif font-bold text-liva-dark" data-i18n="banner2Title">
                    {{ __('skincare.banner_2_title') }}
                </h2>
                <p class="text-sm text-liva-muted leading-relaxed" data-i18n="banner2Desc">
                    {{ __('skincare.banner_2_desc') }}
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="p-4 rounded-2xl bg-white border border-liva-border/80 space-y-1">
                        <h4 class="text-sm font-bold text-liva-dark" data-i18n="leftFeature1Title">{{ __('skincare.left_feat_1_title') }}</h4>
                        <p class="text-xs text-liva-muted leading-relaxed" data-i18n="leftFeature1Desc">{{ __('skincare.left_feat_1_desc') }}</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-liva-border/80 space-y-1">
                        <h4 class="text-sm font-bold text-liva-dark" data-i18n="leftFeature2Title">{{ __('skincare.left_feat_2_title') }}</h4>
                        <p class="text-xs text-liva-muted leading-relaxed" data-i18n="leftFeature2Desc">{{ __('skincare.left_feat_2_desc') }}</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-liva-border/80 space-y-1">
                        <h4 class="text-sm font-bold text-liva-dark" data-i18n="rightFeature1Title">{{ __('skincare.right_feat_1_title') }}</h4>
                        <p class="text-xs text-liva-muted leading-relaxed" data-i18n="rightFeature1Desc">{{ __('skincare.right_feat_1_desc') }}</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-liva-border/80 space-y-1">
                        <h4 class="text-sm font-bold text-liva-dark" data-i18n="rightFeature2Title">{{ __('skincare.right_feat_2_title') }}</h4>
                        <p class="text-xs text-liva-muted leading-relaxed" data-i18n="rightFeature2Desc">{{ __('skincare.right_feat_2_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clinical Results -->
    <x-results />
</x-layouts.app>

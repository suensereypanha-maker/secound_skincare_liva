@props([
    'variant' => 'dark', // 'dark' (for light bg), 'light' (for dark bg)
    'height' => 'h-10 sm:h-12',
    'class' => '',
])

@php
    $isLight = $variant === 'light';
@endphp

<a href="/" class="inline-flex items-center select-none group {{ $class }}" aria-label="LIVA Botanical Skincare">
    <!-- Luxury Cosmetic Swirl LIVA Logo -->
    <picture>
        <source srcset="/img/logo.webp" type="image/webp">
        <img src="/img/logo.png" 
             alt="LIVA Botanical Skincare" 
             class="{{ $height }} w-auto object-contain transition-transform duration-300 group-hover:scale-105 {{ $isLight ? 'drop-shadow-[0_2px_12px_rgba(255,255,255,0.14)]' : 'drop-shadow-xs' }}" 
             loading="eager" />
    </picture>
</a>

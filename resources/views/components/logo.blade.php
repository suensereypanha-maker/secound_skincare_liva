@props([
    'variant' => 'dark', // 'dark' (for light bg), 'light' (for dark bg)
    'height' => 'h-10 sm:h-11',
    'class' => '',
])

@php
    $isDark = $variant === 'dark';
    $primaryColor = $isDark ? '#1F2421' : '#FAF8F5';
    $accentColor = $isDark ? '#A48551' : '#D4AF37';
    $leafBg = $isDark ? '#2D4233' : '#E8ECE9';
    $leafDot = $isDark ? '#C88D6A' : '#E2A679';
    $subColor = $isDark ? '#6E7570' : '#A8B3AA';
@endphp

<a href="/" class="inline-flex items-center select-none group {{ $class }}" aria-label="LIVA Botanical Skincare">
    <!-- Single Unified Luxury Bilingual Logo (English + Khmer) -->
    <svg class="{{ $height }} w-auto transition-transform duration-300 group-hover:scale-103" viewBox="0 0 250 52" fill="none">
        <g transform="translate(2, 6)">
            <!-- Botanical Leaf Emblem -->
            <path d="M22 2 C13 2 5 10 5 21 C5 32 15 39 24 39 C26 30 24 17 35 10 C31 5 27 2 22 2 Z" fill="{{ $leafBg }}" opacity="0.95"/>
            <path d="M22 7 C18 14 18 23 24 32 C26 23 30 16 33 11 C30 8 26 7 22 7 Z" fill="{{ $accentColor }}" opacity="0.9"/>
            <circle cx="24" cy="5" r="2.2" fill="{{ $leafDot }}"/>
            
            <!-- Brand Wordmark: LIVA in Luxury Serif + លីវ៉ា in Elegant Khmer -->
            <text x="50" y="25" font-family="'Cormorant Garamond', 'Playfair Display', Georgia, serif" font-size="24" font-weight="600" letter-spacing="0.12em" fill="{{ $primaryColor }}">LIVA</text>
            <text x="122" y="24" font-family="'Kantumruy Pro', 'Battambang', system-ui, sans-serif" font-size="16" font-weight="700" letter-spacing="0.02em" fill="{{ $accentColor }}">· លីវ៉ា</text>
            
            <!-- Subtitle: BOTANICAL SKINCARE -->
            <text x="52" y="38" font-family="'Plus Jakarta Sans', system-ui, sans-serif" font-size="7" font-weight="600" letter-spacing="0.26em" fill="{{ $subColor }}">BOTANICAL SKINCARE</text>
        </g>
    </svg>
</a>

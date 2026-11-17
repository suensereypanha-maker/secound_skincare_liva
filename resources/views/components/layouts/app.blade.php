<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'LIVA Botanical Skincare | Pure Organic Beauty & Everyday Rituals' }}</title>
    <meta name="description" content="LIVA is a mindful botanical personal-care lab crafting pure, clinically backed skin, hair, and body rituals inspired by nature.">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/img/favicon.svg">

    <!-- Preconnect & Google Fonts for English and Khmer Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Kantumruy+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-liva-cream text-liva-dark antialiased min-h-screen flex flex-col selection:bg-liva-gold-light selection:text-liva-dark">
    
    <!-- Top Announcement & Header -->
    <x-header />

    <!-- Main Content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- Slide-Out Shopping Bag Drawer -->
    <x-cart-drawer />

    <!-- Brand Footer -->
    <x-footer />

</body>
</html>

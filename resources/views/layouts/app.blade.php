<!DOCTYPE html>
<html lang="es" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $rawOgImage = trim($__env->yieldContent('og_image'));
        if (empty($rawOgImage)) {
            $ogImageUrl = asset('images/rew_og_card.png');
        } elseif (\Illuminate\Support\Str::startsWith($rawOgImage, ['http://', 'https://'])) {
            $ogImageUrl = $rawOgImage;
        } else {
            $ogImageUrl = asset(ltrim($rawOgImage, '/'));
        }

        $imageExtension = strtolower(pathinfo(parse_url($ogImageUrl, PHP_URL_PATH), PATHINFO_EXTENSION));
        $ogMimeType = match ($imageExtension) {
            'png' => 'image/png',
            'jpg', 'jpeg' => 'image/jpeg',
            'webp' => 'image/webp',
            'svg' => 'image/svg+xml',
            default => 'image/png'
        };

        $pageTitle = trim($__env->yieldContent('title', 'REW | Agencia de Software, SEO y Tienda de Plugins en Chile'));
        $ogTitle = trim($__env->yieldContent('og_title', $pageTitle));
        $metaDescription = trim($__env->yieldContent('meta_description', 'Agencia de desarrollo de software en Laravel, tiendas e-commerce de alto rendimiento, optimización SEO en Chile y plugins con Inteligencia Artificial.'));
        $ogDescription = trim($__env->yieldContent('og_description', $metaDescription));
    @endphp

    <!-- Page Title & Standard Meta Tags -->
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="author" content="Álvaro Valenzuela Valdés - REW Chile">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large">
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <!-- Facebook Sharing Debugger / OpenGraph Tags (100% Optimized for CTR) -->
    <meta property="og:locale" content="es_CL">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="{{ $ogTitle }}">
    <meta property="og:description" content="{{ $ogDescription }}">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:site_name" content="REW - Software Factory & SEO Chile">
    <meta property="og:image" content="{{ $ogImageUrl }}">
    <meta property="og:image:secure_url" content="{{ $ogImageUrl }}">
    <meta property="og:image:width" content="@yield('og_image_width', '1200')">
    <meta property="og:image:height" content="@yield('og_image_height', '630')">
    <meta property="og:image:alt" content="@yield('og_image_alt', $ogTitle)">
    <meta property="og:image:type" content="{{ $ogMimeType }}">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $ogTitle }}">
    <meta name="twitter:description" content="{{ $ogDescription }}">
    <meta name="twitter:image" content="{{ $ogImageUrl }}">

    <!-- Favicon & Modern Touch Icons (Official REW Isologo) -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v={{ time() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}?v={{ time() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}?v={{ time() }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('android-chrome-192x192.png') }}?v={{ time() }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('android-chrome-512x512.png') }}?v={{ time() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}?v={{ time() }}">
    <link rel="icon" type="image/webp" href="{{ asset('images/favicon.webp') }}?v={{ time() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v={{ time() }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ time() }}">

    <!-- Schema.org JSON-LD Structured Data for Organization, Person & WebSite -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@graph": [
            {
                "@@type": "Organization",
                "@@id": "{{ url('/') }}/#organization",
                "name": "REW",
                "url": "{{ url('/') }}",
                "email": "alvaro@rew.cl",
                "telephone": "+56987261127",
                "logo": {
                    "@@type": "ImageObject",
                    "@@id": "{{ url('/') }}/#logo",
                    "url": "{{ asset('images/logo.webp') }}",
                    "caption": "REW"
                },
                "address": {
                    "@@type": "PostalAddress",
                    "streetAddress": "Villagra 070",
                    "addressLocality": "Providencia",
                    "addressRegion": "Región Metropolitana",
                    "addressCountry": "CL"
                },
                "founder": {
                    "@@id": "{{ url('/') }}/#person"
                },
                "contactPoint": [
                    {
                        "@@type": "ContactPoint",
                        "telephone": "+56987261127",
                        "contactType": "customer support",
                        "availableLanguage": ["Spanish", "English"]
                    }
                ],
                "description": "Agencia y empresa de desarrollo de software a medida, diseño web con Laravel y WordPress, optimización SEO y tienda de plugins de Inteligencia Artificial en Chile."
            },
            {
                "@@type": "Person",
                "@@id": "{{ url('/') }}/#person",
                "name": "Álvaro Valenzuela Valdés",
                "jobTitle": "Ingeniero Informático & Fundador de REW",
                "worksFor": {
                    "@@id": "{{ url('/') }}/#organization"
                },
                "email": "alvaro@rew.cl",
                "telephone": "+56987261127",
                "url": "{{ url('/nosotros') }}",
                "sameAs": [
                    "https://www.linkedin.com/in/%C3%A1lvaro-valenzuela-vald%C3%A9s-584065281/",
                    "https://www.instagram.com/rew_chile/",
                    "https://rew.cl"
                ]
            },
            {
                "@@type": "WebSite",
                "@@id": "{{ url('/') }}/#website",
                "url": "{{ url('/') }}",
                "name": "REW",
                "publisher": {
                    "@@id": "{{ url('/') }}/#organization"
                },
                "inLanguage": "es-CL",
                "potentialAction": {
                    "@@type": "SearchAction",
                    "target": "{{ route('tienda.index') }}?buscar={search_term_string}",
                    "query-input": "required name=search_term_string"
                }
            }
        ]
    }
    </script>
    @yield('schema_json')

    @stack('head')
</head>
<body>
    <!-- Navbar Component -->
    @include('components.navbar')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Shopping Cart Drawer -->
    @include('components.cart-drawer')

    <!-- Google PageSpeed Live Audit Modal -->
    @include('components.audit-modal')

    <!-- Floating Interactive Widgets (WhatsApp, Currency Switcher, Rich-E Chatbot) -->
    @include('components.floating-widgets')

    <!-- Instagram Dynamic Feed Component -->
    @include('components.instagram-feed')

    <!-- Footer Component -->
    @include('components.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/ocean-waves-particles.js') }}?v={{ time() }}" defer></script>
    <script src="{{ asset('js/app.js') }}?v={{ time() }}" defer></script>
    @stack('scripts')
</body>
</html>

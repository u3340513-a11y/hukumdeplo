@props([
    'title' => null,
    'seoTitle' => null,
    'description' => null,
    'keywords' => null,
    'image' => null,
    'type' => 'website',
    'robots' => null,
    'breadcrumbs' => [],
    'schema' => [],
])

@php
    use App\Support\Seo;

    $brand = config('site.brand');
    $seo = config('site.seo');
    $suffix = $seoTitle ?? $title;
    $pageTitle = $suffix ? Seo::title($suffix) : Seo::title();
    $pageDescription = Seo::description($description);
    $pageKeywords = Seo::keywords($keywords);
    $pageRobots = $robots ?? $seo['robots'];
    $canonical = Seo::canonical();
    $ogImage = Seo::ogImage($image);
    $baseUrl = 'https://' . $brand['domain'];

    $schemas = array_merge(Seo::baseSchemas(), $schema);

    if (! empty($breadcrumbs)) {
        $schemas[] = Seo::breadcrumbSchema($breadcrumbs, $baseUrl);
    }
@endphp

<!DOCTYPE html>
<html lang="tr" class="scroll-smooth antialiased">
<head>
    {{-- Google tag (gtag.js) --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11016022451"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        // Önceki kurulumdaki Google tag
        gtag('config', 'AW-11016022451');

        // Google Ads dönüşümlerinin bulunduğu hesap
        gtag('config', 'AW-18142453012');
    </script>

    {{-- Google Ads Dönüşüm Raporlama --}}
    <script>
        function gtag_report_conversion(url, sendTo) {
            var callback = function () {
                if (typeof url !== 'undefined' && url) {
                    window.location.href = url;
                }
            };

            gtag('event', 'conversion', {
                'send_to': sendTo,
                'value': 1.0,
                'currency': 'TRY',
                'event_callback': callback
            });

            return false;
        }
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#2563EB">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO --}}
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="keywords" content="{{ $pageKeywords }}">
    <meta name="author" content="{{ $brand['name'] }}">
    <meta name="robots" content="{{ $pageRobots }}">
    <meta name="googlebot" content="{{ $pageRobots }}">
    <link rel="canonical" href="{{ $canonical }}">
    <link rel="alternate" hreflang="tr" href="{{ $canonical }}">
    <link rel="alternate" hreflang="x-default" href="{{ $canonical }}">

    {{-- Geo / yerel SEO --}}
    <meta name="geo.region" content="TR-34">
    <meta name="geo.placename" content="{{ $seo['geo']['locality'] }}, {{ $seo['geo']['region'] }}">
    <meta name="geo.position" content="{{ $seo['geo']['icbm'] }}">
    <meta name="ICBM" content="{{ $seo['geo']['icbm'] }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="{{ $type }}">
    <meta property="og:locale" content="tr_TR">
    <meta property="og:site_name" content="{{ $brand['name'] }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:alt" content="{{ $pageTitle }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset($brand['favicon']) }}" type="image/png" sizes="512x512">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    {{-- Fonts: preconnect + display=swap (performans) --}}
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link rel="stylesheet"
          href="https://fonts.bunny.net/css?family=inter:400,500,600,700|plus-jakarta-sans:600,700,800&display=swap">

    {{-- Yapısal veri (JSON-LD) --}}
    @foreach ($schemas as $structuredData)
        <script type="application/ld+json">
            {!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>
    @endforeach

    @php
        $viteEntries = ['resources/css/app.css', 'resources/js/app.js'];
        $viteManifest = null;

        foreach ([
            public_path('build/manifest.json'),
            base_path('public/build/manifest.json'),
            dirname(base_path()).DIRECTORY_SEPARATOR.'build'.DIRECTORY_SEPARATOR.'manifest.json',
        ] as $manifestFile) {
            if (is_file($manifestFile)) {
                $viteManifest = json_decode((string) file_get_contents($manifestFile), true);
                break;
            }
        }

        $viteBase = '/build';
    @endphp

    @if (is_array($viteManifest))
        @foreach ($viteEntries as $entry)
            @if ($chunk = ($viteManifest[$entry] ?? null))
                @if (str_ends_with($chunk['file'], '.css'))
                    <link rel="stylesheet" href="{{ $viteBase }}/{{ $chunk['file'] }}" />
                @else
                    <script type="module" src="{{ $viteBase }}/{{ $chunk['file'] }}"></script>
                @endif
            @endif
        @endforeach
    @else
        @vite($viteEntries)
    @endif

    <style id="hk-brand-theme">
        :root, :host {
            /* Hükümdar Bronze & Gold Brand Palette (Logodan Birebir Alınan Renkler) */
            --color-brand-50: #faf6f0;
            --color-brand-100: #f4ecdf;
            --color-brand-200: #e8d7be;
            --color-brand-300: #d8be98;
            --color-brand-400: #c6a26d;
            --color-brand-500: #b58948;
            --color-brand-600: #9e7132;
            --color-brand-700: #815725;
            --color-brand-800: #67421c;
            --color-brand-900: #492c12;
            --color-brand-950: #2c1808;

            --color-primary: #b58948;
            --color-secondary: #67421c;
            --color-accent: #c6a26d;

            --shadow-brand: 0 12px 32px -8px rgba(181, 137, 72, 0.45);
            --shadow-brand-lg: 0 20px 48px -12px rgba(181, 137, 72, 0.55);

            /* Tipografi Boyut Küçültmesi (Başlıklar ve genel metinler daha zarif/küçük) */
            --text-display: clamp(1.85rem, 1.3rem + 2vw, 2.75rem);
            --text-h1: clamp(1.6rem, 1.2rem + 1.5vw, 2.4rem);
            --text-h2: clamp(1.35rem, 1.1rem + 1vw, 1.85rem);
            --text-h3: clamp(1.1rem, 1rem + 0.5vw, 1.35rem);
            --text-lead: clamp(0.95rem, 0.9rem + 0.2vw, 1.1rem);
        }

        /* Başlıkların boyutunu orantılı küçült (Hero hariç) */
        h1:not(.hero-title) { font-size: clamp(1.6rem, 1.2rem + 1.5vw, 2.35rem) !important; line-height: 1.2 !important; letter-spacing: -0.02em !important; }
        .hero-title { font-size: clamp(2.2rem, 1.4rem + 2.6vw, 3.5rem) !important; line-height: 1.1 !important; letter-spacing: -0.025em !important; }
        h2 { font-size: clamp(1.35rem, 1.1rem + 1vw, 1.85rem) !important; line-height: 1.25 !important; letter-spacing: -0.02em !important; }
        h3 { font-size: clamp(1.1rem, 1rem + 0.5vw, 1.35rem) !important; line-height: 1.3 !important; }

        /* Butonlar & Vurgular */
        .btn-primary {
            background-image: linear-gradient(120deg, #b58948 0%, #815725 100%) !important;
            box-shadow: 0 10px 24px -6px rgba(181, 137, 72, 0.45) !important;
        }
        .btn-primary:hover {
            background-image: linear-gradient(120deg, #c6a26d 0%, #9e7132 100%) !important;
            box-shadow: 0 16px 36px -8px rgba(181, 137, 72, 0.55) !important;
        }
        .text-gradient {
            background-image: linear-gradient(120deg, #b58948 0%, #d8be98 100%) !important;
        }
        .text-gradient-light {
            background-image: linear-gradient(120deg, #f4ecdf 0%, #d8be98 50%, #ffffff 100%) !important;
        }
        .eyebrow {
            color: #9e7132 !important;
        }
        ::selection {
            background-color: rgba(181, 137, 72, 0.25) !important;
            color: #492c12 !important;
        }

        /* Mobil Grid ve Kart Koruması — Ekran Dışına Taşmayı Kesin Olarak Önler */
        .ref-grid, .services-grid {
            display: grid !important;
            grid-template-columns: minmax(0, 1fr) !important;
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
        }
        @media (min-width: 640px) {
            .ref-grid, .services-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            }
        }
        @media (min-width: 1024px) {
            .ref-grid, .services-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
            }
        }
        .ref-grid > *, .services-grid > * {
            min-width: 0 !important;
            max-width: 100% !important;
            width: 100% !important;
            box-sizing: border-box !important;
        }
        .ref-card-anchor {
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box !important;
            display: block !important;
        }

        /* Yatay kayma / yalpalamayı kesin olarak engelleyen, sticky/fixed menüleri bozmayan modern kural */
        html, body {
            overflow-x: clip !important;
            width: 100% !important;
            max-width: 100% !important;
        }
        main#main {
            overflow-x: clip !important;
            width: 100% !important;
            max-width: 100% !important;
        }
    </style>
    @stack('head')
</head>
<body x-data class="min-h-screen bg-surface text-body selection:bg-brand-100">

    {{-- Erişilebilirlik: içeriğe atla --}}
    <a href="#main"
       class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[100] focus:rounded-full focus:bg-brand-600 focus:px-5 focus:py-2.5 focus:text-sm focus:font-semibold focus:text-white focus:shadow-brand">
        İçeriğe geç
    </a>

    <x-layouts.header />

    <main id="main" class="relative">
        {{ $slot }}
    </main>

    <x-layouts.footer />

    @unless (request()->is('iletisim'))
        <x-popups.quote />
    @endunless

    <x-widgets.whatsapp-float />

    <x-layouts.mobile-bottom-nav />

    @stack('scripts')
</body>
</html>

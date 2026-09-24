@php
    $brand = config('site.brand');
    $isHome = request()->routeIs('home') || request()->is('/') || request()->path() === '/';
    $isPricing = request()->is('fiyatlar*');
    $isReferences = request()->is('referanslar*');
    $isContact = request()->is('iletisim*');
@endphp

<nav class="nm-tabbar" aria-label="Mobil hızlı menü">
    <a href="/" class="nm-tab {{ $isHome ? 'is-active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 11.5 12 4l9 7.5"/>
            <path d="M5 10v9h14v-9"/>
        </svg>
        <span>Ana</span>
    </a>

    <a href="/fiyatlar" class="nm-tab {{ $isPricing ? 'is-active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3z"/>
            <path d="m4 7.5 8 4.5 8-4.5"/>
            <path d="M12 12v9"/>
        </svg>
        <span>Paketler</span>
    </a>

    <div class="nm-tab-center-wrap">
        <a href="/" class="nm-tab-mill" aria-label="{{ $brand['name'] }} Anasayfa">
            <img src="{{ asset($brand['favicon']) }}" alt="{{ $brand['name'] }}">
        </a>
    </div>

    <a href="/referanslar" class="nm-tab {{ $isReferences ? 'is-active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="7" height="7" rx="1.5"/>
            <rect x="14" y="3" width="7" height="7" rx="1.5"/>
            <rect x="3" y="14" width="7" height="7" rx="1.5"/>
            <rect x="14" y="14" width="7" height="7" rx="1.5"/>
        </svg>
        <span>Referans</span>
    </a>

    <a href="/iletisim" class="nm-tab {{ $isContact ? 'is-active' : '' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 4h3l1.5 4-2 1.5a12 12 0 0 0 6 6l1.5-2 4 1.5V18a2 2 0 0 1-2 2A15 15 0 0 1 5 6 2 2 0 0 1 5 4z"/>
        </svg>
        <span>İletişim</span>
    </a>
</nav>

<style>
    .nm-tabbar { display: none; }
    @media (max-width: 1023px) {
        body { padding-bottom: 74px !important; }
        .nm-tabbar {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 9000;
            width: 100%;
            max-width: 100vw;
            height: calc(60px + env(safe-area-inset-bottom, 0px));
            padding-bottom: env(safe-area-inset-bottom, 0px);
            display: flex;
            align-items: center;
            justify-content: space-around;
            background: #ffffff !important;
            border-top: 1px solid rgba(8, 17, 31, .09);
            box-shadow: 0 -6px 24px rgba(8, 17, 31, .08);
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            touch-action: none;
        }
        .nm-tab {
            flex: 1;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 3px;
            color: #64748b;
            text-decoration: none;
            font-size: 11px;
            font-weight: 600;
            line-height: 1.1;
            transition: color .15s ease;
        }
        .nm-tab svg {
            width: 22px;
            height: 22px;
            stroke-width: 1.8;
        }
        .nm-tab:hover,
        .nm-tab.is-active {
            color: #9e7132;
        }
        .nm-tab-center-wrap {
            flex: 0 0 60px;
            height: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .nm-tab-mill {
            position: absolute;
            top: -20px;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: #ffffff;
            border: 3px solid #b58948;
            box-shadow: 0 8px 22px rgba(181, 137, 72, .45);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform .2s ease;
        }
        .nm-tab-mill:active {
            transform: scale(0.92);
        }
        .nm-tab-mill img {
            width: 32px;
            height: 32px;
            object-fit: contain;
            display: block;
        }
        /* Mobilde WhatsApp ve Scroll to top butonlarının alt bara çarpmaması için */
        .wa-widget {
            bottom: 74px !important;
        }
        footer button[aria-label="Yukarı çık"],
        button[aria-label="Yukarı çık"] {
            bottom: 74px !important;
        }
    }
</style>

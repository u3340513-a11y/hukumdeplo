@php
    $contact = config('site.contact');
    $allServices = config('content.services.items');

    // E-ticaret referans projeleri
    $ecommerceProjects = [
        [
            'title' => 'Dualtron Türkiye',
            'category' => 'E-Ticaret & Satış',
            'image' => '/images/references/hukumdar-dualtron-web-sitesi-tasarimi-ve-yayina-alma-s-ureci.png',
            'url' => 'dualtron.com.tr',
        ],
        [
            'title' => 'Çiçekçi Dünyası',
            'category' => 'E-Ticaret & Mağaza',
            'image' => '/images/references/hukumdar-cicekci-sitesi-isinizi-dijitalde-b-uy-utmenin-en-renkli-yolu.png',
            'url' => 'cicekcisitesi.com',
        ],
        [
            'title' => 'Loop Bisiklet',
            'category' => 'Spor & E-Ticaret',
            'image' => '/images/references/hukumdar-loop-bisiklet-s-ur-us-keyfi-dijitale-tasindi.jpg',
            'url' => 'loopbisiklet.com',
        ],
        [
            'title' => 'Luwische Kozmetik',
            'category' => 'Kozmetik & Satış',
            'image' => '/images/references/hukumdar-luwische-bilimle-gelen-g-uzellik.jpg',
            'url' => 'luwische.com',
        ],
        [
            'title' => 'Citymate E-Mobilite',
            'category' => 'E-Ticaret & Mağaza',
            'image' => '/images/references/hukumdar-citymate-sehir-dostu-tasima-deneyimi.jpg',
            'url' => 'citymate.com.tr',
        ],
        [
            'title' => 'FRH Design',
            'category' => 'Moda & Butik Satış',
            'image' => '/images/references/hukumdar-frhdesign-el-isciliginde-dijital-dokunus.jpg',
            'url' => 'frhdesign.com',
        ],
        [
            'title' => 'Burger House',
            'category' => 'Online Sipariş',
            'image' => '/images/references/hukumdar-burger-web-sitesi.png',
            'url' => 'burgerhouse.com.tr',
        ],
        [
            'title' => 'Airled Aydınlatma',
            'category' => 'B2B / B2C Satış',
            'image' => '/images/references/hukumdar-airled-aydinlatmanin-yeni-dili.jpg',
            'url' => 'airled.com.tr',
        ],
        [
            'title' => 'Asay Yemek',
            'category' => 'Online Sipariş',
            'image' => '/images/references/hukumdar-asay-yemek-lezzetin-dijital-sunumu.jpg',
            'url' => 'asayyemek.com',
        ],
        [
            'title' => 'Erst Group',
            'category' => 'Global E-İhracat',
            'image' => '/images/references/hukumdar-erst-group-dis-ticarette-dijital-y-uz.jpg',
            'url' => 'erstgroup.com',
        ],
    ];

    // Kampanya paketleri
    $campaignPackages = [
        [
            'badge' => 'Başlangıç',
            'title' => 'Starter E-Ticaret',
            'price' => '14.900',
            'period' => 'tek seferlik',
            'desc' => 'Online satışa hızlıca başlamak isteyen girişimciler ve küçük işletmeler için ideal başlangıç paketi.',
            'features' => [
                'Sınırsız ürün ekleme',
                'Mobil uyumlu modern tasarım',
                '3D Secure sanal POS entegrasyonu',
                'Kargo entegrasyonu (Aras, Yurtiçi, MNG)',
                'WhatsApp sipariş bildirimi',
                'Temel SEO altyapısı',
                'SSL güvenlik sertifikası',
                '1 yıl ücretsiz teknik destek',
            ],
            'highlighted' => false,
        ],
        [
            'badge' => 'En Popüler',
            'title' => 'Profesyonel E-Ticaret',
            'price' => '24.900',
            'period' => 'tek seferlik',
            'desc' => 'Satışlarını hızla ölçeklendirmek isteyen markalar için pazaryeri ve POS entegreli güçlü altyapı.',
            'features' => [
                'Starter paketteki tüm özellikler',
                '21 banka anlaşmalı sanal POS',
                'Pazaryeri entegrasyonu (N11, HB, Amazon)',
                'XML ürün besleme & bayi çıktısı',
                'Kampanya & kupon modülü',
                'İleri düzey SEO & hız optimizasyonu',
                'Google Analytics & Search Console kurulumu',
                '2 yıl ücretsiz teknik destek',
            ],
            'highlighted' => true,
        ],
        [
            'badge' => 'Kurumsal',
            'title' => 'Enterprise E-Ticaret',
            'price' => 'Teklif Alın',
            'period' => 'projeye özel',
            'desc' => 'Yüksek hacimli satış yapan markalar için özel geliştirme, ERP entegrasyonu ve mobil uygulama.',
            'features' => [
                'Profesyonel paketteki tüm özellikler',
                'iOS & Android mobil uygulama',
                'ERP & muhasebe entegrasyonu',
                'B2B bayi paneli',
                'Çoklu dil & çoklu para birimi',
                'Özel modül geliştirme',
                'Yük dengeleme & CDN altyapısı',
                'Öncelikli 7/24 teknik destek',
            ],
            'highlighted' => false,
        ],
    ];

    // SSS Öğeleri
    $faqs = [
        [
            'q' => 'E-ticaret sitesi açmak için ne kadar bütçe ayırmalıyım?',
            'a' => 'E-ticaret yatırımınızın bütçesi; ürün sayınıza, istediğiniz entegrasyonlara (pazaryeri, ERP, mobil uygulama vb.) ve özel modül ihtiyaçlarınıza göre şekillenir. Starter paketimiz 14.900 TL\'den başlayarak küçük işletmelere hızlı bir başlangıç sunar. İhtiyaçlarınızı analiz ettiğimiz ücretsiz keşif görüşmesinde bütçenize en uygun ve en verimli çözümü birlikte belirleriz.'
        ],
        [
            'q' => 'Mevcut e-ticaret sitemi sizin sisteminize taşıyabilir miyim?',
            'a' => 'Kesinlikle! WordPress/WooCommerce, OpenCart, Shopify, Ticimax, IdeaSoft veya herhangi bir platformdan ürünlerinizi, müşteri verilerinizi ve sipariş geçmişinizi güvenli bir şekilde yeni sisteme taşıyoruz. Taşıma sürecinde siteniz yayında kalmaya devam eder, geçiş anında eski siteniz otomatik olarak yeni adrese yönlendirilir.'
        ],
        [
            'q' => 'Pazaryeri entegrasyonu nasıl çalışıyor?',
            'a' => 'E-ticaret sitenizden eklediğiniz ürünler otomatik olarak Hepsiburada, N11, Amazon.com.tr, ePttAVM ve InstaShop gibi pazaryerlerine aktarılır. Tüm pazaryerlerinden gelen siparişlerinizi tek bir yönetim panelinden takip eder, stok ve fiyat değişikliklerini merkezi olarak güncelersiniz. Bu sayede operasyon süreniz dramatik şekilde düşer.'
        ],
        [
            'q' => 'E-ticaret sitem ne kadar sürede hazır olur?',
            'a' => 'Starter paket ortalama 10 iş günü, Profesyonel paket 15-20 iş günü içerisinde teslim edilir. Enterprise projelerde kapsam analizi sonrası net teslim tarihi taahhüt edilir. Tüm paketlerde; tasarım, ürün girişi, ödeme entegrasyonu, kargo bağlantısı ve SEO yapılandırması dahildir.'
        ],
        [
            'q' => 'Kampanya fiyatları sürekli mi geçerli?',
            'a' => 'Kampanya fiyatlarımız belirli dönemlerde güncellenmektedir. Mevcut fiyatlar stok ve kapasite durumuna göre değişebilir. En güncel fiyat ve kampanya bilgisi için WhatsApp üzerinden veya telefon ile iletişime geçmenizi öneririz. Anlaşma tarihindeki fiyat sabitlenir ve ek bir ücret talep edilmez.'
        ],
    ];
@endphp

<x-layouts.app
    seoTitle="E-Ticaret Kampanyaları — Özel Fiyatlı E-Ticaret Paketleri"
    description="Hükümdar Bilişim'in özel kampanyalı e-ticaret paketleriyle online satışa hemen başlayın. 21 banka sanal POS, pazaryeri entegrasyonu ve mobil uygulama dahil."
    keywords="e-ticaret kampanyaları, e-ticaret paketi fiyatları, ucuz e-ticaret sitesi, online mağaza açmak, e-ticaret yazılımı kampanya, hükümdar bilişim e-ticaret"
    :breadcrumbs="[['label' => 'Hizmetlerimiz', 'href' => '/hizmetler'], ['label' => 'E-Ticaret Kampanyaları']]">

    {{-- Kayan Marquee CSS --}}
    <style>
        .hk-marquee-wrap {
            overflow: hidden;
            position: relative;
            width: 100%;
            padding: 10px 0 20px 0;
            mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);
            -webkit-mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);
        }
        .hk-marquee-track {
            display: flex;
            gap: 18px;
            width: max-content;
            animation: hk-marquee-anim 32s linear infinite;
        }
        .hk-marquee-wrap:hover .hk-marquee-track {
            animation-play-state: paused;
        }
        @keyframes hk-marquee-anim {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-50% - 9px)); }
        }

        .hk-mockup-card {
            width: 270px;
            min-width: 270px;
            max-width: 270px;
            flex: 0 0 270px;
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.07);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .hk-mockup-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 28px -4px rgba(181, 137, 72, 0.22);
            border-color: #dfc18d;
        }
        .hk-mockup-header {
            height: 26px;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
        }
        .hk-mockup-dots {
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .hk-mockup-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            display: inline-block;
        }
        .hk-mockup-dot-red { background: #ff5f56; }
        .hk-mockup-dot-yellow { background: #ffbd2e; }
        .hk-mockup-dot-green { background: #27c93f; }

        .hk-mockup-url-bar {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            padding: 1px 7px;
            font-size: 10px;
            font-family: monospace;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 4px;
            max-width: 140px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .hk-mockup-body {
            height: 155px;
            width: 100%;
            overflow: hidden;
            background: #f1f5f9;
            position: relative;
        }
        .hk-mockup-body img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top;
            transition: transform 0.5s ease;
            display: block;
        }
        .hk-mockup-card:hover .hk-mockup-body img {
            transform: scale(1.05);
        }
        .hk-mockup-footer {
            padding: 8px 12px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid #f1f5f9;
        }
        .hk-mockup-title {
            font-size: 12px;
            font-weight: 700;
            color: #0f172a;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px;
        }
        .hk-mockup-badge {
            font-size: 10px;
            font-weight: 600;
            color: #b58948;
            background: #fbf7ee;
            padding: 2px 7px;
            border-radius: 9999px;
        }

        /* Kampanya Paket Kartları */
        .hk-campaign-card {
            position: relative;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            padding: 36px 28px 28px;
            transition: all 0.4s ease;
            display: flex;
            flex-direction: column;
        }
        .hk-campaign-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 48px -12px rgba(15, 23, 42, 0.12);
        }
        .hk-campaign-card--highlighted {
            border-color: #b58948;
            box-shadow: 0 12px 36px -8px rgba(181, 137, 72, 0.25);
        }
        .hk-campaign-card--highlighted:hover {
            box-shadow: 0 28px 56px -12px rgba(181, 137, 72, 0.35);
        }
        .hk-campaign-badge {
            position: absolute;
            top: -13px;
            left: 50%;
            transform: translateX(-50%);
            padding: 5px 20px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            white-space: nowrap;
        }
        .hk-campaign-badge--normal {
            background: #f1f5f9;
            color: #475569;
            border: 1px solid #e2e8f0;
        }
        .hk-campaign-badge--highlighted {
            background: linear-gradient(135deg, #b58948, #d4af37);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(181, 137, 72, 0.4);
        }
    </style>

    {{-- =========================================================================
         BÖLÜM 1: HERO
         ========================================================================= --}}
    <x-page-hero
        eyebrow="E-Ticaret Kampanyaları"
        title="E-Ticaret Kampanyaları"
        description="İşletmenizi online satışa taşıyacak özel kampanyalı e-ticaret paketleri. 21 banka POS, pazaryeri entegrasyonu ve mobil uygulama dahil."
        bgImage="/images/e-ticaret-hero.png"
        :breadcrumbs="[['label' => 'Hizmetler', 'href' => '/hizmetler'], ['label' => 'E-Ticaret Kampanyaları']]">
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="#paketler" class="btn btn-primary">
                Kampanya Paketlerini İncele <x-icon name="arrow-right" class="h-4 w-4" />
            </a>
            <a onclick="gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD'); return false;" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact['phone'] ?? '905321389808') }}?text={{ urlencode('Merhaba, E-Ticaret Kampanyaları hakkında bilgi ve fiyat teklifi almak istiyorum.') }}" target="_blank" rel="noopener" class="btn border border-white/30 bg-white/10 text-white shadow-sm backdrop-blur-sm transition duration-300 hover:bg-white/20 hover:border-white/50">
                <x-icon name="whatsapp" class="h-5 w-5 text-emerald-400" /> Hızlı soru sorun
            </a>
        </div>
    </x-page-hero>

    {{-- KAYAN E-TİCARET SİTE GÖRÜNTÜLERİ --}}
    <section class="border-b border-ink-100 bg-surface-muted/50 pt-7 pb-6 overflow-hidden">
        <div class="container-page mb-3 flex items-center justify-between text-xs font-semibold uppercase tracking-wider text-ink-400">
            <span class="flex items-center gap-2">
                <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span> Canlı E-Ticaret Referans Çalışmalarımız
            </span>
            <span class="hidden sm:inline text-ink-400">Önizlemek için üzerine gelin</span>
        </div>

        <div class="hk-marquee-wrap">
            <div class="hk-marquee-track">
                @foreach (array_merge($ecommerceProjects, $ecommerceProjects) as $item)
                    <div class="hk-mockup-card">
                        <div class="hk-mockup-header">
                            <div class="hk-mockup-dots">
                                <span class="hk-mockup-dot hk-mockup-dot-red"></span>
                                <span class="hk-mockup-dot hk-mockup-dot-yellow"></span>
                                <span class="hk-mockup-dot hk-mockup-dot-green"></span>
                            </div>
                            <div class="hk-mockup-url-bar">
                                <svg style="width: 10px; height: 10px; flex-shrink: 0; color: #10b981;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <span>{{ $item['url'] }}</span>
                            </div>
                            <div style="width: 20px;"></div>
                        </div>
                        <div class="hk-mockup-body">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" loading="lazy" />
                        </div>
                        <div class="hk-mockup-footer">
                            <div class="hk-mockup-title">{{ $item['title'] }}</div>
                            <div class="hk-mockup-badge">{{ $item['category'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- =========================================================================
         BÖLÜM 2: KAMPANYA PAKETLERİ
         ========================================================================= --}}
    <section id="paketler" class="section-y relative scroll-mt-24">
        <div class="container-page">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-100/70 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-800">
                    <x-icon name="cart" class="h-3.5 w-3.5 text-brand-600" /> Kampanya Paketleri
                </span>
                <h2 class="mt-4 font-display text-2xl font-extrabold tracking-tight text-ink-950 sm:text-4xl">
                    İşletmenize En Uygun E-Ticaret Paketini Seçin
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-ink-600 sm:text-base">
                    Her bütçeye ve ihtiyaca uygun kampanyalı e-ticaret paketlerimizle online satışa hemen başlayın.
                </p>
            </div>

            <div class="mt-14 grid gap-8 lg:grid-cols-3">
                @foreach ($campaignPackages as $pkg)
                    <div class="hk-campaign-card {{ $pkg['highlighted'] ? 'hk-campaign-card--highlighted' : '' }}">
                        <span class="hk-campaign-badge {{ $pkg['highlighted'] ? 'hk-campaign-badge--highlighted' : 'hk-campaign-badge--normal' }}">
                            {{ $pkg['badge'] }}
                        </span>

                        <h3 class="mt-4 text-xl font-extrabold text-ink-900">{{ $pkg['title'] }}</h3>
                        <p class="mt-2 text-sm text-ink-500">{{ $pkg['desc'] }}</p>

                        <div class="mt-6 flex items-baseline gap-1">
                            @if ($pkg['price'] === 'Teklif Alın')
                                <span class="font-display text-3xl font-extrabold text-brand-700">Teklif Alın</span>
                            @else
                                <span class="font-display text-3xl font-extrabold text-brand-700">{{ $pkg['price'] }}</span>
                                <span class="text-sm font-semibold text-ink-400">₺</span>
                            @endif
                            <span class="ml-1 text-xs text-ink-400">/ {{ $pkg['period'] }}</span>
                        </div>

                        <ul class="mt-6 flex-1 space-y-3">
                            @foreach ($pkg['features'] as $feature)
                                <li class="flex items-start gap-2.5 text-sm text-ink-600">
                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>

                        <a onclick="gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD'); return false;" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact['phone'] ?? '905321389808') }}?text={{ urlencode('Merhaba, ' . $pkg['title'] . ' paketi hakkında bilgi almak istiyorum.') }}" target="_blank" rel="noopener"
                           class="mt-8 flex items-center justify-center gap-2 rounded-2xl px-6 py-3.5 text-sm font-bold transition duration-300 {{ $pkg['highlighted'] ? 'bg-gradient-to-r from-brand-600 to-brand-700 text-white shadow-lg shadow-brand-500/30 hover:shadow-brand-500/50 hover:-translate-y-0.5' : 'border border-ink-200 bg-white text-ink-800 hover:border-brand-300 hover:bg-brand-50 hover:text-brand-700' }}">
                            <x-icon name="whatsapp" class="h-5 w-5" />
                            {{ $pkg['price'] === 'Teklif Alın' ? 'Teklif İsteyin' : 'Bu Paketi Seçin' }}
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Kampanya Notu --}}
            <div class="mx-auto mt-10 max-w-2xl rounded-2xl border border-brand-200/60 bg-brand-50/50 p-5 text-center">
                <p class="text-sm text-ink-600">
                    <strong class="text-brand-700">Tüm paketlere dahil:</strong> Domain, hosting, SSL sertifikası, Google Analytics kurulumu, sitemap.xml, robots.txt ve 7/24 WhatsApp destek hattı.
                </p>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         BÖLÜM 3: E-TİCARET ÖZELLİKLERİ (6 KART)
         ========================================================================= --}}
    <section class="section-y relative bg-surface-muted/60 border-y border-ink-100/80">
        <div class="container-page">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full border border-brand-200 bg-brand-50 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-800">
                    <x-icon name="sparkles" class="h-3.5 w-3.5 text-brand-600" /> Neler Sunuyoruz?
                </span>
                <h2 class="mt-4 font-display text-2xl font-extrabold tracking-tight text-ink-950 sm:text-4xl">
                    E-Ticaret Yazılımımızın Güçlü Özellikleri
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-ink-600 sm:text-base">
                    Kendi kendine yetebilen, ölçeklenebilir ve güvenli e-ticaret altyapınız.
                </p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div class="group rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-elevated">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white">
                        <x-icon name="cart" class="h-6 w-6" />
                    </span>
                    <h3 class="mt-5 text-base font-bold text-ink-900">Stok & Sınırsız Ürün Yönetimi</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Varyantlı veya tek olarak sınırsız ürün ekleyin, Excel ve XML ile toplu ürün yükleyin ve bayilerinize XML çıktısı verin.
                    </p>
                </div>

                <div class="group rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-elevated">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white">
                        <x-icon name="target" class="h-6 w-6" />
                    </span>
                    <h3 class="mt-5 text-base font-bold text-ink-900">Pazaryeri Entegrasyonları</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Hepsiburada, N11, Amazon.com.tr, ePttAVM ve InstaShop siparişlerinizi tek panelden yönetin.
                    </p>
                </div>

                <div class="group rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-elevated">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white">
                        <x-icon name="shield" class="h-6 w-6" />
                    </span>
                    <h3 class="mt-5 text-base font-bold text-ink-900">21 Banka Anlaşmalı Sanal POS</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        3D Secure destekli 21 banka sanal POS, havale/EFT bildirimleri ve kapıda ödeme seçenekleriyle kolay ödeme alın.
                    </p>
                </div>

                <div class="group rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-elevated">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white">
                        <x-icon name="bolt" class="h-6 w-6" />
                    </span>
                    <h3 class="mt-5 text-base font-bold text-ink-900">Sipariş & Kargo Otomasyonu</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Sipariş durum, kargo takibi, iptal/iade ve arıza bildirimlerini tek ekrandan yönetin. Otomatik kargo barkodu oluşturma dahil.
                    </p>
                </div>

                <div class="group rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-elevated">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white">
                        <x-icon name="sparkles" class="h-6 w-6" />
                    </span>
                    <h3 class="mt-5 text-base font-bold text-ink-900">Kampanya & WhatsApp Sipariş</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Vitrin yönetimi, kampanya modülleri, kupon sistemi, müşteri soru-cevap ve WhatsApp üzerinden sipariş alma.
                    </p>
                </div>

                <div class="group rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-elevated">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white">
                        <x-icon name="search" class="h-6 w-6" />
                    </span>
                    <h3 class="mt-5 text-base font-bold text-ink-900">SEO & Sosyal Medya Uyumlu</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Arama motorlarına ve sosyal medya mağazalarına tam uyumlu, hızlı açılan ve ölçeklenebilir modern mimari.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         BÖLÜM 4: NEDEN BİZİ SEÇMELİSİNİZ (İKNA BLOĞU)
         ========================================================================= --}}
    <section class="section-y relative bg-ink-950 text-white overflow-hidden">
        <div class="pointer-events-none absolute -left-40 top-0 h-96 w-96 rounded-full bg-brand-500/20 blur-[130px]"></div>
        <div class="pointer-events-none absolute right-0 bottom-0 h-96 w-96 rounded-full bg-brand-600/15 blur-[120px]"></div>

        <div class="container-page relative z-10">
            <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-7">
                    <span class="inline-flex items-center gap-2 rounded-full border border-brand-400/30 bg-brand-500/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-400"></span> Neden Hükümdar?
                    </span>
                    <h2 class="mt-4 font-display text-2xl font-extrabold tracking-tight text-white sm:text-4xl lg:text-5xl lg:leading-tight">
                        E-Ticarette Başarınız <br class="hidden sm:inline"/>
                        <span class="text-gradient">Bizim Uzmanlığımız.</span>
                    </h2>
                    <p class="mt-6 text-sm leading-relaxed text-ink-300 sm:text-base sm:leading-relaxed">
                        2009 yılından bu yana e-ticaret, e-ihracat ve dijital pazarlama alanında yüzlerce markayı başarılı şekilde online satışa taşıdık. Güçlü ve güvenli ödeme altyapısına sahip e-ticaret yazılımımız stok ve sipariş akışını otomatikleştirir, operasyon maliyetlerini düşürür ve dönüşüm oranlarını yukarı taşır.
                    </p>
                    <p class="mt-4 text-sm leading-relaxed text-ink-300 sm:text-base sm:leading-relaxed">
                        Her e-ticaret projesinde sadece bir web sitesi değil, kendi kendine yetebilen ve satış kanallarınızı tek merkezden yönetebildiğiniz eksiksiz bir ticaret altyapısı kuruyoruz.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="/referanslar" class="btn btn-primary px-6 py-3 text-sm font-semibold">
                            E-Ticaret Projelerimiz <x-icon name="arrow-right" class="h-4 w-4" />
                        </a>
                        <a onclick="gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD'); return false;" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact['phone'] ?? '905321389808') }}?text={{ urlencode('Merhaba, E-Ticaret Kampanyaları hakkında detaylı bilgi almak istiyorum.') }}" target="_blank" rel="noopener" class="btn btn-ghost px-6 py-3 text-sm font-semibold text-white border border-white/20 hover:bg-white/10">
                            Ücretsiz Danışmanlık
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-md text-center transition hover:border-brand-500/40">
                        <div class="font-display text-3xl sm:text-4xl font-extrabold text-brand-400">300+</div>
                        <div class="mt-2 text-xs sm:text-sm font-semibold text-ink-200">Tamamlanan E-Ticaret Projesi</div>
                        <p class="mt-1 text-[11px] text-ink-400">2009'dan bu yana</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-md text-center transition hover:border-brand-500/40">
                        <div class="font-display text-3xl sm:text-4xl font-extrabold text-brand-400">21</div>
                        <div class="mt-2 text-xs sm:text-sm font-semibold text-ink-200">Banka POS Entegrasyonu</div>
                        <p class="mt-1 text-[11px] text-ink-400">3D Secure destekli</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-md text-center transition hover:border-brand-500/40">
                        <div class="font-display text-3xl sm:text-4xl font-extrabold text-brand-400">5+</div>
                        <div class="mt-2 text-xs sm:text-sm font-semibold text-ink-200">Pazaryeri Entegrasyonu</div>
                        <p class="mt-1 text-[11px] text-ink-400">N11, HB, Amazon, ePttAVM</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-md text-center transition hover:border-brand-500/40">
                        <div class="font-display text-3xl sm:text-4xl font-extrabold text-brand-400">7/24</div>
                        <div class="mt-2 text-xs sm:text-sm font-semibold text-ink-200">Teknik Destek</div>
                        <p class="mt-1 text-[11px] text-ink-400">WhatsApp & telefon</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         BÖLÜM 5: SIKÇA SORULAN SORULAR
         ========================================================================= --}}
    <section class="section-y relative bg-white" x-data="{ activeFaq: 0 }">
        <div class="container-page">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full border border-brand-200 bg-brand-50 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-800">
                    <x-icon name="sparkles" class="h-3.5 w-3.5 text-brand-600" /> Sıkça Sorulan Sorular
                </span>
                <h2 class="mt-4 font-display text-2xl font-extrabold tracking-tight text-ink-950 sm:text-4xl">
                    E-Ticaret Kampanyaları Hakkında Merak Edilenler
                </h2>
            </div>

            <div class="mx-auto mt-12 max-w-3xl divide-y divide-ink-100 rounded-3xl border border-ink-200/90 bg-white p-6 sm:p-8 shadow-card">
                @foreach ($faqs as $i => $faq)
                    <div class="py-5 first:pt-0 last:pb-0">
                        <button
                            type="button"
                            @click="activeFaq = (activeFaq === {{ $i }} ? null : {{ $i }})"
                            class="flex w-full items-center justify-between text-left gap-4 transition group">
                            <span class="text-sm sm:text-base font-bold text-ink-900 group-hover:text-brand-700 transition">
                                {{ $faq['q'] }}
                            </span>
                            <span
                                class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-600 transition-transform duration-300 ring-1 ring-brand-100"
                                :class="activeFaq === {{ $i }} ? 'rotate-180 bg-brand-600 text-white' : ''">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>
                        <div
                            x-show="activeFaq === {{ $i }}"
                            x-collapse
                            x-cloak
                            class="mt-3.5 pr-8">
                            <p class="text-xs leading-relaxed text-ink-600 sm:text-sm sm:leading-relaxed">
                                {{ $faq['a'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- WhatsApp Bandı --}}
            <div class="mx-auto mt-12 max-w-3xl rounded-2xl border border-brand-200/70 bg-gradient-to-r from-brand-50/80 via-white to-brand-50/50 p-6 text-center sm:flex sm:items-center sm:justify-between sm:text-left">
                <div class="flex items-center gap-3.5 justify-center sm:justify-start">
                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-brand-600 text-white shadow-brand">
                        <x-icon name="whatsapp" class="h-5 w-5" />
                    </span>
                    <div>
                        <div class="text-sm font-bold text-ink-900">E-ticaret kampanyalarımız hakkında sorunuz mu var?</div>
                        <div class="text-xs text-ink-500">Müşteri danışmanımızla WhatsApp üzerinden hemen görüşün.</div>
                    </div>
                </div>
                <a onclick="gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD'); return false;" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact['phone'] ?? '905321389808') }}?text={{ urlencode('Merhaba, E-Ticaret Kampanyaları hakkında detaylı bilgi almak istiyorum.') }}" target="_blank" rel="noopener" class="btn btn-primary mt-4 sm:mt-0 text-xs font-semibold px-5 py-2.5 shrink-0">
                    WhatsApp ile Danışın
                </a>
            </div>
        </div>
    </section>

    <x-sections.cta-band />

</x-layouts.app>

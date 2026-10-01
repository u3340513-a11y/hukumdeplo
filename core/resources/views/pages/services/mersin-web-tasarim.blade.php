@php
    $contact = config('site.contact');
    $allServices = config('content.services.items');

    // Kayan referans mockupları için seçilen gerçek kurumsal projeler
    $marqueeProjects = [
        [
            'title' => 'BAM Arabuluculuk',
            'category' => 'Kurumsal Web',
            'image' => '/images/references/hukumdar-bam-birlesik-arabuluculuk-merkezleri-kurumsal-web-sitesi.jpg',
            'url' => 'bamarabuluculuk.com.tr'
        ],
        [
            'title' => 'Batuhan Yatching',
            'category' => 'Yat & Turizm',
            'image' => '/images/references/hukumdar-batuhan-yatching-maviliklerle-bulusan-dijital-deneyim.jpg',
            'url' => 'batuhanyatching.com'
        ],
        [
            'title' => 'Airled Aydınlatma',
            'category' => 'Sanayi & Üretim',
            'image' => '/images/references/hukumdar-airled-aydinlatmanin-yeni-dili.jpg',
            'url' => 'airled.com.tr'
        ],
        [
            'title' => 'Lacivert Mimarlık',
            'category' => 'Mimarlık & Tasarım',
            'image' => '/images/references/hukumdar-lacivert-mimarlik-end-ustriyel-c-oz-umler-icin-dijital-vitrin.jpg',
            'url' => 'lacivertmimarlik.com'
        ],
        [
            'title' => 'Citymate Taşımacılık',
            'category' => 'Lojistik Portalı',
            'image' => '/images/references/hukumdar-citymate-sehir-dostu-tasima-deneyimi.jpg',
            'url' => 'citymate.com.tr'
        ],
        [
            'title' => 'Dualtron Scooter',
            'category' => 'Lansman & E-Ticaret',
            'image' => '/images/references/hukumdar-dualtron-web-sitesi-tasarimi-ve-yayina-alma-s-ureci.png',
            'url' => 'dualtron.com.tr'
        ],
        [
            'title' => 'Loca Hill Sapanca',
            'category' => 'Butik Otel & Konsept',
            'image' => '/images/references/hukumdar-loca-hill-dogayla-ic-ice-bir-dijital-deneyim.png',
            'url' => 'locahill.com'
        ],
        [
            'title' => 'Past & Future Klinik',
            'category' => 'Sağlık & Estetik',
            'image' => '/images/references/hukumdar-past-future-estetik-kliniklere-acilan-dijital-kapi.jpg',
            'url' => 'pastfuture.com.tr'
        ],
        [
            'title' => 'Erst Group',
            'category' => 'Dış Ticaret',
            'image' => '/images/references/hukumdar-erst-group-dis-ticarette-dijital-y-uz.jpg',
            'url' => 'erstgroup.com'
        ],
        [
            'title' => 'Burger House',
            'category' => 'Gastronomi & Menü',
            'image' => '/images/references/hukumdar-burger-web-sitesi.png',
            'url' => 'burgerhouse.com.tr'
        ],
    ];

    // Mersin İlçeleri
    $mersinDistricts = [
        'Tarsus', 'Silifke', 'Erdemli', 'Mut', 'Anamur',
        'Mezitli', 'Yenişehir', 'Toroslar', 'Akdeniz',
        'Gülnar', 'Aydıncık', 'Bozyazı', 'Çamlıyayla',
    ];

    // SSS Öğeleri (Mersin'e özel)
    $faqs = [
        [
            'q' => 'Mersin\'deki işletmeler neden profesyonel web sitesine ihtiyaç duyar?',
            'a' => 'Mersin; Türkiye\'nin en büyük limanlarından birine ev sahipliği yapan, sanayi, ihracat, lojistik ve turizm sektörleriyle öne çıkan stratejik bir şehirdir. Yerel ve ulusal müşterilerin Google\'da yoğun arama yaptığı bu rekabetçi ortamda üst sıralarda yer almak, sanayi firmaları, perakendeciler, restoran ve konaklama işletmeleri için doğrudan müşteri kazanımı anlamına gelir. Profesyonel bir web sitesi, Mersin\'deki işletmenizi 7/24 açık dijital bir şubeye dönüştürür.'
        ],
        [
            'q' => 'Mersin dışında bir ajansla çalışmanın dezavantajı var mı?',
            'a' => 'Tam tersine avantajı vardır. Hükümdar Bilişim olarak 16 yılı aşkın kurumsal deneyimimiz ve bilgisayar mühendisi kadromuzla Türkiye\'nin her noktasından müşterilerimize hizmet veriyoruz. İletişim süreçlerimiz tamamen dijitaldir; WhatsApp, telefon ve ekran paylaşımı ile toplantılar yapıyor, 24 saat içinde teklifinizi sunuyoruz. İstanbul merkezli olmamız, sektörel trendleri ve en güncel teknolojileri projenize yansıtmamızı sağlar.'
        ],
        [
            'q' => 'Mersin sanayi ve ihracat sektörüne özel web tasarım çözümleriniz var mı?',
            'a' => 'Evet! Mersin\'in güçlü sanayi ve liman lojistiği yapısına özel; ürün kataloğu, fiyat teklif formu, çoklu dil desteği (İngilizce, Arapça, Rusça), müşteri portalı ve B2B arayüzler geliştiriyoruz. Turizm ve konaklama sektörü için ise online rezervasyon modülü ve Google Haritalar entegrasyonu standarttır.'
        ],
        [
            'q' => 'Projemin maliyeti ve fiyatlandırma nasıl belirlenir?',
            'a' => 'Sabit ve kalıplaşmış tek bir fiyat vermek yerine projenizi mimari bir yapı gibi ele alıyoruz: Sayfa sayısı, tasarım özgünlüğü, özel modüller (teklif formu, hesaplama araçları, B2B/B2C panel vb.) ve entegrasyonlar maliyeti belirler. İhtiyaçlarınızı analiz ettiğimiz ücretsiz bir keşif görüşmesi yaparak size özel, şeffaf ve bütçenizi en verimli kullanan teklifi sunuyoruz.'
        ],
        [
            'q' => 'Mersin\'deki web sitem ne kadar sürede teslim edilir?',
            'a' => 'Standart kurumsal web sitelerimiz ortalama 7 ila 14 iş günü içerisinde tasarım, içerik yerleşimi, mobil optimizasyon, hız testleri ve SEO yapılandırmaları eksiksiz tamamlanarak yayına hazır hale getirilir. Özel yazılım ve kapsamlı entegrasyon içeren projelerde ise teslim süresi proje başlangıcındaki iş planında net olarak taahhüt edilir.'
        ],
    ];
@endphp

<x-layouts.app
    seoTitle="Mersin Web Tasarım — Profesyonel Kurumsal Web Sitesi Hizmetleri"
    description="Mersin, Tarsus, Silifke ve Erdemli'deki işletmeniz için SEO uyumlu, mobil öncelikli ve yüksek hızlı kurumsal web tasarım çözümleri. Yerel SEO ile Google'da üst sıralara çıkın."
    keywords="mersin web tasarım, mersin web sitesi, tarsus web tasarım, silifke web sitesi, erdemli web tasarım, mersin kurumsal web sitesi, mersin seo, mersin e-ticaret, hükümdar bilişim mersin"
    :breadcrumbs="[['label' => 'Hizmetlerimiz', 'href' => '/hizmetler'], ['label' => 'Mersin Web Tasarım']]">

    {{-- Kayan Marquee ve Mockup Özel CSS --}}
    <style>
        .hk-web-hero {
            padding-top: 155px !important;
            padding-bottom: 45px;
            position: relative;
            overflow: hidden;
            background: radial-gradient(circle at 50% 20%, rgba(181, 137, 72, 0.08) 0%, rgba(255, 255, 255, 1) 70%);
        }
        @media (max-width: 768px) {
            .hk-web-hero {
                padding-top: 135px !important;
                padding-bottom: 35px;
            }
        }
        .hk-marquee-wrap {
            overflow: hidden;
            position: relative;
            width: 100%;
            padding: 15px 0 25px 0;
            mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);
            -webkit-mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);
        }
        .hk-marquee-track {
            display: flex;
            gap: 18px;
            width: max-content;
            animation: hk-marquee-anim 30s linear infinite;
        }
        .hk-marquee-wrap:hover .hk-marquee-track {
            animation-play-state: paused;
        }
        @keyframes hk-marquee-anim {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-50% - 9px)); }
        }

        /* Mockup Kart Tasarımı */
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

        /* Hero Başlık ve Buton Stilleri */
        .hk-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 18px;
            border-radius: 9999px;
            background: #fbf7ee;
            border: 1px solid #ebd7b5;
            color: #94682c;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            box-shadow: 0 2px 8px rgba(181, 137, 72, 0.08);
            margin-bottom: 22px;
        }
        .hk-hero-badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #b58948;
            box-shadow: 0 0 0 3px rgba(181, 137, 72, 0.25);
            display: inline-block;
        }
        .hk-hero-title {
            font-size: clamp(32px, 4.5vw, 56px);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -0.025em;
            color: #0f172a;
            max-width: 850px;
            margin: 0 auto 20px auto;
        }
        .hk-gold-text {
            background: linear-gradient(135deg, #b58948 0%, #d4af37 45%, #94682c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }
        .hk-hero-desc {
            font-size: clamp(15px, 1.8vw, 17px);
            line-height: 1.75;
            color: #475569;
            max-width: 660px;
            margin: 0 auto 30px auto;
        }
        .hk-hero-btns {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 14px;
        }
        .hk-btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 30px;
            border-radius: 9999px;
            background: linear-gradient(135deg, #b58948 0%, #94682c 100%);
            color: #ffffff !important;
            font-size: 14px;
            font-weight: 700;
            box-shadow: 0 10px 24px -4px rgba(181, 137, 72, 0.45);
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .hk-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px -4px rgba(181, 137, 72, 0.6);
            color: #ffffff !important;
        }
        .hk-btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            border-radius: 9999px;
            background: #ffffff;
            color: #1e293b !important;
            border: 1.5px solid #e2e8f0;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .hk-btn-secondary:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            transform: translateY(-2px);
            color: #0f172a !important;
        }

        /* İlçe Etiketleri */
        .hk-district-tag {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 14px;
            border-radius: 9999px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            color: #475569;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.25s ease;
        }
        .hk-district-tag:hover {
            border-color: #dfc18d;
            color: #94682c;
            background: #fbf7ee;
        }
    </style>

    {{-- =========================================================================
         BÖLÜM 1: HERO & KAYAN SİTE GÖRÜNTÜLERİ (MOCKUP SLIDER)
         ========================================================================= --}}
    <section class="hk-web-hero">
        <div class="container-page text-center">
            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
                <ol style="display: flex; align-items: center; justify-content: center; gap: 8px; font-size: 13px; color: #94a3b8; list-style: none; padding: 0; margin: 0;">
                    <li><a href="/" style="color: #64748b; text-decoration: none;" onmouseover="this.style.color='#b58948'" onmouseout="this.style.color='#64748b'">Anasayfa</a></li>
                    <li style="color: #cbd5e1;">/</li>
                    <li><a href="/hizmetler" style="color: #64748b; text-decoration: none;" onmouseover="this.style.color='#b58948'" onmouseout="this.style.color='#64748b'">Hizmetlerimiz</a></li>
                    <li style="color: #cbd5e1;">/</li>
                    <li style="color: #b58948; font-weight: 600;">Mersin Web Tasarım</li>
                </ol>
            </nav>

            {{-- Rozet / Pill --}}
            <div>
                <div class="hk-hero-badge">
                    <span class="hk-hero-badge-dot"></span>
                    <span>Mersin Web Tasarım Çözümleri</span>
                </div>
            </div>

            {{-- Ana Başlık (H1) --}}
            <h1 class="hk-hero-title">
                Mersin'de İşletmenizi <br class="hidden sm:inline" />
                <span class="hk-gold-text">Dijitalde Zirveye Taşıyın.</span>
            </h1>

            {{-- Alt Açıklama --}}
            <p class="hk-hero-desc">
                Tarsus'tan Silifke'ye, Erdemli'den Anamur'a kadar Mersin'in tüm ilçelerindeki işletmelere kurumsal, hızlı ve SEO uyumlu web tasarım çözümleri sunuyoruz.
            </p>

            {{-- CTA Butonları --}}
            <div class="hk-hero-btns">
                <a onclick="gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD'); return false;" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact['phone'] ?? '905321389808') }}?text={{ urlencode('Merhaba, Mersin bölgesindeki işletmem için web tasarım hizmeti ve fiyat teklifi almak istiyorum.') }}" target="_blank" rel="noopener" class="hk-btn-primary">
                    <x-icon name="whatsapp" class="h-4 w-4" />
                    <span>Hemen Teklif Alın</span>
                </a>
                <a href="#ozellikler" class="hk-btn-secondary">
                    <span>Hizmetleri Keşfedin</span>
                    <svg style="width: 14px; height: 14px; color: #94a3b8;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </a>
            </div>

            {{-- Mersin İlçe Etiketleri --}}
            <div style="margin-top: 30px; display: flex; flex-wrap: wrap; justify-content: center; gap: 8px;">
                @foreach ($mersinDistricts as $district)
                    <span class="hk-district-tag">
                        <svg style="width: 10px; height: 10px; color: #b58948;" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        {{ $district }}
                    </span>
                @endforeach
            </div>
        </div>

        {{-- KAYAN SİTE GÖRÜNTÜLERİ (KOMPAKT & ŞIK MOCKUPLAR) --}}
        <div class="mt-12 sm:mt-14">
            <div class="container-page mb-3 flex items-center justify-between text-xs font-semibold uppercase tracking-wider text-ink-400">
                <span class="flex items-center gap-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span> Canlı Referans Çalışmalarımız
                </span>
                <span class="hidden sm:inline text-ink-400">Önizlemek için üzerine gelin</span>
            </div>

            <div class="hk-marquee-wrap">
                <div class="hk-marquee-track">
                    {{-- 10 Proje + Kesintisiz sonsuz döngü için 1 tekrar --}}
                    @foreach (array_merge($marqueeProjects, $marqueeProjects) as $item)
                        <div class="hk-mockup-card">
                            {{-- Browser Başlık Çubuğu --}}
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

                            {{-- Site Görseli (Kompakt 155px Yükseklik) --}}
                            <div class="hk-mockup-body">
                                <img
                                    src="{{ $item['image'] }}"
                                    alt="{{ $item['title'] }}"
                                    loading="lazy" />
                            </div>

                            {{-- Alt Bilgi Alanı --}}
                            <div class="hk-mockup-footer">
                                <div class="hk-mockup-title">{{ $item['title'] }}</div>
                                <div class="hk-mockup-badge">{{ $item['category'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         BÖLÜM 2: MERSİN'DE DİJİTAL VARLIK NEDEN ÖNEMLİ? (4 TEMEL KART)
         ========================================================================= --}}
    <section id="ozellikler" class="section-y relative bg-surface-muted/60 border-y border-ink-100/80 scroll-mt-24">
        <div class="container-page">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-100/70 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-800">
                    <x-icon name="sparkles" class="h-3.5 w-3.5 text-brand-600" /> Mersin'de Dijital Güç
                </span>
                <h2 class="mt-4 font-display text-2xl font-extrabold tracking-tight text-ink-950 sm:text-4xl">
                    Mersin'de Profesyonel Web Sitesinin Gücü
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-ink-600 sm:text-base">
                    Sanayi, liman lojistiği, ihracat ve turizm alanlarında yoğun rekabetin yaşandığı Mersin'de dijital varlığınız, başarınızın anahtarıdır.
                </p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                {{-- Kart 1 --}}
                <div class="group relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-elevated">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white group-hover:shadow-brand">
                        <x-icon name="target" class="h-6 w-6" />
                    </span>
                    <h3 class="mt-5 text-base font-bold text-ink-900 group-hover:text-brand-700 transition">Yerel SEO ile Bölgesel Hakimiyet</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        "Mersin web tasarım", "Tarsus e-ticaret sitesi" veya "Silifke kurumsal web" gibi aramalarda Google'da ilk sayfada yer alarak potansiyel müşterilerinize doğrudan ulaşın.
                    </p>
                </div>

                {{-- Kart 2 --}}
                <div class="group relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-elevated">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white group-hover:shadow-brand">
                        <x-icon name="bolt" class="h-6 w-6" />
                    </span>
                    <h3 class="mt-5 text-base font-bold text-ink-900 group-hover:text-brand-700 transition">Sanayi & İhracata Özel Çözümler</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Mersin'in güçlü sanayi ve liman lojistiği yapısına özel; çoklu dil, ürün kataloğu, B2B panel ve teklif formu modülleriyle uluslararası müşterilere ulaşın.
                    </p>
                </div>

                {{-- Kart 3 --}}
                <div class="group relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-elevated">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white group-hover:shadow-brand">
                        <x-icon name="shield" class="h-6 w-6" />
                    </span>
                    <h3 class="mt-5 text-base font-bold text-ink-900 group-hover:text-brand-700 transition">Kurumsal Güvenilirlik & Prestij</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Profesyonelce tasarlanmış bir web sitesi, Mersin'in rekabetçi iş ortamında işletmenizin ciddiyetini ve güvenilirliğini ziyaretçilere ilk 3 saniyede kanıtlar.
                    </p>
                </div>

                {{-- Kart 4 --}}
                <div class="group relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-elevated">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white group-hover:shadow-brand">
                        <x-icon name="sparkles" class="h-6 w-6" />
                    </span>
                    <h3 class="mt-5 text-base font-bold text-ink-900 group-hover:text-brand-700 transition">7/24 Dijital Müşteri Kazanımı</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Web siteniz siz uyurken bile müşteri toplayan dijital satış temsilcinizdir. Online rezervasyon, teklif formu ve WhatsApp entegrasyonuyla dönüşümü artırın.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         BÖLÜM 3: KAPSAMLI WEB TASARIM ÇÖZÜMLERİMİZ (6 ÖZELLİK)
         ========================================================================= --}}
    <section class="section-y relative">
        <div class="container-page">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full border border-brand-200 bg-brand-50 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-800">
                    <x-icon name="layout" class="h-3.5 w-3.5 text-brand-600" /> Teknik Standartlar
                </span>
                <h2 class="mt-4 font-display text-2xl font-extrabold tracking-tight text-ink-950 sm:text-4xl">
                    Mersin İşletmeleri İçin Web Tasarım Çözümlerimiz
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-ink-600 sm:text-base">
                    Sanayi, ihracat, lojistik, turizm ve perakende sektörlerine özel; her projede estetik arayüzü güçlü yazılım mühendisliğiyle buluşturuyoruz.
                </p>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                {{-- 1. Özgün Tasarım --}}
                <div class="rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-300 hover:border-brand-200 hover:shadow-elevated">
                    <div class="flex items-center gap-4">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon name="layout" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-bold text-ink-900">Size Özgün ve Modern Tasarım</h3>
                    </div>
                    <p class="mt-4 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Marka kimliğinizi yansıtan, hazır şablon veya hazır temalardan uzak; kullanıcı deneyimi (UX) odaklı, tamamen size özel yaratıcı arayüz tasarımı.
                    </p>
                </div>

                {{-- 2. %100 Mobil Uyum --}}
                <div class="rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-300 hover:border-brand-200 hover:shadow-elevated">
                    <div class="flex items-center gap-4">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon name="sparkles" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-bold text-ink-900">%100 Mobil Uyumlu Tasarım</h3>
                    </div>
                    <p class="mt-4 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Akıllı telefon, tablet, dizüstü ve geniş ekran monitörler dahil her ekranda milimetrik hassasiyetle çalışan esnek, responsive altyapı.
                    </p>
                </div>

                {{-- 3. SEO Optimizasyonu --}}
                <div class="rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-300 hover:border-brand-200 hover:shadow-elevated">
                    <div class="flex items-center gap-4">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon name="search" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-bold text-ink-900">Yerel SEO & Google Haritalar</h3>
                    </div>
                    <p class="mt-4 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        "Mersin web tasarım", "Tarsus kurumsal web sitesi" gibi yerel aramalarda üst sıralara çıkmanızı sağlayan Schema markup, Open Graph ve temiz URL yapılandırması.
                    </p>
                </div>

                {{-- 4. Hız Optimizasyonu --}}
                <div class="rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-300 hover:border-brand-200 hover:shadow-elevated">
                    <div class="flex items-center gap-4">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon name="bolt" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-bold text-ink-900">Yüksek Performans & Hız</h3>
                    </div>
                    <p class="mt-4 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Google Core Web Vitals standartlarına tam uyumlu; WebP görsel sıkıştırma, minify edilmiş kod ve önbellek mekanizmalarıyla anında açılan sayfalar.
                    </p>
                </div>

                {{-- 5. Çoklu Dil & B2B --}}
                <div class="rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-300 hover:border-brand-200 hover:shadow-elevated">
                    <div class="flex items-center gap-4">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon name="shield" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-bold text-ink-900">Çoklu Dil & SSL Güvenlik</h3>
                    </div>
                    <p class="mt-4 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Mersin'in ihracat ve liman lojistiği sektörü için İngilizce, Arapça desteği ve 256-bit SSL güvenlik şifrelemesiyle müşterilerinizin ve verilerinizin güvenliği.
                    </p>
                </div>

                {{-- 6. Teknik Destek --}}
                <div class="rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-300 hover:border-brand-200 hover:shadow-elevated">
                    <div class="flex items-center gap-4">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon name="headset" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-bold text-ink-900">Lansman Sonrası Teknik Destek</h3>
                    </div>
                    <p class="mt-4 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Web siteniz yayına alındıktan sonra da yanınızdayız. Olası teknik talepler, periyodik yedeklemeler ve panel desteğiyle güvendesiniz.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         BÖLÜM 4: MERSİN'DE DİJİTAL DÖNÜŞÜM (İKNA BLOĞU)
         ========================================================================= --}}
    <section class="section-y relative bg-ink-950 text-white overflow-hidden">
        {{-- Arka Plan Işık Efekti --}}
        <div class="pointer-events-none absolute -left-40 top-0 h-96 w-96 rounded-full bg-brand-500/20 blur-[130px]"></div>
        <div class="pointer-events-none absolute right-0 bottom-0 h-96 w-96 rounded-full bg-brand-600/15 blur-[120px]"></div>

        <div class="container-page relative z-10">
            <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
                {{-- Sol Kolon: Metin & Hikaye --}}
                <div class="lg:col-span-7">
                    <span class="inline-flex items-center gap-2 rounded-full border border-brand-400/30 bg-brand-500/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-400"></span> Mersin'de Dijital Dönüşüm
                    </span>
                    <h2 class="mt-4 font-display text-2xl font-extrabold tracking-tight text-white sm:text-4xl lg:text-5xl lg:leading-tight">
                        Mersin'deki İşletmenizi <br class="hidden sm:inline"/>
                        <span class="text-gradient">Birlikte Büyütelim mi?</span>
                    </h2>
                    <p class="mt-6 text-sm leading-relaxed text-ink-300 sm:text-base sm:leading-relaxed">
                        Mersin'in sanayi devleri, liman lojistik firmaları, perakendeciler ve turizm işletmelerinin tamamı dijitalde var olmak zorunda. Potansiyel müşterileriniz ve iş ortaklarınız sizi bulmak için Google'a başvuruyor.
                    </p>
                    <p class="mt-4 text-sm leading-relaxed text-ink-300 sm:text-base sm:leading-relaxed">
                        Hükümdar Bilişim olarak 16 yılı aşkın deneyimimizle Mersin'deki işletmeniz için SEO uyumlu, yüksek hızlı ve prestijli web siteleri tasarlıyoruz. Sıradan şablon sitelerin ötesine geçerek sizi sektörün öncüsü yapacak projeleri inşa ediyoruz.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="/referanslar" class="btn btn-primary px-6 py-3 text-sm font-semibold">
                            Tüm Projelerimizi Görüntüle <x-icon name="arrow-right" class="h-4 w-4" />
                        </a>
                        <a onclick="gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD'); return false;" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact['phone'] ?? '905321389808') }}?text={{ urlencode('Merhaba, Mersin bölgesinde web tasarım hizmeti hakkında bilgi almak istiyorum.') }}" target="_blank" rel="noopener" class="btn btn-ghost px-6 py-3 text-sm font-semibold text-white border border-white/20 hover:bg-white/10">
                            Ücretsiz Görüşme Başlatın
                        </a>
                    </div>
                </div>

                {{-- Sağ Kolon: İstatistik Kutuları --}}
                <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-md text-center transition hover:border-brand-500/40">
                        <div class="font-display text-3xl sm:text-4xl font-extrabold text-brand-400">300+</div>
                        <div class="mt-2 text-xs sm:text-sm font-semibold text-ink-200">Tamamlanan Kurumsal Proje</div>
                        <p class="mt-1 text-[11px] text-ink-400">2008'den bu yana güvenle</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-md text-center transition hover:border-brand-500/40">
                        <div class="font-display text-3xl sm:text-4xl font-extrabold text-brand-400">16+</div>
                        <div class="mt-2 text-xs sm:text-sm font-semibold text-ink-200">Yıllık Sektör Tecrübesi</div>
                        <p class="mt-1 text-[11px] text-ink-400">Mühendis kadrosuyla</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-md text-center transition hover:border-brand-500/40">
                        <div class="font-display text-3xl sm:text-4xl font-extrabold text-brand-400">%99.8</div>
                        <div class="mt-2 text-xs sm:text-sm font-semibold text-ink-200">Uptime & Hız Oranı</div>
                        <p class="mt-1 text-[11px] text-ink-400">Yüksek hızlı sunucular</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-md text-center transition hover:border-brand-500/40">
                        <div class="font-display text-3xl sm:text-4xl font-extrabold text-brand-400">7/24</div>
                        <div class="mt-2 text-xs sm:text-sm font-semibold text-ink-200">Teknik Destek Hattı</div>
                        <p class="mt-1 text-[11px] text-ink-400">Kesintisiz müşteri desteği</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         BÖLÜM 5: WEB TASARIM SÜRECİ (ADIM ADIM YOL HARİTASI)
         ========================================================================= --}}
    <section class="section-y relative bg-white">
        <div class="container-page">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full border border-brand-200 bg-brand-50 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-800">
                    <x-icon name="code" class="h-3.5 w-3.5 text-brand-600" /> Proje Adımlarımız
                </span>
                <h2 class="mt-4 font-display text-2xl font-extrabold tracking-tight text-ink-950 sm:text-4xl">
                    Mersin Web Tasarım Sürecimiz
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-ink-600 sm:text-base">
                    Projenizi fikirden canlı yayına taşırken izlediğimiz şeffaf, planlı ve 4 aşamalı iş akışımız.
                </p>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                {{-- Adım 1 --}}
                <div class="relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-300 hover:shadow-elevated hover:border-brand-300">
                    <div class="flex items-center justify-between">
                        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 font-display text-lg font-extrabold text-brand-700 ring-1 ring-brand-100">
                            01
                        </span>
                        <span class="text-xs font-bold uppercase tracking-wider text-ink-400">Keşif</span>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-ink-900">Adım 1: Talebinizi İletin</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Mersin'deki işletmenizin ihtiyaçlarını, hedef kitlenizi, marka kimliğinizi ve bölgesel rakiplerinizi derinlemesine anlarız.
                    </p>
                </div>

                {{-- Adım 2 --}}
                <div class="relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-300 hover:shadow-elevated hover:border-brand-300">
                    <div class="flex items-center justify-between">
                        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 font-display text-lg font-extrabold text-brand-700 ring-1 ring-brand-100">
                            02
                        </span>
                        <span class="text-xs font-bold uppercase tracking-wider text-ink-400">Mimari</span>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-ink-900">Adım 2: Planlama & Wireframe</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Web sitesinin temel iskeleti olan "wireframe" çizimleriyle; hangi bilginin nerede yer alacağını ve kullanıcı akışının nasıl olacağını planlarız.
                    </p>
                </div>

                {{-- Adım 3 --}}
                <div class="relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-300 hover:shadow-elevated hover:border-brand-300">
                    <div class="flex items-center justify-between">
                        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 font-display text-lg font-extrabold text-brand-700 ring-1 ring-brand-100">
                            03
                        </span>
                        <span class="text-xs font-bold uppercase tracking-wider text-ink-400">Tasarım & Kod</span>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-ink-900">Adım 3: UI/UX Tasarımı</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Bu aşamada odak noktamız; hem estetik açıdan çekici ve prestijli, hem de kullanımı son derece kolay, modern ve temiz bir arayüz yaratmaktır.
                    </p>
                </div>

                {{-- Adım 4 --}}
                <div class="relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-300 hover:shadow-elevated hover:border-brand-300">
                    <div class="flex items-center justify-between">
                        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 font-display text-lg font-extrabold text-brand-700 ring-1 ring-brand-100">
                            04
                        </span>
                        <span class="text-xs font-bold uppercase tracking-wider text-ink-400">Lansman</span>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-ink-900">Adım 4: Test & Canlı Yayın</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Tüm hız ve güvenlik testleri başarıyla tamamlandıktan ve sizden son onay alındıktan sonra, web sitenizi sunucunuza yükleyerek canlı yayına alırız.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         BÖLÜM 6: SİTEDEKİ ORİJİNAL PAKETLER BİLEŞENİ
         ========================================================================= --}}
    <x-sections.pricing />

    {{-- =========================================================================
         BÖLÜM 7: MERSİN WEB TASARIM SIKÇA SORULAN SORULAR
         ========================================================================= --}}
    <section class="section-y relative bg-white" x-data="{ activeFaq: 0 }">
        <div class="container-page">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full border border-brand-200 bg-brand-50 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-800">
                    <x-icon name="sparkles" class="h-3.5 w-3.5 text-brand-600" /> Sıkça Sorulan Sorular (SSS)
                </span>
                <h2 class="mt-4 font-display text-2xl font-extrabold tracking-tight text-ink-950 sm:text-4xl">
                    Mersin Web Tasarım Hakkında Merak Edilenler
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-ink-600 sm:text-base">
                    Mersin bölgesindeki web tasarım hizmetlerimiz hakkında sıkça sorulan soruların yanıtları burada.
                </p>
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

            {{-- Ekstra Destek / WhatsApp Bandı --}}
            <div class="mx-auto mt-12 max-w-3xl rounded-2xl border border-brand-200/70 bg-gradient-to-r from-brand-50/80 via-white to-brand-50/50 p-6 text-center sm:flex sm:items-center sm:justify-between sm:text-left">
                <div class="flex items-center gap-3.5 justify-center sm:justify-start">
                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-brand-600 text-white shadow-brand">
                        <x-icon name="whatsapp" class="h-5 w-5" />
                    </span>
                    <div>
                        <div class="text-sm font-bold text-ink-900">Mersin'deki projeniz hakkında sorunuz mu var?</div>
                        <div class="text-xs text-ink-500">Müşteri danışmanımızla WhatsApp üzerinden hemen görüşün.</div>
                    </div>
                </div>
                <a onclick="gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD'); return false;" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact['phone'] ?? '905321389808') }}?text={{ urlencode('Merhaba, Mersin Web Tasarım hakkında detaylı bilgi almak istiyorum.') }}" target="_blank" rel="noopener" class="btn btn-primary mt-4 sm:mt-0 text-xs font-semibold px-5 py-2.5 shrink-0">
                    WhatsApp ile Danışın
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>

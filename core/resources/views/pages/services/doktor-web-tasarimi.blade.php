@php
    $contact = config('site.contact');
    $allServices = config('content.services.items');

    // Kayan referans mockupları için seçilen gerçek sağlık ve klinik projeleri
    $marqueeProjects = [
        [
            'title' => 'Past & Future Klinik',
            'category' => 'Sağlık & Estetik',
            'image' => '/images/references/hukumdar-past-future-estetik-kliniklere-acilan-dijital-kapi.jpg',
            'url' => 'pastfuture.com.tr'
        ],
        [
            'title' => 'Doktor & Klinik Demo',
            'category' => 'Klinik Portalı',
            'image' => '/images/references/hukumdar-past-future-estetik-kliniklere-acilan-dijital-kapi.jpg',
            'url' => 'klinikdemo.hukumdar.com.tr'
        ],
        [
            'title' => 'Medikal Web Çözümleri',
            'category' => 'Sağlık & Medikal',
            'image' => '/images/references/hukumdar-medikal-web-tasarim.jpeg',
            'url' => 'advekamedikal.com'
        ],
        [
            'title' => 'Luwische Dermokozmetik',
            'category' => 'Dermokozmetik & Klinik',
            'image' => '/images/references/hukumdar-luwische-bilimle-gelen-g-uzellik.jpg',
            'url' => 'luwische.com'
        ],
    ];

    // SSS Öğeleri (Doktor ve Klinik Odaklı)
    $faqs = [
        [
            'q' => 'Doktor web sitesinde 7/24 online randevu motoru nasıl çalışır?',
            'a' => 'Hastalarınız poliklinik, hekim, randevu tarihi ve uygun saat dilimini seçerek saniyeler içinde randevu talebi oluşturur. Randevu bilgileri anında yönetim panelinize, SMS ve e-posta bildirimleriyle hekiminize iletilir. Panel üzerinden randevuları onaylayabilir, iptal edebilir veya yeniden planlayabilirsiniz.'
        ],
        [
            'q' => 'Sağlık turizmi için çoklu dil (İngilizce, Arapça, Rusça vb.) desteği var mı?',
            'a' => 'Evet! Sağlık turizmi yapan klinikler ve doktorlar için İngilizce, Arapça, Rusça, Almanca ve Fransızca gibi dillerde uluslararası hasta kabul sayfaları, tedavi rehberleri ve WhatsApp hızlı danışma butonları tam entegre olarak hazırlanır.'
        ],
        [
            'q' => 'Sağlık Bakanlığı ve Türk Tabipleri Birliği (TTB) mevzuatına uygun mu?',
            'a' => 'Evet, kesinlikle. Sağlık Bakanlığı sağlıkta tanıtım ve bilgilendirme yönetmeliğine, hasta haklarına ve KVKK mahremiyet kurallarına %100 uygun olarak hazırlanır. Yanıltıcı ve haksız rekabete yol açmayan, bilgilendirme odaklı prestijli bir yapı kurulur.'
        ],
        [
            'q' => 'Tedavi sayfaları, operasyon öncesi/sonrası rehberleri ekleyebilir miyim?',
            'a' => 'Evet! Türkçe ve kolay kullanımlı yönetim paneliniz üzerinden dilediğiniz kadar tedavi sayfası, operasyon öncesi ve sonrası hasta dikkat rehberleri, sıkça sorulan sorular ve hekim makaleleri yayınlayabilirsiniz.'
        ],
        [
            'q' => 'Web sitesi ne kadar sürede teslim edilir ve kurulum yapılır?',
            'a' => 'Doktor ve klinik hazır web yazılımımız ortalama 24 ila 48 saat içerisinde logonuz, klinik fotoğraflarınız, hekim kadronuz ve tedavi branşlarınız eklenerek anahtar teslim yayına alınır.'
        ],
    ];
@endphp

<x-layouts.app
    seoTitle="Doktor Web Tasarımı & Klinik Web Sitesi — Hükümdar Bilişim"
    description="Sağlık turizmine uyumlu, 7/24 online randevu motoru, çoklu dil desteği ve tedavi rehberiyle doktor ve klinikler için modern web tasarımı."
    keywords="doktor web tasarımı, klinik web sitesi, hekim web tasarımı, sağlık turizmi web sitesi, diş hekimi web tasarımı, estetik klinik web sitesi, hükümdar bilişim"
    :breadcrumbs="[['label' => 'Hizmetlerimiz', 'href' => '/hizmetler'], ['label' => 'Doktor Web Tasarımı']]">

    {{-- Kayan Marquee ve Mockup Özel CSS --}}
    <style>
        .hk-web-hero {
            padding-top: 155px !important;
            padding-bottom: 45px;
            position: relative;
            overflow: hidden;
            background: radial-gradient(circle at 50% 20%, rgba(2, 132, 199, 0.08) 0%, rgba(255, 255, 255, 1) 70%);
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
            box-shadow: 0 14px 28px -4px rgba(2, 132, 199, 0.22);
            border-color: #38bdf8;
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
            color: #0284c7;
            background: #f0f9ff;
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
            background: #f0f9ff;
            border: 1px solid #bae6fd;
            color: #0369a1;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            box-shadow: 0 2px 8px rgba(2, 132, 199, 0.08);
            margin-bottom: 22px;
        }
        .hk-hero-badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #0284c7;
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.25);
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
            max-width: 680px;
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
        .hk-btn-demo {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            border-radius: 9999px;
            background: #0f172a;
            color: #ffffff !important;
            border: 1.5px solid #0f172a;
            font-size: 14px;
            font-weight: 700;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.2);
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .hk-btn-demo:hover {
            background: #1e293b;
            transform: translateY(-2px);
            color: #ffffff !important;
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
                    <li style="color: #b58948; font-weight: 600;">Doktor Web Tasarımı</li>
                </ol>
            </nav>

            {{-- Rozet / Pill --}}
            <div>
                <div class="hk-hero-badge">
                    <span class="hk-hero-badge-dot"></span>
                    <span>Sağlık Turizmi & Online Randevu Entegreli</span>
                </div>
            </div>

            {{-- Ana Başlık (H1) --}}
            <h1 class="hk-hero-title">
                Hastalarınıza Güven Veren, <br class="hidden sm:inline" />
                <span class="hk-gold-text">7/24 Randevu Alan Sağlık Portalı.</span>
            </h1>

            {{-- Alt Açıklama --}}
            <p class="hk-hero-desc">
                Doktorlar, klinikler ve estetik merkezleri için 7/24 akıllı online randevu motoru, sağlık turizmi çoklu dil desteği ve tedavi rehberleriyle donatılmış hazır web yazılımı. 24 saatte anahtar teslim.
            </p>

            {{-- CTA Butonları --}}
            <div class="hk-hero-btns">
                <a href="https://klinikdemo.hukumdar.com.tr" target="_blank" rel="noopener" class="hk-btn-demo">
                    <x-icon name="sparkles" class="h-4 w-4 text-emerald-400" />
                    <span>Canlı Demoyu İncele</span>
                    <svg style="width: 14px; height: 14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
                <a onclick="gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD'); return false;" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact['phone'] ?? '905321389808') }}?text={{ urlencode('Merhaba, Doktor & Klinik Web Tasarımı hakkında bilgi ve fiyat teklifi almak istiyorum.') }}" target="_blank" rel="noopener" class="hk-btn-primary">
                    <x-icon name="whatsapp" class="h-4 w-4" />
                    <span>Hemen Teklif & Satın Alın</span>
                </a>
            </div>
        </div>

        {{-- KAYAN SİTE GÖRÜNTÜLERİ (MOCKUPLAR) --}}
        <div class="mt-12 sm:mt-14">
            <div class="container-page mb-3 flex items-center justify-between text-xs font-semibold uppercase tracking-wider text-ink-400">
                <span class="flex items-center gap-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span> Canlı Klinik & Sağlık Referanslarımız
                </span>
                <span class="hidden sm:inline text-ink-400">Önizlemek için üzerine gelin</span>
            </div>

            <div class="hk-marquee-wrap">
                <div class="hk-marquee-track">
                    @foreach (array_merge($marqueeProjects, $marqueeProjects, $marqueeProjects) as $item)
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
                                <img
                                    src="{{ $item['image'] }}"
                                    alt="{{ $item['title'] }}"
                                    loading="lazy" />
                            </div>

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
         BÖLÜM 2: MÜKEMMEL BİR SAĞLIK SİTESİNİN ANATOMİSİ (4 TEMEL KART)
         ========================================================================= --}}
    <section id="ozellikler" class="section-y relative bg-surface-muted/60 border-y border-ink-100/80 scroll-mt-24">
        <div class="container-page">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-100/70 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-800">
                    <x-icon name="heart" class="h-3.5 w-3.5 text-brand-600" /> Sağlık Standartları
                </span>
                <h2 class="mt-4 font-display text-2xl font-extrabold tracking-tight text-ink-950 sm:text-4xl">
                    Mükemmel Bir Doktor Web Sitesinin Anatomisi
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-ink-600 sm:text-base">
                    Kliniğinizin güvenilirliğini artıran ve hasta randevu akışını hızlandıran 4 temel özellik.
                </p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                {{-- Kart 1 --}}
                <div class="group relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-elevated">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white group-hover:shadow-brand">
                        <x-icon name="bolt" class="h-6 w-6" />
                    </span>
                    <h3 class="mt-5 text-base font-bold text-ink-900 group-hover:text-brand-700 transition">7/24 Online Randevu Motoru</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Hastaların hekim, branş, gün ve saat seçerek kolayca randevu almasını sağlayan SMS & E-posta bildirimli sistem.
                    </p>
                </div>

                {{-- Kart 2 --}}
                <div class="group relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-elevated">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white group-hover:shadow-brand">
                        <x-icon name="sparkles" class="h-6 w-6" />
                    </span>
                    <h3 class="mt-5 text-base font-bold text-ink-900 group-hover:text-brand-700 transition">Sağlık Turizmi Çoklu Dil</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        İngilizce, Arapça, Rusça ve Almanca dillerinde yabancı hastalara hitap eden uluslararası hasta portalı.
                    </p>
                </div>

                {{-- Kart 3 --}}
                <div class="group relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-elevated">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white group-hover:shadow-brand">
                        <x-icon name="layout" class="h-6 w-6" />
                    </span>
                    <h3 class="mt-5 text-base font-bold text-ink-900 group-hover:text-brand-700 transition">Tedavi & Operasyon Rehberi</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Her operasyon ve tedavi için ayrıntılı süreçler, operasyon öncesi/sonrası dikkat edilecekler ve SSS sayfaları.
                    </p>
                </div>

                {{-- Kart 4 --}}
                <div class="group relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-elevated">
                    <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white group-hover:shadow-brand">
                        <x-icon name="shield" class="h-6 w-6" />
                    </span>
                    <h3 class="mt-5 text-base font-bold text-ink-900 group-hover:text-brand-700 transition">Hekim CV & Hasta Yorumları</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Uzman hekimlerin kariyeri, sertifikaları, klinik sanal turu ve doğrulanmış hasta geri bildirimleri güven aşılar.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         BÖLÜM 3: KAPSAMLI DOKTOR WEB TASARIM ÇÖZÜMLERİMİZ (6 ÖZELLİK)
         ========================================================================= --}}
    <section class="section-y relative">
        <div class="container-page">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full border border-brand-200 bg-brand-50 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-800">
                    <x-icon name="layout" class="h-3.5 w-3.5 text-brand-600" /> Klinik Modülleri
                </span>
                <h2 class="mt-4 font-display text-2xl font-extrabold tracking-tight text-ink-950 sm:text-4xl">
                    Kapsamlı Doktor & Klinik Web Çözümlerimiz
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-ink-600 sm:text-base">
                    Sağlık sektörünün dinamiklerine özel geliştirilen modüler yazılım altyapımız.
                </p>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                {{-- 1. Randevu --}}
                <div class="rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-300 hover:border-brand-200 hover:shadow-elevated">
                    <div class="flex items-center gap-4">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon name="bolt" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-bold text-ink-900">7/24 Online Randevu Motoru</h3>
                    </div>
                    <p class="mt-4 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Hastaların hekim, klinik, gün ve saat seçerek randevu oluşturabildiği, panelden yönetilebilir akıllı sistem.
                    </p>
                </div>

                {{-- 2. Çoklu Dil --}}
                <div class="rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-300 hover:border-brand-200 hover:shadow-elevated">
                    <div class="flex items-center gap-4">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon name="sparkles" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-bold text-ink-900">Sağlık Turizmi Çoklu Dil</h3>
                    </div>
                    <p class="mt-4 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        İngilizce, Arapça, Rusça dillerinde yurt dışından gelen hastalar için özel landing pageler ve hızlı başvuru formları.
                    </p>
                </div>

                {{-- 3. Tedavi Rehberleri --}}
                <div class="rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-300 hover:border-brand-200 hover:shadow-elevated">
                    <div class="flex items-center gap-4">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon name="search" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-bold text-ink-900">Tedavi & Operasyon Rehberleri</h3>
                    </div>
                    <p class="mt-4 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Tedavi süreçlerini, iyileşme sürelerini ve operasyon detaylarını Google arama niyetine uygun sunan zengin sayfalar.
                    </p>
                </div>

                {{-- 4. WhatsApp Tahlil Hattı --}}
                <div class="rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-300 hover:border-brand-200 hover:shadow-elevated">
                    <div class="flex items-center gap-4">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon name="whatsapp" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-bold text-ink-900">WhatsApp Hızlı Konsültasyon</h3>
                    </div>
                    <p class="mt-4 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Hastaların röntgen, tahlil ve fotoğraf göndererek klinik koordinatörlerinizden anında ön bilgi almasını sağlar.
                    </p>
                </div>

                {{-- 5. Sağlık Mevzuatı Uyumu --}}
                <div class="rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-300 hover:border-brand-200 hover:shadow-elevated">
                    <div class="flex items-center gap-4">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon name="shield" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-bold text-ink-900">Sağlık Bakanlığı & KVKK Uyumu</h3>
                    </div>
                    <p class="mt-4 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Sağlıkta tanıtım yönergelerine ve hasta verileri gizlilik (KVKK) standartlarına %100 uyumlu güvenli altyapı.
                    </p>
                </div>

                {{-- 6. Hız & Mobil --}}
                <div class="rounded-3xl border border-ink-200/90 bg-white p-8 shadow-card transition duration-300 hover:border-brand-200 hover:shadow-elevated">
                    <div class="flex items-center gap-4">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon name="sparkles" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-bold text-ink-900">1 Saniyede Açılış & %100 Mobil</h3>
                    </div>
                    <p class="mt-4 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Akıllı telefon kullanan hastaların beklemeden randevu alabileceği ultra hızlı ve akıcı mobil deneyim.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         BÖLÜM 4: KLİNİĞİNİZİN DİJİTAL SAĞLIK MERKEZİ (İKNA BLOĞU)
         ========================================================================= --}}
    <section class="section-y relative bg-ink-950 text-white overflow-hidden">
        <div class="pointer-events-none absolute -left-40 top-0 h-96 w-96 rounded-full bg-brand-500/20 blur-[130px]"></div>
        <div class="pointer-events-none absolute right-0 bottom-0 h-96 w-96 rounded-full bg-brand-600/15 blur-[120px]"></div>

        <div class="container-page relative z-10">
            <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-7">
                    <span class="inline-flex items-center gap-2 rounded-full border border-brand-400/30 bg-brand-500/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-400"></span> Sağlık ve Klinik Sektörü
                    </span>
                    <h2 class="mt-4 font-display text-2xl font-extrabold tracking-tight text-white sm:text-4xl lg:text-5xl lg:leading-tight">
                        Kliniğinizi <br class="hidden sm:inline"/>
                        <span class="text-gradient">24 Saatte Canlıya Alalım.</span>
                    </h2>
                    <p class="mt-6 text-sm leading-relaxed text-ink-300 sm:text-base sm:leading-relaxed">
                        Hastalar tedavi veya operasyon kararı verirken hekimin tecrübesine, klinik donanımına ve web sitesinin profesyonelliğine güvenir. Modern bir sağlık sitesi hasta sayınızı katlar.
                    </p>
                    <p class="mt-4 text-sm leading-relaxed text-ink-300 sm:text-base sm:leading-relaxed">
                        Hükümdar Bilişim olarak doktorlar, diş klinikleri, cerrahlar ve estetik merkezleri için 24 saatte anahtar teslim kurulum sağlıyoruz.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="https://klinikdemo.hukumdar.com.tr" target="_blank" rel="noopener" class="btn btn-primary px-6 py-3 text-sm font-semibold">
                            Canlı Demoyu İncele <x-icon name="arrow-right" class="h-4 w-4" />
                        </a>
                        <a onclick="gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD'); return false;" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact['phone'] ?? '905321389808') }}?text={{ urlencode('Merhaba, Doktor Web Tasarımı paketi satın almak istiyorum.') }}" target="_blank" rel="noopener" class="btn btn-ghost px-6 py-3 text-sm font-semibold text-white border border-white/20 hover:bg-white/10">
                            WhatsApp'tan Satın Al
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-md text-center transition hover:border-brand-500/40">
                        <div class="font-display text-3xl sm:text-4xl font-extrabold text-brand-400">7/24</div>
                        <div class="mt-2 text-xs sm:text-sm font-semibold text-ink-200">Online Randevu</div>
                        <p class="mt-1 text-[11px] text-ink-400">Kesintisiz hasta kabulü</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-md text-center transition hover:border-brand-500/40">
                        <div class="font-display text-3xl sm:text-4xl font-extrabold text-brand-400">Çoklu Dil</div>
                        <div class="mt-2 text-xs sm:text-sm font-semibold text-ink-200">Sağlık Turizmi</div>
                        <p class="mt-1 text-[11px] text-ink-400">İngilizce, Arapça, Rusça</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-md text-center transition hover:border-brand-500/40">
                        <div class="font-display text-3xl sm:text-4xl font-extrabold text-brand-400">24 Saat</div>
                        <div class="mt-2 text-xs sm:text-sm font-semibold text-ink-200">Anahtar Teslim</div>
                        <p class="mt-1 text-[11px] text-ink-400">Hemen yayına hazır</p>
                    </div>

                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-md text-center transition hover:border-brand-500/40">
                        <div class="font-display text-3xl sm:text-4xl font-extrabold text-brand-400">0.6sn</div>
                        <div class="mt-2 text-xs sm:text-sm font-semibold text-ink-200">Ultra Hızlı Açılış</div>
                        <p class="mt-1 text-[11px] text-ink-400">Google Core Web Vitals</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         BÖLÜM 5: 4 ADIMDA DOKTOR WEB SİTESİ TESLİMAT SÜRECİ
         ========================================================================= --}}
    <section class="section-y relative bg-white">
        <div class="container-page">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full border border-brand-200 bg-brand-50 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-800">
                    <x-icon name="code" class="h-3.5 w-3.5 text-brand-600" /> Hızlı İş Akışı
                </span>
                <h2 class="mt-4 font-display text-2xl font-extrabold tracking-tight text-ink-950 sm:text-4xl">
                    24 Saatte Canlı Yayına Alma Süreci
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-ink-600 sm:text-base">
                    Doktor ve klinik web sitemizde karmaşık süreçler yok; 4 basit adımda siteniz hazır.
                </p>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                {{-- Adım 1 --}}
                <div class="relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-300 hover:shadow-elevated hover:border-brand-300">
                    <div class="flex items-center justify-between">
                        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 font-display text-lg font-extrabold text-brand-700 ring-1 ring-brand-100">
                            01
                        </span>
                        <span class="text-xs font-bold uppercase tracking-wider text-ink-400">Demo</span>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-ink-900">1. Demoyu İnceleyin</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Canlı klinik demo sitemizi hem telefonda hem bilgisayarda test edin ve tasarımı inceleyin.
                    </p>
                </div>

                {{-- Adım 2 --}}
                <div class="relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-300 hover:shadow-elevated hover:border-brand-300">
                    <div class="flex items-center justify-between">
                        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 font-display text-lg font-extrabold text-brand-700 ring-1 ring-brand-100">
                            02
                        </span>
                        <span class="text-xs font-bold uppercase tracking-wider text-ink-400">İçerik</span>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-ink-900">2. Bilgilerinizi İletin</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Logonuz, hekim kadronuz, tedavi branşlarınız ve klinik fotoğraflarınız ekibimize aktarılır.
                    </p>
                </div>

                {{-- Adım 3 --}}
                <div class="relative rounded-3xl border border-ink-200/90 bg-white p-7 shadow-card transition duration-300 hover:shadow-elevated hover:border-brand-300">
                    <div class="flex items-center justify-between">
                        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 font-display text-lg font-extrabold text-brand-700 ring-1 ring-brand-100">
                            03
                        </span>
                        <span class="text-xs font-bold uppercase tracking-wider text-ink-400">Kurulum</span>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-ink-900">3. Sunucu & Randevu Kurulumu</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Domain yönlendirmeniz, randevu bildirim sisteminiz, NVMe SSD sunucunuz ve SSL sertifikanız kurulur.
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
                    <h3 class="mt-5 text-base font-bold text-ink-900">4. 24 Saatte Canlı Yayın</h3>
                    <p class="mt-2.5 text-xs leading-relaxed text-ink-500 sm:text-sm">
                        Tüm randevu ve hız testleri tamamlandıktan sonra yönetim paneli şifreleriniz teslim edilir ve yayına başlanır.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================================
         BÖLÜM 6: FİYATLANDIRMA PAKETLERİ
         ========================================================================= --}}
    <x-sections.pricing />

    {{-- =========================================================================
         BÖLÜM 7: SIKÇA SORULAN SORULAR (SSS ACCORDION)
         ========================================================================= --}}
    <section class="section-y relative bg-white" x-data="{ activeFaq: 0 }">
        <div class="container-page">
            <div class="mx-auto max-w-2xl text-center">
                <span class="inline-flex items-center gap-1.5 rounded-full border border-brand-200 bg-brand-50 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-800">
                    <x-icon name="sparkles" class="h-3.5 w-3.5 text-brand-600" /> Sıkça Sorulan Sorular
                </span>
                <h2 class="mt-4 font-display text-2xl font-extrabold tracking-tight text-ink-950 sm:text-4xl">
                    Doktor Web Tasarımı Hakkında Merak Edilenler
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-ink-600 sm:text-base">
                    Doktor ve klinik web siteleriyle ilgili aklınıza takılan tüm soruların yanıtları.
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
                        <div class="text-sm font-bold text-ink-900">Doktor web sitesi demosu ve fiyat teklifi mi istiyorsunuz?</div>
                        <div class="text-xs text-ink-500">Sağlık sektörü danışmanımızla WhatsApp üzerinden anında görüşün.</div>
                    </div>
                </div>
                <a onclick="gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD'); return false;" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact['phone'] ?? '905321389808') }}?text={{ urlencode('Merhaba, Doktor Web Tasarımı hakkında detaylı bilgi almak istiyorum.') }}" target="_blank" rel="noopener" class="btn btn-primary mt-4 sm:mt-0 text-xs font-semibold px-5 py-2.5 shrink-0">
                    WhatsApp ile Danışın
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>

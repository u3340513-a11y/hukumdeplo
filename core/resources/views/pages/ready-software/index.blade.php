@php
    $contact = config('site.contact');
    $brand = config('site.brand');

    // 4 Sektörel Hazır Yazılım Ürünü
    $readySites = [
        [
            'id' => 'avukat',
            'badge' => 'BARO MEVZUATINA UYUMLU',
            'tag' => 'Hukuk & Arabuluculuk',
            'title' => 'Avukat & Hukuk Bürosu Web Tasarımı',
            'short_title' => 'Avukat Web Tasarımı',
            'desc' => 'Türkiye Barolar Birliği reklam yasağı ve meslek kurallarına %100 uyumlu, müvekkilleriniz için güven, saygınlık ve kurumsal prestij sağlayan özel hukuk bürosu arayüzü.',
            'image' => '/images/references/hukumdar-bam-birlesik-arabuluculuk-merkezleri-kurumsal-web-sitesi.jpg',
            'url' => 'hukukdemo.hukumdar.com.tr',
            'opportunity' => 'Anahtar Teslim Kurulum',
            'features' => [
                'Online Vekaletname ve Ön Danışmanlık Talep Formu',
                'Ceza, Ticaret, Aile vb. Dava ve Uzmanlık Alanları Modülü',
                'Hukuki Makale, Blog ve Yargıtay Emsal Karar Yayın Alanı',
                'Müvekkiller için Tek Tıkla WhatsApp ve Harita Navigasyonu'
            ],
            'theme_color' => '#1e3a8a',
            'badge_bg' => '#eff6ff',
            'badge_text' => '#1d4ed8',
            'badge_border' => '#bfdbfe',
        ],
        [
            'id' => 'doktor',
            'badge' => 'SAĞLIK TURİZMİNE UYUMLU',
            'tag' => 'Klinik & Hekim',
            'title' => 'Doktor & Klinik Web Tasarımı',
            'short_title' => 'Doktor Web Tasarımı',
            'desc' => 'Hekimler, diş klinikleri, cerrahlar ve özel sağlık merkezleri için hastaların 7/24 randevu alabileceği, tedavileri ve hekim tecrübesini güvenle inceleyebileceği modern sağlık portalı.',
            'image' => '/images/references/hukumdar-past-future-estetik-kliniklere-acilan-dijital-kapi.jpg',
            'url' => 'klinikdemo.hukumdar.com.tr',
            'opportunity' => 'Online Randevu Motoru',
            'features' => [
                '7/24 Online Randevu Alma ve Akıllı Talep Yönetimi',
                'Çoklu Dil Desteği (Sağlık Turizmi İçin İngilizce / Arapça)',
                'Tedavi Rehberi, SSS ve Operasyon Bilgilendirme Sayfaları',
                'Hasta Memnuniyet Yorumları, Hekim CV ve Klinik Sanal Turu'
            ],
            'theme_color' => '#0284c7',
            'badge_bg' => '#fbf7ee',
            'badge_text' => '#9e7132',
            'badge_border' => '#ebd7b5',
        ],
        [
            'id' => 'cicekci',
            'badge' => 'TAM DONANIMLI E-TİCARET',
            'tag' => 'E-Ticaret & Çiçek Satışı',
            'title' => 'Hazır Çiçekçi E-Ticaret Sitesi',
            'short_title' => 'Hazır Çiçekçi Sitesi',
            'desc' => 'Çiçekçiler için özel geliştirilmiş; teslimat saat aralığı seçimi, bölge/kilometreye göre otomatik yol ücreti ve Sanal POS entegrasyonuna sahip lider sektörel e-ticaret altyapısı.',
            'image' => '/images/references/hukumdar-cicekci-sitesi-isinizi-dijitalde-b-uy-utmenin-en-renkli-yolu.png',
            'url' => 'cicekcidemo.hukumdar.com.tr',
            'opportunity' => 'Yol Ücreti & Zaman Ayarlı',
            'features' => [
                'Saat Aralıklı Teslimat Seçimi ve Özel Kart Notu Ekleme',
                'Mahalle ve Kilometreye Göre Dinamik Yol Ücreti Hesaplama',
                '21 Banka Sanal POS, Havale/EFT ve Kapıda Ödeme Desteği',
                'WhatsApp Sipariş Bildirimi ve Anlık Müşteri SMS Uyarıları'
            ],
            'theme_color' => '#16a34a',
            'badge_bg' => '#f0fdf4',
            'badge_text' => '#15803d',
            'badge_border' => '#bbf7d0',
        ],
        [
            'id' => 'haber',
            'badge' => 'YÜKSEK TRAFİK & GOOGLE NEWS',
            'tag' => 'Haber & Medya Portalı',
            'title' => 'Profesyonel Haber Portalı Yazılımı',
            'short_title' => 'Haber Yazılımı',
            'desc' => 'Yerel gazeteler, ulusal medya ve bağımsız haber portalları için Google algoritmalarıyla tam uyumlu, ultra hızlı açılan, zengin manşet ve otomatik ajans botlu profesyonel haber scripti.',
            'image' => '/images/references/hukumdar-yazar-kevser-demet-web-sitesi.png',
            'url' => 'haberdemo.hukumdar.com.tr',
            'opportunity' => 'Ajans XML Botu Entegre',
            'features' => [
                '1 Saniyenin Altında Açılış ve Google Core Web Vitals Skoru',
                'İHA, DHA, AA Otomatik Haber Ajansı XML Bot Entegrasyonu',
                'Zengin Ana Manşet, Sürmanşet ve Son Dakika Kayan Bantları',
                'Köşe Yazarları, Foto/Video Galeri ve Gelişmiş Reklam Alanları'
            ],
            'theme_color' => '#dc2626',
            'badge_bg' => '#fef2f2',
            'badge_text' => '#b91c1c',
            'badge_border' => '#fecaca',
        ],
    ];

    // İstatistikler (cicekciyazilimi.com statbar modeli)
    $stats = [
        ['num' => '16+', 'label' => 'Yıllık Tecrübe', 'icon' => 'shield', 'grad' => 'linear-gradient(135deg, #b58948, #815725)', 'shadow' => 'rgba(181,137,72,.28)'],
        ['num' => '7/24', 'label' => 'Teknik Destek', 'icon' => 'phone', 'grad' => 'linear-gradient(135deg, #0ea5e9, #0284c7)', 'shadow' => 'rgba(2,132,199,.28)'],
        ['num' => '300+', 'label' => 'Aktif Referans', 'icon' => 'users', 'grad' => 'linear-gradient(135deg, #8b5cf6, #7c3aed)', 'shadow' => 'rgba(124,58,237,.28)'],
        ['num' => '4+', 'label' => 'Hazır Sektör Paketi', 'icon' => 'layout', 'grad' => 'linear-gradient(135deg, #f43f5e, #e11d48)', 'shadow' => 'rgba(225,29,72,.28)'],
        ['num' => '%100', 'label' => 'Mobil & SEO Uyumu', 'icon' => 'sparkles', 'grad' => 'linear-gradient(135deg, #f59e0b, #d97706)', 'shadow' => 'rgba(217,119,6,.28)'],
        ['num' => '12', 'label' => 'Taksitle Ödeme', 'icon' => 'cart', 'grad' => 'linear-gradient(135deg, #14b8a6, #0d9488)', 'shadow' => 'rgba(13,148,136,.28)'],
    ];
@endphp

<x-layouts.app
    seoTitle="Hazır Yazılımlarımız — Avukat, Doktor, Çiçekçi ve Haber Web Siteleri"
    description="Hükümdar Bilişim sektörel hazır yazılım çözümleri: Avukat web tasarımı, doktor web tasarımı, hazır çiçekçi sitesi ve haber yazılımı. 24 saatte anahtar teslim yayına hazır."
    keywords="hazır yazılımlar, avukat web tasarımı, doktor web tasarımı, hazır çiçekçi sitesi, haber yazılımı, sektörel web tasarım, hazır web sitesi, hükümdar bilişim"
    :breadcrumbs="[['label' => 'Hizmetlerimiz', 'href' => '/hizmetler'], ['label' => 'Hazır Yazılımlarımız']]">

    {{-- =========================================================================
         cicekciyazilimi.com BİREBİR TASARIM VE ANİMASYON SİSTEMİ (GOLD UYARLAMASI)
         ========================================================================= --}}
    <style>
        .cy-page {
            --brand: #b58948;
            --brand-d: #815725;
            --brand-l: #d4af37;
            --navy: #0f172a;
            --text: #334155;
            --text2: #64748b;
            --border: #e2e8f0;
            --light: #f8fafc;
            --light2: #f1f5f9;
            --white: #ffffff;
            --ease: cubic-bezier(.4,0,.2,1);
            --ease2: cubic-bezier(.34,1.56,.64,1);
            position: relative;
        }

        .cy-section {
            padding: 60px 0;
        }

        .hk-gold-text {
            background: linear-gradient(135deg, #b58948 0%, #815725 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
            display: inline-block;
        }

        /* ── Bölüm Başlığı Standartları ── */
        .cy-head {
            text-align: center;
            max-width: 840px;
            margin: 0 auto 42px;
        }
        .cy-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(181, 137, 72, .10);
            border: 1px solid rgba(181, 137, 72, .24);
            color: var(--brand-d);
            font-weight: 800;
            font-size: 12px;
            letter-spacing: .8px;
            text-transform: uppercase;
            padding: 7px 16px;
            border-radius: 50px;
            margin-bottom: 16px;
        }
        .cy-eyebrow svg {
            width: 14px;
            height: 14px;
            color: var(--brand);
        }
        .cy-title {
            font-weight: 800 !important;
            color: var(--navy) !important;
            font-size: clamp(26px, 3.4vw, 40px) !important;
            line-height: 1.15 !important;
            letter-spacing: -.5px;
            margin: 0 0 14px;
        }
        .cy-title .hl {
            color: var(--brand);
        }
        .cy-sub {
            color: var(--text2);
            font-size: clamp(14.5px, 1.5vw, 16.5px);
            line-height: 1.8;
            margin: 0;
        }

        /* ── Butonlar ── */
        .cy-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: 700;
            font-size: 15px;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 14px;
            transition: all .35s var(--ease);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            border: none;
        }
        .cy-btn svg {
            transition: transform .3s var(--ease);
        }
        .cy-btn:hover svg.cy-ar {
            transform: translateX(4px);
        }
        .cy-btn-primary {
            background: linear-gradient(135deg, var(--brand), var(--brand-d));
            color: #fff !important;
            box-shadow: 0 10px 26px rgba(181, 137, 72, .30);
        }
        .cy-btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .22), transparent);
            transition: .6s;
        }
        .cy-btn-primary:hover::before {
            left: 100%;
        }
        .cy-btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 40px rgba(181, 137, 72, .44);
            color: #fff !important;
        }

        /* ── Stat Bar (İstatistik Şeridi) ── */
        .cy-statbar {
            padding: 34px 0 10px;
        }
        @media (max-width: 575px) {
            .cy-statbar { padding: 24px 0 8px; }
        }
        .cy-stats {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 14px;
        }
        .cy-stat {
            display: flex;
            align-items: center;
            gap: 14px;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 16px 18px;
            box-shadow: 0 4px 18px rgba(15, 23, 42, .05);
            transition: transform .35s var(--ease), box-shadow .35s var(--ease), border-color .35s;
        }
        .cy-stat:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 42px rgba(15, 23, 42, .10);
            border-color: #cbd5e1;
        }
        .cy-stat-ic {
            flex-shrink: 0;
            width: 52px;
            height: 52px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            transition: transform .4s var(--ease2);
        }
        .cy-stat-ic svg {
            width: 24px;
            height: 24px;
        }
        .cy-stat:hover .cy-stat-ic {
            transform: scale(1.08) rotate(-4deg);
        }
        .cy-stat-num {
            font-weight: 800;
            font-size: clamp(23px, 2.2vw, 30px);
            color: var(--navy);
            line-height: 1;
            display: flex;
            align-items: baseline;
        }
        .cy-stat-lbl {
            font-size: 12.5px;
            color: var(--text2);
            font-weight: 600;
            margin-top: 4px;
        }
        @media (max-width: 1199px) { .cy-stats { grid-template-columns: repeat(3, 1fr); } }
        @media (max-width: 680px) { .cy-stats { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 420px) {
            .cy-stat { padding: 13px 14px; gap: 11px; }
            .cy-stat-ic { width: 46px; height: 46px; border-radius: 13px; }
        }

        /* ── Hero / Vitrin Mimarisi (.cyz-vitrin) ── */
        .cyz-vitrin {
            position: relative;
            padding-top: 175px !important;
            padding-bottom: 55px !important;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
            overflow: hidden;
        }
        @media (max-width: 768px) {
            .cyz-vitrin { padding-top: 140px !important; padding-bottom: 40px !important; }
        }
        .cyz-vitrin::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 900px;
            height: 900px;
            background: radial-gradient(circle, rgba(181, 137, 72, .08) 0%, transparent 70%);
            pointer-events: none;
        }

        .hk-breadcrumb-wrap {
            margin-bottom: 28px !important;
            display: flex !important;
            justify-content: center !important;
        }
        .hk-breadcrumb-list {
            display: inline-flex !important;
            flex-wrap: wrap !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
            padding: 7px 18px !important;
            border-radius: 50px !important;
            background: #f1f5f9 !important;
            border: 1px solid #e2e8f0 !important;
            font-size: 12.5px !important;
            box-shadow: 0 2px 6px rgba(15, 23, 42, 0.04) !important;
            list-style: none !important;
            margin: 0 !important;
        }

        .cyz-govde { position: relative; z-index: 2; }
        .cyz-copy { text-align: left; }
        .cyz-copy.cyz-lead {
            text-align: center;
            max-width: 940px;
            margin: 0 auto 4px;
        }
        .cyz-trust-wrap {
            margin-bottom: 24px !important;
            display: flex !important;
            justify-content: center !important;
        }
        .cyz-trust {
            display: inline-flex !important;
            align-items: center !important;
            gap: 8px !important;
            background: rgba(181, 137, 72, .10) !important;
            border: 1px solid rgba(181, 137, 72, .24) !important;
            color: var(--brand-d) !important;
            font-size: 13px !important;
            font-weight: 600 !important;
            padding: 8px 18px !important;
            border-radius: 60px !important;
            margin: 0 !important;
        }
        .cyz-trust svg {
            width: 16px;
            height: 16px;
            color: var(--brand);
        }
        .cyz-trust b {
            font-weight: 800;
            color: var(--navy);
        }
        .cyz-copy h1 {
            color: var(--navy) !important;
            font-size: clamp(34px, 4.5vw, 54px) !important;
            font-weight: 800 !important;
            line-height: 1.12 !important;
            margin-top: 0 !important;
            margin-bottom: 20px !important;
            letter-spacing: -.5px;
        }
        .cyz-copy h1 .highlight {
            color: var(--brand);
            position: relative;
            display: inline-block;
        }
        .cyz-copy h1 .highlight::after {
            content: '';
            position: absolute;
            bottom: 6px;
            left: 0;
            right: 0;
            height: 12px;
            background: rgba(181, 137, 72, .16);
            border-radius: 6px;
            z-index: -1;
        }
        .cyz-desc {
            font-size: 17px;
            line-height: 1.78;
            color: var(--text2);
            margin-bottom: 32px;
            max-width: 760px;
            margin-left: auto;
            margin-right: auto;
        }
        .cyz-btns {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 26px;
            justify-content: center;
        }
        .cyz-btn-gold {
            background: linear-gradient(135deg, var(--brand), var(--brand-d));
            color: var(--white) !important;
            border: none;
            padding: 16px 36px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 15px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all .4s var(--ease);
            box-shadow: 0 6px 22px rgba(181, 137, 72, .32);
            position: relative;
            overflow: hidden;
        }
        .cyz-btn-gold::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .20), transparent);
            transition: .6s;
        }
        .cyz-btn-gold:hover::before { left: 100%; }
        .cyz-btn-gold:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 38px rgba(181, 137, 72, .45);
            color: var(--white) !important;
        }
        .cyz-btn-outline {
            color: var(--navy) !important;
            border: 2px solid var(--border);
            padding: 15px 36px;
            border-radius: 14px;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all .4s var(--ease);
            background: var(--white);
        }
        .cyz-btn-outline:hover {
            border-color: var(--brand);
            color: var(--brand) !important;
            background: rgba(181, 137, 72, .05);
        }

        /* ── Taksit / Avantaj Bandı ── */
        .cyz-taksit {
            display: flex;
            align-items: center;
            gap: 16px;
            width: 100%;
            max-width: 580px;
            margin: 0 auto;
            padding: 16px 22px;
            background: linear-gradient(135deg, #ffffff 0%, #fefcf9 100%);
            border: 1px solid rgba(181, 137, 72, .24);
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(181, 137, 72, .10);
            position: relative;
            overflow: hidden;
        }
        .cyz-taksit::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, var(--brand-l), var(--brand-d));
        }
        .cyz-ht-ico {
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: linear-gradient(135deg, var(--brand), var(--brand-d));
            box-shadow: 0 6px 16px rgba(181, 137, 72, .30);
        }
        .cyz-ht-ico svg { width: 24px; height: 24px; }
        .cyz-ht-main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
            text-align: left;
        }
        .cyz-ht-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 11.5px;
            font-weight: 800;
            letter-spacing: .6px;
            color: var(--brand-d);
            text-transform: uppercase;
        }
        .cyz-ht-desc {
            font-size: 13px;
            color: var(--text2);
            font-weight: 600;
            line-height: 1.35;
        }
        .cyz-ht-desc b {
            color: var(--navy);
            font-weight: 800;
        }
        .cyz-ht-price {
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            line-height: 1;
            padding-left: 16px;
            border-left: 1px dashed rgba(181, 137, 72, .35);
        }
        .cyz-cyz-ht-price-lbl {
            font-size: 10.5px;
            color: var(--text2);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 4px;
        }
        .cyz-cyz-ht-price-val {
            font-size: 27px;
            font-weight: 800;
            color: var(--brand-d);
            line-height: 1;
            white-space: nowrap;
        }
        .cyz-ht-cur {
            font-size: .55em;
            font-weight: 800;
            margin-left: 2px;
        }

        /* ── 2 BÜYÜK ÖNE ÇIKAN TEMA VİTRİNİ (.cyz-tema) ── */
        .cyz-tema-sira {
            position: relative;
            z-index: 2;
            margin-top: 36px;
        }
        .cyz-tema-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 28px;
        }
        @media (max-width: 991px) {
            .cyz-tema-grid { grid-template-columns: 1fr; max-width: 600px; margin: 0 auto; }
        }
        .cyz-tema {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .cyz-tema-bas {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 14px;
        }
        .cyz-tema-ad {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 800;
            font-size: 18px;
            color: var(--navy);
        }
        .cyz-tema-ad svg {
            color: var(--brand);
            width: 20px;
            height: 20px;
        }
        .cyz-tema-etiket {
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .6px;
            padding: 4px 11px;
            border-radius: 50px;
            text-transform: uppercase;
            white-space: nowrap;
        }
        .cyz-et-mega {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: #fff;
            box-shadow: 0 4px 12px rgba(217, 119, 6, .28);
        }
        .cyz-et-sade {
            background: linear-gradient(135deg, var(--brand), var(--brand-d));
            color: #fff;
            box-shadow: 0 4px 12px rgba(181, 137, 72, .28);
        }

        .cyz-gorsel {
            position: relative;
            padding: 6px 0 0;
            margin: 0;
        }
        .cyz-gorsel-isik {
            position: absolute;
            inset: -6% -4%;
            background: radial-gradient(60% 60% at 62% 38%, rgba(212, 175, 55, .32), transparent 70%), radial-gradient(50% 55% at 28% 82%, rgba(181, 137, 72, .28), transparent 70%);
            filter: blur(34px);
            z-index: 0;
            animation: cyzFloat 9s ease-in-out infinite;
        }
        .cyz-isik-sade {
            background: radial-gradient(60% 60% at 62% 38%, rgba(129, 140, 248, .28), transparent 70%), radial-gradient(50% 55% at 28% 82%, rgba(236, 72, 153, .20), transparent 70%);
        }
        @keyframes cyzFloat {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(25px, -25px); }
        }

        .cyz-gorsel-cerceve {
            position: relative;
            z-index: 1;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 30px 70px rgba(15, 23, 42, .22);
            border: 1px solid rgba(255, 255, 255, .6);
            background: #0f172a;
        }
        .cyz-gorsel-cerceve img {
            width: 100%;
            height: auto;
            aspect-ratio: 16/10;
            object-fit: cover;
            object-position: top center;
            display: block;
        }
        .cyz-gorsel-parlama {
            position: absolute;
            top: 0;
            left: -120%;
            width: 55%;
            height: 100%;
            background: linear-gradient(100deg, transparent, rgba(255, 255, 255, .38), transparent);
            transform: skewX(-18deg);
            animation: cyzParla 7s ease-in-out 1.6s infinite;
            pointer-events: none;
            z-index: 2;
        }
        @keyframes cyzParla {
            0%, 42% { left: -120%; }
            70%, 100% { left: 135%; }
        }

        .cyz-rozet {
            position: absolute;
            z-index: 4;
            top: 14px;
            left: 12px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border-radius: 50px;
            background: linear-gradient(135deg, #f43f5e, #e11d48);
            color: #fff;
            font-weight: 800;
            font-size: 14px;
            letter-spacing: .3px;
            transform: rotate(-6deg);
            box-shadow: 0 8px 24px rgba(225, 29, 72, .4);
            animation: cyzRozetFloat 4s ease-in-out infinite, cyzRozetGlow 2.6s ease-in-out infinite;
        }
        .cyz-rozet svg {
            width: 16px;
            height: 16px;
            animation: cyzWiggle 3s ease-in-out infinite;
        }
        @keyframes cyzRozetFloat {
            0%, 100% { transform: rotate(-6deg) translateY(0); }
            50% { transform: rotate(-6deg) translateY(-8px); }
        }
        @keyframes cyzRozetGlow {
            0%, 100% { box-shadow: 0 8px 24px rgba(225, 29, 72, .4); }
            50% { box-shadow: 0 12px 36px rgba(225, 29, 72, .65); }
        }
        @keyframes cyzWiggle {
            0%, 100% { transform: rotate(0deg); }
            20% { transform: rotate(-10deg); }
            40% { transform: rotate(8deg); }
            60% { transform: rotate(-5deg); }
            80% { transform: rotate(3deg); }
        }

        .cyz-fkart {
            position: absolute;
            z-index: 4;
            right: 12px;
            bottom: 14px;
            background: #fff;
            border-radius: 18px;
            padding: 14px 18px;
            box-shadow: 0 18px 45px rgba(15, 23, 42, .20);
            border: 1px solid rgba(15, 23, 42, .06);
            min-width: 172px;
            animation: cyzFloatBadge 5s ease-in-out .3s infinite;
        }
        @keyframes cyzFloatBadge {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .cyz-fk-bas {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 11.5px;
            font-weight: 800;
            letter-spacing: .5px;
            text-transform: uppercase;
            color: #e11d48;
            margin-bottom: 6px;
        }
        .cyz-fk-bas svg { width: 14px; height: 14px; }
        .cyz-fk-fiyatlar {
            display: flex;
            align-items: baseline;
            gap: 8px;
        }
        .cyz-fk-eski {
            font-size: 14px;
            color: #94a3b8;
            text-decoration: line-through;
            font-weight: 600;
        }
        .cyz-fk-yeni {
            font-size: 26px;
            font-weight: 800;
            color: var(--navy);
            line-height: 1;
        }
        .cyz-fk-yeni .cyz-fk-birim {
            font-size: .55em;
            margin-left: 2px;
        }
        .cyz-fk-indirim {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 8px;
            background: rgba(181, 137, 72, .12);
            color: var(--brand-d);
            font-size: 11.5px;
            font-weight: 800;
            padding: 4px 10px;
            border-radius: 50px;
        }

        .cyz-demo-cta {
            margin-top: 18px;
            display: flex;
            align-items: center;
            gap: 14px;
            width: 100%;
            background: linear-gradient(135deg, var(--brand), var(--brand-d));
            color: #fff !important;
            text-decoration: none !important;
            padding: 16px 22px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(181, 137, 72, .34);
            transition: all .35s var(--ease);
            position: relative;
            overflow: hidden;
        }
        .cyz-demo-cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .20), transparent);
            transition: .6s;
        }
        .cyz-demo-cta:hover::before { left: 100%; }
        .cyz-demo-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 40px rgba(181, 137, 72, .46);
            color: #fff !important;
        }
        .cyz-demo-cta-ic {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            min-width: 46px;
            border-radius: 14px;
            background: rgba(255, 255, 255, .18);
            color: #fff;
        }
        .cyz-demo-cta-ic svg { width: 22px; height: 22px; }
        .cyz-demo-cta-txt {
            display: flex;
            flex-direction: column;
            line-height: 1.22;
            font-weight: 800;
            font-size: 17px;
            text-align: left;
            flex: 1;
        }
        .cyz-demo-cta-txt small {
            font-weight: 600;
            font-size: 12.5px;
            opacity: .88;
            letter-spacing: .2px;
            margin-top: 3px;
        }
        .cyz-demo-cta-ok {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            transition: transform .35s var(--ease);
        }
        .cyz-demo-cta:hover .cyz-demo-cta-ok {
            transform: translateX(5px);
        }

        /* ── 4 DEMO KARTI (cyz-dk Modeli) ── */
        .cyz-demolar {
            margin-top: 48px;
            position: relative;
            z-index: 2;
        }
        .cyz-dk-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        @media (max-width: 1199px) { .cyz-dk-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 575px) { .cyz-dk-grid { grid-template-columns: 1fr; } }

        .cyz-dk {
            display: flex;
            flex-direction: column;
            height: 100%;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(15, 23, 42, .05);
            transition: transform .35s var(--ease), box-shadow .35s var(--ease), border-color .35s var(--ease);
        }
        .cyz-dk:hover {
            transform: translateY(-6px);
            box-shadow: 0 22px 50px rgba(15, 23, 42, .13);
            border-color: #cbd5e1;
        }
        .cyz-dk-bas {
            position: relative;
            padding: 15px 12px 14px;
            text-align: center;
            border-bottom: 1px solid var(--border);
            background: linear-gradient(180deg, #ffffff 0%, var(--light2) 100%);
        }
        .cyz-dk-bas::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -1px;
            transform: translateX(-50%);
            width: 46px;
            height: 2px;
            border-radius: 2px;
            background: linear-gradient(90deg, var(--brand), var(--brand-l));
            opacity: 0;
            transition: opacity .35s var(--ease);
        }
        .cyz-dk:hover .cyz-dk-bas::after { opacity: 1; }
        .cyz-dk-ad {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 7px;
            font-weight: 700;
            font-size: 16px;
            color: var(--navy);
            line-height: 1.2;
        }
        .cyz-dk-yeni {
            background: var(--brand);
            color: #fff;
            font-size: 9.5px;
            font-weight: 800;
            padding: 2px 7px;
            border-radius: 6px;
            letter-spacing: .5px;
        }
        .cyz-dk-gorsel {
            position: relative;
            overflow: hidden;
            background: var(--light2);
            aspect-ratio: 4/3;
        }
        .cyz-dk-gorsel img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top center;
            transition: object-position 4.5s ease;
            display: block;
        }
        .cyz-dk:hover .cyz-dk-gorsel img {
            object-position: bottom center;
        }
        .cyz-dk-aktif {
            position: absolute;
            top: 12px;
            right: 12px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(15, 23, 42, .72);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            color: #fff;
            font-size: 10.5px;
            font-weight: 700;
            letter-spacing: .6px;
            padding: 5px 11px;
            border-radius: 30px;
        }
        .cyz-dk-aktif-nokta {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #22c55e;
            animation: cyzAktifPulse 1.6s ease-in-out infinite;
            flex-shrink: 0;
        }
        @keyframes cyzAktifPulse {
            0%, 100% { opacity: 1; box-shadow: 0 0 0 0 rgba(34, 197, 94, .55); }
            50% { opacity: .65; box-shadow: 0 0 0 5px rgba(34, 197, 94, 0); }
        }
        .cyz-dk-alt {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 13px;
            padding: 16px 16px 18px;
            margin-top: auto;
        }
        .cyz-dk-fiyat {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(181, 137, 72, .09);
            color: var(--brand-d);
            font-weight: 600;
            font-size: 12.5px;
            padding: 7px 14px;
            border-radius: 30px;
            line-height: 1.2;
            text-align: center;
        }
        .cyz-dk-fiyat svg {
            width: 13px;
            height: 13px;
            color: var(--brand);
        }
        .cyz-dk-fiyat b {
            font-weight: 800;
            font-size: 13.5px;
        }
        .cyz-dk-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px 16px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none !important;
            background: var(--white);
            color: var(--navy);
            border: 1.5px solid var(--border);
            transition: all .3s var(--ease);
        }
        .cyz-dk-btn svg {
            color: var(--brand);
            width: 15px;
            height: 15px;
            transition: transform .3s var(--ease);
        }
        .cyz-dk-btn:hover {
            border-color: var(--brand);
            background: var(--brand);
            color: #fff !important;
        }
        .cyz-dk-btn:hover svg {
            color: #fff;
            transform: translate(2px, -2px);
        }

        /* ── REFERANSLAR (cy-ref) ── */
        .cy-ref-grid-parent {
            display: grid !important;
            grid-template-columns: 1fr !important;
            gap: 36px !important;
        }
        @media (min-width: 1024px) {
            .cy-ref-grid-parent {
                grid-template-columns: 5fr 7fr !important;
                gap: 48px !important;
                align-items: center !important;
            }
        }
        .cy-ref-p {
            color: var(--text2);
            font-size: 15.5px;
            line-height: 1.85;
            margin: 0 0 22px;
        }
        .cy-chips-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin: 0 0 24px;
        }
        @media (max-width: 480px) {
            .cy-chips-grid { grid-template-columns: 1fr; }
        }
        .cy-chip-item {
            display: flex;
            align-items: center;
            gap: 9px;
            background: var(--light2);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 10px 14px;
            font-size: 13px;
            font-weight: 700;
            color: var(--navy);
            transition: all .3s var(--ease);
        }
        .cy-chip-item:hover {
            border-color: var(--brand);
            background: rgba(181, 137, 72, .06);
            transform: translateY(-2px);
        }
        .cy-chip-item svg {
            width: 16px;
            height: 16px;
            color: var(--brand);
            flex-shrink: 0;
        }
        .cy-ref-btn-wrap {
            margin-top: 14px !important;
            margin-bottom: 36px !important;
        }
        @media (min-width: 1024px) {
            .cy-ref-btn-wrap {
                margin-bottom: 0 !important;
            }
        }
        .cy-ref-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }
        @media (max-width: 640px) {
            .cy-ref-grid { grid-template-columns: 1fr; }
        }
        .cy-ref-item {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(15, 23, 42, .08);
            display: flex;
            flex-direction: column;
            height: 100%;
            margin-top: 0 !important;
            transition: transform .35s var(--ease), box-shadow .35s var(--ease), border-color .35s;
        }
        .cy-ref-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 40px rgba(15, 23, 42, .14);
            border-color: #cbd5e1;
        }
        .cy-ref-item-browser {
            height: 30px;
            background: var(--light2);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 12px;
        }
        .cy-ref-dots {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .cy-ref-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            display: inline-block;
        }
        .cy-ref-url {
            font-size: 10px;
            font-family: monospace;
            color: var(--text2);
            background: #fff;
            padding: 1px 8px;
            border-radius: 4px;
            border: 1px solid #e2e8f0;
            max-width: 140px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .cy-ref-img-wrap {
            position: relative;
            overflow: hidden;
            aspect-ratio: 4/3;
            background: var(--navy);
        }
        .cy-ref-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top center;
            transition: transform .6s var(--ease);
            display: block;
        }
        .cy-ref-item:hover .cy-ref-img-wrap img {
            transform: scale(1.06);
        }
        .cy-ref-tag-overlay {
            position: absolute;
            top: 10px;
            left: 10px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(15, 23, 42, .78);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            color: #fff;
            font-size: 10.5px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
        }
        .cy-ref-tag-overlay svg {
            width: 12px;
            height: 12px;
            color: var(--brand-l);
        }
        .cy-ref-item-foot {
            padding: 12px 14px;
            background: #ffffff;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
        }
        .cy-ref-item-title {
            font-weight: 700;
            font-size: 12.5px;
            color: var(--navy);
        }
        .cy-ref-item-badge {
            font-size: 10px;
            font-weight: 700;
            color: #16a34a;
            background: #f0fdf4;
            padding: 3px 8px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .cy-ref-item-badge::before {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #22c55e;
            animation: cyzAktifPulse 1.6s infinite;
        }
        .cy-ref-bottom-badge {
            margin-top: 18px;
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 14px 20px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, .06);
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .cy-ref-bb-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--brand), var(--brand-d));
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 6px 16px rgba(181, 137, 72, .3);
        }
        .cy-ref-bb-icon svg { width: 22px; height: 22px; }
        .cy-ref-bb-num {
            font-weight: 800;
            font-size: 18px;
            color: var(--navy);
            line-height: 1.1;
        }
        .cy-ref-bb-lbl {
            font-size: 11.5px;
            color: var(--text2);
            font-weight: 600;
            margin-top: 2px;
        }

        /* ── GENEL ÖZELLİKLER (cy-feat-card Modeli) ── */
        .cy-feat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        @media (max-width: 1199px) { .cy-feat-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 679px) { .cy-feat-grid { grid-template-columns: 1fr; } }

        .cy-feat-card {
            position: relative;
            display: flex;
            flex-direction: column;
            height: 100%;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 6px 22px rgba(15, 23, 42, .05);
            transition: transform .4s var(--ease), box-shadow .4s var(--ease), border-color .4s;
        }
        .cy-feat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--acc);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .5s var(--ease);
            z-index: 2;
        }
        .cy-feat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 26px 60px rgba(15, 23, 42, .12);
        }
        .cy-feat-card:hover::before { transform: scaleX(1); }

        .cy-feat-head {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 22px 20px 18px;
            border-bottom: 1px solid var(--border);
        }
        .cy-feat-ic {
            flex-shrink: 0;
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: var(--acc);
            box-shadow: 0 8px 18px var(--acc-sh);
            transition: transform .4s var(--ease2);
        }
        .cy-feat-ic svg { width: 24px; height: 24px; }
        .cy-feat-card:hover .cy-feat-ic { transform: scale(1.08) rotate(-4deg); }
        .cy-feat-t {
            font-weight: 800;
            font-size: 17px !important;
            color: var(--navy) !important;
            line-height: 1.1;
        }
        .cy-feat-s {
            display: block;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.6px;
            color: var(--text2);
            text-transform: uppercase;
            margin-top: 4px;
        }
        .cy-feat-list {
            list-style: none;
            margin: 0;
            padding: 12px 12px 16px;
            display: flex;
            flex-direction: column;
            gap: 1px;
            flex: 1;
        }
        .cy-feat-list li {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 9px 10px;
            border-radius: 11px;
            font-size: 13.5px;
            font-weight: 600;
            color: var(--text);
            transition: background .25s, padding-left .25s;
        }
        .cy-feat-list li:hover {
            background: var(--acc-bg);
            padding-left: 14px;
        }
        .cy-feat-list li svg {
            width: 15px;
            height: 15px;
            color: var(--acc-i);
            flex-shrink: 0;
        }

        /* ── ALT ÇAĞRI BANDI (CTA) ── */
        .cy-cta-band {
            background: #0b1120;
            position: relative;
            overflow: hidden;
            padding: 80px 0;
        }
        .cy-cta-band::before, .cy-cta-band::after {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            filter: blur(100px);
            z-index: 0;
            pointer-events: none;
        }
        .cy-cta-band::before {
            background: rgba(181, 137, 72, .18);
            top: -200px;
            left: -200px;
        }
        .cy-cta-band::after {
            background: rgba(181, 137, 72, .14);
            bottom: -200px;
            right: -200px;
        }
    </style>

    <div class="cy-page">

        {{-- =========================================================================
             BÖLÜM 1: HERO & ÖNE ÇIKAN VİTRİN (.cyz-vitrin)
             ========================================================================= --}}
        <section class="cyz-vitrin">
            <div class="container-page cyz-govde">

                {{-- Üst Sayfalar / Breadcrumb (Geniş Boşluklu ve Şık Kapsayıcı) --}}
                <nav aria-label="breadcrumb" class="hk-breadcrumb-wrap">
                    <ol class="hk-breadcrumb-list">
                        <li><a href="/" style="color: #64748b; text-decoration: none;" onmouseover="this.style.color='#b58948'" onmouseout="this.style.color='#64748b'">Anasayfa</a></li>
                        <li style="color: #cbd5e1;">/</li>
                        <li><a href="/hizmetler" style="color: #64748b; text-decoration: none;" onmouseover="this.style.color='#b58948'" onmouseout="this.style.color='#64748b'">Hizmetlerimiz</a></li>
                        <li style="color: #cbd5e1;">/</li>
                        <li style="color: #b58948; font-weight: 700;">Hazır Yazılımlarımız</li>
                    </ol>
                </nav>

                {{-- Başlık ve Tanıtım --}}
                <div class="cyz-copy cyz-lead">
                    <div class="cyz-trust-wrap">
                        <span class="cyz-trust">
                            <x-icon name="shield" />
                            <b>16+ Yıllık</b> Tecrübe ile Anahtar Teslim Yazılım Altyapısı
                        </span>
                    </div>

                    <h1>
                        İşinize Özel Anahtar Teslim <br class="hidden sm:inline" />
                        <span class="highlight">Hazır Web Siteleri</span>
                    </h1>

                    <p class="cyz-desc">
                        Sıfırdan başlama maliyetlerine ve aylarca süren süreçlere son. Avukat, doktor, çiçekçi ve haber portalları için anında kurulan, SEO uyumlu ve yüksek dönüşümlü hazır yazılımlarımızla hemen yayına başlayın.
                    </p>

                    <div class="cyz-btns">
                        <a href="#yazilimlar" class="cyz-btn-gold">
                            Hazır Yazılımları İnceleyin
                            <x-icon name="arrow-right" class="cy-ar h-4 w-4" />
                        </a>
                        <a href="{{ $contact['whatsapp'] }}?text={{ urlencode('Merhaba, hazır web yazılımlarınız hakkında bilgi ve canlı demo almak istiyorum.') }}" target="_blank" rel="noopener" class="cyz-btn-outline">
                            <x-icon name="whatsapp" class="h-4 w-4 text-emerald-500" />
                            Canlı Demo & Bilgi Al
                        </a>
                    </div>

                    {{-- Taksit / Güven Kutusu --}}
                    <div class="cyz-taksit">
                        <div class="cyz-ht-ico">
                            <x-icon name="cart" />
                        </div>
                        <div class="cyz-ht-main">
                            <span class="cyz-ht-badge">
                                <x-icon name="sparkles" /> TÜM KREDİ KARTLARINA
                            </span>
                            <span class="cyz-ht-desc">
                                <b>Peşin Fiyatına 12 Taksit</b> veya Havale ile Anında Kurulum
                            </span>
                        </div>
                        <div class="cyz-ht-price">
                            <span class="cyz-cyz-ht-price-lbl">ANAHTAR TESLİM</span>
                            <span class="cyz-cyz-ht-price-val">24<span class="cyz-ht-cur">SAATTE</span></span>
                        </div>
                    </div>
                </div>

                {{-- =========================================================================
                     2 BÜYÜK ÖNE ÇIKAN SHOWCASE KARTI (.cyz-tema)
                     ========================================================================= --}}
                <div class="cyz-tema-sira">
                    <div class="cyz-tema-grid">

                        {{-- Mega Tema 1: Çiçekçi E-Ticaret --}}
                        <div class="cyz-tema">
                            <div class="cyz-tema-bas">
                                <span class="cyz-tema-ad">
                                    <x-icon name="cart" /> Hazır Çiçekçi E-Ticaret Sitesi
                                </span>
                                <span class="cyz-tema-etiket cyz-et-mega">TAM DONANIMLI E-TİCARET</span>
                            </div>

                            <div class="cyz-gorsel">
                                <div class="cyz-gorsel-isik"></div>
                                <div class="cyz-gorsel-cerceve">
                                    <img src="/images/references/hukumdar-cicekci-sitesi-isinizi-dijitalde-b-uy-utmenin-en-renkli-yolu.png" alt="Hazır Çiçekçi E-Ticaret Sitesi" loading="eager">
                                    <div class="cyz-gorsel-parlama"></div>
                                </div>
                                <div class="cyz-rozet">
                                    <x-icon name="bolt" />
                                    <span>Fırsat</span>
                                </div>
                                <div class="cyz-fkart">
                                    <div class="cyz-fk-bas">
                                        <x-icon name="sparkles" /> Açılış Fırsatı
                                    </div>
                                    <div class="cyz-fk-fiyatlar">
                                        <span class="cyz-fk-eski">Özel Teklif</span>
                                        <span class="cyz-fk-yeni">24<span class="cyz-fk-birim">Saatte</span></span>
                                    </div>
                                    <div class="cyz-fk-indirim">
                                        <x-icon name="check" class="h-3 w-3" /> Sanal POS & Yol Ayarlı
                                    </div>
                                </div>
                            </div>

                            <a href="{{ $contact['whatsapp'] }}?text={{ urlencode('Merhaba, Hazır Çiçekçi E-Ticaret Sitesi için canlı demo incelemek istiyorum.') }}" target="_blank" rel="noopener" class="cyz-demo-cta">
                                <span class="cyz-demo-cta-ic">
                                    <x-icon name="sparkles" />
                                </span>
                                <span class="cyz-demo-cta-txt">
                                    Çiçekçi Yazılımı Canlı Demo
                                    <small>Yol ücreti, saat aralıklı teslimat ve ödeme modülünü inceleyin</small>
                                </span>
                                <x-icon name="arrow-right" class="cyz-demo-cta-ok" />
                            </a>
                        </div>

                        {{-- Mega Tema 2: Avukat & Hukuk Bürosu --}}
                        <div class="cyz-tema">
                            <div class="cyz-tema-bas">
                                <span class="cyz-tema-ad">
                                    <x-icon name="shield" /> Avukat & Hukuk Bürosu Web Tasarımı
                                </span>
                                <span class="cyz-tema-etiket cyz-et-sade">BARO MEVZUATINA UYUMLU</span>
                            </div>

                            <div class="cyz-gorsel">
                                <div class="cyz-gorsel-isik cyz-isik-sade"></div>
                                <div class="cyz-gorsel-cerceve">
                                    <img src="/images/references/hukumdar-bam-birlesik-arabuluculuk-merkezleri-kurumsal-web-sitesi.jpg" alt="Avukat & Hukuk Bürosu Web Tasarımı" loading="lazy">
                                    <div class="cyz-gorsel-parlama"></div>
                                </div>
                                <div class="cyz-rozet" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); box-shadow: 0 8px 24px rgba(29,78,216,.4);">
                                    <x-icon name="shield" />
                                    <span>Kurumsal</span>
                                </div>
                                <div class="cyz-fkart">
                                    <div class="cyz-fk-bas" style="color: #1d4ed8;">
                                        <x-icon name="shield" /> Güven ve Saygınlık
                                    </div>
                                    <div class="cyz-fk-fiyatlar">
                                        <span class="cyz-fk-eski">Anahtar Teslim</span>
                                        <span class="cyz-fk-yeni">%100<span class="cyz-fk-birim">Uyumlu</span></span>
                                    </div>
                                    <div class="cyz-fk-indirim" style="background: rgba(29,78,216,.1); color: #1d4ed8;">
                                        <x-icon name="check" class="h-3 w-3" /> Online Vekaletname & Danışmanlık
                                    </div>
                                </div>
                            </div>

                            <a href="{{ $contact['whatsapp'] }}?text={{ urlencode('Merhaba, Avukat & Hukuk Bürosu Web Tasarımı için canlı demo incelemek istiyorum.') }}" target="_blank" rel="noopener" class="cyz-demo-cta">
                                <span class="cyz-demo-cta-ic">
                                    <x-icon name="layout" />
                                </span>
                                <span class="cyz-demo-cta-txt">
                                    Hukuk Bürosu Canlı Demo
                                    <small>Müvekkilleriniz için prestijli ve güven veren arayüzü test edin</small>
                                </span>
                                <x-icon name="arrow-right" class="cyz-demo-cta-ok" />
                            </a>
                        </div>

                    </div>
                </div>

                {{-- =========================================================================
                     4 KÜÇÜK SEKTÖREL DEMO KARTI (.cyz-demolar -> .cyz-dk)
                     ========================================================================= --}}
                <div id="yazilimlar" class="cyz-demolar scroll-mt-24">
                    <div class="cyz-dk-grid">
                        @foreach ($readySites as $site)
                            <div class="cyz-dk">
                                <div class="cyz-dk-bas">
                                    <span class="cyz-dk-ad">
                                        <span style="width:8px;height:8px;border-radius:50%;background:{{ $site['theme_color'] }};"></span>
                                        {{ $site['short_title'] }}
                                        <span class="cyz-dk-yeni" style="background:{{ $site['theme_color'] }};">{{ $site['tag'] }}</span>
                                    </span>
                                </div>

                                <div class="cyz-dk-gorsel">
                                    <img src="{{ $site['image'] }}" alt="{{ $site['title'] }}" loading="lazy">
                                    <span class="cyz-dk-aktif">
                                        <span class="cyz-dk-aktif-nokta"></span> Aktif Demo
                                    </span>
                                </div>

                                <div class="cyz-dk-alt">
                                    <span class="cyz-dk-fiyat">
                                        <x-icon name="sparkles" />
                                        <b>{{ $site['opportunity'] }}</b>
                                    </span>
                                    <a href="{{ $contact['whatsapp'] }}?text={{ urlencode('Merhaba, ' . $site['title'] . ' için detaylı bilgi ve demo rica ediyorum.') }}" target="_blank" rel="noopener" class="cyz-dk-btn">
                                        <x-icon name="arrow-right" />
                                        Temayı İncele
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>

        {{-- =========================================================================
             BÖLÜM 2: GÜVEN & İSTATİSTİK ŞERİDİ (.cy-statbar)
             ========================================================================= --}}
        <section class="cy-statbar bg-white border-y border-ink-100">
            <div class="container-page">
                <div class="cy-stats">
                    @foreach ($stats as $stat)
                        <div class="cy-stat">
                            <div class="cy-stat-ic" style="background: {{ $stat['grad'] }}; box-shadow: 0 8px 18px {{ $stat['shadow'] }};">
                                <x-icon :name="$stat['icon']" />
                            </div>
                            <div class="text-left">
                                <div class="cy-stat-num">{{ $stat['num'] }}</div>
                                <div class="cy-stat-lbl">{{ $stat['label'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- =========================================================================
             BÖLÜM 3: REFERANSLAR & GÜVEN (.cy-ref)
             ========================================================================= --}}
        <section class="cy-section bg-white">
            <div class="container-page">
                <div class="cy-ref-grid-parent">

                    {{-- Sol: Açıklama ve Güven Metni --}}
                    <div class="flex flex-col justify-center">
                        <span class="cy-eyebrow">
                            <x-icon name="shield" /> Referanslarımız & Güven
                        </span>

                        <h2 class="cy-title" style="text-align: left;">
                            +300’den Fazla <span class="hl">İşletmeyle</span> Büyüyoruz
                        </h2>

                        <p class="cy-ref-p">
                            Türkiye’nin en çok tercih edilen sektörel yazılım çözümlerinden biri olarak, 81 ilimizde hukuk bürolarından sağlık kliniklerine, çiçekçi esnafından haber portallarına kadar yüzlerce işletmeye kesintisiz hizmet veriyoruz. Sağladığımız güçlü bulut altyapı, kolay Türkçe yönetim paneli ve 7/24 teknik destek sayesinde iş ortaklarımızın %99’u bizimle çalışmaya devam etmektedir.
                        </p>

                        <div class="cy-chips-grid">
                            <div class="cy-chip-item">
                                <x-icon name="map-pin" />
                                <span>81 İlde Aktif</span>
                            </div>
                            <div class="cy-chip-item">
                                <x-icon name="sparkles" />
                                <span>%99 Memnuniyet</span>
                            </div>
                            <div class="cy-chip-item">
                                <x-icon name="users" />
                                <span>300+ Referans</span>
                            </div>
                            <div class="cy-chip-item">
                                <x-icon name="phone" />
                                <span>7/24 Destek</span>
                            </div>
                        </div>

                        {{-- Buton Konteynerı: Altına net 36px mesafe verildi --}}
                        <div class="cy-ref-btn-wrap">
                            <a href="/referanslar" class="cy-btn cy-btn-primary">
                                Tüm Referansları İnceleyin
                                <x-icon name="arrow-right" class="cy-ar h-4 w-4" />
                            </a>
                        </div>
                    </div>

                    {{-- Sağ: 2 Adet Eşit, Hizalı Mockup Kartı ve Güven Rozeti --}}
                    <div>
                        <div class="cy-ref-grid">

                            {{-- Referans 1: Çiçekçi E-Ticaret --}}
                            <div class="cy-ref-item">
                                <div class="cy-ref-item-browser">
                                    <div class="cy-ref-dots">
                                        <span class="cy-ref-dot" style="background: #ff5f56;"></span>
                                        <span class="cy-ref-dot" style="background: #ffbd2e;"></span>
                                        <span class="cy-ref-dot" style="background: #27c93f;"></span>
                                    </div>
                                    <span class="cy-ref-url">cicekcisitesi.com.tr</span>
                                </div>
                                <div class="cy-ref-img-wrap">
                                    <img src="/images/references/hukumdar-cicekci-sitesi-isinizi-dijitalde-b-uy-utmenin-en-renkli-yolu.png" alt="Çiçekçi Yazılımı Referansı" loading="lazy">
                                    <span class="cy-ref-tag-overlay">
                                        <x-icon name="sparkles" /> E-Ticaret Altyapısı
                                    </span>
                                </div>
                                <div class="cy-ref-item-foot">
                                    <span class="cy-ref-item-title">Hazır Çiçekçi Portalı</span>
                                    <span class="cy-ref-item-badge">Aktif Yayında</span>
                                </div>
                            </div>

                            {{-- Referans 2: Hukuk / BAM Arabuluculuk --}}
                            <div class="cy-ref-item">
                                <div class="cy-ref-item-browser">
                                    <div class="cy-ref-dots">
                                        <span class="cy-ref-dot" style="background: #ff5f56;"></span>
                                        <span class="cy-ref-dot" style="background: #ffbd2e;"></span>
                                        <span class="cy-ref-dot" style="background: #27c93f;"></span>
                                    </div>
                                    <span class="cy-ref-url">bamarabuluculuk.com.tr</span>
                                </div>
                                <div class="cy-ref-img-wrap">
                                    <img src="/images/references/hukumdar-bam-birlesik-arabuluculuk-merkezleri-kurumsal-web-sitesi.jpg" alt="Hukuk Bürosu Referansı" loading="lazy">
                                    <span class="cy-ref-tag-overlay">
                                        <x-icon name="shield" /> Hukuk & Arabuluculuk
                                    </span>
                                </div>
                                <div class="cy-ref-item-foot">
                                    <span class="cy-ref-item-title">BAM Hukuk Merkezi</span>
                                    <span class="cy-ref-item-badge">Aktif Yayında</span>
                                </div>
                            </div>

                        </div>

                        {{-- Alt Güven Şeridi --}}
                        <div class="cy-ref-bottom-badge">
                            <div class="cy-ref-bb-icon">
                                <x-icon name="check" />
                            </div>
                            <div>
                                <div class="cy-ref-bb-num">%99 Müşteri Memnuniyeti</div>
                                <div class="cy-ref-bb-lbl">81 İlde Kesintisiz Teknik Destek & Yıllık İş Ortaklığı</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- =========================================================================
             BÖLÜM 4: GENEL ÖZELLİKLER & TEKNİK KAPASİTE (4 SÜTUN (.cy-feat-card))
             ========================================================================= --}}
        <section class="cy-section" style="background: var(--light);">
            <div class="container-page">
                <div class="cy-head">
                    <span class="cy-eyebrow">
                        <x-icon name="sparkles" /> Teknik Kapasite
                    </span>
                    <h2 class="cy-title">
                        Hazır Yazılımlarımızın <span class="hl">Genel Özellikleri</span>
                    </h2>
                    <p class="cy-sub">
                        Hükümdar Bilişim olarak sunduğumuz tüm sektörel hazır yazılımların temel özellikleri ve teknik kapasite detayları aşağıda yer almaktadır. Üstün sunucu altyapısı, modern mobil uyumlu tasarım ve kullanım kolaylığı standarttır.
                    </p>
                </div>

                <div class="cy-feat-grid">

                    {{-- 1: Sunucu --}}
                    <div class="cy-feat-card" style="--acc: linear-gradient(135deg, #0ea5e9, #0284c7); --acc-sh: rgba(2,132,199,.28); --acc-bg: rgba(2,132,199,.07); --acc-i: #0284c7;">
                        <div class="cy-feat-head">
                            <div class="cy-feat-ic">
                                <x-icon name="shield" />
                            </div>
                            <div>
                                <span class="cy-feat-t">Sunucu</span>
                                <span class="cy-feat-s">Temel Altyapı</span>
                            </div>
                        </div>
                        <ul class="cy-feat-list">
                            <li><x-icon name="check" /> 64 GB DDR4 NVMe Bulut Sistem</li>
                            <li><x-icon name="check" /> 1000 Mbps Port & Yüksek Hız</li>
                            <li><x-icon name="check" /> Sınırsız Aylık Trafik Kapasitesi</li>
                            <li><x-icon name="check" /> Yüksek Hızlı SSD Hosting</li>
                            <li><x-icon name="check" /> Cloudflare WAF & DDoS Güvenlik</li>
                            <li><x-icon name="check" /> Ücretsiz Kurumsal SSL Sertifikası</li>
                            <li><x-icon name="check" /> Otomatik Haftalık / Günlük Yedek</li>
                            <li><x-icon name="check" /> %99.9 Uptime & Kesintisiz Yayın</li>
                        </ul>
                    </div>

                    {{-- 2: Ön Yüz Özellikleri --}}
                    <div class="cy-feat-card" style="--acc: linear-gradient(135deg, #16a34a, #15803d); --acc-sh: rgba(22,130,60,.28); --acc-bg: rgba(22,163,74,.08); --acc-i: #16a34a;">
                        <div class="cy-feat-head">
                            <div class="cy-feat-ic">
                                <x-icon name="layout" />
                            </div>
                            <div>
                                <span class="cy-feat-t">Özellikler</span>
                                <span class="cy-feat-s">Ön Yüz & Deneyim</span>
                            </div>
                        </div>
                        <ul class="cy-feat-list">
                            <li><x-icon name="check" /> %100 Mobil & Tablet Uyumu</li>
                            <li><x-icon name="check" /> Ultra Hızlı Açılış (Core Web Vitals)</li>
                            <li><x-icon name="check" /> Google SEO Uyumlu Temiz Kod</li>
                            <li><x-icon name="check" /> Çoklu Ürün & Fotoğraf Galerisi</li>
                            <li><x-icon name="check" /> WhatsApp Hızlı İletişim Butonu</li>
                            <li><x-icon name="check" /> Akıllı Form & Başvuru Motoru</li>
                            <li><x-icon name="check" /> Kolay Okunur Modern Tipografi</li>
                            <li><x-icon name="check" /> Sosyal Medya Paylaşım Desteği</li>
                        </ul>
                    </div>

                    {{-- 3: Yönetim Paneli --}}
                    <div class="cy-feat-card" style="--acc: linear-gradient(135deg, #8b5cf6, #7c3aed); --acc-sh: rgba(124,58,237,.28); --acc-bg: rgba(124,58,237,.07); --acc-i: #7c3aed;">
                        <div class="cy-feat-head">
                            <div class="cy-feat-ic">
                                <x-icon name="code" />
                            </div>
                            <div>
                                <span class="cy-feat-t">Yönetim Paneli</span>
                                <span class="cy-feat-s">Kontrol & Düzenleme</span>
                            </div>
                        </div>
                        <ul class="cy-feat-list">
                            <li><x-icon name="check" /> %100 Türkçe, Sade Yönetim Paneli</li>
                            <li><x-icon name="check" /> Kod Bilgisi Gerektirmeyen Yapı</li>
                            <li><x-icon name="check" /> Sınırsız Sayfa, Kategori & İçerik</li>
                            <li><x-icon name="check" /> Banner, Manşet & Slider Yönetimi</li>
                            <li><x-icon name="check" /> Canlı Sipariş, Mesaj & Randevu</li>
                            <li><x-icon name="check" /> Tek Tıkla Site Açma / Bakım Modu</li>
                            <li><x-icon name="check" /> Yetkili Editör & Kullanıcı Rolleri</li>
                            <li><x-icon name="check" /> Otomatik Görsel Optimizasyonu</li>
                        </ul>
                    </div>

                    {{-- 4: Destek & Hizmet --}}
                    <div class="cy-feat-card" style="--acc: linear-gradient(135deg, #f59e0b, #d97706); --acc-sh: rgba(217,119,6,.28); --acc-bg: rgba(217,119,6,.08); --acc-i: #d97706;">
                        <div class="cy-feat-head">
                            <div class="cy-feat-ic">
                                <x-icon name="phone" />
                            </div>
                            <div>
                                <span class="cy-feat-t">Destek</span>
                                <span class="cy-feat-s">Müşteri Hizmetleri</span>
                            </div>
                        </div>
                        <ul class="cy-feat-list">
                            <li><x-icon name="check" /> 7/24 Telefon & WhatsApp Destek</li>
                            <li><x-icon name="check" /> Birebir Panel Kullanım Eğitimi</li>
                            <li><x-icon name="check" /> İlk Kurulum & Demo Veri Yükleme</li>
                            <li><x-icon name="check" /> Search Console & Harita Desteği</li>
                            <li><x-icon name="check" /> E-Ticaret & Pazarlama Rehberliği</li>
                            <li><x-icon name="check" /> Güvenlik Yamaları & Güncellemeler</li>
                            <li><x-icon name="check" /> Hızlı Mühendislik & Hata Çözümü</li>
                            <li><x-icon name="check" /> Satış Sonrası Sürekli Ortaklık</li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        {{-- =========================================================================
             BÖLÜM 5: ÇAĞRI BANDI (CTA)
             ========================================================================= --}}
        <section class="cy-cta-band text-center">
            <div class="container-page relative z-10">
                <div class="max-w-3xl mx-auto">
                    <span class="cy-eyebrow" style="background: rgba(255,255,255,.08); border-color: rgba(255,255,255,.16); color: #fde68a;">
                        <x-icon name="sparkles" style="color: #fde68a;" /> 24 Saatte Yayındasınız
                    </span>

                    <h2 class="cy-title" style="color: #ffffff !important;">
                        İşinize Uygun Hazır Yazılımı <br class="hidden sm:inline" />
                        <span class="hk-gold-text">Birlikte Başlatalım!</span>
                    </h2>

                    <p style="color: rgba(255, 255, 255, .72); font-size: 16px; line-height: 1.85; margin: 0 auto 32px; max-width: 620px;">
                        Avukat, doktor, çiçekçi veya haber portalı... Hangisine ihtiyacınız varsa alan adınızı ve logonuzu bize iletin, 24 saat içinde sitenizi anahtar teslim kullanıma hazır teslim edelim.
                    </p>

                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="/iletisim" class="cy-btn cy-btn-primary">
                            Hemen Teklif Alın
                            <x-icon name="arrow-right" class="cy-ar h-4 w-4" />
                        </a>
                        <a href="{{ $contact['whatsapp'] }}?text={{ urlencode('Merhaba, hazır web yazılımlarınız için detaylı bilgi ve demo rica ediyorum.') }}"
                           target="_blank" rel="noopener"
                           class="cy-btn" style="background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.18); color: #fff !important; backdrop-filter: blur(6px);">
                            <x-icon name="whatsapp" class="h-5 w-5 text-emerald-400" />
                            WhatsApp'tan Hızlı Sorun
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>

</x-layouts.app>

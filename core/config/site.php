<?php

/*
|--------------------------------------------------------------------------
| Site / Marka Yapılandırması
|--------------------------------------------------------------------------
| Hükümdar Bilişim markasına ait tüm statik içerik tek yerden yönetilir.
| Header, footer, menü ve SEO bileşenleri bu dosyayı kullanır.
*/

return [

    'brand' => [
        'name' => 'Hükümdar Bilişim',
        'short' => 'Hükümdar',
        'logo' => 'images/logo.png',
        'logo_light' => 'images/logo-footer.png',
        'favicon' => 'images/favicon.png',
        'domain' => 'hukumdar.com.tr',
        'tagline' => 'Geleceği Şekillendiren Dijital Hizmetler — Web Yazılım & Teknoloji Ajansı.',
        'footer_description' => 'Hükümdar Bilişim, işletmelerin dijital dünyada başarılı olmalarını sağlamak için modern çözümler sunan bir teknoloji ajansıdır. Web tasarımı, özel yazılım geliştirme, SEO, dijital pazarlama ve e-ticaret altyapılarıyla markanızı geleceğin ihtiyaçlarına hazır hale getiriyoruz.',
        'description' => 'Hükümdar Bilişim; 2008 yılından bu yana kurumsal web tasarımı, özel yazılım geliştirme, SEO, dijital pazarlama, mobil uygulama ve e-ticaret altyapılarıyla markanızı geleceğin ihtiyaçlarına hazır hale getirir.',
    ],

    'contact' => [
        'phone' => '+90 532 696 21 20',
        'phone_href' => 'tel:+905326962120',
        'whatsapp' => 'https://wa.me/905326962120',
        'email' => 'info@hukumdar.com.tr',
        'address' => 'Yenibosna Kuyumcukent A.V.M. Blogu Kat:1 No: 403 Bahçelievler / İSTANBUL',
    ],

    'mail_to' => env('MAIL_TO', 'info@hukumdar.com.tr'),

    /*
    | Genel SEO — title formatı: Marka | Sayfa
    */
    'seo' => [
        'title_separator' => ' - ',
        'default_title' => 'Anasayfa - Hükümdar Bilişim - Web Yazılım',
        'default_description' => 'Geleceği Şekillendiren Dijital Hizmetler. Hükümdar Bilişim, işletmelerin dijital dünyada başarılı olmalarını sağlamak için web tasarımı, özel yazılım geliştirme, SEO, dijital pazarlama ve e-ticaret altyapıları sunan bir teknoloji ajansıdır.',
        'keywords' => 'hükümdar bilişim, web tasarım, e-ticaret paketleri, özel yazılım geliştirme, mobil uygulama geliştirme, seo hizmeti, sosyal medya yönetimi, google ads yönetimi, bilişim danışmanlığı, b2b yazılımı',
        'og_image' => 'images/blog/mugla-seo-firmasi.png',
        'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
        'area_served' => 'Bahçelievler, İstanbul ve Tüm Türkiye',
        'geo' => [
            'street' => 'Yenibosna Kuyumcukent A.V.M. Blogu Kat:1 No: 403',
            'locality' => 'Bahçelievler',
            'region' => 'İstanbul',
            'country' => 'TR',
            'icbm' => '41.0039, 28.8189',
        ],
        'pages' => [
            'services' => [
                'title' => 'Hizmetlerimiz & Yazılım Çözümlerimiz',
                'description' => 'Web tasarım, e-ticaret paketleri, mobil uygulama, özel yazılım, SEO, Google Ads, sosyal medya yönetimi ve bilişim danışmanlığı hizmetleri.',
            ],
            'about' => [
                'title' => 'Hakkımızda',
                'description' => '2008 yılından bu yana web dünyasının modern ve profesyonel yüzü Hükümdar Bilişim; yazılım mühendisleri, SEO uzmanları ve içerik yöneticileriyle 300+ markaya hizmet veriyor.',
            ],
            'references' => [
                'title' => 'Referanslarımız & Projelerimiz',
                'description' => 'Hükümdar Bilişim web tasarım, e-ticaret ve özel yazılım referanslarımız. 300’den fazla kurumsal marka ve işletmeyle tamamladığımız dijital projeler.',
            ],
            'pricing' => [
                'title' => 'E-Ticaret & Web Tasarım Paketleri',
                'description' => 'Hükümdar Bilişim yıllık e-ticaret paketleri ve hazır web site paketleri. Pazaryeri entegrasyonları, mobil uygulama, SEO ve yönetim paneli dahil.',
            ],
            'blog' => [
                'title' => 'Blog — Teknoloji, Dijital Pazarlama ve SEO Yazılarımız',
                'description' => 'Hükümdar Bilişim blog: SEO rehberleri, e-ticarette başarı ipuçları, Google Ads hesap yönetimi ve dijital pazarlama stratejileri.',
            ],
            'contact' => [
                'title' => 'İletişim & Destek',
                'description' => 'Hükümdar Bilişim ile iletişime geçin. Yenibosna Kuyumcukent A.V.M. Bahçelievler / İstanbul adresimiz veya +90 532 696 21 20 hattımız üzerinden bize ulaşın.',
            ],
        ],
    ],

    'social' => [
        ['label' => 'Instagram', 'href' => 'https://www.instagram.com/hukumdarbilisim/', 'icon' => 'instagram'],
        ['label' => 'LinkedIn', 'href' => 'https://www.linkedin.com/company/hukumdar-bilisim/', 'icon' => 'linkedin'],
    ],

    /*
    | Ana navigasyon. "children" tanımlı öğeler mega/dropdown menü açar.
    */
    'nav' => [
        ['label' => 'Anasayfa', 'href' => '/', 'match' => '/'],
        [
            'label' => 'Hizmetlerimiz',
            'href' => '/hizmetler',
            'match' => '/hizmetler*',
            'children' => [
                ['label' => 'Web Tasarım', 'href' => '/hizmetler/web-tasarim', 'desc' => 'Hazır değil, özel tasarım modüllerle kurumsal web siteleri.', 'icon' => 'layout'],
                ['label' => 'E-Ticaret Paketleri', 'href' => '/hizmetler/e-ticaret', 'desc' => 'Pazaryeri ve 21 banka POS entegreli e-ticaret yazılımları.', 'icon' => 'cart'],
                ['label' => 'Mobil Uygulama', 'href' => '/hizmetler/mobil-uygulama', 'desc' => 'iOS & Android React tabanlı mobil uygulama geliştirme.', 'icon' => 'sparkles'],
                ['label' => 'Özel Yazılım', 'href' => '/hizmetler/ozel-yazilim', 'desc' => 'Bilgisayar mühendisi ekibimizle işinize özel otomasyon ve CRM.', 'icon' => 'code'],
                ['label' => 'SEO Hizmeti', 'href' => '/hizmetler/seo', 'desc' => 'Google’da üst sıralara taşıyan teknik ve içerik odaklı SEO.', 'icon' => 'search'],
                ['label' => 'Sosyal Medya Yönetimi', 'href' => '/hizmetler/sosyal-medya', 'desc' => 'Stratejik içerik takvimi, Reels prodüksiyonu ve reklam yönetimi.', 'icon' => 'share'],
                ['label' => 'Google Ads Reklamları', 'href' => '/hizmetler/google-ads', 'desc' => 'Satış ve dönüşüm odaklı profesyonel Google AdWords yönetimi.', 'icon' => 'target'],
                ['label' => 'Bilişim Danışmanlığı', 'href' => '/hizmetler/bilisim-danismanligi', 'desc' => 'Yazılım, IT desteği, sunucu ve dijital süreç danışmanlığı.', 'icon' => 'shield'],
                ['label' => 'Yazılım Ürünlerimiz', 'href' => '/hizmetler/urunlerimiz', 'desc' => 'QR Menü, Otel, Acenta, Haber, Kurye ve Teklif yazılımlarımız.', 'icon' => 'bolt'],
            ],
        ],
        ['label' => 'Hakkımızda', 'href' => '/hakkimizda', 'match' => '/hakkimizda'],
        ['label' => 'Referanslarımız', 'href' => '/referanslar', 'match' => '/referanslar'],
        ['label' => 'Paketler', 'href' => '/fiyatlar', 'match' => '/fiyatlar'],
        ['label' => 'Blog', 'href' => '/blog', 'match' => '/blog*'],
        ['label' => 'İletişim', 'href' => '/iletisim', 'match' => '/iletisim'],
    ],

    /*
    | Sol alt WhatsApp mesaj kutusu (floating widget).
    */
    'whatsapp_widget' => [
        'enabled' => true,
        'delay_ms' => 2800,
        'agent_name' => 'Hükümdar Bilişim',
        'agent_status' => 'Satış öncesi destek ve detaylı bilgi',
        'message' => 'Merhaba! 👋 Dilediğiniz zaman WhatsApp üzerinden bizlerle iletişime geçerek satış öncesi destek ve detaylı bilgi alabilirsiniz.',
        'cta' => 'WhatsApp İletişim',
        'prefill' => 'Merhaba, Hükümdar Bilişim hizmetleri ve paketleri hakkında bilgi almak istiyorum.',
        'sound_enabled' => true,
    ],

    'cta' => [
        'primary' => ['label' => 'Bizi Arayın / Teklif Alın', 'href' => '/iletisim'],
        'secondary' => ['label' => 'Referanslarımız', 'href' => '/referanslar'],
    ],

    /*
    | Giriş popup — oturum başına bir kez gösterilir (sessionStorage).
    */
    'popup' => [
        'enabled' => true,
        'delay_ms' => 1200,
        'badge' => 'Geleceği Şekillendiren Dijital Hizmetler',
        'title' => 'İşinizi büyütmeye',
        'title_highlight' => 'hazır mısınız?',
        'description' => 'Sonuç odaklı bir teknoloji ve yazılım ajansıyla çalışmak için bizimle iletişime geçin.',
        'benefits' => [
            ['icon' => 'layout', 'text' => 'Web tasarım, e-ticaret, özel yazılım ve SEO tek çatıda'],
            ['icon' => 'shield', 'text' => '2008’den bu yana 300+ kurumsal marka güvencesi'],
        ],
        'cta' => [
            'label' => 'Hemen İletişime Geçin',
            'href' => '/iletisim',
        ],
        'dismiss' => 'Şimdi değil, teşekkürler',
        'stats' => [
            ['value' => '300+', 'label' => 'Marka'],
            ['value' => '1200+', 'label' => 'Proje'],
            ['value' => '16+', 'label' => 'Yıl deneyim'],
        ],
    ],

];

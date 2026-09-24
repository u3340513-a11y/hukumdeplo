<?php
require_once __DIR__ . '/includes/db.php';

$latestPosts = [];
if ($pdo) {
    try {
        $stmt = $pdo->query(
            "SELECT p.id,p.title,p.slug,p.excerpt,p.featured_image,p.created_at,c.name AS category
             FROM blog_posts p LEFT JOIN blog_categories c ON c.id=p.category_id
             WHERE p.status='published' ORDER BY p.created_at DESC LIMIT 3"
        );
        $latestPosts = $stmt->fetchAll();
    } catch (Exception $e) {}
}

$siteRoot = '/';
$cssRoot  = '';
$pageTitle = 'Hükümdar — Web Tasarım, E-Ticaret & Dijital Pazarlama';
$metaDesc  = 'Web tasarım, e-ticaret, SEO ve dijital pazarlama alanlarında İstanbul merkezli profesyonel dijital ajans.';

$portfolio = [
    ['cat'=>'WEB TASARIM',    'name'=>'E-Ticaret Platform Tasarımı',   'img'=>'1593642632559-0c6d3fc62b89'],
    ['cat'=>'MOBİL UYGULAMA','name'=>'Kurumsal Mobil Uygulama',        'img'=>'1551288049-bebda4e38f71'],
    ['cat'=>'SEO & REKL.',   'name'=>'Dijital Pazarlama Kampanyası',   'img'=>'1504868584819-f8e8b4b6d7e3'],
    ['cat'=>'KURUMSAL KİMLİK','name'=>'Marka Kimliği Yenileme',        'img'=>'1541462608143-67571c6738dd'],
    ['cat'=>'E-TİCARET',     'name'=>'B2B E-Ticaret Çözümü',           'img'=>'1571898223410-65750970b59a'],
    ['cat'=>'ÖZEL YAZILIM',  'name'=>'CRM & Stok Yönetim Sistemi',     'img'=>'1460925895917-afdab827c52f'],
];

require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════════════════════════════════════════════════════
     HERO — slider versiyonu
     ═══════════════════════════════════════════════════════ -->
<section class="hero" id="hero">
  <div class="hero-deco">
    <div class="hero-ring hr1"></div><div class="hero-ring hr2"></div>
    <div class="hero-ring hr3"></div><div class="hero-ring hr4"></div>
  </div>

  <!-- Üst orta metin -->
  <div class="hero-txt-wrap">
    <div class="container">
      <div class="hero-pill" data-anim="zoom">
        Kurumsal web tasarımını strateji ve teknolojiyle birleştiren 360° dijital ajans
      </div>
      <h1 class="hero-h1" data-anim="up" data-delay="80">İşinizi Büyütüyoruz.</h1>
      <p class="hero-sub" data-anim="up" data-delay="160">
        Dijitalde etkili sonuçlar için doğru yerdesiniz.<br>
        Markanızı büyütecek stratejiler, yaratıcı çözümler ve güçlü teknolojilerle tanışın.
      </p>
      <div class="hero-acts" data-anim="up" data-delay="240">
        <a href="#hakkimizda" class="btn btn-or btn-lg">Keşfedin <i class="bi bi-arrow-right"></i></a>
        <a href="#referanslar" class="btn btn-out-or btn-lg">Referanslarımız</a>
      </div>
      <div class="hero-partners" data-anim="up" data-delay="320">
        <span class="hero-ptag"><i class="bi bi-bag-check-fill"></i> Shopify Partners</span>
        <span class="hero-psep">✦</span>
        <span class="hero-ptag"><i class="bi bi-cart4"></i> WooCommerce Expert</span>
        <span class="hero-psep">✦</span>
        <span class="hero-ptag"><i class="bi bi-google"></i> Google Partner</span>
      </div>
    </div>
  </div>
</section>

<!-- Proje ekran görüntüleri slider — hero hemen altında -->
<div class="hero-slides-section" id="referanslar">
  <div class="hero-slides-wrap" data-anim="up">
    <div class="swiper swiper-hero">
      <div class="swiper-wrapper">
        <?php
        $heroSlides = [
          ['url'=>'medikal-klinik.com.tr',     'img'=>'1576091160550-2173dba999ef'],
          ['url'=>'nutordinary.com.tr',         'img'=>'1571898223410-65750970b59a'],
          ['url'=>'adopen.com.tr',              'img'=>'1593642632559-0c6d3fc62b89'],
          ['url'=>'hukuk-avukat.com.tr',        'img'=>'1454165804606-c3d57bc86b40'],
          ['url'=>'insaat-proje.com.tr',        'img'=>'1486406146926-c627a92ad1ab'],
          ['url'=>'bistro-restaurant.com',      'img'=>'1414235077428-338989a2e8c0'],
          ['url'=>'moda-eticaret.com.tr',       'img'=>'1467232004584-a241de8bcf5d'],
          ['url'=>'teknoloji-startup.io',       'img'=>'1460925895917-afdab827c52f'],
        ];
        foreach ($heroSlides as $s): ?>
        <div class="swiper-slide">
          <div class="hs-mock">
            <div class="hs-bar">
              <div class="hs-dot"></div><div class="hs-dot"></div><div class="hs-dot"></div>
              <div class="hs-url"><?= he($s['url']) ?></div>
            </div>
            <div class="hs-screen">
              <img src="https://images.unsplash.com/photo-<?= he($s['img']) ?>?w=960&h=540&q=82&auto=format&fit=crop"
                   alt="<?= he($s['url']) ?>" loading="lazy">
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <button class="hero-next" aria-label="Sonraki proje">
      <i class="bi bi-chevron-right"></i>
    </button>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════
     MARQUEE BANDI
     ═══════════════════════════════════════════════════════ -->
<div class="marquee-bar">
  <div class="marquee-track">
    <?php $items = ['BÜYÜME İÇİN TASARLANDIK','DÖNÜŞÜM ODAKLI','STRATEJİ ÖNCELİKLİ','KALİTE STANDARTLARI','DİJİTAL DÖNÜŞÜM','10+ YILLIK DENEYİM']; ?>
    <?php for ($i = 0; $i < 4; $i++): foreach ($items as $t): ?>
    <div class="marquee-item"><?= he($t) ?></div>
    <?php endforeach; endfor; ?>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════
     HAKKIMIZDA
     ═══════════════════════════════════════════════════════ -->
<section class="about" id="hakkimizda">
  <div class="container">
    <div class="ab-grid">

      <!-- Fotoğraf kolajı -->
      <div class="ab-photos" data-anim="right">
        <div class="ab-photo ab-p1"><img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=500&q=80&auto=format&fit=crop" alt="Ekip toplantısı"></div>
        <div class="ab-photo ab-p2"><img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=500&q=80&auto=format&fit=crop" alt="Çalışma masası"></div>
        <div class="ab-photo ab-p3"><img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80&auto=format&fit=crop" alt="Ofis ortamı"></div>
        <div class="ab-dot ab-d1"></div>
        <div class="ab-dot ab-d2"></div>
      </div>

      <!-- Metin -->
      <div data-anim="left" data-delay="100">
        <div class="sec-tag">Hakkımızda</div>
        <h2 class="sec-title">Gerçek Sonuçlara<br>Odaklı Yaratıcı<br>Dijital Ajans</h2>
        <p class="sec-desc" style="margin-bottom:0">
          Hükümdar olarak işletmelerin dijital dönüşümüne 10+ yıldır öncülük ediyoruz. 
          Web tasarım, e-ticaret ve dijital pazarlamada uzman ekibimizle 
          müşterilerimizin başarısını ön planda tutuyoruz.
        </p>

        <div class="ab-features">
          <div class="ab-feat">
            <div class="ab-feat-ico"><i class="bi bi-lightbulb-fill"></i></div>
            <div><div class="ab-feat-name">Yaratıcı Markalaşma</div><div class="ab-feat-txt">Stratejiye dayalı marka kimliği ve tasarım</div></div>
          </div>
          <div class="ab-feat">
            <div class="ab-feat-ico"><i class="bi bi-graph-up"></i></div>
            <div><div class="ab-feat-name">Akıllı Strateji</div><div class="ab-feat-txt">Hedef odaklı dijital pazarlama planları</div></div>
          </div>
        </div>

        <div class="ab-checks">
          <div class="ab-chk">Strateji Odaklı Tasarım</div>
          <div class="ab-chk">Yenilikçi Geliştirme</div>
          <div class="ab-chk">Şeffaf İletişim</div>
          <div class="ab-chk">Dijital Güç</div>
        </div>

        <div class="ab-bottom">
          <a href="#iletisim" class="btn btn-or btn-lg">
            Keşfedin <i class="bi bi-arrow-right"></i>
          </a>
          <div class="ab-yrs">
            25<small>YIL</small>
          </div>
          <div>
            <div style="font-weight:700;font-size:.88rem">Uzman Ekip</div>
            <div style="font-size:.72rem;color:var(--text-3)">Deneyimli Profesyoneller</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════
     HİZMETLER — başlık section içinde, swiper dışarıda
     ═══════════════════════════════════════════════════════ -->
<section class="services" id="hizmetler">
  <div class="container">
    <div class="srv-header">
      <div data-anim="up">
        <div class="sec-tag">Hizmetlerimiz</div>
        <h2 class="sec-title">Potansiyel<br>Müşterilerimize<br>Neler Sunuyoruz</h2>
      </div>
      <div data-anim="up" data-delay="100">
        <p class="sec-desc">İşletmenizin dijital dönüşümü için ihtiyacınız olan tüm hizmetleri tek çatı altında sunuyoruz. Yaratıcı fikirlerinizi hayata geçiriyoruz.</p>
        <a href="#" class="btn btn-dark" style="margin-top:20px">Tüm Hizmetler <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- Swiper section dışında — overflow:hidden yok, 3D kırılmıyor -->
<div class="srv-cf-outer">
  <div class="swiper swiper-srv" style="position:relative;z-index:1">
    <div class="swiper-wrapper">
      <?php
      $srvs = [
        ['name'=>'Web Tasarım',         'short'=>'Modern & Hızlı Web Siteleri',         'img'=>'1547658719-da2b51169166'],
        ['name'=>'E-Ticaret',           'short'=>'Satışlarınızı Artırın',               'img'=>'1571898223410-65750970b59a'],
        ['name'=>'Mobil Uygulama',      'short'=>'iOS & Android Geliştirme',            'img'=>'1581091226825-a6a2a5aee158'],
        ['name'=>'SEO & Reklamlar',     'short'=>'Google\'da Üst Sıralara Çıkın',       'img'=>'1504868584819-f8e8b4b6d7e3'],
        ['name'=>'UI/UX Tasarım',       'short'=>'Kullanıcı Odaklı Arayüzler',          'img'=>'1555066931-4365d14bab8c'],
        ['name'=>'Sosyal Medya',        'short'=>'Marka Büyütme Stratejileri',          'img'=>'1460925895917-afdab827c52f'],
        ['name'=>'Özel Yazılım',        'short'=>'CRM, ERP & Otomasyon Sistemleri',     'img'=>'1593642632559-0c6d3fc62b89'],
        ['name'=>'Kurumsal Kimlik',     'short'=>'Logo & Marka Kimliği Tasarımı',       'img'=>'1541462608143-67571c6738dd'],
      ];
      foreach (array_merge($srvs, $srvs) as $s): ?>
      <div class="swiper-slide">
        <div class="srv-cs">
          <img src="https://images.unsplash.com/photo-<?= he($s['img']) ?>?w=700&h=900&q=82&auto=format&fit=crop"
               alt="<?= he($s['name']) ?>" loading="lazy">
          <div class="srv-cs-ov">
            <a href="#" class="srv-cs-btn"><i class="bi bi-arrow-up-right"></i></a>
            <div class="srv-cs-body">
              <span class="srv-cs-cat"><?= he($s['name']) ?></span>
              <h3 class="srv-cs-title"><?= he($s['short']) ?></h3>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="swiper-pagination srv-pg"></div>
  </div>
  <div style="text-align:center;padding-top:32px;position:relative;z-index:1">
    <a href="#" class="btn btn-or btn-lg">
      Tüm Hizmetleri Gör <i class="bi bi-arrow-right"></i>
    </a>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════
     NASIL ÇALIŞIR
     ═══════════════════════════════════════════════════════ -->
<section class="how" id="nasil-calisir">
  <div class="container">
    <div class="sec-hd" data-anim="up">
      <div class="sec-tag">Sürecimiz</div>
      <h2 class="sec-title">Yüksek Etkili Dijital Ürünler<br>İnşa Etme Sürecimiz</h2>
    </div>

    <div class="how-grid">
      <?php
      $steps = [
        ['ico'=>'🔍','name'=>'Keşif & Strateji',  'desc'=>'İşletmenizin hedeflerini, hedef kitlenizi ve rekabet ortamını derinlemesine analiz ediyoruz.','tag'=>'Strateji Geliştirme','img'=>'1573496359142-b8d87734a5a2'],
        ['ico'=>'📐','name'=>'Tasarım & Planlama', 'desc'=>'Markanızı yansıtan, kullanıcı dostu ve dönüşüm odaklı tasarım konseptleri oluşturuyoruz.','tag'=>'Müşteri Odaklı','img'=>'1556157382-97eda2d62296'],
        ['ico'=>'⚡','name'=>'Kusursuz Uygulama',  'desc'=>'Belirlenen strateji ve tasarımı en güncel teknolojilerle hayata geçiriyor, test ediyoruz.','tag'=>'Müşteri Odaklı Yaklaşım','img'=>'1507003211169-0a1dd7228f2d'],
      ];
      foreach ($steps as $i => $st): ?>
      <div class="how-card" data-anim="up" data-delay="<?= $i * 120 ?>">
        <div class="how-img"><img src="https://images.unsplash.com/photo-<?= he($st['img']) ?>?w=200&h=200&q=80&auto=format&fit=crop&crop=face" alt="<?= he($st['name']) ?>" loading="lazy"></div>
        <div class="how-num">0<?= $i+1 ?></div>
        <div class="how-name"><?= he($st['name']) ?></div>
        <div class="how-desc"><?= he($st['desc']) ?></div>
        <div class="how-tag"><?= he($st['tag']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="how-banner" data-anim="up">
      <div class="how-banner-txt"><strong>İşimizde Öncü Olmak</strong> İçin Çabalıyoruz</div>
      <a href="#iletisim" class="btn btn-or">
        Tüm Hizmetleri İncele <i class="bi bi-arrow-right"></i>
      </a>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════
     NEDEN BİZ (koyu)
     ═══════════════════════════════════════════════════════ -->
<section class="why" id="neden-biz">
  <div class="why-deco"></div>
  <div class="container">
    <div class="why-grid">
      <div class="why-img" data-anim="right">
        <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=700&q=80&auto=format&fit=crop" alt="Profesyonel Ekibimiz">
      </div>
      <div data-anim="left" data-delay="100">
        <div class="sec-tag">Neden Biz</div>
        <h2 class="sec-title sec-title-w">Önde Gelen Markalar Neden<br>Dijital Başarı İçin<br>Bize Güveniyor</h2>
        <p class="sec-desc" style="color:rgba(255,255,255,.5);margin-bottom:0">
          Strateji odaklı yaklaşımımız, şeffaf iletişimimiz ve uzun vadeli desteğimizle 
          müşterilerimizin dijital dünyada kalıcı başarı elde etmesini sağlıyoruz.
        </p>
        <div class="why-feats">
          <?php $feats = [
            ['Strateji odaklı tasarım, salt görsel değil','Hedef kitlenize ulaşan, dönüşüm sağlayan tasarımlar.'],
            ['Net iletişim ve şeffaflık','Her aşamada sizi bilgilendiriyor, süreçte şeffaf kalıyoruz.'],
            ['Uzun vadeli destek ve optimizasyon','Projeniz yayına girdikten sonra da yanınızdayız.'],
          ]; foreach ($feats as $f): ?>
          <div class="why-feat">
            <div class="why-feat-name"><?= he($f[0]) ?></div>
            <div class="why-feat-desc"><?= he($f[1]) ?></div>
          </div>
          <?php endforeach; ?>
        </div>
        <a href="#iletisim" class="btn btn-or btn-lg">
          Ücretsiz Danışmanlık <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════
     LOGO BANDI
     ═══════════════════════════════════════════════════════ -->
<div class="logos">
  <div class="container">
    <div class="logos-wrap">
      <?php foreach (['Quora','Hubspot','Roku','Rakuten','CR Reports'] as $b): ?>
      <div class="logo-brand"><?= he($b) ?></div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════
     STATS (koyu)
     ═══════════════════════════════════════════════════════ -->
<section class="stats" id="stats">
  <div class="container">
    <div class="stats-content">
      <div data-anim="right">
        <div class="stats-tag">Rakamlar Yalan Söylemez</div>
        <h2 class="stats-h">Bir Şirketin<br>Gerçek Gücünü<br>Ortaya Koyar</h2>
      </div>
      <div class="stats-rows" data-anim="left" data-delay="100">
        <?php $stats = [
          ['ico'=>'bi-check2-circle','n'=>'500+','l'=>'Tamamlanan Proje'],
          ['ico'=>'bi-people-fill',  'n'=>'350+','l'=>'Mutlu Müşteri'],
          ['ico'=>'bi-graph-up',     'n'=>'960K','l'=>'SEO & Gösterim'],
        ]; foreach ($stats as $st): ?>
        <div class="stat-row">
          <div class="stat-ico"><i class="bi <?= he($st['ico']) ?>"></i></div>
          <div>
            <div class="stat-n" data-count="<?= preg_replace('/\D/','',$st['n']) ?>" data-suffix="<?= preg_replace('/\d/','',$st['n']) ?>"><?= he($st['n']) ?></div>
            <div class="stat-l"><?= he($st['l']) ?></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════
     BLOG
     ═══════════════════════════════════════════════════════ -->
<section class="blog" id="blog">
  <div class="container">
    <div class="sec-hd" data-anim="up">
      <div class="sec-tag">Blog</div>
      <h2 class="sec-title">Dijital Dünyadan<br>Son Yazılar</h2>
      <p class="sec-desc">Sektördeki gelişmeleri, ipuçlarını ve başarı hikayelerini takip edin.</p>
    </div>

    <div class="bl-grid">
      <?php
      // DB'de yazı yoksa örnek kartlar
      $demoBlogs = [
        ['title'=>'Web Tasarımda 2026 Trendleri', 'cat'=>'Web Tasarım',  'date'=>'2026-06-15', 'img'=>'1432888498266-38f73892c9a1', 'xrp'=>'2026 yılında web tasarımı nasıl evrildi? Hangi trendler öne çıktı? Kapsamlı rehberimizde inceliyoruz.'],
        ['title'=>'SEO ile Organik Trafik Artırma',  'cat'=>'SEO',           'date'=>'2026-05-20', 'img'=>'1504868584819-f8e8b4b6d7e3', 'xrp'=>'Google\'da üst sıralara çıkmak için uygulamaniz gereken en güncel SEO stratejilerini paylaşıyoruz.'],
        ['title'=>'E-Ticaret Satışlarınızı Katlayın','cat'=>'E-Ticaret',     'date'=>'2026-04-10', 'img'=>'1571898223410-65750970b59a', 'xrp'=>'Online mağazanızın dönüşüm oranını artırmak için kanmış yöntemler ve pratik ipucu.'],
      ];
      $displayPosts = !empty($latestPosts) ? $latestPosts : [];
      $isDemo = empty($latestPosts);
      ?>
      <?php if ($isDemo): foreach ($demoBlogs as $i => $post): ?>
      <article class="bl-card" data-anim="up" data-delay="<?= $i * 100 ?>">
        <a href="blog/">
          <div class="bl-thumb">
            <img src="https://images.unsplash.com/photo-<?= he($post['img']) ?>?w=600&h=340&q=80&auto=format&fit=crop" alt="<?= he($post['title']) ?>" loading="lazy">
            <div class="bl-date-badge"><?= date('d M Y', strtotime($post['date'])) ?></div>
          </div>
        </a>
        <div class="bl-body">
          <span class="bl-cat"><?= he($post['cat']) ?></span>
          <h3 class="bl-title"><a href="blog/"><?= he($post['title']) ?></a></h3>
          <p class="bl-xrp"><?= he($post['xrp']) ?></p>
        </div>
        <div class="bl-foot">
          <a href="blog/" class="bl-more">Devamını Oku <i class="bi bi-arrow-right"></i></a>
          <span class="bl-date"><i class="bi bi-calendar3"></i> <?= date('d.m.Y', strtotime($post['date'])) ?></span>
        </div>
      </article>
      <?php endforeach; else: foreach ($latestPosts as $i => $post): ?>
      <article class="bl-card" data-anim="up" data-delay="<?= $i * 100 ?>">
        <a href="blog/post.php?slug=<?= urlencode($post['slug'] ?: $post['id']) ?>">
          <div class="bl-thumb">
            <?php if (!empty($post['featured_image'])): ?>
              <img src="/uploads/<?= he($post['featured_image']) ?>" alt="<?= he($post['title']) ?>" loading="lazy">
            <?php else: ?>
              <img src="https://images.unsplash.com/photo-1432888498266-38f73892c9a1?w=600&h=340&q=80&auto=format&fit=crop" alt="<?= he($post['title']) ?>" loading="lazy">
            <?php endif; ?>
            <div class="bl-date-badge"><?= date('d M Y', strtotime($post['created_at'])) ?></div>
          </div>
        </a>
        <div class="bl-body">
          <?php if (!empty($post['category'])): ?>
            <span class="bl-cat"><?= he($post['category']) ?></span>
          <?php endif; ?>
          <h3 class="bl-title">
            <a href="blog/post.php?slug=<?= urlencode($post['slug'] ?: $post['id']) ?>"><?= he($post['title']) ?></a>
          </h3>
          <?php if (!empty($post['excerpt'])): ?>
            <p class="bl-xrp"><?= he($post['excerpt']) ?></p>
          <?php endif; ?>
        </div>
        <div class="bl-foot">
          <a href="blog/post.php?slug=<?= urlencode($post['slug'] ?: $post['id']) ?>" class="bl-more">
            Devamını Oku <i class="bi bi-arrow-right"></i>
          </a>
          <span class="bl-date"><i class="bi bi-calendar3"></i> <?= date('d.m.Y', strtotime($post['created_at'])) ?></span>
        </div>
      </article>
      <?php endforeach; endif; ?>
    </div>

    <?php if (!empty($latestPosts)): ?>
    <div style="text-align:center;margin-top:48px" data-anim="up">
      <a href="blog/" class="btn btn-dark btn-lg">Tüm Yazıları Gör <i class="bi bi-arrow-right"></i></a>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════
     İLETİŞİM (koyu)
     ═══════════════════════════════════════════════════════ -->
<section class="contact" id="iletisim">
  <div class="container">
    <div class="ct-grid">
      <div data-anim="right">
        <div class="sec-tag">İletişime Geçin</div>
        <h2 class="ct-title">Konuşmaya Başlayalım<br>ve Birlikte Harika<br>Bir Şeyler İnşa Edelim</h2>
        <p class="ct-desc">Ücretsiz danışmanlık için bize ulaşın. Uzman ekibimiz projenizi değerlendirip en kısa sürede dönüş yapacaktır.</p>
        <div class="ct-infos">
          <div class="ct-info">
            <div class="ct-ico"><i class="bi bi-geo-alt-fill"></i></div>
            <div>
              <div class="ct-lbl">Adres</div>
              <div class="ct-val">Yenibosna Kuyumcukent A.V.M. Blogu Kat:1 No: 403<br>Bahçelievler / İSTANBUL</div>
            </div>
          </div>
          <div class="ct-info">
            <div class="ct-ico"><i class="bi bi-telephone-fill"></i></div>
            <div>
              <div class="ct-lbl">Telefon</div>
              <div class="ct-val"><a href="tel:+905326962120" style="color:var(--or)">+90 532 696 21 20</a></div>
            </div>
          </div>
          <div class="ct-info">
            <div class="ct-ico"><i class="bi bi-clock-fill"></i></div>
            <div>
              <div class="ct-lbl">Çalışma Saatleri</div>
              <div class="ct-val">Pazartesi — Pazar: 09:00 — 19:00</div>
            </div>
          </div>
        </div>
      </div>

      <div class="ct-form" data-anim="left" data-delay="100">
        <div class="form-row">
          <div class="form-g">
            <label>Adınız Soyadınız</label>
            <input type="text" placeholder="Adınız Soyadınız">
          </div>
          <div class="form-g">
            <label>E-posta Adresi</label>
            <input type="email" placeholder="E-posta Adresiniz">
          </div>
        </div>
        <div class="form-row">
          <div class="form-g">
            <label>Telefon Numarası</label>
            <input type="tel" placeholder="Telefon Numaranız">
          </div>
          <div class="form-g">
            <label>Hizmet Seçin</label>
            <select>
              <option>Hizmet Seçin</option>
              <option>Web Tasarım</option>
              <option>E-Ticaret</option>
              <option>SEO Hizmeti</option>
              <option>Sosyal Medya</option>
              <option>Mobil Uygulama</option>
            </select>
          </div>
        </div>
        <div class="form-g">
          <label>Mesajınız</label>
          <textarea placeholder="Projeniz hakkında bilgi verin..."></textarea>
        </div>
        <button type="button" class="btn btn-or btn-lg" style="width:100%;justify-content:center">
          Mesaj Gönder <i class="bi bi-arrow-right"></i>
        </button>
      </div>
    </div>
  </div>
</section>

<script>
/* Inline Swiper init — main.js versiyonundan bağımsız garantili çalışır */
document.addEventListener('DOMContentLoaded', function() {
  if (typeof Swiper === 'undefined') return;

  // Hero slider
  if (document.querySelector('.swiper-hero')) {
    new Swiper('.swiper-hero', {
      slidesPerView: 'auto', centeredSlides: true, spaceBetween: 20,
      loop: true, speed: 650, grabCursor: true,
      autoplay: { delay: 3200, disableOnInteraction: false, pauseOnMouseEnter: true },
      navigation: { nextEl: '.hero-next' },
    });
  }

  // Hizmetlerimiz coverflow
  if (document.querySelector('.swiper-srv')) {
    new Swiper('.swiper-srv', {
      effect: 'coverflow', grabCursor: true, centeredSlides: true,
      slidesPerView: 'auto', loop: true, speed: 700,
      coverflowEffect: { rotate: 28, stretch: 0, depth: 220, modifier: 1, slideShadows: true },
      pagination: { el: '.srv-pg', clickable: true },
      autoplay: { delay: 3500, disableOnInteraction: false, pauseOnMouseEnter: true },
    });
  }
});
</script>
<?php require_once __DIR__ . '/includes/footer.php'; ?>

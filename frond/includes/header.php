<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="description" content="<?= he($metaDesc ?? 'Hükümdar — Web Tasarım, E-Ticaret, SEO ve Dijital Pazarlama Hizmetleri.') ?>">
  <title><?= he($pageTitle ?? 'Hükümdar — Dijital Dünyada Güçlü Çözümler') ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" href="<?= $cssRoot ?? '' ?>assets/css/style.css">
</head>
<body>

<!-- ── HEADER ─────────────────────────────────────────── -->
<header class="site-hd" id="site-hd">
  <div class="container">
    <div class="hd-inner">

      <a href="<?= $siteRoot ?? '/' ?>" class="logo">
        <div class="logo-icon">👑</div>
        <div class="logo-txt">Hükümdar<span>.com.tr</span></div>
      </a>

      <nav class="main-nav" aria-label="Ana menü">
        <div class="nav-item">
          <span class="nav-lnk">Hizmetlerimiz <span class="nav-arr">▾</span></span>
          <div class="drop">
            <a href="#">Web Tasarım</a>
            <a href="#">E-Ticaret Paketleri</a>
            <a href="#">Mobil Uygulama</a>
            <a href="#">Özel Yazılım</a>
            <a href="#">Kurumsal Kimlik</a>
            <a href="#">Mersin Web Tasarım</a>
            <a href="#">Google Ads</a>
            <a href="#">Muğla Drone Çekim</a>
            <a href="#">SEO Hizmeti</a>
            <a href="#">Sosyal Medya Yönetimi</a>
            <a href="#">Bilişim Danışmanlığı</a>
          </div>
        </div>
        <div class="nav-item">
          <span class="nav-lnk">E-Ticaret <span class="nav-arr">▾</span></span>
          <div class="drop">
            <a href="#">E-Ticaret Paketleri</a>
            <a href="#">E-Ticaret Danışmanlığı</a>
            <a href="#">E-Ticaret Kampanyaları</a>
            <a href="#">B2B Yazılımı</a>
            <a href="#">Hazır Çiçekçi Sitesi</a>
            <a href="#">Muğla Drone Çekim</a>
            <a href="#">Ürün Çekimi</a>
          </div>
        </div>
        <div class="nav-item">
          <span class="nav-lnk">Kurumsal <span class="nav-arr">▾</span></span>
          <div class="drop">
            <a href="#">Hakkımızda</a>
            <a href="#">Ekibimiz</a>
            <a href="#">Kariyer</a>
            <a href="<?= $siteRoot ?? '/' ?>blog/">Blog</a>
            <a href="#iletisim">İletişim</a>
          </div>
        </div>
        <a href="<?= $siteRoot ?? '/' ?>#referanslar" class="nav-lnk">Referanslarımız</a>
        <a href="#" class="nav-lnk">Ürünlerimiz</a>
        <a href="#" class="nav-lnk">Muğla Web Tasarım</a>
      </nav>

      <div class="hd-right">
        <a href="tel:+905326962120" class="hd-phone">
          <div class="hd-ph-ico"><i class="bi bi-telephone-fill"></i></div>
          <div class="hd-ph-txt">
            <small>Her Zaman Arayın</small>
            <strong>+90 532 696 21 20</strong>
          </div>
        </a>
        <a href="#iletisim" class="btn btn-or">Teklif Al</a>
      </div>

      <button class="hamburger" id="hamburger" aria-label="Menü">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<!-- ── MOBİL NAV ──────────────────────────────────────── -->
<div class="mob-nav" id="mob-nav">
  <div class="mob-items">
    <a class="mob-lnk" href="#" data-sub="ms-hiz">Hizmetlerimiz <span class="arr">▼</span></a>
    <div class="mob-sub" id="ms-hiz">
      <a href="#">Web Tasarım</a><a href="#">E-Ticaret Paketleri</a>
      <a href="#">Mobil Uygulama</a><a href="#">Özel Yazılım</a>
      <a href="#">SEO Hizmeti</a><a href="#">Sosyal Medya Yönetimi</a>
    </div>
    <a class="mob-lnk" href="#" data-sub="ms-etc">E-Ticaret <span class="arr">▼</span></a>
    <div class="mob-sub" id="ms-etc">
      <a href="#">E-Ticaret Paketleri</a><a href="#">E-Ticaret Danışmanlığı</a>
      <a href="#">B2B Yazılımı</a><a href="#">Ürün Çekimi</a>
    </div>
    <a class="mob-lnk" href="#" data-sub="ms-kur">Kurumsal <span class="arr">▼</span></a>
    <div class="mob-sub" id="ms-kur">
      <a href="#">Hakkımızda</a>
      <a href="<?= $siteRoot ?? '/' ?>blog/">Blog</a>
      <a href="#iletisim">İletişim</a>
    </div>
    <a class="mob-lnk" href="<?= $siteRoot ?? '/' ?>#referanslar">Referanslarımız</a>
    <a class="mob-lnk" href="#">Ürünlerimiz</a>
    <a class="mob-lnk" href="#">Muğla Web Tasarım</a>
  </div>
  <div class="mob-cta">
    <a href="tel:+905326962120" class="btn btn-or" style="justify-content:center">
      <i class="bi bi-telephone-fill"></i> +90 532 696 21 20
    </a>
    <a href="#iletisim" class="btn btn-dark" style="justify-content:center">Teklif Al</a>
  </div>
</div>

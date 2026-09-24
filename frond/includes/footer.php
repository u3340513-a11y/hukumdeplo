<!-- ── İLETİŞİM BİLGİ ÇUBUĞU ─────────────────────────── -->
<div class="ci-bar">
  <div class="container">
    <div class="ci-grid">
      <div class="ci-item" data-anim="up">
        <div class="ci-ico"><i class="bi bi-geo-alt-fill"></i></div>
        <div>
          <div class="ci-lbl">Adres</div>
          <div class="ci-val">Yenibosna Kuyumcukent A.V.M. Blogu<br>Kat:1 No: 403 Bahçelievler / İSTANBUL</div>
        </div>
      </div>
      <div class="ci-item" data-anim="up" data-delay="120">
        <div class="ci-ico"><i class="bi bi-clock-fill"></i></div>
        <div>
          <div class="ci-lbl">Çalışma Saatleri</div>
          <div class="ci-val">Pazartesi - Pazar<br>09:00 - 19:00</div>
        </div>
      </div>
      <div class="ci-item" data-anim="up" data-delay="240">
        <div class="ci-ico"><i class="bi bi-telephone-fill"></i></div>
        <div>
          <div class="ci-lbl">Destek Hattı</div>
          <div class="ci-val">
            Destek ve sorularınız için iletişime geçebilirsiniz!<br>
            <a href="tel:+905326962120" style="color:var(--or);font-weight:700">+90 532 696 21 20</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ── FOOTER ─────────────────────────────────────────── -->
<footer class="site-ft">
  <div class="container">
    <div class="ft-top">
      <div>
        <a href="<?= $siteRoot ?? '/' ?>" class="logo">
          <div class="logo-icon">👑</div>
          <div class="logo-txt" style="color:#fff">Hükümdar<span>.com.tr</span></div>
        </a>
        <p class="ft-brand-txt">Dijital dünyada güçlü bir varlık oluşturmak için profesyonel web tasarım, e-ticaret ve dijital pazarlama hizmetleri.</p>
        <div class="soc-links">
          <a href="#" class="soc-a"><i class="bi bi-facebook"></i></a>
          <a href="#" class="soc-a"><i class="bi bi-instagram"></i></a>
          <a href="#" class="soc-a"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="soc-a"><i class="bi bi-linkedin"></i></a>
          <a href="#" class="soc-a"><i class="bi bi-youtube"></i></a>
        </div>
      </div>
      <div class="ft-col">
        <h4>Hizmetlerimiz</h4>
        <div class="ft-lnks">
          <a href="#">Web Tasarım</a><a href="#">E-Ticaret</a>
          <a href="#">Mobil Uygulama</a><a href="#">SEO Hizmeti</a>
          <a href="#">Sosyal Medya</a><a href="#">Kurumsal Kimlik</a>
        </div>
      </div>
      <div class="ft-col">
        <h4>E-Ticaret</h4>
        <div class="ft-lnks">
          <a href="#">E-Ticaret Paketleri</a><a href="#">Danışmanlık</a>
          <a href="#">B2B Yazılımı</a><a href="#">Çiçekçi Sitesi</a>
          <a href="#">Ürün Çekimi</a>
        </div>
      </div>
      <div class="ft-col">
        <h4>Kurumsal</h4>
        <div class="ft-lnks">
          <a href="#">Hakkımızda</a>
          <a href="<?= $siteRoot ?? '/' ?>#referanslar">Referanslar</a>
          <a href="<?= $siteRoot ?? '/' ?>blog/">Blog</a>
          <a href="#">Muğla Web Tasarım</a>
          <a href="#iletisim">İletişim</a>
        </div>
      </div>
    </div>
    <div class="ft-bot">
      <div class="ft-copy">© <?= date('Y') ?> <a href="<?= $siteRoot ?? '/' ?>">Hükümdar.com.tr</a> — Tüm hakları saklıdır.</div>
      <div class="ft-copy" style="display:flex;gap:16px">
        <a href="#" style="color:rgba(255,255,255,.3)">Gizlilik Politikası</a>
        <a href="#" style="color:rgba(255,255,255,.3)">Kullanım Şartları</a>
      </div>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?= $cssRoot ?? '' ?>assets/js/main.js"></script>
</body>
</html>

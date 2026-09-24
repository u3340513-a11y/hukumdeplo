<?php
require_once __DIR__ . '/../includes/db.php';

// ── Yazıyı Çek ─────────────────────────────────────────────
$post = null;
if ($pdo) {
    $slug = trim($_GET['slug'] ?? '');
    if ($slug === '') {
        header('Location: index.php', true, 302);
        exit;
    }

    // Slug veya ID ile ara
    try {
        $stmt = $pdo->prepare(
            "SELECT p.*, c.name AS category
             FROM   blog_posts p
             LEFT JOIN blog_categories c ON c.id = p.category_id
             WHERE  p.status = 'published'
               AND  (p.slug = ? OR p.id = ?)
             LIMIT  1"
        );
        $stmt->execute([$slug, is_numeric($slug) ? (int)$slug : 0]);
        $post = $stmt->fetch();
    } catch (Exception $e) { /* sessizce geç */ }
}

if (!$post) {
    header('HTTP/1.1 404 Not Found');
    $pageTitle = '404 — Sayfa Bulunamadı — Hükümdar';
    $cssRoot   = '../';
    $siteRoot  = '/';
    require_once __DIR__ . '/../includes/header.php';
    echo '<div style="min-height:60vh;display:flex;align-items:center;justify-content:center;text-align:center;padding:80px 20px">
            <div>
              <div style="font-size:80px;margin-bottom:24px;opacity:.3">🔍</div>
              <h1 style="font-size:2rem;margin-bottom:12px">Yazı Bulunamadı</h1>
              <p style="color:var(--text-2);margin-bottom:28px">Aradığınız yazı mevcut değil ya da kaldırılmış olabilir.</p>
              <a href="/blog/" class="btn btn-p">Blog\'a Dön</a>
            </div>
          </div>';
    require_once __DIR__ . '/../includes/footer.php';
    exit;
}

// ── İlgili Yazılar ─────────────────────────────────────────
$related = [];
if ($pdo && $post['category_id']) {
    try {
        $stmt = $pdo->prepare(
            "SELECT p.id, p.title, p.slug, p.featured_image, p.created_at, c.name AS category
             FROM   blog_posts p
             LEFT JOIN blog_categories c ON c.id = p.category_id
             WHERE  p.status = 'published' AND p.category_id = ? AND p.id != ?
             ORDER  BY p.created_at DESC LIMIT 3"
        );
        $stmt->execute([$post['category_id'], $post['id']]);
        $related = $stmt->fetchAll();
    } catch (Exception $e) { /* */ }
}

// ── Son Yazılar (sidebar) ──────────────────────────────────
$recentPosts = [];
if ($pdo) {
    try {
        $stmt = $pdo->prepare(
            "SELECT p.id, p.title, p.slug, p.featured_image, p.created_at
             FROM   blog_posts p
             WHERE  p.status = 'published' AND p.id != ?
             ORDER  BY p.created_at DESC LIMIT 5"
        );
        $stmt->execute([$post['id']]);
        $recentPosts = $stmt->fetchAll();
    } catch (Exception $e) { /* */ }
}

// ── Meta ───────────────────────────────────────────────────
$siteRoot  = '/';
$cssRoot   = '../';
$pageTitle = he($post['title']) . ' — Hükümdar Blog';
$metaDesc  = $post['meta_description'] ?: $post['excerpt'] ?: substr(strip_tags($post['content']), 0, 160);
$metaTitle = $post['meta_title'] ?: $post['title'];

require_once __DIR__ . '/../includes/header.php';
?>

<!-- ======================================================
     YAZI HERO
     ====================================================== -->
<div class="post-hero" id="post-hero">
  <div class="post-bg">
    <?php if (!empty($post['featured_image'])): ?>
      <img src="/admin/uploads/<?= he($post['featured_image']) ?>"
           alt="<?= he($post['title']) ?>">
    <?php else: ?>
      <div style="width:100%;height:100%;background:var(--grad-hero)"></div>
    <?php endif; ?>
  </div>
  <div class="container">
    <div class="post-hero-content">
      <div class="breadcrumb" style="margin-bottom:16px">
        <a href="/">Ana Sayfa</a><span>/</span>
        <a href="/blog/">Blog</a><span>/</span>
        <?php if (!empty($post['category'])): ?>
          <a href="/blog/?cat=<?= urlencode($post['category']) ?>"><?= he($post['category']) ?></a>
          <span>/</span>
        <?php endif; ?>
        <span><?= he(mb_strimwidth($post['title'], 0, 40, '…')) ?></span>
      </div>

      <?php if (!empty($post['category'])): ?>
        <span class="badge-tag" style="margin-bottom:14px"><?= he($post['category']) ?></span>
      <?php endif; ?>

      <h1 data-anim="up" style="font-size:clamp(1.8rem,3.5vw,2.8rem);font-weight:900;letter-spacing:-.03em;line-height:1.2;margin-bottom:16px">
        <?= he($post['title']) ?>
      </h1>

      <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;color:rgba(255,255,255,.6);font-size:.85rem" data-anim="up" data-delay="100">
        <span><i class="bi bi-calendar3"></i> <?= date('d.m.Y', strtotime($post['created_at'])) ?></span>
        <?php if (!empty($post['excerpt'])): ?>
          <span style="max-width:540px;color:rgba(255,255,255,.75)"><?= he($post['excerpt']) ?></span>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- ======================================================
     YAZI İÇERİĞİ
     ====================================================== -->
<section class="post-body">
  <div class="container">
    <div class="post-layout">

      <!-- Ana içerik -->
      <div>
        <div class="post-content" data-anim="up">
          <?= $post['content'] ?>
        </div>

        <!-- Etiketler / Paylaşım -->
        <div style="
          display:flex;align-items:center;justify-content:space-between;
          flex-wrap:wrap;gap:16px;margin-top:32px;
          background:var(--card);border:1px solid var(--border);
          border-radius:var(--radius);padding:20px 28px;
        ">
          <div style="font-size:.875rem;color:var(--text-2)">
            <strong style="color:var(--text)">Yayınlanma:</strong>
            <?= date('d F Y', strtotime($post['created_at'])) ?>
          </div>
          <div style="display:flex;gap:10px">
            <a href="https://twitter.com/intent/tweet?url=<?= urlencode('https://hukumdar.com.tr/blog/post.php?slug=' . ($post['slug'] ?: $post['id'])) ?>&text=<?= urlencode($post['title']) ?>"
               target="_blank" rel="noopener"
               class="btn btn-o" style="padding:8px 16px;font-size:.82rem">
              <i class="bi bi-twitter-x"></i> Paylaş
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode('https://hukumdar.com.tr/blog/post.php?slug=' . ($post['slug'] ?: $post['id'])) ?>"
               target="_blank" rel="noopener"
               class="btn btn-o" style="padding:8px 16px;font-size:.82rem">
              <i class="bi bi-linkedin"></i> Paylaş
            </a>
          </div>
        </div>

        <!-- İlgili yazılar -->
        <?php if (!empty($related)): ?>
        <div style="margin-top:52px">
          <h3 style="font-size:1.2rem;font-weight:800;margin-bottom:24px">İlgili Yazılar</h3>
          <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:20px">
            <?php foreach ($related as $r): ?>
            <article class="bl-card" data-anim="up">
              <a href="post.php?slug=<?= urlencode($r['slug'] ?: $r['id']) ?>">
                <div class="bl-thumb">
                  <?php if (!empty($r['featured_image'])): ?>
                    <img src="/admin/uploads/<?= he($r['featured_image']) ?>" alt="<?= he($r['title']) ?>" loading="lazy">
                  <?php else: ?>
                    <div class="bl-ph">📝</div>
                  <?php endif; ?>
                </div>
              </a>
              <div class="bl-body">
                <div class="bl-meta">
                  <?php if (!empty($r['category'])): ?>
                    <span class="bl-cat"><?= he($r['category']) ?></span>
                  <?php endif; ?>
                  <span class="bl-date"><i class="bi bi-calendar3"></i> <?= date('d.m.Y', strtotime($r['created_at'])) ?></span>
                </div>
                <h4 class="bl-title">
                  <a href="post.php?slug=<?= urlencode($r['slug'] ?: $r['id']) ?>"><?= he($r['title']) ?></a>
                </h4>
              </div>
              <div class="bl-foot">
                <a href="post.php?slug=<?= urlencode($r['slug'] ?: $r['id']) ?>" class="bl-more">
                  Oku <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </article>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>

      <!-- Sidebar -->
      <aside>

        <!-- Son Yazılar -->
        <?php if (!empty($recentPosts)): ?>
        <div class="sidebar-widget" data-anim="up">
          <h3>Son Yazılar</h3>
          <?php foreach ($recentPosts as $rp): ?>
          <a href="post.php?slug=<?= urlencode($rp['slug'] ?: $rp['id']) ?>" class="recent-post">
            <div class="rp-img">
              <?php if (!empty($rp['featured_image'])): ?>
                <img src="/admin/uploads/<?= he($rp['featured_image']) ?>" alt="<?= he($rp['title']) ?>" loading="lazy">
              <?php else: ?>
                <div style="width:100%;height:100%;background:#12122a;display:flex;align-items:center;justify-content:center;font-size:20px">📝</div>
              <?php endif; ?>
            </div>
            <div>
              <div class="rp-title"><?= he($rp['title']) ?></div>
              <div class="rp-date"><i class="bi bi-calendar3"></i> <?= date('d.m.Y', strtotime($rp['created_at'])) ?></div>
            </div>
          </a>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- CTA Widget -->
        <div class="sidebar-widget" data-anim="up" data-delay="100" style="background:linear-gradient(135deg,rgba(124,58,237,.18),rgba(79,70,229,.08));border-color:rgba(124,58,237,.3);text-align:center">
          <div style="font-size:40px;margin-bottom:12px">🚀</div>
          <h3 style="font-size:1.1rem;font-weight:800;margin-bottom:10px;text-transform:none;letter-spacing:0;color:var(--text)">
            Projenizi Başlatalım
          </h3>
          <p style="font-size:.85rem;color:var(--text-2);margin-bottom:20px;line-height:1.6">
            Dijital varlığınızı güçlendirmek için uzman ekibimizle iletişime geçin.
          </p>
          <a href="tel:+905326962120" class="btn btn-p" style="width:100%;justify-content:center">
            <i class="bi bi-telephone-fill"></i> Hemen Arayın
          </a>
        </div>

      </aside>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

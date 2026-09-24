<?php
require_once __DIR__ . '/../includes/db.php';

// ── Parametreler ───────────────────────────────────────────
$perPage    = 9;
$page       = max(1, (int)($_GET['page'] ?? 1));
$catSlug    = trim($_GET['cat'] ?? '');

// ── Kategori filtre ────────────────────────────────────────
$catId    = 0;
$catName  = '';
$catList  = [];
if ($pdo) {
    $catList = $pdo->query('SELECT id, name FROM blog_categories ORDER BY name')->fetchAll();
    if ($catSlug) {
        foreach ($catList as $c) {
            if (mb_strtolower($c['name']) === mb_strtolower($catSlug)) {
                $catId   = (int)$c['id'];
                $catName = $c['name'];
                break;
            }
        }
    }
}

// ── Toplam kayıt ───────────────────────────────────────────
$total = 0;
$posts = [];
if ($pdo) {
    $where  = "p.status = 'published'";
    $params = [];
    if ($catId) { $where .= ' AND p.category_id = ?'; $params[] = $catId; }

    try {
        $cntStmt = $pdo->prepare("SELECT COUNT(*) FROM blog_posts p WHERE $where");
        $cntStmt->execute($params);
        $total = (int)$cntStmt->fetchColumn();

        $params[] = ($page - 1) * $perPage;
        $params[] = $perPage;

        $stmt = $pdo->prepare(
            "SELECT p.id, p.title, p.slug, p.excerpt, p.featured_image, p.created_at,
                    c.name AS category
             FROM   blog_posts p
             LEFT JOIN blog_categories c ON c.id = p.category_id
             WHERE  $where
             ORDER  BY p.created_at DESC
             LIMIT  ?, ?"
        );
        $stmt->execute($params);
        $posts = $stmt->fetchAll();
    } catch (Exception $e) { /* sessizce geç */ }
}

$totalPages = $total > 0 ? (int)ceil($total / $perPage) : 1;

// ── Meta ───────────────────────────────────────────────────
$siteRoot  = '/';
$cssRoot   = '../';
$pageTitle = ($catName ? $catName . ' — ' : '') . 'Blog — Hükümdar';
$metaDesc  = 'Hükümdar blog: web tasarım, SEO, e-ticaret ve dijital pazarlama hakkında güncel yazılar.';

require_once __DIR__ . '/../includes/header.php';
?>

<!-- Page Hero -->
<div class="page-hero">
  <div class="container">
    <div class="page-hero-content">
      <div class="breadcrumb">
        <a href="/">Ana Sayfa</a>
        <span>/</span>
        <span>Blog</span>
        <?php if ($catName): ?>
          <span>/</span><span><?= he($catName) ?></span>
        <?php endif; ?>
      </div>
      <h1 data-anim="up">
        <?= $catName ? he($catName) : 'Blog' ?>
      </h1>
      <p style="color:var(--text-2);margin-top:10px" data-anim="up" data-delay="100">
        <?= $total ?> yazı bulundu
      </p>
    </div>
  </div>
</div>

<!-- Blog İçerik -->
<section class="blog-pg">
  <div class="container">

    <!-- Kategori filtre -->
    <?php if (!empty($catList)): ?>
    <div style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:40px" data-anim="up">
      <a href="index.php"
         class="btn <?= !$catId ? 'btn-p' : 'btn-o' ?>"
         style="padding:8px 18px;font-size:.82rem">Tümü</a>
      <?php foreach ($catList as $c): ?>
      <a href="index.php?cat=<?= urlencode($c['name']) ?>"
         class="btn <?= $catId === (int)$c['id'] ? 'btn-p' : 'btn-o' ?>"
         style="padding:8px 18px;font-size:.82rem">
        <?= he($c['name']) ?>
      </a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- Yazı Grid -->
    <div class="bl-pg-grid">
      <?php if (empty($posts)): ?>
      <div class="bl-empty" style="grid-column:1/-1">
        <div class="ico">📝</div>
        <p>Bu kategoride henüz yazı bulunmuyor.</p>
      </div>
      <?php else: ?>
        <?php foreach ($posts as $i => $post): ?>
        <article class="bl-card" data-anim="up" data-delay="<?= min($i * 80, 400) ?>">
          <a href="post.php?slug=<?= urlencode($post['slug'] ?: $post['id']) ?>">
            <div class="bl-thumb">
              <?php if (!empty($post['featured_image'])): ?>
                <img src="/admin/uploads/<?= he($post['featured_image']) ?>"
                     alt="<?= he($post['title']) ?>"
                     loading="lazy">
              <?php else: ?>
                <div class="bl-ph">📝</div>
              <?php endif; ?>
            </div>
          </a>
          <div class="bl-body">
            <div class="bl-meta">
              <?php if (!empty($post['category'])): ?>
                <span class="bl-cat"><?= he($post['category']) ?></span>
              <?php endif; ?>
              <span class="bl-date">
                <i class="bi bi-calendar3"></i>
                <?= date('d.m.Y', strtotime($post['created_at'])) ?>
              </span>
            </div>
            <h2 class="bl-title" style="font-size:1.05rem">
              <a href="post.php?slug=<?= urlencode($post['slug'] ?: $post['id']) ?>">
                <?= he($post['title']) ?>
              </a>
            </h2>
            <?php if (!empty($post['excerpt'])): ?>
              <p class="bl-xrp"><?= he($post['excerpt']) ?></p>
            <?php endif; ?>
          </div>
          <div class="bl-foot">
            <a href="post.php?slug=<?= urlencode($post['slug'] ?: $post['id']) ?>" class="bl-more">
              Devamını Oku <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </article>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if ($totalPages > 1): ?>
    <div class="pagination" data-anim="up">
      <?php if ($page > 1): ?>
        <a href="?page=<?= $page-1 ?><?= $catSlug ? '&cat='.urlencode($catSlug) : '' ?>" class="pg-btn">
          <i class="bi bi-chevron-left"></i>
        </a>
      <?php endif; ?>

      <?php for ($p = max(1,$page-2); $p <= min($totalPages,$page+2); $p++): ?>
        <a href="?page=<?= $p ?><?= $catSlug ? '&cat='.urlencode($catSlug) : '' ?>"
           class="pg-btn <?= $p === $page ? 'cur' : '' ?>">
          <?= $p ?>
        </a>
      <?php endfor; ?>

      <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page+1 ?><?= $catSlug ? '&cat='.urlencode($catSlug) : '' ?>" class="pg-btn">
          <i class="bi bi-chevron-right"></i>
        </a>
      <?php endif; ?>
    </div>
    <?php endif; ?>

  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

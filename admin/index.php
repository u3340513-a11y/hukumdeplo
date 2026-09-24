<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/functions.php';

requireLogin();

// İstatistikler
$totalPosts     = $pdo->query('SELECT COUNT(*) FROM blog_posts')->fetchColumn();
$publishedPosts = $pdo->query('SELECT COUNT(*) FROM blog_posts WHERE status = "published"')->fetchColumn();
$draftPosts     = $pdo->query('SELECT COUNT(*) FROM blog_posts WHERE status = "draft"')->fetchColumn();
$totalCats      = $pdo->query('SELECT COUNT(*) FROM blog_categories')->fetchColumn();

// Son 10 yazı
$recentPosts = $pdo->query(
    'SELECT p.id, p.title, p.status, p.created_at, c.name AS category_name
     FROM blog_posts p
     LEFT JOIN blog_categories c ON c.id = p.category_id
     ORDER BY p.created_at DESC
     LIMIT 10'
)->fetchAll();

$pageTitle = 'Dashboard — ' . ADMIN_PANEL_NAME;
require_once __DIR__ . '/includes/header.php';
?>

<div class="page-header d-flex align-items-center justify-content-between mb-4">
    <div>
        <h2 class="page-title">Dashboard</h2>
        <p class="text-muted mb-0">Genel bakış ve son aktiviteler</p>
    </div>
    <a href="<?= ADMIN_URL ?>/posts/create.php" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Yeni Yazı
    </a>
</div>

<!-- Stat Cards -->
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="stat-label">Toplam Yazı</p>
                        <h3 class="stat-value"><?= $totalPosts ?></h3>
                    </div>
                    <div class="stat-icon bg-primary-soft">
                        <i class="bi bi-file-text text-primary"></i>
                    </div>
                </div>
                <a href="<?= ADMIN_URL ?>/posts/index.php" class="stat-link">Tüm yazıları gör →</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="stat-label">Yayındaki Yazı</p>
                        <h3 class="stat-value text-success"><?= $publishedPosts ?></h3>
                    </div>
                    <div class="stat-icon bg-success-soft">
                        <i class="bi bi-check-circle text-success"></i>
                    </div>
                </div>
                <a href="<?= ADMIN_URL ?>/posts/index.php?status=published" class="stat-link">Yayındakileri gör →</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="stat-label">Taslak</p>
                        <h3 class="stat-value text-warning"><?= $draftPosts ?></h3>
                    </div>
                    <div class="stat-icon bg-warning-soft">
                        <i class="bi bi-pencil-square text-warning"></i>
                    </div>
                </div>
                <a href="<?= ADMIN_URL ?>/posts/index.php?status=draft" class="stat-link">Taslaklara gör →</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="stat-label">Kategori</p>
                        <h3 class="stat-value text-info"><?= $totalCats ?></h3>
                    </div>
                    <div class="stat-icon bg-info-soft">
                        <i class="bi bi-folder2 text-info"></i>
                    </div>
                </div>
                <a href="<?= ADMIN_URL ?>/categories/index.php" class="stat-link">Kategorileri gör →</a>
            </div>
        </div>
    </div>
</div>

<!-- Son Yazılar -->
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title mb-0"><i class="bi bi-clock-history me-2 text-muted"></i>Son Yazılar</h5>
        <a href="<?= ADMIN_URL ?>/posts/index.php" class="btn btn-sm btn-outline-secondary">Tümünü Gör</a>
    </div>
    <div class="card-body p-0">
        <?php if (empty($recentPosts)): ?>
        <div class="text-center py-5 text-muted">
            <i class="bi bi-file-text fs-1 d-block mb-2 opacity-25"></i>
            Henüz yazı bulunmuyor.
        </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Başlık</th>
                        <th>Kategori</th>
                        <th>Durum</th>
                        <th>Tarih</th>
                        <th class="text-end">İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recentPosts as $post): ?>
                    <tr>
                        <td class="fw-medium"><?= e($post['title']) ?></td>
                        <td>
                            <?php if ($post['category_name']): ?>
                            <span class="badge bg-light text-dark"><?= e($post['category_name']) ?></span>
                            <?php else: ?>
                            <span class="text-muted">—</span>
                            <?php endif; ?>
                        </td>
                        <td><?= getStatusBadge($post['status']) ?></td>
                        <td class="text-muted small"><?= formatDate($post['created_at']) ?></td>
                        <td class="text-end">
                            <a href="<?= ADMIN_URL ?>/posts/edit.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

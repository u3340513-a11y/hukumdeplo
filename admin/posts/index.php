<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/functions.php';

requireLogin();

$perPage     = 15;
$currentPage = max(1, (int)($_GET['page'] ?? 1));
$search      = trim($_GET['search'] ?? '');
$statusFilter = $_GET['status'] ?? '';
$catFilter   = (int)($_GET['category'] ?? 0);

$where  = ['1=1'];
$params = [];

if ($search !== '') {
    $where[]  = '(p.title LIKE ? OR p.excerpt LIKE ?)';
    $params[] = "%$search%";
    $params[] = "%$search%";
}
if (in_array($statusFilter, ['published', 'draft'])) {
    $where[]  = 'p.status = ?';
    $params[] = $statusFilter;
}
if ($catFilter > 0) {
    $where[]  = 'p.category_id = ?';
    $params[] = $catFilter;
}

$whereClause = implode(' AND ', $where);

$totalStmt = $pdo->prepare("SELECT COUNT(*) FROM blog_posts p WHERE $whereClause");
$totalStmt->execute($params);
$total = (int)$totalStmt->fetchColumn();

$pag    = paginate($total, $perPage, $currentPage);
$params[] = $pag['offset'];
$params[] = $perPage;

$posts = $pdo->prepare(
    "SELECT p.id, p.title, p.status, p.created_at, c.name AS category_name
     FROM blog_posts p
     LEFT JOIN blog_categories c ON c.id = p.category_id
     WHERE $whereClause
     ORDER BY p.created_at DESC
     LIMIT ?, ?"
);
$posts->execute($params);
$posts = $posts->fetchAll();

$categories = $pdo->query('SELECT id, name FROM blog_categories ORDER BY name')->fetchAll();

$pageTitle = 'Blog Yazıları — ' . ADMIN_PANEL_NAME;
require_once __DIR__ . '/../includes/header.php';
?>

<div class="page-header d-flex align-items-center justify-content-between mb-4">
    <div>
        <h2 class="page-title">Blog Yazıları</h2>
        <p class="text-muted mb-0">Toplam <?= $total ?> yazı</p>
    </div>
    <a href="<?= ADMIN_URL ?>/posts/create.php" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Yeni Yazı
    </a>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" class="form-control" name="search" value="<?= e($search) ?>" placeholder="Başlık veya içerikte ara...">
                </div>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">Tüm Durumlar</option>
                    <option value="published" <?= $statusFilter === 'published' ? 'selected' : '' ?>>Yayında</option>
                    <option value="draft" <?= $statusFilter === 'draft' ? 'selected' : '' ?>>Taslak</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="category" class="form-select">
                    <option value="">Tüm Kategoriler</option>
                    <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= $catFilter === (int)$cat['id'] ? 'selected' : '' ?>>
                        <?= e($cat['name']) ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-1 d-flex gap-2">
                <button type="submit" class="btn btn-primary flex-grow-1">Filtrele</button>
                <?php if ($search || $statusFilter || $catFilter): ?>
                <a href="<?= ADMIN_URL ?>/posts/index.php" class="btn btn-outline-secondary"><i class="bi bi-x-lg"></i></a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<!-- Table -->
<div class="card">
    <div class="card-body p-0">
        <?php if (empty($posts)): ?>
        <div class="text-center py-5 text-muted">
            <i class="bi bi-file-text fs-1 d-block mb-3 opacity-25"></i>
            <p class="mb-0">Hiç yazı bulunamadı.</p>
            <?php if ($search || $statusFilter || $catFilter): ?>
            <a href="<?= ADMIN_URL ?>/posts/index.php" class="btn btn-sm btn-outline-primary mt-2">Filtreyi Temizle</a>
            <?php endif; ?>
        </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Başlık</th>
                        <th>Kategori</th>
                        <th>Durum</th>
                        <th>Tarih</th>
                        <th class="text-end">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $i => $post): ?>
                    <tr>
                        <td class="text-muted small"><?= $pag['offset'] + $i + 1 ?></td>
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
                            <a href="<?= ADMIN_URL ?>/posts/edit.php?id=<?= $post['id'] ?>"
                               class="btn btn-sm btn-outline-primary" title="Düzenle">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button"
                                    class="btn btn-sm btn-outline-danger btn-delete"
                                    data-id="<?= $post['id'] ?>"
                                    data-title="<?= e($post['title']) ?>"
                                    title="Sil">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Pagination -->
<?php if ($pag['total_pages'] > 1): ?>
<nav class="mt-4">
    <ul class="pagination justify-content-center">
        <li class="page-item <?= !$pag['has_prev'] ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $currentPage - 1 ?>&search=<?= urlencode($search) ?>&status=<?= urlencode($statusFilter) ?>&category=<?= $catFilter ?>">
                <i class="bi bi-chevron-left"></i>
            </a>
        </li>
        <?php for ($i = 1; $i <= $pag['total_pages']; $i++): ?>
        <li class="page-item <?= $i === $currentPage ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>&search=<?= urlencode($search) ?>&status=<?= urlencode($statusFilter) ?>&category=<?= $catFilter ?>">
                <?= $i ?>
            </a>
        </li>
        <?php endfor; ?>
        <li class="page-item <?= !$pag['has_next'] ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $currentPage + 1 ?>&search=<?= urlencode($search) ?>&status=<?= urlencode($statusFilter) ?>&category=<?= $catFilter ?>">
                <i class="bi bi-chevron-right"></i>
            </a>
        </li>
    </ul>
</nav>
<?php endif; ?>

<!-- Delete Form -->
<form id="deleteForm" method="POST" action="<?= ADMIN_URL ?>/posts/delete.php">
    <?= csrfField() ?>
    <input type="hidden" name="id" id="deleteId">
</form>

<?php
$extraScripts = <<<JS
<script>
document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', function() {
        Swal.fire({
            title: 'Yazıyı silmek istediğinize emin misiniz?',
            text: this.dataset.title,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e74c3c',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Evet, sil!',
            cancelButtonText: 'İptal'
        }).then(result => {
            if (result.isConfirmed) {
                document.getElementById('deleteId').value = this.dataset.id;
                document.getElementById('deleteForm').submit();
            }
        });
    });
});
</script>
JS;
require_once __DIR__ . '/../includes/footer.php';
?>

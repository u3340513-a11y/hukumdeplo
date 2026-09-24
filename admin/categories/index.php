<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/functions.php';

requireLogin();

$categories = $pdo->query(
    'SELECT c.id, c.name, c.slug, COUNT(p.id) AS post_count
     FROM blog_categories c
     LEFT JOIN blog_posts p ON p.category_id = c.id
     GROUP BY c.id
     ORDER BY c.name'
)->fetchAll();

$pageTitle = 'Kategoriler — ' . ADMIN_PANEL_NAME;
require_once __DIR__ . '/../includes/header.php';
?>

<div class="page-header d-flex align-items-center justify-content-between mb-4">
    <div>
        <h2 class="page-title">Kategoriler</h2>
        <p class="text-muted mb-0">Toplam <?= count($categories) ?> kategori</p>
    </div>
    <a href="<?= ADMIN_URL ?>/categories/create.php" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Yeni Kategori
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <?php if (empty($categories)): ?>
        <div class="text-center py-5 text-muted">
            <i class="bi bi-folder2 fs-1 d-block mb-2 opacity-25"></i>
            <p class="mb-0">Henüz kategori yok.</p>
        </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Kategori Adı</th>
                        <th>Slug</th>
                        <th>Yazı Sayısı</th>
                        <th class="text-end">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $i => $cat): ?>
                    <tr>
                        <td class="text-muted small"><?= $i + 1 ?></td>
                        <td class="fw-medium"><?= e($cat['name']) ?></td>
                        <td class="text-muted small"><?= e($cat['slug']) ?></td>
                        <td>
                            <span class="badge bg-light text-dark"><?= $cat['post_count'] ?> yazı</span>
                        </td>
                        <td class="text-end">
                            <a href="<?= ADMIN_URL ?>/categories/edit.php?id=<?= $cat['id'] ?>"
                               class="btn btn-sm btn-outline-primary" title="Düzenle">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button"
                                    class="btn btn-sm btn-outline-danger btn-delete"
                                    data-id="<?= $cat['id'] ?>"
                                    data-name="<?= e($cat['name']) ?>"
                                    data-count="<?= $cat['post_count'] ?>"
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

<form id="deleteForm" method="POST" action="<?= ADMIN_URL ?>/categories/delete.php">
    <?= csrfField() ?>
    <input type="hidden" name="id" id="deleteId">
</form>

<?php
$extraScripts = <<<'JS'
<script>
document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', function() {
        const count = parseInt(this.dataset.count);
        const text = count > 0
            ? `"${this.dataset.name}" kategorisini silmek istediğinize emin misiniz? Bu kategorideki ${count} yazının kategorisi kaldırılacak.`
            : `"${this.dataset.name}" kategorisini silmek istediğinize emin misiniz?`;
        Swal.fire({
            title: 'Kategoriyi sil?',
            text: text,
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

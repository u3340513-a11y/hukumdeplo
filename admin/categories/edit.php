<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/functions.php';

requireLogin();

$id = (int)($_GET['id'] ?? 0);
if (!$id) { setFlash('error', 'Geçersiz kategori.'); redirect(ADMIN_URL . '/categories/index.php'); }

$stmt = $pdo->prepare('SELECT * FROM blog_categories WHERE id = ?');
$stmt->execute([$id]);
$cat = $stmt->fetch();
if (!$cat) { setFlash('error', 'Kategori bulunamadı.'); redirect(ADMIN_URL . '/categories/index.php'); }

$errors = [];
$values = $cat;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        $errors[] = 'Geçersiz istek.';
    } else {
        $values['name']        = trim($_POST['name'] ?? '');
        $values['slug']        = trim($_POST['slug'] ?? '');
        $values['description'] = trim($_POST['description'] ?? '');

        if (empty($values['name'])) $errors[] = 'Kategori adı zorunludur.';
        if (empty($values['slug'])) $values['slug'] = slugify($values['name']);

        if (!empty($values['slug'])) {
            $check = $pdo->prepare('SELECT id FROM blog_categories WHERE slug = ? AND id != ?');
            $check->execute([$values['slug'], $id]);
            if ($check->fetch()) $errors[] = 'Bu slug zaten kullanılıyor.';
        }

        if (empty($errors)) {
            $pdo->prepare('UPDATE blog_categories SET name=?, slug=?, description=? WHERE id=?')
                ->execute([$values['name'], $values['slug'], $values['description'], $id]);

            setFlash('success', 'Kategori güncellendi.');
            redirect(ADMIN_URL . '/categories/index.php');
        }
    }
}

$pageTitle = 'Kategori Düzenle — ' . ADMIN_PANEL_NAME;
require_once __DIR__ . '/../includes/header.php';
?>

<div class="page-header mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>/categories/index.php">Kategoriler</a></li>
            <li class="breadcrumb-item active">Düzenle</li>
        </ol>
    </nav>
    <h2 class="page-title">Kategori Düzenle</h2>
</div>

<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $err): ?>
    <div><i class="bi bi-exclamation-triangle-fill me-1"></i><?= e($err) ?></div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <?= csrfField() ?>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="name">Kategori Adı <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="<?= e($values['name']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="slug">Slug (URL)</label>
                        <div class="input-group">
                            <span class="input-group-text text-muted">/kategori/</span>
                            <input type="text" class="form-control" id="slug" name="slug"
                                   value="<?= e($values['slug']) ?>">
                            <button type="button" class="btn btn-outline-secondary" id="generateSlug">
                                <i class="bi bi-arrow-clockwise"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold" for="description">Açıklama</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?= e($values['description']) ?></textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Kaydet
                        </button>
                        <a href="<?= ADMIN_URL ?>/categories/index.php" class="btn btn-outline-secondary">İptal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$extraScripts = <<<'JS'
<script>
function slugify(text) {
    const tr = {'ş':'s','ç':'c','ğ':'g','ü':'u','ö':'o','ı':'i','Ş':'s','Ç':'c','Ğ':'g','Ü':'u','Ö':'o','İ':'i'};
    text = text.toLowerCase().replace(/[şçğüöıŞÇĞÜÖİ]/g, c => tr[c] || c);
    return text.replace(/[^a-z0-9\s-]/g,'').trim().replace(/[\s-]+/g,'-').replace(/^-|-$/g,'');
}
document.getElementById('generateSlug').addEventListener('click', () => {
    document.getElementById('slug').value = slugify(document.getElementById('name').value);
});
</script>
JS;
require_once __DIR__ . '/../includes/footer.php';
?>

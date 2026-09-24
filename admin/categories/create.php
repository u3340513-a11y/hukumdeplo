<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/functions.php';

requireLogin();

$errors = [];
$values = ['name' => '', 'slug' => '', 'description' => ''];

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
            $check = $pdo->prepare('SELECT id FROM blog_categories WHERE slug = ?');
            $check->execute([$values['slug']]);
            if ($check->fetch()) $errors[] = 'Bu slug zaten kullanılıyor.';
        }

        if (empty($errors)) {
            $pdo->prepare('INSERT INTO blog_categories (name, slug, description) VALUES (?, ?, ?)')
                ->execute([$values['name'], $values['slug'], $values['description']]);

            setFlash('success', 'Kategori başarıyla oluşturuldu.');
            redirect(ADMIN_URL . '/categories/index.php');
        }
    }
}

$pageTitle = 'Yeni Kategori — ' . ADMIN_PANEL_NAME;
require_once __DIR__ . '/../includes/header.php';
?>

<div class="page-header mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>/categories/index.php">Kategoriler</a></li>
            <li class="breadcrumb-item active">Yeni Kategori</li>
        </ol>
    </nav>
    <h2 class="page-title">Yeni Kategori Ekle</h2>
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
                               value="<?= e($values['name']) ?>" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="slug">Slug (URL)</label>
                        <div class="input-group">
                            <span class="input-group-text text-muted">/kategori/</span>
                            <input type="text" class="form-control" id="slug" name="slug"
                                   value="<?= e($values['slug']) ?>" placeholder="Boş bırakılırsa otomatik oluşturulur">
                            <button type="button" class="btn btn-outline-secondary" id="generateSlug">
                                <i class="bi bi-arrow-clockwise"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold" for="description">Açıklama</label>
                        <textarea class="form-control" id="description" name="description" rows="3"
                                  placeholder="Kategori hakkında kısa bir açıklama (isteğe bağlı)"><?= e($values['description']) ?></textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Kategori Ekle
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
document.getElementById('name').addEventListener('blur', function() {
    if (!document.getElementById('slug').value) {
        document.getElementById('slug').value = slugify(this.value);
    }
});
</script>
JS;
require_once __DIR__ . '/../includes/footer.php';
?>

<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/functions.php';

requireLogin();

$id = (int)($_GET['id'] ?? 0);
if (!$id) {
    setFlash('error', 'Geçersiz yazı.');
    redirect(ADMIN_URL . '/posts/index.php');
}

$post = $pdo->prepare('SELECT * FROM blog_posts WHERE id = ?');
$post->execute([$id]);
$post = $post->fetch();

if (!$post) {
    setFlash('error', 'Yazı bulunamadı.');
    redirect(ADMIN_URL . '/posts/index.php');
}

$errors = [];
$values = $post;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        $errors[] = 'Geçersiz istek. Sayfayı yenileyip tekrar deneyin.';
    } else {
        $values['title']            = trim($_POST['title'] ?? '');
        $values['slug']             = trim($_POST['slug'] ?? '');
        $values['category_id']      = (int)($_POST['category_id'] ?? 0) ?: null;
        $values['content']          = $_POST['content'] ?? '';
        $values['excerpt']          = trim($_POST['excerpt'] ?? '');
        $values['status']           = in_array($_POST['status'] ?? '', ['published', 'draft']) ? $_POST['status'] : 'draft';
        $values['meta_title']       = trim($_POST['meta_title'] ?? '');
        $values['meta_description'] = trim($_POST['meta_description'] ?? '');

        if (empty($values['title'])) $errors[] = 'Başlık zorunludur.';
        if (empty($values['slug']))  $values['slug'] = slugify($values['title']);

        // Slug unique kontrol (aynı yazı hariç)
        if (!empty($values['slug'])) {
            $check = $pdo->prepare('SELECT id FROM blog_posts WHERE slug = ? AND id != ?');
            $check->execute([$values['slug'], $id]);
            if ($check->fetch()) {
                $errors[] = 'Bu slug zaten kullanılıyor. Farklı bir slug girin.';
            }
        }

        // Yeni resim yükleme
        if (!empty($_FILES['featured_image']['name'])) {
            $upload = handleImageUpload($_FILES['featured_image']);
            if ($upload['success']) {
                // Eski resmi sil
                if (!empty($post['featured_image']) && file_exists(UPLOAD_DIR . $post['featured_image'])) {
                    unlink(UPLOAD_DIR . $post['featured_image']);
                }
                $values['featured_image'] = $upload['filename'];
            } else {
                $errors[] = $upload['message'];
            }
        }

        // Resmi kaldır
        if (isset($_POST['remove_image']) && $_POST['remove_image'] === '1') {
            if (!empty($post['featured_image']) && file_exists(UPLOAD_DIR . $post['featured_image'])) {
                unlink(UPLOAD_DIR . $post['featured_image']);
            }
            $values['featured_image'] = null;
        }

        if (empty($errors)) {
            $stmt = $pdo->prepare(
                'UPDATE blog_posts SET
                 title=?, slug=?, category_id=?, content=?, excerpt=?,
                 featured_image=?, status=?, meta_title=?, meta_description=?
                 WHERE id=?'
            );
            $stmt->execute([
                $values['title'],
                $values['slug'],
                $values['category_id'],
                $values['content'],
                $values['excerpt'],
                $values['featured_image'] ?: null,
                $values['status'],
                $values['meta_title'],
                $values['meta_description'],
                $id,
            ]);

            setFlash('success', 'Yazı başarıyla güncellendi.');
            redirect(ADMIN_URL . '/posts/edit.php?id=' . $id);
        }
    }
}

$categories = $pdo->query('SELECT id, name FROM blog_categories ORDER BY name')->fetchAll();

$pageTitle  = 'Yazıyı Düzenle — ' . ADMIN_PANEL_NAME;
$useTinyMCE = true;
require_once __DIR__ . '/../includes/header.php';
?>

<div class="page-header mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>/posts/index.php">Blog Yazıları</a></li>
            <li class="breadcrumb-item active">Düzenle</li>
        </ol>
    </nav>
    <h2 class="page-title">Yazıyı Düzenle</h2>
</div>

<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
    <i class="bi bi-exclamation-triangle-fill me-2"></i>
    <strong>Lütfen aşağıdaki hataları düzeltin:</strong>
    <ul class="mb-0 mt-1 ps-3">
        <?php foreach ($errors as $err): ?>
        <li><?= e($err) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <?= csrfField() ?>
    <input type="hidden" name="remove_image" id="remove_image" value="0">
    <div class="row g-4">

        <!-- Sol Alan -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="title">Başlık <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" id="title" name="title"
                               value="<?= e($values['title']) ?>" required>
                    </div>
                    <div class="mb-0">
                        <label class="form-label fw-semibold" for="slug">Slug (URL)</label>
                        <div class="input-group">
                            <span class="input-group-text text-muted">/blog/</span>
                            <input type="text" class="form-control" id="slug" name="slug"
                                   value="<?= e($values['slug']) ?>">
                            <button type="button" class="btn btn-outline-secondary" id="generateSlug" title="Başlıktan oluştur">
                                <i class="bi bi-arrow-clockwise"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0">İçerik</h6></div>
                <div class="card-body">
                    <textarea name="content" id="post-content"><?= e($values['content']) ?></textarea>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0">Özet</h6></div>
                <div class="card-body">
                    <textarea name="excerpt" class="form-control" rows="3"><?= e($values['excerpt']) ?></textarea>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h6 class="mb-0"><i class="bi bi-search me-1"></i> SEO Ayarları</h6></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="meta_title">Meta Başlık</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                               value="<?= e($values['meta_title']) ?>">
                        <div class="form-text"><span id="metaTitleCount">0</span>/60 karakter</div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label" for="meta_description">Meta Açıklama</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" rows="2"><?= e($values['meta_description']) ?></textarea>
                        <div class="form-text"><span id="metaDescCount">0</span>/160 karakter</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sağ Panel -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0">Yayın Ayarları</h6></div>
                <div class="card-body">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <small class="text-muted">Güncellenme:</small>
                        <small><?= formatDate($values['updated_at']) ?></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Durum</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="statusDraft"
                                       value="draft" <?= $values['status'] === 'draft' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="statusDraft">
                                    <i class="bi bi-pencil-square text-warning me-1"></i> Taslak
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="statusPublished"
                                       value="published" <?= $values['status'] === 'published' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="statusPublished">
                                    <i class="bi bi-check-circle text-success me-1"></i> Yayında
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Kaydet
                        </button>
                        <a href="<?= ADMIN_URL ?>/posts/index.php" class="btn btn-link text-muted">← Listeye Dön</a>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header"><h6 class="mb-0">Kategori</h6></div>
                <div class="card-body">
                    <select name="category_id" class="form-select">
                        <option value="">Kategori seçin</option>
                        <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>" <?= (int)$values['category_id'] === (int)$cat['id'] ? 'selected' : '' ?>>
                            <?= e($cat['name']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h6 class="mb-0">Öne Çıkan Görsel</h6></div>
                <div class="card-body">
                    <?php if (!empty($values['featured_image'])): ?>
                    <div id="currentImageWrapper" class="mb-3">
                        <img src="<?= UPLOAD_URL . e($values['featured_image']) ?>" alt=""
                             class="img-fluid rounded mb-2" style="max-height:200px;width:100%;object-fit:cover;">
                        <button type="button" class="btn btn-sm btn-outline-danger w-100" id="removeCurrentImage">
                            <i class="bi bi-trash me-1"></i> Görseli Kaldır
                        </button>
                    </div>
                    <?php endif; ?>
                    <div id="imagePreviewWrapper" class="mb-3 d-none">
                        <img id="imagePreview" src="" alt="" class="img-fluid rounded mb-2" style="max-height:200px;width:100%;object-fit:cover;">
                        <button type="button" class="btn btn-sm btn-outline-secondary w-100" id="removeNewImage">
                            <i class="bi bi-x me-1"></i> Seçimi İptal Et
                        </button>
                    </div>
                    <label class="btn btn-outline-secondary w-100" for="featured_image">
                        <i class="bi bi-image me-1"></i> <?= !empty($values['featured_image']) ? 'Görseli Değiştir' : 'Görsel Seç' ?>
                    </label>
                    <input type="file" name="featured_image" id="featured_image" accept="image/*" class="d-none">
                    <div class="form-text mt-1">Maks. 5MB — JPG, PNG, GIF, WEBP</div>
                </div>
            </div>
        </div>

    </div>
</form>

<?php
$extraScripts = <<<'JS'
<script>
function slugify(text) {
    const tr = {'ş':'s','ç':'c','ğ':'g','ü':'u','ö':'o','ı':'i','Ş':'s','Ç':'c','Ğ':'g','Ü':'u','Ö':'o','İ':'i'};
    text = text.toLowerCase().replace(/[şçğüöıŞÇĞÜÖİ]/g, c => tr[c] || c);
    return text.replace(/[^a-z0-9\s-]/g,'').trim().replace(/[\s-]+/g,'-').replace(/^-|-$/g,'');
}
document.getElementById('generateSlug').addEventListener('click', () => {
    document.getElementById('slug').value = slugify(document.getElementById('title').value);
});

function charCounter(inputId, countId, max) {
    const el = document.getElementById(inputId);
    const counter = document.getElementById(countId);
    function update() {
        const len = el.value.length;
        counter.textContent = len;
        counter.className = len > max ? 'text-danger fw-bold' : '';
    }
    el.addEventListener('input', update);
    update();
}
charCounter('meta_title', 'metaTitleCount', 60);
charCounter('meta_description', 'metaDescCount', 160);

document.getElementById('featured_image').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('imagePreview').src = e.target.result;
            document.getElementById('imagePreviewWrapper').classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    }
});
document.getElementById('removeNewImage')?.addEventListener('click', function() {
    document.getElementById('featured_image').value = '';
    document.getElementById('imagePreviewWrapper').classList.add('d-none');
});
document.getElementById('removeCurrentImage')?.addEventListener('click', function() {
    document.getElementById('currentImageWrapper').classList.add('d-none');
    document.getElementById('remove_image').value = '1';
});
</script>
JS;
require_once __DIR__ . '/../includes/footer.php';
?>

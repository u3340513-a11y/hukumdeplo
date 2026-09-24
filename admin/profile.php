<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/functions.php';

requireLogin();

$errors  = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        $errors[] = 'Geçersiz istek.';
    } else {
        $action = $_POST['action'] ?? '';

        if ($action === 'update_username') {
            $newUsername = trim($_POST['username'] ?? '');
            if (empty($newUsername)) {
                $errors[] = 'Kullanıcı adı boş olamaz.';
            } elseif (strlen($newUsername) < 3) {
                $errors[] = 'Kullanıcı adı en az 3 karakter olmalı.';
            } else {
                $check = $pdo->prepare('SELECT id FROM admin_users WHERE username = ? AND id != ?');
                $check->execute([$newUsername, $_SESSION['admin_id']]);
                if ($check->fetch()) {
                    $errors[] = 'Bu kullanıcı adı zaten kullanılıyor.';
                } else {
                    $pdo->prepare('UPDATE admin_users SET username = ? WHERE id = ?')
                        ->execute([$newUsername, $_SESSION['admin_id']]);
                    $_SESSION['admin_username'] = $newUsername;
                    setFlash('success', 'Kullanıcı adı güncellendi.');
                    redirect(ADMIN_URL . '/profile.php');
                }
            }
        } elseif ($action === 'update_password') {
            $currentPassword = $_POST['current_password'] ?? '';
            $newPassword     = $_POST['new_password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            $stmt = $pdo->prepare('SELECT password FROM admin_users WHERE id = ?');
            $stmt->execute([$_SESSION['admin_id']]);
            $user = $stmt->fetch();

            if (!password_verify($currentPassword, $user['password'])) {
                $errors[] = 'Mevcut şifre hatalı.';
            } elseif (strlen($newPassword) < 8) {
                $errors[] = 'Yeni şifre en az 8 karakter olmalı.';
            } elseif ($newPassword !== $confirmPassword) {
                $errors[] = 'Yeni şifreler eşleşmiyor.';
            } else {
                $hash = password_hash($newPassword, PASSWORD_BCRYPT, ['cost' => 12]);
                $pdo->prepare('UPDATE admin_users SET password = ? WHERE id = ?')
                    ->execute([$hash, $_SESSION['admin_id']]);
                setFlash('success', 'Şifre başarıyla güncellendi.');
                redirect(ADMIN_URL . '/profile.php');
            }
        }
    }
}

$stmt = $pdo->prepare('SELECT username, email, created_at FROM admin_users WHERE id = ?');
$stmt->execute([$_SESSION['admin_id']]);
$user = $stmt->fetch();

$pageTitle = 'Profilim — ' . ADMIN_PANEL_NAME;
require_once __DIR__ . '/includes/header.php';
?>

<div class="page-header mb-4">
    <h2 class="page-title">Profilim</h2>
</div>

<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $err): ?>
    <div><i class="bi bi-exclamation-triangle-fill me-1"></i><?= e($err) ?></div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-body py-4">
                <div class="mx-auto mb-3 d-flex align-items-center justify-content-center bg-primary text-white rounded-circle"
                     style="width:80px;height:80px;font-size:32px;font-weight:700;">
                    <?= strtoupper(substr($user['username'], 0, 1)) ?>
                </div>
                <h5 class="mb-1"><?= e($user['username']) ?></h5>
                <span class="badge bg-primary-soft text-primary">Yönetici</span>
                <hr class="my-3">
                <div class="text-start small text-muted">
                    <div class="mb-1"><i class="bi bi-calendar3 me-2"></i>Kayıt: <?= formatDate($user['created_at'], 'd.m.Y') ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <!-- Kullanıcı adı -->
        <div class="card mb-4">
            <div class="card-header"><h6 class="mb-0">Kullanıcı Adını Değiştir</h6></div>
            <div class="card-body">
                <form method="POST">
                    <?= csrfField() ?>
                    <input type="hidden" name="action" value="update_username">
                    <div class="mb-3">
                        <label class="form-label" for="username">Yeni Kullanıcı Adı</label>
                        <input type="text" class="form-control" id="username" name="username"
                               value="<?= e($user['username']) ?>" required minlength="3">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Güncelle
                    </button>
                </form>
            </div>
        </div>

        <!-- Şifre değiştir -->
        <div class="card">
            <div class="card-header"><h6 class="mb-0">Şifre Değiştir</h6></div>
            <div class="card-body">
                <form method="POST">
                    <?= csrfField() ?>
                    <input type="hidden" name="action" value="update_password">
                    <div class="mb-3">
                        <label class="form-label" for="current_password">Mevcut Şifre</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="new_password">Yeni Şifre <small class="text-muted">(en az 8 karakter)</small></label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required minlength="8">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="confirm_password">Yeni Şifre (Tekrar)</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-shield-lock me-1"></i> Şifreyi Güncelle
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

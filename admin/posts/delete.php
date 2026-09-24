<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/functions.php';

requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !verifyCsrfToken($_POST['csrf_token'] ?? '')) {
    setFlash('error', 'Geçersiz istek.');
    redirect(ADMIN_URL . '/posts/index.php');
}

$id = (int)($_POST['id'] ?? 0);
if (!$id) {
    setFlash('error', 'Geçersiz yazı.');
    redirect(ADMIN_URL . '/posts/index.php');
}

$stmt = $pdo->prepare('SELECT featured_image FROM blog_posts WHERE id = ?');
$stmt->execute([$id]);
$post = $stmt->fetch();

if (!$post) {
    setFlash('error', 'Yazı bulunamadı.');
    redirect(ADMIN_URL . '/posts/index.php');
}

// Görseli diskten sil
if (!empty($post['featured_image'])) {
    $imagePath = UPLOAD_DIR . $post['featured_image'];
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}

$pdo->prepare('DELETE FROM blog_posts WHERE id = ?')->execute([$id]);

setFlash('success', 'Yazı başarıyla silindi.');
redirect(ADMIN_URL . '/posts/index.php');

<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/functions.php';

requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !verifyCsrfToken($_POST['csrf_token'] ?? '')) {
    setFlash('error', 'Geçersiz istek.');
    redirect(ADMIN_URL . '/categories/index.php');
}

$id = (int)($_POST['id'] ?? 0);
if (!$id) { setFlash('error', 'Geçersiz kategori.'); redirect(ADMIN_URL . '/categories/index.php'); }

$stmt = $pdo->prepare('SELECT id FROM blog_categories WHERE id = ?');
$stmt->execute([$id]);
if (!$stmt->fetch()) { setFlash('error', 'Kategori bulunamadı.'); redirect(ADMIN_URL . '/categories/index.php'); }

// Bağlı yazıların category_id'sini NULL yap
$pdo->prepare('UPDATE blog_posts SET category_id = NULL WHERE category_id = ?')->execute([$id]);
$pdo->prepare('DELETE FROM blog_categories WHERE id = ?')->execute([$id]);

setFlash('success', 'Kategori silindi.');
redirect(ADMIN_URL . '/categories/index.php');

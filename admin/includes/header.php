<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle ?? ADMIN_PANEL_NAME) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="<?= ADMIN_URL ?>/assets/css/admin.css" rel="stylesheet">
    <?php if (!empty($useTinyMCE)): ?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.css" rel="stylesheet">
    <?php endif; ?>
    <?php if (!empty($extraHead)) echo $extraHead; ?>
</head>
<body>

<div class="wrapper d-flex">

    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar d-flex flex-column">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <i class="bi bi-crown-fill text-warning me-2"></i>
                <span><?= e(SITE_NAME) ?></span>
            </div>
            <small class="text-muted d-block">Yönetim Paneli</small>
        </div>

        <ul class="sidebar-nav list-unstyled flex-grow-1">
            <li class="nav-label">Ana Menü</li>
            <li>
                <a href="<?= ADMIN_URL ?>/index.php" class="<?= (strpos($_SERVER['PHP_SELF'], '/admin/index.php') !== false) ? 'active' : '' ?>">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>

            <li class="nav-label">İçerik</li>
            <li>
                <a href="<?= ADMIN_URL ?>/posts/index.php" class="<?= (strpos($_SERVER['PHP_SELF'], '/posts/') !== false) ? 'active' : '' ?>">
                    <i class="bi bi-file-text"></i> Blog Yazıları
                </a>
            </li>
            <li>
                <a href="<?= ADMIN_URL ?>/posts/create.php" class="<?= (basename($_SERVER['PHP_SELF']) === 'create.php' && strpos($_SERVER['PHP_SELF'], '/posts/') !== false) ? 'active' : '' ?>">
                    <i class="bi bi-plus-circle"></i> Yeni Yazı Ekle
                </a>
            </li>
            <li>
                <a href="<?= ADMIN_URL ?>/categories/index.php" class="<?= (strpos($_SERVER['PHP_SELF'], '/categories/') !== false) ? 'active' : '' ?>">
                    <i class="bi bi-folder2"></i> Kategoriler
                </a>
            </li>

            <li class="nav-label">Hesap</li>
            <li>
                <a href="<?= ADMIN_URL ?>/profile.php" class="<?= (strpos($_SERVER['PHP_SELF'], '/profile.php') !== false) ? 'active' : '' ?>">
                    <i class="bi bi-person-circle"></i> Profilim
                </a>
            </li>
            <li>
                <a href="<?= ADMIN_URL ?>/logout.php">
                    <i class="bi bi-box-arrow-right"></i> Çıkış Yap
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <div class="d-flex align-items-center gap-2">
                <div class="avatar">
                    <?= strtoupper(substr($_SESSION['admin_username'] ?? 'A', 0, 1)) ?>
                </div>
                <div>
                    <div class="fw-semibold small"><?= e($_SESSION['admin_username'] ?? '') ?></div>
                    <small class="text-muted">Yönetici</small>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content flex-grow-1 d-flex flex-column">

        <!-- Topbar -->
        <header class="topbar d-flex align-items-center justify-content-between px-4">
            <button class="btn btn-link sidebar-toggle p-0" id="sidebarToggle">
                <i class="bi bi-list fs-4 text-dark"></i>
            </button>
            <div class="d-flex align-items-center gap-3">
                <small class="text-muted"><?= date('d.m.Y, l') ?></small>
                <a href="<?= BASE_URL ?>" target="_blank" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-globe2 me-1"></i> Siteyi Görüntüle
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <div class="page-content flex-grow-1 p-4">

            <?php
            $flash = getFlash();
            if ($flash):
                $alertClass = $flash['type'] === 'success' ? 'alert-success' : ($flash['type'] === 'error' ? 'alert-danger' : 'alert-info');
            ?>
            <div class="alert <?= $alertClass ?> alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
                <i class="bi <?= $flash['type'] === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill' ?>"></i>
                <?= e($flash['message']) ?>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

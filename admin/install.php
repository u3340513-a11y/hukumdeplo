<?php
/**
 * Kurulum Dosyası
 * Çalıştırdıktan sonra BU DOSYAYI SİLİN veya yeniden adlandırın!
 */

require_once __DIR__ . '/includes/db.php';

$messages = [];
$hasError = false;

// Tabloları oluştur
$queries = [
    'admin_users tablosu' => "
        CREATE TABLE IF NOT EXISTS admin_users (
            id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username    VARCHAR(50)  NOT NULL UNIQUE,
            password    VARCHAR(255) NOT NULL,
            email       VARCHAR(100),
            created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ",
    'blog_categories tablosu' => "
        CREATE TABLE IF NOT EXISTS blog_categories (
            id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name        VARCHAR(100)  NOT NULL,
            slug        VARCHAR(100)  NOT NULL UNIQUE,
            description TEXT,
            created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ",
    'blog_posts tablosu' => "
        CREATE TABLE IF NOT EXISTS blog_posts (
            id               INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            category_id      INT UNSIGNED,
            author_id        INT UNSIGNED,
            title            VARCHAR(255) NOT NULL,
            slug             VARCHAR(255) NOT NULL UNIQUE,
            content          LONGTEXT,
            excerpt          TEXT,
            featured_image   VARCHAR(500),
            status           ENUM('draft','published') DEFAULT 'draft',
            meta_title       VARCHAR(255),
            meta_description TEXT,
            created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (category_id) REFERENCES blog_categories(id) ON DELETE SET NULL,
            FOREIGN KEY (author_id)   REFERENCES admin_users(id)     ON DELETE SET NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ",
];

foreach ($queries as $label => $sql) {
    try {
        $pdo->exec($sql);
        $messages[] = ['type' => 'success', 'text' => "$label oluşturuldu."];
    } catch (PDOException $e) {
        $messages[] = ['type' => 'error', 'text' => "$label HATA: " . $e->getMessage()];
        $hasError = true;
    }
}

// Varsayılan admin kullanıcısı
if (!$hasError) {
    try {
        $check = $pdo->prepare('SELECT id FROM admin_users WHERE username = ?');
        $check->execute(['admin']);
        if (!$check->fetch()) {
            $hash = password_hash('Admin123!', PASSWORD_BCRYPT, ['cost' => 12]);
            $pdo->prepare('INSERT INTO admin_users (username, password) VALUES (?, ?)')->execute(['admin', $hash]);
            $messages[] = ['type' => 'success', 'text' => 'Varsayılan admin kullanıcısı oluşturuldu. Kullanıcı: <strong>admin</strong> / Şifre: <strong>Admin123!</strong>'];
        } else {
            $messages[] = ['type' => 'info', 'text' => 'Admin kullanıcısı zaten mevcut, atlandı.'];
        }
    } catch (PDOException $e) {
        $messages[] = ['type' => 'error', 'text' => 'Admin kullanıcısı oluşturma HATA: ' . $e->getMessage()];
        $hasError = true;
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurulum — Hükümdar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f1f5f9; font-family: sans-serif; }
        .install-box { max-width: 640px; margin: 60px auto; }
    </style>
</head>
<body>
<div class="install-box">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">👑 Hükümdar — Kurulum</h5>
        </div>
        <div class="card-body">
            <?php foreach ($messages as $msg): ?>
            <div class="alert alert-<?= $msg['type'] === 'success' ? 'success' : ($msg['type'] === 'error' ? 'danger' : 'info') ?> py-2">
                <?= $msg['text'] ?>
            </div>
            <?php endforeach; ?>

            <?php if (!$hasError): ?>
            <div class="alert alert-warning">
                <strong>⚠️ Önemli:</strong> Kurulum tamamlandı. Güvenlik için bu dosyayı (<code>install.php</code>) sunucudan silin!
            </div>
            <div class="d-flex gap-2 mt-3">
                <a href="<?= ADMIN_URL ?>/login.php" class="btn btn-primary">Admin Paneline Git →</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>

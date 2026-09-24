<?php
/**
 * Hükümdar — Tek Kullanımlık Deploy Yardımcısı
 * Bu dosya çalıştıktan sonra otomatik silinir.
 * URL: hukumdar.com.tr/hk-deploy-d4ceb75f.php?token=d4ceb75f139aebb4255e11746b0480f8
 */

declare(strict_types=1);

define('SECRET_TOKEN', 'd4ceb75f139aebb4255e11746b0480f8');
define('BASE', __DIR__);
define('CORE', BASE . '/core');

header('Content-Type: text/plain; charset=utf-8');

// Token doğrulama
$token = $_GET['token'] ?? '';
if (!hash_equals(SECRET_TOKEN, $token)) {
    http_response_code(403);
    echo "Yetkisiz erişim.\n";
    exit;
}

$log = [];

// 1. Bootstrap cache temizle
$cacheDir = CORE . '/bootstrap/cache';
foreach (glob($cacheDir . '/*.php') as $file) {
    if (basename($file) !== '.gitkeep') {
        @unlink($file);
        $log[] = "Silindi: bootstrap/cache/" . basename($file);
    }
}

// 2. View cache temizle
$viewsDir = CORE . '/storage/framework/views';
foreach (glob($viewsDir . '/*.php') as $file) {
    @unlink($file);
    $log[] = "Silindi: views/" . basename($file);
}

// 3. Framework cache temizle
foreach (glob(CORE . '/storage/framework/cache/data/*') as $file) {
    if (is_file($file)) {
        @unlink($file);
        $log[] = "Silindi: cache/data/" . basename($file);
    }
}

// 4. artisan komutları çalıştır
$phpBin = PHP_BINARY ?: '/usr/local/bin/php';
$artisan = CORE . '/artisan';
$commands = [
    'package:discover' => [$phpBin, $artisan, 'package:discover', '--ansi'],
    'config:cache'     => [$phpBin, $artisan, 'config:cache'],
    'route:cache'      => [$phpBin, $artisan, 'route:cache'],
    'view:cache'       => [$phpBin, $artisan, 'view:cache'],
    'storage:link'     => [$phpBin, $artisan, 'storage:link', '--force'],
];

foreach ($commands as $name => $cmd) {
    $output = [];
    $exitCode = 0;
    exec(implode(' ', array_map('escapeshellarg', $cmd)) . ' 2>&1', $output, $exitCode);
    $status = $exitCode === 0 ? 'OK' : 'HATA';
    $log[] = "artisan {$name}: [{$status}] " . implode(' | ', array_slice($output, -2));
}

// 5. Scriptin kendini sil
@unlink(__FILE__);
$log[] = "Script silindi: " . basename(__FILE__);

echo "=== Hükümdar Deploy Tamamlandı ===\n\n";
echo implode("\n", $log) . "\n\n";
echo "Tamamlandı. Bu URL artık çalışmaz.\n";

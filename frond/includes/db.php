<?php
// Shared DB connection for public front-end
$_DB = [
    'host'    => 'localhost',
    'name'    => 'hukumdarcom_admyen',
    'user'    => 'hukumdarcom_admyen',
    'pass'    => 'Zindan.11',
    'charset' => 'utf8mb4',
];

try {
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', $_DB['host'], $_DB['name'], $_DB['charset']);
    $pdo = new PDO($dsn, $_DB['user'], $_DB['pass'], [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    error_log('Public DB: ' . $e->getMessage());
    $pdo = null;
}
unset($_DB);

// Helpers
function he(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
function upload_url(string $filename): string {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host     = $_SERVER['HTTP_HOST'] ?? 'localhost';
    return $protocol . '://' . $host . '/admin/uploads/' . $filename;
}

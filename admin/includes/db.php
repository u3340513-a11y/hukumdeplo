<?php
require_once __DIR__ . '/config.php';

try {
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', DB_HOST, DB_NAME, DB_CHARSET);
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    error_log('DB Connection failed: ' . $e->getMessage());
    die('<div style="font-family:sans-serif;padding:40px;text-align:center;color:#e74c3c;">
        <h2>Bağlantı Hatası</h2>
        <p>Veritabanına bağlanılamadı. Lütfen sistem yöneticisi ile iletişime geçin.</p>
    </div>');
}

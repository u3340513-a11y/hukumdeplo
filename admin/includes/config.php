<?php
ini_set('display_errors', 0);
error_reporting(0);

/*
|--------------------------------------------------------------------------
| Admin Panel DB Yapılandırması
|--------------------------------------------------------------------------
| DB_PASS değeri sunucuda bir ortam değişkeni olarak tanımlanabilir.
| Tanımlı değilse aşağıdaki varsayılan değer kullanılır (legacy uyum).
| Sunucuda: cPanel → Gelişmiş → Ortam Değişkenleri → ADMIN_DB_PASS
*/
define('DB_HOST',    $_ENV['ADMIN_DB_HOST'] ?? getenv('ADMIN_DB_HOST') ?: 'localhost');
define('DB_NAME',    $_ENV['ADMIN_DB_NAME'] ?? getenv('ADMIN_DB_NAME') ?: 'hukumdarcom_admyen');
define('DB_USER',    $_ENV['ADMIN_DB_USER'] ?? getenv('ADMIN_DB_USER') ?: 'hukumdarcom_admyen');
define('DB_PASS',    $_ENV['ADMIN_DB_PASS'] ?? getenv('ADMIN_DB_PASS') ?: 'Zindan.11');
define('DB_CHARSET', 'utf8mb4');

define('SITE_NAME',        'Hükümdar');
define('ADMIN_PANEL_NAME', 'Hükümdar Yönetim Paneli');

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
define('BASE_URL',   $protocol . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost'));
define('ADMIN_URL',  BASE_URL . '/admin');

define('UPLOAD_DIR',      dirname(__DIR__) . '/uploads/');
define('UPLOAD_URL',      ADMIN_URL . '/uploads/');
define('MAX_UPLOAD_SIZE', 5 * 1024 * 1024); // 5MB

if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_strict_mode', 1);
    session_start();
}

<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$core = __DIR__.'/core';
$envFile = $core.'/.env';
$configCache = $core.'/bootstrap/cache/config.php';

if (is_file($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $line = trim($line);

        if ($line === '' || str_starts_with($line, '#') || ! str_contains($line, '=')) {
            continue;
        }

        if (str_starts_with($line, 'APP_KEY=')) {
            $key = trim(substr($line, strlen('APP_KEY=')), " \t\"'");

            if ($key !== '') {
                putenv('APP_KEY='.$key);
                $_ENV['APP_KEY'] = $key;
                $_SERVER['APP_KEY'] = $key;
            }

            break;
        }
    }
}

if (is_file($configCache)) {
    $cached = @include $configCache;

    if (! is_array($cached) || empty($cached['app']['key'] ?? null)) {
        @unlink($configCache);
    }
}

if (file_exists($maintenance = $core.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Composer platform_check — vendor yazilamazsa autoload_real.php icinde devre disi.
$platformCheck = $core.'/vendor/composer/platform_check.php';
if (is_file($platformCheck)) {
    @file_put_contents($platformCheck, "<?php\n// disabled\n");
}

require $core.'/vendor/autoload.php';

/** @var Application $app */
$app = require_once $core.'/bootstrap/app.php';

$app->handleRequest(Request::capture());

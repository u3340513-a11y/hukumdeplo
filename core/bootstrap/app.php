<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$basePath = dirname(__DIR__);

$app = Application::configure(basePath: $basePath)
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

$parentPublic = dirname($basePath);

if (
    str_ends_with($basePath, DIRECTORY_SEPARATOR.'core')
    && is_file($parentPublic.DIRECTORY_SEPARATOR.'index.php')
    && is_dir($parentPublic.DIRECTORY_SEPARATOR.'build')
) {
    $app->usePublicPath($parentPublic);
}

return $app;

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Addon domain: Laravel core/ icinde, public dosyalar domain kokunde.
        $parentPublic = realpath(base_path('..'));

        if (
            str_ends_with(base_path(), DIRECTORY_SEPARATOR.'core')
            && is_file($parentPublic.DIRECTORY_SEPARATOR.'index.php')
            && is_dir($parentPublic.DIRECTORY_SEPARATOR.'build')
        ) {
            $this->app->usePublicPath($parentPublic);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

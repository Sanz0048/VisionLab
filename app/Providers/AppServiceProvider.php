<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Foundation\AliasLoader;
use Barryvdh\DomPDF\Facade\Pdf;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // 1. Paksa daftar Service Provider DomPDF di sini
        if (class_exists(\Barryvdh\DomPDF\ServiceProvider::class)) {
            $this->app->register(\Barryvdh\DomPDF\ServiceProvider::class);
        }

        // 2. Daftarkan Alias
        $loader = AliasLoader::getInstance();
        $loader->alias('PDF', Pdf::class);
    }

    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}

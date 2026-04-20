<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Foundation\AliasLoader;
// Import class DomPDF dengan benar
use Barryvdh\DomPDF\Facade\Pdf;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Mendaftarkan Alias PDF agar bisa dipanggil sebagai PDF::loadView()
        $loader = AliasLoader::getInstance();
        $loader->alias('PDF', Pdf::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Pengaturan pagination bootstrap
        Paginator::useBootstrap();
    }
}

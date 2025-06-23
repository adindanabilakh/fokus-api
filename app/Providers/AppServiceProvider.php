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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 🛠️ Ini fix utama untuk error "Cannot resolve public path"
        $this->app->bind('path.public', function () {
            return base_path('public'); // kalau tidak pakai public_html, biarkan begini
        });
    }
}

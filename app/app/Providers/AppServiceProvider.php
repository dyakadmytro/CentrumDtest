<?php

namespace App\Providers;

use App\Services\AnchorService;
use App\View\Components\Navbar;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(AnchorService::class, function () {
            return new AnchorService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::pattern('slug', '[a-zA-Z0-9]{8}');
        Blade::component('navbar', Navbar::class);
    }
}

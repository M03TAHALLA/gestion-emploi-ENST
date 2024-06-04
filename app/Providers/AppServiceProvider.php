<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::if('superadmin', function () {
            return session('user_type') === 'super_admin';
        });

        Blade::if('sousadmin', function () {
            return session('user_type') === 'sous_admin';
        });
    }
}

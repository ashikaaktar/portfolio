<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
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
        // Use relative asset paths for Vite so CSS/JS load seamlessly across localhost, tunnels, and custom domains without Mixed Content blocks
        \Illuminate\Support\Facades\Vite::createAssetPathsUsing(function ($path) {
            return '/' . ltrim($path, '/');
        });

        if (request()->isSecure() ||
            request()->header('x-forwarded-proto') === 'https' ||
            request()->server('HTTP_X_FORWARDED_PROTO') === 'https' ||
            str_contains(request()->getHost(), 'trycloudflare.com') ||
            str_contains(request()->getHost(), 'onrender.com') ||
            app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}

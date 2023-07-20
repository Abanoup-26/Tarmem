<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

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
        // Model::preventLazyLoading --------------
        // important Note (disable it on production) How ?
        // - app()->isProduction() it refers to .env file to (APP_ENV)
        Model::preventLazyLoading(!app()->isProduction()); // while development it show error if you try to lazy loading query
    }
}

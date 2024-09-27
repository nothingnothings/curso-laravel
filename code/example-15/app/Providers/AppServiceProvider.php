<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
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

        // * Disables lazy loading entirely, as a safety measure:
        Model::preventLazyLoading();

        // * Switch the type of view that is being used for the paginator (the default is tailwind, but you can use bootstrap, for example):
        // Paginator::useBootstrapFive();
    }
}

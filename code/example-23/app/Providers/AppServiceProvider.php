<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        // Model::unguard(); // Disable mass assignment protection globally

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

        Gate::define('edit-job', function (User $user, $job) {
            // 2nd layer: check if the user is the owner of the job
            return $job->employer->user->is($user); // will return a boolean, which is what the Gate needs/wants.
        });
    }
}

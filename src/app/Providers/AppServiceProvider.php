<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('general', function ($user) {
            return $user->role_id == 1;
        });

        Gate::define('owner', function ($user) {
            return $user->role_id == 2;
        });

        Gate::define('admin', function ($user) {
            return $user->role_id == 3;
        });
    }
}

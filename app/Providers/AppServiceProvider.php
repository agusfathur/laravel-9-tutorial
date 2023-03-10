<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        // pagination bootstrap
        Paginator::useBootstrapFive();

        // authorization gate, admin
        Gate::define('admin', function (User $user) {
            // cek user is_admin == true
            return $user->is_admin;
        });
    }
}

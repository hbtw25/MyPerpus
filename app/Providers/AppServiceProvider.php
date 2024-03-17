<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        // Pagination
        Paginator::defaultView('vendor.pagination.tailwind');
        Paginator::defaultSimpleView('vendor.pagination.simple-tailwind');

        // Gates
        Gate::define(
            "admin",
            fn (User $user) =>
            $user->role == "admin"
        );

        Gate::define(
            "petugas",
            fn (User $user) =>
            $user->role == "petugas"
        );

        Gate::define(
            "peminjam",
            fn (User $user) =>
            $user->role == "peminjam"
        );
    }
}

<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Trip;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::defaultView('pagination::default');

        Gate::define('delete-trip', function (User $user, Trip $trip) {
            return $user->is_admin;
        });

        Gate::define('edit-trip', function (User $user, Trip $trip) {
            return $user->is_admin;
        });
    }
}

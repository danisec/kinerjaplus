<?php

namespace App\Providers;

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
        Gate::define('direct.permission', function ($user, $permissions) {
            return collect($permissions)->contains(function ($permission) use ($user) {
                return $user->getDirectPermissions()->contains('name', $permission);
            });
        });

        // if APP_ENV == local, Debugbar is enabled
        if (env('APP_ENV') == 'local') {
            \Debugbar::enable();
        } else {
            \Debugbar::disable();
        }
    }
}

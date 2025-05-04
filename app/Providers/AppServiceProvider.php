<?php

namespace App\Providers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
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

        Collection::macro('paginate', function ($perPage = 10) {
            $page = request()->get('page', 1);
            $results = $this->forPage($page, $perPage)->values();

            return new LengthAwarePaginator(
                $results,
                $this->count(),
                $perPage,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        });
    }
}

<?php

namespace App\Providers;

use App\Models\Permissions;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //$this->registerPolicies();

        Gate::before(function ($user) {
            if ($user->isAdmin())
                return true;
        });

        foreach (Permissions::all() as $permission){
            Gate::define($permission->title, function ($user) use ($permission){
                return $user->hasPermission($permission);
            });
        }
    }
}

<?php

namespace App\Providers;

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

//        Gate::before(function ($user) {
//            if ($user->isAdmin())
//                return true;
//        });

//        foreach (Permissions::all() as $row){
//            Gate::define($row->title, function ($user) use ($row){
//                return $user->hasPermission($row);
//            });
//        }
    }
}

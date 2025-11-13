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
        Gate::define('cms', function ($user) {
            return $user->hasAnyRole(['admin', 'cms']);
        });
        Gate::define('user',function($user){
            return $user->hasRole('admin');
        });
    }
}

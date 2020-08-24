<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

        /*
        // Implicitly grant "Super Admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });
        /*
        /**
         * 
         * Define Gate for admin user role
         * Returns true if user role is set to admin
         **/
        /*
        Gate::define('isAdmin', function ($user) {
            return $user->role == 'admin';
        });
        /**
         * Define Gate for editor user role
         * Returns true if user role is set to editor
         **/
        /*
        Gate::define('isUser', function ($user) {
            return $user->role == 'user';
        });
        /**
         * Define Gate for guest user role
         * Returns true if user role is set to guest
         **/
        /*
        Gate::define('isGuest', function ($user) {
            return $user->role == 'guest';
           
        });*/
    }
}

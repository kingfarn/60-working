<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Invoice_detail;
use Illuminate\Support\Facades\Gate;

use App\Observers\Invoice_detailObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Invoice_detail::observe(Invoice_detailObserver::class);

        /* Gate::define('isAdmin', function ($user) {
            return $user->role == 'admin';
        });

        Gate::define('isUser', function ($user) {
            return $user->role == 'user';
        });
        */
    }
}

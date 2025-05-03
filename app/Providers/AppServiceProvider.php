<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        if (app()->runningInConsole()) {
            return;
        }

        if (request()->is('/')) {
            Session::forget('allow_login');
        }
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}

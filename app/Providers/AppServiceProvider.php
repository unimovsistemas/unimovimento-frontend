<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->is_admin;
        });

        Blade::if('master', function () {
            return auth()->check() && auth()->user()->is_master;
        });

        /**
         * How to use:
         * @see User::isAllowTo documentation
         */
        Blade::if('check', function($user, $action_module, $forceBlock=false){
            return User::isAllowTo($user, $action_module, ['forceBlock' => $forceBlock]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

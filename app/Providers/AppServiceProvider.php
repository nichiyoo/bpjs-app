<?php

namespace App\Providers;

use App\Translation\Translator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        $this->app->extend('translator', function ($service, $app) {
            return new Translator($service->getLoader(), $service->getLocale());
        });

        Blade::if('role', function ($role) {
            return Auth::user()->hasRole($role);
        });
    }
}

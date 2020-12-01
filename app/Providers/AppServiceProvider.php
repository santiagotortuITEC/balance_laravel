<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Metodo para las migraciones 
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Metodo para las migraciones 
        Schema::defaultStringLength(191);
    }
}

<?php

namespace App\Providers;

use Carbon\Carbon ;
use Illuminate\Support\Facades\Blade ;
use Illuminate\Support\ServiceProvider;
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
        Schema::defaultStringLength(191);
        Blade::directive('date', function($dateFormat)
        {
            return "<?php 
                            echo \Carbon\Carbon::parse({$dateFormat}->fecha)->format('d/m/Y') 
                    ?>" ;
        }) ;
    }
}

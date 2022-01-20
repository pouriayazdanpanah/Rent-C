<?php

namespace App\Providers;

use App\Services\ReCommendation\Core\ProductSimilarity;

use Illuminate\Support\ServiceProvider;

class ReCommendationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ReCommendation' , function (){
            return new ProductSimilarity();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

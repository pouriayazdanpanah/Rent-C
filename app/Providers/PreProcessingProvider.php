<?php

namespace App\Providers;

use App\Services\PreProcessing\ProcessingCenter;
use Illuminate\Support\ServiceProvider;

class PreProcessingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('PreProcessing' , function(){
            return new ProcessingCenter();
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

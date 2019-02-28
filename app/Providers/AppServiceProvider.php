<?php

namespace App\Providers;

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
        view()->composer('cars.partials.service_history', function($view) {
            $car = request()->route()->parameters()['car'];
            $view->withWorks($car->works()->orderBy('serviced_at', 'DESC')->get());
        });
        
        view()->composer('cars.partials.modal_service', function($view) {
            $car = request()->route()->parameters()['car'];
            
            $services = $car->works()->whereHas('service')->orderBy('kilometrage')->get()->unique('service_id');
    
            $view->withServices($services);
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

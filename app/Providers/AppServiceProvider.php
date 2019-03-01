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
            $works = $car->works()->whereHas('service')->orderBy('kilometrage', 'desc')->get()->unique('service_id');
    
            $lefts = [];
    
            foreach ($works as $work) {
                $km = $work->service->warranty + $work->kilometrage - $car->kilometrage;
                if ($km < 0) {
                    $km = 0;
                }
                $lefts[$work->service->name] = $km;
            }
    
            $view->withLefts($lefts);
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

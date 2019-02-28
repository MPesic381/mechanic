<?php

namespace App\Providers;

use App\Booking;
use App\Car;
use App\Policies\BookingPolicy;
use App\Policies\CarPolicy;
use App\Policies\WorkPolicy;
use App\Work;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Car::class => CarPolicy::class,
        Booking::class => BookingPolicy::class,
        Work::class => WorkPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}

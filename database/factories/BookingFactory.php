<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Booking::class, function (Faker $faker) {

    $start_time = Carbon::create()->addWeeks(rand(1,12))->addDays(rand(1,50));
    $end_time = $start_time->addHours(rand(1, 8));

    return [
        'car_id' => factory(App\Car::class)->create()->id,
        'service_id' => \App\Service::all()->random()->id,
        'start_time' => $start_time,
        'end_time' => $end_time
    ];
});

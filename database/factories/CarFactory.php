<?php

use Faker\Generator as Faker;

$factory->define(App\Car::class, function (Faker $faker) {

    $faker->addProvider(new \Faker\Provider\Fakecar($faker));
    $v = $faker->vehicleArray();

    return [
        'plate' => $faker->vehicleRegistration,
        'manufacturer' => $v['brand'],
        'model' => $v['model'],
        'year' => $faker->biasedNumberBetween(1998,2017, 'sqrt'),
        'kilometrage' => $faker->biasedNumberBetween(0, 300000),
        'hp' => $faker->biasedNumberBetween(40, 800),
        'cc' => $faker->biasedNumberBetween(700, 5000),
        'user_id' => 2
    ];
});

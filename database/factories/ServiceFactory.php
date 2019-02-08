<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'name' => $faker->words($nb= 3, $asText = true),
        'cost' => $faker->biasedNumberBetween(100, 10000),
        'time_required' => $faker->time($format = 'H:i:s'),
        'warranty' => $faker->biasedNumberBetween(100, 10000)
    ];
});


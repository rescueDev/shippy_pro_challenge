<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Airport;
use Faker\Generator as Faker;

$factory->define(Airport::class, function (Faker $faker) {
    return [
        'name' => $faker->city ,
        'code' => $faker-> unique() -> numberBetween(10000, 99999),
        'lat' => $faker-> latitude,
        'lng' => $faker-> longitude,
    ];
});

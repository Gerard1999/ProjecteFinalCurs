<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Race;
use Faker\Generator as Faker;

$factory->define(Race::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,4),
        'name' => $faker -> sentence
    ];
});

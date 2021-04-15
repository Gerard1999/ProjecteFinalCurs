<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Race;
use Faker\Generator as Faker;

$factory->define(Race::class, function (Faker $faker) {
    return [
        'organizer_id' => 1,
        'name' => $faker -> name(),
        'location' => $faker -> city(),
        'url' => $faker->text(10),
        'date' => $faker -> date(),
        'shirt' => $faker -> boolean(),
    ];
});

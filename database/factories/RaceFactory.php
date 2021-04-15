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
        'date' => $faker->dateTimeBetween('now', '+1 years'),
        'shirt' => $faker -> boolean(),
        'description' => $faker -> text(400),
        'img_cover'=> 'https://static.wixstatic.com/media/f2d674_38e318042a1b41bfb511c8bba459d4fd~mv2.jpg/v1/fill/w_584,h_322,al_c,q_80,usm_0.66_1.00_0.01/UTMC-190202-174236.webp',
    ];
});

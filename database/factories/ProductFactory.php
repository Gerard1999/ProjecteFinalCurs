<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker -> name(),
        'description' => $faker -> text(150),
        'price' => $faker->randomFloat(2, 1, 100 ),
        'photo' => 'https://tutriatlon.com/14451-large_default/camiseta_salomon_s_lab_sense_tee_m_2017_hombre.jpg',
    ];
});

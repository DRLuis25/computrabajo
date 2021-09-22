<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Criterio;
use Faker\Generator as Faker;

$factory->define(Criterio::class, function (Faker $faker) {

    return [
        'descripcion' => $faker->word,
        'peso' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});

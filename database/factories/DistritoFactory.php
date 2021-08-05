<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Distrito;
use Faker\Generator as Faker;

$factory->define(Distrito::class, function (Faker $faker) {

    return [
        'nombre' => $faker->city,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => null
    ];
});

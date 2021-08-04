<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Oficio;
use Faker\Generator as Faker;

$factory->define(Oficio::class, function (Faker $faker) {

    return [
        'nombre' => $faker->text,
        'descripcion' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => null
    ];
});

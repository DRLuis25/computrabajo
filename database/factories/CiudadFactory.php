<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ciudad;
use App\Models\Departamento;
use Faker\Generator as Faker;

$factory->define(Ciudad::class, function (Faker $faker) {

    return [
        'departamento_id' => function() {
            return factory(Departamento::class)->create()->id;
        },
        'nombre' => $faker->city,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => null
    ];
});

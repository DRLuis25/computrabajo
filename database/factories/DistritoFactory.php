<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ciudad;
use App\Models\Distrito;
use Faker\Generator as Faker;

$factory->define(Distrito::class, function (Faker $faker) {

    return [
        'ciudad_id' => function() {
            return factory(Ciudad::class)->create()->id;
        },
        'nombre' => $faker->city,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => null
    ];
});

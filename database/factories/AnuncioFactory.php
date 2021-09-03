<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Anuncio;
use Faker\Generator as Faker;

$factory->define(Anuncio::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'oficio_id' => $faker->word,
        'departamento_id' => $faker->word,
        'ciudad_id' => $faker->word,
        'distrito_id' => $faker->word,
        'titulo' => $faker->word,
        'descripcion' => $faker->word,
        'fecha_expiracion' => $faker->date('Y-m-d H:i:s'),
        'pago_propuesto_min' => $faker->randomDigitNotNull,
        'pago_propuesto_max' => $faker->randomDigitNotNull,
        'estado' => $faker->word,
        'ver_email' => $faker->word,
        'ver_celular' => $faker->word,
        'ver_direccion' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});

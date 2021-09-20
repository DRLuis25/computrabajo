<?php

use App\Models\Anuncio;
use App\Models\Ciudad;
use App\Models\Criterio;
use App\Models\Departamento;
use App\Models\detalleAnuncio;
use App\Models\Distrito;
use App\Models\Oficio;
use App\Models\userAnuncio;
use App\User;
use Illuminate\Database\Seeder;

class anuncioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Criterio::create([
            'descripcion'=> 'Calidad'
        ]);
        Criterio::create([
            'descripcion'=> 'Comunicación'
        ]);
        Criterio::create([
            'descripcion'=> 'Pericia'
        ]);
        Criterio::create([
            'descripcion'=> 'Profesionalismo'
        ]);
        Criterio::create([
            'descripcion'=> '¿Contratar de nuevo?'
        ]);
        $anuncio = Anuncio::create([
            'user_id' => '1',
            'oficio_id' => '32',
            'departamento_id' => 12,
            'ciudad_id' => 122,
            'distrito_id' => 1222,
            'titulo' => 'Necesito pintor casa 3 pisos',
            'descripcion' => 'Necesito pintor que tenga experiencia en pintado de maquinaria, equipos y accesorios así también para apoyar en las labores del taller cuando se necesite.',
            'fecha_expiracion' => '2021-09-01',
            'pago_propuesto_min' => '750',
            'pago_propuesto_max' => '1100',
            'estado' => '0',
            'ver_email' => true,
            'ver_celular' => true,
            'ver_direccion' => true
        ]);

        $anuncio = Anuncio::create([
            'user_id' => '2',
            'oficio_id' => '32',
            'departamento_id' => 12,
            'ciudad_id' => 122,
            'distrito_id' => 1222,
            'titulo' => 'Necesito pintor casa 2 pisos- trabajo rapido',
            'descripcion' => 'Necesito pintor que tenga experiencia en pintado de maquinaria, equipos y accesorios así también para apoyar en las labores del taller cuando se necesite.',
            'fecha_expiracion' => '2021-09-01',
            'pago_propuesto_min' => '750',
            'pago_propuesto_max' => '1000',
            'estado' => '0',
            'ver_email' => true,
            'ver_celular' => true,
            'ver_direccion' => true
        ]);

        $anuncio = Anuncio::create([
            'user_id' => '3',
            'oficio_id' => '32',
            'departamento_id' => 12,
            'ciudad_id' => 122,
            'distrito_id' => 1222,
            'titulo' => 'Necesito pintor casa 3 pisos',
            'descripcion' => 'Necesito pintor que tenga experiencia en pintado de maquinaria, equipos y accesorios así también para apoyar en las labores del taller cuando se necesite.',
            'fecha_expiracion' => '2021-09-01',
            'pago_propuesto_min' => '750',
            'pago_propuesto_max' => '1000',
            'estado' => '0',
            'ver_email' => true,
            'ver_celular' => true,
            'ver_direccion' => true
        ]);

        $anuncio = Anuncio::create([
            'user_id' => '4',
            'oficio_id' => '32',
            'departamento_id' => 12,
            'ciudad_id' => 122,
            'distrito_id' => 1222,
            'titulo' => 'Necesito pintor casa 3 pisos',
            'descripcion' => 'Necesito pintor que tenga experiencia en pintado de maquinaria, equipos y accesorios así también para apoyar en las labores del taller cuando se necesite.',
            'fecha_expiracion' => '2021-09-01',
            'pago_propuesto_min' => '750',
            'pago_propuesto_max' => '1000',
            'estado' => '0',
            'ver_email' => true,
            'ver_celular' => true,
            'ver_direccion' => true
        ]);

        $anuncio = Anuncio::create([
            'user_id' => '5',
            'oficio_id' => '32',
            'departamento_id' => 12,
            'ciudad_id' => 122,
            'distrito_id' => 1222,
            'titulo' => 'Necesito pintor casa 3 pisos',
            'descripcion' => 'Necesito pintor que tenga experiencia en pintado de maquinaria, equipos y accesorios así también para apoyar en las labores del taller cuando se necesite.',
            'fecha_expiracion' => '2021-09-01',
            'pago_propuesto_min' => '750',
            'pago_propuesto_max' => '1000',
            'estado' => '0',
            'ver_email' => true,
            'ver_celular' => true,
            'ver_direccion' => true
        ]);
        //Usuario que postula
        $userAnuncio = userAnuncio::create([
            'user_id' => '3',
            'anuncio_id' => $anuncio->id,
            'descripcion' => 'Ofrezco terminar el trabajo a tiempo, atención las 24h',
            'importe' => '950',
            'tiempo' => '2',
            'temporal'=> '0'
        ]);

        //Se selecciona un usuario para el trabajo
        $detalleAnuncio = detalleAnuncio::create([
            'anuncio_id' => $anuncio->id,
            'user_id' => $userAnuncio->user_id,
            'importe' => $userAnuncio->importe,
            'descripcion'=> $userAnuncio->descripcion,
            'dia'=> $userAnuncio->tiempo
        ]);

        //Actualizar estado anuncio
        $anuncio->estado = '1';
        $anuncio->save();
        //Finalizar Anuncio
        //Llenar tabla valoración anuncio y cambiar anuncio->estado = 2;
    }
}

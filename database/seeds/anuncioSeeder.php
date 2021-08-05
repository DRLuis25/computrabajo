<?php

use App\Models\Anuncio;
use App\Models\Ciudad;
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
        //$departamentos = factory(Departamento::class,10)->create();
        //$ciudades = factory(Ciudad::class,10)->create();
        $distrito = factory(Distrito::class)->create();
        $distritos = factory(Distrito::class,10)->create();
        $oficios = factory(Oficio::class,10)->create();
        $user = User::create([
            'name' => 'Luis Guillermo',
            'apellidos' => 'Delgado Rodriguez',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
        $users = factory(User::class,10)->create();
        //Anuncio creado
        $anuncio = Anuncio::create([
            'user_id' => '1',
            'oficio_id' => '1',
            'departamento_id' => $distrito->ciudad->departamento->id,
            'ciudad_id' => $distrito->ciudad->id,
            'distrito_id' => $distrito->id,
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
            'tiempo' => '2'
        ]);
        //Se selecciona un usuario para el trabajo
        $detalleAnuncio = detalleAnuncio::create([
            'anuncio_id' => $anuncio->id,
            'user_id' => $userAnuncio->user_id,
            'importe' => $userAnuncio->importe
        ]);
        //Actualizar estado anuncio
        $anuncio->estado = '1';
        $anuncio->save();
        //Finalizar Anuncio
        //Llenar tabla valoración anuncio y cambiar anuncio->estado = 2;
    }
}

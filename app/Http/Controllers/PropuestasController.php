<?php

namespace App\Http\Controllers;

use App\Models\Propuestas;
use App\Models\userAnuncio;
use App\User;
use Illuminate\Http\Request;

class PropuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contactarEmpleador.Detalles');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user_id = auth()->user()->id;
        $anuncio_id = $request->id_oc;
        $unidad = 1;
        $datos_otros_usuarios_postulantes = User::join('user_anuncio', 'user_anuncio.user_id', '=', 'users.id')
            ->where('user_anuncio.anuncio_id', '=', $anuncio_id)
            ->select('users.name', 'users.email', 'users.calificacion_colaborador', 'user_anuncio.descripcion', 'user_anuncio.importe', 'user_anuncio.tiempo')
            ->get();
        $data = request()->validate([
            'importe' => 'required',
            'dias' => 'required',
            'descripcion' => 'required',
        ], [
            'importe.required' => 'Complete este campo',
            'dias.required' => 'Complete este campo',
            'descripcion.required' => 'Complete este campo',
        ]);


        $user_anuncio = new userAnuncio();
        $user_anuncio->user_id = $user_id;
        $user_anuncio->anuncio_id = $anuncio_id;
        $user_anuncio->descripcion = $request->descripcion;
        $user_anuncio->importe = $request->importe;
        $user_anuncio->tiempo = $request->dias;
        $user_anuncio->unidad_tiempo = $unidad;

        $user_anuncio->save();
        //Variables
        $desc = $request->descripcion;
        $monto = $request->importe;
        $tiem = $request->dias;
        $ultimo = userAnuncio::latest('id')->first();
        // echo $ultimo; 

        return view('contactarEmpleador.Propuestas', compact('ultimo', 'desc', 'monto', 'tiem', 'datos_otros_usuarios_postulantes'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Propuestas  $propuestas
     * @return \Illuminate\Http\Response
     */
    public function show(Propuestas $propuestas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Propuestas  $propuestas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_anuncio = userAnuncio::FindOrFail($id);
        return view('contactarEmpleador.edit', compact('user_anuncio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Propuestas  $propuestas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ultimo = userAnuncio::latest('id')->first();
        $anuncio_id=$ultimo->anuncio_id;
        $datos_otros_usuarios_postulantes = User::join('user_anuncio', 'user_anuncio.user_id', '=', 'users.id')
        ->where('user_anuncio.anuncio_id', '=', $anuncio_id)
        ->select('users.name', 'users.email', 'users.calificacion_colaborador', 'user_anuncio.descripcion', 'user_anuncio.importe', 'user_anuncio.tiempo')
        ->get();

        $user_anuncio = userAnuncio::where('id', '=', $id)->first();
        $user_anuncio->id = $id;
        $user_anuncio->user_id = auth()->user()->id;
        $user_anuncio->descripcion = $request->descripcion;
        $user_anuncio->importe = $request->importe;
        $user_anuncio->tiempo = $request->dias;
        $user_anuncio->save();

        $desc = $request->descripcion;
        $monto = $request->importe;
        $tiem = $request->dias;
        
        

        return view('contactarEmpleador.Propuestas', compact('ultimo', 'desc', 'monto', 'tiem', 'datos_otros_usuarios_postulantes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Propuestas  $propuestas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            userAnuncio::find($id)->forceDelete();
            return redirect()->route('filtros.index')->with('alert', 'Postulación Eliminada');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('filtros.index')->with('alert', 'Error inesperado');
        }
    }
}

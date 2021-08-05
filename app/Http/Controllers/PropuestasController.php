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
        $user_id =1 ;//auth()->user()->user_id; 
        $anuncio_id =1;
        $unidad = 1;
        $data = request()->validate([
            'importe'=>'required',
            'dias'=> 'required',
            'descripcion'=> 'required',
        ],[
            'importe.required'=>'Complete este campo',
            'dias.required'=>'Complete este campo',
            'descripcion.required'=>'Complete este campo',
            ]);
        

            $user_anuncio = new userAnuncio();
            $user_anuncio->user_id = $user_id;
            $user_anuncio->anuncio_id = $anuncio_id;
            $user_anuncio->descripcion = $request->descripcion;
            $user_anuncio->importe = $request->importe;
            $user_anuncio->tiempo = $request->dias;
            $user_anuncio->unidad_tiempo = $unidad;
            //echo $user_anuncio;
            $user_anuncio->save();
            //Variables
            $desc = $request->descripcion;
            $monto =$request->importe;
            $tiem = $request->dias;
           // $datosusuario=User::where('id','=',$user_id)->first();
           // print_r($datosusuario);
            return view('contactarEmpleador.Propuestas',compact('desc','monto','tiem'));
 
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
    public function edit(Propuestas $propuestas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Propuestas  $propuestas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propuestas $propuestas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Propuestas  $propuestas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propuestas $propuestas)
    {
        //
    }
}

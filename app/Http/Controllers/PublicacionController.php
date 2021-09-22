<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAnuncio;
use App\Models\detalleAnuncio;
use App\Models\Anuncio;


class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('publicacion.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function comienzo($id)
    {
        //Abrir anuncio
        $publicacion = userAnuncio::where('anuncio_id','=',$id)->where('temporal','=','1')->get();
        $temporal= detalleAnuncio::where('anuncio_id','=',$id)->get();
        return view('publicacion.comienzo',compact('publicacion','temporal'));
    }
    public function contrato($idusuario,$idanuncion,$importe,$descripcion,$dias){
        $contrato= new detalleAnuncio();
        $contrato->anuncio_id=$idanuncion;
        $contrato->user_id=$idusuario;
        $contrato->importe=$importe;
        $contrato->descripcion=$descripcion;
        $contrato->dia=$dias;
    
        $contrato->save();
        
        /* $publicacion=userAnuncio::findOrFail($idanuncion,$idusuario);
        dd($publicacion) */

        $publicacion = userAnuncio::where('anuncio_id','=',$idanuncion)->where('user_id','=',$idusuario)->get();
        $anuncio=Anuncio::findorFail($idanuncion);
        $anuncio->estado="1";
        $anuncio->save();
        $publicacion[0]->temporal="0";
        $publicacion[0]->save();
        
        // $publicacion->temporal='0';
        //$publicacion->save(); 
        return redirect()->route('publicacion.comienzo',$idanuncion);
        //return view('publicacion.comienzo',compact('publicacion'))->with('anuncio_id',$id);
    }
}

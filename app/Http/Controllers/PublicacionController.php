<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userAnuncio;
use App\Models\detalleAnuncio;


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
        $publicacion = userAnuncio::where('anuncio_id','=',$id)->get();
       /*  foreach($publicacion as $item){
            if($item->anuncio->detalleAnuncios[0]->anuncio_id!=null)
            {
                $parametro=1;
            }
        } */
        $temporal= detalleAnuncio::where('anuncio_id','=',$id)->get();
        if ($temporal!=null){
            $parametro=1;
        }else{
            $parametro=0;
        }
        return view('publicacion.comienzo',compact('publicacion','temporal','parametro'));
    }
    public function contrato($idanuncion,$idusuario,$importe){
        $contrato= new detalleAnuncio();
        $contrato->anuncio_id=$idanuncion;
        $contrato->user_id=$idusuario;
        $contrato->importe=$importe;
        $contrato->save();
        return redirect()->route('publicacion.comienzo',$idanuncion);
    }
}

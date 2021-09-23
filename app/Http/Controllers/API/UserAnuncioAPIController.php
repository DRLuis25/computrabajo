<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Anuncio;
use App\Models\userAnuncio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAnuncioAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $UserAnuncio = userAnuncio::all();
       return response()->json($UserAnuncio); 
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
        //Validacion
        $request->validate([
            /* 'user_id' => 'required',
            'anuncio_id'=> 'required', */
            'descripcion' =>'required',
            'importe' => 'required',
            'tiempo' => 'required'
        ]);

        //Save to BD
        $UserAnuncio = userAnuncio::create([
            'user_id' => 1,//$request-> user_id,
            'anuncio_id' => 1,//$request->anuncio_id,
            'descripcion' => $request->descripcion,
            'importe' => $request->importe,
            'tiempo' => $request->tiempo
        ]);

        return response()->json($UserAnuncio);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $anuncios =DB::table('anuncios')->where('id',$id)->first();
        return response()->json($anuncios);
        
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
}

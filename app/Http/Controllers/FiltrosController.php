<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FiltrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {

        if($request->get('select')=='antiguo'){
                $query = trim($request->get('select'));
                $anuncios =User::join('anuncios','users.id','=','anuncios.user_id') 
                ->select('anuncios.id','anuncios.titulo','anuncios.descripcion','anuncios.pago_propuesto_min','anuncios.pago_propuesto_max','users.calificacion_empleador','anuncios.created_at')
                ->orderBy('anuncios.created_at','asc') -> where('anuncios.estado','=','0')
                ->paginate(10);
                return view('filtros.inicio',['anuncios' => $anuncios, 'select'=>$query]);
        }else if($request->get('select')=='pbajo'){
            $query = trim($request->get('select'));
            $anuncios =User::join('anuncios','users.id','=','anuncios.user_id') 
            ->select('anuncios.id','anuncios.titulo','anuncios.descripcion','anuncios.pago_propuesto_min','anuncios.pago_propuesto_max','users.calificacion_empleador','anuncios.created_at')
            ->orderBy('anuncios.pago_propuesto_min','asc') -> where('anuncios.estado','=','0')
            ->paginate(10);
            return view('filtros.inicio',['anuncios' => $anuncios, 'select'=>$query]); 
        }else if($request->get('select')=='palto'){
            $query = trim($request->get('select'));
            $anuncios =User::join('anuncios','users.id','=','anuncios.user_id') 
            ->select('anuncios.id','anuncios.titulo','anuncios.descripcion','anuncios.pago_propuesto_min','anuncios.pago_propuesto_max','users.calificacion_empleador','anuncios.created_at')
            ->orderBy('anuncios.pago_propuesto_min','desc') -> where('anuncios.estado','=','0')
            ->paginate(10);
            return view('filtros.inicio',['anuncios' => $anuncios, 'select'=>$query]);
        }
        else{
            $query = trim($request->get('search'));
            $anuncios =User::join('anuncios','users.id','=','anuncios.user_id') 
            ->select('anuncios.id','anuncios.titulo','anuncios.descripcion','anuncios.pago_propuesto_min','anuncios.pago_propuesto_max','users.calificacion_empleador','anuncios.created_at')
            ->where('anuncios.titulo','LIKE','%'.$query.'%')-> where('anuncios.estado','=','0')
            ->orderBy('anuncios.created_at','desc') 
            ->paginate(10);
            return view('filtros.inicio',['anuncios' => $anuncios, 'search'=>$query]);
        } 
       
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\valoracionAnuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnuncioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function finalizar($id)
    {
        //Abrir anuncio
        $anuncio = Anuncio::where('id','=',$id)->first();
        return view('anuncio.finalizar',compact('anuncio'));
    }
    public function valoracion()
    {
        //return request()->all();
        $anuncio_id = request()->anuncio_id;
        $termino = request()->termino;
        return view('anuncio.valoracion',compact('anuncio_id','termino'));
    }
    public function final(Request $request)
    {
        //return request()->all();
        $valoracion = valoracionAnuncio::firstOrCreate(['anuncio_id'=>$request->anuncio_id]);
        $valoracion->anuncio_id = $request->anuncio_id;
        $valoracion->estado_finalizado = $request->estado_finalizado;
        $valoracion->a_tiempo = $request->a_tiempo;
        $valoracion->valoracion_calidad = $request->star ?? 0;
        $valoracion->valoracion_comunicacion = $request->star2 ?? 0;
        $valoracion->valoracion_pericia = $request->star3?? 0;
        $valoracion->valoracion_profesionalismo = $request->star4 ?? 0;
        $valoracion->valoracion_contratar = $request->star5 ?? 0;
        $valoracion->comentario = $request->comentario;
        $valoracion->save();
        /*$valoracion = valoracionAnuncio::create([
            'anuncio_id' => $request->anuncio_id,
            'estado_finalizado' => $request->estado_finalizado,
            'a_tiempo' => $request->a_tiempo,
            'valoracion_calidad' => $request->star ?? 0,
            'valoracion_comunicacion' => $request->star2 ?? 0,
            'valoracion_pericia' => $request->star3?? 0,
            'valoracion_profesionalismo' => $request->star4 ?? 0,
            'valoracion_contratar' => $request->star5 ?? 0,
            'comentario' => $request->comentario
        ]);*/
        //return $valoracion->anuncio->detalleAnuncios[0]->user->name;
        $anuncio = $valoracion->anuncio;
        $anuncio->estado = 2;
        $anuncio->save();
        return view('anuncio.final',compact('anuncio'));
    }
    public function index()
    {
        $anuncio = Anuncio::where('user_id', '=', Auth::user()->id)->get();
        return view('anuncio.misanuncios', compact('anuncio'));
    }
}

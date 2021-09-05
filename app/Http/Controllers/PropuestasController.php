<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Propuestas;
use App\Models\userAnuncio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PropuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (Auth::guest()) {
            return redirect()->guest('login');
        }
        $user_id = auth()->user()->id;
        $anuncio_id=$_GET['ide'];
        $detalles_Proyecto = Anuncio::where('id','=',$anuncio_id)->first();
        $existe_Usuario = DB::table('user_anuncio')->select('user_id')->where([['user_anuncio.user_id', '=', $user_id],['user_anuncio.anuncio_id','=',$anuncio_id],])->first();
        if (!Auth::guest()) {
            if (!$existe_Usuario) {
                return view('contactarEmpleador.Detalles',compact('detalles_Proyecto'));
            } else {
                return redirect()->route('filtros.index');
            }
        }
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
        //mostrar otros postulantes
        $datos_otros_usuarios_postulantes = User::join('user_anuncio', 'user_anuncio.user_id', '=', 'users.id')
            ->where([['user_anuncio.anuncio_id', '=', $anuncio_id], ['user_anuncio.user_id', '!=', $user_id],])
            ->select('users.name', 'users.email', 'users.calificacion_colaborador', 'user_anuncio.descripcion', 'user_anuncio.importe', 'user_anuncio.tiempo')
            ->get();
        //mostrar rango de precios
        $presupuesto = userAnuncio::join('anuncios', 'user_anuncio.anuncio_id', '=', 'anuncios.id')
            ->select('anuncios.pago_propuesto_min', 'anuncios.pago_propuesto_max')
            ->first();
        $existe_Usuario = DB::table('user_anuncio')->select('user_id')->where([['user_anuncio.user_id', '=', $user_id],['user_anuncio.anuncio_id','=',$anuncio_id],])->first();
        // $existe_Usuario = intval($existe_Usuario);
        if (!$existe_Usuario ) {
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
        }

        //Variables
        $desc = $request->descripcion;
        $monto = $request->importe;
        $tiem = $request->dias;
        $ultimo = userAnuncio::latest('id')->first();

        $total_postulantes = userAnuncio::count('user_id');
        $suma = userAnuncio::sum('importe');
        $promedio = $suma / $total_postulantes;


        return view('contactarEmpleador.Propuestas', compact('ultimo', 'desc', 'monto', 'tiem', 'datos_otros_usuarios_postulantes', 'total_postulantes', 'presupuesto', 'promedio'));
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
        $anuncio_id = $ultimo->anuncio_id;
        $datos_otros_usuarios_postulantes = User::join('user_anuncio', 'user_anuncio.user_id', '=', 'users.id')
            ->where('user_anuncio.anuncio_id', '=', $anuncio_id)
            ->select('users.name', 'users.email', 'users.calificacion_colaborador', 'user_anuncio.descripcion', 'user_anuncio.importe', 'user_anuncio.tiempo')
            ->orderBy('user_anuncio.anuncio_id', 'desc')
            ->take(1)
            ->get();

        //mostrar rango de precios
        $presupuesto = userAnuncio::join('anuncios', 'user_anuncio.anuncio_id', '=', 'anuncios.id')
            ->select('anuncios.pago_propuesto_min', 'anuncios.pago_propuesto_max')
            ->first();

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

        $total_postulantes = userAnuncio::count('user_id');
        $suma = userAnuncio::sum('importe');
        $promedio = $suma / $total_postulantes;

        return view('contactarEmpleador.Propuestas', compact('ultimo', 'desc', 'monto', 'tiem', 'datos_otros_usuarios_postulantes', 'total_postulantes', 'presupuesto', 'promedio'));
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

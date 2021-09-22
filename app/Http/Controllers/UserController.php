<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelUser;
use Illuminate\Support\Facades\Auth;
use App\Models\Oficio;
use App\Models\userOficio;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuario = modelUser::findOrFail(Auth::user()->id);
        return view('perfil.index',compact('usuario'));
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
        $usuario = modelUser::findOrFail($id);
        $oficios = Oficio::all();
        return view('perfil.edit', compact('usuario','oficios'));
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
        
        $data = request()->validate([
            'dni' => 'required',
            'name' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'acerca' => 'required',
            'experiencia' => 'required',
            'oficios' => 'required'
        ],
        [
            'dni.required' => 'Ingrese el número de documento',
            'name.required' => 'Ingrese el nombre',
            'apellidos.required' => 'Ingrese los apellidos',
            'direccion.required' => 'Ingrese la direccion',
            'acerca.required' => 'Complete el campo',
            'experiencia.required' => 'Complete el campo',
            'oficios.required' => 'Debe seleccionar al menos una opción',
        ]);

        
        $usuario = modelUser::findOrFail($id);
        $usuario->dni = $request->dni;
        $usuario->name = $request->name;
        $usuario->apellidos = $request->apellidos;
        $usuario->direccion = $request->direccion;
        $usuario->acerca_de_mi = $request->acerca;
        $usuario->experiencia = $request->experiencia;
        $usuario->save();

        $userOficio = DB::table('user_oficio')->where('user_id',$usuario->id)->delete();
        
        foreach($request->oficios as $new){
            $nuevosOficios = new userOficio();
            $nuevosOficios->user_id = $usuario->id;
            $nuevosOficios->oficio_id = $new;
            $nuevosOficios->save();
        }
        
        return redirect()->route('perfilUsuario.index');
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
    public function desactivar($id)
    {
        //
        $user=User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.home');
    }

}

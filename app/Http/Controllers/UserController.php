<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelUser;
use Illuminate\Support\Facades\Auth;


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
        return view('perfil.editarPerfil', compact('usuario'));

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
            'name' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'acerca' => 'required',
            'experiencia' => 'required',
        ],
        [
            'name.required' => 'Ingrese el nombre',
            'apellidos.required' => 'Ingrese los apellidos',
            'direccion.required' => 'Ingrese la direccion',
            'acerca.required' => 'Complete el campo',
            'experiencia.required' => 'Complete el campo',
        ]);

        $usuario = modelUser::findOrFail($id);
        $usuario->name = $request->name;
        $usuario->apellidos = $request->apellidos;
        $usuario->direccion = $request->direccion;
        $usuario->acerca_de_mi = $request->acerca;
        $usuario->experiencia = $request->experiencia;
        $usuario->save();

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

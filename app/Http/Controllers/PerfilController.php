<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $usuario = modelUser::findOrFail($id);
        return view('perfil.password', compact('usuario'));
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
        $data=request()->validate([
            'password1'=>'required|max:60',
            'password2'=>'required|max:60',
            'password3'=>'required|max:60',
        ],
        [
            'password1.required'=>'Ingrese la contraseña actual',
            'password1.max'=>'Maximo 60 caracteres',
            'password2.required'=>'Ingrese la nueva contraseña',
            'password2.max'=>'Maximo 60 caracteres',
            'password3.required'=>'Ingrese nuevamente su nueva contraseña',
            'password3.max'=>'Maximo 60 caracteres',

        ]);

        $usuario = modelUser::findOrFail($id);

        if(  Hash::check($request->password1, $usuario->password) )
        {
            if( $request->password2 == $request->password3 )
            {
                $usuario->password = Hash::make($request->password2);
                $usuario->save();
                return redirect()->route('perfilPassword.edit',$usuario)->with('datos', 'Contraseña cambiada correctamente !!!');
            }
            else
            {
                return redirect()->route('perfilPassword.edit',$usuario)->with('datos', 'Las nuevas contraseñas no coinciden !!!');
            }
        }
        else{
            return redirect()->route('perfilPassword.edit',$usuario)->with('datos', 'Ingrese contraseña correcta !!!');
        }
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

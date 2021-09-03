<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class EditarController extends Controller
{
    public function index($id)
    {

        $duser =User::findOrFail($id);
        return view('layouts.admin.edituser',compact('duser'));
    }

    public function editaralusuario(Request $request,$id )
    {
        $data = request()->validate([
            'name' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'celular' => 'required',
            'correo' => 'required',
            'nacimiento' => 'required',

        ],
        [
            'name.required' => 'Ingrese el nombre',
            'apellidos.required' => 'Ingrese apellidos',
            'direccion.required' => 'Ingrese direccion',
            'celular.required' => 'Ingrese direccion',
            'correo.required' => 'Ingrese un correo',
            'nacimiento.required' => 'Ingrese fecha de nacimiento',

        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->direccion = $request->direccion;
        $user->celular = $request->celular;
        $user->email = $request->correo;
        $user->fecha_nacimiento = $request->nacimiento;
        $user->save();

        return redirect()->route('admin.home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HistorialControler extends Controller
{
    public function index($id)
    {
        // $anunciouser =Anuncio::where('user_id','=',$id)->get();
        $duser =User::findOrFail($id);
        // dd($anunciouser);s
        $anunciouser=DB::select('call SP_HISTORIAL_EMPLEADOR(?)', array($id));

        // $anunciouser =Anuncio::where('user_id','=',$id)->get();
        $duser1 =User ::findOrFail($id);
        // dd($anunciouser);
        $anunciouser1=DB::select('call SP_HISTORIAL_COLABORADOR(?)', array($id));


        return view('layouts.admin.historial',compact('anunciouser','duser','anunciouser1','duser1'));

    }
}

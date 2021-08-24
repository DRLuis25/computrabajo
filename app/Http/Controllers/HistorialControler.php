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
        $anunciouser=DB::select("SELECT A.created_at, A.titulo, O.nombre AS oficio, A.descripcion, C.nombre as ciudad, U.email, A.estado
        FROM anuncios A INNER JOIN oficios O ON A.oficio_id = O.id
                     INNER JOIN ciudades C ON A.ciudad_id = C.id
                     INNER JOIN detalle_anuncio DA ON DA.anuncio_id = A.id
                     INNER JOIN users U ON dA.user_id = U.id
        WHERE A.user_id = ".$id.";");
        return view('layouts.admin.historial',compact('anunciouser','duser'));
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChistorialController extends Controller
{
    public function index($id)
    {
        // $anunciouser =Anuncio::where('user_id','=',$id)->get();
        $duser =User ::findOrFail($id);
        // dd($anunciouser);


        // $anunciouser=DB::select("SELECT DA.created_at, A.titulo, O.nombre as oficio, A.descripcion, C.nombre as ciudad, U.email, A.estado
        // FROM detalle_anuncio DA INNER JOIN users UR ON DA.user_id = UR.id
        //       INNER JOIN anuncios A ON DA.anuncio_id = A.id
        //       INNER JOIN oficios O ON O.id = A.oficio_id
        //                         INNER JOIN ciudades C ON A.ciudad_id = C.id
        //                         LEFT JOIN users U ON U.id = DA.user_id
        // WHERE U.id = ".$id.";");
        $anunciouser=DB::connection('admin_user')->select('call SP_TRABAJOS_PUBLICADOS(?)', array($id));
        return view('layouts.admin.chistorial',compact('anunciouser','duser'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class RdiariosController extends Controller
{
    public function index($mes, $dia, Request $request)
    {
        if($request->ajax()){
            $publicados = DB::select('call SP_T_PUBLICADOS(?,?)', array($dia,$mes));
            $enespera = DB::select('call SP_T_EN_ESPERA(?,?)', array($dia,$mes));
            foreach ($publicados as $key) {
                $x =(array)$key;
            }
            foreach ($enespera as $key) {
                $y =(array)$key;
            }
            $labels = array('publicados','En espera');
            $datos = array($x['publicados'],$y['enespera']);
            return response()->json([
                'labels'=>$labels,
                'datos'=>$datos
            ]);
        }

        //return $datos;
        return view('layouts.admin.rdiarios',compact('mes','dia'));
    }

    public function mensual($mes)
    {

        $publicados = DB::select('call SP_TRABAJOS_PUBLICADOS(?)', array($mes));
        $enproceso = DB::select('call SP_T_EN_PROCESO(?)', array($mes));
        $realizado = DB::select('call SP_T_REALIZADOS(?)', array($mes));
        // dd($publicados,$enproceso,$realizado);
        return view('layouts.admin.rmensuales',compact($publicados,$enproceso,$realizado));
    }
}

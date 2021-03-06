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
            $publicados = DB::connection('admin_user')->select('call SP_T_ASIGNADOS(?,?)', array($mes,$dia));
            $enespera = DB::connection('admin_user')->select('call SP_T_EN_ESPERA(?,?)', array($mes,$dia));
            foreach ($publicados as $key) {
                $x =(array)$key;
            }
            foreach ($enespera as $key) {
                $y =(array)$key;
            }
            $labels = array('Asignados','En espera');
            $datos = array($x['asignados'],$y['enespera']);
            return response()->json([
                'labels'=>$labels,
                'datos'=>$datos
            ]);
        }

        //return $datos;
        return view('layouts.admin.rdiarios',compact('mes','dia'));
    }

    public function mensual($mes, Request $request)
    {




        if($request->ajax()){

        $norealizados = DB::connection('admin_user')->select('call SP_TRABAJOS_NOREALIZADOS(?)', array($mes));
        $enproceso = DB::connection('admin_user')->select('call SP_T_EN_PROCESO(?)', array($mes));
        $realizado = DB::connection('admin_user')->select('call SP_T_REALIZADOS(?)', array($mes));
            foreach ($norealizados as $key) {
                $x =(array)$key;
            }
            foreach ($enproceso as $key) {
                $y =(array)$key;
            }
            foreach ($realizado as $key) {
                $z =(array)$key;
            }
            $labels = array('No realizados','En proceso','Realizados');
            $datos = array($x['norealizados'],$y['enproceso'],$z['realizados']);

            return response()->json([
                'labels'=>$labels,
                'datos'=>$datos
            ]);
        }
        // dd($publicados,$enproceso,$realizado);
        return view('layouts.admin.rmensuales',compact('mes'));
    }
}

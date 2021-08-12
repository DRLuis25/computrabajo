<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatosController extends Controller
{
    public function listarCiudades($idDepartamento) {
        return DB::select("select * from ciudades where departamento_id = ".$idDepartamento.";");
    }
    
    public function listarDistritos($idCiudad) {
        return DB::select("select * from distritos where ciudad_id = ".$idCiudad.";");
    }
}

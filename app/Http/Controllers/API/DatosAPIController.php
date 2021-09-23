<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnuncioAPIRequest;
use App\Http\Requests\API\UpdateAnuncioAPIRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Symfony\Component\ErrorHandler\Debug;
use Illuminate\Support\Facades\DB;

use App\Models\Departamento;
use App\Models\Oficio;

/**
 * Class DatosController
 * @package App\Http\Controllers\API
 */

class DatosAPIController extends AppBaseController
{
    public function listarOficios() {
        $oficios = Oficio::All();
        return $this->sendResponse($oficios, 'Oficios retrieved successfully');
    }

    public function listarDepartamentos() {
        $departamentos = Departamento::All();
        return $this->sendResponse($departamentos, 'Departamentos retrieved successfully');
    }

    public function listarCiudades($idDepartamento) {
        $ciudades = DB::select("select * from ciudades where departamento_id = ".$idDepartamento.";");
        return $this->sendResponse($ciudades, 'Ciudades retrieved successfully');
    }
    
    public function listarDistritos($idCiudad) {
        $distritos = DB::select("select * from distritos where ciudad_id = ".$idCiudad.";");
        return $this->sendResponse($distritos, 'Ciudades retrieved successfully');
    }
}

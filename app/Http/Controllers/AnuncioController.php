<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Criterio;
use App\Models\valoracionAnuncio;
use App\Models\Oficio;
use App\Models\Departamento;
use App\Models\valoracionAnuncioCriterio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnuncioController extends Controller
{
    const PAGINACION = 5;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function finalizar($id)
    {
        //Abrir anuncio
        $anuncio = Anuncio::where('id','=',$id)->first();
        return view('anuncio.finalizar',compact('anuncio'));
    }
    public function valoracion()
    {
        //return request()->all();
        $anuncio_id = request()->anuncio_id;
        $anuncio = Anuncio::find($anuncio_id);
        $termino = request()->termino;
        $criterios = Criterio::all();

        return view('anuncio.valoracion',compact('anuncio','anuncio_id','termino','criterios'));
    }
    public function final(Request $request)
    {
        $criterios = Criterio::all();
        //return $request->star;
        //return $request->star['1'];
        //return request()->all();
        $valoracion = valoracionAnuncio::firstOrCreate(['anuncio_id'=>$request->anuncio_id],
        [
            'anuncio_id' => $request->anuncio_id,
            'estado_finalizado' => $request->estado_finalizado,
            'a_tiempo' => $request->a_tiempo,
            'comentario' => $request->comentario
        ]);
        $valoracion->anuncio_id = $request->anuncio_id;
        $valoracion->estado_finalizado = $request->estado_finalizado;
        $valoracion->a_tiempo = $request->a_tiempo;
        $valoracion->comentario = $request->comentario;
        $valoracion->save();
        /*$valoracion = valoracionAnuncio::create([
            'anuncio_id' => $request->anuncio_id,
            'estado_finalizado' => $request->estado_finalizado,
            'a_tiempo' => $request->a_tiempo,
            'comentario' => $request->comentario
        ]);*/
        //return $valoracion->anuncio->detalleAnuncios[0]->user->name;
        foreach ($criterios as $key => $item) {
            valoracionAnuncioCriterio::create([
                'valoracion_anuncio_id' => $valoracion->id,
                'criterio_id' => $item->id,
                'valoracion' => $request->star[$item->id] ?? 0
            ]);
        }
        try {
            $anuncio = $valoracion->anuncio;
            $anuncio->estado = 2;
            $anuncio->save(); //Aquí se llamaría al trigger
        } catch (\Exception $e) {

            return $e->getMessage();
        }
        return view('anuncio.final',compact('anuncio'));
    }

    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $anuncio = Anuncio::where('titulo', 'like', '%'.$buscarpor.'%')->where('user_id', '=', Auth::user()->id)->paginate($this::PAGINACION);
        return view('anuncio.misanuncios', compact('anuncio', 'buscarpor'));
    }

    public function publicar()
    {
        $oficio = Oficio::All();
        $departamento = Departamento::All();
        return view('anuncio.publicaranuncio', compact('oficio', 'departamento'));
    }

    public function guardaranuncio(Request $request)
    {
        $data = request()->validate([
            'fecha_expiracion' => 'required',
            'radioemail' => 'required',
            'radiotelefono' => 'required',
            'radiodireccion' => 'required',
            'titulo' => 'required',
            'idoficio' => 'required',
            'descripcion' => 'required',
            'min' => 'required',
            'max' => 'required',
            'departamento_id' => 'required',
            'ciudad_id' => 'required',
            'distrito_id' => 'required'
        ],
        [
            'fecha_expiracion.required' => 'Ingrese la fecha',
            'radioemail.required' => 'Seleccione si desea mostrar su email de contacto',
            'radiotelefono.required' => 'Seleccione si desea mostrar su telefono de contacto',
            'radiodireccion.required' => 'Seleccione si desea mostrar su dirección de contacto',
            'titulo.required' => 'Ingrese el título del aviso',
            'idoficio.required' => 'Seleccione el oficio',
            'descripcion.required' => 'Ingrese una descripción de las tareas a realizar',
            'min.required' => 'Ingrese el monto mínimo aofrecido',
            'max.required' => 'Ingrese el monto máximo aofrecido',
            'departamento_id.required' => 'Seleccione el departamento',
            'ciudad_id.required' => 'Seleccione la ciudad',
            'distrito_id.required' => 'Seleccione el distrito'
        ]);

        $anuncio = new Anuncio();
        $anuncio->fecha_expiracion = $request->fecha_expiracion;
        $anuncio->estado = 0;
        $anuncio->ver_email = $request->radioemail;
        $anuncio->ver_celular = $request->radiotelefono;
        $anuncio->ver_direccion = $request->radiodireccion;
        $anuncio->titulo = $request->titulo;
        $anuncio->oficio_id = $request->idoficio;
        $anuncio->descripcion = $request->descripcion;
        $anuncio->pago_propuesto_min = $request->min;
        $anuncio->pago_propuesto_max = $request->max;
        $anuncio->departamento_id = $request->departamento_id;
        $anuncio->ciudad_id = $request->ciudad_id;
        $anuncio->distrito_id = $request->distrito_id;
        $anuncio->user_id = Auth::user()->id;
        $anuncio->save();

        return redirect()->route('anuncio.misanuncios');
    }

    public function editaranuncio($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        return view('anuncio.editaranuncio', compact('anuncio'));
    }

    public function updateanuncio(Request $request, $id){
        $data = request()->validate([
            'fecha_expiracion' => 'required',
            'radioemail' => 'required',
            'radiotelefono' => 'required',
            'radiodireccion' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
            'min' => 'required',
            'max' => 'required',
        ],
        [
            'fecha_expiracion.required' => 'Ingrese la fecha',
            'radioemail.required' => 'Seleccione si desea mostrar su email de contacto',
            'radiotelefono.required' => 'Seleccione si desea mostrar su telefono de contacto',
            'radiodireccion.required' => 'Seleccione si desea mostrar su dirección de contacto',
            'titulo.required' => 'Ingrese el título del aviso',
            'descripcion.required' => 'Ingrese una descripción de las tareas a realizar',
            'min.required' => 'Ingrese el monto mínimo aofrecido',
            'max.required' => 'Ingrese el monto máximo aofrecido',
        ]);

        $anuncio = Anuncio::findOrFail($id);
        $anuncio->fecha_expiracion = $request->fecha_expiracion;
        $anuncio->ver_email = $request->radioemail;
        $anuncio->ver_celular = $request->radiotelefono;
        $anuncio->ver_direccion = $request->radiodireccion;
        $anuncio->titulo = $request->titulo;
        $anuncio->descripcion = $request->descripcion;
        $anuncio->pago_propuesto_min = $request->min;
        $anuncio->pago_propuesto_max = $request->max;
        $anuncio->save();

        return redirect()->route('anuncio.misanuncios');
    }
}

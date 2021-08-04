<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class valoracionAnuncio
 * @package App\Models
 * @version August 3, 2021, 11:18 pm UTC
 *
 * @property \App\Models\Anuncio $anuncio
 * @property integer $anuncio_id
 * @property string $estado_finalizado
 * @property boolean $a_tiempo
 * @property number $valoracion_calidad
 * @property number $valoracion_comunicacion
 * @property number $valoracion_pericia
 * @property number $valoracion_profesionalismo
 * @property number $valoracion_contratar
 * @property string $comentario
 * @property string $descripcion
 * @property number $importe
 * @property string|\Carbon\Carbon $tiempo
 */
class valoracionAnuncio extends Model
{
    use SoftDeletes;

    public $table = 'valoracion_anuncios';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'anuncio_id',
        'estado_finalizado',
        'a_tiempo',
        'valoracion_calidad',
        'valoracion_comunicacion',
        'valoracion_pericia',
        'valoracion_profesionalismo',
        'valoracion_contratar',
        'comentario',
        //'descripcion',
        //'importe',
        //'tiempo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'anuncio_id' => 'integer',
        'estado_finalizado' => 'string',
        'a_tiempo' => 'boolean',
        'valoracion_calidad' => 'float',
        'valoracion_comunicacion' => 'float',
        'valoracion_pericia' => 'float',
        'valoracion_profesionalismo' => 'float',
        'valoracion_contratar' => 'float',
        'comentario' => 'string',
        //'descripcion' => 'string',
        //'importe' => 'float',
        //'tiempo' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'anuncio_id' => 'required',
        'estado_finalizado' => 'required|string|max:1',
        'a_tiempo' => 'required|boolean',
        'valoracion_calidad' => 'required|numeric',
        'valoracion_comunicacion' => 'required|numeric',
        'valoracion_pericia' => 'required|numeric',
        'valoracion_profesionalismo' => 'required|numeric',
        'valoracion_contratar' => 'required|numeric',
        'comentario' => 'nullable|string|max:255',
        //'descripcion' => 'required|string|max:255',
        //'importe' => 'required|numeric',
        //'tiempo' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function anuncio()
    {
        return $this->belongsTo(\App\Models\Anuncio::class, 'anuncio_id');
    }
    public static function findOrCreate($id)
    {
        $obj = static::where('anuncio_id','=',$id);
        return $obj ?: new static;
    }
}

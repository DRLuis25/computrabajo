<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class valoracionAnuncio
 * @package App\Models
 * @version September 20, 2021, 12:21 am UTC
 *
 * @property \App\Models\Anuncio $anuncio
 * @property \Illuminate\Database\Eloquent\Collection $valoracionAnuncioCriterios
 * @property integer $anuncio_id
 * @property string $estado_finalizado
 * @property boolean $a_tiempo
 * @property string $comentario
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
        'comentario'
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
        'comentario' => 'string'
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
        'comentario' => 'nullable|string|max:255',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function valoracionAnuncioCriterios()
    {
        return $this->hasMany(\App\Models\ValoracionAnuncioCriterio::class, 'valoracion_anuncio_id');
    }
    public static function findOrCreate($id)
    {
        $obj = static::where('anuncio_id','=',$id);
        return $obj ?: new static;
    }
}

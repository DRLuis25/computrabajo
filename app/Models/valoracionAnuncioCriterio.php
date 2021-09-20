<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class valoracionAnuncioCriterio
 * @package App\Models
 * @version September 20, 2021, 12:33 am UTC
 *
 * @property \App\Models\Criterio $criterio
 * @property \App\Models\ValoracionAnuncio $valoracionAnuncio
 * @property integer $valoracion_anuncio_id
 * @property integer $criterio_id
 * @property number $valoracion
 */
class valoracionAnuncioCriterio extends Model
{
    use SoftDeletes;

    public $table = 'valoracion_anuncio_criterio';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'valoracion_anuncio_id',
        'criterio_id',
        'valoracion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'valoracion_anuncio_id' => 'integer',
        'criterio_id' => 'integer',
        'valoracion' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'valoracion_anuncio_id' => 'required',
        'criterio_id' => 'required',
        'valoracion' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function criterio()
    {
        return $this->belongsTo(\App\Models\Criterio::class, 'criterio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function valoracionAnuncio()
    {
        return $this->belongsTo(\App\Models\ValoracionAnuncio::class, 'valoracion_anuncio_id');
    }
}

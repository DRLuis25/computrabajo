<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class detalleAnuncio
 * @package App\Models
 * @version August 3, 2021, 11:18 pm UTC
 *
 * @property \App\Models\Anuncio $anuncio
 * @property \App\Models\User $user
 * @property integer $anuncio_id
 * @property integer $user_id
 * @property number $importe
 */
class detalleAnuncio extends Model
{
    use SoftDeletes;

    public $table = 'detalle_anuncio';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'anuncio_id',
        'user_id',
        'importe',
        'descripcion',
        'dia'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'anuncio_id' => 'integer',
        'user_id' => 'integer',
        'importe' => 'float',
        'descripcion'=> 'string',
        'dia'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'anuncio_id' => 'required',
        'user_id' => 'required',
        'importe' => 'required|numeric',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}

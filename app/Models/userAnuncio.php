<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class userAnuncio
 * @package App\Models
 * @version August 3, 2021, 11:18 pm UTC
 *
 * @property \App\Models\Anuncio $anuncio
 * @property \App\Models\User $user
 * @property integer $user_id
 * @property integer $anuncio_id
 * @property string $descripcion
 * @property number $importe
 * @property string|\Carbon\Carbon $tiempo
 *  @property number $temporal
 */
class userAnuncio extends Model
{
    use SoftDeletes;

    public $table = 'user_anuncio';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'anuncio_id',
        'descripcion',
        'importe',
        'tiempo',
        'temporal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'anuncio_id' => 'integer',
        'descripcion' => 'string',
        'importe' => 'float',
        'tiempo' => 'float',
        'temporal'=> 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'anuncio_id' => 'required',
        'descripcion' => 'required|string|max:255',
        'importe' => 'required|numeric',
        'tiempo' => 'required|numeric',
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
        return $this->belongsTo(\App\Models\modelUser::class, 'user_id');
    }
}

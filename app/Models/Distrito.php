<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Distrito
 * @package App\Models
 * @version August 5, 2021, 3:40 am UTC
 *
 * @property \App\Models\Ciudade $ciudad
 * @property \Illuminate\Database\Eloquent\Collection $anuncios
 * @property integer $ciudad_id
 * @property string $nombre
 */
class Distrito extends Model
{
    use SoftDeletes;

    public $table = 'distritos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'ciudad_id',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ciudad_id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ciudad_id' => 'required',
        'nombre' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ciudad()
    {
        return $this->belongsTo(\App\Models\Ciudad::class, 'ciudad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function anuncios()
    {
        return $this->hasMany(\App\Models\Anuncio::class, 'distrito_id');
    }
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Oficio
 * @package App\Models
 * @version August 3, 2021, 11:15 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $anuncios
 * @property \Illuminate\Database\Eloquent\Collection $userOficios
 * @property string $nombre
 * @property string $descripcion
 */
class Oficio extends Model
{
    use SoftDeletes;

    public $table = 'oficios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string',
        'descripcion' => 'required|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function anuncios()
    {
        return $this->hasMany(\App\Models\Anuncio::class, 'oficio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function userOficios()
    {
        return $this->hasMany(\App\Models\UserOficio::class, 'oficio_id');
    }
}

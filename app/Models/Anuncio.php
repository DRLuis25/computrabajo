<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Anuncio
 * @package App\Models
 * @version August 3, 2021, 11:16 pm UTC
 *
 * @property \App\Models\Ciudade $ciudad
 * @property \App\Models\Departamento $departamento
 * @property \App\Models\Oficio $oficio
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $detalleAnuncios
 * @property \Illuminate\Database\Eloquent\Collection $userAnuncios
 * @property \Illuminate\Database\Eloquent\Collection $valoracionAnuncios
 * @property integer $user_id
 * @property integer $oficio_id
 * @property integer $departamento_id
 * @property integer $ciudad_id
 * @property string $titulo
 * @property number $pago_propuesto_min
 * @property number $pago_propuesto_max
 * @property string $estado
 * @property boolean $ver_email
 * @property boolean $ver_celular
 * @property boolean $ver_direccion
 */
class Anuncio extends Model
{
    use SoftDeletes;

    public $table = 'anuncios';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'oficio_id',
        'departamento_id',
        'ciudad_id',
        'titulo',
        'pago_propuesto_min',
        'pago_propuesto_max',
        'estado',
        'ver_email',
        'ver_celular',
        'ver_direccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'oficio_id' => 'integer',
        'departamento_id' => 'integer',
        'ciudad_id' => 'integer',
        'titulo' => 'string',
        'descripcion' => 'string',
        'pago_propuesto_min' => 'float',
        'pago_propuesto_max' => 'float',
        'estado' => 'string',
        'ver_email' => 'boolean',
        'ver_celular' => 'boolean',
        'ver_direccion' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'oficio_id' => 'required',
        'departamento_id' => 'required',
        'ciudad_id' => 'required',
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string|max:255',
        'pago_propuesto_min' => 'required|numeric',
        'pago_propuesto_max' => 'required|numeric',
        'estado' => 'required|string|max:1',
        'ver_email' => 'required|boolean',
        'ver_celular' => 'required|boolean',
        'ver_direccion' => 'required|boolean',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function departamento()
    {
        return $this->belongsTo(\App\Models\Departamento::class, 'departamento_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function oficio()
    {
        return $this->belongsTo(\App\Models\Oficio::class, 'oficio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detalleAnuncios()
    {
        return $this->hasMany(\App\Models\detalleAnuncio::class, 'anuncio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function userAnuncios()
    {
        return $this->hasMany(\App\Models\userAnuncio::class, 'anuncio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function valoracionAnuncios()
    {
        return $this->hasMany(\App\Models\valoracionAnuncio::class, 'anuncio_id');
    }
}

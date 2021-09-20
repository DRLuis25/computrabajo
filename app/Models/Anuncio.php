<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Anuncio
 * @package App\Models
 * @version September 20, 2021, 12:35 am UTC
 *
 * @property \App\Models\Ciudade $ciudad
 * @property \App\Models\Departamento $departamento
 * @property \App\Models\Distrito $distrito
 * @property \App\Models\Oficio $oficio
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $detalleAnuncios
 * @property \Illuminate\Database\Eloquent\Collection $userAnuncios
 * @property \Illuminate\Database\Eloquent\Collection $valoracionAnuncios
 * @property integer $user_id
 * @property integer $oficio_id
 * @property integer $departamento_id
 * @property integer $ciudad_id
 * @property integer $distrito_id
 * @property string $titulo
 * @property string $descripcion
 * @property string|\Carbon\Carbon $fecha_expiracion
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
        'distrito_id',
        'titulo',
        'descripcion',
        'fecha_expiracion',
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
        'distrito_id' => 'integer',
        'titulo' => 'string',
        'descripcion' => 'string',
        'fecha_expiracion' => 'datetime',
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
        'distrito_id' => 'required',
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'fecha_expiracion' => 'required',
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
    public function getestadoAnuncioAttribute()
    {
        switch ($this->estado) {
            case '0':
                return 'INACTIVO';
            case '1':
                return 'EN PROCESO';
            case '2':
                return 'FINALIZADO';
            default:
                return 'NN';
        }
    }

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
    public function distrito()
    {
        return $this->belongsTo(\App\Models\Distrito::class, 'distrito_id');
    }
    public function getubicacionAttribute()
    {
        return "asd";
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
        return $this->hasMany(\App\Models\DetalleAnuncio::class, 'anuncio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function userAnuncios()
    {
        return $this->hasMany(\App\Models\UserAnuncio::class, 'anuncio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function valoracionAnuncios()
    {
        return $this->hasMany(\App\Models\ValoracionAnuncio::class, 'anuncio_id');
    }
    public function colaboradores()
    {
        return $this->belongsToMany(\App\User::class, 'user_anuncio');
    }
}

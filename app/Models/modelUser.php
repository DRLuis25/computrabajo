<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class modelUser
 * @package App\Models
 * @version August 4, 2021, 3:20 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $anuncios
 * @property \Illuminate\Database\Eloquent\Collection $detalleAnuncios
 * @property \Illuminate\Database\Eloquent\Collection $userAnuncios
 * @property \Illuminate\Database\Eloquent\Collection $userOficios
 * @property string $name
 * @property string $apellidos
 * @property string $direccion
 * @property string $celular
 * @property string|\Carbon\Carbon $fecha_nacimiento
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $acerca_de_mi
 * @property string $experiencia
 * @property number $calificacion_empleador
 * @property number $calificacion_colaborador
 * @property string $remember_token
 */
class modelUser extends Model
{
    use SoftDeletes;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'apellidos',
        'direccion',
        'celular',
        'fecha_nacimiento',
        'email',
        'email_verified_at',
        'password',
        'acerca_de_mi',
        'experiencia',
        'calificacion_empleador',
        'calificacion_colaborador',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'apellidos' => 'string',
        'direccion' => 'string',
        'celular' => 'string',
        'fecha_nacimiento' => 'datetime',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'acerca_de_mi' => 'string',
        'experiencia' => 'string',
        'calificacion_empleador' => 'float',
        'calificacion_colaborador' => 'float',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'apellidos' => 'nullable|string|max:255',
        'direccion' => 'nullable|string|max:255',
        'celular' => 'nullable|string|max:255',
        'fecha_nacimiento' => 'nullable',
        'email' => 'required|string|max:255',
        'email_verified_at' => 'nullable',
        'password' => 'required|string|max:255',
        'acerca_de_mi' => 'required|string|max:255',
        'experiencia' => 'required|string|max:255',
        'calificacion_empleador' => 'required|numeric',
        'calificacion_colaborador' => 'required|numeric',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function anuncios()
    {
        return $this->hasMany(\App\Models\Anuncio::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detalleAnuncios()
    {
        return $this->hasMany(\App\Models\DetalleAnuncio::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function userAnuncios()
    {
        return $this->hasMany(\App\Models\UserAnuncio::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function userOficios()
    {
        return $this->hasMany(\App\Models\UserOficio::class, 'user_id');
    }
    public function getFullNameAttribute()
    {
        return $this->apellidos.' '.$this->name;
    }
}

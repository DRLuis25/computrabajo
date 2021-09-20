<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Criterio
 * @package App\Models
 * @version September 20, 2021, 12:33 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $valoracionAnuncioCriterios
 * @property string $descripcion
 */
class Criterio extends Model
{
    use SoftDeletes;

    public $table = 'criterios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descripcion' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function valoracionAnuncioCriterios()
    {
        return $this->hasMany(\App\Models\ValoracionAnuncioCriterio::class, 'criterio_id');
    }
}

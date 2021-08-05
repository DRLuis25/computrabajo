<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propuestas extends Model
{
    protected $table='user_anuncio';
    protected $primaryKey='id';
    public $timestamps=false;
    use SoftDeletes; //Implementamos
    protected $dates = ['deleted_at']; //Registramos la nueva columna

    protected $fillable = [
        'id', 'user_id', 'anuncio_id','descripcion','importe','tiempo','unidad_tiempo',
    ];

    public function Anuncio(){
        return $this->belongsTo(\App\Models\Anuncio::class, 'anuncio_id');
    }
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}

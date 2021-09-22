<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputrabajoTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('ciudades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departamento_id');
            $table->text('nombre');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('departamento_id')->references('id')->on('departamentos');
        });
        Schema::create('distritos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ciudad_id');
            $table->text('nombre');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
        });
        Schema::create('oficios', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->text('descripcion');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('user_oficio', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('oficio_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('oficio_id')->references('id')->on('oficios');
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); //El que publica el anuncio
            $table->unsignedBigInteger('oficio_id');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('ciudad_id');
            $table->unsignedBigInteger('distrito_id');
            $table->string('titulo');
            $table->longText('descripcion');
            $table->timestamp('fecha_expiracion');
            $table->double('pago_propuesto_min');
            $table->double('pago_propuesto_max');
            $table->char('estado',1);
            $table->boolean('ver_email');
            $table->boolean('ver_celular');
            $table->boolean('ver_direccion');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('oficio_id')->references('id')->on('oficios');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('distrito_id')->references('id')->on('distritos');
            $table->timestamps();
            $table->softDeletes();
        });
        //User-anuncio: los que postulan
        Schema::create('user_anuncio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('anuncio_id');
            $table->string('descripcion');
            $table->double('importe');
            $table->double('tiempo')->default(1); // numero días?
            $table->char('unidad_tiempo',1)->default('1');//1: dias (temporal)
            $table->BigInteger('temporal')->default('1');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('anuncio_id')->references('id')->on('anuncios');
            $table->timestamps();
            $table->softDeletes();
        });
        //Los que se aceptan para el anuncio
        Schema::create('detalle_anuncio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anuncio_id');
            $table->unsignedBigInteger('user_id'); //El que postula el anuncio
            $table->double('importe');
            $table->string('descripcion');
            $table->BigInteger('dia');
            $table->foreign('anuncio_id')->references('id')->on('anuncios');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('criterios', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamps();
            $table->softDeletes();
        });
        //Valoracion cuando se finaliza el anuncio
        Schema::create('valoracion_anuncios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anuncio_id');
            $table->char('estado_finalizado',1);
            $table->boolean('a_tiempo')->default(true);
            $table->string('comentario')->nullable();
            $table->foreign('anuncio_id')->references('id')->on('anuncios');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('valoracion_anuncio_criterio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('valoracion_anuncio_id');
            $table->unsignedBigInteger('criterio_id');
            $table->double('valoracion');
            $table->foreign('valoracion_anuncio_id')->references('id')->on('valoracion_anuncios');
            $table->foreign('criterio_id')->references('id')->on('criterios');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computrabajo_tables');
    }
}

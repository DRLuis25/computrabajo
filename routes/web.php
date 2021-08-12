<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin.home');

Route::get('/anuncio/misanuncios','AnuncioController@index')->name('anuncio.misanuncios');
Route::get('/anuncio/finalizar/{id}','AnuncioController@finalizar')->name('anuncio.finalizar');
Route::post('/anuncio/finalizar/valoracion','AnuncioController@valoracion')->name('anuncio.valoracion');
Route::post('/anuncio/finalizar/final','AnuncioController@final')->name('anuncio.final');

Route::get('/publicacion/{id}','PublicacionController@comienzo')->name('publicacion.comienzo');

Route::get('/anuncio/publicar','AnuncioController@publicar')->name('anuncio.publicaranuncio');
Route::post('/anuncio/guardar','AnuncioController@guardaranuncio')->name('anuncio.guardaranuncio');
Route::get('/anuncio/editaranuncio/{id}','AnuncioController@editaranuncio')->name('anuncio.editaranuncio');

// Mostrar Datos
Route::get('getCiudad/{idDepartamento}', 'DatosController@listarCiudades');

Route::get('getDistrito/{idCiudad}', 'DatosController@listarDistritos');

/*rutas Jhan */
Route::resource('contactarEmpleador', 'PropuestasController');
//Route::get('contactarEmpleador/{id}', 'PropuestaController@probar' );
/*Fin rutas Jhan */
/*rutas Miguel */
Route::resource('filtros', 'FiltrosController');
/*Fin rutas Miguel */

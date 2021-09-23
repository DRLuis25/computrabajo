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
Route::get('/admin/historial/{id}', 'HistorialControler@index')->name('admin.historial');
Route::get('/admin/chistorial/{id}', 'ChistorialController@index')->name('admin.chistorial');
Route::get('/admin/editar/{id}', 'EditarController@index')->name('admin.editar');
Route::put('/admin/edituser/{id}', 'EditarController@editaralusuario')->name('admin.actualizar');
Route::get('/admin/rdiarios/{mes}/{dia}', 'RdiariosController@index')->name('admin.rdiarios');
Route::get('/admin/rmensuales/{mes}', 'RdiariosController@mensual')->name('admin.mensuales');
Route::post('/admin/usuarios/{id}', 'UserController@desactivar')->name('admin.eliminar');

Route::get('/anuncio/misanuncios','AnuncioController@index')->name('anuncio.misanuncios');
Route::get('/anuncio/finalizar/{id}','AnuncioController@finalizar')->name('anuncio.finalizar');
Route::post('/anuncio/finalizar/valoracion','AnuncioController@valoracion')->name('anuncio.valoracion');
Route::post('/anuncio/finalizar/final','AnuncioController@final')->name('anuncio.final');

//Ruta Jai ver propuestas
Route::get('/publicacion/{id}','PublicacionController@comienzo')->name('publicacion.comienzo');
Route::get('/publicacion/contrato/{id}/{id2}/{id3}/{id4}/{id5}','PublicacionController@contrato')->name('contrato');
Route::get('/publicacion','PublicacionController@contratito')->name('contratito');
// Ruta para postulaciones 
Route::resource('postulacion', 'PostulacionController');

Route::get('/anuncio/publicar','AnuncioController@publicar')->name('anuncio.publicaranuncio');
Route::post('/anuncio/guardar','AnuncioController@guardaranuncio')->name('anuncio.guardaranuncio');
Route::get('/anuncio/editaranuncio/{id}','AnuncioController@editaranuncio')->name('anuncio.editaranuncio');
Route::put('/anuncio/updateanuncio/{id}','AnuncioController@updateanuncio')->name('anuncio.update');

// Mostrar Datos
Route::get('getCiudad/{idDepartamento}', 'DatosController@listarCiudades');
Route::get('getDistrito/{idCiudad}', 'DatosController@listarDistritos');


//Rutas Ricardo
Route::resource('perfilUsuario', 'UserController');
Route::resource('perfilPassword', 'PerfilController');


/*rutas Jhan */
Route::resource('contactarEmpleador', 'PropuestasController');
//Route::get('contactarEmpleador/{id}', 'PropuestaController@probar' );
/*Fin rutas Jhan */


/*rutas Miguel */
Route::resource('filtros', 'FiltrosController');
/*Fin rutas Miguel */

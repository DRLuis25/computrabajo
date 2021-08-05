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
<<<<<<< HEAD



Route::get('/anuncio/publicar','AnuncioController@publicar')->name('anuncio.publicaranuncio');
Route::get('/anuncio/editaranuncio/{id}','AnuncioController@editaranuncio')->name('anuncio.editaranuncio');

/*rutas Jhan */
Route::resource('contactarEmpleador', 'PropuestasController');
/*Fin rutas Jhan */
=======
>>>>>>> ca363e60ed1d92867abfda2d520fe02620e24754

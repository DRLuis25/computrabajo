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

Route::get('/anuncio/finalizar',function ()
{
    return view('anuncio.finalizar');
})->name('anuncio.finalizar');
Route::get('/anuncio/finalizar/valoracion',function ()
{
    return view('anuncio.valoracion');
})->name('anuncio.valoracion');
Route::post('/anuncio/finalizar/final',function ()
{
    $guardar = request()->all();
    return view('anuncio.final');
})->name('anuncio.final');

Route::get('/anuncio/misanuncios',function ()
{
    return view('anuncio.misanuncios');
})->name('anuncio.misanuncios');

Route::get('/anuncio/publicaranuncio',function ()
{
    return view('anuncio.publicaranuncio');
})->name('anuncio.publicaranuncio');
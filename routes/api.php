<?php

use App\Http\Controllers\API\FiltrosApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('/user')->group(function (){
    Route::post('/login', 'LoginController@login');
});

Route::group([
    'middleware' => 'auth:api'
    ], function() {
    Route::post('/user/logout', 'LoginController@logout');
});
//Temporal para pruebas
Route::resource('anuncios', 'AnuncioAPIController');
Route::post('/anuncios/finalizar-anuncio','AnuncioAPIController@finalizarAnuncio');
Route::apiResource('filtros', 'FiltrosApiController');


Route::apiResource('filtros', 'FiltrosApiController');
Route::apiResource('useranuncio','UserAnuncioAPIController');


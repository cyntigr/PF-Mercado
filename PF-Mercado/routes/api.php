<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('email/{correo}',   'Api\ApiController@email');
Route::get('dni/{dni}'     ,   'Api\ApiController@dniCheck');
Route::get('search/{search}' , 'Api\ApiController@searchMarket');


Route::get('puestos',          'Api\ApiController@marketStall');
Route::get('productos',        'Api\ApiController@products');
Route::get('puesto/{id}',      'Api\ApiController@findMarketStall');
Route::get('producto/{id}',    'Api\ApiController@findProduct');

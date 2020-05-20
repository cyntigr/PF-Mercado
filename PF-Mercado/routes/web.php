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
//Routes home
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

//
Auth::routes();

//Routes profile user
Route::middleware(['auth'])->group(function() {

    Route::prefix('perfil')->group(function(){
        Route::get('/ver', 'Cliente\PerfilController@vista')->name('perfil');
        Route::post('/editar', 'Cliente\PerfilController@edit')->name('perfil.edit');
        Route::post('/borrar', 'Cliente\PerfilController@delete')->name('perfil.delete');
    });
});

//Routes market stall
Route::prefix('puesto')->group(function(){
    Route::get('/ver', 'Puesto\PuestoController@view')->name('puesto');
    Route::get('/producto', 'Puesto\PuestoController@viewBuy')->name('puesto.producto');

});



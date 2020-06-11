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
Route::get('/',     'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

//
Auth::routes();

//Routes profile user
Route::middleware(['auth'])->group(function() {
    Route::prefix('perfil')->group(function(){
        Route::get('/ver',      'Cliente\PerfilController@view')->name('perfil');
        Route::post('/editar',  'Cliente\PerfilController@edit')->name('perfil.edit');
        Route::post('/borrar',  'Cliente\PerfilController@delete')->name('perfil.delete');
    });
});

//Routes client
Route::middleware(['auth','type:client'])->group(function() {
    Route::prefix('pedido')->group(function(){
        Route::get('/ver',     'Cliente\PedidoController@orders')->name('pedidos');
        Route::get('/cesta',   'Cliente\PedidoController@pendingOrders')->name('pedido.cesta');
        Route::get('/borrar',  'Cliente\PedidoController@deleteOrder')->name('pedido.delete');
        Route::post('/pagar',  'Cliente\PedidoController@payOrder')->name('pedido.pay');
    });
});    

//Routes market stall
Route::prefix('puesto')->group(function(){
    Route::get('/ver',              'Puesto\PuestoController@view')->name('puesto');
    Route::post('/ver/busqueda',    'Puesto\PuestoController@searchMarketStall')->name('puesto.search');
    Route::get('/favorito',         'Puesto\PuestoController@favorito')
        ->middleware(['auth','type:client'])->name('puesto.favourite');
    Route::get('/favorito/borrar',  'Puesto\PuestoController@deleteFavorito')
        ->middleware(['auth','type:client'])->name('favorito.delete');
    Route::get('/favoritos',        'Puesto\PuestoController@viewFavourite')
        ->middleware(['auth','type:client'])->name('favourites');
});

//Routes product
Route::prefix('producto')->group(function(){
    Route::get('/ver',      'Producto\ProductoController@viewBuy')->name('producto');
    Route::post('/anadir',  'Producto\ProductoController@add')
        ->middleware(['auth','type:client'])->name('producto.add');
});

//Routes admin
Route::middleware(['auth','type:admin'])->group(function() {
    Route::prefix('administrar')->group(function(){
        Route::get('/usuarios',        'Admin\AdminController@viewUsers')->name('usuarios');
        Route::post('/tipo',           'Admin\AdminController@changeType')->name('usuario.tipo');
        Route::get('/borra/usuario',   'Admin\AdminController@deleteUser')->name('usuario.delete');
        Route::get('/puestos',         'Admin\AdminController@viewMarketStall')->name('puestos');
        Route::get('/borra/puesto',    'Admin\AdminController@deleteMarketStall')->name('puesto.delete');
        Route::get('/productos',       'Admin\AdminController@viewProducts')->name('productos');
        Route::get('/borra/producto',  'Admin\AdminController@deleteProduct')->name('producto.delete');
    });
    //Command for create storage link of the photos
    Route::get('/storage-link', function(){
        Artisan::call('storage:link');
    });
});

//Routes seller
Route::middleware(['auth','type:seller'])->group(function() {
    Route::prefix('ventas')->group(function(){
        Route::get('/pedidos',           'Vendedor\VendedorController@viewOrders')->name('pedidos.view');
        Route::get('/realizadas',        'Vendedor\VendedorController@viewOrderSend')->name('pedidos.send');
        Route::post('/completadas',      'Vendedor\VendedorController@orderSend')->name('pedido.send');
        Route::get('/puestos',           'Vendedor\VendedorController@viewMarketStall')->name('puestos.view');
        Route::get('/puesto/nuevo',      'Vendedor\VendedorController@addMarketStall')->name('puesto.add');
        Route::get('/puesto/borrar',     'Vendedor\VendedorController@deleteMarketStall')->name('puestos.delete');
        Route::post('/puesto/guardar',   'Vendedor\VendedorController@saveMarketStall')->name('puesto.save');
        Route::get('/producto/anadir',   'Vendedor\VendedorController@newProduct')->name('producto.new');
        Route::post('/producto/guardar', 'Vendedor\VendedorController@saveProduct')->name('producto.save');
        Route::get('/producto/borrar',   'Vendedor\VendedorController@deleteProduct')->name('productos.delete');
        Route::post('/stock',            'Vendedor\VendedorController@changeStock')->name('producto.stock');
        Route::get('/ayuda',             'Vendedor\VendedorController@viewHelp')->name('help');
    });
});

Route::fallback(function() {return view('error404') ;});



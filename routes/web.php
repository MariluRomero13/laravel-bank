<?php

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
Route::get('pruebas','CustomerController@pruebas');
Route::get('/cliente-dashboard','CustomerController@dashboardView');
Route::get('/cliente-tarjetas','CustomerController@tarjetasView');
Route::get('/cliente-creditos','CustomerController@creditosView');
Route::get('/cliente-prestamos','CustomerController@prestamosView');
Route::get('/cliente-buró','CustomerController@buroView');

Route::get('/', 'ViewController@welcome');
Route::resource('/usuarios', 'UserController')->except(['edit', 'destroy']);
Route::get('usuarios-editar/{id}', 'UserController@edit');
Route::get('users-destroy/{id}', 'UserController@destroy');

Route::resource('/clientes', 'CustomerController')->except(['edit', 'destroy', 'show']);
Route::get('/clientes/editar/{id}', 'CustomerController@edit');
Route::get('/clientes/detalles/{id}', 'CustomerController@show');
Route::get('delete-customers/{id}', 'CustomerController@destroy');
Route::post('/searchClient', 'CustomerController@searchClient');

Route::resource('/direcciones', 'AddressController')->except(['edit', 'destroy', 'create']);
Route::get('/clientes/registrar/direcciones/{id}', 'AddressController@create');
Route::get('/clientes/editar/direcciones/{id}', 'AddressController@edit');

Route::resource('/instituciones', 'PlaceController')->except(['show', 'destroy']);
Route::get('institucion-editar/{id}', 'PlaceController@edit');

Route::resource('/creditos', 'CreditController')->except(['edit', 'destroy']);
Route::get('creditos-editar/{id}', 'CreditController@edit');
Route::get('creditos-destroy/{id}', 'CreditController@destroy');
Route::get('creditos-behavior/{id}', 'CreditController@behavior');
Route::get('tarjetas-cliente', 'CustomerController@getCardsByCustomer');


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
    //        // Uses Auth Middleware
    //    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

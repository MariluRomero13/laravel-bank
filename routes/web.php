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

Route::get('/', 'ViewController@welcome');
Route::resource('/usuarios', 'UserController')->except(['edit', 'destroy']);
Route::get('usuarios-editar/{id}', 'UserController@edit');
Route::get('users-destroy/{id}', 'UserController@destroy');
Route::resource('/clientes', 'CustomerController');
Route::resource('/instituciones', 'PlaceController');
Route::get('/instituciones/{id}','PlaceController@destroy');
Route::get('users/destroy/{id}', 'UserController@destroy');
Route::post('/searchClient', 'CustomerController@searchClient');
Route::resource('/creditos', 'CreditController')->except(['edit', 'destroy']);
Route::get('creditos-editar/{id}', 'CreditController@edit');
Route::get('creditos-destroy/{id}', 'CreditController@destroy');
Route::get('creditos-behavior/{id}', 'CreditController@behavior');
Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
    //        // Uses Auth Middleware
    //    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

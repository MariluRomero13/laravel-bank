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
Route::resource('/usuarios', 'UserController');
Route::resource('/clientes', 'CustomerController');
Route::get('users/destroy/{id}', 'UserController@destroy');
Route::group(['middleware' => 'auth'], function () {
    Route::post('/storeuser', 'UserController@store');
    //    Route::get('/link1', function ()    {
    //        // Uses Auth Middleware
    //    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

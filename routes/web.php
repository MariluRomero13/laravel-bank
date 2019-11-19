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

Route::get('/', 'ViewController@index')->name('welcome');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('customers', 'CustomerController');
Route::resource('address', 'AddressController');
Route::resource('loans', 'LoanController');
Route::resource('payments', 'PaymentController');
Route::resource('credits-bureaus', 'CreditBureauController');
Route::resource('messages', 'MessageController');
Route::resource('credits', 'CreditController');
Route::resource('cards', 'CardController');

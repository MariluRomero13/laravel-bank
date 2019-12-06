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


Route::get('/cliente-tarjetas', 'CustomerController@tarjetasView');
Route::get('/cliente-creditos', 'CustomerController@creditosView');
Route::get('/cliente-prestamos', 'CustomerController@prestamosView');
Route::get('/cliente-buró', 'CustomerController@buroView');
Route::get('/cliente-pagos/{id}', 'CustomerController@pagosView');

Route::get('/', 'ViewController@welcome');
Route::resource('/usuarios', 'UserController')->except(['edit', 'destroy']);
Route::get('usuarios-editar/{id}', 'UserController@edit');
Route::get('users-destroy/{id}', 'UserController@destroy');

Route::resource('/pagos', 'PaymentController');
Route::get('/pagos', 'PaymentController@index');
Route::get('/pagos-detalles/{id}', 'PaymentController@show');
Route::get('/pay/{id}/{loan_id}', 'PaymentController@pay');



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

Route::resource('/tarjetas', 'CardController')->except(['destroy']);
Route::get('delete-cards/{card_number}', 'CardController@destroy');

Route::resource('/creditos', 'CreditController')->except(['edit', 'destroy']);
Route::get('creditos-editar/{id}', 'CreditController@edit');
Route::get('creditos-destroy/{id}', 'CreditController@destroy');
Route::get('creditos-behavior/{id}', 'CreditController@behavior');
Route::get('tarjetas-cliente', 'CustomerController@getCardsByCustomer');


Route::resource('/buro-credito', 'CreditBureauController')->only(['index']);
Route::get('/buro-credito-mensajes/{id}', 'CreditBureauController@messageView');
Route::get('/buro-credito-reportes/{id}', 'CreditBureauController@reportView');
Route::get('/buro-destroy/{id}', 'CreditBureauController@destroy');
Route::post('/registrar-mensaje', 'CreditBureauController@addMessages');

Route::get('/buscar-cliente', 'CreditBureauController@searchClientView');
Route::post('/search-buro-customers', 'CreditBureauController@searchBuroCustomer');
Route::get('/generar-reporte/{id}', 'CreditBureauController@generateReport');
Route::get('/print-pdf/{id}', 'CreditBureauController@exportPDF');

Route::resource('/prestamos', 'LoanController')->only(['index', 'create', 'store']);
Route::get('/show-loans-view', 'LoanController@showLoansView');
Route::get('/tabla-amortizacion/{payment_type}/{i}/{loan_amount}/{years_to_pay}', 'LoanController@tablaAmortizacion');
Route::get('/detalles-pagos/{id}', 'LoanController@detallesPagos');
Route::get('/print-pdf-loan/{id}', 'LoanController@exportPDF');
Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
    //        // Uses Auth Middleware
    //    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

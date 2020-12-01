<?php

use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Auth; 
 
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
    return view('auth.login');
}); 

// Despues del @ pongo el metodo que quiero
// IngresosController viene desde el controller
// Con 'php artisan route:list' puedo ver las rutas disponibles
// Route::get('/ingresos', 'IngresosController@index');
// Route::get('/ingresos/create', 'IngresosController@create' );

// Con esto hace lo mismo que " Route::get('/ingresos', 'IngresosController@index'); " pero con todos los metodos
Auth::routes();

// middleware('auth') -> para que el login funcione
Route::resource('ingresos', 'IngresosController')->middleware('auth');
Route::resource('categoriasing', 'CategoriasIngController')->middleware('auth');
Route::resource('egresos', 'EgresosController')->middleware('auth');
Route::resource('itemsegresos', 'ItemsEgresosController')->middleware('auth');
Route::resource('balance', 'BalanceController')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

 
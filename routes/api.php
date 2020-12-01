<?php

use App\Http\Controllers\IngresosController;
use App\Ingresos;
use Illuminate\Http\Request;
//use Illuminate\Routing\Route;
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
 

Route::resource('ingresos','ApiIngresosController')->except(['create','edit']); 

Route::resource('egresos','ApiEgresosController')->except(['create','edit']); 

Route::resource('categorias','ApiCategoriasIngController')->except(['create','edit']);

Route::resource('itemsegresos','ApiItemsEgresosController')->except(['create','edit']);
                                           
Route::get('subcategorias', 'ApiSubcategoriasController@index'); 


// Route::get('categorias', 'ApiCategoriasIngController@index'); 
// Route::post('categorias', 'ApiCategoriasIngController@store'); 
// Route::get('categorias/{id}', 'ApiCategoriasIngController@show'); 
// Route::delete('categorias/{id}', 'ApiCategoriasIngController@destroy'); 
// Route::put('categorias/{categoria}', 'ApiCategoriasIngController@update'); 
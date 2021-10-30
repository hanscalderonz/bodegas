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

Route::resource('productos', '\App\Http\Controllers\ProductosController');
Route::get('/productos', '\App\Http\Controllers\ProductosController@index')->name('productos.index');
Route::get('/productoslista', '\App\Http\Controllers\ProductosController@lista')->name('productos.lista');
Route::get('/productos/{producto}', '\App\Http\Controllers\ProductosController@compras')->name('productos.compras');
Route::patch('/productoscomprar/{producto}', '\App\Http\Controllers\ProductosController@comprar')->name('productos.comprar');

Route::resource('usuarios', '\App\Http\Controllers\UsuariosController');
Route::get('/usuarios', '\App\Http\Controllers\UsuariosController@index')->name('usuarios.index');

Route::view('/', 'auth/login')->name('index')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

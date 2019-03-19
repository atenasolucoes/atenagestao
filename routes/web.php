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

Route::get('/', function () {
	return view('welcome');
});

Route::prefix('index')->group(function(){
	Route::get('/',function(){
		return view('template');
	});
});


Route::prefix('cadastros')->group(function(){
	Route::name('cadastros.')->group(function () {
		Route::get('clientes','ClientesController@index')->name('clientes');
	});
});




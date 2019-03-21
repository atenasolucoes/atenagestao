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
Route::prefix('/')->group(function(){
	Route::get('',function(){
		return view('template');
	})->name('index');
});


Route::prefix('cadastros')->group(function(){
	Route::prefix('clientes')->group(function(){
		Route::name('cadastros.')->group(function () {
			Route::get('/','ClientesController@index')->name('clientes');
			Route::get('novo','ClientesController@cadastrar')->name('novocliente');
			Route::get('{id}','ClientesController@excluir')->name('excluircliente');

		});
	});
});




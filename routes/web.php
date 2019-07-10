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
Route::prefix('/')->group(function () {
	Route::view('', 'login');
	Route::post('index', 'loginController@post_login')->name('login');
	Route::get('sair', 'loginController@sair')->name('sair');
});

Route::middleware(['visitante'])->group(function () {
	Route::get('index', function () {
		return view('template');
	})->name('index');
	Route::prefix('cadastros')->group(function () {
		Route::redirect('/', '/', 301);

		Route::prefix('clientes')->group(function () {
			Route::name('cadastros.')->group(function () {
				Route::get('/{pre?}', 'ClientesController@index')->name('clientes');
				Route::post('novo', 'ClientesController@cadastrar')->name('novocliente');
				Route::get('{id}/ficha', 'ClientesController@ficha')->name('ficha');
				Route::get('{id}/ficha/editar', 'ClientesController@editar')->name('editarficha');
				Route::get('{id}/ficha/excluir', 'ClientesController@excluir')->name('excluircliente');
			});
		});

		Route::prefix('servicos')->group(function () {
			Route::name('cadastros.')->group(function () {
				Route::get('/', 'ServicosController@index')->name('servicos');
				Route::get('novo', 'ServicosController@cadastrar')->name('novoservico');
				Route::get('{id}/verservico', 'ServicosController@verservico')->name('verservico');
				Route::get('{id}/verservico/editar', 'ServicosController@editar')->name('editarservico');
				Route::get('{id}/verservico/excluir', 'ServicosController@excluir')->name('excluirservico');
			});
		});
	});

	Route::prefix('orcamentos')->group(function () {
		Route::redirect('/', '/', 301);
		Route::name('orcamento.')->group(function () {
			Route::get('/', 'OrcamentoController@index')->name('orcamentos');
			Route::get('/adicionar', 'OrcamentoController@cadastrar')->name('adicionar');
			Route::post('/adicionar', 'OrcamentoController@novo')->name('adicionarnovo');
		});
	});
});

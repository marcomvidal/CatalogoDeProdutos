<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Rotas do Laravel
Route::auth();
Route::get('/home', 'HomeController@index');

// Rotas de negócio
Route::get('/', function () {
    return redirect('/produtos');
});
Route::resource('produtos', 'ProdutosController');
Route::get('adicionar-produto', 'ProdutosController@create');
Route::get('produtos/{id}/editar', 'ProdutosController@edit');
Route::post('produtos/buscar', 'ProdutosController@buscar');
Route::get('produtos/{id}/detalhes', 'ProdutosController@show');
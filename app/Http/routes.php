<?php

// Rotas do Laravel
Route::auth();
Route::get('/home', 'HomeController@index');

// Página Inicial
Route::group(['prefix' => ''], function()
{
    Route::get('',                  ['as' => 'index',   'uses' => 'ProdutosController@index']);
});

// Páginas de Produtos
Route::group(['as' => 'produtos.', 'prefix' => 'produtos'], function()
{
    Route::get('',                  ['as' => 'index',   'uses' => 'ProdutosController@index']);
    Route::post('',                 ['as' => 'store',   'uses' => 'ProdutosController@store']);
    Route::get('buscar',            ['as' => 'buscar',  'uses' => 'ProdutosController@buscar']);
    Route::get('adicionar',         ['as' => 'create',  'uses' => 'ProdutosController@create']);
    Route::get('detalhes/{id}',     ['as' => 'show',    'uses' => 'ProdutosController@show']);
    Route::get('editar/{id}',       ['as' => 'edit',    'uses' => 'ProdutosController@edit']);
    Route::put('{id}',              ['as' => 'update',  'uses' => 'ProdutosController@update']);
    Route::delete('{id}',           ['as' => 'destroy', 'uses' => 'ProdutosController@destroy']);
});

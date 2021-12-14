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

Route::get('/login', function() {
    return 'Página de login';
})->name('login');

// Comando artisan para criar resource: php artisan make:controller <name> --resource
Route::resource('usuarios', 'ResourceController');
Route::resource('produtos', 'ProdutoController');

/*
Route::get('/produtos/{id}/edit', 'ProdutoController@edit')->name('produtos.edit');
Route::get('/produtos/create', 'ProdutoController@create')->name('produtos.create');
Route::get('/produtos/{id}', 'ProdutoController@show')->name('produtos.show');
Route::get('/produtos', 'ProdutoController@index')->name('produtos.index');
Route::post('/produtos', 'ProdutoController@store')->name('produtos.store');
Route::put('/produto/{id}', 'ProdutoController@update')->name('produtos.update');
Route::delete('produto/{id}', 'ProdutoController@destroy')->name('produtos.destroy');*/

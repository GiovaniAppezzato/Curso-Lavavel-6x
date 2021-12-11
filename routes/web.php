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



// ** ===== Conteúdo didático do Curso - ROTAS ===== **

// ** Introdução em rotas ** : 
Route::get('/get', function() {
    return 'Acessando pelo GET (URL, link ...)';
});

Route::post('/post', function() {
    return 'Cadastrar/registrar';
});

Route::put('/put', function() {
    return 'Editar registros';
});

Route::patch('/patch', function() {
    return 'Editar registros parcialmente';
});

// ** Rotas Any e match ** : 
Route::any('/any', function() {
    return 'Permite todos os tipo de verbo HTTP';
});

Route::match(['get', 'post'],'/match', function() {
    return 'Permite APENAS os verbos HTTP especificado (ex: GET E POST)';
});

// ** Rotas com PARÂMETROS ** :
Route::get('/categorias/{categorias}/posts', function($categoria = null) {
        return "Posts da categoria {$categoria}";
});

Route::get('/produtos/{id?}', function($id = null) { // Parâmetro opicional
    return "id do produto - {$id}";
});

// ** Redirect e view: ** :
Route::redirect('/redirect', '/redirectOther');

Route::get('/redirectOther', function() {
    return 'A página que vc acessou te redirecionou para essa aqui';
});

Route::view('/view', 'welcome');

// ** grupo de rotas (middleware, prefix) ** :
Route::get('/login', function() {
    return 'Página de login';
})->name('login');

// Route::middleware([])->group(function() {
//     Route::prefix('admin')->group(function() {
//         Route::namespace('Admin')->group(function() {
//             Route::name('Admin.')->group(function() {

//                 Route::get('/', 'TesteController@teste')->name('dashboard');
//                 Route::get('/produtos', 'TesteController@teste')->name('produtos');
//                 Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
//             });
//         });
//     });
// });

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function() {
    Route::get('/', 'TesteController@teste')->name('dashboard');
    Route::get('/produtos', 'TesteController@teste')->name('produtos');
    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
});
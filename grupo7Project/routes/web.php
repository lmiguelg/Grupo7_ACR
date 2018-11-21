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
use Illuminate\Http\Request;

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});


//rotas para os produtos
Route::get('/addProduct','ProductsController@index');
Route::post('/addProduct','ProductsController@addProduct')->name('products');
Route::get('/addProduct/productDetails/{id}/edit','ProductsController@productDetails');
Route::post('/addProduct/productDetails/{id}/edit', 'ProductsController@productDetailsUpdate');

//Rota para os fonecedores

Route::get('/addFornecedor','FornecedorController@index');
Route::post('/addFornecedor','FornecedorController@addFornecedor')->name('fornecedor');

Route::get('/addFornecedor/{id}', 'FornecedorController@editFornecedor');
Route::post('/addFornecedor/{id}', 'FornecedorController@updateFornecedor')->name('update');

//rota para os clientes

Route::get('/addClient', 'CilentController@index');
Route::post('/addClient', 'CilentController@addClient')->name('client');


//editar utilizadores

Route::get('/editUser', function (){

    $utilizadores = DB::table('users')->get();

    return view('User.user',compact('utilizadores'));

})->name('utilizadores');

Route::get('/editUser/{id}', 'Auth\RegisterController@editaFuncionario');
Route::post('editUser/{id}', 'Auth\RegisterController@updateFuncionario' );

//
Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/dashboard', 'FuncionarioController@__construct')->name('dashboard');

//Route::post('/dashboard', 'FuncionarioController@registoValidate');


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

use Illuminate\Support\Facades\DB;

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});


//rotas para os produtos
Route::get('/addProduct','ProductsController@index');
Route::post('/addProduct','ProductsController@addProduct')->name('products');
Route::get('/addProduct/productDetails/{id}/edit','ProductsController@productDetails');
Route::post('/addProduct/productDetails/{id}/edit', 'ProductsController@productDetailsUpdate');
Route::get('/addProduct/productDetails/{id}/delete','ProductsController@productDelete');

//rotas para vendas

Route::get('/newSale','SalesController@newSale')->name('sales');
//Route::get('/newSale','SalesController@addNewSale');
Route::post('/sales/list','SalesController@addNewSale')->name('salesAdd');



//Rota para os fonecedores

Route::get('/addFornecedor','FornecedorController@index');
Route::post('/addFornecedor','FornecedorController@addFornecedor')->name('fornecedor');

Route::get('/addFornecedor/{id}', 'FornecedorController@editFornecedor');
Route::post('/addFornecedor/{id}', 'FornecedorController@updateFornecedor')->name('update');
Route::get('/addFornecedor/{id}/delete', 'FornecedorController@fornecedorDelete');

//rota para os clientes

Route::get('/addClient', 'ClientController@index');
Route::post('/addClient', 'ClientController@addClient')->name('client');

Route::get('/addClient/{id}', 'ClientController@editClient');


//editar utilizadores

Route::get('/editUser', 'Auth\RegisterController@indice')->name('utilizadores');

Route::get('/editUser/{id}', 'Auth\RegisterController@editaFuncionario');
Route::post('editUser/{id}', 'Auth\RegisterController@updateFuncionario' );

//
Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/gcalendar', 'gCalendarController');
Route::get('/oauth',  'gCalendarController@oauth')->name('oauth');

//Route::get('/dashboard', 'FuncionarioController@__construct')->name('dashboard');

//Route::post('/dashboard', 'FuncionarioController@registoValidate');


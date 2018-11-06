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

Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});


//rotas para os produtos
Route::get('/addProduct','ProductsController@index');
Route::post('/addProduct','ProductsController@addProduct')->name('products');



Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/dashboard', 'FuncionarioController@__construct')->name('dashboard');

//Route::post('/dashboard', 'FuncionarioController@registoValidate');


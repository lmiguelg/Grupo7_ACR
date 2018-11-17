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

//editar utilizadores

Route::get('/editUser', function (){

    $utilizadores = DB::table('users')->get();

    return view('User.user',compact('utilizadores'));



})->name('utilizadores');

Route::get('/editUser/{id}', function ($id){

  //  $funcionario=Auth::user()->DB::find($id);

   $funcionario = Auth::user()->find($id);


    return view('User.edit', compact('funcionario'));

});
Route::post('editUser/{id}', function (Request $request, $id){

    $funcionario = Auth::user()->find($id);

    $funcionario->name = $request->inFuncionarioNome;

    $funcionario->email =$request->inEmail;

    $funcionario->category = $request->inCategory;

    $funcionario->save();

    return redirect()->route('utilizadores');

} );




//Route::get('/dashboard', 'FuncionarioController@__construct')->name('dashboard');

//Route::post('/dashboard', 'FuncionarioController@registoValidate');


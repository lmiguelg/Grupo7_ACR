<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Fornecedor;


class FornecedorController extends Controller
{
    //

    public function index(){

        $fornecedores = DB::table('fornecedors')->get();

        return view('Fornecedores.fornecedores',compact('fornecedores'));
    }


    public function addFornecedor(Request $request){

       $fornecedor= new Fornecedor();

        $fornecedor->nome = $request->inFornecedorNome;

        $fornecedor->nif =$request->inNIF;

        $fornecedor->contacto = $request->inContacto;

        $fornecedor->morada=$request->inMorada;

        $fornecedor->save();

        return redirect(route('fornecedor'));

    }
}

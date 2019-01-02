<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Fornecedors;


class FornecedorController extends Controller
{
    //

    public function index(Request $request){

        $fornecedores = DB::table('fornecedors')->paginate(10);
        if ($request->ajax()) {
            return view('Fornecedores.fornecedoresList',compact('fornecedores'))->render();
        }

        return view('Fornecedores.fornecedores',compact('fornecedores'));
    }


    public function addFornecedor(Request $request){
        \Log::info($request);
       $fornecedor= new Fornecedors();

        $fornecedor->nome = $request->inFornecedorNome;

        $fornecedor->nif =$request->inNIF;

        $fornecedor->contacto = $request->inContacto;

        $fornecedor->morada=$request->inMorada;

        $fornecedor->save();

        $fornecedor = DB::table('fornecedors')->get();

        return response()->json(["success" =>$fornecedor ]);

        //return redirect(route('fornecedor'));

    }


    public function editFornecedor($id){

        $entidadeFornecedor = Fornecedors::find($id);

        return view('Fornecedores.edit', compact('entidadeFornecedor'));


    }

    public function updateFornecedor(Request $request, $id){


        $entidadeFornecedor = Fornecedors::find($id);

        $entidadeFornecedor->nome = $request->inFornecedorNome;

        $entidadeFornecedor->nif =$request->inNIF;

        $entidadeFornecedor->contacto = $request->inContacto;

        $entidadeFornecedor->morada=$request->inMorada;

        $entidadeFornecedor->save();

        return redirect()->route('fornecedor');



    }

    public function fornecedorDelete($id){

        $fornecedor                    = Fornecedors::findOrFail($id);
        $fornecedor->delete();

        return redirect("/addFornecedor")->with('success','true');
}
}

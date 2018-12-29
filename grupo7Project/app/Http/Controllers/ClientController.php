<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Fornecedores;
use Symfony\Component\HttpKernel\Client;


class ClientController extends Controller
{
    //
    public function index(){

        $clients = DB::table('clientes')->paginate(10);

        return view('Client.client', compact('clients'));

    }

    public function addClient(Request $request){

        $client= new Clientes();

        $client->nome = $request->inClientNome;

        $client->nif =$request->inNIF;

        $client->contacto = $request->inContacto;

        $client->morada=$request->inMorada;

        $client->email = $request -> inEmail;

        $client->save();

        $client = DB::table('clientes')->get();

       return response()->json(["success" =>$client ]);

        //return redirect(route('client'));

    }

    public function editClient($id){

        $cliente = Clientes::find($id);

        return view('Client.edit', compact('cliente'));
    }

    public function updateClient(Request $request, $id){

            $client = Clientes::find($id);

        $client->nome = $request->inClienteNome;

        $client->nif =$request->inClienteNif;

        $client->contacto = $request->inClienteContacto;

        $client->morada=$request->inClienteMorada;

        $client->email = $request -> inEmail;

        $client->save();

        return redirect("/addClient");

    }

    public function clientDelete($id){
        $cliente                    = Clientes::findOrFail($id);
        $cliente->delete();

        return redirect("/addClient")->with('success','true');
    }

}

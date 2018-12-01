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

        $clients = DB::table('clientes')->get();
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




    }

}

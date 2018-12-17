<?php

namespace App\Http\Controllers;
use App\Product;
use App\Clientes;
use App\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    //

    public function newSale(){

        $products = Product::get();
        $clients = Clientes::get();
        return view('vSales.createSale',compact('products','clients'));
    }

    public function addNewSale(Request $request){
        $sale = new Sale;
        //echo $request->client_id;
        return response()->json(['success'=>["venda adicionada"]]);
        return view('vSales.createSale',compact('products','clients'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Product;
use App\Clientes;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    //

    public function newSale(){

        $products = Product::get();
        $clients = Clientes::get();
        return view('vSales.createSale',compact('products','clients'));
    }

    public function newSaleAdd(){

        return redirect('/newSale');
    }
}

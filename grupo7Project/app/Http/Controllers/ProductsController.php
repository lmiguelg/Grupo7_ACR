<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index(){

        $products = DB::table('products')->get();

        return view('vProducts.productList',compact('products'));
    }

    public function addProduct(Request $request){

        //Antes ver os produtos é necessário verificar o utilizador
        $product = new Product;

        $product->name = $request->inProductName;

        $product->quantity = $request->inQuantity;

        $product->expiration_date = $request->inExpirationDate;

        $product->price = $request ->inProductPrice;

        $product->save();

        return redirect("/addProduct");

    }
}

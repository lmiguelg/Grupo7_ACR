<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index(){

        $products =Product::get();

        return view('vProducts.productList',compact('products'));
    }

    public function addProduct(Request $request){

        \Log::info($request);
        //Antes ver os produtos é necessário verificar o utilizador
        $product = new Product;

        $product->name              = $request->inProductName;

        $product->quantity          = $request->inQuantity;

        $product->expiration_date   = $request->inExpirationDate;

        $product->price             = $request ->inProductPrice;

        $product->save();

        $products                   = Product::get();

        return response()->json(['success'=>$products,'error'=>"sdasdasd"]);

        //return redirect("/addProduct");

    }

    // //Product details
    public function productDetails($id){

        $product = Product::find($id);

        return view('vProducts.productDetails',compact('product'));
    }

    public function productDetailsUpdate(Request $request, $id){

        $product                    = Product::find($id);

        $inputs                     = $request->all();

        $product->name              = $request->inName;

        $product->quantity          = $request->inQuantity;

        $product->expiration_date   = $request->inExpirationDate;

        $product->price             = $request->inPrice;

        $product->save();

        //\Log::info($inputs);
        //return redirect("/addProduct/productDetails/{$id}/edit");
        return redirect("/addProduct");

    }
}

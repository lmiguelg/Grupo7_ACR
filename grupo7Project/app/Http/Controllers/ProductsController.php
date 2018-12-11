<?php

namespace App\Http\Controllers;

use App\Fornecedors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;


class ProductsController extends Controller
{
    public function index(){

        $products =Product::get();
        $fornecedores = Fornecedors::get();


        return view('vProducts.productList',compact('products', 'fornecedores'));
    }

    public function addProduct(Request $request){

        \Log::info($request);
        //Antes ver os produtos é necessário verificar o utilizador

        $product = new Product;


        $product->name              = $request->inProductName;

        $product->quantity          = $request->inQuantity;

        $product->expiration_date   = $request->inExpirationDate;

        if($request->file('inProduct_photo') != null){
            $file                       = $request->file('inProduct_photo');
            $filename                   = time().'-'.$file->getClientOriginalName();
            $file                       = $file->move('images/product_photos',$filename);
            $product->filepath          = $filename;
        }


        $product->price             = $request ->inProductPrice;

        $product->fornecedor_id     = $request->inFornecedor;


        $fornecedor= Fornecedors::find($request->inFornecedor);


       /*for($i = 0; $i < 70; $i++){

            $product = new Product;

            $product->name              = "prod $i";

            $product->quantity          = "$i";

            $product->expiration_date   = "2018-11-23";

            $product->filepath          = "sadasdiasdasgyudasd";

            $product->price             = "$i";

            $product->save();
       }*/


        $product->save();


        $products                   = Product::get();

        return response()->json(['success'=>[$products,$fornecedor],'error'=>"sdasdasd"]);

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

        //adicionar imagem

        if($request->file('inProduct_photo') != null){
            $file                       = $request->file('inProduct_photo');
            $filename                   = time().'-'.$file->getClientOriginalName();
            $file                       = $file->move('images/product_photos',$filename);
            $product->filepath          = $filename;
        }



        $product->expiration_date   = $request->inExpirationDate;

        $product->price             = $request->inPrice;

        $product->save();

        //\Log::info($inputs);
        //return redirect("/addProduct/productDetails/{$id}/edit");
        return redirect("/addProduct");

    }
    public function productDelete($id){
        $product                    = Product::findOrFail($id);
        $product->delete();

        return redirect("/addProduct")->with('success','true');
    }
}

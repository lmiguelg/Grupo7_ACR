<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Fornecedors;
use App\Http\Resources\ProductListResource;

class ApiController extends Controller
{
    //

    function getProducts (){
        $products =Product::get();

        return ProductListResource::collection($products);
    }
    function getProduct($id){
        $product = Product::findOrFail($id);
        return new ProductListResource($product);
    }

    function addProduct(Request $request){


        //quando for para testar no postman é necessario desativar o midleware do token no ficheiro kernel.php


        //verificar se já existe ou criar um novo
        $product = $request->isMethod('put') ? Product::findOrFail($request->id) : new Product;

        $product->name              = $request->input('name');

        $product->quantity          = $request->input('quantity');

        $product->expiration_date   = $request->input('expiration_date');

        $product->filepath          = "sem imagem";

        $product->price             = $request ->input('price');

        $product->fornecedor_id     = $request->input('fornecedor_id');

        if($product->save()){
            return new ProductListResource($product);
        }

    }
    function deleteProduct($id){
//quando for para testar no postman é necessario desativar o midleware do token no ficheiro kernel.php
        $product = Product::findOrFail($id);

        if($product->delete()){
            return new ProductListResource($product);
        }
    }
}

<?php

namespace App\Http\Controllers;
use App\Product;
use App\Clientes;
use App\Sale;
use App\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class SalesController extends Controller
{
    //

    public function newSale(){

        $products = Product::get();
        $clients = Clientes::get();
        return view('vSales.createSale',compact('products','clients'));
    }

    public function addNewSale(Request $request){
        $sale = new Sale();
        $sale->price = $request->inPrice;
        $sale->cliente_id = $request->client_id;
        $sale->save();

        $saleItem = new SaleItem();

        $saleItem->product_id = 1;
        $saleItem->sale_id = 1;

        $saleItem->save();
        dd("aqui");





        return view('vSales.salesList');
    }

    public function getSales(Request $request){

        $sales = Sale::get();

        return view('vSales.salesList', compact('sales'));

    }

}

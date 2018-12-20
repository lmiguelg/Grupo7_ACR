<?php

namespace App\Http\Controllers;
use App\Product;
use App\Clientes;
use App\Sale;
use App\SaleProduct;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PDF;


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


        $lastSale = Sale::all()->last();



        foreach($request->productList as $prod){

            $saleProduct = new SaleProduct;
            \Log::info($prod['id']);
            $saleProduct->product_id =$prod['id'] ;
            $saleProduct->sale_id = $lastSale->id;
            $saleProduct->save();


        }

        return view('vSales.salesList');
    }

    public function getSales(Request $request){

        $sales = Sale::get();
        $saleProduct = SaleProduct::get();
        $clientes = Clientes::get();
        $produtos = Product::get();


        return view('vSales.salesList', compact('sales','saleProduct','clientes','produtos'));

    }

    public function getpdf(){
        $data = "controller pdf";
        // $pdf = PDF::loadView('pdf', compact('data'));
        // return $pdf->download('invoice.pdf');
        return view('pdf',compact('data'));

    }

}

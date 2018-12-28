<?php

namespace App\Http\Controllers;
use App\Product;
use App\Clientes;
use App\Sale;
use App\SaleProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use PDF;
use Illuminate\Foundation\Auth\User;


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
            //decrementar quantidade do produto
            $product = Product::find($prod['id']);
            $quantidade = $product->quantity;
            $intQuantidade = intval($quantidade);
            $intQuantidade--;
            $product->quantity = strval($intQuantidade);
            $product->save();

            \Log::info($prod['id']);
            $saleProduct->product_id =$prod['id'] ;
            $saleProduct->sale_id = $lastSale->id;
            $saleProduct->save();


        }


        return url("/salesList");
    }

    public function getSales(Request $request){

        $sales = DB::table('sales')->paginate(10);;
        $saleProduct = SaleProduct::get();
        $clientes = Clientes::get();
        $produtos = Product::get();

        if ($request->ajax()) {
            return view('vSales.salesTable', compact('sales','saleProduct','clientes','produtos'))->render();
        }
        return view('vSales.salesList', compact('sales','saleProduct','clientes','produtos'));

    }

    public function getpdf($id){
        $dateInvoice = date("Y/m/d");
        $sale = Sale::find($id);
        $cliente = Clientes::find($sale->cliente_id);
        $saleProducts = SaleProduct::where('sale_id',$sale->id)->get();
        if(empty($saleProducts)){
            $saleProducts = ['data' =>"sem produtos"];
        }
        \Log::info($cliente);
        $products = Product::get();

        $pdf = PDF::loadView('pdf', compact('sale','dateInvoice','cliente','saleProducts','products'));
        //return $pdf->download('fatura.pdf');
        return view('pdf',compact('sale','dateInvoice','cliente','saleProducts','products'));

    }

}

@extends('layouts.app')
@section('content')
    <h1>Create new Sale</h1>

    <div class="divNewSale verticalMenu">
        <div class="divAddedProducts">
            <p class="withBorder">Products selected</p>

        </div>
        <p class="withBorder goBottom">Client selected:</p>
        <p class="withBorder goBottom">Total: </p>

    </div>

    <div class="productListSales verticalMenu">
        <table class="inventoryTable">
            <tr >
                <th id="thTitleInventory" colspan="7">Clients List</th>
            </tr>
            <tr>
                <th>Name</th>
                <th>Nif</th>
                <th>Add</th>
            </tr>

        @foreach($clients as $client)
            <tr class="trSales">
                <td>{{$client->nome}}</td>
                <td>{{$client->nif}}</td>
                <td><button>+</button></td>
            </tr>
        @endforeach
        </table>
    </div>


    <div class="productListSales verticalMenu">
        <table class="inventoryTable">
            <tr >
                <th id="thTitleInventory" colspan="7">Inventory List</th>
            </tr>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Add</th>
            </tr>

        @foreach($products as $product)
            <tr class="trSales">
                <td><img id="imgProduct" src="{{ URL::to('/') }}/images/product_photos/{{ $product->filepath }}"></td>
                <td>{{$product->name}}</td>
                <td><button>+</button></td>
            </tr>
        @endforeach
        </table>
    </div>








@endsection

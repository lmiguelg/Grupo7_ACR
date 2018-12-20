@extends('layouts.app')
@section('content')
    <h1>Create new Sale</h1>



    <div class="divNewSale verticalMenu">
    <form id="formSale" method="POST">
        <div class="divAddedProducts">
            <p class="withBorder">Selected products</p>
            <table class="ulSalesList">
                <tr>
                    <th class="">Product</th>
                    <th class="">Remove</th>
                </tr>


            </table>

        </div>
        <p class="withBorder goBottom">Client selected:</p>
        <p class="pClient goBottom dataSales"></p>
        <p class="withBorder goBottom">Total: </p>
        <p class="pTotal goBottom dataSales"></p>

        <input type="hidden" id="myToken" name="_token" value="{{ csrf_token() }}">
        <input type="submit" id="btnSubmitSale" class="goBottom btnFinalizePurchase btnGeral" value="FINALIZA COMPRA">

    </form>

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
                <td><button onclick="addClientToSale('{{$client->nome}}','{{$client->id}}')">+</button></td>

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
                <td><button onclick="addProductToSale('{{$product->name}}','{{$product->id}}','{{$product->price}}')">+</button></td>
            </tr>
        @endforeach
        </table>

    </div>

<script>

    $("#formSale").on('submit',function (e) {
        e.preventDefault();
        var client_id = $.session.get('clientSelected');
        var productList = JSON.parse($.session.get('arrayProducts'));

        $.ajax({

            type:'POST',
            url:'/newSale',

            data:{

                'client_id': client_id,
                'productList': productList
            },

            datatype:'json',

            success:function(data){

                console.log(data);
            }
        });


        console.log(productList);
        console.log(client_id);

    });





    function addClientToSale(name, id){
        alert(name + id);

        $.session.set('clientSelected', id);

        $.session.set('clientSelectedName', name);

        $('.pClient').html($.session.get('clientSelectedName'));

    }

    function addProductToSale(name, id, price){

        alert(id + " "+name+" " +price);

        var product = {id: id, name: name, price: price};//struct do produto para guardar na sessão

        var products=[];

        if($.session.get('arrayProducts')){

            products = JSON.parse($.session.get('arrayProducts'));

        }
        products.push(product);

        $.session.set('arrayProducts', JSON.stringify(products));


        console.log("ultimo prod: " + JSON.stringify(product));

        $('.ulSalesList').append("<tr class='"+product.id +"'><td class='tdSales'>"+products[products.length - 1].name+
        "</td><td><input type='button' value='X' class='btnRemoveProductSale' onclick='removeProduct("+id+")'></td></tr>");

        total(products);


    }

    function updateDOMSales(products){

        for(var i = 0; i < products.length; i++){
            //nome
            $('.ulSalesList').append("<tr class='"+products[i].id +"'><td class='tdSales'>"+products[i].name+
            "</td><td><input type='button' value='X' class='btnRemoveProductSale' onclick='removeProduct("+products[i].id+")'></td></tr>");
        }
    }

    function total(products){
        var total = 0;
        for(var i = 0; i < products.length; i++){
            total = total + parseFloat(products[i].price);
        }
        $.session.set("Total",total);
        $('.pTotal').html(total);
    }
    function removeProduct(id){
        console.log("poduto: " + id);
        var idDoArray = 0;
        $("."+id).remove();
        var products = JSON.parse($.session.get('arrayProducts'));
        for(var i = 0;i<products.length;i++ ){
            if(products[i].id == id){
                products.pop(id);
            }
        }
        $.session.set('arrayProducts', JSON.stringify(products));
        total(products);
        console.log(products);

    }

</script>

@endsection

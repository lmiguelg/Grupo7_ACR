@extends('layouts.app')
@section('content')
    <h1>Criar nova venda    </h1>



    <div class="divNewSale verticalMenu">
    <form id="formSale" method="POST">
        <div class="divAddedProducts">
            <p class="withBorder">Produtos selecionados</p>
            <table class="ulSalesList">
                <tr>
                    <th class="">Produto</th>
                    <th>Preço</th>
                    <th class="">Remover</th>
                </tr>


            </table>

        </div>
        <p class="withBorder goBottom">Cliente selecionado:</p>
        <p class="pClient goBottom dataSales"></p>
        <p class="withBorder goBottom">Total: </p>
        <p class="pTotal goBottom dataSales"></p>

        <input type="hidden" id="myToken" name="_token" value="{{ csrf_token() }}">
        <input type="submit" id="btnSubmitSale" class="goBottom btnFinalizePurchase btnGeral" value="FINALIZAR COMPRA">

    </form>

    </div>

    <div class="productListSales verticalMenu">
        <table class="inventoryTable">
            <tr >
                <th id="thTitleInventory" colspan="7">Lista de Clientes</th>
            </tr>
            <tr>
                <th>Nome</th>
                <th>Nif</th>
                <th>Adicionar</th>
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
                <th id="thTitleInventory" colspan="7">Inventário</th>
            </tr>
            <tr>
                <th>Imagem</th>
                <th>Produto</th>
                <th>Adicionar</th>
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


    function addClientToSale(name, id){
        //alert(name + id);

        $.session.set('clientSelected', id);

        $.session.set('clientSelectedName', name);

        $('.pClient').html(sessionStorage.getItem('clientSelectedName'));

    }

    function addProductToSale(name, id, price){

        //alert(id + " "+name+" " +price);

        var product = {id: id, name: name, price: price};//struct do produto para guardar na sessão

        var products=[];

        if(sessionStorage.getItem('arrayProducts')){

            products = JSON.parse(sessionStorage.getItem('arrayProducts'));

        }
        products.push(product);

        $.session.set('arrayProducts', JSON.stringify(products));


        console.log("ultimo prod: " + JSON.stringify(product));

        $('.ulSalesList').append("<tr class='prodDelete "+product.id +"'><td class='tdSales'>"+products[products.length - 1].name+
        "</td><td>"+products[products.length - 1].price+"</td><td><input type='button' value='X' class='btnRemoveProductSale' onclick='removeProduct("+id+")'></td></tr>");

        total(products);


    }

    function updateDOMSales(products){

        for(var i = 0; i < products.length; i++){
            //nome
            $('.ulSalesList').append("<tr class='prodDelete "+products[i].id +"'><td class='tdSales'>"+products[i].name+
            "</td><td>"+products[i].price+"</td><td><input type='button' value='X' class='btnRemoveProductSale' onclick='removeProduct("+products[i].id+")'></td></tr>");
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
        var products = JSON.parse(sessionStorage.getItem('arrayProducts'));
        for(var i = 0;i<products.length;i++ ){
            if(products[i].id == id){
                products.pop(id);
            }
        }
        $.session.set('arrayProducts', JSON.stringify(products));
        total(products);
        console.log(products);

    }

    //anular uma venda e limpar o formulário/ variaveis de sessão
    function resetFormSales(){

        sessionStorage.clear();
        console.log("resetttttttt");

    }

</script>

@endsection

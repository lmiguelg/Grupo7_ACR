
@extends('vProducts.sidebar')
@section('content')

<!--dados passa através do controller na função compact-->

<h1  style="text-align:center">Produto: {{$product->name}}</h1>


<div class="divProdInfoGeral">

    <div class="divImgProduct">
        <img id="imgProduct" src="{{ URL::to('/') }}/images/product_photos/{{ $product->filepath }}">
    </div>




    <div class="divProductInfo">
        <label id="prodInfo">Informação </label>
        <form class="formEditProduct" method="POST"  enctype="multipart/form-data" action="{{ URL('/addProduct/productDetails/'.$product->id .'/edit')}}">
            <div class="formEditName">
                <label>Nome:</label>
                <input type="text" name="inName" size="200" value="{{$product->name}}" placeholder="{{$product->name}}">
            </div>
            <br>
            <div class="formEditExpirationDate">
                <label>Data de validade:</label>
                <input type="date" name="inExpirationDate" value="{{$product->expiration_date}}" placeholder="{{$product->expiration_date}}" onfocus="(this.type='{{$product->expiration_date}}')">
            </div>
            <br>
            <div class="formEditQuantity">
                <label>Quantidade:</label>
                <input type="number" name="inQuantity" value="{{$product->quantity}}" placeholder="{{$product->quantity}}">
            </div>
            <br>
            <div class="formEditPrice">
                <label>Preço:</label>
                <input type="number" name="inPrice" value="{{$product->price}}" placeholder="{{$product->price}}">
            </div>
            <br>
            <div class="formEditProvider">
                <label>Fornecedor:</label>
                <select name="inFornecedor">
                    @foreach($fornecedores as $fornecedor )
                        @if($fornecedor->id == $product->fornecedor_id)
                    <option value="{{$fornecedor->id}}" selected>{{$fornecedor->nome}}</option>
                        @else
                    <option value="{{$fornecedor->id}}" >{{$fornecedor->nome}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="formUploadImage">
                <input type="file" id="testUpload"name="inProduct_photo" title="Product Photo"><br><br>
            </div>
            <input type="hidden" id="myToken" name="_token" value="{{ csrf_token() }}">
            <input type="submit" value="Guardar Alterações" id="btnSubmitSaveProduct">
        </form>
       <input type="button" value="Apagar Produto" id="btnDeleteProduct" onclick="verifyDelete('{{$product->name}}')">


    </div>

</div>


<!--href="{{ URL('/addProduct/productDetails/'.$product->id .'/delete')}}"-->


<script>

function verifyDelete(element){
    //só se for confirmado no alert é que é feito o redirect para o  delete
    if(confirm("Do you want to delete "+ element+"?")){
        window.location.href = "{{ URL('/addProduct/productDetails/'.$product->id .'/delete') }}";
    }
}

</script>








@endsection

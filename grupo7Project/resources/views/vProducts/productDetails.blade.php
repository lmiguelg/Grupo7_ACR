
@extends('vProducts.sidebar')
@section('contentProductDetails')

<!--dados passa através do controller na função compact-->

<h1>Product Details: {{$product->name}}</h1>


<div>

    <div class="divImgProduct">
        <img id="imgProduct" src="{{ URL::to('/') }}/images/product_photos/{{ $product->filepath }}">
    </div>




    <div class="divProductInfo">
        <label id="prodInfo">Product Information </label>
        <form class="formEditProduct" method="POST"  enctype="multipart/form-data" action="{{ URL('/addProduct/productDetails/'.$product->id .'/edit')}}">
            <div class="formEditName">
                <label>Name</label>
                <input type="text" name="inName" value="{{$product->name}}" placeholder="{{$product->name}}">
            </div>
            <br>
            <div class="formEditExpirationDate">
                <label>Expiration date:</label>
                <input type="date" name="inExpirationDate" value="{{$product->expiration_date}}" placeholder="{{$product->expiration_date}}" onfocus="(this.type='{{$product->expiration_date}}')">
            </div>
            <br>
            <div class="formEditQuantity">
                <label>Quantity:</label>
                <input type="number" name="inQuantity" value="{{$product->quantity}}" placeholder="{{$product->quantity}}">
            </div>
            <br>
            <div class="formEditPrice">
                <label>Price:</label>
                <input type="number" name="inPrice" value="{{$product->price}}" placeholder="{{$product->price}}">
            </div>
            <br>
            <div class="formEditProvider">
                <label>Fornecedor:</label>
                <select>
                    @foreach($fornecedores as $fornecedor )
                        @if($fornecedor->id == $product->fornecedor_id)
                    <option name="inFornecedor" value="{{$fornecedor->id}}" selected>{{$fornecedor->nome}}</option>
                        @else
                    <option name="inFornecedor" value="{{$fornecedor->id}}" selected>{{$fornecedor->nome}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="formUploadImage">
                <input type="file" name="inProduct_photo" title="Product Photo"><br><br>
            </div>
            <input type="hidden" id="myToken" name="_token" value="{{ csrf_token() }}">
            <input type="submit" value="Save changes" id="btnSubmitSaveProduct">
        </form>
       <input type="button" value="Delete product" id="btnDeleteProduct" onclick="verifyDelete('{{$product->name}}')">


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

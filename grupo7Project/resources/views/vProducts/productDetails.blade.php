
@extends('vProducts.sidebar')
@section('contentProductDetails')

<!--dados passa através do controller na função compact-->

<h1>Product Details: {{$product->name}}</h1>


<div>

    <div class="divImgProduct">
        <img id="imgProduct">
    </div>

    <div class="divProductInfo">
        <label>Product Information </label>
        <form class="formEditProduct" method="POST" action="{{ URL('/addProduct/productDetails/'.$product->id .'/edit')}}">
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
                <label>Provider:</label>
                <select>
                    <option value="" disabled selected>Atual Provider</option>
                    <option>Provider 1</option>
                    <option>Provider 2</option>
                </select>
            </div>
            <input type="hidden" id="myToken" name="_token" value="{{ csrf_token() }}">
            <input type="submit" value="Save changes" id="btnSubmitSaveProduct">
        </form>
        <input type="button" value="Delete product" id="btnDeleteProduct">

    </div>

</div>














@endsection
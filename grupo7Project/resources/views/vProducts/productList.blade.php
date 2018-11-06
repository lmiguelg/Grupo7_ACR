
@extends('main')
@section('content')


<h1>Inventory</h1>

<div class="container">

    <h3 class="sectionTitle">Add product to inventory</h3>
    <div class="divPreForm">
    <form id="formAddProduct" method="POST" action="/addProduct">
        <div class="divColumnAddProduct">
            <label>Product Name</label><br>
            <input type="text" id="inProductName" name="inProductName" required>
        </div>

        <div class="divColumnAddProduct">
            <label>Quantity</label><br>
            <input type="text" id="inQuantity" name="inQuantity" required>
        </div>

        <div class="divColumnAddProduct">
            <label>Expiration date</label><br>
            <input type="date" id="inExpirationDate" name="inExpirationDate">
        </div>

        <div class="divColumnAddProduct">
            <label>Price(€)</label><br>
            <input type="number" step="0.01" id="inProductPrice" name="inProductPrice" required>
        </div>

        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="divColumnAddProduct">
            <input type="submit" value="Add" id="btnAddProduct" >
        </div>

    </form>
    </div>


</div>
<div class="productList">
    <table class="inventoryTable">
        <th>Id</th>
        <th>Name</th>
        <th>Expiration date</th>
        <th>Quantity</th>
        <th>Price(€)</th>
        <th>Edit</th>

    @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->expiration_date}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->price}}</td>
            <td><a href="" >+</a></td><!--vai redirecionar para o produto
                                        e vai ser possivel editá-lo-->

        </tr>

    @endforeach

    </table>
</div>


@endsection

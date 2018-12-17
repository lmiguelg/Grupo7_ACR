
@extends('layouts.app')
@section('content2')


<h1>Inventory</h1>

<div class="container">

    <h3 class="sectionTitle">Add product to inventory</h3>
    <div class="divPreForm">
    <form id="formAddProduct" action="#">
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

        <div class="divColumnAddProduct">
            <label>Fornecedor</label><br>
            <select class="divSelectGeral" name="inFornecedor" required>
                    @foreach($fornecedores as $fornecedor)
                        <option value="{{$fornecedor->id}}">{{$fornecedor->nome}}</option>
                    @endforeach

            </select>
        </div>
        <div class="formUploadImage">
                <input type="file" name="inProduct_photoAddNew" title="Product Photo" ><br><br>
        </div>

        <input type="hidden" id="myToken" name="_token" value="{{ csrf_token() }}">


        <div class="divColumnAddProduct">
            <input type="submit" value="Add" id="btnAddProduct" class="btnGeral" >
        </div>

    </form>
    </div>


</div>
<section class="productList">
    @include('vProducts.productListTable')
</section>

<script type="text/javascript">

    $(function() {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            getArticles(url);
            window.history.pushState("", "", url);
        });

        function getArticles(url) {
            $.ajax({
                url : url
            }).done(function (data) {
                $('.productList').html(data);
            }).fail(function () {
                alert('Articles could not be loaded.');
            });
        }
    });
</script>
@endsection

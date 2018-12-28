@extends('layouts.app')
@section('content')

<h1>Vendas</h1>

<table class="inventoryTable">
        <tr >
            <th id="thTitleInventory" colspan="7">Vendas efetuadas</th>
        </tr>
        <tr>
            <th>Id</th>
            <th>Cliente</th>
            <th>Preço(€)</th>
            <th>Data/Hora</th>
            <th>Details</th>
        </tr>

        @foreach($sales as $sale)
            <tr>
                <td>{{$sale->id}}</td>
                @foreach($clientes as $cliente)
                    @if($sale->cliente_id == $cliente->id)
                        <td>{{$cliente->nome}}</td>
                    @endif
                @endforeach

                <td>{{$sale->price}}</td>
                <td>{{$sale->created_at}}</td>
                <td><a href="{{ URL('/pdf/'.$sale->id)}}"><button>+</button></a></td>
            </tr>
        @endforeach

    </table>



<section class="productList">
@include('vSales.salesTable')
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




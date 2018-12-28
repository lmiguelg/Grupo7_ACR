@extends('layouts.app')
@section('content')

<h1>Vendas</h1>





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




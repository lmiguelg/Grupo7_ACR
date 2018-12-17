@extends('layouts.app')

@section('content')



    <h1>Fornecedores</h1>

    <div class="container">

        <h3 class="sectionTitle">Adiciona fornecedores</h3>
        <div class="divPreForm">
            <form id="formAddFornecedor" action="#">
                <div class="divColumnAddFornecedor">
                    <label>Nome da empresa</label><br>
                    <input type="text" id="inFornecedorNome" name="inFornecedorNome" required>
                </div>

                <div class="divColumnAddFornecedor">
                    <label>NIF</label><br>
                    <input type="text" id="inNIF" name="inNIF" required>
                </div>

                <div class="divColumnAddFornecedor">
                    <label>contacto</label><br>
                    <input type="text" id="inContacto" name="inContacto" required>
                </div>

                <div class="divColumnAddFornecedor">
                    <label>Morada</label><br>
                    <input type="text" id="inMorada" name="inMorada" required>
                </div>

                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="divColumnAddFornecedor">
                    <input type="submit" value="Add" id="btnAddFornecedor">
                </div>

            </form>
        </div>

    </div>


    <section class="fornecedoresList">
        @include('Fornecedores.fornecedoresList')
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
                    $('.fornecedoresList').html(data);
                }).fail(function () {
                    alert('Articles could not be loaded.');
                });
            }
        });
    </script>






@endsection

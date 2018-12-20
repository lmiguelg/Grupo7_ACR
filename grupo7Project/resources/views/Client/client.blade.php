

@extends('layouts.app')
@section('content')


    <div>

        <h3 class="sectionTitle">Adicionar Cilentes</h3>

        <div class="divPreForm">
            <form id="formAddCliente" action="#">
                <div class="divColumnAddFornecedor" style="margin-bottom: 20px; margin-right: 5px;">
                    <label>Nome </label><br>
                    <input type="text" id="inClientNome" name="inClientNome" required>
                </div>

                <div class="divColumnAddFornecedor" style="margin-bottom: 20px; margin-right: 5px;">
                    <label>NIF</label><br>
                    <input type="text" id="inNIF" name="inNIF" required>
                </div>

                <div class="divColumnAddFornecedor" style="margin-bottom: 20px;">
                    <label>contacto</label><br>
                    <input type="text" id="inContacto" name="inContacto" required>
                </div>

                <div class="divColumnAddFornecedor" style="margin-bottom: 20px; ">
                    <label>Morada</label><br>
                    <input type="text" id="inMorada" name="inMorada" required>
                </div>

                <div class="divColumnAddFornecedor" style="margin-bottom: 20px; ">
                    <label>Email</label><br>
                    <input type="email" id="inEmail" name="inEmail" required>
                </div>

                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="divColumnAddFornecedor" style="margin-bottom: 20px; ">
                    <input type="submit" value="Add" id="btnAddClient" class="btnGeral">
                </div>

            </form>
        </div>
    </div>
        <section class="productList">
            @include('Client.clientList')
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


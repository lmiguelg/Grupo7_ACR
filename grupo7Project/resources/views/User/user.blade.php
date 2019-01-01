
@extends('layouts.app')
@section('content')
<h1>Utilizadores</h1>
    <div class="FornecedorList">
        <table class="inventoryTable userTable" id="FornecedorTable" style="margin-top: 200px;">
            <tr >
                <th id="thTitleInventory" colspan="7">Lista de Utilizadores</th>
            </tr>
            <th>Id</th>
            <th>Nome</th>
            <th>username</th>
            <th>Email</th>
            <th>categoria</th>
            <th>Edit</th>

            @foreach($utilizadores as $utilizador)
                <tr>
                    <td>{{$utilizador->id}}</td>
                    <td>{{$utilizador->name}}</td>
                    <td>{{$utilizador->username}}</td>
                    <td>{{$utilizador->email}}</td>
                    <td>{{$utilizador->category}}</td>
                    <td><a href="editUser/{{ $utilizador->id }}">Edita</a></td><!--vai redirecionar para o produto
                                        e vai ser possivel editá-lo-->

                </tr>

            @endforeach

        </table>

        {{$utilizadores -> render()}}

    </div>
    <script>

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
                    $('.FornecedorList').html(data);
                }).fail(function () {
                    alert('Articles could not be loaded.');
                });
            }

        });
    </script>




@endsection

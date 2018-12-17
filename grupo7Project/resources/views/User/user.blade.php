
@extends('layouts.app')
@section('content')

    <div class="FornecedorList">
        <table class="FornecedorTable" id="FornecedorTable">
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
    </div>





@endsection

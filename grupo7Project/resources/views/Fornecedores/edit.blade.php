@extends('layouts.app')
@section('content')


    <table class="FornecedorTable" id="FornecedorTable">
        <th>Id</th>
        <th>Nome</th>
        <th>NIF</th>
        <th>contacto</th>
        <th>Morada</th>
        <th>Edit</th>


            <tr>
                <td>{{$entidadeFornecedor->nome}}</td>
                <td>{{$entidadeFornecedor->nif}}</td>
                <td>{{$entidadeFornecedor->contacto}}</td>
                <td>{{$entidadeFornecedor->morada}}</td>
            </tr>
    </table>
<!-- Não esquecer em meter encriptação nisto tudo -->

<div>
    <h3>Editar o funcionario</h3>
    <br>
    <form method="post" action="/addFornecedor/{{$entidadeFornecedor->id}})">

        <div class="divColumnAddFornecedor">
            <label>Nome da empresa</label><br>
            <input type="text" id="inFornecedorNome" name="inFornecedorNome" value="{{$entidadeFornecedor->nome}}" required>
        </div>

        <div class="divColumnAddFornecedor">
            <label>NIF</label><br>
            <input type="text" id="inNIF" name="inNIF" value="{{$entidadeFornecedor->nif}}" required>
        </div>

        <div class="divColumnAddFornecedor">
            <label>contacto</label><br>
            <input type="text" id="inContacto" name="inContacto" value="{{$entidadeFornecedor->contacto}}" required>
        </div>

        <div class="divColumnAddFornecedor">
            <label>Morada</label><br>
            <input type="text" id="inMorada" name="inMorada" value="{{$entidadeFornecedor->morada}}" required>
        </div>

        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="divColumnAddFornecedor">
            <input type="submit" value="Edit" id="btnAddFornecedor">
        </div>


    </form>
</div>
@endsection
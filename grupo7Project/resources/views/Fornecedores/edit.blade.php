@extends('layouts.app')
@section('content')



<!-- Não esquecer em meter encriptação nisto tudo -->

<div class="form-editAll">
    <h3 class="titulo">Editar o Fornecedor</h3>
    <br>
    <form id="formEditFornecedor" method="post" action="/addFornecedor/{{$entidadeFornecedor->id}})">

        <div class="divColumnAddFuncionario">
            <label>Nome da empresa</label><br>
            <input type="text" id="inFornecedorNome" name="inFornecedorNome" value="{{$entidadeFornecedor->nome}}" required>
        </div>

        <div class="divColumnAddFuncionario">
            <label>NIF</label><br>
            <input type="text" id="inNIF" name="inNIF" value="{{$entidadeFornecedor->nif}}" required>
        </div>

        <div class="divColumnAddFuncionario">
            <label>contacto</label><br>
            <input type="text" id="inContacto" name="inContacto" value="{{$entidadeFornecedor->contacto}}" required>
        </div>

        <div class="divColumnAddFuncionario">
            <label>Morada</label><br>
            <input type="text" id="inMorada" name="inMorada" value="{{$entidadeFornecedor->morada}}" required>
        </div>

        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="divColumnAddFuncionario">
            <input type="submit" value="Edit" id="btnAddFuncionario">
        </div>




    </form>
    <div class="divDeleteFornecedor">
        <a id="deleteFornecedor" href="/addFornecedor/{{$entidadeFornecedor->id}}/delete" onclick="verifica">Apagar Fornecedor</a>
    </div>


</div>
@endsection

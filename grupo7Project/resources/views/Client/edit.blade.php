
@extends('layouts.app')
@section('content')


    <table class="FornecedorTable" id="FornecedorTable">
        <th>Id</th>
        <th>Nome</th>
        <th>NIF</th>
        <th>contacto</th>
        <th>Morada</th>
        <th>Email</th>



        <tr>
            <td>{{$cliente->nome}}</td>
            <td>{{$cliente->nif}}</td>
            <td>{{$cliente->contacto}}</td>
            <td>{{$cliente->morada}}</td>
            <td>{{$cliente->email}}</td>
        </tr>
    </table>

    <!-- Não esquecer em meter encriptação nisto tudo -->

    <div>

        <br>
        <form class="form-editClient" method="post" action="/editUser/{{$cliente->id}})">
            <h3 class="titulo">Editar CLiente</h3>


            <div class="divColumnEditClient">
                <label class="formEdits">Nome do Cliente:</label><br>
                <input type="text"  class="inCliente" id="inClienteNome" name="inClienteNome" value="{{$cliente->nome}}" required>
            </div>

            <div class="divColumnEditClient">
                <label class="formEdits">NIF do Cliente:</label><br>
                <input type="text"  class="inCliente" id="inClienteNif" name="inClienteNif" value="{{$cliente->nif}}" required>

            </div>

            <div class="divColumnEditClient">
                <label class="formEdits">Contacto do Cliente:</label><br>
                <input type="text"  class="inCliente" id="inClienteContacto" name="inClienteContacto" value="{{$cliente->contacto}}" required>

            </div>

            <div class="divColumnEditClient">
                <label class="formEdits">Morada do Cliente:</label><br>
                <input type="text"  class="inCliente" id="inClienteMorada" name="inClienteMorada" value="{{$cliente->morada}}" required>

            </div>


            <div class="divColumnEditClient">
                <label class="formEdits">Email:</label>
                <br>
                <input  class="inCliente" type="email" id="inEmail" name="inEmail" value="{{$cliente->email}}" required>
            </div>


            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="divColumnAddFuncionario">
                <input type="submit" value="Edit" id="btnAddCliente">
            </div>


        </form>
    </div>


@endsection
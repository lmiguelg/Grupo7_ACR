
@extends('layouts.app')
@section('content')



    <!-- Não esquecer em meter encriptação nisto tudo -->

    <div class="form-editAll">

        <br>
        <form  id="formEditCliente" method="post" action="/addClient/{{$cliente->id}})">
            <h3 class="titulo">Editar Cliente</h3>


            <div class="divColumnAddFuncionario">
                <label class="formEdits">Nome do Cliente:</label><br>
                <input type="text"  class="inCliente" id="inClienteNome" name="inClienteNome" value="{{$cliente->nome}}" required>
            </div>

            <div class="divColumnAddFuncionario">
                <label class="formEdits">NIF do Cliente:</label><br>
                <input type="text"  class="inCliente" id="inClienteNif" name="inClienteNif" value="{{$cliente->nif}}" required>

            </div>

            <div class="divColumnAddFuncionario">
                <label class="formEdits">Contacto do Cliente:</label><br>
                <input type="text"  class="inCliente" id="inClienteContacto" name="inClienteContacto" value="{{$cliente->contacto}}" required>

            </div>

            <div class="divColumnAddFuncionario">
                <label class="formEdits">Morada do Cliente:</label><br>
                <input type="text"  class="inCliente" id="inClienteMorada" name="inClienteMorada" value="{{$cliente->morada}}" required>

            </div>


            <div class="divColumnAddFuncionario">
                <label class="formEdits">Email:</label>
                <br>
                <input  class="inCliente" type="email" id="inEmail" name="inEmail" value="{{$cliente->email}}" required>
            </div>


            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="divColumnAddFuncionario">
                <input type="submit" value="Edit" id="btnAddFuncionario">
            </div>


        </form>
        <div class="btnDeleteCliente">
            <a style="text-decoration: none;" id="btnDeleteProduct" href="/addClient/{{$cliente->id}}/delete" onclick="verifica">Delete</a>

        </div>
    </div>



@endsection

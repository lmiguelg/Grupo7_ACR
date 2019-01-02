
@extends('layouts.app')
@section('content')


    <!-- Não esquecer em meter encriptação nisto tudo -->

        <div class="form-editAll">

        <br>
        <form  id="formEditeUser" method="post" action="/editUser/{{$funcionario->id}})">
            <h3 class="titulo">Editar o funcionario</h3>
            <div class="divColumnAddFuncionario">
                <label class="formEdits">Nome do funcionario:</label><br>
                <input type="text"  class="inFuncionario" id="inFuncionarioNome" name="inFuncionarioNome" value="{{$funcionario->name}}" required>
            </div>

            <div class="divColumnAddFuncionario">
                <label class="formEdits">Email:</label>
                <br>
                <input  class="inFuncionario" type="email" id="inEmail" name="inEmail" value="{{$funcionario->email}}" required>
            </div>


            <div class="divColumnAddFuncionario">
                <label class="formEdits">Categoria:</label>
                <br>
                <select name="inCategory"  class="inFuncionario"  required>
                    <option value="armazem">armazem</option>
                    <option value="loja">loja</option>
                    <option value="gestor">gestor</option>
                    <option value="admin">admin</option>

                </select>
            </div>

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="divColumnAddFuncionario">
                <input type="submit" value="Edit" id="btnAddFuncionario">
            </div>


        </form>

        <a style="text-decoration: none;" id="btnDeleteProduct" href="/editUser/{{$funcionario->id}}/delete" onclick="verifica">Apagar funcionario</a>
    </div>


@endsection

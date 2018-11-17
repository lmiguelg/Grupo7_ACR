
@extends('layouts.app')
@section('content')


    <table class="FornecedorTable" id="FornecedorTable">
        <th>Nome</th>
        <th>email</th>
        <th>username</th>
        <th>category</th>


        <tr>
            <td>{{$funcionario->name}}</td>
            <td>{{$funcionario->email}}</td>
            <td>{{$funcionario->username}}</td>
            <td>{{$funcionario->category}}</td>
        </tr>
    </table>
    <!-- Não esquecer em meter encriptação nisto tudo -->

    <div>
        <h3>Editar o funcionario</h3>
        <br>
        <form method="post" action="/editUser/{{$funcionario->id}})">

            <div class="divColumnAddFornecedor">
                <label>Nome do funcionario</label><br>
                <input type="text" id="inFuncionarioNome" name="inFuncionarioNome" value="{{$funcionario->name}}" required>
            </div>

            <div class="divColumnAddFornecedor">
                <label>email</label><br>
                <input type="email" id="inEmail" name="inEmail" value="{{$funcionario->email}}" required>
            </div>


            <div class="divColumnAddFornecedor">
                <label>category</label><br>
                <select name="inCategory"  required>
                    <option value="armazem">armazem</option>
                    <option value="loja">loja</option>
                    <option value="gestor">gestor</option>
                    <option value="admin">admin</option>

                </select>
            </div>

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="divColumnAddFornecedor">
                <input type="submit" value="Edit" id="btnAddFornecedor">
            </div>


        </form>
    </div>


@endsection
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


        <div class="FornecedorList">
            <table class="FornecedorTable" id="FornecedorTable">
                <th>Id</th>
                <th>Nome</th>
                <th>NIF</th>
                <th>contacto</th>
                <th>Morada</th>
                <th>Edit</th>

                @foreach($fornecedores as $fornecedor)
                    <tr>
                        <td>{{$fornecedor->id}}</td>
                        <td>{{$fornecedor->nome}}</td>
                        <td>{{$fornecedor->nif}}</td>
                        <td>{{$fornecedor->contacto}}</td>
                        <td>{{$fornecedor->morada}}</td>
                        <td><a href="addFornecedor/{{ $fornecedor->id }}">Edita</a></td><!--vai redirecionar para o produto
                                        e vai ser possivel editá-lo-->

                    </tr>

                @endforeach

            </table>
        </div>






@endsection
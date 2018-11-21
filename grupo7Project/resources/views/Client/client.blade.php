

@extends('layouts.app')
@section('content')

    <div class="ClientList">
        <table class="ClientTable" id="ClientTable">
            <th>Id</th>
            <th>Nome</th>
            <th>NIF</th>
            <th>contacto</th>
            <th>Morada</th>
            <th>Edit</th>

        </table>
    </div>

    <div>

        <h3 class="sectionTitle">Adicionar Cilentes</h3>
        <div class="divPreForm">
            <form id="formAddClient" action="#">
                <div class="divColumnAddClient">
                    <label>Nome </label><br>
                    <input type="text" id="inClientNome" name="inClientNome" required>
                </div>

                <div class="divColumnAddClient">
                    <label>NIF</label><br>
                    <input type="text" id="inNIF" name="inNIF" required>
                </div>

                <div class="divColumnAddClient">
                    <label>contacto</label><br>
                    <input type="text" id="inContacto" name="inContacto" required>
                </div>

                <div class="divColumnAddClient">
                    <label>Morada</label><br>
                    <input type="text" id="inMorada" name="inMorada" required>
                </div>

                <div class="divColumnAddClient">
                    <label>Email</label><br>
                    <input type="email" id="inEmail" name="inEmail" required>
                </div>

                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="divColumnAddClient">
                    <input type="submit" value="Add" id="btnAddClient">
                </div>

            </form>
        </div>

        <div class="ClientList">
            <table class="ClientTable" id="ClientTable">
                <th>Id</th>
                <th>Nome</th>
                <th>NIF</th>
                <th>contacto</th>
                <th>Morada</th>
                <th>Email</th>
                <th>Edit</th>

                @foreach($clients as $client)
                    <tr>
                        <td>{{$client->id}}</td>
                        <td>{{$client->nome}}</td>
                        <td>{{$client->nif}}</td>
                        <td>{{$client->contacto}}</td>
                        <td>{{$client->morada}}</td>
                        <td>{{$client->email}}</td>
                        <td><a href="addClient/{{ $client->id }}">Edita</a></td><!--vai redirecionar para o produto
                                        e vai ser possivel editá-lo-->

                    </tr>

                @endforeach

            </table>
        </div>


    </div>





@endsection
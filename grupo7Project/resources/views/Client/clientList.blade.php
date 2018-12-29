<div class="ClientList">

    <table class="inventoryTable" id="ClientTable">

        <tr >
            <th id="thTitleInventory" colspan="7">Lista de Clientes</th>
        </tr>
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

    {{$clients -> links()}}
</div>
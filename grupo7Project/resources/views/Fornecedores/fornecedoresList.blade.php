<div class="productList">

    <table class="inventoryTable FornecedorTable" id="FornecedorTable">
        <tr >
            <th id="thTitleInventory" colspan="7">Lista de fornecedores</th>
        </tr>
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
                <td><a href="addFornecedor/{{ $fornecedor->id }}">Edita</a>
                </td><!--vai redirecionar para o produto
                                        e vai ser possivel editá-lo-->

            </tr>

        @endforeach

    </table>

    {{  $fornecedores->render() }}

</div>

<div>
    <table class="inventoryTable FornecedorTable">
        <tr >
            <th id="thTitleInventory" colspan="7">Lista de produtos</th>
        </tr>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Data validade</th>
            <th>Quantidade</th>
            <th>Preço(€)</th>
            <th>Fornecedor</th>
            <th>Editar</th>

        </tr>


        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->expiration_date}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->price}}</td>
                @foreach($fornecedores as $fornecedor)
                    @if($product->fornecedor_id == $fornecedor->id)
                        <td>{{$fornecedor->nome}}</td>
                    @endif
                @endforeach
                <td><a href="{{ URL('/addProduct/productDetails/'.$product->id .'/edit')}}">+</a></td><!--vai redirecionar para o produto
                                        e vai ser possivel editá-lo-->
            </tr>

        @endforeach

    </table>
{{$products -> render()}}

</div>

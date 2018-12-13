<div>
    <table class="inventoryTable">
        <tr >
            <th id="thTitleInventory" colspan="7">Inventory List</th>
        </tr>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Expiration date</th>
            <th>Quantity</th>
            <th>Price(€)</th>
            <th>Provider</th>
            <th>Edit</th>

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
<div>
    <table class="inventoryTable">
        <tr >
            <th id="thTitleInventory" colspan="7">Vendas efetuadas</th>
        </tr>
        <tr>
            <th>Id</th>
            <th>Cliente</th>
            <th>Preço(€)</th>
            <th>Data/Hora</th>
            <th>Details</th>
        </tr>

        @foreach($sales as $sale)
            <tr>
                <td>{{$sale->id}}</td>
                @foreach($clientes as $cliente)
                    @if($sale->cliente_id == $cliente->id)
                        <td>{{$cliente->nome}}</td>
                    @endif
                @endforeach

                <td>{{$sale->price}}</td>
                <td>{{$sale->created_at}}</td>
                <td></td>
            </tr>
        @endforeach

    </table>

{{$sales -> render()}}
</div>

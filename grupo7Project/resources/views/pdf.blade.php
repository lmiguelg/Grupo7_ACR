<!doctype html>
<html>
<head>
    <title>Fatura</title>

    <link href="{{ asset('css/stylePDF.css') }}" rel="stylesheet">

</head>

<body>



    <div class="divGlobalInvoice">
        <div class="headerInvoice">
            <img src="{{ URL::to('/') }}/Logo/logo.png">
            <div class="dataInvoice">
                <label><b>Fatura Nº: </b></label><span id="invoiceId">{{$sale->id}}</span><br>
                <label><b>Data de emissão:</b></label><span id="createdAt">{{$dateInvoice}}</span><br>
                <label><b>Nº cliente: </b></label><span id="clientId">{{$sale->cliente_id}}</span><br>
                <label><b>Cliente: </b></label><span id="clientId">{{$cliente->nome}}</span><br>
                <label><b>Nº contribuinte: </b></label><span id="nifNumber">{{$cliente->nif}}</span><br>

            </div>

        </div>
        <div class="divProductsInvoice">

            <table class="invoice_table">
                <tr class="trTitle">
                    <th>Item</th>
                    <th>Preço</th>
                </tr>

                @foreach($saleProducts as $item)
                    @foreach ($products as $product)

                        @if($item->product_id == $product->id)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}€</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach

            </table>

            <div class="divFinalPDF">
                <hr>
                <label>IVA: 22% </label><br>

                <label class="valor"><b>VALOR A PAGAR:</b></label><span id="price"> {{$sale->price}}€</span><br>
                <hr>


            </div>
            <div class="divAssinatura">
                <label>______________________</label><br>
                <label>(assinatura do funcionário)</label>
            </div>


        </div>


    </div>

    <button id="btnFatura" onclick="obterFatura()">Obter Fatura</button>


    <script>
    function obterFatura(){
        document.getElementById("btnFatura").style.display = 'none';
        window.print();
    }
    </script>
</body>




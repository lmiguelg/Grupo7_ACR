<!doctype html>
<html>
<head>
    <title>Fatura</title>

</head>

<body>

<div class="headerInvoice">
    <img src="{{ URL::to('/') }}/Logo/logo.png">
    <div class="dataInvoice">
        <label>Fatura Nº: </label><br>
        <label>Data de emissão: </label><br>
        <label>Nº cliente: </label><br>
        <label>Nº contribuinte: </label><br>

    </div>

</div>



</body>

{{$data}}

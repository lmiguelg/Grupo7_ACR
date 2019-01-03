
@extends('layouts.app')
@section('content')


<h1>Stock de Produtos</h1>

<div class="container">

    <h3 class="sectionTitle">Adicionar produto ao stock</h3>
    <div class="divPreForm">
    <form id="formAddProduct" action="#">
        <div class="divColumnAddProduct">
            <label>Produto</label><br>
            <input type="text" size="200" id="inProductName" name="inProductName" size="200" required>
        </div>

        <div class="divColumnAddProduct">
            <label>Quantidade</label><br>
            <input type="text" size="200" id="inQuantity" name="inQuantity" size="200" required>
        </div>

        <div class="divColumnAddProduct">
            <label>Data de validade</label><br>
            <input type="date" id="inExpirationDate" name="inExpirationDate">
        </div>

        <div class="divColumnAddProduct">
            <label>Preço(€)</label><br>
            <input type="number" step="0.01" id="inProductPrice" name="inProductPrice" required>
        </div>

        <div class="divColumnAddProduct">
            <label>Fornecedor</label><br>
            <select class="divSelectGeral" id="inFornecedor" name="inFornecedor" required>
                    @foreach($fornecedores as $fornecedor)
                        <option value="{{$fornecedor->id}}">{{$fornecedor->nome}}</option>
                    @endforeach

            </select>
        </div>
        <div class="formUploadImage">
                <input type="file" id="inProduct_photoAddNew1" name="inProduct_photoAddNew" title="Product Photo" ><br><br>
        </div>

        <input type="hidden" id="myToken" name="_token" value="{{ csrf_token() }}">


        <div class="divColumnAddProduct">
            <input type="submit" value="Adicionar" id="btnAddProduct" class="btnGeral" onclick="handleSignInClick()" >
        </div>

    </form>
    </div>


</div>
<section class="salesList">
    @include('vProducts.productListTable')
</section>

<script type="text/javascript">

    $(function() {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            getArticles(url);
            window.history.pushState("", "", url);
        });

        function getArticles(url) {
            $.ajax({
                url : url
            }).done(function (data) {
                $('.salesList').html(data);
            }).fail(function () {
                alert('Articles could not be loaded.');
            });
        }
    });
</script>

<script>

    function makeApiCall() {
        var params = {
            // The ID of the spreadsheet to update.
            spreadsheetId: '1EihNG4AYz57scUAeYQOCEB1P5pJ5EfGNHv0DPde0lHk', // TODO: Update placeholder value.

            // The A1 notation of a range to search for a logical table of data.
            // Values will be appended after the last row of the table.
            range: 'A1', // TODO: Update placeholder value.

            // How the input data should be interpreted.
            valueInputOption: 'RAW', // TODO: Update placeholder value.

            // How the input data should be inserted.
            insertDataOption: 'INSERT_ROWS', // TODO: Update placeholder value.
        };

        var nome = document.getElementById("inProductName").value;
        var quantidade = parseInt(document.getElementById("inQuantity").value);
        var preco = parseFloat(document.getElementById("inProductPrice").value);
        var fornecedor = document.getElementById("inFornecedor").value;
        console.log(nome +quantidade+preco+fornecedor );
        var valueRangeBody = {
            // TODO: Add desired properties to the request body.


            "majorDimension": "ROWS",
            "values": [
                [
                    nome,
                    quantidade,
                    preco,
                    fornecedor
                ]
            ]
        };

        var request = gapi.client.sheets.spreadsheets.values.append(params, valueRangeBody);
        request.then(function(response) {
            // TODO: Change code below to process the `response` object:
            gapi.auth2.getAuthInstance().signOut();

            console.log(response.result);
            document.getElementById("formAddProduct").reset();
        }, function(reason) {
            console.error('error: ' + reason.result.error.message);
        });
    }

    function initClient() {
        var API_KEY = 'AIzaSyD4bmKeC54lggCY5i3zFTKaIezNAwr_y98'; // TODO: Update placeholder with desired API key.

        var CLIENT_ID = '308006157010-0ghhvnaji1dsk6rljkqh3qj7dgksj29l.apps.googleusercontent.com'; // TODO: Update placeholder with desired client ID.

        // TODO: Authorize using one of the following scopes:
        //   'https://www.googleapis.com/auth/drive'
        //   'https://www.googleapis.com/auth/drive.file'
        //   'https://www.googleapis.com/auth/spreadsheets'
        var SCOPE = 'https://www.googleapis.com/auth/spreadsheets';

        gapi.client.init({
            'apiKey': API_KEY,
            'clientId': CLIENT_ID,
            'scope': SCOPE,
            'discoveryDocs': ['https://sheets.googleapis.com/$discovery/rest?version=v4'],
        }).then(function() {
            gapi.auth2.getAuthInstance().isSignedIn.listen(updateSignInStatus);
            updateSignInStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
        });
    }

    function handleClientLoad() {
        gapi.load('client:auth2', initClient);
    }

    function updateSignInStatus(isSignedIn) {
        if (isSignedIn) {
            makeApiCall();
        }
    }

    function handleSignInClick(event) {
        gapi.auth2.getAuthInstance().signIn();
    }

    function handleSignOutClick(event) {
        gapi.auth2.getAuthInstance().signOut();
    }
</script>
<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()">
</script>
@endsection

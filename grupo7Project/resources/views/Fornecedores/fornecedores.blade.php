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
                    <input type="submit" value="Add" id="btnAddFornecedor" onclick="handleSignInClick()" >
                </div>

            </form>
        </div>

    </div>

    <section class="fornecedoresList">
        @include('Fornecedores.fornecedoresList')
    </section>

<script>

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
                $('.fornecedoresList').html(data);
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
            spreadsheetId: '1nNE7EqxMVNgna_V37_LcDZs-bNZoxjEHGpkSoRHWHao', // TODO: Update placeholder value.

            // The A1 notation of a range to search for a logical table of data.
            // Values will be appended after the last row of the table.
            range: 'A1', // TODO: Update placeholder value.

            // How the input data should be interpreted.
            valueInputOption: 'RAW', // TODO: Update placeholder value.

            // How the input data should be inserted.
            insertDataOption: 'INSERT_ROWS', // TODO: Update placeholder value.
        };
        var nome = document.getElementById("inFornecedorNome").value;
        var nif = document.getElementById("inNIF").value;
        var contacto = document.getElementById("inContacto").value;
        var morada = document.getElementById("inMorada").value;

        var valueRangeBody = {
            // TODO: Add desired properties to the request body.


            "majorDimension": "ROWS",
            "values": [
                [
                    nome,
                    nif,
                    contacto,
                    morada
                ]
            ]
        };

        var request = gapi.client.sheets.spreadsheets.values.append(params, valueRangeBody);
        request.then(function(response) {
            // TODO: Change code below to process the `response` object:
            gapi.auth2.getAuthInstance().signOut();

            console.log(response.result);
            document.getElementById("formAddFornecedor").reset();
        }, function(reason) {
            console.error('error: ' + reason.result.error.message);
        });
    }

    function initClient() {
        var API_KEY = 'AIzaSyB47BvNQZAOAF9yUziq2Wd7MjZ09L0WaWM'; // TODO: Update placeholder with desired API key.

        var CLIENT_ID = '141972952306-ko8qs7kmcub3mvqkic6rvvle9t6to16g.apps.googleusercontent.com'; // TODO: Update placeholder with desired client ID.

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

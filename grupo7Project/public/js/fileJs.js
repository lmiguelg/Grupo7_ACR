


$(document).ready(function(){
    var token   = $("#myToken").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#formAddProduct").on('submit',function(e){

        e.preventDefault();

            var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url:'/addProduct',
            data: formData,
            contentType: false,
            processData: false,
            success:function(data){


                var result = Object.keys(data).map(function(key) {
                    return [Number(key), data[key]];
                });
                var lastElement = result[0][1][0][(result[0][1][0].length) - 1];
                var lastElement2 = result[0][1][(result[0][1].length) - 1];

                var test = $(".inventoryTable").append("<tr><td>"+lastElement.id+"</td><td>"+lastElement.name+"</td><td>"+lastElement.expiration_date+"</td><td>"+lastElement.quantity+"</td><td>"+lastElement.price+"</td><td>"+lastElement2.nome+"</td><td><a href="+"addProduct/productDetails/"+ lastElement.id+ "/edit"+ ">"+"+" +" </a></td></tr>");

                console.log(lastElement);
                alert("Produto adicionado com sucesso!");

            }
        });
        $('#formAddProduct')[0].reset();

    });


    $("#formAddFornecedor").on('submit',function (e) {

        e.preventDefault();

        var inFornecedorNome =$('input[name=inFornecedorNome]').val();
        var inNIF =$('input[name=inNIF]').val();
        var inContacto =$('input[name=inContacto]').val();
        var inMorada =$('input[name=inMorada]').val();


        $.ajax({

            type:'POST',
            url:'/addFornecedor',
            data:{

                'inFornecedorNome': inFornecedorNome,
                'inNIF': inNIF,
                'inContacto': inContacto,
                'inMorada' : inMorada
            },
            datatype:'json',

            success:function(data){

                var result = Object.keys(data).map(function(key) {
                    return [Number(key), data[key]];
                });
                var lastElement = result[0][1][(result[0][1].length) - 1];

                var test = $(".FornecedorTable").append("<tr><td>"+lastElement.id+"</td><td>"+lastElement.nome+"</td><td>"+lastElement.nif+"</td><td>"+lastElement.contacto+"</td><td>"+lastElement.morada+"</td><td><a href="+"addFornecedor/"+ lastElement.id+">"+ "Edita" +"</a></td></tr>");

                console.log(lastElement);

            }

        });


// Adds single row to spreadsheet

    });

    $("#formAddClient").on('submit',function (e) {

        e.preventDefault();

        var inClientNome =$('input[name=inClientNome]').val();
        var inNIF =$('input[name=inNIF]').val();
        var inContacto =$('input[name=inContacto]').val();
        var inMorada =$('input[name=inMorada]').val();
        var inEmail =$('input[name=inEmail]').val();

        $.ajax({

            type:'POST',
            url:'/addClient',

            data:{

                'inClientNome': inClientNome,
                'inNIF': inNIF,
                'inContacto': inContacto,
                'inMorada' : inMorada,
                'inEmail' : inEmail
            },

            datatype:'json',

            success:function(data){

                var result = Object.keys(data).map(function(key) {
                    return [Number(key), data[key]];
                });
                var lastElement = result[0][1][(result[0][1].length) - 1];

                var test = $(".ClientTable").append("<tr><td>"+lastElement.id+"</td><td>"+lastElement.nome+"</td><td>"+lastElement.nif+"</td><td>"+lastElement.contacto+"</td><td>"+lastElement.morada+"</td><td>"+lastElement.email+"</td><td><a href="+"addClient/"+ lastElement.id+ ">"+"Edita "+"</a></td></tr>");

                console.log(lastElement);

            }

        });

        $('#formAddClient')[0].reset();
    });


    $("#formSale").on('submit',function (e) {

        e.preventDefault();

        var client_id = parseInt($.session.get('clientSelected'));
        var productList = JSON.parse($.session.get('arrayProducts'));
        var inPrice = parseFloat($.session.get('Total'));

        console.log(productList);

        $.ajax({

            type:'POST',
            url:'/newSale',

            data:{

                'client_id': client_id,
                'productList': productList,
                'inPrice':inPrice
            },

            datatype:'json',

            success:function(data){
                resetFormSales();
                window.location = data;
                console.log(data);
            }
        });
    });




    //Depois de a pagina ser carregada e caso exista produtos nas cookies
    //atualiza esses mesmos produtos no DOM
    function updateDOMSales(products){

        for(var i = 0; i < products.length; i++){
            //nome
            $('.ulSalesList').append("<tr class='"+products[i].id +"'><td class='tdSales'>"+products[i].name+
            "</td><td><input type='button' value='X' class='btnRemoveProductSale' onclick='removeProduct("+products[i].id+")'></td></tr>");
        }
    }

    //atualizar o cliente no DOM venda

    if(sessionStorage.getItem('clientSelectedName') != null){
        $('.pClient').html(sessionStorage.getItem('clientSelectedName'));
    }

    //atualizar produtos na venda
        var products = JSON.parse(sessionStorage.getItem('arrayProducts'));
        if(sessionStorage.getItem('arrayProducts') != undefined){
            updateDOMSales(products);
        }

        $('.pTotal').html(sessionStorage.getItem('Total'));

});







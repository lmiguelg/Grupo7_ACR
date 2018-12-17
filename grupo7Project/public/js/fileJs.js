


$(document).ready(function(){
    var token   = $("#myToken").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#formAddProduct").on('submit',function(e){

        e.preventDefault();

            var inProductName       = $('input[name=inProductName]').val();
            var inQuantity          = $('input[name=inQuantity]').val();
            var inExpirationDate    = $('input[name=inExpirationDate]').val();
            var inProductPrice      = $('input[name=inProductPrice]').val();
            var inFornecedor        = $('select[name=inFornecedor]').val();
            var inProduct_photoAddNew     = $('input[name=inProduct_photoAddNew]').val();
            //console.log(inProduct_photo);


        $.ajax({
            type:'POST',
            url:'/addProduct',
            data: { 'inProductName':    inProductName,
                    'inQuantity':       inQuantity,
                    'inExpirationDate': inExpirationDate,
                    'inProductPrice':   inProductPrice,
                    'inFornecedor': inFornecedor,
                    'inProduct_photoAddNew':inProduct_photoAddNew
            },
            success:function(data){


                var result = Object.keys(data).map(function(key) {
                    return [Number(key), data[key]];
                });
                var lastElement = result[0][1][0][(result[0][1][0].length) - 1];
                var lastElement2 = result[0][1][(result[0][1].length) - 1];

                var test = $(".inventoryTable").append("<tr><td>"+lastElement.id+"</td><td>"+lastElement.name+"</td><td>"+lastElement.expiration_date+"</td><td>"+lastElement.quantity+"</td><td>"+lastElement.price+"</td><td>"+lastElement2.nome+"</td><td><a href="+"addProduct/productDetails/"+ lastElement.id+ "/edit"+ ">"+"+" +" </a></td></tr>");

                console.log(lastElement);
                //$("#inventoryTable").find('tr:last').append();
            }
        });
        $("#formAddProduct")[0].reset();

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

            $('#formAddFornecedor')[0].reset();
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



    //atualizar o cliente no DOM venda
    if($.session.get('clientSelectedName')){
        $('.pClient').html($.session.get('clientSelectedName'));
    }
    //atualizar produtos na venda
  var products = JSON.parse($.session.get('arrayProducts'));
    updateDOMSales(products);
    total(products);



});







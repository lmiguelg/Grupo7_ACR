
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

        $.ajax({
            type:'POST',
            url:'/addProduct',
            data: { 'inProductName':    inProductName,
                    'inQuantity':       inQuantity,
                    'inExpirationDate': inExpirationDate,
                    'inProductPrice':   inProductPrice},
            success:function(data){


                var result = Object.keys(data).map(function(key) {
                    return [Number(key), data[key]];
                });
                var lastElement = result[0][1][(result[0][1].length) - 1];

                var test = $(".inventoryTable").append("<tr><td>"+lastElement.id+"</td><td>"+lastElement.name+"</td><td>"+lastElement.expiration_date+"</td><td>"+lastElement.quantity+"</td><td>"+lastElement.price+"</td><td>(Provider Name)</td><td><a href="+"#"+">"+ "+" +"</a></td></tr>");

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

                    var test = $(".FornecedorTable").append("<tr><td>"+lastElement.id+"</td><td>"+lastElement.name+"</td><td>"+lastElement.expiration_date+"</td><td>"+lastElement.quantity+"</td><td>"+lastElement.price+"</td><td>(Provider Name)</td></tr>");

                    console.log(lastElement);

                }

            });

            $('#formAddFornecedor')[0].reset();
    });

    //script to edit product





});






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
                var lastElement;
                jQuery.each(data[1],function(element){
                    lastElement = element;
                })
                console.log(lastElement);//sacar o ultimo eleemnto e atualizar a lista
                //console.log(result);
            }
        });
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

                 /*  $('#FornecedorTable').DataTable({

                        'processing':true,
                        'serverSide':true,



                    })*/

                    //console.log(data);//sacar o ultimo eleemnto e atualizar a lista
                    //console.log(result);

                }

            });

            $('#formAddFornecedor')[0].reset();




    })
});





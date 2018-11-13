
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
});





$(document).ready(function () {
    $(".add-to-cart").click(function () {
        let index = $(this).data('value');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/carts/add_product/' + index,
            method: 'post',
            success: function(data){
                if(data['status'] === '200'){
                    alert("Added to Cart");
                }else{
                    window.location.href = '/login';
                }
            }
        });
    });
    $(".cart_quantity_up").click(function () {
        let index = $(this).data('value');
        let total_value = $(".cart_total_price_"+index).html().trim();
        total_value = parseInt(total_value.slice(1, total_value.length));
        let price = $(".cart_price_"+index).html();
        price = parseInt(price.slice(1, price.length));
        let total_all = $(".cart_total_all").html();
        total_all = parseInt(total_all.slice(1, total_all.length));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/carts/add_product/' + index,
            method: 'post',
            success: function(){
                $(".cart_quantity_input_"+ index).val( parseInt($(".cart_quantity_input_"+index).val()) + 1);
                $(".cart_total_price_"+index).html("$" + (total_value+price));
                $(".cart_total_all").html("$"+(total_all+price));
            }
        });
    });
    $(".cart_quantity_down").click(function () {
        let index = $(this).data('value');
        let total_value = $(".cart_total_price_"+index).html().trim();
        total_value = parseInt(total_value.slice(1, total_value.length));
        let price = $(".cart_price_"+index).html();
        price = parseInt(price.slice(1, price.length));
        let total_all = $(".cart_total_all").html();
        total_all = parseInt(total_all.slice(1, total_all.length));
        let input = parseInt($(".cart_quantity_input_"+index).val());
        if (input == 1){
            window.location.href = '/carts/delete_product/'+index;
        }else {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/carts/minus_product/' + index,
                method: 'post',
                success: function () {
                    $(".cart_quantity_input_" + index).val(parseInt($(".cart_quantity_input_" + index).val()) - 1);
                    $(".cart_total_price_" + index).html("$" + (total_value - price));
                    $(".cart_total_all").html("$" + (total_all - price));
                }
            });
        }
    });
});

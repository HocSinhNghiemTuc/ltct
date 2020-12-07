$(document).ready(function () {
    $(".end_checkout").click(function () {
        let id = $(".payment_method_end:checked").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/carts/end_checkout',
            method: 'post',
            data: {
                id: id
            },
            success: function(data){
                if(data['status'] === '200'){
                    alert("Order thanh cong");
                    window.location.href = '/';
                }else{
                    window.location.href = '/login';
                }
            }
        });
    });
});

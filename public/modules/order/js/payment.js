function setVaild(ele, index = true) {
    if (index) {
        if (ele.val() == "") {
            ele.removeClass('is-valid').addClass('is-invalid');
        } else {
            ele.removeClass('is-invalid').addClass('is-valid')
        }
    } else {
        if (ele.val() == "") {
            ele.removeClass('is-valid').addClass('is-invalid');
        } else {
            ele.removeClass('is-invalid').addClass('is-valid')
        }
    }
}

$(document).ready(function () {
    $('.button-payment-save').click(function () {
        let index = $(this).data('value');
        let name = $('.payment-name-' + index);
        let link = $('.payment-account-' + index);
        if (name.val() != "" && link.val() != "" ) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/payment/update/' + index,
                method: 'post',
                data: {
                    'payment_name': name.val(),
                    'payment_account': link.val()
                },
                success: function (data) {
                    window.location.href = '/admin/payment/index/?'+index;
                }
            })
        } else {
            setVaild(name);
            setVaild(link);
        }
    });
    $('.button-payment-new').click(function () {
        let link = $('.payment-account-new');
        let name = $('.payment-name-new');
        if (name.val() != "" && link.val() != "" ) {
            $('form.payment-from-new').submit();
        } else {
            setVaild(name);
            setVaild(link);
        }
    });
    $('.payment-status').change(function () {
        let index = $(this).data('value');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/payment/state/' + index,
            method: 'post'
        })
    });
    $('.payment-delete').click(function () {
        let index = $(this).data('value');
        if (confirm("Are you sure?")) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/payment/delete/' + index,
                method: 'delete',
                success: function() {
                    $('.payment-'+index).fadeOut(1000, function(){
                        $(this).remove();
                    });
                }
            })
        }
    });
});

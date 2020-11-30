
$(document).ready(function () {
    $(".buton-solved").click(function () {
        let index = $(this).data('value');
        if (confirm("Are you sure?")) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/feedback/solved/' + index,
                method: 'post',
                success: function () {
                    window.location.href = '/admin/feedback/index/?'+index;
                }
            });
        }
    });

});

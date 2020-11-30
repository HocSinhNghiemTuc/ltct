function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
function setVaild(ele, index = true) {
    if (index) {
        if (ele.val() == "") {
            ele.parent().removeClass('has-success').addClass('has-error');
        } else {
            ele.parent().removeClass('has-error').addClass('has-success')
        }
    } else {
        if (!validateEmail(ele.val())) {
            ele.parent().removeClass('has-success').addClass('has-error');
        } else {
            ele.parent().removeClass('has-error').addClass('has-success')
        }
    }
}
$(document).ready(function () {
    $(".submit-feedback").click(function () {
        let email = $(".feedback-email");
        let content = $('.feedback-content');
        if(validateEmail(email.val().trim()) && content.val().trim() != ""){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/feedback/create',
                method: 'post',
                data: {
                    email: email.val().trim(),
                    content: content.val().trim()
                },
                success: function () {
                    window.location.href = '/';
                }
            })
        }else{
           setVaild(email,false);
           setVaild(content);
        }
    });
});

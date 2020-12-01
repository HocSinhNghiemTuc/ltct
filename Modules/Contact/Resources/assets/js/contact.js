function validURL(string) {
    var res = string.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
    return (res !== null)
}

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
    $('.button-contact-save').click(function () {
        let index = $(this).data('value');
        let name = $('.contact-name-' + index);
        let link = $('.contact-link-' + index);
        let icon = $('.contact-icon-' + index);
        let color = $('.contact-color-' + index);
        if (name.val() != "" && link.val() != "" && icon.val() != "") {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/contact/update/' + index,
                method: 'post',
                data: {
                    'contact_name': name.val(),
                    'contact_value': link.val(),
                    'contact_icon': icon.val(),
                    'contact_color': color.val()
                },
                success: function (data) {
                    window.location.href = '/admin/contact/index/?'+index;
                }
            })
        } else {
            setVaild(name);
            setVaild(link);
            setVaild(icon);
        }
    });
    $('.button-contact-new').click(function () {
        let link = $('.contact-link-new');
        let name = $('.contact-name-new');
        let icon = $('.contact-icon-new');
        if (name.val() != "" && link.val() != "" && icon.val() != "") {
            $('form.contact-from-new').submit();
        } else {
            setVaild(name);
            setVaild(link);
            setVaild(icon);
        }
    });
    $('.contact-status').change(function () {
        let index = $(this).data('value');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/contact/state/' + index,
            method: 'post'
        })
    });
    $('.contact-show').change(function () {
        let index = $(this).data('value');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/contact/show/' + index,
            method: 'post'
        })
    });
    $('.contact-icon-new').keyup(function () {
        let icon = $(this).val();
        let color = $('.contact-color-new').val();
        $('.contact-from-new').find('i').removeClass().addClass("offset-1 " + icon + " fa-5x");
    });
    $('.contact-color-new').change(function () {
        let color = $(this).val();
        let icon = $('.contact-icon-new').val();
        $('.contact-from-new').find('i').css('color', color);
    });
    $('.contact-icon').keyup(function () {
        let index = $(this).data('value');
        let icon = $(this).val();
        let color = $('.contact-color-' + index).val();
        $('#contact-icon-' + index).removeClass().addClass("offset-1 " + icon + " fa-5x").css('color', color);
    });
    $('.contact-color').change(function () {
        let index = $(this).data('value');
        let color = $(this).val();
        let icon = $('.contact-icon-' + index).val();
        $('#contact-icon-' + index).css('color', color);
    });
    $('.contact-delete').click(function () {
        let index = $(this).data('value');
        if (confirm("Are you sure?")) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/contact/delete/' + index,
                method: 'delete',
                success: function() {
                    $('.contact-'+index).fadeOut(1000, function(){
                        $(this).remove();
                    });
                }
            })
        }
    });
    $('.link-font').click(function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        window.open(url, '_blank');
    });
});

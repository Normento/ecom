$(document).ready(function () {
    //cheick if admin password is correct or not
    $('#current_password').keyup(function () {
        var current_password = $('#current_password').val()
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/admin/check-current-password",
            data: {current_password:current_password},
            success: function (resp) {
                if (resp == 'false') {
                    $('#check_password').html("<font color='red'>Current Password is not correct")
                } else if (resp == 'true') {
                    $("#check_password").html(
                        "<font color='greer'>Current Password is correct"
                    );
                }
            }, error: function () {
                alert('Error')
            }
        });
    });
})

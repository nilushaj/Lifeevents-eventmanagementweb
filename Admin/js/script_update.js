

$(function () {
    $("#username_error_message").hide();
    $("#email_error_message").hide();
    $("#oldpassword_error_message").hide();
    $("#password_error_message").hide();
    $("#retype_password_error_message").hide();
    $("#fileupload_error").hide();

    var error_username = false;
    var error_old = false;
    var error_password = false;
    var error_retype_password = false;
    var error_email = false;
    var file_error=false;


    $("#username").keyup(function () {

        check_username();

    });

    $("#email").keyup(function () {

        check_email();

    });


    $("#password").keyup(function () {

        check_password();

    });

    $("#password_confirm").keyup(function () {

        check_retype_password();

    });



    $("#username").focusout(function () {

        check_username();

    });

    $("#email").focusout(function () {

        check_email();

    });

    $("#password").focusout(function () {

        check_password();

    });

    $("#password_confirm").focusout(function () {

        check_retype_password();

    });
    $("#image").focusout(function () {

        check_file();

    });


    function check_username() {
        var username = $("#username").val();
        var username_length = $("#username").val().length;
        if (username_length == 0) {

            $("#username_error_message").hide();

        }
        else if (username_length < 5 || username_length > 20) {
            $("#username_error_message").html("Should be between 5-20 characters");
            $("#username_error_message").show();
            error_username = true;
        } else {
            $.post('check_update.php', {username: username},
                function (data) {
                    $('#username_error_message').html(data);
                });


        }

    }


    function check_password() {

        var password_length = $("#password").val().length;
        if (password_length == 0) {
            $("#password_error_message").hide();
            error_password = true;
        }
        else if (password_length < 8) {
            $("#password_error_message").html("At least 8 characters");
            $("#password_error_message").show();
            error_password = true;
        } else {
            $("#password_error_message").hide();
        }

    }


    function check_retype_password() {

        var password = $("#password").val();
        var retype_password = $("#password_confirm").val();

        if (password != retype_password) {
            $("#retype_password_error_message").html("Passwords don't match");
            $("#retype_password_error_message").show();
            error_retype_password = true;
        } else {
            $("#retype_password_error_message").hide();
        }

    }

    function check_email() {

        var email = $("#email").val();
        var lemail = $("#email").val().length;
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        if (lemail == 0) {
            $("#email_error_message").hide();
        }

        else if (pattern.test($("#email").val())) {

            $.post('check_update.php', {email: email},
                function (data) {

                    if(data=="Email already used"){

                        $('#email_error_message').html(data);
                        $("#email_error_message").show().removeClass('good_form');
                        $("#email_error_message").show().addClass('error_form');
                        error_email = true;

                    }
                    else{

                        $('#email_error_message').html(data);
                        $("#email_error_message").show().removeClass('error_form');
                        $("#email_error_message").show().addClass('good_form');
                        error_email = false;
                    }

                });
        }
        else {
            $("#email_error_message").html("Invalid email address");
            $("#email_error_message").show();
            error_email = true;
        }

    }
    function check_file() {
        var fileInput = document.getElementById('image');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        if(!allowedExtensions.exec(filePath)){
            $("#fileupload_error").html("Choose an image file");
            $("#fileupload_error").show();
            file_error = true;
        }
        else {

        }

    }

    $("#registration_form").submit(function () {

        error_username = false;
        error_password = false;
        error_retype_password = false;
        error_email = false;
        file_error = false;
        error_old=false;

        check_username();

        check_password();
        check_retype_password();
        check_email();
        check_file();

        if (error_username == false && error_password == false && error_retype_password == false && error_email == false && file_error == false && error_old == false) {
            return true;
        } else {
            return false;
        }

    });

});
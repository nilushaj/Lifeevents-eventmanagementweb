$(function () {
    $("#first_error_message").hide();
    $("#last_error_message").hide();
    $("#username_error_message").hide();
    $("#email_error_message").hide();
    $("#password_error_message").hide();
    $("#retype_password_error_message").hide();
    $("#fileupload_error").hide();
    var error_fname = false;
    var error_lname = false;
    var error_username = false;
    var error_password = false;
    var error_retype_password = false;
    var error_email = false;
    var file_error = false;

    $("#firstname").keyup(function () {

        check_firstname();

    });
    $("#lastname").keyup(function () {

        check_lastname();

    });
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

    $("#firstname").focusout(function () {

        check_firstname();

    });
    $("#lastname").focusout(function () {

        check_lastname();

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

    function check_firstname() {
        var username = $("#firstname").val();
        var username_length = $("#firstname").val().length;
        if (username_length == 0) {
            $("#first_error_message").show().addClass('error_form');
            $("#first_error_message").html("Enter First Name");
            error_fname=true;

        }else{
            $("#first_error_message").html("");
        }
    }
    function check_lastname() {
        var username = $("#lastname").val();
        var username_length = $("#lastname").val().length;
        if (username_length == 0) {
            $("#last_error_message").show().addClass('error_form');
            $("#last_error_message").html("Enter First Name");
            error_lname=true;

        }else{
            $("#last_error_message").html("");
        }
    }



    function check_username() {
        var username = $("#username").val();
        var username_length = $("#username").val().length;
        if (username_length == 0) {

            $("#username_error_message").hide();
            error_username=true;

        }
        else if (username_length < 5 || username_length > 20) {
            $("#username_error_message").show().removeClass('good_form');
            $("#username_error_message").show().addClass('error_form');
            $("#username_error_message").html("Should be between 5-20 characters");

            error_username = true;
        } else {
            $.post('check.php', {username: username},
                function (data) {
                    if (data == "username not available")
                    {
                        $('#username_error_message').html(data);
                        $("#username_error_message").show().removeClass('good_form');
                        $("#username_error_message").show().addClass('error_form');
                    }
                    else{
                        $('#username_error_message').html(data);
                        $("#username_error_message").show().removeClass('error_form');
                        $("#username_error_message").show().addClass('good_form');
                    }
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
            error_email = true;
            $("#email_error_message").html("Enter email address");
        }
        else if (pattern.test($("#email").val())) {

            $.post('check.php', {email: email},
                function (data) {
                    if (data == "Email already used") {

                        $('#email_error_message').html(data);
                        $("#email_error_message").show().removeClass('good_form');
                        $("#email_error_message").show().addClass('error_form');
                        error_email = true;

                    }
                    else {

                        $('#email_error_message').html(data);
                        $("#email_error_message").show().removeClass('error_form');
                        $("#email_error_message").show().addClass('good_form');
                        error_email = false;
                    }


                });
        } else {
            $("#email_error_message").show().removeClass('good_form');
            $("#email_error_message").show().addClass('error_form');
            $("#email_error_message").html("Invalid email address");
            error_email = true;
        }

    }

    function check_file() {
        var fileInput = document.getElementById('image');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.JPEG|\.JPG|\.PNG|\.GIF)$/i;

        if (!allowedExtensions.exec(filePath)) {
            $("#fileupload_error").html("Choose an image file");
            $("#fileupload_error").show();
            file_error = true;
        }
        else {
            $("#fileupload_error").html("");
            $("#fileupload_error").show();
        }

    }

    $("#registration_form").submit(function () {

        error_username = false;
        error_password = false;
        error_retype_password = false;
        error_email = false;
        file_error = false;

        check_username();
        check_password();
        check_retype_password();
        check_email();
        check_file();

        if (error_username == false && error_password == false && error_retype_password == false && error_email == false && file_error == false) {
            return true;
        } else {
            return false;
        }

    });

});
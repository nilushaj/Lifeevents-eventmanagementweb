$(function () {
    $("#username_error_message").hide();
    $("#email_error_message").hide();
    $("#fileupload_error").hide();

    var error_username = false;
    var error_email = false;
    var file_error = false;


    $("#employeename").keyup(function () {

        check_username();

    });

    $("#email").keyup(function () {

        check_email();

    });



    $("#employeename").focusout(function () {

        check_username();

    });

    $("#email").focusout(function () {

        check_email();

    });


    $("#image").focusout(function () {

        check_file();

    });


    function check_username() {
        var username = $("#employeename").val();
        var username_length = $("#employeename").val().length;

        if (username_length == 0) {

            $("#username_error_message").html("Enter Employee Name");
            error_username=true;

        }

         else {

            $("#username_error_message").html("");
            error_username=false;

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
            $("#email_error_message").hide();

        } else {
            $("#email_error_message").html("Invalid email address");
            $("#email_error_message").show().removeClass('good_form');
            $("#email_error_message").show().addClass('error_form');
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
            $("#fileupload_error").hide();
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
<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    include 'dbconnect.php';




    if (isset($_POST['login'])) {


        $uid = $connect->escape_string($_POST['username']);
        $result = $connect->query("SELECT * FROM admin WHERE adminname='$uid'");


        if ($result->num_rows <= 0) {
            echo '<script>alert("Invalid Username")</script>';
        } else {
            $user = $result->fetch_assoc();


            if ($_POST['password'] == $user['password']) {



                echo  '<script> location.replace("index.php"); </script>';
            } else {
                echo '<script>alert("Password is not correct!!")</script>';

            }


        }
    }

    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LifeEvent-AdminLogIn</title>
    <link href="css/bootstrap1.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min1.css" rel="stylesheet">
    <link href="css/bootstrap-responsive1.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/font-awesome.min1.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet">
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>

<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php"><img src="images/logo.png" alt="logo"></a>
        </div>

    </div>
</header><!--/header-->

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Admin Log In</h1>
                <p>Log as Admin!!</p>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
</section><!--/#title-->
<style>

    .admin{
        position: absolute;
        top:35%;
        left:40%;
        width: 40%;

    }
    .gif{
        position: absolute;
        top:40%;
        left:15%;
    }
    .gif1{
        position: absolute;
        top:40%;
        left:65%;
    }
    .gif2{
        position: absolute;
        top:70%;
        left:65%;
    }
    .gif3{
        position: absolute;
        top:70%;
        left:15%;
    }
    .gif4{
        position: absolute;
        top:75%;
        left:40%;
    }





</style>

<section id="registration" class="admin">

    <form id=registration_form method="post" action="LogIn.php">

                <label style="font-size: 20px;" >Enter Username:</label>
                <i style=" height: 50px;font-size: 18px;" class="glyphicon glyphicon-user"></i>
                <input style="width: 50%; height: 50px;font-size: 18px;" type="text" id="username" name="username" placeholder="Username" class="form_text">
               <span class="error_form" id="username_error_message"></span>

                <label style="font-size: 20px;">Enter Password:</label>
        <i style=" height: 50px;font-size: 18px;" class="glyphicon glyphicon-lock"></i>
                <td><input style="width: 50%; height: 50px; font-size: 18px;" type="password" id="password" name="password" class="form_text" placeholder="Password"></td>
                <span class="error_form" id="password_error_message"></span>
                <br/>
                <button style="width: 50%; height: 50px;font-size: 18px;" class="smart-green button" type="submit" name="login" id="login">Log In
                </button>

    </form>

</section>




</footer><!--/#footer-->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>
</html>
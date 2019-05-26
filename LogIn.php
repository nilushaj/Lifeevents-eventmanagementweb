<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    include 'dbconnect.php';
    session_start();
    $_SESSION = array();
    session_destroy();

include 'dbconnect.php';




    $uid = "guest";




    if (isset($_POST['login'])) {


        $usid = $connect->escape_string($_POST['username']);
        $result = $connect->query("SELECT * FROM user WHERE username='$usid'");


        if ($result->num_rows <= 0) {
            echo '<script>alert("Invalid Username")</script>';
        } else {
            $user = $result->fetch_assoc();


            if ($_POST['password'] == $user['password']) {
                session_start();

                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['logged_in'] = true;

                echo  '<script> location.replace("MyAccount.php"); </script>';
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
    <title>User Login</title>
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
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="portfolio.php">Gallery</a></li>
                <li><a href="about-us.php">About Us</a></li> <li><a href="booking.php">Online Booking</a></li>

                <?php
                if ($uid == 'guest') {
                    echo '<li><a href="registration.php">Register</a></li>';
                    echo '<li><a href="LogIn.php">Log In</a></li>';
                } else {
                    $sqlu = 'Select * from user where username="' . $uid . '"';
                    $sthu = $connect->query($sqlu);
                    $resultu = mysqli_fetch_assoc($sthu);
                    $sid = $resultu['imageid'];
                    echo '<a href="MyAccount.php"><img class="avatar img-circle" src="data:image/jpeg;base64,' . base64_encode($sid) . '" width=45
            height=45 alt=""></a>
             
             <li><a href="booking.php">Online Booking</a></li><li><a href="MyAccount.php">My Account</a></li>
             <li><a href="LogIn.php">LogOut</a></li>';
                }

                ?>


            </ul>
        </div>
    </div>
</header><!--/header-->

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Log In</h1>

            </div>

        </div>
    </div>
</section><!--/#title-->

<section id="registration" class="container">
    <div class="log">

        <form id=registration_form method="post" action="LogIn.php">

            <label style="font-size: 20px;" >Enter Username:</label>
            <i style=" height: 50px;font-size: 18px;" class="glyphicon glyphicon-user"></i>
            <input style="width: 30%; height: 50px;font-size: 18px;" type="text" id="username" name="username" placeholder="Username" class="form_text">


            <label style="font-size: 20px;">Enter Password:</label>
            <i style=" height: 50px;font-size: 18px;" class="glyphicon glyphicon-lock"></i><input style="width: 30%; height: 50px; font-size: 18px;" type="password" id="password" name="password" class="form_text" placeholder="Password">

            <br/>
            <button style="width: 30%; height: 50px;font-size: 18px;" class="smart-green button" type="submit" name="login" id="login">Log In
            </button>

        </form>
    </div>
</section>
<style>

    .gif{
        position: absolute;
        top:41%;
        left:38%;
    }
    .gif1{
        position: absolute;
        top:44%;
        left:66%;
    }



</style>
<div class="gif">
    <img src="images/gif/giphy.gif" style="border-radius: 10px;"height="300" width="300"/>
</div>
<div class="gif1">
    <br/>

    <a href="registration.php"><button style="border-radius: 15px;" class="btn btn-success btn-md btn-block" type="submit" ><h4>&nbsp;&nbsp;&nbsp;Don't have an Account? Register!!&nbsp;&nbsp;&nbsp;</h4></button></a>

    <hr>

    <a href="Admin/LogIn.php"> <button style="border-radius: 15px;" class="btn btn-success btn-md btn-block" type="submit" ><h4>Log As Admin</h4>
    </button></a>
</div>

<section id="bottom" class="wet-asphalt">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>About Us</h4>
                <p>We are Organizing any event as your wish
                    Musical Shows, Dramas, Birthday Party etc...

                    Also we provide Photography , Videography Service & Flower flower decoration

                    we are providing Accommodation & Travel guide for who wish to travel in sri lanka. Apart from that we are specialized for camping,cycling,abseiling,trekking & etc.</p>
            </div><!--/.col-md-3-->

            <!--/.col-md-3-->

            <!--/.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <h4>Address</h4>
                <address>
                    <strong>Life Events (pvt) Ltd.</strong><br>
                    28 Maharathanne, Kandy<br>
                    Sri Lanka, 2014<br>
                    <abbr title="Phone">P:</abbr> +94812375352
                </address>


            </div> <!--/.col-md-3-->
            <div class="col-sm-4">
                <h4>Our Location</h4>
                <iframe style="border-radius: 10px;" width="100%" height="215" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d860.0361355067042!2d80.70172630840645!3d7.320941389421717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMTknMTUuNCJOIDgwwrA0MicwOC4zIkU!5e1!3m2!1sen!2slk!4v1510648366706"></iframe>
            </div>
        </div>
    </div>
</section><!--/#bottom-->

<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2017 CMIS Web Project.
                All Rights Reserved.
            </div>

        </div>
    </div>
</footer><!--/#footer-->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>
</html>
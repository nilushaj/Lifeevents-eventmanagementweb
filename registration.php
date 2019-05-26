<!DOCTYPE html>



<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registration</title>
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
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>

    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">



</head><!--/head-->
<body>
<?php

include 'dbconnect.php';

if (isset($_SESSION['username'])) {
    $uid = $_SESSION['username'];
} else {
    $uid = "guest";
}
?>
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
             
             <li><a href="MyAccount.php">My Account</a></li>
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
                    <h1>Registration</h1>
                                    </div>

            </div>
        </div>
    </section><!--/#title-->

    <section id="registration" class="container">
        <legend align="center">Registration</legend>
        <form id=registration_form class='formreg'action="" method="post" action="registration.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label><span>First_Name: </span></label></td>
                    <td>  <input type="text" id="firstname" name="firstname" placeholder="First Name" class="form_text"></td>
                    <td><span class="error_form" id="first_error_message"></span></td>
                </tr>
                <tr>
                    <td><label><span>Last_Name: </span></label></td>
                    <td>  <input type="text" id="lastname" name="lastname" placeholder="Last Name" class="form_text"></td>
                    <td><span class="error_form" id="last_error_message"></span></td>
                </tr>
                <tr>
                    <td><label><span>Username: </span></label></td>
                    <td>  <input type="text" id="username" name="username" placeholder="Username" class="form_text"></td>
                    <td><span class="error_form" id="username_error_message"></span></td>
                </tr>
                <tr>
                    <td><label><span>Email: </span></label></td><td><input type="text" id="email" name="email" class="form_text" placeholder="E-mail" >
                      </td>
                    <td><span class="error_form" id="email_error_message"></span></td>
                </tr>

                <tr>
                    <td><label><span>Password: </span></label></td>
                    <td><input type="password" id="password" name="password"  class="form_text" placeholder="Password" ></td>
                    <td><span class="error_form" id="password_error_message"></span></td>
                </tr>

                <tr>
                    <td><label><span>Con.Password: </span></label></td><td>
                        <input type="password" id="password_confirm"  class="form_text" name="password_confirm" placeholder="Password (Confirm)" ></td>
                    <td><span class="error_form" id="retype_password_error_message"></span>
                    </td>
                </tr>
                <tr>
                    <td><label><span>Mobile: </span></label></td><td> <input type="text" id="mobile" size="10" class="form_text" name="mobile" placeholder="mobile" >
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td><label><span>Pro.Picture: </span></label></td><td> <input type="file" id="image" name="image" >
                    </td>
                    <td><span class="error_form" id="fileupload_error"></span></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button class="smart-green button" type="submit" name="submit" id="submit">Register</button> </td>
                    <td></td>
                </tr>
            </table>
            <?php
            if (isset($_POST['submit'])){
                $fname=$_POST['firstname'];
                $lname=$_POST['lastname'];
                $usname = $_POST['username'];

                $usemail = $_POST['email'];
                $password= $_POST['password'];
                $mob=$_POST['mobile'];
                $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                $query="INSERT INTO user(firstname,lastname,username, email, password, Mobile, imageid) VALUES ('$fname','$lname','$usname','$usemail','$password','$mob','$file')";
                if(mysqli_query($connect, $query))
                {

                    echo  '<script> location.replace("LogIn.php"); </script>';

                }
                else{
                    echo '<script>alert("Error!! User Name or Email is Existing")</script>';
                }



            }
            ?>

        </form>




    </section><!--/#registration-->

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
    <script src="js/script.js"></script>
</body>
</html>
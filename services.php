<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Services</title>


    
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
    <?php
    session_start();
    ?>
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
                <h1>Services</h1>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Services</li>
                </ul>
            </div>
        </div>
    </div>
</section><!--/#title-->

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="center gap">
                    <h1>What we do</h1>
                    <h4>Plan and design your event based on your aims. Throughout our entire process we will keep in mind your brand image and purpose of the event and tailor it to this starting point.</h4>
                </div>
            </div>
        </div>


        <div class="row-fluid">
            <ul class="thumbnails">
                <li class="span4">
                    <a href="Photography.php?service=serv1"> <div class="thumbnail" style="border-radius: 15px;">
                        <?php
                        $sql = 'SELECT * FROM services where Service_id="serv1"';
                        $sth = $connect->query($sql);
                        $result=mysqli_fetch_assoc($sth);
                        $sdetails=substr($result['details'],0,200);
                        echo '<img style="border-radius: 15px;" src="data:image/jpeg;base64,'.base64_encode( $result['coverpic'] ).'"/>';
                        ?>

                        <div class="media-body">
                            <h3 class="media-heading" align="center">Photography</h3>
                            <h5><?php
                                echo $sdetails;
                                ?></h5>
                        </div>
                        <div class="widget-footer" align="center" >
                            <p>
                                <a class="btn btn-default" href="Photography.php?service=serv1">Read More</a>
                            </p>
                        </div>
                        </div></a>
                </li>
                <li class="span4">
                    <a href="Videography.php?service='serv2'" ><div style="border-radius: 15px;" class="thumbnail">
                        <?php
                        $sql = 'SELECT * FROM services where Service_id="serv2"';
                        $sth = $connect->query($sql);
                        $result=mysqli_fetch_assoc($sth);
                        $sdetails=substr($result['details'],0,200);
                        echo '<img style="border-radius: 15px;" src="data:image/jpeg;base64,'.base64_encode( $result['coverpic'] ).'"/>';
                        ?>
                        
                        <div class="media-body">
                            <h3 class="media-heading" align="center">Videography</h3>
                            <h5><?php
                                echo $sdetails;
                                ?></h5></p>
                        </div>
                        <div class="widget-footer" align="center">

                            <p>
                                &nbsp;
                                <a href="Videography.php?service='serv2'" class="btn">Read more</a>
                            </p>
                        </div>
                        </div></a>
                </li>
                <li class="span4">
                    <a href="Adventure.php?service='serv3'" ><div style="border-radius: 15px;" class="thumbnail">
                        <?php
                        $sql = 'SELECT * FROM services where Service_id="serv3"';
                        $sth = $connect->query($sql);
                        $result=mysqli_fetch_assoc($sth);
                        $sdetails=substr($result['details'],0,200);
                        echo '<img style="border-radius: 15px;" src="data:image/jpeg;base64,'.base64_encode( $result['coverpic'] ).'"/>';
                        ?>
                        <div class="media-body">
                            <h3 class="media-heading" align="center">Hiking</h3>
                            <h5><?php
                                echo $sdetails;
                                ?></h5></p>
                        </div>
                        <div class="widget-footer" align="center">
                            <p>
                                &nbsp;
                                <a href="Adventure.php?service='serv3'" class="btn">Read more</a>
                            </p>
                        </div>
                        </div></a>
                </li>
            </ul>
        </div>
        <div class="row-fluid">
            <ul class="thumbnails">
                <li class="span4">
                    <a href="Dj.php?service='serv4'">

                        <div  style="border-radius: 15px;" class="thumbnail">
                        <?php
                        $sql = 'SELECT * FROM services where Service_id="serv4"';
                        $sth = $connect->query($sql);
                        $result=mysqli_fetch_assoc($sth);
                        $sdetails=substr($result['details'],0,200);
                        echo '<img style="border-radius: 15px;" src="data:image/jpeg;base64,'.base64_encode( $result['coverpic'] ).'"/>';
                        ?>
                        <div class="media-body">
                            <h3 class="media-heading" align="center">DJ Music</h3>
                            <h5><?php
                                echo $sdetails;
                                ?></h5>
                        </div>
                        <div class="widget-footer" align="center">
                            <p>
                                &nbsp;
                                <a href="Dj.php?service='serv4'" class="btn">Read more</a>
                            </p>
                        </div>
                        </div></a>
                </li>
                <li class="span4">
                    <a href="Flower.php?service='serv5'"> <div style="border-radius: 15px;" class="thumbnail">
                        <?php
                        $sql = 'SELECT * FROM services where Service_id="serv5"';
                        $sth = $connect->query($sql);
                        $result=mysqli_fetch_assoc($sth);
                        $sdetails=substr($result['details'],0,200);
                        echo '<img style="border-radius: 15px;" src="data:image/jpeg;base64,'.base64_encode( $result['coverpic'] ).'"/>';
                        ?>
                       <div class="media-body">
                            <h3 class="media-heading" align="center">Flower Decorating</h3>
                           <h5><?php
                               echo $sdetails;
                               ?></h5>
                        </div>
                        <div class="widget-footer" align="center">
                            <p>
                                &nbsp;
                                <a href="Flower.php?service='serv5'" class="btn">Read more</a>
                            </p>
                        </div>
                        </div></a>
                </li>

            </ul>
        </div>
        <hr>

    </div>
</section><!--/#services-->

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
</body>
</html>
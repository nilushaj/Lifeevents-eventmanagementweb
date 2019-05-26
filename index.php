<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
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
<section id="main-slider" class="no-margin">
    <div class="carousel slide wet-asphalt">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content center centered">
                                <h2 style="border-radius: 10px" class="boxed animation animated-item-1">Capturing moments from today…Creating memories for a lifetime</h2>
                                <h3 style="border-radius: 10px" class="boxed animation animated-item-2">Because you want to remember for ever.</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item" style="background-image: url(images/slider/bg2.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content center centered">
                                <h2 style="border-radius: 10px"class="boxed animation animated-item-1">Capturing the beauty of your everyday life</h2><br/>
                                <h4 style="border-radius: 10px"class="boxed animation animated-item-2">Let me help you to tell your story</h4>
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="carousel-content centered">
                                <h2 style="border-radius: 10px" class="boxed animation animated-item-1">Music expresses that which cannot be put into words and cannot remain silent.</h2>


                            </div>
                        </div>
                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="centered">

                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="icon-angle-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="icon-angle-right"></i>
    </a>
</section><!--/#main-slider-->

<section id="services" class="emerald">
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Our Services</h1>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<table align="center">
        <tr>
            <td> <a href="Photography.php"><img style="border-radius: 10px;" src="images/gif/photography.gif" height="200" width="290"></a></td>
            <td><a href="Videography.php"><img style="border-radius: 10px;" src="images/gif/video.gif" height="200" width="290"></a></td>
            <td><a href="Adventure.php"><img style="border-radius: 10px;" src="images/gif/hiking.gif" height="200" width="290"></a></td>
            <td><a href="Flower.php"><img style="border-radius: 10px;" src="images/gif/flower.gif" height="200" width="290"></a></td>
            <td><a href="Dj.php"><img style="border-radius: 10px;" src="images/gif/music.gif" height="200" width="290"></a></td>
        </tr>
        <tr>
            <td align="center"> <h3>Photography</h3></td>
            <td align="center"><h3>Videography</h3></td>
            <td align="center"><h3>Adventure Activities</h3></td>
            <td align="center"><h3>Flower Decorations</h3></td>
            <td align="center"><h3>DJ Music</h3></td>
        </tr>



    </table>


</section><!--/#services-->

<section id="recent-works">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Our Activities</h3>
                <h4>Here are some of our activities enjoy!</h4>
                <div class="btn-group">
                    <a class="btn btn-danger" href="#scroller" data-slide="prev"><i class="icon-angle-left"></i></a>
                    <a class="btn btn-danger" href="#scroller" data-slide="next"><i class="icon-angle-right"></i></a>
                </div>
                <p class="gap"></p>
            </div>
            <div class="col-md-8">
                <div id="scroller" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-xs-11" >
                                    <div class="portfolio-item">
                                        <div class="item-inner" style="border-radius: 10px;">
                                            <iframe style="border-radius: 10px;" width="650" height="400"
                                                    src="https://www.youtube.com/embed/SBbex0rhNzI?rel=0"
                                                    frameborder="0" allowfullscreen></iframe>
                                            <h4>
                                                WaterFall Hunting Knuckles
                                            </h4>

                                        </div>
                                    </div>
                                </div>



                            </div><!--/.row-->
                        </div><!--/.item-->
                        <div class="item ">
                            <div class="row">
                                <div class="col-xs-11" >
                                    <div class="portfolio-item">
                                        <div class="item-inner" style="border-radius: 10px;">
                                            <iframe style="border-radius: 10px;" width="650" height="400"
                                                    src="https://www.youtube.com/embed/gSSohsGhVHM"
                                                    frameborder="0" allowfullscreen></iframe>
                                            <h4>
                                                Adventure in Knuckles
                                            </h4>

                                        </div>
                                    </div>
                                </div>





                            </div>
                        </div><!--/.item-->
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-11" >
                                    <div class="portfolio-item">
                                        <div class="item-inner" style="border-radius: 10px;">
                                            <iframe style="border-radius: 10px;" width="650" height="400"
                                                    src="https://www.youtube.com/embed/YBhf4pIEV5w"
                                                    frameborder="0" allowfullscreen></iframe>
                                            <h4>
                                                Wedding Trailer
                                            </h4>

                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>
</section><!--/#recent-works-->

<section id="recent-works">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Up Coming Public Events :</h3>
                <h4>Feel Free to Attend</h4>
                <p class="gap"></p>
            </div>
            <div class="col-md-8">
                <div id="scroller1" class="carousel slide">
                    <div class="carousel-inner">

                        <?php
                        $date = date("Y-m-d");
                        $sqlu = 'Select * from public_events where event_date >="' . $date . '" ORDER by event_date DESC';
                        $sthu = $connect->query($sqlu);
                        while ($result = mysqli_fetch_array($sthu)) {
                            $eimage = $result['event_image'];
                            echo '<div class="item active">
                                <div class="row">
                                <div style="border-radius: 10px;" class="col-xs-11">
                                        <div class="portfolio-item">
                                            <div class="item-inner" style="border-radius: 15px;">
                                                <img style="border-radius: 10px;" class="img-responsive" src="data:image/jpeg;base64,' . base64_encode($eimage) . '" alt="">
                                                <h4>' . $result['eventname'] . '&nbsp; '.$result['event_date'].'&nbsp; @'.$result['address'].'
                                       
                                        </h4>
                                                <div class="overlay">
                                                    <a class="preview btn btn-danger" title="' . $result['description'] . '" href="data:image/jpeg;base64,' . base64_encode($eimage) . '" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     </div><!--/.row-->
                </div><!--/.item-->';
                        }


                        ?>



            </div>
        </div>
    </div>
    </div><!--/.row-->
    </div>
</section>

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

            <div class="col-md-2 col-sm-6">
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
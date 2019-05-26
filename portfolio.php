
<?php

$page_title = "Image Gallery";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Life Event Albums</title>
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

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1><?php echo $page_title; ?></h1>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Gallery</li>
                </ul>
            </div>
        </div>
    </div>
</section><!--/#title-->

<section id="portfolio" class="container">
    <div class="container">
        <?php


        $access_token = "1966719383578198|SmGjeUHFF3r4oHoJr4aNfFn8n0U";

        $fields = "id,name,description,link,cover_photo,count";
        $fb_page_id = "108490359492492";
        $json_link = "https://graph.facebook.com/v2.8/{$fb_page_id}/albums?fields={$fields}&access_token={$access_token}";
        $json = file_get_contents($json_link);
        $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

        $album_count = count($obj['data']);
        for ($x = 0; $x < $album_count; $x++) {
            $id = isset($obj['data'][$x]['id']) ? $obj['data'][$x]['id'] : "";
            $name = isset($obj['data'][$x]['name']) ? $obj['data'][$x]['name'] : "";
            $url_name = urlencode($name);
            $description = isset($obj['data'][$x]['description']) ? $obj['data'][$x]['description'] : "";
            $link = isset($obj['data'][$x]['link']) ? $obj['data'][$x]['link'] : "";
            $cover_photo = isset($obj['data'][$x]['cover_photo']['id']) ? $obj['data'][$x]['cover_photo']['id'] : "";

// use this for older access tokens:
// $cover_photo = isset($obj['data'][$x]['cover_photo']) ? $obj['data'][$x]['cover_photo'] : "";

            $count = isset($obj['data'][$x]['count']) ? $obj['data'][$x]['count'] : "";

// if you want to exclude an album, just add the name on the if statement
            if (
                $name != "Profile Pictures" &&
                $name != "Cover Photos" &&
                $name != "Timeline Photos"
            ) {

                $show_pictures_link = "photos.php?album_id={$id}&album_name={$name}";

                echo "<div  class='col-md-4'>
<a href='{$show_pictures_link}'>
<img style='border-radius: 15px;' class='img-responsive' src='https://graph.facebook.com/v2.3/{$cover_photo}/picture?access_token={$access_token}' alt=''>
</a>
<h3><a href='{$show_pictures_link}'>{$name}</a>
</h3>";

                $count_text = "Photo";
                if ($count > 1) {
                    $count_text = "Photos";
                }

                echo "<p>";
                echo "<div style='color:#0e0e0e;'>{$count} {$count_text} / <a href='{$link}' target='_blank'>View on Facebook</a></div>";
                echo $description;
                echo "</p>";
                echo "</div>";
            }
        }
        ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
   <!--/#portfolio-->
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
</footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

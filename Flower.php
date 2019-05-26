<?php
session_start();
include_once('functionsflower.php');
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Flower Decorating</title>
    <link href="css/bootstrap1.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min1.css" rel="stylesheet">
    <link href="css/bootstrap-responsive1.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/font-awesome.min1.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link  rel="stylesheet" href="style.css"/>
    <script src="jquery.min.js"></script>

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

if(isset($_SESSION['username'])){
    $uid=$_SESSION['username'];
}
else{
    $uid="guest";
}
?>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=144716315690681";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


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
                    <h1>Flower Decoration</h1>

                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li class="active">Flower Decor</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->

    <section id="blog" class="container">
        <div class="row">
            <aside class="col-sm-4 col-sm-push-8">




                <div class="widget categories" >
                    <h3 align="center">Our Services</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="arrow">
                                <li><a href="Photography.php">Photography</a></li>
                                <li><a href="Videography.php">Videography</a></li>
                                <li><a href="Adventure.php">Hiking</a></li>
                                <li><a href="Dj.php">DJ-Music</a></li>
                                <li><a href="Flower.php">Flower Decoration</a></li>

                            </ul>
                        </div>
                    </div>
                </div><!--/.categories-->


                <div class="widget facebook-fanpage">
                    <h3>Facebook Fanpage</h3>
                    <div class="widget-content">
                        <div class="fb-like-box" data-href="https://www.facebook.com/lifeventslk/" data-width="292" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                    </div>
                </div>
            </aside>
            <div class="col-sm-8 col-sm-pull-4">
                <div class="blog">
                    <div class="blog-item">
                        <?php

                        $sql = 'SELECT * FROM services where Service_id="serv5"';
                        $sth = $connect->query($sql);
                        $result=mysqli_fetch_assoc($sth);
                        $sdetails=$result['LongDescrip'];
                        $simage=$result['coverpic'];


                        echo '<img style="border-radius: 5px;" class="img-responsive img-blog" src="data:image/jpeg;base64,'.base64_encode( $simage ).'" width="100%" alt="" />';
                        ?>
                        <div class="blog-content">

                            <h3>Flower Decorations</h3>
                            <p>
                                <?php
                                echo $sdetails;
                                ?>
                            </p>
                               <hr>

                            <?php
                            $sql = 'SELECT * FROM flowerpackage where service_id="serv5"';
                            $result = $connect->query($sql);

                            echo "<table border='1' cellpadding='10' width='50%' class='rwd-table'>";
                            echo "<tr> <th>Package</th> <th>Flower Type</th>  <th>Flower Name</th>  <th>No of Tables</th>  <th>Price(LKR)</th> </tr>";

                            while($row = $result->fetch_assoc())
                            {
                                echo "<tr>";
                                echo '<td>' . $row['package_name'] . '</td>';
                                echo '<td>' . $row['type_of_flower'] . '</td>';
                                echo '<td>' . $row['name_of_flower'] . '</td>';
                                echo '<td>' . $row['no_of_table'] . '</td>';
                                echo '<td>' . $row['price'] . '</td>';  
                                echo "</tr>";
                            }
                            echo "</table>";
                            ?>
                            <hr>
                            <div id="calendar_div">
                                <?php echo getCalender(); ?>
                            </div>
                            <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/><br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>


                            <?php
$sql = "SELECT * FROM comments where servid='serv5'";
$result=mysqli_query($connect,$sql);
$rowcount=mysqli_num_rows($result);


?>

                            <div id="comments">
                                <div id="comments-list">
                                    <?php
                                    if($rowcount>1){
                                    echo '<h3>'.$rowcount.' comments</h3>';
                                    }else{
                                        echo '<h3>'.$rowcount.' comment </h3>';
                                    }
                                    ?>

                                    <?php
                                    $sql = "SELECT * FROM comments where servid='serv5'";
                                    $sth = $connect->query($sql);
                                    while($result=mysqli_fetch_array($sth)) {
                                        $usern = $result['username'];

                                        $sqlu = 'Select * from user where username="' . $usern . '"';
                                        $sthu = $connect->query($sqlu);
                                        $resultu = mysqli_fetch_assoc($sthu);
                                        $sid = $resultu['imageid'];
                                        echo '<div class="media">
                                        <div class="pull-left">';
                                        echo '<img class="avatar img-circle" src="data:image/jpeg;base64,' . base64_encode($sid) . '" width=50
                                                 height=50 alt="">';
                                        echo '</div>
                                        <div class="media-body">
                                            <div class="well">
                                                <div class="media-heading">
                                                    <strong>' . $usern . '</strong>&nbsp; <small>' . $result['cmntdate'] . '</small>
                                                    
                                                </div>
                                                <p>' . $result['comment']
                                            . '</p>
                                            </div>';
                                            if($result['reply']==Null){

                                            }
                                            else{
                                            echo '<div class="media">
                                                <div class="pull-left">
                                                    <img class="avatar img-circle" src="images/gif/tenor.gif" width=50 height=50 alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="well">
                                                        <div class="media-heading">
                                                            <strong>Admin</strong>&nbsp; <small>' . $result['redate'] . '</small>
                                                           
                                                        </div>
                                                        <p>' . $result['reply'] . '</p>
                                                    </div>
                                                </div>
                                            </div>';
                                            }
                                       echo  '</div>
                                    </div>';
                                    }
                                    ?>


                                    </div><!--/.media-->
                                <?php
;
                                if($uid=='guest'){
                                    echo '<h3>Please Log In to Comment</h3><a class="btn btn-default" href="LogIn.php">Log In</a>';
                                }

                                else {
                                    $sqlu = 'Select * from user where username="' . $uid . '"';
                                    $sthu = $connect->query($sqlu);
                                    $resultu = mysqli_fetch_assoc($sthu);
                                    $sid = $resultu['imageid'];

                                    echo '<div id="comment-form">
                                    <h3>Leave a comment</h3>
                                    <form class="form-horizontal" role="form" action="Flower.php" method="post">
                                     
                                        <div class="pull-left">';
                                        echo '<img class="avatar img-circle" src="data:image/jpeg;base64,' . base64_encode($sid) . '" width=50
                                                 height=50 alt=""> '.$resultu['username'].'<h5>'.$resultu['email'].'</h5>                                        
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" name="submitted" value="true"/>
                                                <textarea rows="8" name="comment" class="form-control" placeholder="Comment"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-danger btn-lg">Submit Comment</button>';


                                    if (isset($_POST['submitted'])){
                                        $uc = $_POST['comment'];
                                        $rowcount=$rowcount+1;
                                        $date=date("Y-m-d");
                                        $query = "INSERT into comments (username,comment,cmntdate,servid) values('$uid','$uc','$date','serv5')";
                                        if (mysqli_query($connect,$query)) {
                                            echo  '<script> location.replace("Flower.php"); </script>';
                                        } else {
                                            echo "<script>alert('Comment didnt post');</script>";
                                        }
                                    }
                                     echo '</form>
                                </div>';
                                }
                                ?><!--/#comment-form-->
                            </div><!--/#comments-->
                        </div>
                    </div><!--/.blog-item-->
                </div>
            </div><!--/.col-md-8-->
        </div><!--/.row-->
    </section><!--/#blog-->

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
    <script src="js/main.js"></script>
</body>
</html>
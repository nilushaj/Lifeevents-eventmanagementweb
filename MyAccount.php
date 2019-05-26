<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My Account</title>
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

            <div class="center">
                <?php
                $sqlu = 'Select * from user where username="' . $uid . '"';
                $sthu = $connect->query($sqlu);
                $resultu = mysqli_fetch_assoc($sthu);
                $sid = $resultu['imageid'];
                echo '<img class="avatar img-circle" src="data:image/jpeg;base64,' . base64_encode($sid) . '" width=150
        height=150 alt=""><h3>' . $resultu['firstname'] . ' ' . $resultu['lastname'] . '</h3><h4>' . $resultu['username'] . '</h4><h4>' . $resultu['email'] . '</h4>';
                ?>
            </div>

        </div>
    </div>
</section><!--/#title-->


<section id="registration" class="container">


    <hr>
    <form >
        <legend align="center">User Details</legend>
        <br/>
        <table>
            <tr>
                <td><label><span>First_Name </span></label></td>
                <td>  <input type="text" value="<?php echo $resultu['firstname']?>" id="firstname" name="firstname" class="form_text" readonly></td>

            </tr>
            <tr>
                <td><label><span>Last_Name </span></label></td>
                <td>  <input type="text" id="lastname" value="<?php echo $resultu['lastname']?>" name="lastname"  class="form_text" readonly></td>

            </tr>
            <tr>

                <td><label><span>Username </span></label></td>
                <td>  <input type="text" id="username" name="username" value="<?php echo $resultu['username']?>" class="form_text" readonly/></td>

            </tr>
            <tr>
                <td><label><span>Email </span></label></td><td><input type="text" id="email" value="<?php echo $resultu['email']?>" name="email" class="form_text"  readonly/>
                </td>

            </tr>

            <tr>
                <td><label><span>password </span></label></td>
                <td><input type="password" id="password" name="password"  value="<?php echo $resultu['password']?>" class="form_text" readonly/></td>

            </tr>


            <tr>
                <td><label><span>Mobile </span></label></td><td> <input type="text" id="mobile" value="<?php echo $resultu['Mobile']?>" size="30" class="form_text" name="mobile" readonly/>
                </td>

            </tr>
            <tr><td></td>
                <td><a href="Update.php" <button class="smart-green button"  type="button">Update</button></td>

            </tr>
        </table>
    </form>
    <hr>

    <?php
    $sql = 'SELECT * FROM   booking where username="'.$uid.'"';
    $result = $connect->query($sql);
    echo '<legend align="center">Booking History</legend>';

    echo "<table border='1' cellpadding='10' align='center' width='50%' class='rwd-table'>";
    echo "<tr> <th>Event Name</th> <th>Photography</th>  <th>Videography</th>  <th>Hiking</th>  <th>DJ sounds</th> <th>Flower Decoration</th><th>Event Date</th><th>Start Time</th><th>End Time</th><th>Place</th><th>Available</th> <th>Paid</th><th>Paid ID</th> <th>Accept</th><th>Price (Rs:)</th><th>Comments</th></tr>";

    while($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo '<td>' . $row['eventname'] . '</td>';
        echo '<td>' . $row['photography'] . '</td>';
        echo '<td>' . $row['videography'] . '</td>';
        echo '<td>' . $row['hiking'] . '</td>';
        echo '<td>' . $row['djsounds'] . '</td>';
        echo '<td>' . $row['flower'] . '</td>';
        echo '<td>' . $row['event_date'] . '</td>';
        echo '<td>' . $row['starttime'] . '</td>';
        echo '<td>' . $row['endtime'] . '</td>';
        echo '<td>' . $row['place'] . '</td>';
        echo '<td>' . $row['available'] . '</td>';
        echo '<td>' . $row['paid'] . '</td>';
        echo '<td>' . $row['paid_id'] . '</td>';
        echo '<td>' . $row['accept'] . '</td>';
        echo '<td>' . $row['price'] . '</td>';
        echo '<td>' . $row['comments'] . '</td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <hr>

    <div class="form-group">
        <a href="booking.php"><button class="btn btn-success btn-md btn-block">Click here to Book Online</button></a>
    </div>

</section>



<!-- /Career -->
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
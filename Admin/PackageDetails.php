<?php

include 'dbconnect.php';

if (isset($_SESSION['username'])) {
    $uid = $_SESSION['username'];
} else {
    $uid = "guest";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Life Event-Packages</title>
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
                <li><a href="PackageDetails.php">Package Details</a></li>
                <li><a href="bookingAdmin.php">Booking Details</a></li>
                <li><a href="upcomingevent.php">UpComing Events</a></li>
                <li><a href="replycomment.php">Comments</a></li>
                <li><a href="userdetails.php">User Details</a></li>
                <li><a href="employeedetails.php">Employee Details</a></li>
                <li><a href="LogIn.php">Log Out</a></li>


            </ul>
        </div>
    </div>
</header><!--/header-->

    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Package Details</h1>

                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Package Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->
<div align="center" class="center">
    <hr>
    <legend align="center">Photography Package Details</legend>
    <?php
    $sql = 'SELECT * FROM packages where Service_id="serv1"';
    $result = $connect->query($sql);

    echo "<table align='center' border='1' cellpadding='10' width='50%' class='rwd-table'>";
    echo "<tr> <th>Package</th> <th>#Photographers</th>  <th>Hours</th>  <th>#Photos</th>  <th>StoryBook</th> <th>PreShoot</th> <th>SoftCopyDvD</th> <th>Price (Rs:)</th></tr>";

    while($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo '<td>' . $row['package_name'] . '</td>';
        echo '<td>' . $row['noofphotographers'] . '</td>';
        echo '<td>' . $row['hours'] . '</td>';
        echo '<td>' . $row['noofphotos'] . '</td>';
        echo '<td>' . $row['storybook'] . '</td>';
        echo '<td>' . $row['preshoot'] . '</td>';
        echo '<td>' . $row['softcopydvd'] . '</td>';
        echo '<td>' . $row['price'] . '</td>';
        echo "</tr>";
    }
    echo "</table>";

    ?>
    <br/>
    <div class="form-group">
        <a href="photopackage.php"><button class="btn btn-success btn-md btn-block">Add/Edit/Delete Packages</button></a>
    </div>
</div>
<hr>
    <div align="center" class="center">
        <legend align="center">Videography Package Details</legend>
        <?php
        $sql = 'SELECT * FROM videopackage where service_id="serv2"';
        $result = $connect->query($sql);

        echo "<table align='center' border='1' cellpadding='10' width='50%' class='rwd-table'>";
        echo "<tr> <th>Package</th> <th>No of Hours</th>  <th>No of cameras</th>  <th>Soft Copy</th>  <th>After Movie</th> <th>Live Stream</th> <th>Price(LKR)</th></tr>";

        while($row = $result->fetch_assoc())
        {
            echo "<tr>";
            echo '<td>' . $row['package_name'] . '</td>';
            echo '<td>' . $row['no_of_hours'] . '</td>';
            echo '<td>' . $row['no_of_cameras'] . '</td>';
            echo '<td>' . $row['soft_copy'] . '</td>';
            echo '<td>' . $row['after_movie'] . '</td>';
            echo '<td>' . $row['live_stream'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';

            echo "</tr>";
        }
        echo "</table>";
        ?>
        <br/>
        <div class="form-group">
            <a href="videopackage.php"><button class="btn btn-success btn-md btn-block">Add/Edit/Delete Packages</button></a>
        </div>
    </div>

    <hr>
    <div align="center" class="center">
        <legend align="center">Adventure Activities Package Details</legend>
        <?php
        $sql = 'SELECT * FROM hikingpackage where Service_id="serv3"';
        $result = $connect->query($sql);

        echo "<table align='center' border='1' cellpadding='10' width='50%' class='rwd-table'>";
        echo "<tr> <th>Package</th> <th>No of Dates</th> <th>No of Meals</th>  <th>Maximum Participants</th>  <th>Price(LKR)</th></tr>";

        while($row = $result->fetch_assoc())
        {
            echo "<tr>";
            echo '<td>' . $row['package_name'] . '</td>';
            echo '<td>' . $row['no_of_days'] . '</td>';
            echo '<td>' . $row['no_of_meals'] . '</td>';
            echo '<td>' . $row['no_of_participant'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';

            echo "</tr>";
        }
        echo "</table>";
        ?>
        <br/>
        <div class="form-group">
            <a href="hikepackage.php"><button class="btn btn-success btn-md btn-block">Add/Edit/Delete Packages</button></a>
        </div>
    </div>
    <hr>
    <div align="center" class="center">
        <legend align="center">DJ Music Package Details</legend>
        <?php
        $sql = 'SELECT * FROM djpackage where Service_id="serv4"';
        $result = $connect->query($sql);

        echo "<table align='center' border='1' cellpadding='10' width='50%' class='rwd-table'>";
        echo "<tr> <th>Package</th> <th>Venue</th>  <th>Playing Hours</th>  <th>Price(LKR)</th> </tr>";

        while($row = $result->fetch_assoc())
        {
            echo "<tr>";
            echo '<td>' . $row['package_name'] . '</td>';
            echo '<td>' . $row['venue'] . '</td>';
            echo '<td>' . $row['playing_Hours'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';

            echo "</tr>";
        }
        echo "</table>";
        ?>
        <br/>
        <div class="form-group">
            <a href="djpackage.php"><button class="btn btn-success btn-md btn-block">Add/Edit/Delete Packages</button></a>
        </div>
    </div>
    <hr>
    <div align="center" class="center">
        <legend align="center">Flower Package Details</legend>
        <?php
        $sql = 'SELECT * FROM flowerpackage where Service_id="serv5"';
        $result = $connect->query($sql);

        echo "<table align='center' border='1' cellpadding='10' width='50%' class='rwd-table'>";
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
        <br/>
        <div class="form-group">
            <a href="flowerpackage.php"><button class="btn btn-success btn-md btn-block">Add/Edit/Delete Packages</button></a>
        </div>
    </div>

    <br/> <br/>  <hr><!--/#pricing-->

<section id="bottom" >

</section><!--/#bottom-->

<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2017 CMIS Web Project. All Rights Reserved.
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
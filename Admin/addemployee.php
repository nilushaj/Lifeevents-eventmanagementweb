<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>UpComing Event</title>
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
            <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Home</a></li>
                <li><a href="PackageDetails.php">Package Details</a></li>
                <li><a href="bookingAdmin.php">Booking Details</a></li>
                <li><a href="upcomingevent.php">UpComing Events</a></li>
                <li><a href="replycomment.php">Comments</a></li>
                 <li><a href="userdetails.php">User Details</a></li>                    <li><a href="employeedetails.php">Employee Details</a></li>
                <li><a href="LogIn.php">Log Out</a></li>


            </ul>
        </div>
    </div>
</header><!--/header-->
<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Add New Employee</h1>

            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="employeedetails.php">Employee Details</a></li>
                    <li class="active">Add New Employee</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="registration" class="container">
    <legend align="center">Add New Employee</legend>
    <form id=registration_form action="" method="post" action="addemployee.php" method="post"
          enctype="multipart/form-data">
        <div class="form-group">
            <label><span>Employee Name: </span></label>
            <input type="text" style="width: 30%" id="employeename" name="employeename" placeholder="Employee Name" class="form_text">
            <span class="error_form" id="username_error_message"></span>
        </div>
        <div class="form-group">
            <label><span>Title: </span></label>
            <select class="form-text" id="title" name="title">
                <option value="Director">Director</option>
                <option value="General Manager">General Manager</option>
                <option value="HR Manager">HR Manager</option>
                <option value="HR Manager">Event manager</option>
                <option value="Photographer">Photographer</option>
                <option value="Videographer">Videographer</option>
                <option value="Guide">Guide</option>
                <option value="DJ Musician">DJ Musician</option>
                <option value="Flower Decorator">Flower Decorator</option>
                <option value="Office Assistant">Office Assistant</option>

            </select>
        </div>

        <div class="form-group">
            <label><span>Qualification: </span></label><textarea rows="7" style="width: 30%;" id="qualification" name="qualification" class="form-control"  placeholder="Descrition"></textarea>
        </div>
        <div class="form-group">
            <label><span>E-mail: </span></label>
            <input type="text" style="width: 30%" id="email" name="email" placeholder="E Mail" class="form_text"><span class="error_form" id="email_error_message"></span>
        </div>
        <div class="form-group">
            <label><span>Mobile: </span></label>
            <input type="text" id="mobile" name="mobile" placeholder="Mobile" class="form_text">
        </div>
        <div class="form-group">
            <label><span>Address: </span></label>
            <input style="width: 30%" type="text" id="address" name="address" placeholder="Address" class="form_text">
        </div>

        <div class="form-group">
            <label><span>ID Picture: </span></label>
            <label class="btn btn-primary">

                Browse<input style="display: none;" type="file" id="image" name="image"/>
            </label><span class="error_form" id="fileupload_error"></span>


        </div>
        <div class="form-group">
            <label><span></span></label>
            <button class="smart-green button center-block" type="submit" name="submit" id="submit">Submit</button>
        </div>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $ename = $_POST['employeename'];
        $title = $_POST['title'];
        $qualification = $_POST['qualification'];
        $email = $_POST['email'];
        $mob = $_POST['mobile'];
        $address = $_POST['address'];
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $query = "INSERT INTO employees(employee_name, title, qualification, email, mobile, address, photo_id) VALUES ('$ename','$title','$qualification','$email','$mob','$address','$file')";
        if (mysqli_query($connect, $query)) {

            echo '<script> location.replace("employeedetails.php"); </script>';

        } else {
            echo '<script>alert("Error!!")</script>';
        }


    }
    ?>


</section>


<section id="bottom">

</section><!--/#bottom-->

<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2017 CMIS Web Project. All Rights Reserved.
            </div>

        </div>
    </div>
</footer>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
<script src="js/script.js"></script>
</body>
</html>
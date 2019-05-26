<?php


if (isset($_SESSION['username'])) {
    $uid = $_SESSION['username'];
} else if (isset($_SESSION['username'])) {
    $uid = "guest";
}
$connect = mysqli_connect("localhost", "root", "123", "lifeevents");
$query = "SELECT * FROM employees";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="ASCription" content="">
    <meta name="author" content="">
    <title>Life Event-Photography</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
                <li><a href="upcomingevent.php">UpComing Events</a></li><li><a href="replycomment.php">Comments</a></li> <li><a href="userdetails.php">User Details</a></li>                    <li><a href="employeedetails.php">Employee Details</a></li>
                <li><a href="LogIn.php">Log Out</a></li>


            </ul>
        </div>
    </div>
</header><!--/header-->

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>User Details</h1>

            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.php">Home</a></li>

                    <li class="active">Employee Details</li>
                </ul>
            </div>
        </div>
    </div>
</section><!--/#title-->

<section id="pricing">
    <div class="container" style="width:100%;">
        <h3 align="center"></h3>
        <br/>
        <div align="right">
            <a href="addemployee.php" ><button type="button" name="add" id="add" class="btn btn-warning">Add
                </button></a>
        </div>

        <br/>
        <div id="employee_table">
            <table class="table table-bordered">
                <tr>
                <tr>
                    <th style="width:20%;"><h5><b>Employee Name</b></h5></th>
                    <th style="width:5%;"><h5><b>Title</b></h5></th>
                    <th style="width:30%;"><h5><b>Qualification</b></h5></th>
                    <th style="width:15%;"><h5><b>E-mail</b></h5></th>
                    <th style="width:7%;"><h5><b>Mobile</b></h5></th>
                    <th style="width:7%;"><h5><b>Address</b></h5></th>
                    <th style="width:7%;"><h5><b>ID Pictue</b></h5></th>
                    <th style="width:5%;"><h5><b>Edit</b></h5></th>
                    <th style="width:5%;"><h5></h5><b>Delete</b></h4></th>
                </tr>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><h5  style="margin-top: 30px"><?php echo $row['employee_name']; ?></h5></td>
                        <td ><h5 style="margin-top: 30px"><?php echo $row['title']; ?></h5></td>
                        <td ><h5 style="margin-top: 30px"><?php echo $row['qualification']; ?></h5></td>
                        <td ><h5 style="margin-top: 30px"><?php echo $row['email']; ?></h5></td>
                        <td ><h5 style="margin-top: 30px"><?php echo $row['mobile']; ?></h5></td>
                        <td ><h5 style="margin-top: 30px"><?php echo $row['address']; ?></h5></td>
                        <td align="center" ><?php echo '<img class="avatar img-circle" src="data:image/jpeg;base64,' . base64_encode( $row['photo_id']) . '" width=75
        height=75 alt="">'; ?></td>

                        <td><a href="updateemployee.php?id=<?php echo $row['employee_id']; ?>" >
                                <input style="width: 100%; height: 40px; margin-top: 20px; font-size : 15px;" type="button" name="delete" value="Edit"  class="btn btn-info btn-xs view_data"/></a></td>
                        <td><a href="deleteemployee.php?id=<?php echo $row['employee_id']; ?>" >
                                <input style="width: 100%; height: 40px; margin-top: 20px; font-size : 15px;" type="button" name="delete" value="Delete"  class="btn btn-info btn-xs view_data"/></a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>

        </div>
    </div>
</section><!--/#pricing-->







<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2017 CMIS Web Project. All Rights Reserved.
            </div>

        </div>
    </div>
</footer>
<!--/#footer-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>

</body>
</html>
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
                <h1>UpComing Events</h1>

            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.php">Home</a></li>

                    <li class="active">UpComing Events</li>
                </ul>
            </div>
        </div>
    </div>
</section>
    <section id="registration" class="container">
        <legend align="center">UpComing Events</legend>
        <form id=registration_form method="post" style="width:70%;" action="upcomingevent.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label><span>Event_name: </span></label>
                <input type="text" id="eventname" name="eventname" placeholder="eventname" class="form_text">
            </div>
            <div class="form-group">
                <label><span>Description: </span></label><textarea  rows="7" style="width: 30%;"  id="description" name="description" class="form-control" placeholder="Descrition"></textarea>
            </div><div class="form-group">
                <label><span>Event_Date: </span></label><input  style=" height: 35px;" type="date" id="date" name="date" class="form_text" onchange="Check()">
                <script>
                    function Check() {

                        var selectedText = document.getElementById('date').value;
                        var selectedDate = new Date(selectedText);
                        var now = new Date();
                        if (selectedDate < now) {
                            alert("Date is Invalid");
                            document.getElementById('date').value="";
                        }

                    }
                </script>
            </div>
            <div class="form-group">
                <label><span>Address: </span></label> <textarea type="text" id="address" rows="7" style="width: 30%;" size="10" class="form-control" name="address" placeholder="Address" ></textarea>

            </div>
            <div class="form-group">
                <label><span>Cover_Picture: </span></label>
                <label class="btn btn-primary">

                    Browse<input style="display: none;"  type="file" id="image" name="image"/>
                </label>



            </div>
            <div  class="form-group">
                <label><span></span></label>
                <button class="smart-green button center-block" type="submit" name="submit" id="submit">Submit</button>
            </div>



                <?php
            if (isset($_POST['submit'])){
                $ename = $_POST['eventname'];
                $desc = $_POST['description'];
                $date = $_POST['date'];
                $address = $_POST['address'];

                $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                $query="INSERT INTO public_events(eventname, description, event_date, address, event_image) VALUES ('$ename','$desc','$date','$address','$file')";
                if(mysqli_query($connect, $query))
                {

                    echo  '<script> location.replace("upcomingevent.php"); </script>';

                }
                else{
                    echo '<script>alert("Error!!File not Uploaded")</script>';
                }



            }
            ?>

        </form>

        <style>
            .deleteevent{
                position: absolute;
                top:42%;
                left: 47%;

                width: 50%;
            }
        </style>
        <div class="deleteevent">
            <div class="container" style="width:100%;">
                <h3 align="center"></h3>
                <br/>
                <div class="table-responsive">

                    <br/>
                    <div id="employee_table">
                        <table class="table table-bordered">
                            <tr>
                            <tr>
                                <th style="width:20%;">Event_Name</th>
                                <th style="width:40%;">Description</th>
                                <th style="width:5%;">Event_Date</th>
                                <th style="width:20%;">Address</th>
                                <th style="width:5%;">Delete</th>
                            </tr>
                            </tr>
                            <?php
                            $connect = mysqli_connect("localhost", "root", "123", "lifeevents");
                            $query = "SELECT * FROM public_events ORDER BY event_date ASC ";
                            $result = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>

                                <tr>
                                    <td><?php echo $row['eventname']; ?></td>
                                    <td ><?php echo $row['description']; ?></td>
                                    <td ><?php echo $row['event_date']; ?></td>
                                    <td ><?php echo $row['address']; ?></td>


                                    <td><a href="deleteupcomingevent.php?id=<?php echo $row['event_id']; ?>" >
                                            <input type="button" name="delete" value="delete" id="<?php echo $row['event_id']; ?>"
                                                   class="btn btn-info btn-xs view_data"/></a></td>

                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>

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
</footer>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
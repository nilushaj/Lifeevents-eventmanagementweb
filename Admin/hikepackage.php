<?php


if (isset($_SESSION['username'])) {
    $uid = $_SESSION['username'];
} else if (isset($_SESSION['username'])) {
    $uid = "guest";
}
$connect = mysqli_connect("localhost", "root", "123", "lifeevents");
$query = "SELECT * FROM hikingpackage ORDER BY price ASC";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="ASCription" content="">
    <meta name="author" content="">
    <title>Life Event-Hiking</title>

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
                <h1>Adventure Package Details</h1>
                <p>Add Edit Delete packages</p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.php">Home</a></li>
                    <li ><a href="PackageDetails.php">Package Details</a></li>
                    <li class="active">Adventure Activities</li>
                </ul>
            </div>
        </div>
    </div>
</section><!--/#title-->

<section id="pricing">
    <div class="container" style="width:700px;">
        <h3 align="center"></h3>
        <br/>
        <div class="table-responsive">
            <div align="right">
                <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal"
                        class="btn btn-warning">Add
                </button>
            </div>
            <br/>
            <div id="employee_table">
                <table class="table table-bordered">
                    <tr>
                        <th width="70%">Package Name</th>
                        <th width="15%">Edit</th>
                        <th width="15%">View</th>
                        <th width="15%">Delete</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['package_name']; ?></td>
                            <td><input type="button" name="edit" value="Edit" id="<?php echo $row['package_name']; ?>"
                                       class="btn btn-info btn-xs edit_data"/></td>
                            <td><input type="button" name="view" value="view" id="<?php echo $row['package_name']; ?>"
                                       class="btn btn-info btn-xs view_data"/></td>
                            <td><a href="deletehikepackage.php?id=<?php echo $row['package_name']; ?>" >
                                    <input type="button" name="delete" value="delete" id="<?php echo $row['package_name']; ?>"
                                                                                          class="btn btn-info btn-xs view_data"/></a></td>

                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

</section><!--/#pricing-->

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
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Booking Details</h4>
            </div>
            <div class="modal-body" id="booking_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Event</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <label>Enter Package Name</label>
                    <input type="text" name="name" id="name" class="form-control"/>
                    <br/>
                    <label>Enter No of Days</label>
                    <input type="text" value="0" name="days" id="days" class="form-control"/>
                    <br/>

                    <label>Enter No of Meals</label>
                    <input type="text" value="0" name="meals" id="meals" class="form-control"/>
                    <br/><label>Enter No of Participants</label>
                    <input type="text" value="0" name="participants" id="participants" class="form-control"/>
                    <br/>

                    <label>Price(Rs):</label>
                    <br/>
                    <input type="text" value="0.00" class="form-control" id="totprice" name="totprice" value="0.00"/>

                    <br/>                  


                    <input type="hidden" name="booking_id" id="booking_id"/>
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success"/>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#add').click(function () {
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });
        $(document).on('click', '.edit_data', function () {
            var booking_id = $(this).attr("id");
            $.ajax({
                url: "fetchhike.php",
                method: "POST",
                data: {booking_id: booking_id},
                dataType: "json",
                success: function (data) {
                    $('#name').val(data.package_name);
                    $('#days').val(data.no_of_days);
                    $('#meals').val(data.no_of_meals);
                    $('#participants').val(data.no_of_participant);
                    $('#totprice').val(data.price);

                    $('#booking_id').val(data.package_name);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });
        $('#insert_form').on("submit", function (event) {
            event.preventDefault();
            if ($('#name').val() == "") {
                alert("Name is required");
            }

            else if ($('#totprice').val() == '') {
                alert("Price is required");
            }

            else {
                $.ajax({
                    url: "inserthike.php",
                    method: "POST",
                    data: $('#insert_form').serialize(),
                    beforeSend: function () {
                        $('#insert').val("Inserting");
                    },
                    success: function (data) {
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                        $('#employee_table').html(data);
                    }
                });
            }

        });
        $(document).on('click', '.view_data', function () {
            var booking_id = $(this).attr("id");
            if (booking_id != '') {
                $.ajax({
                    url: "selecthike.php",
                    method: "POST",
                    data: {booking_id: booking_id},
                    success: function (data) {
                        $('#booking_detail').html(data);
                        $('#dataModal').modal('show');
                    }
                });
            }
        });
    });
</script>
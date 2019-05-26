<?php


include 'dbconnect.php';
if (isset($_SESSION['username'])) {
    $uid = $_SESSION['username'];
} else if (isset($_SESSION['username'])) {
    $uid = "guest";
}
$connect = mysqli_connect("localhost", "root", "123", "lifeevents");
$query = "SELECT * FROM booking ORDER BY bookingid DESC";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="ASCription" content="">
    <meta name="author" content="">
    <title>Life Event-Booking</title>

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
                <h1>Manage Booking Details</h1>
                <p>Now you can reserve us online! </p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Booking</li>
                </ul>
            </div>
        </div>
    </div>
</section><!--/#title-->

<section id="pricing">
    <?php
    $sql = "SELECT * FROM booking ORDER BY bookingid DESC";
    $result1 = $connect->query($sql);
    echo '<legend align="center">All Booking Requests</legend>';

    echo "<table border='1' cellpadding='10' align='center' width='50%' class='rwd-table'>";
    echo "<tr> <th>Event Name</th> <th>User Name</th> <th>Photography</th>  <th>Videography</th>  <th>Hiking</th>  <th>DJ sounds</th> <th>Flower Decoration</th><th>Event_Date</th><th>Start_Time</th><th>End_Time</th><th>Place</th><th>Available</th> <th>Paid</th><th>Paid ID</th> <th>Accept</th><th>Price (Rs:)</th><th>Comments</th></tr>";

    while($row1 = $result1->fetch_assoc())
    {
        echo "<tr>";
        echo '<td>' . $row1['eventname'] . '</td>';
        echo '<td>' . $row1['username'] . '</td>';
        echo '<td>' . $row1['photography'] . '</td>';
        echo '<td>' . $row1['videography'] . '</td>';
        echo '<td>' . $row1['hiking'] . '</td>';
        echo '<td>' . $row1['djsounds'] . '</td>';
        echo '<td>' . $row1['flower'] . '</td>';
        echo '<td>' . $row1['event_date'] . '</td>';
        echo '<td>' . $row1['starttime'] . '</td>';
        echo '<td>' . $row1['endtime'] . '</td>';
        echo '<td>' . $row1['place'] . '</td>';
        echo '<td>' . $row1['available'] . '</td>';
        echo '<td>' . $row1['paid'] . '</td>';
        echo '<td>' . $row1['paid_id'] . '</td>';
        echo '<td>' . $row1['accept'] . '</td>';
        echo '<td>' . $row1['price'] . '</td>';
        echo '<td>' . $row1['comments'] . '</td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <hr>
    <?php
    $sql = "SELECT * FROM booking where available='Yes' AND accept='No'ORDER BY bookingid DESC";
    $result1 = $connect->query($sql);
    echo '<legend align="center">Available Booking Requests</legend>';

    echo "<table border='1' cellpadding='10' align='center' width='50%' class='rwd-table'>";
    echo "<tr> <th>Event Name</th> <th>User Name</th> <th>Photography</th>  <th>Videography</th>  <th>Hiking</th>  <th>DJ sounds</th> <th>Flower Decoration</th><th>Event_Date</th><th>Start_Time</th><th>End_Time</th><th>Place</th><th>Available</th> <th>Paid</th><th>Paid ID</th> <th>Accept</th><th>Price (Rs:)</th><th>Comments</th></tr>";

    while($row1 = $result1->fetch_assoc())
    {
        echo "<tr>";
        echo '<td>' . $row1['eventname'] . '</td>';
        echo '<td>' . $row1['username'] . '</td>';
        echo '<td>' . $row1['photography'] . '</td>';
        echo '<td>' . $row1['videography'] . '</td>';
        echo '<td>' . $row1['hiking'] . '</td>';
        echo '<td>' . $row1['djsounds'] . '</td>';
        echo '<td>' . $row1['flower'] . '</td>';
        echo '<td>' . $row1['event_date'] . '</td>';
        echo '<td>' . $row1['starttime'] . '</td>';
        echo '<td>' . $row1['endtime'] . '</td>';
        echo '<td>' . $row1['place'] . '</td>';
        echo '<td>' . $row1['available'] . '</td>';
        echo '<td>' . $row1['paid'] . '</td>';
        echo '<td>' . $row1['paid_id'] . '</td>';
        echo '<td>' . $row1['accept'] . '</td>';
        echo '<td>' . $row1['price'] . '</td>';
        echo '<td>' . $row1['comments'] . '</td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <hr>
    <?php
    $sql = "SELECT * FROM booking where available='Yes' AND accept='No' AND paid='Yes' ORDER BY bookingid DESC";
    $result1 = $connect->query($sql);
    echo '<legend align="center">Paid Booking Requests</legend>';

    echo "<table border='1' cellpadding='10' align='center' width='50%' class='rwd-table'>";
    echo "<tr> <th>Event Name</th> <th>User Name</th> <th>Photography</th>  <th>Videography</th>  <th>Hiking</th>  <th>DJ sounds</th> <th>Flower Decoration</th><th>Event_Date</th><th>Start_Time</th><th>End_Time</th><th>Place</th><th>Available</th> <th>Paid</th><th>Paid ID</th> <th>Accept</th><th>Price (Rs:)</th><th>Comments</th></tr>";

    while($row1 = $result1->fetch_assoc())
    {
        echo "<tr>";
        echo '<td>' . $row1['eventname'] . '</td>';
        echo '<td>' . $row1['username'] . '</td>';
        echo '<td>' . $row1['photography'] . '</td>';
        echo '<td>' . $row1['videography'] . '</td>';
        echo '<td>' . $row1['hiking'] . '</td>';
        echo '<td>' . $row1['djsounds'] . '</td>';
        echo '<td>' . $row1['flower'] . '</td>';
        echo '<td>' . $row1['event_date'] . '</td>';
        echo '<td>' . $row1['starttime'] . '</td>';
        echo '<td>' . $row1['endtime'] . '</td>';
        echo '<td>' . $row1['place'] . '</td>';
        echo '<td>' . $row1['available'] . '</td>';
        echo '<td>' . $row1['paid'] . '</td>';
        echo '<td>' . $row1['paid_id'] . '</td>';
        echo '<td>' . $row1['accept'] . '</td>';
        echo '<td>' . $row1['price'] . '</td>';
        echo '<td>' . $row1['comments'] . '</td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <hr>
    <?php
    $sql = "SELECT * FROM booking where available='Yes' AND accept='Yes' ORDER BY bookingid DESC";
    $result1 = $connect->query($sql);
    echo '<legend align="center">Accept Booking Requests</legend>';

    echo "<table border='1' cellpadding='10' align='center' width='50%' class='rwd-table'>";
    echo "<tr> <th>Event Name</th> <th>User Name</th> <th>Photography</th>  <th>Videography</th>  <th>Hiking</th>  <th>DJ sounds</th> <th>Flower Decoration</th><th>Event_Date</th><th>Start_Time</th><th>End_Time</th><th>Place</th><th>Available</th> <th>Paid</th><th>Paid ID</th> <th>Accept</th><th>Price (Rs:)</th><th>Comments</th></tr>";

    while($row1 = $result1->fetch_assoc())
    {
        echo "<tr>";
        echo '<td>' . $row1['eventname'] . '</td>';
        echo '<td>' . $row1['username'] . '</td>';
        echo '<td>' . $row1['photography'] . '</td>';
        echo '<td>' . $row1['videography'] . '</td>';
        echo '<td>' . $row1['hiking'] . '</td>';
        echo '<td>' . $row1['djsounds'] . '</td>';
        echo '<td>' . $row1['flower'] . '</td>';
        echo '<td>' . $row1['event_date'] . '</td>';
        echo '<td>' . $row1['starttime'] . '</td>';
        echo '<td>' . $row1['endtime'] . '</td>';
        echo '<td>' . $row1['place'] . '</td>';
        echo '<td>' . $row1['available'] . '</td>';
        echo '<td>' . $row1['paid'] . '</td>';
        echo '<td>' . $row1['paid_id'] . '</td>';
        echo '<td>' . $row1['accept'] . '</td>';
        echo '<td>' . $row1['price'] . '</td>';
        echo '<td>' . $row1['comments'] . '</td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <div class="container" style="width:100%;">



        <br/>
        <div class="table-responsive">

            <br/>
            <div id="employee_table">
                <table class="table table-bordered">
                    <tr>
                        <th width="70%">Event name</th>
                        <th width="15%">Edit</th>
                        <th width="15%">View</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td ><?php echo $row['eventname']; ?></td>
                            <td><input type="button" name="edit" value="Edit" id="<?php echo $row['bookingid']; ?>"
                                       class="btn btn-info btn-xs edit_data"/></td>
                            <td><input type="button" name="view" value="view" id="<?php echo $row['bookingid']; ?>"
                                       class="btn btn-info btn-xs view_data"/></td>
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
                    <label>Enter Event Name</label>
                    <input style="width: 200px;"  type="text" name="name" id="name" class="form-control" readonly/>
                    <br/>
                    <label>Photography Package </label>
                    <select disabled="disabled" name="photopackage" id="photopackage" class="form-control">
                        <option value="no">No</option>
                        <?php
                        $connect = mysqli_connect("localhost", "root", "123", "lifeevents");
                        $query = "SELECT * FROM packages ORDER BY Price ASC";
                        $resultp = mysqli_query($connect, $query);
                        $pricephoto = 0;

                        while ($row = mysqli_fetch_array($resultp)) {

                            echo '<option value="' . $row['package_name'] . '">' . $row['package_name'] . '</option>';


                        }

                        ?>
                    </select>

                    <br/>
                    <label>Price (Rs:)</label>

                    <input type="text" name="photoprice" id="photoprice" value="0.00" class="form-control" readonly/>
                    <script>
                        $(document).ready(function () {
                            $('#photopackage').change(function () {
                                var photopackage = $(this).val();
                                $.ajax({
                                    url: "set.php",
                                    method: "POST",
                                    data: {photopackage: photopackage},
                                    success: function (data) {
                                        $('#photoprice').val(data);
                                    }
                                });
                            });
                        });
                    </script>
                    <br/>

                    <label>Videography Package </label>
                    <select disabled="disabled" name="videopackage" id="videopackage" class="form-control">
                        <option value="no">No</option>
                        <?php
                        $connect = mysqli_connect("localhost", "root", "123", "lifeevents");
                        $query = "SELECT * FROM videopackage ORDER BY Price ASC";
                        $resultp = mysqli_query($connect, $query);
                        $pricevideo = 0;

                        while ($row = mysqli_fetch_array($resultp)) {

                            echo '<option value="' . $row['package_name'] . '">' . $row['package_name'] . '</option>';


                        }

                        ?>
                    </select>
                    <br/>
                    <label>Price (Rs:)</label>
                    <input type="text" name="videoprice" id="videoprice" value="0.00" class="form-control" readonly/>


                    <script>
                        $(document).ready(function () {
                            $('#videopackage').change(function () {
                                var videopackage = $(this).val();
                                $.ajax({
                                    url: "set.php",
                                    method: "POST",
                                    data: {videopackage: videopackage},
                                    success: function (data) {
                                        $('#videoprice').val(data);
                                    }
                                });
                            });
                        });
                    </script>
                    <br/>
                    <label>Hiking Package </label>
                    <select disabled="disabled" name="hikingpackage" id="hikingpackage" class="form-control">
                        <option value="no">No</option>
                        <?php
                        $connect = mysqli_connect("localhost", "root", "123", "lifeevents");
                        $query = "SELECT * FROM hikingpackage ORDER BY Price ASC";
                        $resultp = mysqli_query($connect, $query);
                        $pricehiking;

                        while ($row = mysqli_fetch_array($resultp)) {
                            echo '<option value="' . $row['package_name'] . '">' . $row['package_name'] . '</option>';
                        }

                        ?>
                    </select>
                    <br/>
                    <label>Price (Rs:)</label>
                    <input type="text" name="hikingprice" id="hikingprice" value="0.00" class="form-control" readonly/>


                    <script>
                        $(document).ready(function () {
                            $('#hikingpackage').change(function () {
                                var hikingpackage = $(this).val();
                                $.ajax({
                                    url: "set.php",
                                    method: "POST",
                                    data: {hikingpackage: hikingpackage},
                                    success: function (data) {
                                        $('#hikingprice').val(data);
                                    }
                                });
                            });
                        });
                    </script>
                    <br/>
                    <label>DJ Package </label>

                    <select disabled="disabled" name="djpackage" id="djpackage" class="form-control">
                        <option value="no">No</option>
                        <?php
                        $pricedj = 0;
                        $connect = mysqli_connect("localhost", "root", "123", "lifeevents");
                        $query = "SELECT * FROM djpackage ORDER BY Price ASC";
                        $resultp = mysqli_query($connect, $query);

                        while ($row = mysqli_fetch_array($resultp)) {
                            echo '<option value="' . $row['package_name'] . '">' . $row['package_name'] . '</option>';
                        }

                        ?>
                    </select>
                    <br/>
                    <label>Price (Rs:)</label>
                    <input type="text" name="djprice" id="djprice" value="0.00" class="form-control" readonly/>

                    <script>
                        $(document).ready(function () {
                            $('#djpackage').change(function () {
                                var djpackage = $(this).val();
                                $.ajax({
                                    url: "set.php",
                                    method: "POST",
                                    data: {djpackage: djpackage},
                                    success: function (data) {
                                        $('#djprice').val(data);
                                    }
                                });
                            });
                        });
                    </script>
                    <br/>
                    <label>Flower Decoration Package </label>
                    <select disabled="disabled" name="flowerpackage" id="flowerpackage" class="form-control">
                        <option value="no">No</option>
                        <?php
                        $connect = mysqli_connect("localhost", "root", "123", "lifeevents");
                        $query = "SELECT * FROM flowerpackage ORDER BY Price ASC";
                        $resultp = mysqli_query($connect, $query);
                        $priceflower = 0;

                        while ($row = mysqli_fetch_array($resultp)) {
                            echo '<option value="' . $row['package_name'] . '">' . $row['package_name'] . '</option>';
                        }

                        ?>
                    </select>
                    <br/>
                    <label>Price (Rs:)</label>
                    <input type="text" name="flowerprice" id="flowerprice" value="0.00" class="form-control" readonly/>


                    <script>
                        $(document).ready(function () {
                            $('#flowerpackage').change(function () {
                                var flowerpackage = $(this).val();
                                $.ajax({
                                    url: "set.php",
                                    method: "POST",
                                    data: {flowerpackage: flowerpackage},
                                    success: function (data) {
                                        $('#flowerprice').val(data);
                                    }
                                });
                            });
                        });
                    </script>

                    <label>Date</label>
                    <input id="date" name="date" type="date" class="form-control" readonly>
                    <br/>
                    <label>Start Time</label>
                    <input id="stime" name="stime" type="time" class="form-control" readonly>
                    <br/>
                    <label>End Time</label>
                    <input id="etime" name="etime" type="time" class="form-control" readonly>
                    <br/>

                    <label>Event Address</label>
                    <textarea name="address" id="address" class="form-control" readonly></textarea>
                    <br/>
                    <label>(From Life Events) Available</label>
                    <select name="available" id="available" class="form-control">

                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                    <br/>
                    <label>Paid</label>
                    <select disabled="disabled" name="paid" id="paid" class="form-control" >

                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                    <br/>
                    <label>Paid ID</label>
                    <input type="text" name="paidid" id="paidid" class="form-control" readonly/>
                    <br/>
                    <label>(from LifeEvents)Accept</label>
                    <select name="accept" id="accept" class="form-control">

                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                    <br/>
                    <label>Total(Rs):</label>
                    <br/>
                    <input type="text" class="form-control" id="totprice" name="totprice" value="0.00" readonly/>

                    <br/>


                    <label>Comments (From Life Events)</label>
                    <textarea name="comment" id="comment" class="form-control" ></textarea>

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
                url: "fetch.php",
                method: "POST",
                data: {booking_id: booking_id},
                dataType: "json",
                success: function (data) {
                    $('#name').val(data.eventname);
                    $('#photopackage').val(data.photography);
                    $('#videopackage').val(data.videography);
                    $('#hikingpackage').val(data.hiking);
                    $('#djpackage').val(data.djsounds);
                    $('#flowerpackage').val(data.flower);

                    $('#date').val(data.event_date);
                    $('#stime').val(data.starttime);
                    $('#etime').val(data.endtime);
                    $('#address').val(data.place);
                    $('#available').val(data.available);
                    $('#paid').val(data.paid);
                    $('#paidid').val(data.paid_id);
                    $('#accept').val(data.accept);
                    $('#totprice').val(data.price);
                    $('#comment').val(data.comments);
                    $('#booking_id').val(data.bookingid);
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

            else if ($('#date').val() == '') {
                alert("Date is required");
            }
            else if ($('#stime').val() == '') {
                alert("Start Time is required");
            }
            else if ($('#etime').val() == '') {
                alert("End Time is required");
            }
            else if ($('#address').val() == '') {
                alert("Address is required");
            }

            else {
                $.ajax({
                    url: "insert.php",
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
                    url: "select.php",
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
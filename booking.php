<?php

$paypal_link = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypal_username = 'amiladerio-facilitator@gmail.com'; //Business Email







$item_id = '1';
$eventname='party';
$amount = '1';


$itm = explode('-', $item_id);


?>

<?php

session_start();
include 'dbconnect.php';
if (isset($_SESSION['username'])) {
    $uid = $_SESSION['username'];
} else  {
    $uid = "guest";
}
$connect = mysqli_connect("localhost", "root", "123", "lifeevents");
$query = "SELECT * FROM booking where username='".$uid."' ORDER BY bookingid DESC";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="ASCription" content="">
    <meta name="author" content="">
    <title>Booking</title>

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
</header><!--/#title-->

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Online Booking</h1>

            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.php">Home</a></li>

                    <li class="active">Online Booking</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php
if ($uid == 'guest') {
    echo '<section id="pricing">
    <div class="container" style="width:700px;">
        <h3 align="center"></h3>
        <br/>
        <h3>Please Log In to Online Booking</h3><a class="btn btn-default" href="LogIn.php">Log In</a>
    </div>


</section>';
} else{
?>
<section id="pricing">
    <div class="container" style="width:700px;">
        <h3 align="center"></h3>
        <br/>
        <div class="table-responsive">
            <div align="left">
                <button type="button" name="rules" id="rules"
                        class="smart-green button" onclick="Rules()">How to use ?
                </button>

                <script>
                   function Rules(){
                       alert(" How to use ?\n 1) Enter Event Name, Address, Start time, End time is a must.\n 2)After u request an event ,Life events team will check is the day available.\n 3) If we are available you can pay through Paypal , then copy and paste receipt no.\n 4)After we check the payment, if it is okay, we will accept your request and your booking is complete.");
                   }

                </script>
            </div>
            <div align="right">
                <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal"
                        class="btn btn-warning">Add
                </button>
            </div>

            <br/>
            <div id="employee_table">
                <table class="table table-bordered ">
                    <tr>
                        <th width="70%">Event name</th>
                        <th width="15%">Edit</th>
                        <th width="15%">Pay Online</th>
                        <th width="15%">View</th>

                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['eventname'];
                                $amount = $row['price'] / 150;
                                ?>
                            </td><?php
                            if($row['accept']=="Yes"){?>
                                <td><input type="button" name="edit" value="Edit" id="<?php echo $row['bookingid']; ?>"
                                           class="btn btn-info btn-xs edit_data" disabled="true"/></td>

                                <td>
                                    <form action="<?php echo $paypal_link; ?>" method="get">
                                        <?php $item_id = $row['bookingid']; ?>
                                        <!-- Identify your business so that you can collect the payments. -->
                                        <input type="hidden" name="business" value="<?php echo $paypal_username; ?>">

                                        <!-- Specify a Buy Now button. -->
                                        <input type="hidden" name="cmd" value="_xclick">

                                        <!-- Specify details about the item that buyers will purchase. -->
                                        <input type="hidden" name="item_name" value="<?php echo $row['eventname']; ?>">
                                        <input type="hidden" name="item_number" value="<?php echo $item_id; ?>">
                                        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                                        <input type="hidden" name="currency_code" value="USD">

                                        <!-- Specify URLs -->
                                        <input type='hidden' name='cancel_return'
                                               value='http://localhost/lifeevents1/paypal_cancel.php'>
                                        <input type='hidden' name='return'
                                               value='http://localhost/lifeevents1/paypal_success.php'>


                                        <!-- Display the payment button. -->
                                        <input class="btn btn-success" style="float: right;" type="submit" value="Pay Now!"
                                               name="submit" border="0" alt="PayPal - The safer, easier way to pay online" disabled="true">

                                    </form>

                                </td>

                            <?php
                            }
                            else {
                                ?>
                                <td><input type="button" name="edit" value="Edit" id="<?php echo $row['bookingid']; ?>"
                                           class="btn btn-info btn-xs edit_data"/></td>
                                <?php
                                if( ($row['available']=="No") || (($row['paid']=="Yes") && ($row['paid_id']!=""))){
                                    ?>
                                    <td>
                                        <form action="<?php echo $paypal_link; ?>" method="get">
                                            <?php $item_id = $row['bookingid']; ?>
                                            <!-- Identify your business so that you can collect the payments. -->
                                            <input type="hidden" name="business" value="<?php echo $paypal_username; ?>">

                                            <!-- Specify a Buy Now button. -->
                                            <input type="hidden" name="cmd" value="_xclick">

                                            <!-- Specify details about the item that buyers will purchase. -->
                                            <input type="hidden" name="item_name" value="<?php echo $row['eventname']; ?>">
                                            <input type="hidden" name="item_number" value="<?php echo $item_id; ?>">
                                            <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                                            <input type="hidden" name="currency_code" value="USD">

                                            <!-- Specify URLs -->
                                            <input type='hidden' name='cancel_return'
                                                   value='http://localhost/lifeevents1/paypal_cancel.php'>
                                            <input type='hidden' name='return'
                                                   value='http://localhost/lifeevents1/paypal_success.php'>


                                            <!-- Display the payment button. -->
                                            <input class="btn btn-success" style="float: right;" type="submit" value="Pay Now!"
                                                   name="submit" border="0" alt="PayPal - The safer, easier way to pay online" disabled="true">

                                        </form>

                                    </td>

                               <?php }
                               else {
                                   ?>
                                   <td>
                                       <form action="<?php echo $paypal_link; ?>" method="get">
                                           <?php $item_id = $row['bookingid']; ?>
                                           <!-- Identify your business so that you can collect the payments. -->
                                           <input type="hidden" name="business" value="<?php echo $paypal_username; ?>">

                                           <!-- Specify a Buy Now button. -->
                                           <input type="hidden" name="cmd" value="_xclick">

                                           <!-- Specify details about the item that buyers will purchase. -->
                                           <input type="hidden" name="item_name"
                                                  value="<?php echo $row['eventname']; ?>">
                                           <input type="hidden" name="item_number" value="<?php echo $item_id; ?>">
                                           <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                                           <input type="hidden" name="currency_code" value="USD">

                                           <!-- Specify URLs -->
                                           <input type='hidden' name='cancel_return'
                                                  value='http://localhost/lifeevents1/paypal_cancel.php'>
                                           <input type='hidden' name='return'
                                                  value='http://localhost/lifeevents1/paypal_success.php'>


                                           <!-- Display the payment button. -->
                                           <input class="btn btn-success" style="float: right;" type="submit"
                                                  value="Pay Now!"
                                                  name="submit" border="0"
                                                  alt="PayPal - The safer, easier way to pay online" >

                                       </form>

                                   </td>
                                   <?php
                               }
                            }
                            ?>

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

</section><?php
}
?><!--/#pricing-->

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
                    <input type="text" name="name" id="name" class="form-control"/>
                    <br/>
                    <label>Photography Package </label>
                    <select name="photopackage" id="photopackage" class="form-control">
                        <option value="no">No</option>
                        <?php
                        $connect = mysqli_connect("localhost", "root", "123", "lifeevents");
                        $query = "SELECT * FROM packages ORDER BY Price ASC";
                        $resultp = mysqli_query($connect, $query);
                       //$pricephoto = 0;

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

                        $(function () {
                            $('#photopackage').mouseover( function () {
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
                    <select name="videopackage" id="videopackage" class="form-control">
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
                        $(function () {
                            $('#videopackage').mouseover(function () {
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
                    <select name="hikingpackage" id="hikingpackage" class="form-control">
                        <option value="no">No</option>
                        <?php
                        $connect = mysqli_connect("localhost", "root", "123", "lifeevents");
                        $query = "SELECT * FROM hikingpackage ORDER BY Price ASC";
                        $resultp = mysqli_query($connect, $query);
                        $pricehiking=0;

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
                        $(function () {
                            $('#hikingpackage').mouseover(function () {
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

                    <select name="djpackage" id="djpackage" class="form-control">
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
                        $(function () {
                            $('#djpackage').mouseover(function () {
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
                    <select name="flowerpackage" id="flowerpackage" class="form-control">
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
                        $(function () {
                            $('#flowerpackage').mouseover(function () {
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
                    <br/>

                    <br/>
                    <label>Date</label>
                    <input id="date" name="date" type="date" class="form-control" onchange="Check()">
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

                    <br/>
                    <label>Start Time</label>
                    <input id="stime" name="stime" type="time" class="form-control">
                    <br/>
                    <label>End Time</label>
                    <input id="etime" name="etime" type="time" class="form-control">
                    <br/>

                    <label>Event Address</label>
                    <textarea name="address" id="address" class="form-control"></textarea>
                    <br/>
                    <label>(From Life Events) Available</label>
                    <select disabled="disabled" name="available" id="available" class="form-control">

                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                    <br/>
                    <label>Paid</label>
                    <select name="paid" id="paid" class="form-control">

                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                    <br/>
                    <label>Paid ID   <small>(After pay through PayPal ,copy and paste Transaction ID here)</small></label>
                    <input type="text" name="paidid" id="paidid" class="form-control"/>
                    <br/>
                    <label>(from LifeEvents)Accept</label>
                    <select disabled="disabled" name="accept" id="accept" class="form-control">

                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                    <br/>
                    <label>Total(Rs):</label> <input type="button" value="calculate" name="calculate" id="calculate"
                                                     class="btn btn-default" onclick="calprice()">

                    <br/>
                    <input type="text" class="form-control" id="totprice" name="totprice" value="0.00" readonly/>
                    <script>

                        function calprice() {

                            var photo = parseFloat(document.getElementById('photoprice').value);
                            var video = parseFloat(document.getElementById('videoprice').value);
                            var hike = parseFloat(document.getElementById('hikingprice').value);
                            var dj = parseFloat(document.getElementById('djprice').value);
                            var flower = parseFloat(document.getElementById('flowerprice').value);

                             var tot = parseFloat(photo + video + hike + dj + flower);
                            document.getElementById('totprice').value = tot;

                        }
                    </script>
                    <br/>


                    <label>Comments (From Life Events)</label>
                    <textarea name="comment" id="comment" class="form-control" readonly></textarea>

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
            else if ($('#etime').val() < $('#stime').val()) {
                alert("Check start  time and end time");
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
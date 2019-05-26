<?php


if (isset($_SESSION['username'])) {
    $uid = $_SESSION['username'];
} else if (isset($_SESSION['username'])) {
    $uid = "guest";
}
$connect = mysqli_connect("localhost", "root", "123", "lifeevents");
$query = "SELECT * FROM comments INNER JOIN services ON comments.servid=services.Service_id ORDER BY cmntdate DESC ";
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
                <h1>Comments/Reply</h1>

            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.php">Home</a></li>

                    <li class="active">Comments</li>
                </ul>
            </div>
        </div>
    </div>
</section><!--/#title-->

<section id="pricing">
    <div class="container" style="width:100%;">
        <h3 align="center"></h3>
        <br/>
        <div class="table-responsive">

            <br/>
            <div id="employee_table">
                <table class="table table-bordered">
                    <tr>
                    <tr>
                        <th style="width:5%;">User_Name</th>
                        <th style="width:40%;">Comment</th>
                        <th style="width:5%;">Comment_Date</th>
                        <th style="width:40%;">Reply</th>
                        <th style="width:5%;">Reply_Date</th>
                        <th style="width:10%;">Category</th>
                        <th style="width:5%;">Edit</th>
                        <th style="width:5%;">View</th>
                        <th style="width:5%;">Delete</th>
                    </tr>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td ><?php echo $row['comment']; ?></td>
                            <td ><?php echo $row['cmntdate']; ?></td>
                            <td ><?php echo $row['reply']; ?></td>
                            <td ><?php echo $row['redate']; ?></td>
                            <td ><?php echo $row['Service_type']; ?></td>
                            <td><input type="button" name="edit" value="Edit" id="<?php echo $row['cmntid']; ?>"
                                       class="btn btn-info btn-xs edit_data"/></td>
                            <td><input type="button" name="view" value="view" id="<?php echo $row['cmntid']; ?>"
                                       class="btn btn-info btn-xs view_data"/></td>
                            <td><a href="commentdelete.php?id=<?php echo $row['cmntid']; ?>" >
                                    <input type="button" name="delete" value="delete" id="<?php echo $row['cmntid']; ?>"
                                           class="btn btn-info btn-xs view_data"/></a></td>

                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</section><!--/#pricing-->
<section id="bottom" >

</section><!--/#bottom-->

<footer style=" position:absolute;width: 100%;top: 95%" id="footer" class="midnight-blue">
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
                    <label>User Name</label>
                    <input type="text" name="name" id="name" class="form-control" readonly/>
                    <br/>
                    <label>Comment </label>
                    <textarea  name="comment" id="comment" class="form-control" readonly>

                    </textarea>

                    <br/>


                    <label>Comment Date</label>
                    <input id="cmntdate" name="cmntdate" type="date" class="form-control" readonly>
                    <br/>

                    <label>Reply </label>
                    <textarea  name="reply" id="reply" class="form-control">

                    </textarea>

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
                url: "fetchcmnt.php",
                method: "POST",
                data: {booking_id: booking_id},
                dataType: "json",
                success: function (data) {
                    $('#name').val(data.username);
                    $('#comment').val(data.comment);
                    $('#cmntdate').val(data.cmntdate);
                    $('#reply').val(data.reply);
                    $('#redate').val(data.redate);
                    $('#category').val(data.Service_type);
                    $('#booking_id').val(data.cmntid);

                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });
        $('#insert_form').on("submit", function (event) {
            event.preventDefault();
            if ($('#reply').val() == "") {
                alert("Reply is required");
            }

            else {
                $.ajax({
                    url: "insertcmnt.php",
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
                    url: "selectcmnt.php",
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
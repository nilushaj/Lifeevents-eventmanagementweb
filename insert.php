<?php
session_start();
$connect = mysqli_connect("localhost", "root", "123", "lifeevents");
if (isset($_SESSION['username'])) {
    $uid = $_SESSION['username'];
} else if (isset($_SESSION['username'])) {
    $uid = "guest";
}
if (!empty($_POST)) {
    $output = '';
    $message = '';
    $name = mysqli_real_escape_string($connect, $_POST["name"]);
    $photo = mysqli_real_escape_string($connect, $_POST["photopackage"]);
    $video = mysqli_real_escape_string($connect, $_POST["videopackage"]);
    $hiking = mysqli_real_escape_string($connect, $_POST["hikingpackage"]);
    $dj = mysqli_real_escape_string($connect, $_POST["djpackage"]);
    $flower =mysqli_real_escape_string($connect, $_POST["flowerpackage"]);
    $date = mysqli_real_escape_string($connect, $_POST["date"]);
    $stime = mysqli_real_escape_string($connect, $_POST["stime"]);
    $etime = mysqli_real_escape_string($connect, $_POST["etime"]);
    $place = mysqli_real_escape_string($connect, $_POST["address"]);
	$paid = mysqli_real_escape_string($connect, $_POST["paid"]);
    $paidid = mysqli_real_escape_string($connect, $_POST["paidid"]);
    $pricet=mysqli_real_escape_string($connect, $_POST["totprice"]);
	$comment = mysqli_real_escape_string($connect, $_POST["comment"]);
    
	

    if ($_POST["booking_id"] != '') {
        $query = "  
           UPDATE booking SET 

eventname='$name',
photography='$photo',
videography='$video',
hiking='$hiking',
djsounds='$dj',
flower='$flower',
event_date='$date',
starttime='$stime',
endtime='$etime',
place='$place',
paid='$paid',
paid_id='$paidid',
price='$pricet',
comments='$comment'

 WHERE bookingid='" . $_POST["booking_id"] . "'";
		   
              

        $message = 'Data Updated';
    } else {
        $query = "
           INSERT INTO booking (eventname, username, 
photography, videography, hiking, djsounds, flower,event_date, starttime, endtime, place, 
available, paid, paid_id, accept, price, comments) 
VALUES ( '$name', '$uid', '$photo', '$video', '$hiking', '$dj', 
'$flower', '$date', '$stime', '$etime', '$place', 'No', '$paid', '$paidid', 'No', '$pricet', '$comment')";
        
        $message = 'Data Inserted';
    }
    if (mysqli_query($connect, $query)) {
        echo  '<script> location.replace("Booking.php"); </script>';
        $output .= '<label class="text-success">' . $message . '</label>';
        $select_query = "SELECT * FROM booking where username='".$uid."' ORDER BY bookingid DESC";
        $result = mysqli_query($connect, $select_query);
        $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Event Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '  
                     <tr>  
                          <td>' . $row["eventname"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="' . $row["bookingid"] . '" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["bookingid"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';
        }
        $output .= '</table>';
    }
    else{
        echo  '<script> location.replace("Booking.php"); </script>';
        $output .= '<script> alert('.mysqli_error($connect).'); </script>';
        $select_query = "SELECT * FROM booking where username='".$uid."' ORDER BY bookingid DESC";
        $result = mysqli_query($connect, $select_query);
        $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Event Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '  
                     <tr>  
                          <td>' . $row["eventname"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="' . $row["bookingid"] . '" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["bookingid"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';
        }
        $output .= '</table>';
    }
    echo $output;
}
?>
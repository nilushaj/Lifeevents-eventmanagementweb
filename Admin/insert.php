<?php

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

    $available = mysqli_real_escape_string($connect, $_POST["available"]);

    $accept= mysqli_real_escape_string($connect, $_POST["accept"]);


	$comment = mysqli_real_escape_string($connect, $_POST["comment"]);
    
	

    if ($_POST["booking_id"] != '') {
        $query = "  
           UPDATE booking SET 


available='$available',

accept='$accept',

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
        echo  '<script> location.replace("bookingAdmin.php"); </script>';
        $output .= '<label class="text-success">' . $message . '</label>';
        $select_query = "SELECT * FROM booking ORDER BY bookingid ASC";
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
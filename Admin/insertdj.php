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
    $venue = mysqli_real_escape_string($connect, $_POST["venue"]);
    $hours = mysqli_real_escape_string($connect, $_POST["hours"]);

    $price = mysqli_real_escape_string($connect, $_POST["totprice"]);

    
	

    if ($_POST["booking_id"] != '') {
        $query = "  
           UPDATE djpackage SET 


package_name='$name',
venue='$venue',
playing_Hours='$hours',
price='$price'
WHERE 	package_name='" . $_POST["booking_id"] . "'";
		   
              

        $message = 'Data Updated';
    } else {
        $query = "
           INSERT INTO djpackage(package_name, venue, playing_Hours, price, service_id) 
           VALUES ( '$name', '$venue', '$hours', '$price','serv4')";
        
        $message = 'Data Inserted';
    }
    if (mysqli_query($connect, $query)) {
        echo  '<script> location.replace("djpackage.php"); </script>';
        $output .= '<label class="text-success">' . $message . '</label>';
        $select_query = "SELECT * FROM djpackage ORDER BY price ASC";
        $result = mysqli_query($connect, $select_query);
        $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Package Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                          <th width="15%">Delete</th> 
                     </tr>  
           ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '  
                     <tr>  
                          <td>' . $row["package_name"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="' . $row["package_name"] . '" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["package_name"] . '" class="btn btn-info btn-xs view_data" /></td>
                             <td><a href="deletedjpackage.php?id='.$row['package_name'].'" >
                                    <input type="button" name="delete" value="delete" id="<?php echo $row[\'package_name\']; ?>"
                                                                                          class="btn btn-info btn-xs view_data"/></a></td>
                     </tr>  
                ';
        }
        $output .= '</table>';
    }
    else{

        echo  '<script> location.replace("djpackage.php"); </script>';
        $output .= '<script>alert("Package name exist!!")</script>';
        $select_query = "SELECT * FROM djpackage ORDER BY price ASC";
        $result = mysqli_query($connect, $select_query);
        $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Package Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                          <th width="15%">Delete</th> 
                     </tr>  
           ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '  
                     <tr>  
                          <td>' . $row["package_name"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="' . $row["package_name"] . '" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["package_name"] . '" class="btn btn-info btn-xs view_data" /></td>
                             <td><a href="deletedjpackage.php?id='.$row['package_name'].'" >
                                    <input type="button" name="delete" value="delete" id="<?php echo $row[\'package_name\']; ?>"
                                                                                          class="btn btn-info btn-xs view_data"/></a></td>
                     </tr>  
                ';
        }
        $output .= '</table>';
    }
    echo $output;
}
?>
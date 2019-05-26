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
    $hours = mysqli_real_escape_string($connect, $_POST["hours"]);
    $camera = mysqli_real_escape_string($connect, $_POST["camera"]);
    $dvd = mysqli_real_escape_string($connect, $_POST["dvd"]);
    $movie = mysqli_real_escape_string($connect, $_POST["movie"]);
    $stream = mysqli_real_escape_string($connect, $_POST["stream"]);
    $price = mysqli_real_escape_string($connect, $_POST["totprice"]);

    
	

    if ($_POST["booking_id"] != '') {
        $query = "  
           UPDATE videopackage SET 


package_name='$name',
no_of_hours='$hours',
no_of_cameras='$camera',
soft_copy='$dvd',
after_movie='$movie',
live_stream='$stream',
price='$price'
WHERE 	package_name='" . $_POST["booking_id"] . "'";
		   
              

        $message = 'Data Updated';
    } else {
        $query = "
           INSERT INTO videopackage(package_name, no_of_hours, no_of_cameras, soft_copy, after_movie, live_stream, price,service_id) 
           VALUES ( '$name', '$hours', '$camera', '$dvd', '$movie', '$stream','$price','serv2')";
        
        $message = 'Data Inserted';
    }
    if (mysqli_query($connect, $query)) {
        echo  '<script> location.replace("videopackage.php"); </script>';
        $output .= '<label class="text-success">' . $message . '</label>';
        $select_query = "SELECT * FROM videopackage ORDER BY price ASC";
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
                             <td><a href="deletevideopckage.php?id='.$row['package_name'].'" >
                                    <input type="button" name="delete" value="delete" id="<?php echo $row[\'package_name\']; ?>"
                                                                                          class="btn btn-info btn-xs view_data"/></a></td>
                     </tr>  
                ';
        }
        $output .= '</table>';
    }
    else{
        echo  '<script> location.replace("videopackage.php"); </script>';
        $output .= '<script>alert("Package name exist!!")</script>';
        $select_query = "SELECT * FROM videopackage ORDER BY price ASC";
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
                             <td><a href="deletevideopckage.php?id='.$row['package_name'].'" >
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
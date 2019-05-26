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

    $reply = mysqli_real_escape_string($connect, $_POST["reply"]);
    $date = date('Y-m-d');


    if ($_POST["booking_id"] != '') {
        $query = "  
           UPDATE comments SET 
            reply='$reply',
            redate='$date'
            
          WHERE 	cmntid='" . $_POST["booking_id"] . "'";


        $message = 'Data Updated';
    } else {

        $message = 'Data Inserted';
    }
    if (mysqli_query($connect, $query)) {
        echo '<script> location.replace("replycomment.php"); </script>';
        $output .= '<label class="text-success">' . $message . '</label>';
        $select_query = "SELECT * FROM comments INNER JOIN services ON comments.servid=services.Service_id ORDER BY cmntdate DESC ";
        $result = mysqli_query($connect, $select_query);
        $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">User Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                          <th width="15%">Delete</th> 
                     </tr>  
           ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '  
                     <tr>  
                          <td>' . $row["username"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="' . $row["cmntid"] . '" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["cmntid"] . '" class="btn btn-info btn-xs view_data" /></td>
                             <td><a href="deletephotopckage.php?id=' . $row['cmntid'] . '" >
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
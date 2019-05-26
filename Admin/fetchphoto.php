  <?php  
 //fetch.php  
  $connect = mysqli_connect("localhost", "root", "123", "lifeevents");
 if(isset($_POST["booking_id"]))
 {  
      $query = "SELECT * FROM packages WHERE package_name = '".$_POST["booking_id"]."'";
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
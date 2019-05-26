   <?php  
 if(isset($_POST["booking_id"]))
 {  
      $output = '';
     $connect = mysqli_connect("localhost", "root", "123", "lifeevents");
      $query = "SELECT * FROM videopackage WHERE package_name = '".$_POST["booking_id"]."'";
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Package Name</label></td>  
                     <td width="70%">'.$row["package_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>No of Hours</label></td>  
                     <td width="70%">'.$row["no_of_hours"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>No of Cameras</label></td>  
                     <td width="70%">'.$row["no_of_cameras"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Soft Copy</label></td>  
                     <td width="70%">'.$row["soft_copy"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>After Movie</label></td>  
                     <td width="70%">'.$row["after_movie"].' </td>  
                </tr>  
				 <tr>  
                     <td width="30%"><label>Live Stream</label></td>  
                     <td width="70%">'.$row["live_stream"].'</td>  
                </tr>                 
                 
				 <tr>  
                     <td width="30%"><label>Price</label></td>  
                     <td width="70%">'.$row["price"].'</td>  
                </tr>  
               
							
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
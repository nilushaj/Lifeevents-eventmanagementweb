   <?php  
 if(isset($_POST["booking_id"]))
 {  
      $output = '';
     $connect = mysqli_connect("localhost", "root", "123", "lifeevents");
      $query = "SELECT * FROM packages WHERE package_name = '".$_POST["booking_id"]."'";
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
                     <td width="30%"><label>No of Photohraphers</label></td>  
                     <td width="70%">'.$row["noofphotographers"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Hours</label></td>  
                     <td width="70%">'.$row["hours"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>No of Photos</label></td>  
                     <td width="70%">'.$row["noofphotos"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Story Book</label></td>  
                     <td width="70%">'.$row["storybook"].' </td>  
                </tr>  
				 <tr>  
                     <td width="30%"><label>Pre Shoot</label></td>  
                     <td width="70%">'.$row["preshoot"].'</td>  
                </tr>                 
                <tr>  
                     <td width="30%"><label>Soft Copy DVD</label></td>  
                     <td width="70%">'.$row["softcopydvd"].' </td>  
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
   <?php  
 if(isset($_POST["booking_id"]))
 {  
      $output = '';
     $connect = mysqli_connect("localhost", "root", "123", "lifeevents");
      $query = "SELECT * FROM booking WHERE bookingid = '".$_POST["booking_id"]."'";
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["eventname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Photography</label></td>  
                     <td width="70%">'.$row["photography"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Videography</label></td>  
                     <td width="70%">'.$row["videography"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Hiking</label></td>  
                     <td width="70%">'.$row["hiking"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>DJ</label></td>  
                     <td width="70%">'.$row["djsounds"].' </td>  
                </tr>  
				 <tr>  
                     <td width="30%"><label>Flower Decoration</label></td>  
                     <td width="70%">'.$row["flower"].'</td>  
                </tr>                 
                <tr>  
                     <td width="30%"><label>Event Date</label></td>  
                     <td width="70%">'.$row["event_date"].' </td>  
                </tr>  
				 <tr>  
                     <td width="30%"><label>Start Time</label></td>  
                     <td width="70%">'.$row["starttime"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>End Time</label></td>  
                     <td width="70%">'.$row["endtime"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Place</label></td>  
                     <td width="70%">'.$row["place"].' </td>  
                </tr> 
				<tr>  
                     <td width="30%"><label>Available</label></td>  
                     <td width="70%">'.$row["available"].' </td>  
                </tr>  
				<tr>  
                     <td width="30%"><label>Paid</label></td>  
                     <td width="70%">'.$row["paid"].' </td>  
                </tr>  
				<tr>  
                     <td width="30%"><label>Paid ID</label></td>  
                     <td width="70%">'.$row["paid_id"].' </td>  
                </tr>  
				<tr>  
                     <td width="30%"><label>Accept</label></td>  
                     <td width="70%">'.$row["accept"].' </td>  
                </tr>  
				<tr>  
                     <td width="30%"><label>Price</label></td>  
                     <td width="70%">'.$row["price"].' </td>  
                </tr>  
				<tr>  
                     <td width="30%"><label>Comments</label></td>  
                     <td width="70%">'.$row["comments"].' </td>  
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
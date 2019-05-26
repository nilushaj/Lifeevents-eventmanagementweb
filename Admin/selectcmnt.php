   <?php
 if(isset($_POST["booking_id"]))
 {
      $output = '';
     $connect = mysqli_connect("localhost", "root", "123", "lifeevents");
      $query = "SELECT * FROM comments INNER JOIN services ON comments.servid=services.Service_id  where comments.cmntid='".$_POST["booking_id"]."' ORDER BY cmntdate DESC ";

      $result = mysqli_query($connect, $query);
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
      while($row = mysqli_fetch_array($result))
      {
           $output .= '  
                <tr>  
                     <td width="30%"><label>User Name</label></td>  
                     <td width="70%">'.$row["username"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Comment</label></td>  
                     <td width="70%">'.$row["comment"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Comment Date</label></td>  
                     <td width="70%">'.$row["cmntdate"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Reply</label></td>  
                     <td width="70%">'.$row["reply"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Reply Date</label></td>  
                     <td width="70%">'.$row["redate"].' </td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Category</label></td>  
                     <td width="70%">'.$row["Service_type"].' </td>  
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
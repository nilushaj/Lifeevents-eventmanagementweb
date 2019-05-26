   <?php  
 if(isset($_POST["booking_id"]))
 {  
      $output = '';
     $connect = mysqli_connect("localhost", "root", "123", "lifeevents");
      $query = "SELECT * FROM flowerpackage WHERE package_name = '".$_POST["booking_id"]."'";
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
                     <td width="30%"><label>Type of Flower</label></td>  
                     <td width="70%">'.$row["type_of_flower"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Name of Flower</label></td>  
                     <td width="70%">'.$row["name_of_flower"].'</td>  
                </tr>  
                 <tr>  
                     <td width="30%"><label>No of Tables</label></td>  
                     <td width="70%">'.$row["no_of_table"].'</td>  
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
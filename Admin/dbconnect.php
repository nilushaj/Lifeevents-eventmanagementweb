<?php
$servername="localhost";
$username="root";
$password="";

$connect=new mysqli($servername,$username,$password);

if($connect->connect_error){
		die("connecttion failed :".$connect->connect_error);
}else{
	
}
mysqli_select_db($connect,"isharadressmart");
?>

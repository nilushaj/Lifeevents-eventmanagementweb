<?php
include 'dbconnect.php';
session_start();
if (isset($_SESSION['username'])) {
    $uid = $_SESSION['username'];
} else if (isset($_SESSION['username'])) {
    $uid = "guest";
}
if(isset($_POST['username'])){
    $user = $connect->escape_string($_POST['username']);


    if(!empty($user)){

        $result = $connect->query("SELECT * FROM user WHERE username='$user'");
        $rowcount=mysqli_num_rows($result);
        if($rowcount==0){
            echo "username available";
        }
        else{
            echo "username not available";
        }
    }

}
if(isset($_POST['email'])){

    $email = $connect->escape_string($_POST['email']);

    if(!empty($email)){

        $result = $connect->query("SELECT email FROM user WHERE email='$email'");
        $result1 = $connect->query("SELECT email FROM user WHERE username='$uid'");
        $row=mysqli_fetch_assoc($result1);
        $useremail=$row['email'];

        $rowcount=mysqli_num_rows($result);
        if($email!=$useremail){
            if($rowcount==0){
                echo "Email not used";
            }
            else{
                echo 'Email already used';
            }
        }
        else{
            echo 'current email';

        }

    }




}


?>
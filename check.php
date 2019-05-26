<?php
include 'dbconnect.php';

if (isset($_POST['username'])) {
    $user = $connect->escape_string($_POST['username']);


    if (!empty($user)) {

        $result = $connect->query("SELECT * FROM user WHERE username='$user'");
        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            echo "username available";
        } else {
            echo "username not available";
        }
    }

}
if (isset($_POST['email'])) {

    $email = $connect->escape_string($_POST['email']);

    if (!empty($email)) {

        $result = $connect->query("SELECT email FROM user WHERE email='$email'");
        $rowcount = mysqli_num_rows($result);

        if ($rowcount == 0) {
            echo "Email not used";
        } else {
            echo "Email already used";
        }
    }




}


?>
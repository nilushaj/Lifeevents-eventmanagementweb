<?php
include 'dbconnect.php';


if (isset($_GET['id']))
{
    $sql = "DELETE FROM user WHERE username ='".$_GET['id']."' ";
    mysqli_query($connect, $sql);
    echo  '<script> location.replace("userdetails.php"); </script>';

}


?>
<?php
include 'dbconnect.php';


if (isset($_GET['id']))
{
    $sql = "DELETE FROM videopackage WHERE package_name ='".$_GET['id']."' ";
    mysqli_query($connect, $sql);
    echo  '<script> location.replace("videopackage.php"); </script>';

}


?>
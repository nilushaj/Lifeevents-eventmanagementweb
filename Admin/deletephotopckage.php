<?php
include 'dbconnect.php';


if (isset($_GET['id']))
{
    $sql = "DELETE FROM packages WHERE package_name ='".$_GET['id']."' ";
    mysqli_query($connect, $sql);
    echo  '<script> location.replace("photopackage.php"); </script>';

}


?>
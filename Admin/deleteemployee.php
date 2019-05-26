<?php
include 'dbconnect.php';


if (isset($_GET['id']))
{
    $sql = 'Delete from employees where employee_id="' . $_GET['id'] . '"';
    mysqli_query($connect, $sql);
    if(delete(file))
    echo  '<script> location.replace("employeedetails.php"); </script>';

}


?>
<?php
include 'dbconnect.php';


if (isset($_GET['id']))
{
    $sql = "DELETE FROM public_events WHERE event_id ='".$_GET['id']."' ";
    mysqli_query($connect, $sql);
    echo  '<script> location.replace("upcomingevent.php"); </script>';

}


?>
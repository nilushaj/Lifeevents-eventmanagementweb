<?php
include 'dbconnect.php';


if (isset($_GET['id']))
{
    $sql = "DELETE FROM comments WHERE cmntid ='".$_GET['id']."' ";
    mysqli_query($connect, $sql);
    echo  '<script> location.replace("replycomment.php"); </script>';

}


?>
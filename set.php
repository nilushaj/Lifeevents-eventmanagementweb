<?php
$connect = mysqli_connect("localhost", "root", "123", "lifeevents");

$no=0.00;
if(isset($_POST['photopackage'])){


    if($_POST["photopackage"] == "no")
    {
        echo '0';
    }
    else
    {
        $sql = "SELECT price FROM packages WHERE package_name = '".$_POST["photopackage"]."'";
        $result = mysqli_query($connect, $sql);
        $row=mysqli_fetch_array($result);
        $rowphoto=$row['price'];
        echo $rowphoto;

    }





}
if(isset($_POST['videopackage'])){



    if($_POST["videopackage"] != 'no')
    {
        $sql = "SELECT price FROM videopackage WHERE package_name = '".$_POST["videopackage"]."'";
        $result = mysqli_query($connect, $sql);
        $rowvideo=mysqli_fetch_array($result);

        echo  $rowvideo['price'];

    }
    else
    {
        echo $no;
    }





}
if(isset($_POST['hikingpackage'])){



    if($_POST["hikingpackage"] != 'no')
    {
        $sql = "SELECT price FROM hikingpackage WHERE package_name = '".$_POST["hikingpackage"]."'";
        $result = mysqli_query($connect, $sql);
        $rowhike=mysqli_fetch_array($result);
        echo  $rowhike['price'];

    }
    else
    {
        echo $no;
    }





}
if(isset($_POST['djpackage'])){



    if($_POST["djpackage"] != 'no')
    {
        $sql = "SELECT price FROM djpackage WHERE package_name = '".$_POST["djpackage"]."'";
        $result = mysqli_query($connect, $sql);
        $rowdj=mysqli_fetch_array($result);
        echo  $rowdj['price'];

    }
    else
    {
        echo $no;
    }





}
if(isset($_POST['flowerpackage'])){


    if($_POST["flowerpackage"] != 'no')
    {
        $sql = "SELECT price FROM flowerpackage WHERE package_name = '".$_POST["flowerpackage"]."'";
        $result = mysqli_query($connect, $sql);
        $rowflower=mysqli_fetch_array($result);
        echo  $rowflower['price'];

    }
    else
    {
        echo $no;
    }






}
if(isset($_POST['othereventpackage'])){

    if($_POST["othereventpackage"] != 'no')
    {
        $sql = "SELECT price FROM othereventpackage WHERE package_name = '".$_POST["othereventpackage"]."'";
        $result = mysqli_query($connect, $sql);
        $rowevent=mysqli_fetch_array($result);
        echo $rowevent['price'];

    }
    else
    {
        echo $no;
    }





}




?>
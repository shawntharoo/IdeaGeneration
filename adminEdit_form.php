<?php

include('database_connect.php');

$fname =  $_POST['fname'];
$lname =  $_POST['lname'];
$address = $_POST['add'];
$tel = $_POST['contact'];
$email = $_POST['email'];
$list = $_POST['list'];
$uid = $_POST['uid'];
$user = $_POST['user'];

$rid = $_POST['postid'];
//echo $fname ."<br/>";

 $sql="UPDATE register set fname='".$fname."',lname='".$lname."',address='".$address."',contact='".$tel."',emil='".$email."',category='".$list."',universityID='".$uid."',username='".$user."' WHERE id='".$rid."'";
mysqli_query($con,$sql);

header('Location: adminProfile.php');
mysqli_close($con);

?>
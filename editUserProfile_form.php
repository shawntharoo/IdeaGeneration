<?php

include('database_connect.php');
if(isset($_POST["save"]))
		{
$Id = $_REQUEST['idd'];

$fname =  $_POST['fname'];
$lname =  $_POST['lname'];
$category = $_POST['cat'];
$uid = $_POST['uid'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$add = $_POST['add'];
$cont = $_POST['con'];




$sqledit="update register set fname='".$fname."',lname='".$lname."',address='".$add."',contact='".$cont."',gender='".$gender."',emil='".$email."',category='".$category."',universityID='".$uid."' WHERE id='".$Id."' ";


mysqli_query($con,$sqledit);

mysqli_close($con);
header('location: userProfile.php?id='.$Id);
		}
		
		
		if (isset($_POST['Cansel']))
{$Id = $_REQUEST['idd'];
    header('location: userProfile.php?id='.$Id);
}
?>
      
      
     
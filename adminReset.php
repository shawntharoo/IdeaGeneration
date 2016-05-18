<?php
include('database_connect.php');
session_start();

if($_SESSION['adid'] == '')
{
	header("location: adminProfile.php");
}else{
		$setpass =  $_SESSION['adid'];
		$password=$_POST['password'];
		$password1=$_POST['password1'];
		if (strcmp($password, $password1) == 0) {
$query ="update register set password='".$password."' WHERE id='$setpass'";
$result=mysqli_query($con,$query);
header("location: adminProfile.php");
}else{
	$error=1;
	header("location: adminProfile.php?var=$error");
}

}
?>
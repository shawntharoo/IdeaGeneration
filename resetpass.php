<?php
include('database_connect.php');
session_start();

if($_SESSION['user_id'] == '')
{
	header("location: firstlogin.php");
}else{
		$setpass =  $_SESSION['user_id'];
		$password=$_POST['password'];
		$password1=$_POST['password1'];
		if (strcmp($password, $password1) == 0) {
$query ="update register set password='".$password."' WHERE id='$setpass'";
$result=mysqli_query($con,$query);
header("location: view4.php");
}else{
	$error=1;
	header("location: reset.php?var=$error");
}

}
?>
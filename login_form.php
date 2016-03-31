<?php

include('database_connect.php');
session_start();
$username=$_POST['username'];
$password=$_POST['password'];

$query ="select * from register where password='$password' AND username='$username'";
$result=mysqli_query($con,$query);

$rows = mysqli_num_rows($result);
if ($rows == 1) {
$_SESSION['login_user']=$username;


$row=mysqli_fetch_assoc($result);
$Globals['user_id']=$row["id"];

$_SESSION['userid']=$row["id"];
$_SESSION['name']=$row["lname"];
  $_SESSION['photo']=$row["Image"];
  $_SESSION['level']=$row["category"];
header("location: view4.php");
} else {
	$error=1;
header("location: login.php?var=$error");
/*echo '<script language="javascript">';
echo 'alert("Username or Password is invalid")';
echo '</script>';*/
}

mysqli_close($con); 
?>
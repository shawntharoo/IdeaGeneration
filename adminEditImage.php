<?php
include('database_connect.php');
session_start();
if(isset($_SESSION["admin"])){
$aid=$_SESSION["admin"];

$destination="images/".$_FILES["input"]["name"];
$source = $_FILES["input"]["tmp_name"];
	if($source != ""){
$input=$destination;
$done = move_uploaded_file($source,$destination);
	}else{
		$input = $_SESSION["imagepath"];
	}
 $sqluq="update register set Image='".$input."' WHERE id='".$aid."'";
 mysqli_query($con,$sqluq);
 header('Location: adminProfile.php');
}else{
	echo "Upload Failed";
}

?>

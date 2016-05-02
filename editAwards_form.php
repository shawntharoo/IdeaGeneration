<?php
include('database_connect.php');
session_start();
echo $_SESSION["edit"];
if(isset($_SESSION["edit"])){
$eid=$_SESSION["edit"];
$name =  $_POST['name'];
$level =  $_POST['level'];
$type = $_POST['type'];
$discription = $_POST['dis'];
$postcount = $_POST['postcount'];

$destination="images/".$_FILES["input"]["name"];
$source = $_FILES["input"]["tmp_name"];
	if($source != ""){
$input=$destination;
$done = move_uploaded_file($source,$destination);
	}else{
		$input = $_SESSION["imagepath"];
	}
 $sqluq="update reward set name='".$name."',level='".$level."',type='".$type."',description='".$discription."',postcount='".$postcount."',img='".$input."' WHERE id='".$eid."'";
 mysqli_query($con,$sqluq);
 //header('Location: awardDisplay.php');
}

?>

<?php
include('database_connect.php');

$destination="games/".$_FILES["input"]["name"];
$source = $_FILES["input"]["tmp_name"];
$input=$destination;
$done = move_uploaded_file($source,$destination);
  if($done)
   {
	   echo "Game Uploaded Successfully";
   }
  else
   {
	  
     	echo "Error in Uploading Game";
   }


//echo $name ."<br/>";

$sql="INSERT INTO 
rewardGame (game)
VALUES ('$input')";
mysqli_query($con,$sql);
header('Location: Gemification.php');
mysqli_close($con);
?>
<?php

include('database_connect.php');

$name =  $_POST['name'];
$level =  $_POST['level'];
$type = $_POST['type'];
$dis = $_POST['dis'];
$postcount = $_POST['postcount'];
$destination="images/".$_FILES["input"]["name"];
$source = $_FILES["input"]["tmp_name"];
$input=$destination;
$done = move_uploaded_file($source,$destination);
  if($done)
   {
	   echo "image Uploaded Successfully";
   }
  else
   {
	  
     	echo "Error in Uploading Image";
   }


//echo $name ."<br/>";

$sql="INSERT INTO 
reward (name,type,img,level,description,postcount)
VALUES ('$name','$type','$input','$level','$dis','$postcount')";
mysqli_query($con,$sql);
header('Location: awardDisplay.php');
mysqli_close($con);
?>
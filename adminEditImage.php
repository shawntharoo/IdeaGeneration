<?php
include('database_connect.php');

$destination="images/".$_FILES["input"]["name"];
$source = $_FILES["input"]["tmp_name"];
$input=$destination;
$done = move_uploaded_file($source,$destination);
 $sqluq="update register set Image='".$input."' WHERE id='".$aid."'";
 mysqli_query($con,$sqluq);
 header('Location: adminProfile.php');
}else{
	echo "Upload Failed";
}

?>

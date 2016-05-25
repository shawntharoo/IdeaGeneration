<<<<<<< HEAD
<?php

include('database_connect.php');
session_start();

$fname =  $_POST['fname'];
$lname =  $_POST['lname'];
$address = $_POST['add'];
$tel = $_POST['contact'];
$gend = $_POST['gend'];
$email = $_POST['email'];
$list = $_POST['list'];
$uid = $_POST['uid'];
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
$_SESSION['users_fname']=$fname; 
$username = $_POST['email'];

//echo $fname ."<br/>";

$sql="INSERT INTO 
register (fname,lname,address,contact,gender,emil,category,universityID,image,username)
VALUES ('$fname','$lname','$address','$tel','$gend','$email','$list','$uid','$input','$username')";
mysqli_query($con,$sql);

echo '<script language="javascript">';
echo 'alert("Username or Password is invalid")';
echo '</script>';

header('Location: firstLogin.php');
mysqli_close($con);
=======
<?php

include('database_connect.php');
session_start();

$fname =  $_POST['fname'];
$lname =  $_POST['lname'];
$address = $_POST['add'];
$tel = $_POST['contact'];
$gend = $_POST['gend'];
$email = $_POST['email'];
$list = $_POST['list'];
$uid = $_POST['uid'];
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
$_SESSION['users_fname']=$fname; 
$username = $_POST['email'];

//echo $fname ."<br/>";

$sql="INSERT INTO 
register (fname,lname,address,contact,gender,emil,category,universityID,image,username)
VALUES ('$fname','$lname','$address','$tel','$gend','$email','$list','$uid','$input','$username')";
mysqli_query($con,$sql);

echo '<script language="javascript">';
echo 'alert("Username or Password is invalid")';
echo '</script>';

header('Location: firstLogin.php');
mysqli_close($con);
>>>>>>> d57608d56be1949eb28c6032b81c46cf51a7c686
?>
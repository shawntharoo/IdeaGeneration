<!-- Database connection -->
<?php require_once('database_connect.php'); ?>
 
<?php
	$usrid=$_SESSION['userid']; //Catch the userId
	$submissions=mysqli_fetch_array(mysqli_query($con,"SELECT count(postId) FROM post WHERE userId='$usrid'")); //Get posts count
	$improvements=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE userId='$usrid' AND commentType='Improvement'")); //Get improvements count
	$comments=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE userId='$usrid' AND commentType='Comment'")); //Get comments count	
?>




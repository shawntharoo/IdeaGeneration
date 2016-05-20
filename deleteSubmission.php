<!-- Database connection -->
<?php require_once('database_connect.php'); ?>

<?php
   session_start();
  $user = $_SESSION['userid'] ;
  

	$userID = $_GET['userId'];
	$postID = $_GET['postId'];//Catch the postId
	$del=mysqli_query($con,"DELETE FROM `ideapool`.`post` WHERE `post`.`postId` = '$postID'") or die(mysqli_error);
	 header("Location:userProfile_post.php?id=".$user);
?>
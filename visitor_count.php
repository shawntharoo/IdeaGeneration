<!-- Database connection -->
<?php require_once('database_connect.php'); ?>

<?php
	$find_counts= mysqli_query($con,"SELECT * FROM post WHERE postId='$submissionId'");
	while($row=mysqli_fetch_assoc($find_counts)){
		$current_counts= $row['views'];
		$new_count=$current_counts+1;//update views
		$update_count=mysqli_query($con,"UPDATE `ideapool` . `post` SET `views` = $new_count WHERE postId = '$submissionId'" );	
	}
?>
<?php

	include('database_connect.php');
	
	
	$ideaId = $_SESSION["subId"];
	$sqlViews = "SELECT views FROM post WHERE postId = '$ideaId' ";
	$sqlComments = "SELECT COUNT(*) FROM comment WHERE  submissionId = '$ideaId' AND commentType='Comment' ";
	$sqlImprovements = "SELECT COUNT(*) FROM comment WHERE  submissionId = '$ideaId' AND commentType='Improvement' ";
	$sqlUpvotes = "SELECT COUNT(*) FROM votes WHERE  submissionId = '$ideaId' AND voteType='Upvote' ";
	$sqlDownvotes = "SELECT COUNT(*) FROM votes WHERE  submissionId = '$ideaId' AND voteType='Downvote' ";

	$viewResult = mysqli_query($con, $sqlViews);
	$commentResult = mysqli_query($con, $sqlComments);
	$improvResult = mysqli_query($con, $sqlImprovements);
	$upvoteResult = mysqli_query($con, $sqlUpvotes);
	$downvoteResult = mysqli_query($con, $sqlDownvotes);
	
	
	if(mysqli_num_rows($viewResult)>0)
	{
		while($row1 = mysqli_fetch_assoc($viewResult))
		{
			$viewCount = $row1['views'];
		}
	}
	else
	{
		$viewCount = 0;
	}
	
	if(mysqli_num_rows($commentResult)>0)
	{
		while($row2 = mysqli_fetch_assoc($commentResult))
		{
			$commentCount = $row2['COUNT(*)'];
		}
	}
	else
	{
		$commentCount = 0;
	}
	
	if(mysqli_num_rows($improvResult)>0)
	{
		while($row3 = mysqli_fetch_assoc($improvResult))
		{
			$improvCount = $row3['COUNT(*)'];
		}
	}
	else
	{
		$improvCount = 0;
	}
	
	if(mysqli_num_rows($upvoteResult)>0)
	{
		while($row4 = mysqli_fetch_assoc($upvoteResult))
		{
			$upvoteCount = $row4['COUNT(*)'];
		}
	}
	else
	{
		$upvoteCount = 0;
	}
	
	if(mysqli_num_rows($downvoteResult)>0)
	{
		while($row5 = mysqli_fetch_assoc($downvoteResult))
		{
			$downvoteCount = $row5['COUNT(*)'];
		}
	}
	else
	{
		$downvoteCount = 0;
	}
?>
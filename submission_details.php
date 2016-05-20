<?php

	include('database_connect.php');
	
	
	$ideaId = $_SESSION["subId"];
	$sqlViews = "SELECT views FROM post WHERE postId = '$ideaId' ";
	$sqlComments = "SELECT COUNT(*) FROM comment WHERE  submissionId = '$ideaId' AND commentType='Comment' ";
	$sqlImprovements = "SELECT COUNT(*) FROM comment WHERE  submissionId = '$ideaId' AND commentType='Improvement' ";
	$sqlAccvotes = "SELECT SUM(weight), COUNT(*) FROM votes WHERE  submissionId = '$ideaId' AND voteCategory='Accuracy' ";
	$sqlFvotes = "SELECT SUM(weight), COUNT(*) FROM votes WHERE  submissionId = '$ideaId' AND voteCategory='Feasibility' ";
	$sqlTvotes = "SELECT SUM(weight), COUNT(*) FROM votes WHERE  submissionId = '$ideaId' AND voteCategory='Timeliness' ";

	$viewResult = mysqli_query($con, $sqlViews);
	$commentResult = mysqli_query($con, $sqlComments);
	$improvResult = mysqli_query($con, $sqlImprovements);
	$AccResult = mysqli_query($con, $sqlAccvotes);
	$FResult = mysqli_query($con, $sqlFvotes);
	$TResult = mysqli_query($con, $sqlTvotes);
	
	
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
	
	if(mysqli_num_rows($AccResult)>0)
	{
		while($row4 = mysqli_fetch_assoc($AccResult))
		{
			$avC = $row4['COUNT(*)'];
			$avSum = $row4['SUM(weight)'];
		}
		$avCount = round(($avSum/$avC),2) ; 
	}
	else
	{
		$avCount = 0;
	}
	
	if(mysqli_num_rows($FResult)>0)
	{
		while($row5 = mysqli_fetch_assoc($FResult))
		{
			$fvC = $row5['COUNT(*)'];
			$fvSum = $row5['SUM(weight)'];
		}
		$fvCount = round(($fvSum/$fvC),2) ; 
	}
	else
	{
		$fvCount = 0;
	}
	if(mysqli_num_rows($TResult)>0)
	{
		while($row6 = mysqli_fetch_assoc($TResult))
		{
			$tvC = $row6['COUNT(*)'];
			$tvSum = $row6['SUM(weight)'];
		}
		$tvCount = round(($tvSum/$tvC),2) ; 
	}
	else
	{
		$tvCount = 0;
	}

	
?>
<?php
	
	include('database_connect.php');
	
	include('autoinc.php'); //including the file containing the function to auto increment the comment id (eg: C_1)
	session_start();
	

	$userId = $_SESSION["userid"];
 	$description = $_POST["description"];
	$commentType = $_POST["commentType"];
	$submissionId = $_POST["subId"];
	
	$d =date_default_timezone_set("Asia/Colombo");
	$dateValue = date("y-m-d H:i:s");
	//$timeValue = date("H:i:s");
	//$dateinString = date_format($today,"Y-m-d");
	//echo $commentType."<br />".$description."<br />".$submission;
	
	
	$val = "Comment";
	$commentId = autoIncrementIds($val);
	
	$isComment = strcmp($commentType,"Add a comment");
	
	if ($isComment == 0)
	{
		
		//That means this is a comment. Therefore add to the comment table
		$sqlInsertComment = "INSERT INTO comment(commentId,submissionId,userId,description,date,commentType) VALUES('$commentId','$submissionId','$userId','$description','$dateValue','Comment')";
		if(mysqli_query($con,$sqlInsertComment))
		{
			
			/*echo "<script type='text/javascript' > alert('Thank You. We successfully added your comment') </script>";*/
			$submitid =1;
			
			header('location:viewidea.php?id='.$submissionId.'&submitid='.$submitid.'&comt=0');
			
		}
		else
		{
			$submitid =0;
			/*echo "<script type='text/javascript' > alert('error : '".mysqli_error($con).") </script>";*/
			header('location:viewidea.php?id='.$submissionId.'&submitid='.$submitid.'&comt=0');
		}
		
	}
	else
	{
		include('rewardcheck3.php');//That means this is the other option. Which is an improvement. Therefore add to improvement table
		$sqlInsertImprovement = "INSERT INTO comment(commentId,submissionId,userId,description,date,commentType) VALUES('$commentId','$submissionId','$userId','$description','$dateValue','Improvement')";
		if(mysqli_query($con,$sqlInsertImprovement))
		{
			/*echo "<script type='text/javascript' > alert('Thank You. We successfully added your Improvement submission')</script>";*/
			$submitid =2;
			header('location:viewidea.php?id='.$submissionId.'&submitid='.$submitid.'&comt=0');
		}
		else
		{
			$submitid =0;
			/*echo "<script type='text/javascript' > alert('error : '".mysqli_error($con).") </script>";*/
			header('location:viewidea.php?id='.$submissionId.'&submitid='.$submitid.'&comt=0');
		}
		
	}
	//return $submitid;
	mysqli_close($con);

?>
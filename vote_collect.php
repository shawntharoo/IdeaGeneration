<?php
include ('database_connect.php');
include ('autoinc.php');
$voteType="nil";

session_start();
	
$userid = $_SESSION["userId"];
$submissionId = $_POST["subId"];
//$weight = $_POST[$size];

$d =date_default_timezone_set("Asia/Colombo");
$dateValue = date("y-m-d H:i:s");

if(isset($_POST['voteup']))
{
	$voteType = 'Upvote';
}
elseif(isset($_POST['votedown']))
{
	$voteType = 'Downvote';
}
else
{
	echo 'error';
}
	
	$val = "Vote";
	$voteId = autoIncrementIds($val);

	$sqlVote = "INSERT INTO votes(voteId,voteType,userId,submissionId,submissionType,date ) VALUES('$voteId','$voteType','$userid','$submissionId','Submission','$dateValue')";
	
	if(mysqli_query($con,$sqlVote))
		{
			
			$submitvid =1;
			header('location:viewidea.php?submitvid='.$submitvid.'&id='.$submissionId);
			
		}
		else
		{
			
			$submitvid =0;
			header('location:viewidea.php?submitvid='.$submitvid.'&id='.$submissionId);
			echo "<script type='text/javascript' > alert('error : '".mysqli_error($con).") </script>";
			//echo mysqli_error($con);

		}


?>

<!--/vote up da down da kae kiala hoaganne kohmda?
//subid, userid include krnne kohmda?-->
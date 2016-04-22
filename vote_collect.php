<?php
include ('database_connect.php');
include ('autoinc.php');
$voteType="nil";

session_start();
	
$userid =$_SESSION['userid'] ;
$submissionId = $_POST['subId'];
//$weight = $_POST[$size];

$d =date_default_timezone_set("Asia/Colombo");
$dateValue = date("y-m-d H:i:s");

$weight = $_POST['inputRange'];
if($weight==0 || $weight==null)
{
	$submitvid=2;
	header('location:viewidea.php?submitvid='.$submitvid.'&id='.$submissionId);
}

else{
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
	
	//Checking if this person has already voted
	$sql ="select * from votes where userId = '$userid' AND submissionId='$submissionId' ";
	$res = mysqli_query($con,$sql);
	if(mysqli_num_rows($res)==0)
	{
	
	
	$val = "Vote";
	$voteId = autoIncrementIds($val);

	$sqlVote = "INSERT INTO votes(voteId,voteType,userId,submissionId,submissionType,date,weight ) VALUES('$voteId','$voteType','$userid','$submissionId','Submission','$dateValue','$weight')";
	
	if(mysqli_query($con,$sqlVote))
		{
			
			$submitvid =1;
			header('location:viewidea.php?submitvid='.$submitvid.'&id='.$submissionId);
			
		}
		else
		{
			
			$submitvid = mysqli_error($con);
			header('location:viewidea.php?submitvid='.$submitvid.'&id='.$submissionId);
			echo "<script type='text/javascript' > alert('error : '".mysqli_error($con).") </script>";
			//echo mysqli_error($con);

		}
	}
	else
	{
		while($row= mysqli_fetch_assoc($res))
		{
			$id = $row['voteId'];
		}
		$sqlVote = "UPDATE votes SET voteType='$voteType' ,date='$dateValue',weight='$weight'WHERE voteId = '$id' ";
	
	if(mysqli_query($con,$sqlVote))
		{
			
			$submitvid =1;
			header('location:viewidea.php?submitvid='.$submitvid.'&id='.$submissionId);
			
		}
		else
		{
			
			$submitvid = mysqli_error($con);
			header('location:viewidea.php?submitvid='.$submitvid.'&id='.$submissionId);
			echo "<script type='text/javascript' > alert('error : '".mysqli_error($con).") </script>";
			//echo mysqli_error($con);

		}
	}

}
?>

<!--/vote up da down da kae kiala hoaganne kohmda?
//subid, userid include krnne kohmda?-->
<?php
include('rewardcheck2.php');
session_start();
$res1 = $res2 = $res3 = -1;

$userid =$_SESSION['userid'] ;
$impId = $_POST['impno'];
$subId = $_POST['subid'];
$type1 = $_POST['voteslider1'];
$type2 = $_POST['voteslider2'];
$type3 = $_POST['voteslider3'];
//$weight = $_POST[$size];
echo $type1."\n".$type2;

$d =date_default_timezone_set("Asia/Colombo");
$dateValue = date("y-m-d H:i:s");

if(!is_null($type1)){
	$res1 = addVotewithCattoImp('Accuracy',$type1,$userid,$impId,$dateValue);
}
if(!is_null($type2)){
	$res2 = addVotewithCattoImp('Feasibility',$type2,$userid,$impId,$dateValue);
}
if(!is_null($type3)){
	$res3 = addVotewithCattoImp('Timeliness',$type3,$userid,$impId,$dateValue);
}
if ($res1 !=0 && $res2 !=0 && $res3 !=0){
	$vid = '1';
}
else{
	$vid = '0';
}


header('location:viewidea.php?submitimpid='.$vid.'&id='.$subId.'&comt=0');

	
	
function addVotewithCattoImp($cat,$weight,$userid,$submissionId,$dateValue){
	require ('database_connect.php');
	require_once ('autoinc.php');



	if($weight >=50){
		$vtype = 'Upvote';
	}
	else{
		$vtype = 'Downvote';
	}
	$sql ="select * from votes where userId = '$userid' AND improvementId='$submissionId' AND voteCategory = '$cat' ";
	$res = mysqli_query($con,$sql);
	if(mysqli_num_rows($res)==0)
	{
	//Checking if this person has already voted
	
	
	$val = "Vote";
	$voteId = autoIncrementIds($val);

	$sqlVote = "INSERT INTO votes(voteId,voteType,voteCategory,userId,improvementId,submissionType,date,weight ) 
	VALUES('$voteId','$vtype','$cat','$userid','$submissionId','Improvement','$dateValue','$weight')";
	
	if(mysqli_query($con,$sqlVote))
		{
			
			$submitvid =1;
			$x=9;
			//header('location:viewidea.php?submitvid='.$submitvid.'&id='.$submissionId);
			
		}
		else
		{
			
			$submitvid = 0;
			$x = mysqli_error($con);
			//header('location:viewidea.php?submitvid='.$x.'&id='.$submissionId);
			//echo "<script type='text/javascript' > alert('error : '".mysqli_error($con).") </script>";
			//echo mysqli_error($con);

		}
	}
	else
	{
		while($row= mysqli_fetch_assoc($res))
		{
			$id = $row['voteId'];
		}
		$sqlVote = "UPDATE votes SET voteType='$vtype' ,date='$dateValue',weight='$weight'WHERE voteId = '$id' ";
	
	if(mysqli_query($con,$sqlVote))
		{
			
			$submitvid =1;
			
			$x=8;//header('location:viewidea.php?submitvid='.$submitvid.'&id='.$submissionId);
			
		}
		else
		{
			
			$submitvid =0;
			$x = 2; //mysqli_error($con);
			//header('location:viewidea.php?submitvid='.$submitvid.'&id='.$submissionId);
			//echo "<script type='text/javascript' > alert('error : '".mysqli_error($con).") </script>";
			//echo mysqli_error($con);

		}
	}
	return $submitvid;
}
?>

<!--/vote up da down da kae kiala hoaganne kohmda?
//subid, userid include krnne kohmda?-->


<!--/vote up da down da kae kiala hoaganne kohmda?
//subid, userid include krnne kohmda?-->
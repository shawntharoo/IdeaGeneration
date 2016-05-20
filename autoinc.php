<?php

	
function autoIncrementIds($type)
{
	require('database_connect.php');
	if( strcmp($type,'Comment')==0)
	{
			$sqlGetData = "SELECT commentId FROM comment WHERE date = (SELECT max(date) FROM comment)";
			$result = mysqli_query($con, $sqlGetData);

			if (mysqli_num_rows($result) > 0) {
  		    //taking the output data row by row
  			  while($row = mysqli_fetch_assoc($result)) {
       				$id = $row["commentId"];
  			  }
			  $newidarray = explode("_",$id);
			  $newid = $newidarray[0] . "_" . ($newidarray[1]+1);
			  
			}
			else
			{
				$newid = "C_1";
			}
	}
	elseif (strcmp($type,'Vote')==0){
			$sqlnew = "SELECT voteId FROM votes";
			$resultnew = mysqli_query($con,$sqlnew);
			if(mysqli_num_rows($resultnew) > 0) {
			$i =0;
			 while($row = mysqli_fetch_assoc($resultnew)) {
       				$id = $row["voteId"];

       				$oldidarray = explode("_",$id);
			  		$oldid[$i] = $oldidarray[1];
			  		$i = $i+1;
  			  }
			  
			  rsort($oldid);

			  $newid = "V_".($oldid[0]+1);


			/*$sqlGetData = "SELECT voteId FROM votes WHERE date = (SELECT max(date) FROM votes)";
			$result = mysqli_query($con,$sqlGetData);

			if (mysqli_num_rows($result) > 0) {
  		    //taking the output data row by row
  			  while($row = mysqli_fetch_assoc($result)) {
       				$id = $row["voteId"];
  			  }
			  $newidarray = explode("_",$id);
			  $newid = $newidarray[0] . "_" . ($newidarray[1]+1);*/
			  
			}
			else
			{
				$newid = "V_1";
			}
		
	}
	elseif (strcmp($type,'Submission')==0){
			$sqlGetData = "SELECT postId FROM post WHERE dateTime = (SELECT max(dateTime) FROM post)";
			$result = mysqli_query($con, $sqlGetData);

			if (mysqli_num_rows($result) > 0) {
  		    //taking the output data row by row
  			  while($row = mysqli_fetch_assoc($result)) {
       				$id = $row["postId"];
  			  }
			  $newidarray = explode("_",$id);
			  $newid = $newidarray[0] . "_" . ($newidarray[1]+1);
			}
			else
			{
				$newid = "SUB_1";
			}
		
		
	}
	return $newid;
}

	
?>
<?php
   include("database_connect.php");   
    $range = 0;
     if(!isset($_SESSION))
	   {
		   session_start();
	   }
	   $uid=$_SESSION["userid"];
     $sql="select count(commentId) as count from comment where userId=$uid and commentType='Improvement'";
	 $sql2="select * from reward where type='improvement' "; //retrieve data from system storage
	  include("database_connect.php");    //provide database connection
	  $result=mysqli_query($con,$sql);
	  $result2=mysqli_query($con,$sql2);
	   if ($row=mysqli_fetch_array($result))
		 {
		    $count=$row["count"];	
			//echo $count; 
		 }
	  
	 while($row2 = mysqli_fetch_array($result2))//retrieve data one by one
	  {
		  	// echo "here"; 
	    if(($count+1)==$row2["postcount"])
		{     
		   // echo "also here";
		     $range=$row2["postcount"];
			// echo $range; 
	     }
			
		
	  }
			if($range!=0)
			{
			 $sql3="select level from reward where postcount='$range' and type='improvement' ";
			   $result3=mysqli_query($con,$sql3);
			    while($row3=mysqli_fetch_array($result3))
				{
					$level=$row3["level"];
					// echo $level;
				    $sql4="update register set reward3=$level where id=$uid";
					if(mysqli_query($con,$sql4))
					{
					  $s = "....Congratulations.... \\n You Have been Rewarded For suggesting Improvements ";
                     echo "<script>alert(\"$s\")</script>";				
					 
					}

				
				}
			}
				
			   
			
		 
		




?>

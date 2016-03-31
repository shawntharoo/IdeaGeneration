<?php
function getsearchandpost($category)
{
  
	 	if(isset($_POST["searchkey"])){
			$s= $_POST["searchkey"];
			$where = "WHERE  category='$category' and title like '%$s%' OR content like '%$s%'";
		}else{
			$where ="WHERE  category='$category'";	
		}
	  
	  $sql="select * from post ".$where; //retrieve data from system storage
	  include("database_connect.php");    //provide database connection
	  $result=mysqli_query($con,$sql);
	   if (mysqli_num_rows($result)==0)
		 {
		    echo "No Result Found";	 
		 }
	  
	 
}
function getuserdeatails()
{
	
	
	      
			 session_start();
			 $userid=$_SESSION['userid'];
			 
             $sql5="SELECT * from register where id=$userid";
            
	        $result5=mysqli_query($con,$sql5);
	  
	    
	
	}
function getvotes()
{
	
	   $id=$row["postId"];
       $sql2="select COUNT(*) AS votes from votes where submissionId='$id'";//get the vote count
	   include("database_connect.php");
	   $result2=mysqli_query($con,$sql2);
}
 function getimprovement()
{    
	  $sql3="select COUNT(*) AS imp from comment where submissionId='$id' and commentType='Improvement'";//get the improvement count
	  include("database_connect.php");
	  $result3=mysqli_query($con,$sql3);
}
  function getcomment()
{          
		    $sql4="select COUNT(*) AS cmt from comment where submissionId='$id'";//get the comment count
	         include("database_connect.php");
	  	     $result4=mysqli_query($con,$sql4);
}
	  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="stylesheet" href="css/bootstrap.min.css"></link>
 <link rel="stylesheet" href="css/ideacss.css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
 <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
 <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<body>
 <?php
    include('header.php');
 ?>

 <div class="container">
 <a href="view4.php" class="btn btn-success button_design">Back</a>
 </div>
 <div class="container">


       <div class="row">
     <?php
	 	 	
		
         
           
 	    if(isset($_POST["title"])&&!empty($_POST["title"]))
		{ 
	
			
			if(isset($_POST["description"])&&!empty($_POST["description"]))
			{
			   
			    if(isset($_POST["category"])&&!empty($_POST["category"]))
			     {
			     	 if(isset($_POST["faculty"])&&!empty($_POST["faculty"]))
			     	{
                       
                        if(isset($_POST["department"])&&!empty($_POST["department"]))
                        {
						       if(isset($_POST["date"])&&!empty($_POST["date"]))
                                {
									 if(isset($_POST["name"])&&!empty($_POST["name"]))
									 {
										   $n=$_POST["name"];
										   $sql6="select id from register where lname='$n'";
										   include("database_connect.php");    //provide database connection
	                                       $result6=mysqli_query($con,$sql6);
										   if($row6=mysqli_fetch_array($result6))
										   {
										    $uid=$row6["id"];
											$da=str_replace("/","-",$_POST["date"]);
								            $s= $_POST["title"];
			                                $d=$_POST["description"];
			                                $c=$_POST["category"];
			                                $f=$_POST["faculty"];
			                                $de=$_POST["department"];
                                            $where = "WHERE title like '%$s%' and content like '%$d%' and category='$c' and faculty='$f' and department='$de' and date='$da' and userId like '%$uid%'"; 
										   }
										   else
										   {  
										    $da=str_replace("/","-",$_POST["date"]);
								            $s= $_POST["title"];
			                                $d=$_POST["description"];
			                                $c=$_POST["category"];
			                                $f=$_POST["faculty"];
			                                $de=$_POST["department"];
                                            $where = "WHERE title like '%$s%' and content like '%$d%' and category='$c' and faculty='$f' and department='$de' and date='$da'"; }
										 
								     }
									 else
									 {
								      $da=str_replace("/","-",$_POST["date"]);
								      $s= $_POST["title"];
			                          $d=$_POST["description"];
			                          $c=$_POST["category"];
			                          $f=$_POST["faculty"];
			                          $de=$_POST["department"];
                                      $where = "WHERE title like '%$s%' and content like '%$d%' and category='$c' and faculty='$f' and department='$de' and date='$da'"; 
									 }
								}
								else
								{
                                   $s= $_POST["title"];
			                       $d=$_POST["description"];
			                       $c=$_POST["category"];
			                       $f=$_POST["faculty"];
			                       $de=$_POST["department"];
                                   $where = "WHERE title like '%$s%' and content like '%$d%' and category='$c' and faculty='$f' and department='$de'"; 
								}
                        }
                        else
                        {
                         $s= $_POST["title"];
			             $d=$_POST["description"];
			             $c=$_POST["category"];
			             $f=$_POST["faculty"];
                         $where = "WHERE title like '%$s%' and content like '%$d%' and category='$c' and faculty='$f'"; 
                        }

			         
			     	}
			     	else
			     	{

			          $s= $_POST["title"];
			           $d=$_POST["description"];
			            $c=$_POST["category"];


			          $where = "WHERE title like '%$s%' and content like '%$d%' and category='$c'";
                    }
			     }
			    else
			    {	
			       $s= $_POST["title"];
			      $d=$_POST["description"];
			      $where = "WHERE title like '%$s%' and content like '%$d%'";
			    }
			
			}
			else
			{
			$s= $_POST["title"];
			$where = "WHERE title like '%$s%'";
			}
		}
		
		elseif(isset($_POST["description"])&&!empty($_POST["description"]))
		{
	     $d=$_POST["description"];
		 $where = "WHERE content like '%$d%'";
		}
		
		elseif(isset($_POST["category"])&&!empty($_POST["category"]))
		{
			if(isset($_POST["faculty"])&&!empty($_POST["faculty"]))
			{
			  $f=$_POST["faculty"];
			  $c=$_POST["category"];
			  $where = "WHERE faculty='$f' and category='$c'";
					 
			}
			else
			{
	          $c=$_POST["category"];
		      $where = "WHERE category='$c'";
			}
		}
		
		elseif(isset($_POST["faculty"])&&!empty($_POST["faculty"]))
		{
	      if(isset($_POST["department"])&&!empty($_POST["department"]))
	         {
	      	 $f=$_POST["faculty"];
             $de=$_POST["department"];
              $where = "WHERE  faculty='$f' and department='$de'";
	         }
	         else 
	        {
	          $f=$_POST["faculty"];

              $where = "WHERE  faculty='$f'";
            }

	    }
	    elseif(isset($_POST["department"])&&!empty($_POST["department"]))
		{
	       $de=$_POST["department"];
           $where = "WHERE department='$de'"; 
	    }
		 elseif(isset($_POST["date"])&&!empty($_POST["date"]))
		{
	        $da=str_replace("/","-",$_POST["date"]);
			echo $da;
            $where = "WHERE date='$da'"; 
	    }
	     elseif(isset($_POST["name"])&&!empty($_POST["name"]))
		{
	     
		   $n=$_POST["name"];
		   $sql7="select id from register where lname='$n'";
	       include("database_connect.php");    //provide database connection
	       $result7=mysqli_query($con,$sql7);
		   if($row7=mysqli_fetch_array($result7))
		   {
			    
	        $uid=$row7["id"];
            $where = "WHERE userId like '%$uid%'"; 
            }
			else
			{ 
				$where ="";	
			}
	    }
		
		else
		{
			
			$where ="";	
		}

		if(isset($_POST["sort"]))

		{

		$sortBy = $_POST["sort"];
		
	     }
	  if(isset($_POST["sort"]) && $sortBy != null)
	  {
	  
		if  (($_POST["sort"])=="vote"){
			
			$sql = "select * from votes AS V JOIN post AS P on V.submissionId=P.postId ".$where." GROUP BY submissionId order by COUNT(voteId) desc";
		}
		else if  (($_POST["sort"])=="comment"){
				
			$sql = "select * from comment AS C JOIN post AS P on C.submissionId=P.postId ".$where." and commentType='Comment' GROUP BY submissionId order by COUNT(commentId) desc";
		}
		else if  (($_POST["sort"])=="improvement"){
			
			$sql = "select * from comment AS C JOIN post AS P on C.submissionId=P.postId ".$where." and commentType='Improvement' GROUP BY submissionId order by COUNT(commentId) desc";
		}
		 else{
	  $sql="select * from post ".$where;//retrieve data from system storage
	  }
	  }
	  else{
	  $sql="select * from post ".$where;//retrieve data from system storage
	  }
	
	  
	  
	 //sql="select * from post ".$where;//retrieve data from system storage
	  include("database_connect.php");    //provide database connection
	  $result=mysqli_query($con,$sql);
	   if (mysqli_num_rows($result)==0)
		 {
		    echo "No Submissions Found";	 
		 }
	  
	  while($row = mysqli_fetch_array($result))//retrieve data one by one
	  {
		
	  
   ?>
     <div class="jumbotron viewblock">
       <div class="container">
           <div class="col-md-2 leftcolomn">
            <?php
		     $userid=$row['userId'];
             $sql5="SELECT * from register where id=$userid";
            
	        $result5=mysqli_query($con,$sql5);
	  
	       if(mysqli_num_rows($result5)==0)
			   {
				    $photo="images/user2.jpg";
		           
				   
				   $GLOBALS["name"]='user';
					 
			    }
			else{
	  
	         while($row5 = mysqli_fetch_array($result5))
	         {
				 
		       
				   $photo=$row5["Image"];
				   $GLOBALS["name"]=$row5["lname"];
				   $reward=$row5["reward"];
				   $reward2=$row5["reward2"];
           		   $reward3=$row5["reward3"];
				   
			 }
	        
	          if(!file_exists($photo))
	           {
		   $photo="images/user2.jpg";
		      }
             ?>
                   <?php
	               }
			       
	             ?>
     
              
                 <div class="row">
                <img src=<?= $photo ?> width="100" height="100" class="img img-thumbnail"/>
                 </div>
                  <div class="row">
                    <?php

                      $rewardimg=NULL;
                      $rewardimg2=NULL;
                      $rewardimg3=NULL;
                      $sql6="select img,name from reward where level='$reward' and type='submission'";
                      $result6=mysqli_query($con,$sql6);
                        while($row6 = mysqli_fetch_array($result6))
                        {

                          $rewardimg=$row6["img"];
                          $title=$row6["name"];
                        }
                           if($rewardimg!=NULL)
                         {
                      ?>
                     <img src=<?= $rewardimg ?> width="40" height="30" data-toggle="tooltip" data-placement="bottom" title=<?=$title?> />
                     

                     <?php
                      }
                     ?>

                    <?php
                    
                            
                          $sql7="select img,name from reward where level='$reward2' and type='vote'";
                          
                         
                          $result7=mysqli_query($con,$sql7);
                        while($row7= mysqli_fetch_array($result7))
                        {

                         
                          $rewardimg2=$row7["img"];
                          $title2=$row6["name"];
                        

                        }
                      
                            if($rewardimg2!=NULL)
                         {
                           ?>
                    

                     <img src=<?= $rewardimg2 ?> width="35" height="30" data-toggle="tooltip" data-placement="bottom" title=<?=$title2?> />
                    
                      
                      <?php

                     }
                     ?>

                      <?php
                  
                          $sql7="select img,name from reward where level='$reward3' and type='improvement'";
                          
                         
                          $result7=mysqli_query($con,$sql7);
                    
                        while($row7= mysqli_fetch_array($result7))
                        {

                         
                          $rewardimg3=$row7["img"];
                          $title3=$row6["name"];

                        }
                     
                         if($rewardimg3!=NULL)
                         {
                           ?>
                         
                       

                     <img src=<?= $rewardimg3 ?> width="35" height="30" data-toggle="tooltip" data-placement="bottom" title=<?=$title3?> />

                    <?php

                     }
                    ?>
                 </div>
                 <div class="row">
                 
                 <?php echo $GLOBALS["name"]?>
              
                 </div>
                 <div class="row">
                 <?= $row["dateTime"]?>
                 </div>
          
                
           </div>
           <div class="col-md-6 middlecolomn">
               <div class="row title">
               <h4><a href="viewidea.php?id=<?=$row["postId"]?>"><?= $row["title"]?></a></h4>
               </div>
               <div class="row content">
               <p> <?php echo $row["content"]; ?></p>
             
               </div>
                 <div class="row">
               <?php
               $img=$row["files"];
                    if(file_exists($img)&&strcmp($img,"images/")!=0)
                  {
                      ?>
               <img src=<?= $row["files"]?> width="200" height="150" class="img img-thumbnail"/>
                <?php
                }
               ?>
            
               </div>
                <div class="row">
                  <div class="col-md-4 departments">
                   <button class="submitidea2"><?php echo $row["faculty"]; ?></button>
                  
                  </div>
                  <div class="col-md-8 departments">
                   <button class="submitidea3"><?php echo $row["department"]; ?></button>
                
                  </div>
               </div>
           
            </div>
            <div class="col-md-2 rightcolomn">
             
            <?php 
            $id=$row["postId"];
            $sql2="select COUNT(*) AS votes from votes where submissionId='$id'";//get the vote count
	          include("database_connect.php");
	  	      $result2=mysqli_query($con,$sql2);
	  
	          while($row2= mysqli_fetch_array($result2))
	          {
	  
              ?>
                  <div class="row">
                 <button class="submitidea"><?php echo $row2["votes"] ?> Votes</button>
                </div>
                 <?php
	               }
	             ?>
                    <div class="row">
                          <?php $sql3="select COUNT(*) AS imp from comment where submissionId='$id' and commentType='Improvement'";//get the improvement count
	                       include("database_connect.php");
	  	                   $result3=mysqli_query($con,$sql3);
	  
	                       while($row3= mysqli_fetch_array($result3))
	                       {
	  
                           ?>
                  <div class="col-md-6 iconcolomn">
                    <div class="image">
                    <img src="images/Android-Messages - Copy.png" width="50" height="50" class="img-responsive"/><?php echo $row3["imp"] ?> Improvemnts
                          </div>
						  <?php
	                       }
	                      ?>
                  </div>
                   <div class="col-md-6 iconcolomn">
                     <?php $sql4="select COUNT(*) AS cmt from comment where submissionId='$id' and commentType='Comment'";//get the comment count
	                       include("database_connect.php");
	  	                   $result4=mysqli_query($con,$sql4);
	  
	                       while($row4= mysqli_fetch_array($result4))
	                       {
	  
                           ?>
                              <div class="image">
                    <img src="images/Android-Messages.png" width="50" height="50" class="img-responsive" /><?php echo $row4["cmt"] ?> Comments
                        </div>
                         <?php
	                       }
	                      ?>
                    
                   </div> 
               </div>
             
            </div>
         </div>
      </div>
     <?php
	  }
	 ?>
     </div>
   </div>
   <?php
    include('footer.php');
   ?>  
</body>
</html>
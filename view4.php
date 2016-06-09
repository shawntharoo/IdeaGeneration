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
 <div class="container" style="margin-left:80px;">
  <a href="postSubmission.php" class="btn btn-success button_design">Submit Idea</a>
</div>

 <div class="container">
          <nav class="navbar navbar">
             <div class="container-fluid">
  
                  <ul class="nav navbar-nav">
                       <li class="dropdown">
                           <a class="dropdown-toggle in active" data-toggle="dropdown" href="#">Faculty of Computing 
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                             <li><a href="#" class="in active">Academic</a></li>
                            
                             <li><a href="studentaffairs.php">Student Affairs</a></li>
                             <li><a href="sports.php">Sports and Societies</a></li>
                             
                             <li><a href="external.php">External</a></li> 
                            </ul>
                        </li>
                       
                        
                     </ul>
                </div>
           </nav>
    
 </div>
 <div class="container">
  <div class="row">
                    <div class="col-md-2">
        
                             <h3>ACADEMIC</h3>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                     
                    </div>
                    <div class="col-md-3">
                           <div class="row searchgroup">
                            
                                    <form method="post">
                              <div class="col-md-8 search_col">
                                     <input type="text" class="search_text" placeholder="Search" name="searchkey3"/>
                             </div>
                             <div class="col-md-4">
                                     <button class="search_btn" >
                                             <i class="fa fa-search"></i>
                                     </button>
                                    <a href="advanced.php" data-toggle="tooltip" data-placement="bottom" title="Advanced Search"> <img src="images/advsearch.png" class="advsearch" height="24px" width="26px"
                                     /></a>
                            </div>
                                  </form>
                                 
                          </div>
       </div>
      </div>
       <div class="row">
     <?php
	 	if(isset($_POST["searchkey3"]))
		{
			$s= $_POST["searchkey3"];
			$where = "WHERE  category='Academic' and faculty='Faculty of Computing' and title like '%$s%'";
		}
		else
		{
			$where ="WHERE  category='Academic' and faculty='Faculty of Computing'";	
		}
	  
	  $sql="select * from post ".$where." order by dateTime desc"; //retrieve data from system storage
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
               <h4><a href="viewidea.php?id=<?=$row["postId"]?>&comt=0"><?= $row["title"]?></a></h4>
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
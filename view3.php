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
  <div class="container-fluid header">
       <div class="row headerrow">
          <div class="col-md-4">
            <img src="images/logo.png" class="img img-responsive"/>
          </div>
        </div>  
  </div> 

 <div class="container">
   <ul class="nav nav-tabs">
 
       <li class="dropdown">
             <a class="dropdown-toggle" data-toggle="dropdown" href="#">FACULTY OF COMPUTING
             <span class="caret"></span></a>
             <ul class="dropdown-menu viewdropdown">
                <li><a  data-toggle="tab" href="#fcmenu1">ACADEMIC</a></li>
                <li><a data-toggle="tab"href="#fcmenu2">STUDENT AFFAIRS</a></li>
                <li><a data-toggle="tab" href="#fcmenu3">SPORTS AND SOCIETIES</a></li> 
                <li><a data-toggle="tab" href="#fcmenu4">EXTERNAL</a></li> 
            </ul>
       </li>
    
       
       <li class="dropdown">
             <a class="dropdown-toggle" data-toggle="dropdown" href="#">FACULTY OF BUSINESS MANAGEMENT
             <span class="caret"></span></a>
             <ul class="dropdown-menu">
                 <li><a  data-toggle="tab" href="#fbmmenu1">ACADEMIC</a></li>
                <li><a data-toggle="tab"href="#fbmmenu2">STUDENT AFFAIRS</a></li>
                <li><a data-toggle="tab" href="#fbmmenu3">SPORTS AND SOCIETIES</a></li> 
                <li><a data-toggle="tab" href="#fbmmenu4">EXTERNAL</a></li> 
            </ul>
       </li>
       
       
       <li class="dropdown">
             <a class="dropdown-toggle" data-toggle="dropdown" href="#">FACULTY OF ENGENEERING
             <span class="caret"></span></a>
             <ul class="dropdown-menu">
               <li><a  data-toggle="tab" href="#fbmmenu1">ACADEMIC</a></li>
                <li><a data-toggle="tab"href="#fbmmenu2">STUDENT AFFAIRS</a></li>
                <li><a data-toggle="tab" href="#fbmmenu3">SPORTS AND SOCIETIES</a></li> 
                <li><a data-toggle="tab" href="#fbmmenu4">EXTERNAL</a></li> 
            </ul>
       </li>
    
    
  </ul>
     <div class="tab-content">
        <!--FACULTY OF COMPUTING-->
        <?php
		 include('getview.php');
		?>
             <div id="fcmenu1" class="tab-pane fade">
                 <h3>ACADEMIC</h3>
  
   
               </div>
               <div id="fcmenu2" class="tab-pane fade">
                 <h3>STUDENT AFFAIRS</h3>
  
   
               </div>
               <div id="fcmenu3" class="tab-pane fade">
                  <div class="row">
                    <div class="col-md-2">
        
                             <h3>SPORTS AND SOCIETIES</h3>
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
                                     <input type="text" class="search_text" placeholder="Search" name="searchkey"/>
                             </div>
                             <div class="col-md-4">
                                     <button class="search_btn" >
                                             <i class="fa fa-search"></i>
                                     </button>
                            </div>
                                  </form>
                          </div>
       </div>
      </div>
       <div class="row">
     <?php

      getsearchandpost('Sports and Societies');
	  
	  while($row = mysqli_fetch_array($result))//retrieve data one by one
	  {
		
	  
   ?>
     <div class="jumbotron viewblock">
       <div class="container">
           <div class="col-md-2 leftcolomn">
            <?php
			getuserdeatails();
	  
	        while($row5 = mysqli_fetch_array($result5))
	         {
	         $photo=$row5["Image"];
	          if(!file_exists($photo))
	           {
		   $photo="images/user2.jpg";
		      }
             ?>
    
     
              
                 <div class="row">
                <img src=<?= $photo ?> width="100" height="100" class="img img-thumbnail"/>
                 </div>
                 <div class="row">
                 
                 <?= $row5["lname"]?>
                   <?php
	               }
	             ?>
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
                  <div class="col-md-4 departments">
                   <button class="submitidea2"><?php echo $row["faculty"]; ?></button>
                  
                  </div>
                  <div class="col-md-6 departments">
                   <button class="submitidea3">Department - <?php echo $row["department"]; ?></button>
                
                  </div>
               </div>
           
            </div>
            <div class="col-md-2 rightcolomn">
             
            <?php 
            getvotes();
	  
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
                          <?php 
						  getimprovement();
	  
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
                     <?php 
					      getcomment();
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
               <div id="fcmenu4" class="tab-pane fade in active">
                <!--FACULTY OF COMPUTING EXTERNAL-->
                <div class="row">
                    <div class="col-md-2">
        
                             <h3>SERVICES </h3>
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
                                     <input type="text" class="search_text" placeholder="Search" name="searchkey"/>
                             </div>
                             <div class="col-md-4">
                                     <button class="search_btn" >
                                             <i class="fa fa-search"></i>
                                     </button>
                            </div>
                                  </form>
                          </div>
       </div>
      </div>
       <div class="row">
     <?php
	 	if(isset($_POST["searchkey"])){
			$s= $_POST["searchkey"];
			$where = "WHERE  category='External' and title like '%$s%' OR content like '%$s%'";
		}else{
			$where ="WHERE  category='External'";	
		}
	  
	  $sql="select * from post ".$where; //retrieve data from system storage
	  include("database_connect.php");    //provide database connection
	  $result=mysqli_query($con,$sql);
	   if (mysqli_num_rows($result)==0)
		 {
		    echo "No Result Found";	 
		 }
	  
	  while($row = mysqli_fetch_array($result))//retrieve data one by one
	  {
		
	  
   ?>
     <div class="jumbotron viewblock">
       <div class="container">
           <div class="col-md-2 leftcolomn">
            <?php
			 session_start();
			 $userid=$_SESSION['userid'];
			 
             $sql5="SELECT * from register where id=$userid";
            
	        $result5=mysqli_query($con,$sql5);
	  
	        while($row5 = mysqli_fetch_array($result5))
	         {
	         $photo=$row5["Image"];
	          if(!file_exists($photo))
	           {
		   $photo="images/user2.jpg";
		      }
             ?>
    
     
              
                 <div class="row">
                <img src=<?= $photo ?> width="100" height="100" class="img img-thumbnail"/>
                 </div>
                 <div class="row">
                 
                 <?= $row5["lname"]?>
                   <?php
	               }
	             ?>
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
                  <div class="col-md-4 departments">
                   <button class="submitidea2"><?php echo $row["faculty"]; ?></button>
                  
                  </div>
                  <div class="col-md-6 departments">
                   <button class="submitidea3">Department - <?php echo $row["department"]; ?></button>
                
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
                     <?php $sql4="select COUNT(*) AS cmt from comment where submissionId='$id'";//get the comment count
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
               <!--END OF FACULTY OF COMPUTING-->
   </div>
 </div>
</body>
</html>
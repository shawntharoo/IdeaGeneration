<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="css/bootstrap.min.css"></link>
 <link rel="stylesheet" href="css/ideacss.css" />
     <link rel="stylesheet" href="css/slider.css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
 <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> <!--for fadeout -->
  <script type="text/javascript" src="js/jquery-2.2.3.js"></script> 


 <script type="text/javascript" src="js/bootstrap.min.js"></script>
 <script type="text/javascript" src="js/bootstrap-slider.js"></script>

 <script type="text/javascript">
						 
						 function updateText(val){
							 document.getElementById('inputRange').value = val;
						 }
						 </script>
</head>


<body>
<?php
	session_start();
	$userNo = $_SESSION['userid'] ;
	
	$submissionId = $_GET['id'];
	

?>

 <?php

					
					include('database_connect.php');
					//$submissionId = $_SESSION['subId'];
					$sqlView =  "SELECT * FROM post WHERE postId = '$submissionId'";
					$result = mysqli_query($con,$sqlView);

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result))
						{
  		   					$title = $row['title'];
							$category = $row['category'];
							$content = $row['content'];
              $img = $row['files'];
						}

					}
				
					else{
								echo 'error'.mysqli_error($con);
						}
							
	?>
    <?php
    			$sql= "select * from votes where submissionId = '$submissionId' AND userId='$userNo' ";
				$result = mysqli_query($con,$sql);
				$casted_vote_type =null;
				$casted_vote = 0;
				if(mysqli_num_rows($result) == 0)
				{
					$casted_vote = 0;
				}
				elseif(mysqli_num_rows($result)>= 1)
				{
					$casted_vote = 1;
					while($row = mysqli_fetch_array($result)){
						$casted_vote_type = $row['voteType'];
					}
				}
				else
				{
					echo 'error';
				}
    
   	?>
   
    
   <?php
   include('agoTimeFormat.php');
   $ageObject = new AgoTimeFormat;
   
   include ('database_connect.php');
   
   $sqlQuery="SELECT * FROM comment AS C JOIN register AS R ON C.userId=R.id WHERE C.submissionId='$submissionId' ORDER BY C.date desc ";
   $sql = mysqli_query($con,$sqlQuery) ;    
   $numRows = mysqli_num_rows($sql);
   $all_responses = array($numRows);
   $all_response_descriptions = array($numRows);
   $all_responses_type = array($numRows);
   $all_comment_ids = array($numRows);
   $passBit=array($numRows);
   $count =0;
   if($numRows <1)
   {
	   $all_responses[$count] = 'No Comments to display. Be the first! ';
	   $all_response_descriptions[$count]= null;
	   $all_responses_type[$count] =null;
	   $all_comment_ids[$count] = null;
	   $commentId =0;
	   $passBit[$count] = 1;
   }
   else{
	   while($row = mysqli_fetch_array($sql))
	   {
		   $description = $row['description'];
		   $commenttype = $row['commentType'];
		   $commentId = $row['commentId'];
		   $username = $row['fname'];
		   $date = $row['date'];
		   $agoDate = ($ageObject -> convert_datetime($date));
		   $agoDateString = ($ageObject -> makeAgo($agoDate));
		   $all_response_descriptions[$count] =  $description;
		   $all_comment_ids[$count] = $commentId;
		   if ($commenttype == 'Comment')
		   {
			   $passBit[$count] = 1;
			   $all_responses[$count] = ' Re:'.$title.' &nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;'.$agoDateString.'&nbsp; <a href="#"> '.$username.' </a> said';
		   }
		   else
		   {
			   $passBit[$count] = 0;
			   $all_responses[$count] = ' Re:'.$title.' &nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;'.$agoDateString.'&nbsp; <a href="#">'.$username.' </a> suggested an improvement';
		   }
		   $all_responses_type[$count] = $commenttype;
		   $count = $count +1;
	   }
   }
                     
   ?>   
   
   <!--checking if the user is logged in before letting him comment -->
   <?php 
   		$replyButton ='<input type="submit"  value="POST" name="submit"  class="btn btn-success post_pad btn-sample" disabled="disabled button_design" > You must <a href="./login.php" > login </a> to add a comment' ;
		 if( isset($_SESSION['userid']) )
		 {
			 $replyButton = '<input type="submit"  value="POST" name="submit"  class="button_design btn btn-success"  >';
   
		 }
   
   ?>

  <?php
  
    include('header.php');
  ?>
<div class="container" >
  <a href="view4.php" class="btn btn-success button_design">Back</a>
</div>  
  
  <script type="text/javascript"> 
                         window.onload = function() {$('.stylealert').fadeIn().delay(3000).fadeOut();
						 
						  <?php
						 if ( isset($_GET['submitid']))
						 {
                         	$submitId = $_GET['submitid'];
							if($submitId==1)
							{
								$alertmsg = 'Thank You. We successfully added your comment';
							}
							elseif($submitId==2)
							{
								$alertmsg ='Thank You. We successfully added your improvement';
							}
							
							
						 }
						 else
						 {
							 $alertmsg = "";
						 }
						 
						 // for the votes 
						  if ( isset($_GET['submitvid']))
						 {
                         	$submitvId = $_GET['submitvid'];
							if($submitvId==2)
							{
								$alertvmsg = 'Please select a weight for your vote';
							}
							elseif($submitvId==1)
							{
								$alertvmsg = 'Thank You. We successfully counted in your vote';
							}
							elseif($submitvId==0)
							{
								$alertvmsg ='error';
							}
							else
							{
								$alertmsg = $submitvId;
							}
						 }
						 else	
						 {
							  $alertvmsg = "";
						 }
						 
						 ?>
						 
						 };
						 
						 
                         
                         </script>
                         
                          <script type="text/javascript"> 
                         window.onload = function() {$('.stylealert').fadeIn().delay(3000).fadeOut();
						 
						  <?php
						
						 // for the improvement votes 
						  if ( isset($_GET['impvid']))
						 {
                         	$impvid = $_GET['impvid'];
							
						 }
						 else
						 {
							 $impvid = "";
						 }
						
						 ?>
						 
						 };
						 
						 
                         
                         </script>
                         
                        
                         
  <div class="container-fluid fluidbg">
  		<div class="jumbotron viewjum">

          <div class="container containeropac">
        		<div class="col-md-9" >
                   
                          <div class="row themecolor">   <!--themecolor-->
                	           <h5><b>SUBMISSION :</b></h5>
                  
                          </div>
            	          <div class="row submissionpad">   <!--title  submissionpad-->
                	           <h4><?php  echo $title ?>  </h4>
                  
                          </div>
                         <div class="row ad justcategory"> <!--category  ad justcategory-->
                	     	 <div class="col-md-1 themecolor">
                          		Category: 
                          	 </div>
                              <div class="col-md-3 aligntext">
                          	    <?php echo "  ".$category ?> 
                          	 </div>
	                     </div>
                         
                         <div class="row adjusttop2 "> <!--description-->
                	     	<?php echo $content ?> 
                         </div>
                           <div class="row adjusttop3 ">
                            <!--description-->
                            <?php
                              if(strcmp($img,"images/")!=0)
                              {
                            ?>
                           <img src=<?= $img ?> width="300" height="200" class="img img-thumbnail"/>
                           <?php
                             }
                           ?>
                         </div>

                      
                         
                         <!-- form to handle votes -->
                         
                         <br />
                       <!--  <hr class = "lineset" size="30"/>-->
                         
                         <?php  include ('validations.php');  ?>
                         <!-- form is for comment handling -->
                        
                        	<div class="row adjusttop aligntext" > <!--comment description box and votes-->
                             <div class="col-md-9">
                         <form name="commentform" action="comment_collect.php" method="post" onsubmit ="return validateform();">
                   
                	     	 <textarea cols="76" rows="5" name="description" placeholder="Add a comment"></textarea>
                             
                             
                             <select name="commentType">
                             	<option value="Choose your comment type">Choose your comment type </option>
                             	<option value="Add a comment"> Add a comment</option>
                                <option value="Add my idea as an improvement">Add my idea as an improvement </option>
                             </select>
                             
                         	<div class="row adjusttop2" > <!--comment button-->
                	     
                         	<!-- <input type="submit"  value="POST" name="submit"  class="post_pad btn-sample"  >-->
                            <?php echo $replyButton; ?>
                             <label class="stylealert"> <?php echo '<span style="color:green;">' .$alertmsg .'</span>'?> </label>
                             <input type="text" class="hidden" value="<?php echo $submissionId ?>" name="subId" />
                         	</div>
                            </form>
                            
                            <div id="responses" class="adjust_div" >
							 <?php $i=0; while($i< sizeof($all_responses)){ ?> 
                            	
                              
                                <?php if ($passBit[$i]==0) { ?>
                               <div class="imp_response_top_div"> <?php echo $all_responses[$i]; ?> </div>
                               <div class="imp_response_div">
                               	<form name="voteform1" action="imp_vote_collect.php" method="post" >
                               	<div class="col-md-8" ><?php echo $all_response_descriptions[$i];?> </div>
                                <div class="col-md-4" >
                                <!-- check whether the user has voted more than once on the improvements-->
                                <div class="row">
                                <div class="col-md-2" > <input type= "image" name="voteup" value="UPVOTE" src="images/like.png" height="25px" width="25px"  /></div>
                                <div class="col-md-1" > <input type= "image" name="votedown" value="DOWNVOTE"  src="images/unlike.png"  height="25px" width="25px"  /></div>
                               <div class="col-md-7" align="right" style="padding-right:0px">
                               <input type="text" id="imp_inputRange" name="imp_inputRange" readonly="readonly" style="width:30px; text-align:center"/>
                               <input type="text" class="hidden" value="<?php echo $all_comment_ids[$i] ?>" name="comId" />
                                <input type="text" class="hidden" value="<?php echo $submissionId ?>" name="subId" />
                               </div> 
                               </div>
                               
                               
                               <div class="row"> <input type="range" max="100" min="0" name="voteCount" onclick="updateText(this.value);" /> <?php echo $impvid; ?>
							   </div>
                               </div> </div>
                               </form>
                                <?php } else if ($passBit[$i]==1){ ?>
                                <div class="response_top_div"> <?php echo $all_responses[$i]; ?> </div>
                               <div class="response_div"> <?php echo $all_response_descriptions[$i]; ?> </div>
                                <?php } $i++; }  ?>
                             </div>
 
                         
                         </form>
                         </div>
                         
                          <div class="col-md-3">
                              
                              	<form name="voteform" action="vote_collect.php" method="post" >
                			    <div class="row"> <!--vote panel-->
                                 <?php if($casted_vote==0) {  ?>
                	        	<div class="col-md-3 vote_design">
                            
                    	    	<input type= "image" name="voteup" value="UPVOTE" src="images/like.png" height="40px"
                                  width="40px" align="left" />
                                </div>
                    		 	<div class="col-md-4 vote_design">
                    			 <input type= "image" name="votedown" value="DOWNVOTE"  src="images/unlike.png"  height="40px"
                                  width="40px"  align="left" />
                           		
                    			</div> 
                                <div class="col-md-3 vote_design">
                                	Weight &nbsp;<input type="text" id="inputRange" name="inputRange" readonly="readonly" style="width:30px; text-align:center"/>
                                </div>
                                 <?php  } if(($casted_vote>=1) && ($casted_vote_type=='Upvote')){  ?>
                                <div class="col-md-3 vote_design">
                            
                    	    	<input type= "image" name="voteup" value="UPVOTE" src="images/like_bw.png" height="40px"
                                  width="40px" align="left"  disabled="disabled"/>
                                </div>
                    		 	<div class="col-md-4 vote_design">
                    			 <input type= "image" name="votedown" value="DOWNVOTE"  src="images/unlike.png"  height="40px"
                                  width="40px"  align="left" />
                           		
                    			</div> 
                                <div class="col-md-3 vote_design">
                                	Weight &nbsp;<input type="text" id="inputRange" name="inputRange" readonly="readonly" style="width:30px; text-align:center"/>
                                </div>
                                <?php }  if(($casted_vote>=1) && ($casted_vote_type=='Downvote')){  ?>
                                <div class="col-md-3 vote_design">
                            
                    	    	<input type= "image" name="voteup" value="UPVOTE" src="images/like.png" height="40px"
                                  width="40px" align="left" />
                                </div>
                    		 	<div class="col-md-4 vote_design">
                    			 <input type= "image" name="votedown" value="DOWNVOTE"  src="images/unlike_bw.png"  height="40px"
                                  width="40px"  align="left" disabled="disabled" />
                           		
                    			</div> 
                                <div class="col-md-3 vote_design">
                                	Weight &nbsp;<input type="text" id="inputRange" name="inputRange" readonly="readonly" style="width:30px; text-align:center"/>
                                </div>
                                <?php } ?>
                                </div>
                            	<div class="row "> <!-- vote bar -->
                                <!-- <input type="range" max="100" min="0" name="voteCount" onclick="updateText(this.value);" />-->
                                
                    		 	<label class="stylealert"> <?php echo '<span style="color:green;">' .$alertvmsg .'</span>'?> </label>	
                               
                              	<br />
                               <input type="text" class="hidden" value="<?php echo $submissionId ?>" name="subId" />	
                                   <input id="ex13" type="text" data-slider-ticks="[0, 100, 200, 300, 400]" data-slider-ticks-snap-bounds="30" data-slider-ticks-labels='["$0", "$100", "$200", "$300", "$400"]'/>
                 <script type="text/javascript">
  $("#ex13").slider({
    ticks: [0, 100, 200, 300, 400],
    ticks_labels: ['$0', '$100', '$200', '$300', '$400'],
    ticks_snap_bounds: 30
});

                  </script> 
                           		</div> 
                         		
                            	</form>
                         
                        
                         </div>
                        <!--redirecting the result after adding the data to the DB to display the message-->
                        
                  
 			 </div>
         </div>
                    <?php
					
					include('database_connect.php');
					//getting the user id of the person who posted the submission
					$submissionId = $_GET['id'];
					
					$getUsername = "SELECT userId from post where postId='$submissionId' ";
					$resultUser = mysqli_query($con,$getUsername);
					
					if (mysqli_num_rows($resultUser ) > 0){
						while($row = mysqli_fetch_assoc($resultUser))
						{
							$postedUser = $row['userId'];
						}
					}
					else{
						echo mysqli_error($con);
					}
					
					
					$sqlUser =  "SELECT * FROM register WHERE id = '$postedUser'";
					$result = mysqli_query($con,$sqlUser);

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result))
						{
  		   	
					?>
                  <div class="col-md-3" align="center"  >
            	 	<div class="row">
                    	<img src="<?= $row['Image'] ?>" class="photosize" />
                    </div>
                    <div class="row" >
                    	<?php echo $row['fname']." ".$row['lname'] ?> <br  />
                       <?php echo $row['category']?> <br  />
                      
                    </div>
                 </div>
                
             <?php  }
					}
					else{
						echo mysqli_error($con);
					}
					?>
              
        </div>

  		
 <!-- </div>

<div class="container-fluid fluidbg">-->
  		<div class="jumbotron viewjum colorjum paddown " >

          <div class="container ">
          
          <?php
		 	
			$_SESSION["subId"] = $submissionId;
		  	include ('submission_details.php');
			
		  ?>
          			<div class="row" align="center">
                    	<div class="col-md-3 alignval ">
                        	<h2> <?php echo $viewCount ?> </h2> 
                            <h5> VIEWS </h5>
                        </div>
                        <div class="col-md-2 " >
                        	<h2> <?php echo $upvoteCount ?> </h2> 
                            <h5> UPVOTES </h5>
                        </div>
                        <div class="col-md-2 ">
                        	<h2> <?php echo $downvoteCount ?> </h2> 
                            <h5> DOWNVOTES </h5>
                        </div>
                        <div class="col-md-2 alignval">
                        	<h2> <?php echo $commentCount ?> </h2> 
                            <h5> COMMENTS </h5>
                        </div>
                        <div class="col-md-3 ">
                        	<h2> <?php echo $improvCount ?> </h2> 
                            <h5> IMPROVEMENTS </h5>
                            
                        </div>
                    
                    </div>
          
          </div>
        </div>
<!--</div>          

<div class="container-fluid">-->
  	<!--	<div class="jumbotron viewjum " >
          <div class="container ">
          
              <?php
			  	include('database_connect.php');
				//$submissionId = $_SESSION['subId'];
				$sqlTable =  "SELECT U.fname, C.description, C.date, C.commentType FROM comment C, register U WHERE U.id = C.userId AND C.submissionId = '$submissionId' ORDER BY C.date DESC";
				$result = mysqli_query($con,$sqlTable);

				if (mysqli_num_rows($result) > 0) {
  		   	
  			  	?>
				
                <table class="table table-striped">
   				<thead>
                <tr>
                <th> Commented By</th>
                <th> Description </th>
                <th> Date added </th>
                <th> Type of submission </th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
       			<tr>
                <td> <?php echo $row['fname'] ?> </td>
                <td> <?php echo $row['description'] ?> </td>
                <td> <?php echo $row['date'] ?> </td>
                <td> <?php echo $row['commentType'] ?> </td>
                </tr>
                <?php }
				
				}
				
				else{
					echo 'No Comments to display!';
				}
				?>
                
                </tbody>
                </table>			  
			 
               
               
               
               
          </div>
        </div> -->
</div>          


<?php 
	include('footer.php');

?>
</body>
</html>

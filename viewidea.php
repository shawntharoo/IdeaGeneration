<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="css/bootstrap.min.css"></link>
 <link rel="stylesheet" href="css/ideacss.css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
 <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> <!--for fadeout -->

</head>


<body>
<?php
	session_start();
	$userNo = $_SESSION['userid'] ;
	
	$submissionId = $_GET['id'];
	

?>
  <?php
  
    include('header.php');
  ?>
<div class="container" style="margin-left:40px;">
  <a href="view4.php" class="btn btn-success">Back</a>
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
							if($submitvId==1)
							{
								$alertvmsg = 'Thank You. We successfully counted in your vote';
							}
							elseif($submitvId==0)
							{
								$alertvmsg ='error';
							}
						 }
						 else	
						 {
							  $alertvmsg = "";
						 }
						 
						 ?>
						 
						 };
						 
						 
                         
                         </script>
                         
                         
  <div class="container-fluid fluidbg">
  		<div class="jumbotron viewjum">

          <div class="container containeropac">
        		<div class="col-md-8">
                         <?php
					
					include('database_connect.php');
					//$submissionId = $_SESSION['subId'];
					$sqlView =  "SELECT * FROM post WHERE postId = '$submissionId'";
					$result = mysqli_query($con,$sqlView);

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result))
						{
  		   	
					?>
                          <div class="row themecolor">   <!--title but need to take everything from the database-->
                	           <h5><b>SUBMISSION :</b></h5>
                  
                          </div>
            	          <div class="row submissionpad">   <!--title but need to take everything from the database-->
                	           <h4><?php  echo $row['title'] ?>  </h4>
                  
                          </div>
                         <div class="row ad justcategory"> <!--category-->
                	     	 <div class="col-md-1 themecolor">
                          		Category: 
                          	 </div>
                              <div class="col-md-3 aligntext">
                          	    <?php echo "  ".$row['category'] ?> 
                          	 </div>

	                     </div>
                         
                         <div class="row adjusttop2"> <!--description-->
                	     	<?php echo $row['content'] ?> 
                         </div>
                         
                         <?php }

							}
				
							else{
								echo 'error'.mysqli_error($con);
							}	
						?>

                         
                         <!-- form to handle votes -->
                         <form name="voteform" action="vote_collect.php" method="post" >
                		 <div class="row adjusttop2"> <!--vote panel-->
                	        <div class="col-md-2 ">
                            
                    	    <input type= "image" name="voteup" value="UPVOTE" src="images/like.png" height="60px"
                                  width="60px" class="button_pad" />
                            </div>
                    		<div class="col-md-2 ">
                    			 <input type= "image" name="votedown" value="DOWNVOTE"  src="images/unlike.png"  height="60px"
                                  width="60px" class="button_pad" />
                           		
                    		</div>
                            <div class="col-md-8 "> <!-- vote bar -->
                    		 <label class="stylealert"> <?php echo '<span style="color:green;">' .$alertvmsg .'</span>'?> </label>	
                              
                              <br />
                               <input type="text" class="hidden" value="<?php echo $submissionId ?>" name="subId" />	
                         </div> 
                         
                         </form>
                         
                         <hr class = "lineset" size="30"/>
                         
                         <?php  include ('validations.php');  ?>
                         <!-- form is for comment handling -->
                        
                         <form name="commentform" action="comment_collect.php" method="post" onsubmit ="return validateform();">
                         
                         	<div class="row adjusttop" > <!--comment description box-->
                	     	 <textarea cols="100" rows="4" name="description" placeholder="Add a comment">  </textarea>
                             
                             
                             <select name="commentType">
                             	<option value="Choose your comment type">Choose your comment type </option>
                             	<option value="Add a comment"> Add a comment</option>
                                <option value="Add my idea as an improvement">Add my idea as an improvement </option>
                             </select>
                             
                         	</div>
                         	<div class="row adjusttop2"> <!--comment button-->
                	     
                         	 <input type="submit"  value="POST" name="submit"  class="post_pad btn-sample"  >
                             <label class="stylealert"> <?php echo '<span style="color:green;">' .$alertmsg .'</span>'?> </label>
                             <input type="text" class="hidden" value="<?php echo $submissionId ?>" name="subId" />
                         	</div>
                         
                         </form>
                         
                        <!--redirecting the result after adding the data to the DB to display the message-->
                        
                         
                         

            

  </div>
               </div>
                    <?php
					
					include('database_connect.php');
					//getting the user id of the person who posted the submission
					$getUsername = "SELECT userId from post where postId='$submissionId' ";
					$resultUser = mysqli_query($con,$getUsername);
					if (mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_assoc($resultUser))
						{
							$postedUser = $row['userId'];
						}
					}
					
					
					$sqlUser =  "SELECT * FROM register WHERE id = '$postedUser'";
					$result = mysqli_query($con,$sqlUser);

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result))
						{
  		   	
					?>
                  <div class="col-md-4" align="center">
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
  		<div class="jumbotron viewjum " >
          <div class="container ">
               <!--other comments from the db are stored in a table for now-->
               
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
        </div>
</div>          


<?php 
	include('footer.php');

?>
</body>
</html>

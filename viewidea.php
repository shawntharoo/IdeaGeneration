<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css"></link>
<link rel="stylesheet" href="css/ideacss.css" />
<link rel="stylesheet" href="http://seiyria.com/bootstrap-slider/css/bootstrap-slider.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> <!--for fadeout -->
<script type="text/javascript" src="js/jquery-2.2.3.js"></script> 
<script type="text/javascript" src="js/ajax.js"></script> 

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://seiyria.com/bootstrap-slider/js/bootstrap-slider.js"></script>                  
<script type="text/javascript">
						 
						 function updateText(val){
							 document.getElementById('inputRange').value = val;
						 }
						 
						
						 </script>

</head>

<script type="text/javascript"> 
                         window.onload = function() {$('.stylealert').fadeIn().delay(3000).fadeOut();
             
              };
</script>    


<body>
<?php  include ('validations.php');  ?>
<?php

	session_start();
	$userNo = $_SESSION['userid'] ;
	
	$submissionId = $_GET['id'];
	$comt = $_GET['comt'];

?>

<!-- Count views -->
<?php include('visitor_count.php'); ?>

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
  <!--set value to submission vote slider-->
    <?php
  require('database_connect.php');
    $accurateArr = 0;
    $fArr = 0;
    $timeArr = 0;
  $sqlsetVote = "SELECT weight, voteCategory FROM votes WHERE userId='$userNo' AND submissionId='$submissionId' ";
  $resultsetVote = mysqli_query($con, $sqlsetVote);
  if (mysqli_num_rows($resultsetVote)>0 ){
        while($row = mysqli_fetch_assoc($resultsetVote)){
          if($row['voteCategory'] == 'Accuracy'){  $accurateArr = $row['weight']; }
          if($row['voteCategory'] == 'Feasibility'){  $fArr = $row['weight']; }
          if($row['voteCategory'] == 'Timeliness'){  $timeArr = $row['weight']; }

        }
  }
  else{
    $accurateArr = 0;
    $fArr = 0;
    $timeArr = 0;
  }
    

   
?>
 
  
   <!--checking if the user is logged in before letting him comment -->
   <?php /*
   		$replyButton ='<input type="submit"  value="POST" name="submit"  class="btn btn-success post_pad btn-sample" disabled="disabled button_design" > You must <a href="./login.php" > login </a> to add a comment' ;
		 if( isset($_SESSION['userid']) )
		 {
			 $replyButton = '<input type="submit"  value="POST" name="submit"  class="button_design btn btn-success"  >';
   
		 }
   
 */  ?> 

 <?php
   include('agoTimeFormat.php');
   $ageObject = new AgoTimeFormat;
   
   include ('database_connect.php');
   
   
   $submissionId = $_GET["id"];
   
   $sqlView =  "SELECT * FROM post WHERE postId = '$submissionId'";
          $result = mysqli_query($con,$sqlView);

          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result))
            {
                  $title = $row['title'];
        
          }
          }
        
          else{
                echo 'error'.mysqli_error($con);
            }
   //if the intial comt value is null or 0, show all.. is it is 1 then show all improvements. If it is 2 show comments.
   if($comt == 0){
   $sqlQuery="SELECT * FROM comment AS C JOIN register AS R ON C.userId=R.id WHERE C.submissionId='$submissionId' ORDER BY C.date desc ";
   }
   else if($comt == 1){
   $sqlQuery="SELECT * FROM comment AS C JOIN register AS R ON C.userId=R.id WHERE C.submissionId='$submissionId' AND C.commentType='Improvement' ORDER BY C.date desc ";
   }
   else if($comt == 2){
   $sqlQuery="SELECT * FROM comment AS C JOIN register AS R ON C.userId=R.id WHERE C.submissionId='$submissionId' AND C.commentType='Comment' ORDER BY C.date desc ";
   }
   else{
    header('location:view4.php');
   }

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
       //initialize the votes of the improvements

         $sqlsetiVote = "SELECT weight, voteCategory FROM votes WHERE userId='$userNo' AND improvementId='$commentId' ";
         $resultsetiVote = mysqli_query($con, $sqlsetiVote);
         if (mysqli_num_rows($resultsetiVote)>0){
          while($row = mysqli_fetch_assoc($resultsetiVote)){
            if($row['voteCategory'] == 'Accuracy'){  $accurateArr_i[$commentId] = $row['weight']; }
            if($row['voteCategory'] == 'Feasibility'){  $fArr_i[ $commentId] = $row['weight']; }
            if($row['voteCategory'] == 'Timeliness'){  $timeArr_i[$commentId] = $row['weight']; }
          }
        }
        else{
           $accurateArr_i[ $commentId] = 0;
           $fArr_i[ $commentId] = 0;
           $timeArr_i[ $commentId ] = 0;
        }


       }
       $all_responses_type[$count] = $commenttype;
       $count = $count +1;
     }
   }


                     
   ?>  

  <?php
  
    include('header.php');
  ?>

<div class="container" >
  <a href="view4.php" class="btn btn-success button_design">Back</a>
</div>  
  
  <script type="text/javascript"> 
              window.onload = function() {
                $('.stylealert').fadeIn().delay(3000).fadeOut();
						 
						  <?php

              //comment alertmsg
              if ( isset($_GET['submitid'])){
                 $submitId = $_GET['submitid'];
                if($submitId=='1'){
                  $alertmsg = 'Thank You. We successfully added your comment';
               }
               elseif($submitId=='2'){
                  $alertmsg ='Thank You. We successfully added your improvement';
                }
                else{
                  $alertmsg = 'Sorry! There was an error. '.$submitId;
                }
             }
              else {
                    $alertmsg = " ";
              }
						
						 // for the votes 
						  if ( isset($_GET['submitvid'])){
                 $submitvId = $_GET['submitvid'];
							
                if($submitvId=='1'){
							  	$alertvmsg = 'Thank You. We successfully counted in your vote';
							 }
							 elseif($submitvId=='0'){
							   	$alertvmsg ='error in votes';
				  			}
				  			else{
					   	 		$alertvmsg = $submitvId;
						  	}
  					 }
	     			 else {
			     			 $alertvmsg = "";}


             //for imp
             if ( isset($_GET['submitimpid'])){
                 $submitimpId = $_GET['submitimpid'];
              
                if($submitimpId=='1'){
                  $alertimpmsg = 'Thank You. We successfully counted in your vote';
               }
               elseif($submitimpId=='0'){
                  $alertimpmsg ='error in imp votes';
                }
                else{
                  $alertimpmsg = $submitimpId;
                }
             }
             else {
                 $alertimpmsg = "";}    
						 
						 ?>
						 
						 };
						  </script>
                         
                
  
                       
                         
  <div class="container-fluid fluidbg">
  		<div class=" viewjum">

          <div class="container containeropac">
        	<div class="row post_deco">
                <div class="col-md-8" >
                   
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
           		<div class="col-md-4" align="center"  >
            	 	<div class="row">
                    	<img src="<?= $row['Image'] ?>" class="photosize" />
                    </div>
                    <div class="row" >
                    	<?php echo $row['fname']." ".$row['lname'] ?> <br  />
                       <?php echo $row['category']?> <br  />
                      
                    </div>
                
                
             <?php  }
					}
					else{
						echo mysqli_error($con);
					}
					?>
           		</div>        
                         
           </div>
                         
                  
                         <!-- form to handle votes -->
                         
                         <br />
                       <!--  <hr class = "lineset" size="30"/>-->
          <div class="row aligntext post_deco" > <!--comment description box and votes-->
                <div class="col-md-7 divider">
                             
                             
                         <form name="commentform" action="comment_collect.php" method="post" onsubmit ="return validateform();">
                   
                	     	 <textarea id="description" cols="64" rows="5" name="description" placeholder="Add a comment"></textarea>
                             
                             
                             <select id="commentType" name="commentType">
                             	<option value="Choose your comment type">Choose your comment type </option>
                             	<option value="Add a comment"> Add a comment</option>
                                <option value="Add my idea as an improvement">Add my idea as an improvement </option>
                             </select>
                             
                         	<div class="row adjusttop2" > <!--comment button-->
                	         <div class="col-md-2">
                         	<!-- <input type="submit"  value="POST" name="submit"  class="post_pad btn-sample"  >-->
                            <input type="submit"  value="POST" name="submit"  id="submit" class="button_design btn btn-success"  >
                           </div>  
                          <!--   <script type="text/javascript"> 
                        		 $( "#submit" ).click(function() {
									  
							 		 $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
									 /*var cmt_msg = document.getElementById('comment_message_lbl');
									 cmt_msg.setAttribute('class', 'hidden');*/
									});
 							 </script> --><div class="col-md-8">
                             <div class="stylealert" id="comment_message_lbl" ><span style="color:green; text-align:left;padding:0;" id="comment_message"><?php echo $alertmsg ?></span> </div>
                            </div> 
                             <input type="text" class="hidden" value="<?php echo $submissionId ?>" name="subId" />
                             
                         	</div>
                            </form>
       


							

                        <!-- comment -->
                         
							<div  id="Comemnt_from_ajax">
                            
                       <div class="post_deco_1">  
                 <div class="row " align="right">
                  <div class="stylealert " id="stylealert" style="padding-left:30px;"><span style="color:green;" id="vote_message"><?php echo $alertimpmsg; ?></span> </div>
                                     
                   <div class="dropdown pull-right" >
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Filter
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu" >
                       <li ><a href="http://localhost/ideapool/viewidea.php?id=<?php echo $submissionId ?>&comt=0" id="all">All</a></li>
                       <li ><a href="http://localhost/ideapool/viewidea.php?id=<?php echo $submissionId ?>&comt=1" id="imp">Improvements</a></li>
                       <li ><a href="http://localhost/ideapool/viewidea.php?id=<?php echo $submissionId ?>&comt=2" id="com"> Comments</a></li>
                      
                      </ul>
                   </div>

                  <!-- <script>
                          $('.dropdown-menu li a').on('click', function () {
                          var id = $(this).attr('id');
                          executeAction(id);
                          });

                          executeAction = function (id) {
                                      switch (id) {
                                        case "all":
                                              ct = 0;
                                            break;
                                        case "imp":
                                              ct = 1;
                                            alert("imp");
                                            break;
                                        case "com":
                                             ct = 2;
                                            break;
                                        }
                        }

                 </script>-->


                 </div>
                  <div class="row">
               <div id="responses" class="adjust_div" >
               <?php $i=0; while($i< sizeof($all_responses)){

                ?> 
                                <?php if ($passBit[$i]==0) { 
                                     $okVal=false; 
                                     $accCount=$fCount=$timeCount=$accWeight=$fWeight=$timeWeight=0;
                                     include ('database_connect.php');
                                     $sqlSum = "SELECT * FROM votes WHERE ImprovementId= '$all_comment_ids[$i]' ";
                                     $resultQ = mysqli_query($con,$sqlSum);
                                     if(mysqli_num_rows($resultQ)>0){
                                        $okVal = true;
                                        while($rowQ = mysqli_fetch_assoc($resultQ)){
                                            $type = $rowQ['voteCategory'];
                                            if($type=='Accuracy'){$accCount=$accCount+1; $accWeight= $accWeight+ $rowQ['weight']; }
                                            else if($type=='Feasibility'){$fCount=$fCount+1; $fWeight= $fWeight+ $rowQ['weight']; }
                                            else if($type=='Timeliness'){$timeCount=$timeCount+1; $timeWeight= $timeWeight+ $rowQ['weight']; }

                                        }
                                        $accP= ($accWeight/$accCount);
                                        $fP= ($fWeight/$fCount);
                                        $timeP= ($timeWeight/$timeCount);
                                     }
                                     else if(is_null($resultQ)){ $okVal=false;
                                     }

                                  ?>
                               <div class="imp_response_top_div"  id="<?php echo "top".$commentId ?>"   > <?php echo $all_responses[$i]; ?> </div>
                                 <div class="imp_response_div "  id="<?php echo "desc".$commentId ?>"   >

                                  <!--<form name="voteform1" action="#" method="post" >-->
                                  <div class="col-md-5" ><?php echo $all_response_descriptions[$i];?> </div>
                                  
                                <!-- check whether the user has voted more than once on the improvements
                                    <div class="row">
                                     <div class="col-md-2" > <input type= "image" name="voteup" value="UPVOTE" src="images/like.png" height="25px" width="25px"  /></div>
                                    <div class="col-md-1" > <input type= "image" name="votedown" value="DOWNVOTE"  src="images/unlike.png"  height="25px" width="25px"  /></div>
                                    <div class="col-md-7" align="right" style="padding-right:0px">
                               <input type="text" id="imp_inputRange" name="imp_inputRange" readonly style="width:30px; text-align:center"/>
                               <input type="text" class="hidden" value="<?php //echo $all_comment_ids[$i] ?>" name="comId" />
                                <input type="text" class="hidden" value="<?php //echo $submissionId ?>" name="subId" />
                                    </div> 
                                  </div>
                                <div class="row"> <input type="range" max="100" min="0" name="voteCount" onclick="updateText(this.value);"   /> 
                    </div>--><div class="col-md-7"> <!--alert(#<?php //echo $all_comment_ids[$i] ?>);-->
                                  <?php if($okVal) {?>
                                   <div class="row vcolorjum" align="center"> <!-- for the improvemnt vote summary-->
                                         
                                       <div class="col-md-4 alignval ">
                                             <p> Accuracy points </p>
                                             <h4><b> <?php echo  $accCount ?> </b></h4>
                                             <h6> <?php echo "( ".$accP." % )" ?> </h6> 
                                              
                                       </div>
                                       <div class="col-md-4 alignval">
                                              <p> Feasibility points </p>
                                             <h4> <b><?php echo $fCount ?></b> </h4> 
                                              <h6> <?php echo "( ".$fP." % )" ?> </h6> 
                                             
                                       </div>
                                       <div class="col-md-4 ">
                                               <p> Timeliness points </p>
                                             <h4><b> <?php echo $timeCount ?> </b></h4> 
                                              <h6> <?php echo "( ".$timeP." % )" ?> </h6> 
                                            
                                       </div>
                                  </div>
                                  <?php } ?>
                                   <div class="row">
                                <button data-toggle="collapse" data-target="#<?php echo $all_comment_ids[$i] ?>" class="button_design btn btn-vote"  >CAST VOTE</button>
                            <div id="<?php echo $all_comment_ids[$i] ?>" class="collapse" style="margin-right:0; padding-right:0;" >
                                
                             
                               <form name="voteform" action="imp_vote_collect.php" method="post" >
                              <input type="text" id="impno" name="impno" value="<?php echo $all_comment_ids[$i] ?>" hidden>
                              <input type="text" id="subid" name="subid" value="<?php echo $submissionId ?>" hidden>
                             <div class="panel panel-default">
                              <div class="panel-heading" style="background-color:#88cc00">
                                <div class="row"> 
                                  <div class="col-md-3"> &nbsp;</div>
                                  <div class="col-md-1">
                                   <img src="images\vote1.png" height="25px" width="25px" data-toggle="tooltip" title="Disagree"  >                                             </div>
                                   <div class="col-md-1">
                                    <img src="images\vote2.png" height="25px" width="25px" data-toggle="tooltip" title="Not the best">               </div>
                                   <div class="col-md-1"> 
                                   <img src="images\vote3.png" height="25px" width="25px" data-toggle="tooltip" title="Fine">
                                 </div>
                                   <div class="col-md-1"> 
                                   <img src="images\vote4.png" height="25px" width="25px" data-toggle="tooltip" title="Acceptable">                  </div>
                                   <div class="col-md-1"> 
                                   <img src="images\vote5.png" height="25px" width="25px" data-toggle="tooltip" title="Agreed">
                                </div>
                                 </div>
                            </div>
                              
                             <!-- <script>
                              $(document).ready(function(){
                              $('[data-toggle="tooltip"]').tooltip();   
                              });
                              </script>--> 
                               
                                <div class="panel-body">
                                 <!-- <form name="vote1Form" method="post" action="get_vote.php">-->
                                  <div class="row voterow" >
                                    <div class="col-md-3" data-toggle="tooltip" title="How accurate is this idea?"> 
                                            Accuracy
                                        </div>  <!-- vote type -->
                                      <div class="col-md-9">
                                         
                                         <input id="<?php echo "voteslider1".$all_comment_ids[$i] ?>" name="voteslider1" type="text" data-slider-value=' <?php $valx = $all_comment_ids[$i]; echo $accurateArr_i[$valx] ?>' data-slider-ticks="[0, 25, 50, 75, 100]" data-slider-ticks-snap-bounds="3" data-slider-ticks-labels='["0", "25", "50", "75", "100"]'/>
                                        <script type="text/javascript">
                                           var <?php echo "slider1".$all_comment_ids[$i] ?> = new Slider("#<?php echo "voteslider1".$all_comment_ids[$i] ?>", {
                                           ticks: [0, 25, 50, 75, 100],
                                           ticks_labels: ['0', '25%', '50%', '75%', '100%'],
                                           ticks_snap_bounds: 3
                                               });
                         
                       $('.slider').on('slide', function (ev) {
                         var value1 = <?php echo "slider1".$all_comment_ids[$i] ?>.getValue();
                             document.getElementById('<?php echo "slider1val".$all_comment_ids[$i] ?>').value = value1;
                        });
                                       </script>
                                       <input type="text" id = "<?php echo "slider1val".$all_comment_ids[$i] ?>"  hidden/>
                                      </div>
                                </div>

                                <div class="row voterow" >
                                 <div class="col-md-3" data-toggle="tooltip" title="Can this be implemented money wise?"> Feasibility</div>  <!-- vote type -->
                                  <div class="col-md-9">
                                     <input id="<?php echo "voteslider2".$all_comment_ids[$i] ?>" name="voteslider2" type="text" data-slider-value='<?php $valx = $all_comment_ids[$i]; echo $fArr_i[$valx] ?>' data-slider-ticks="[0, 25, 50, 75, 100]" data-slider-ticks-snap-bounds="3" data-slider-ticks-labels='["0", "25", "50", "75", "100"]'/>
                                        <script type="text/javascript">
                                           var <?php echo "slider2".$all_comment_ids[$i] ?> = new Slider("#<?php echo "voteslider2".$all_comment_ids[$i] ?>", {
                                           ticks: [0, 25, 50, 75, 100],
                                           ticks_labels: ['0', '25%', '50%', '75%', '100%'],
                                           ticks_snap_bounds: 3
                                           });


                                           $('.slider').on('slide', function (ev) {
                                             var value2 = <?php echo "slider1".$all_comment_ids[$i] ?>.getValue();
                                             document.getElementById('<?php echo "slider2val".$all_comment_ids[$i] ?>').value = value2;
                                            });
                                   
                                       </script>
                                      <!-- <input type="text" class="hidden" value="<?php echo $submissionId ?>" name="subId" id="subId" /> 
                                    -->
                                        <input type="text" id = "<?php echo "slider2val".$all_comment_ids[$i] ?>"  hidden/>
                                  </div>
                                </div>

                                <div class="row voterow" >
                                 <div class="col-md-3" data-toggle="tooltip" title="Is this idea efficient based on time?"> Timeliness</div>  <!-- vote type -->
                                  <div class="col-md-9">
                                    <input id="<?php echo "voteslider3".$all_comment_ids[$i] ?>" name="voteslider3" type="text"  data-slider-value='<?php $valx = $all_comment_ids[$i]; echo $timeArr_i[$valx] ?>' data-slider-ticks="[0, 25, 50, 75, 100]" data-slider-ticks-snap-bounds="3" data-slider-ticks-labels='["0", "25", "50", "75", "100"]'/>
                                        <script type="text/javascript">
                                           var <?php echo "slider3".$all_comment_ids[$i] ?> = new Slider("#<?php echo "voteslider3".$all_comment_ids[$i] ?>", {
                                           ticks: [0, 25, 50, 75, 100],
                                           ticks_labels: ['0', '25%', '50%', '75%', '100%'],
                                           ticks_snap_bounds: 3
                                           });
                                           $('.slider').on('slide', function (ev) {
                                                 var value3 = <?php echo "slider3".$all_comment_ids[$i] ?>.getValue();
                                                 document.getElementById('<?php echo "slider3val".$all_comment_ids[$i] ?>').value = value3;
                                           });
                                       </script>
                                        <input type="text" id = "<?php echo "slider3val".$all_comment_ids[$i] ?>"  hidden/>
                                  </div>
                                </div>
                                 <input type="submit"  value="POST" name="Cast my Vote"  id="submitvote" class="button_design btn btn-success"  >
                          
                               </div>
                              
                          </div>
                          </form>
                          
                              
                          </div>
                           
                        </div>




                                  </div>
                                     
                               
                              <!-- </form>-->
                               </div>
                                <?php } else if ($passBit[$i]==1){ ?>
                                <div class="response_top_div"> <?php echo $all_responses[$i]; ?> </div>
                               <div class="response_div"> <?php echo $all_response_descriptions[$i]; ?> </div>
                                <?php } $i++; }  ?>
                             </div>
                             
                        </div>
                        </div>


                            </div>
                            
                </div>
                         <!--voting system-->



                <div class="col-md-5 votespace">
                	<div class="row">
                         
                            <button data-toggle="collapse" data-target="#vote" class="button_design btn btn-vote" >CAST VOTE</button>
                            <div id="vote" class="collapse" style="margin-right:0; padding-right:0;">
                                 <form name="voteform" action="vote_collect.php" method="post" >
                   
                              <div class="panel panel-default">
                              <div class="panel-heading" style="background-color:#88cc00">
                                <div class="row"> 
                                  <div class="col-md-3"> &nbsp;</div>
                                  <div class="col-md-1">
                                   <img src="images\vote1.png" height="25px" width="25px" data-toggle="tooltip" title="Disagree"  > 												    							  </div>
                                   <div class="col-md-1">
                                    <img src="images\vote2.png" height="25px" width="25px" data-toggle="tooltip" title="Not the best">						   </div>
                                   <div class="col-md-1"> 
                                   <img src="images\vote3.png" height="25px" width="25px" data-toggle="tooltip" title="Fine">
                                 </div>
                                   <div class="col-md-1"> 
                                   <img src="images\vote4.png" height="25px" width="25px" data-toggle="tooltip" title="Acceptable">	 								 </div>
                                   <div class="col-md-1"> 
                                   <img src="images\vote5.png" height="25px" width="25px" data-toggle="tooltip" title="Agreed">
                                </div>
                                 </div>
                            </div>
                              
							                <script>
                              $(document).ready(function(){
                              $('[data-toggle="tooltip"]').tooltip();   
                              });
                              </script> 
                               
                              	<div class="panel-body">
                                 <!-- <form name="vote1Form" method="post" action="get_vote.php">-->
                              		<div class="row voterow" >
                                 		<div class="col-md-3" data-toggle="tooltip" title="How accurate is this idea?"> 
                                        		Accuracy
                                        </div>  <!-- vote type -->
                                  		<div class="col-md-9">
                                   			 
                                    		 <input id="voteslider1" name="voteslider1" type="text" data-slider-value='<?php echo $accurateArr; ?>' data-slider-ticks="[0, 25, 50, 75, 100]" data-slider-ticks-snap-bounds="3" data-slider-ticks-labels='["0", "25", "50", "75", "100"]'/>
                                        <script type="text/javascript">
                                           var slider1 = new Slider("#voteslider1", {
                                           ticks: [0, 25, 50, 75, 100],
                                           ticks_labels: ['0', '25%', '50%', '75%', '100%'],
                                           ticks_snap_bounds: 3
                                               });
											   
											 $('.slider').on('slide', function (ev) {
												 var value1 = slider1.getValue();
       											 document.getElementById('slider1val').value = value1;
    										});
                                       </script>
                                       <input type="text" id = "slider1val" hidden />
                                      </div>
                                </div>
<script>
    window.onload = function(){

        $("#voteslider1").slider('setValue',80);
    };
</script>

                                <div class="row voterow" >
                                 <div class="col-md-3" data-toggle="tooltip" title="Can this be implemented money wise?"> Feasibility</div>  <!-- vote type -->
                                  <div class="col-md-9">
                                     <input id="voteslider2" name="voteslider2" type="text" data-slider-value='<?php echo $fArr; ?>' data-slider-ticks="[0, 25, 50, 75, 100]" data-slider-ticks-snap-bounds="3" data-slider-ticks-labels='["0", "25", "50", "75", "100"]'/>
                                        <script type="text/javascript">
                                           var slider2 = new Slider("#voteslider2", {
                                           ticks: [0, 25, 50, 75, 100],
                                           ticks_labels: ['0', '25%', '50%', '75%', '100%'],
                                           ticks_snap_bounds: 3
                                           });


                                           $('.slider').on('slide', function (ev) {
                                             var value2 = slider2.getValue();
                                             document.getElementById('slider2val').value = value2;
                                            });
                                   
                                       </script>
                                       <input type="text" class="hidden" value="<?php echo $submissionId ?>" name="subId" id="subId" /> 
                                    
                                        <input type="text" id = "slider2val"  hidden/>
                                  </div>

                                </div>

                                <div class="row voterow" >
                                 <div class="col-md-3" data-toggle="tooltip" title="Is this idea efficient based on time?"> Timeliness</div>  <!-- vote type -->
                                  <div class="col-md-9">
                                    <input id="voteslider3" name="voteslider3" type="text"  data-slider-value='<?php echo $timeArr; ?>' data-slider-ticks="[0, 25, 50, 75, 100]" data-slider-ticks-snap-bounds="3" data-slider-ticks-labels='["0", "25", "50", "75", "100"]'/>
                                        <script type="text/javascript">
                                           var slider3 = new Slider("#voteslider3", {
                                           ticks: [0, 25, 50, 75, 100],
                                           ticks_labels: ['0', '25%', '50%', '75%', '100%'],
                                           ticks_snap_bounds: 3
                                           });
                                           $('.slider').on('slide', function (ev) {
                                                 var value3 = slider3.getValue();
                                                 document.getElementById('slider3val').value = value3;
                                           });
                                       </script>
                                        <input type="text" id = "slider3val"  hidden/>
                                  </div>
                                </div>
                                 <input type="submit"  value="POST" name="Cast my Vote"  id="submitvote" class="button_design btn btn-success"  >
                          
                               </div>
                              
                          </div>
                          </form>
                              
                          </div>
                        	<div class="stylealert " id="stylealert" style="padding-left:30px;"><span style="color:green;" id="vote_message"><?php echo $alertvmsg; ?></span> </div>
                             
                        </div>
                       
                      
                            <?php
		 	
			$_SESSION["subId"] = $submissionId;
		  	include ('submission_details.php');
			
		  ?>
          			<div class="row colorjum" align="center">
                    	<div class="col-md-4 alignval ">
                        	<h2> <?php echo $viewCount ?> </h2> 
                            <h5> VIEWS </h5>
                        </div>
                       
                        <div class="col-md-4 alignval">
                        	<h2> <?php echo $commentCount ?> </h2> 
                            <h5> COMMENTS </h5>
                        </div>
                        <div class="col-md-4 ">
                        	<h2> <?php echo $improvCount ?> </h2> 
                            <h5> IMPROVEMENTS </h5>
                            
                        </div>
                </div>        
                <div class="row colorjum" align="center">
                      <div class="col-md-4 alignval ">
                          <h2> <?php echo $avCount ?> </h2> 
                            <h5> ACCURACY </h5>
                        </div>
                       
                        <div class="col-md-4 alignval">
                          <h2> <?php echo $fvCount ?> </h2> 
                            <h5> FEASIBILITY </h5>
                        </div>
                        <div class="col-md-4 ">
                          <h2> <?php echo $tvCount ?> </h2> 
                            <h5> TIMELINESS</h5>
                            
                        </div>
                </div>
                    
                    
                        
      </div>
                        <!--redirecting the result after adding the data to the DB to display the message-->
                        
                  
 		</div>
        
        </div>

  		
 <!-- </div>

<div class="container-fluid fluidbg">-->
  		<div class="jumbotron viewjum colorjum paddown " >

          <div class="container ">
          
          
          
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
			 
              dafsf sd fsdf sd 
               
               
               
          </div>
        </div> -->
</div>          


<?php 
	include('footer.php');

?>
</body>
</html>

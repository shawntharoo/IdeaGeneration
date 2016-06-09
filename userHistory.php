<?php require_once('database_connect.php'); ?>

<!--catch the user id-->
<?php 
session_start();
$usrid=$_SESSION['userid']; //Catch the userId
?>
<html>
<head><title>User History</title>
		 <link rel="stylesheet" href="css/bootstrap.min.css"></link>
		<!-- Bootstrap core CSS -->

		<link href="css/bootstrap.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="css/diluni.css" rel="stylesheet">
		<link rel="stylesheet" href="css/ideacss.css" />

		<!-- color schema -->
		<link href="css/color-4.css" rel="stylesheet" id="layoutstyle">	
					
		<script src="js/jquery-1.12.0.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        
        <link rel="stylesheet" href="themes_panel.css">	
        
         <style type="text/css">
 body {
	background-image:url(images/body.jpg);

}

         </style>
        
        </head>
        
        <body>

<div class="container-fluid" style="background-image:url(images/banner2.jpg)">
    <div class="container">
     <?php
    include("header.php");
     ?>
    </div> 
 </div> 


  <div class="historytdetails">
  
  
   <div class="form-group fgroup">
   <div class="col-md-5">
 <form method="post">
                            <label for="faculty">Month</label>
			    				    <select class="form-control" name="month">
                                    		<option></option>
                                             <option>01</option>
    										 <option>02</option>
   											 <option>03</option>
                                              <option>04</option>
                                              <option>05</option>
    										 <option>06</option>
   											 <option>07</option>
                                              <option>08</option>
             								 <option>09</option>
    										 <option>10</option>
   											 <option>11</option>
                                              <option>12</option>
   											
 										 </select>
                                         <button name="key" class="btn btn-info">Ok</button>
                                         </form>
                                         </div>
                                         </div>
                                         <?php
                                                                    
  if(isset($_POST["key"])){
                                                  
  	$sort=$_POST["month"];
	 
  
  	if($sort=="01"){
		$submissions=mysqli_fetch_array(mysqli_query($con,"SELECT count(postId) FROM post WHERE monthOf='$sort' AND userId='$usrid'")); //Get posts count
		$improvements=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Improvement' AND monthOf='$sort' AND userId='$usrid'")); //Get improvements count
		$comments=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Comment' AND monthOf='$sort' AND userId='$usrid'")); //Get comments count?>	
	                      <table style="margin-top: 0px; font-weight:bold;">
                            <tr>
                              <td style="padding-left:20px;">Submissions</td>
                              <td style="padding-left:50px;"><?php echo "$submissions[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Improvements</td>
                              <td style="padding-left:50px;"><?php echo "$improvements[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Comments</td>
                              <td style="padding-left:50px;"><?php echo "$comments[0]<br>"; ?></td>
                            </tr>
                          </table>
                          <br /><br /><br />
                         <div style="margin-left:100px;" ><?php include("dounutHistory.php"); //dounut?></div>

	  
 <?php }
 elseif($sort=="02"){
	 $submissions=mysqli_fetch_array(mysqli_query($con,"SELECT count(postId) FROM post WHERE monthOf='$sort' AND userId='$usrid'")); //Get posts count
		$improvements=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Improvement' AND monthOf='$sort' AND userId='$usrid'")); //Get improvements count
		$comments=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Comment' AND monthOf='$sort' AND userId='$usrid'")); //Get comments count?>	
	                      <table style="margin-top: 0px; font-weight:bold;">
                            <tr>
                              <td style="padding-left:20px;">Submissions</td>
                              <td style="padding-left:50px;"><?php echo "$submissions[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Improvements</td>
                              <td style="padding-left:50px;"><?php echo "$improvements[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Comments</td>
                              <td style="padding-left:50px;"><?php echo "$comments[0]<br>"; ?></td>
                            </tr>
                          </table>
                          <div style="margin-left:100px;" ><?php include("dounutHistory.php"); //dounut?></div>
 <?php }
  
  elseif($sort=="03"){
	  
	 $submissions=mysqli_fetch_array(mysqli_query($con,"SELECT count(postId) FROM post WHERE monthOf='$sort' AND userId='$usrid'")); //Get posts count
		$improvements=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Improvement' AND monthOf='$sort' AND userId='$usrid'")); //Get improvements count
		$comments=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Comment' AND monthOf='$sort' AND userId='$usrid'")); //Get comments count?>	
	                      <table style="margin-top: 0px; font-weight:bold;">
                            <tr>
                              <td style="padding-left:20px;">Submissions</td>
                              <td style="padding-left:50px;"><?php echo "$submissions[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Improvements</td>
                              <td style="padding-left:50px;"><?php echo "$improvements[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Comments</td>
                              <td style="padding-left:50px;"><?php echo "$comments[0]<br>"; ?></td>
                            </tr>
                          </table>
                          <br /><br /><br />
                          <div style="margin-left:100px;" ><?php include("dounutHistory.php"); //dounut?></div>
 <?php }
  elseif($sort=="04"){
	  
	 $submissions=mysqli_fetch_array(mysqli_query($con,"SELECT count(postId) FROM post WHERE monthOf='$sort' AND userId='$usrid'")); //Get posts count
		$improvements=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Improvement' AND monthOf='$sort' AND userId='$usrid'")); //Get improvements count
		$comments=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Comment' AND monthOf='$sort' AND userId='$usrid'")); //Get comments count?>	
	                      <table style="margin-top: 0px; font-weight:bold;">
                            <tr>
                              <td style="padding-left:20px;">Submissions</td>
                              <td style="padding-left:50px;"><?php echo "$submissions[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Improvements</td>
                              <td style="padding-left:50px;"><?php echo "$improvements[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Comments</td>
                              <td style="padding-left:50px;"><?php echo "$comments[0]<br>"; ?></td>
                            </tr>
                          </table>
                          <br /><br /><br />
                          <div style="margin-left:100px;" ><?php include("dounutHistory.php"); //dounut?></div>
  
  <?php }
  elseif($sort=="05"){
  
  $submissions=mysqli_fetch_array(mysqli_query($con,"SELECT count(postId) FROM post WHERE monthOf='$sort' AND userId='$usrid'")); //Get posts count
		$improvements=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Improvement' AND monthOf='$sort' AND userId='$usrid'")); //Get improvements count
		$comments=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Comment' AND monthOf='$sort' AND userId='$usrid'")); //Get comments count?>	
	                      <table style="margin-top: 0px; font-weight:bold;">
                            <tr>
                              <td style="padding-left:20px;">Submissions</td>
                              <td style="padding-left:50px;"><?php echo "$submissions[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Improvements</td>
                              <td style="padding-left:50px;"><?php echo "$improvements[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Comments</td>
                              <td style="padding-left:50px;"><?php echo "$comments[0]<br>"; ?></td>
                            </tr>
                          </table>
                          <br /><br /><br />
                         <div style="margin-left:100px;" ><?php include("dounutHistory.php"); //dounut?></div>
  
  <?php }
  elseif($sort=="06"){
	  
	 $submissions=mysqli_fetch_array(mysqli_query($con,"SELECT count(postId) FROM post WHERE monthOf='$sort' AND userId='$usrid'")); //Get posts count
		$improvements=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Improvement' AND monthOf='$sort' AND userId='$usrid'")); //Get improvements count
		$comments=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Comment' AND monthOf='$sort' AND userId='$usrid'")); //Get comments count?>	
	                      <table style="margin-top: 0px; font-weight:bold;">
                            <tr>
                              <td style="padding-left:20px;">Submissions</td>
                              <td style="padding-left:50px;"><?php echo "$submissions[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Improvements</td>
                              <td style="padding-left:50px;"><?php echo "$improvements[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Comments</td>
                              <td style="padding-left:50px;"><?php echo "$comments[0]<br>"; ?></td>
                            </tr>
                          </table>
                          <br /><br /><br />
                           <div style="margin-left:100px;" ><?php include("dounutHistory.php"); //dounut?></div>
  
 <?php }
  elseif($sort=="07"){
	  
	  $submissions=mysqli_fetch_array(mysqli_query($con,"SELECT count(postId) FROM post WHERE monthOf='$sort' AND userId='$usrid'")); //Get posts count
		$improvements=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Improvement' AND monthOf='$sort' AND userId='$usrid'")); //Get improvements count
		$comments=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Comment' AND monthOf='$sort' AND userId='$usrid'")); //Get comments count?>	
	                      <table style="margin-top: 0px; font-weight:bold;">
                            <tr>
                              <td style="padding-left:20px;">Submissions</td>
                              <td style="padding-left:50px;"><?php echo "$submissions[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Improvements</td>
                              <td style="padding-left:50px;"><?php echo "$improvements[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Comments</td>
                              <td style="padding-left:50px;"><?php echo "$comments[0]<br>"; ?></td>
                            </tr>
                          </table>
                           <div style="margin-left:100px;" ><?php include("dounutHistory.php"); //dounut?></div>
  
 <?php }
  elseif($sort=="08"){
	  
$submissions=mysqli_fetch_array(mysqli_query($con,"SELECT count(postId) FROM post WHERE monthOf='$sort' AND userId='$usrid'")); //Get posts count
		$improvements=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Improvement' AND monthOf='$sort' AND userId='$usrid'")); //Get improvements count
		$comments=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Comment' AND monthOf='$sort' AND userId='$usrid'")); //Get comments count?>	
	                      <table style="margin-top: 0px; font-weight:bold;">
                            <tr>
                              <td style="padding-left:20px;">Submissions</td>
                              <td style="padding-left:50px;"><?php echo "$submissions[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Improvements</td>
                              <td style="padding-left:50px;"><?php echo "$improvements[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Comments</td>
                              <td style="padding-left:50px;"><?php echo "$comments[0]<br>"; ?></td>
                            </tr>
                          </table>
                          <br /><br /><br />
                           <div style="margin-left:100px;" ><?php include("dounutHistory.php"); //dounut?></div>
  
  <?php }
  elseif($sort=="09"){
  
  		$submissions=mysqli_fetch_array(mysqli_query($con,"SELECT count(postId) FROM post WHERE monthOf='$sort' AND userId='$usrid'")); //Get posts count
		$improvements=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Improvement' AND monthOf='$sort' AND userId='$usrid'")); //Get improvements count
		$comments=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Comment' AND monthOf='$sort' AND userId='$usrid'")); //Get comments count?>	
	                      <table style="margin-top: 0px; font-weight:bold;">
                            <tr>
                              <td style="padding-left:20px;">Submissions</td>
                              <td style="padding-left:50px;"><?php echo "$submissions[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Improvements</td>
                              <td style="padding-left:50px;"><?php echo "$improvements[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Comments</td>
                              <td style="padding-left:50px;"><?php echo "$comments[0]<br>"; ?></td>
                            </tr>
                          </table>
                          <br /><br /><br />
                           <div style="margin-left:100px;" ><?php include("dounutHistory.php"); //dounut?></div>
  
 <?php }
  elseif($sort=="10"){
	  
$submissions=mysqli_fetch_array(mysqli_query($con,"SELECT count(postId) FROM post WHERE monthOf='$sort' AND userId='$usrid'")); //Get posts count
		$improvements=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Improvement' AND monthOf='$sort' AND userId='$usrid'")); //Get improvements count
		$comments=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Comment' AND monthOf='$sort' AND userId='$usrid'")); //Get comments count?>	
	                      <table style="margin-top: 0px; font-weight:bold;">
                          	<tr>
                              <td style="padding-left:20px;">Submissions</td>
                              <td style="padding-left:50px;"><?php echo "$submissions[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Improvements</td>
                              <td style="padding-left:50px;"><?php echo "$improvements[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Comments</td>
                              <td style="padding-left:50px;"><?php echo "$comments[0]<br>"; ?></td>
                            </tr>
                          </table>
                          <br /><br /><br />
                          <div style="margin-left:100px;" ><?php include("dounutHistory.php"); //dounut?></div>
  <?php }
  elseif($sort=="11"){
	  
$submissions=mysqli_fetch_array(mysqli_query($con,"SELECT count(postId) FROM post WHERE monthOf='$sort' AND userId='$usrid'")); //Get posts count
		$improvements=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Improvement' AND monthOf='$sort' AND userId='$usrid'")); //Get improvements count
		$comments=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Comment' AND monthOf='$sort' AND userId='$usrid'")); //Get comments count?>	
	                     <table style="margin-top: 0px; font-weight:bold;">
                         	<tr>
                              <td style="padding-left:20px;">Submissions</td>
                              <td style="padding-left:50px;"><?php echo "$submissions[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Improvements</td>
                              <td style="padding-left:50px;"><?php echo "$improvements[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Comments</td>
                              <td style="padding-left:50px;"><?php echo "$comments[0]<br>"; ?></td>
                            </tr>
                          </table>
                          <br /><br /><br />
                          <div style="margin-left:100px;" ><?php include("dounutHistory.php"); //dounut?></div>
 <?php }
  elseif($sort=="12"){
	  
$submissions=mysqli_fetch_array(mysqli_query($con,"SELECT count(postId) FROM post WHERE monthOf='$sort' AND userId='$usrid'")); //Get posts count
		$improvements=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Improvement' AND monthOf='$sort' AND userId='$usrid'")); //Get improvements count
		$comments=mysqli_fetch_array(mysqli_query($con,"SELECT count(commentId) FROM comment WHERE commentType='Comment' AND monthOf='$sort' AND userId='$usrid'")); //Get comments count?>	
	                      <table style="margin-top: 0px; font-weight:bold;">
                            <tr>
                              <td style="padding-left:20px;">Submissions</td>
                              <td style="padding-left:50px;"><?php echo "$submissions[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Improvements</td>
                              <td style="padding-left:50px;"><?php echo "$improvements[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;">Comments</td>
                              <td style="padding-left:50px;"><?php echo "$comments[0]<br>"; ?></td>
                            </tr>
                          </table>
                          <br /><br /><br />
                           <div style="margin-left:100px;" ><?php include("dounutHistory.php"); //dounut?></div>
  
 <?php }
  else{
  }
  }
 
  ?>
  
    <br /><br /><br /> <br /><br /><br />
	<?php 
 require_once("entireyear_history.php");
  ?>	

</div>
 
      <footer style="background-image:url(images/footer.jpg);color:#FFF">
<?php
 include('footer.php');
?>
</footer>                

                      
    </body>                   
</html>
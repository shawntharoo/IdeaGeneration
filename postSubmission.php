<?php require_once('database_connect.php'); ?>



<?php

include ('autoinc.php');

$postId =  autoIncrementIds('Submission');

$query_facultySet = "SELECT * FROM faculty";
$facultySet = mysqli_query($con, $query_facultySet) or die(mysqli_error());
$row_facultySet = mysqli_fetch_assoc($facultySet);
$totalRows_facultySet = mysqli_num_rows($facultySet);

$query_depSet = "SELECT * FROM department";
$depSet = mysqli_query($con, $query_depSet) or die(mysqli_error());
$row_depSet = mysqli_fetch_assoc($depSet);
$totalRows_depSet = mysqli_num_rows($depSet);


$query_catSet = "SELECT * FROM categories";
$catSet = mysqli_query($con, $query_catSet) or die(mysqli_error());
$row_catSet = mysqli_fetch_assoc($catSet);
$totalRows_catSet = mysqli_num_rows($catSet);




if(isset($_POST['submitted']) == 1){
	session_start();
	$usrid=$_SESSION['userid'];
	$destination="images/".$_FILES["image"]["name"];
	$source = $_FILES["image"]["tmp_name"];
	$input=$destination;
	$done = move_uploaded_file($source,$destination);
  	if($done)
   {
   }
  else
   {

   }
  
   include("rewardcheck.php"); 	//reward checking;
$postSet = "INSERT INTO post (postId, userId, faculty, department, category, title, content, date, files) VALUES ('$postId','$usrid','$_POST[faculty]','$_POST[department]', '$_POST[category]', '$_POST[title]', '$_POST[message]', now(), '$input')";
$posts = mysqli_query($con, $postSet) or die(mysqli_error());	
if ($posts) {
    echo "<script type='text/javascript'>alert('Your post has submitted successfully!')</script>";
}
else
{
    echo "<script type='text/javascript'>alert('failed!')</script>";
}
}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	

		<title>Add submission</title>
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
        <script src="js/SpryValidationTextField.js" type="text/javascript"></script>
        <script src="js/SpryValidationTextarea.js" type="text/javascript"></script>
        <link rel="stylesheet" href="themes_panel.css">	
        
         <style type="text/css">
 body {
	background-image:url(images/body.jpg);

}

         </style>
         <link href="css/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
         <link href="css/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>


<body>

 <div class="container-fluid" style="background-image:url(images/banner2.jpg)">
    <div class="container">
     <?php
    include("header.php");
     ?>
    </div> 
 </div> 

<div class="formfad">
			
<div class="heading" >Add your <span class="heading">Submission</span></div>

<form name="subForm" id='form' method="post" action='' enctype="multipart/form-data">
<span id="sprytextfield2">
<input for="faculty" name='faculty' type="text" class="form-control" id='about' placeholder="Select your faculty.." />
<input type="hidden" name="clicked" value="1"/>
<span class="textfieldRequiredMsg">You have to select a faculty!</span></span>
<div id="aboutdiv" class="details">
   <div class="gallery">
      <?php do { ?>
      	<div class="selimg" id="<?php echo $row_facultySet['facName']; ?>">
          <div class="col-md-2 box">
          	<figure><img src="<?php echo $row_facultySet['facImg']; ?>" width="100px" height="100px"/></figure>
          	<h5 align="center"><?php echo $row_facultySet['facName']; ?></h5>
          </div>
        </div>
        <?php } while ($row_facultySet = mysqli_fetch_assoc($facultySet)); ?>
     </div>

</div>    
    
<span id="sprytextfield4">
<input for="category" type="text" name='category' id='about2' class="form-control" placeholder="Select your category.." />
<span class="textfieldRequiredMsg">You have to select a category!</span></span>

<div id="aboutdiv2" class="details">
   <div class="gallery">
      <?php do { ?>
      	<div class="selimg2" id="<?php echo $row_catSet['name']; ?>">
          <div class="col-md-2 box">
       		<figure><img src="<?php echo $row_catSet['image']; ?>" width="100px" height="100px"/></figure>
         	<h5 align="center"><div id="catname"><?php echo $row_catSet['name']; ?></div></h5>
          </div>
        </div>
        <?php } while ($row_catSet = mysqli_fetch_assoc($catSet)); ?>
     </div>
</div>

<span id="sprytextfield3">
<input for="department" type="text" name='department' id='about1' class="form-control" placeholder="Select your department.." />
<span class="textfieldRequiredMsg">You have to select the department</span></span>


<div id="aboutdiv1" class="details">
   <div class="gallery">
      <?php do { ?>     
      	<div class="selimg1" id="<?php echo $row_depSet['depName']; ?>">
          <div class="col-md-2 box">
          	<figure><img src="<?php echo $row_depSet['depImg']; ?>" width="100px" height="100px"/></figure>
          	<h5 align="center"><?php echo $row_depSet['depName']; ?></h5>
          </div>
        </div>        
        <?php } while ($row_depSet = mysqli_fetch_assoc($depSet)); ?>       
     </div>
</div>

<span id="sprytextfield">
<input for="title" type="text" name='title' id='title' class="form-control" placeholder="Type your title here.." />
<span class="textfieldMinCharsMsg">Minimum number of characters not met.</span>
<span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span>

<span id="sprytextarea1">
<textarea for="message" name='message' id='msg' class="form-control" placeholder="Type your post here.."></textarea>
<span id="countsprytextarea1">&nbsp;</span><span class="textareaMinCharsMsg">Minimum number of characters not met.</span><span class="textareaMaxCharsMsg">Exceeded maximum number of characters.</span></span>

</br></br>
 <input for="image" type="file" name="image" class="form-control" />

</br></br>

<button class="bttn" id='sendpost' type="submit" >Submit</button>
<input type="hidden" name="submitted" value="1"/>

  </form>  	
   </div>           
                        
                         
                        
<script>
	 
 $(document).ready(function() { 
 
 
 //slide up & down
  
  $("#about").click(function() {
	  if($('#aboutdiv').is(":hidden")) {
		  $('#aboutdiv1').slideUp('slow');
		  $('#aboutdiv2').slideUp('slow');
		  $("#aboutdiv").slideDown('slow');
		  }
	  else{
		  $('#aboutdiv').slideUp('slow');
		  }
	  }); 
	 
	  $("#about1").click(function() {
	  if($('#aboutdiv1').is(":hidden")) {
		  $('#aboutdiv').slideUp('slow');
		  $('#aboutdiv2').slideUp('slow');
		  $('#aboutdiv1').slideDown('slow');
		  }
	  else{
		  $('#aboutdiv1').slideUp('slow');
		  }
	  }); 

  $("#about2").click(function() {
	  if($('#aboutdiv2').is(":hidden")) {
		  $('#aboutdiv').slideUp('slow');
		  $('#aboutdiv1').slideUp('slow');
		  $('#aboutdiv2').slideDown('slow');
		  }
	  else{
		  $('#aboutdiv2').slideUp('slow');
		  }
	  }); 
	 
	 
	 //load each icon name to txt feild
	 
	   $(".selimg").click(function(event) {
			var input = document.getElementById("about");
			input.value = this.id;
			$('#aboutdiv').slideUp('slow');

	  });
	
	  
	  	$(".selimg2").click(function(event) {
			var input = document.getElementById("about2");
			input.value = this.id;
			$('#aboutdiv2').slideUp('slow');

	  });	
	  
	  		$(".selimg1").click(function(event) {
			//alert(this.id);
			var input = document.getElementById("about1");
			input.value = this.id;
			$('#aboutdiv1').slideUp('slow');
			

	  });
	    	  
});
 

 
</script>
 

 
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield", "none", {minChars:5, maxChars:300});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {minChars:10, maxChars:1000, counterId:"countsprytextarea1", counterType:"chars_remaining"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none");
</script>
<footer style="background-image:url(images/footer.jpg);color:#FFF">
<?php
 include('footer.php');
?>
</footer>
</body>
</html>
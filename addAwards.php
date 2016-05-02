
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
 <!-- <tilte><h4>Register Here</h4></tilte>-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ideacss.css" rel="stylesheet">
   
<script type="text/javascript">

function validateform(){

    if (document.form1.name.value == "")
   {
      alert("Please enter the Name");
      document.form1.name.focus();
      return false;
   }
   if (document.form1.level.value == "")
   {
      alert("Please enter the Badge Level");
      document.form1.level.focus();
      return false;
   }
  if (document.form1.postcount.value == "")
   {
      alert("Please enter the Postcount Relate to the badge");
      document.form1.postcount.focus();
      return false;
   }
   if (document.form1.input.value == "")
   {
      alert("Please upload the badge");
      document.form1.input.focus();
      return false;
   }
     if (document.form1.dis.value == "")
   {
      alert("Please enter a brief description");
      document.form1.dis.focus();
      return false;
   }
return true;

}
</script>


</head>
<body background="images/body.jpg">


 <?php
 include('header.php');
 ?>
<div class="container">
<div class="row">
<div class="col-md-3">
<br/><br/><br/>
 <img src="images/award.jpg" class="img-responsive" alt="">
</div>
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title" align="center">Add a new Award</h4>
</div>
<div class="panel-body">
<form name="form1"  method="POST" action="addAwards_form.php" onSubmit="return validateform();" enctype="multipart/form-data">
   <div class="form-group">
    <label for="fnam">Name</label>
    <input type="text" class="form-control" id="f" name="name" placeholder="Enter the name of award">
  </div>

 <div class="form-group">
    <label for="cn">Level</label>
    <input type="text" class="form-control" name="level" id="u" placeholder="Enter the level which award belongs to">
  </div>

   <div class="form-group">
    <label for="cn">Postcount</label>
    <input type="text" class="form-control" name="postcount" id="u" placeholder="Enter the postcount which award belongs to">
  </div>

<div class = "form-group">
<label for="typel">Select the Award Type  -></label>
<select name="type">
  <option value="Comments">Comments</option>
  <option value="Vote">vote</option>
  <option value="submission">submission</option>
  </select>
</div>

 <div class="form-group">
    <label for="addr">Description</label>
    <textarea class="form-control" name="dis" id="a" placeholder="Enter a brief Description About the Award" rows="6"></textarea>
  </div>

  <div class="form-group">
    <label for="ima">Upload Award</label>
    <input type="file" name="input" id="i"/>
    </div>
    <div>
  <button type="button" class="btn btn-warning" onclick="myFunction()">Demo</button>
  <button type="submit" class="btn btn-primary" name="btn-signup" value="submit">Add</button>
  </div>
  </div>
</form>
</div>
</div>

<div class="col-md-3">
<br/><br/><br/>
 <img src="images/award.jpg" class="img-responsive" alt="">
</div>
</div>
</div>



<script>
function myFunction() {
    document.getElementById("f").defaultValue = "Achievement";
    document.getElementById("u").defaultValue = "40";
    document.getElementById("a").defaultValue = "This is given to theusers who are above the 20 and below the 30";
}
</script>

<?php
 include('footer.php');
?> 
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
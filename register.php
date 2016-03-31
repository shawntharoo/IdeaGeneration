
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
 <!-- <tilte><h4>Register Here</h4></tilte>-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ideacss.css" rel="stylesheet">
   
<script type="text/javascript">

function validateform(){

 if (document.form1.fname.value == "")
   {
      alert("Please enter the name");
      document.form1.fname.focus();
      return false;
   }
    if (document.form1.lname.value == "")
   {
      alert("Please enter the name");
      document.form1.lname.focus();
      return false;
   }
   if (document.form1.add.value == "")
   {
      alert("Please enter the Address");
      document.form1.add.focus();
      return false;
   }
   if (document.form1.contact.value == "")
   {
      alert("Please enter the Conatct No");
      document.form1.contact.focus();
      return false;
   }
     if (document.form1.contact.value.length!=10)
   {
      alert("Contact number should contain 10 digits");
      document.form1.contact.focus();
      return false;
   }
   if (document.form1.contact.value.charAt(0)!="0")
           {
                alert("Firs Digit should start with 0 ");
                return false
           }
   if (document.form1.email.value == "")
   {
      alert("Please enter the Email");
      document.form1.email.focus();
      return false;
   }
      if (document.form1.uid.value == "")
   {
      alert("Please enter your University ID");
      document.form1.uid.focus();
      return false;
   }
   if (document.form1.input.value == "")
   {
      alert("Please upload the Image");
      document.form1.input.focus();
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
<div class="col-md-6"><br/>
<div class="jumbotron">
  <h2>We Respect Your <span class="label label-default">IDEAS</span></h2><br/>
  <img src="images/networking3.jpg" class="img-responsive" alt="">
  <br/>
  <p>Are you already a member?</p>
  <p><a class="btn btn-primary btn-lg" href="login.php" role="button">Login</a></p>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title" align="center">Register Form</h4>
</div>
<div class="panel-body">
<form name="form1"  method="POST" action="register_form.php" onSubmit="return validateform();" enctype="multipart/form-data">
   <div class="form-group">
    <label for="fnam">First Name</label>
    <input type="text" class="form-control" name="fname" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="lnam">Last Name</label>
    <input type="text" class="form-control" name="lname" placeholder="Last Name">
  </div>
  <div class="form-group">
    <label for="addr">Address</label>
    <textarea class="form-control" name="add" placeholder="Address" rows="6"></textarea>
  </div>
  <div class="form-group">
    <label for="cn">Contact Number</label>
    <input type="text" class="form-control" name="contact" placeholder="Contact Number">
  </div>
  <div class="form-group">
    <label for="gender">Gender</label>
    <div>
   <label class="radio-inline"><input type="radio" name="gend" value="male" checked="checked">Male</label>
   <label class="radio-inline"><input type="radio" name="gend" value="female">Female</label>
   </div>
  </div>
  <div class="form-group">
    <label for="ema">Email Address</label>
    <input type="email" class="form-control" name="email" placeholder="Email">
  </div>
<div class = "form-group">
 <label for="list">Select the Catagory</label>
 <div>
<select name="list">
  <option name="s" value="Student">Student</option>
  <option name="l" value="Lecturere">Lecturere</option>
  <option name="o" value="Operator">Operator</option>
  </select>
</div>
</div>
  <div class="form-group">
    <label for="cn">University ID</label>
    <input type="text" class="form-control" name="uid" placeholder="University ID">
  </div>
  <div class="form-group">
    <label for="ima">Upload User Image</label>
    <input type="file" name="input"/>
    <p class="help-block">Make Sure you look best in your Image</p>
  </div>
  <button type="submit" class="btn btn-primary" name="btn-signup" value="submit">Sign-Up</button>
</form>
</div>
</div>
</div>
</div>
</div>
<?php
 include('footer.php');
?> 
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
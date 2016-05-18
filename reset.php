<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
 <!-- <tilte><h4>Register Here</h4></tilte>-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ideacss.css" rel="stylesheet">

    <script type="text/javascript">

function validateform(){

 if (document.form2.password.value == "")
   {


      alert("Please enter the New Password");
      document.form2.password.focus();
      return false;
   }
    if (document.form2.password1.value == "")
   {
      alert("Please confirm your Password");
      document.form2.password1.focus();
      return false;
   }
 }
</script>
</head>
<body background="images/body.jpg">
 <?php
   
  include('header.php');
 ?>
  <?php
if(isset($_GET['pass_id'])) {
 $passid_resetpass = $_GET['pass_id'];
 $_SESSION['user_id']=$passid_resetpass;
} else {
   
}
  ?>
</div> 
<div class="container"><br><br>
<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title" align="center">Reset Your Password</h4>
</div>
<div class="panel-body">
<form name="form2" method="POST" action="resetpass.php" onSubmit="return validateform();">
  <div class="form-group">
    <label for="ema">New Password</label>
    <input type="password" class="form-control" name="password" placeholder="New Password">
  </div>
  <div class="form-group">
    <label for="cn">Confrim Password</label>
    <input type="password" class="form-control" name="password1" placeholder="Confirm Password">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Reset Password</button>
</form>
</div>
</div>
</div>
</div>
</div>


<div class="col-md-3">
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
 <?php
  include('footer.php');
 ?>
 <?php
if(isset($_GET['var'])) {
   echo '<script language="javascript">';
    echo 'alert("Two passwords are not matched")';
    echo '</script>';
} else {
   
}
  ?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
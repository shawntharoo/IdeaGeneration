<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
 <!-- <tilte><h4>Register Here</h4></tilte>-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ideacss.css" rel="stylesheet">

    <script type="text/javascript">

function validateform(){

 if (document.form2.username.value == "")
   {


      alert("Please enter the username");
      document.form2.username.focus();
      return false;
   }
    if (document.form2.password.value == "")
   {
      alert("Please enter the password");
      document.form2.password.focus();
      return false;
   }
 }
</script>
</head>
<body background="images/body.jpg">
 <?php
   
  include('header.php');
 ?>
<div class="jumbotron">
  <h1>Hello, Welcome  
  <?php 
//session_start();
echo $_SESSION['users_fname']; 
?>
</h1>
  <div class="alert alert-info" role="alert">
  <span><h2 align="center">Heads Up!</h2></span>
  <h3 align="center">Please Read the Notice before you proceed to Login</h3>
</div>
  <p align="center">Whenever you register the Administrator wants to accept you as a IDEAPool User.</p>
  <p align="center">Within 24 hours you will be able to login with your credentials.</p>
  <div class="well well-lg" role="alert">
  <p align="center">username - your email address</p>
  <p align="center">password - your curtine university id</p>
  </div>
 
</div> 
<div class="container">
<div class="row">
<div class="col-md-3">
</div>

<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title" align="center">Login Form</h4>
</div>
<div class="panel-body">
<form name="form2" method="POST" action="login_form.php" onSubmit="return validateform();">
  <div class="form-group">
    <label for="ema">Email Address</label>
    <input type="text" class="form-control" name="username" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="cn">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Login</button>
</form>
</div>
</div>
</div>
</div>
</div>

  <?php
if(isset($_GET['var'])) {
   echo '<script language="javascript">';
    echo 'alert("Username or Password is invalid")';
    echo '</script>';
} else {
   
}
  ?>

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
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
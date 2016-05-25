<<<<<<< HEAD

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
 <!-- <tilte><h4>Register Here</h4></tilte>-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ideacss.css" rel="stylesheet">
    </head>
<body>
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
  <h3 align="center">Please Read the Notice before you proceed to Login</h3>
</div>
  <p align="center">Whenever you register the Administrator wants to accept you as a IDEAPool User.</p>
  <p align="center">Within 24 hours you will be recieving your login credentials.</p>
  <p align="center">Please check your Email</p>
  <p align="center"><a class="btn btn-primary btn-lg" href="login.php" role="button">Login</a></p>
</div> 
  <?php
 include('footer.php');
?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
=======

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
 <!-- <tilte><h4>Register Here</h4></tilte>-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ideacss.css" rel="stylesheet">
    </head>
<body>
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
  <h3 align="center">Please Read the Notice before you proceed to Login</h3>
</div>
  <p align="center">Whenever you register the Administrator wants to accept you as a IDEAPool User.</p>
  <p align="center">Within 24 hours you will be recieving your login credentials.</p>
  <p align="center">Please check your Email</p>
  <p align="center"><a class="btn btn-primary btn-lg" href="login.php" role="button">Login</a></p>
</div> 
  <?php
 include('footer.php');
?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
>>>>>>> d57608d56be1949eb28c6032b81c46cf51a7c686
</html>
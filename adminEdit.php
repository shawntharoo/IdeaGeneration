
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
 <!-- <tilte><h4>Register Here</h4></tilte>-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ideacss.css" rel="stylesheet">
   
<script type="text/javascript">

function validateform(){

    function validateform(){

 if (document.form1.fname.value == "")
   {
      alert("Please enter the First name");
      document.form1.fname.focus();
      return false;
   }
    if (document.form1.lname.value == "")
   {
      alert("Please enter the Last name");
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

return true;

}

function validateform1(){

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
session_start();
include("database_connect.php");
if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
if ( isset($_GET['sendId'])){ 
$sendID = $_GET['sendId'];
$_SESSION['adid'] = $sendID;
echo "<script> window.postid = ".$sendID." </script>";
$result=mysqli_query($con,"Select * from register where id='".$sendID."' ");
if (!$result) {
printf("Error: %s\n", mysqli_error($con));
exit();
}

while($row=mysqli_fetch_array($result)){

 include('header.php');
 ?>

 <nav class = "navbar navbar-inverse" role = "navigation">
   
           <div class = "navbar-header" style="font-size:20px">
              <a class = "navbar-brand" href = "#">Admin Page</a>
           </div>
           
           <div style="font-size:20px">
          
                            <div class="nav">
                                          <ul class = "nav navbar-nav pull-right">
                                                <li class = "active"><a href = "SearchUser.php">Users</a></li>
                                                <li class = "active"><a href = "editSubmissionCompu.php">Submission</a></li>
                                                 <li class = "active"><a href = "newusers.php">New Users</a></li>
                                                <li class = "active"><a href = "allusers.php">Current User</a></li>
                                                 
                                          </ul>
                             </div>
              </div>

</nav>
<div class="container">
<div class="row">
<div class="col-md-3"><br/>
 <ul class="nav nav-pills nav-stacked">
  <li role="presentation"><a href="index.php">Home</a></li>
    <li role="presentation"><a href="adminPanel.php">Dashboard</a></li>
  <li role="presentation" class="active"><a href="adminProfile.php" >Profile</a></li>
  <li role="presentation"><a href="editSubmissionCompu.php">Submission</a></li>
  <li role="presentation"><a href="awardDisplay.php">Reward</a></li>
</ul>
</div>

<div class="col-md-5">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title" align="center">Change Profile Detail</h4>
</div>


<div class="panel-body">
<form name="form1"  method="POST" action="adminEdit_form.php" onSubmit="return validateform();" enctype="multipart/form-data">

<div class="form-group">
<label for="addr">First Name</label>
<input type="text" class="form-control" name="fname" value="<?php echo $row['fname'] ?>">
</div>

<div class="form-group">
<label for="addr">Last Name</label>
<input type="text" class="form-control" name="lname" value="<?php echo $row['lname'] ?>">
</div>

<div class="form-group">
<label for="lnam">Address</label>
<input type="text" class="form-control" name="add" value="<?php echo $row['address'] ?>">
</div>

<div class="form-group">
<label for="post">Contact</label>
<input type="text" class="form-control" name="contact" value="<?php echo $row['contact'] ?>">
</div>

<div class="form-group">
<label for="dis">Email</label>
<input type="text" class="form-control" name="email" value="<?php echo $row['emil'] ?>">
</div>

<?php $instruction = $row['category']; 
?>

<div class="form-group">
<label for="fnam">Type</label>
<select name="list">
  <option value="Student" <?php if (!empty($instruction) && $instruction == 'Student')  echo 'selected = "selected"'; ?>>Student</option>
<option value="Lecturere" <?php if (!empty($instruction) && $instruction == 'Lecturere')  echo 'selected = "selected"'; ?>>Lecturere</option>
<option value="Operator" <?php if (!empty($instruction) && $instruction == 'Operator')  echo 'selected = "selected"'; ?>>Operator</option>
</select>
</div>

<div class="form-group">
<label for="dis">University ID</label>
<input type="text" class="form-control" name="uid" value="<?php echo $row['universityID'] ?>">
</div>

<div class="form-group">
<label for="dis">Username</label>
<input type="text" class="form-control" name="user" value="<?php echo $row['username'] ?>">
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary" value="submit">Edit </button>
<button type="" class="btn btn-primary" value="">Cancel </button>
</div>
<input type="hidden" name="postid" value="<?php echo $row['id']; ?>">
</form>
</div>
</div>
</div>

<?php }
} ?>


<div class="col-md-4">

<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title" align="center">Reset Your Password</h4>
</div>
<div class="panel-body">
<form name="form2" method="POST" action="adminReset.php" onSubmit="return validateform1();">
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


</body>
<?php
 include('footer.php');
?> 
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>

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
session_start();
include("database_connect.php");
if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
if ( isset($_GET['sendId'])){
  $editaw= $_GET['sendId'];
  $_SESSION['edit']=$editaw;
  
$sendID = $_GET['sendId'];
echo "<script> window.postid = ".$sendID." </script>";
$result=mysqli_query($con,"Select * from reward where id='".$sendID."' ");
if (!$result) {
printf("Error: %s\n", mysqli_error($con));
exit();
}

while($row=mysqli_fetch_array($result)){

$_SESSION['imagepath'] = $row['img'];
 include('header.php');
 ?>
<div class="container">
<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title" align="center">Add a new Award</h4>
</div>


<div class="panel-body">
<form name="form1"  method="POST" action="editAwards_form.php" onSubmit="return validateform();" enctype="multipart/form-data">
<div class="form-group">
<label for="addr">Name</label>
<input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
</div>

<?php $instruction = $row['type']; 
?>

<div class="form-group">
<label for="fnam">Type</label>
<select name="type">
  <option value="Comments" <?php if (!empty($instruction) && $instruction == 'comments')  echo 'selected = "selected"'; ?>>Comments</option>
<option value="vote" <?php if (!empty($instruction) && $instruction == 'vote')  echo 'selected = "selected"'; ?>>Vote</option>
<option value="submission" <?php if (!empty($instruction) && $instruction == 'submission')  echo 'selected = "selected"'; ?>>Submission</option>
</select>
</div>
<div class="form-group">
<label for="lnam">Level</label>
<input type="text" class="form-control" name="level" value="<?php echo $row['level'] ?>">
</div>

<div class="form-group">
<label for="post">Postcount</label>
<input type="text" class="form-control" name="postcount" value="<?php echo $row['postcount'] ?>">
</div>

<div class="form-group">
<label for="dis">Description</label>
<input type="text" class="form-control" name="dis" value="<?php echo $row['description'] ?>">
</div>

<div class="form-group">
<label for="input">Upload Award</label>
<input type="file" name="input"/>
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary" value="submit">Edit </button>
<button type="" class="btn btn-primary" value="">Cancel </button>
</div>
<input type="hidden" name="postid" value="<?php echo $row['id']; ?>">
</form>
<?php }
} ?>
</div>
</div>
</div>

<div class="col-md-3">
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
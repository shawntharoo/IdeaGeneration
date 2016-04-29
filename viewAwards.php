<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="css/ideacss.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"></link>
<!--Closes the new window-->
<script>
 function closeWin() {
 window.opener.location.href = window.opener.location.href;
 if (window.opener.progressWindow) {
    window.opener.progressWindow.close()
  }
window.close();
} 
</script>


<title>IDEAPOOL Admin Page</title>
</head>

<body>
<!-- load the selected submission details to textboxes-->
 <?php
include("database_connect.php");
if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
if ( isset($_GET['sendId'])){
$sendID = $_GET['sendId'];
echo "<script> window.postid = ".$sendID." </script>";
$result=mysqli_query($con,"Select * from awards where id='".$sendID."' ");
if (!$result) {
printf("Error: %s\n", mysqli_error($con));
exit();
}
while($row=mysqli_fetch_array($result)){?>
<div class="panel-body">
<form name="form1"  method="POST" action="editAwards_form.php">
<div class="form-group">
<label for="addr">Name</label>
<input type="text" class="form-control" name="post" value="<?php echo $row['name'] ?>">
</div>

<div class="form-group">
<label for="fnam">Type</label>
<select name="list1">
  <option name="s" value="Student">Comments</option>
  <option name="l" value="Lecturere">vote</option>
  <option name="o" value="Operator">submission</option>
  </select>
</div>
<div class="form-group">
<label for="lnam">Level</label>
<input type="text" class="form-control" name="department" value="<?php echo $row['level'] ?>">
</div>

<div class="form-group">
<label for="lnam">Description</label>
<input type="text" class="form-control" name="dis" value="<?php echo $row['description'] ?>">
</div>
<div class="form-group">
<button type="button" class="btn btn-primary" onclick="closeWin()">Cancel </button>
<!--<button type="button" name="button" class="btn btn-success" onclick="javascript:ViewAward(<?php echo $row['id']; ?>)">Edit</button>-->
</div>
<input type="hidden" name="postid" value="<?php echo $row['id']; ?>">
</form>
<?php }
} ?>
</div>

<script type="text/javascript">
function ViewAward(id)
{
 if(confirm('Are you sure you want to Edit this Award?'))
 {
<?php
include('database_connect.php');
if(isset($_GET['id']))
{
 $name =  $_POST['name'];
$level =  $_POST['level'];
$list = $_POST['list1'];
$destination="images/".$_FILES["input"]["name"];
$source = $_FILES["input"]["tmp_name"];
$input=$destination;
$done = move_uploaded_file($source,$destination);
 $sqluq="update awards set name='".$name."',level='".$level."',type='".$type."', WHERE id='".$_GET['id']."'";
 mysqli_query($con,$sqluq);
 window.closeWin();
}
?>
 }
}
</script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
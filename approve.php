<?php
include('database_connect.php');
if(isset($_GET['approveid']))
{
$getall="Select * from register where id='".$_GET['approveid']."'";
$result = mysqli_query($con,$getall);
while($row=mysqli_fetch_assoc($result)){
	$pass= $row['universityID'];
}
$approve="active";
echo "string";
$sqluq="update register set status='".$approve."', password='".$pass."' WHERE id='".$_GET['approveid']."'";
mysqli_query($con,$sqluq);

echo "<script>window.close();</script>";

}

?>


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
$result=mysqli_query($con,"Select * from register where id='".$sendID."' ");
if (!$result) {
printf("Error: %s\n", mysqli_error($con));
exit();
}
while($row=mysqli_fetch_array($result)){?>
<div class="panel-body">
<form name="form1"  method="POST" action="block.php">
<div class="form-group">
<label for="addr">Full Name</label>
<input type="text" class="form-control" name="post" value="<?php echo $row['fname']." ".$row['lname'] ?>">
</div>
<div class="form-group">
<label for="fnam">Address</label>
<textarea class="form-control" name="faculty"><?php echo $row['address'] ?></textarea>
</div>
<div class="form-group">
<label for="lnam">Contact</label>
<input type="text" class="form-control" name="department" value="<?php echo $row['contact'] ?>">
</div>
<div class="form-group">
<label for="lnam">Gender</label>
<input type="text" class="form-control" name="department" value="<?php echo $row['gender'] ?>">
</div>
<div class="form-group">
<label for="lnam">Email</label>
<input type="text" class="form-control" name="department" value="<?php echo $row['emil'] ?>">
</div>
<div class="form-group">
<label for="lnam">Category</label>
<input type="text" class="form-control" name="department" value="<?php echo $row['category'] ?>">
</div>
<div class="form-group">
<label for="lnam">University Id</label>
<input type="text" class="form-control" name="department" value="<?php echo $row['universityID'] ?>">
</div>
<div class="form-group">
<label for="lnam">Status</label>
<input type="text" class="form-control" name="department" value="<?php echo $row['status'] ?>">
</div>
<div class="form-group">
<!--<button type="submit" class="btn btn-danger"  name="confirm">Update</button>-->
<button type="button" class="btn btn-primary" onclick="closeWin()">Cancel </button>
<button type="button" name="button" class="btn btn-success" onclick="javascript:ApproveUser(<?php echo $row['id']; ?>)">Approve</button>
<button type="button" name="button" class="btn btn-danger" onclick="javascript:delete_id(<?php echo $row['id']; ?>)">Reject</button>
</div>
<input type="hidden" name="postid" value="<?php echo $row['id']; ?>">
</form>
<?php }
} ?>
</div>

<script type="text/javascript">
function ApproveUser(id)
{
 if(confirm('Are you sure you want to send credentials to this user?'))
 {
  window.location.href='approve.php?approveid='+id;
 }
}
</script>
<script type="text/javascript">
function delete_id(id)
{
 if(confirm('Are you sure To Remove This Record ?'))
 {
  window.location.href='newuser_delete.php?delete_id='+id;
 }
}
</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
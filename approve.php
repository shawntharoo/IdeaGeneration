<?php
include('database_connect.php');
if(isset($_GET['delete_id']))
{
 $sql_query="DELETE FROM register WHERE id=".$_GET['delete_id'];
 $sqluq="update register set status='".$approve."' WHERE id=".$_GET['delete_id']."'";
 mysqli_query($con,$sqluq);
 header("Location: newusers.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="css/ideacss.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>



<!--Closes the new window-->
<script>
function closeWin() {
    this.close(); 
}

</script>


<title>ideapool Admin Page</title>
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
<form name="form1"  method="POST" action="approve.php">
<div class="form-group">
<label for="addr">Post</label>
<input type="hidden" name="postid" value="<?php echo $row['id']; ?>">
<textarea class="form-control" name="post" rows="6"><?php echo $row['fname'] ?></textarea>
</div>
<div class="form-group">
<label for="fnam">Faculty</label>
<input type="text" class="form-control" name="faculty" value="<?php echo $row['emil'] ?>">
</div>
<div class="form-group">
<label for="lnam">Department</label>
<input type="text" class="form-control" name="department" value="<?php echo $row['address'] ?>">
</div>
<div class="form-group">
<!--<button type="submit" class="btn btn-danger"  name="confirm">Update</button>-->
<button type="button" class="btn btn-primary" onclick="closeWin()">Cancel </button>
<button type="button" name="button" class="btn btn-success" ><a href="javascript:delete_id(<?php echo $row['id']; ?>)">Approve</button>
</div>
</form>
<?php }
} ?>
</div>


<!--update the post(submission table)-->
   <!--  <?php 
                    if (isset($_POST['button'])){
                      echo "inside";
                    include('database_connect.php');
                     if(mysqli_connect_errno()){
                               echo "failed to connect to MySQL.".mysqli_connect_error();
                               }           
                    try {
                        echo "Done";
                        $approve = "active";
                       $sqluq="update register set status='".$approve."' WHERE id='".$_POST['sendID']."'";
                      
                        echo "Updated !";
                        mysqli_query($con, $sqluq);
            
                        echo "<script>window.close();</script>";
            
    

                    }
                    
                    catch(Exception $e) {
                }
                      echo 'Message: ' .$e->getMessage();
                    }
                
                
            ?> -->

<script type="text/javascript">
function delete_id(id)
{
 if(confirm('Are you sure To Remove This Record ?'))
 {
  window.location.href='newusers.php?delete_id='+id;
 }
}
</script>


</body>
</html>
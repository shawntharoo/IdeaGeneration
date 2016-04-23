<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="css/ideacss.css" />
<link rel="stylesheet" href="css/bootstrap.min.css"></link>

<!-- bootstrap table scripts -->
<script>

  function exefunction(){
                var lfckv = document.getElementById("everybox").checked;
                
            }


</script>
<!-- end of the boostrap table script -->

<!-- popup the edit window -->
<script>
function pop_up(url){
window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=400,height=500,directories=no,location=no') 
}
</script>
<!-- end of the popup window -->
<title>IDEAPOOL Admin Page</title>
<!-- body style/ table margin -->

</head>
<body>
<?php
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
<div class="col-md-12">
<br/>
<h3>All New Registered Users </h3>
<br/>
<?php
include("database_connect.php");

if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
$query = "select * from register where status='pending' ";
$result=mysqli_query($con,$query);

?>
<tr class="info">
<div class="row">
<?php while($row=mysqli_fetch_array($result)){ ?>
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <div class="caption">
      <img src="<?php echo $row['Image']?>" height="120px" width="180px" align="middle">
        <h3><?php echo $row['fname']." ".$row['lname'] ?></h3>
        <p>University ID : <?php echo $row['universityID']; ?></p>
		<p>Category      : <?php echo $row['category'] ?></p>
		<p>Email         : <?php echo $row['emil']; ?></p>
		<p>Contact No    : <?php echo $row['contact']?></p>
        <p><a href="approve.php?sendId=<?= $row['id'] ?>" onclick="pop_up(this);return false;" class="btn btn-info" role="button">View</a>
        <button type="button" name="button" class="btn btn-success" onclick="javascript:ApproveUser(<?php echo $row['id']; ?>)">Approve</button>
<button type="button" name="button" class="btn btn-danger" onclick="javascript:delete_id(<?php echo $row['id']; ?>)">Reject</button></p>
      </div>
    </div>
  </div>
  <?php
}
?>
</div>

<script type="text/javascript">
function ApproveUser(id)
{
 if(confirm('Are you sure you want to send credentials to this user?'))
 {
  window.location.href='newuser_approve.php?approveid='+id;
 }
}
</script>
<!--<button type="button" class="btn btn-primary" onclick="exefunction()"><center>Submit</center></button>-->

</div>
</div>
</div>
</div>      
</div>
<!-- popup box of delete-->
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
<?php
 include('footer.php');
?> 
</body>
</html>
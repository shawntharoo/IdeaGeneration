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
window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=400,height=450,directories=no,location=no') 
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
<h4>All Active Users </h4>
<br/>
<?php
include("database_connect.php");

if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
$query = "select * from register where status != 'pending'";
$result=mysqli_query($con,$query);


?>
<tr class="info">
<div class="row">
<?php while($row=mysqli_fetch_array($result)){ 
	$state = $row['status']?>
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <div class="caption">
      <img src="<?php echo $row['Image']?>" height="120px" width="180px" align="middle">
        <h3><?php echo $row['fname']?></h3>
        <p>Registered ID : <?php echo $row['id'] ?></p>
        <p>University ID : <?php echo $row['universityID']; ?></p>
        <p>Gender        : <?php echo $row['gender'] ?></p>
        <p>Address       : <?php echo $row['address'] ?></p>
		<p>Category      : <?php echo $row['category'] ?></p>
		<p>Email         : <?php echo $row['emil']; ?></p>
		<p>Contact No    : <?php echo $row['contact']?></p>
		<p>Status        : <?php echo $state ?></p>
        <p><a href="block.php?sendId=<?= $row['id'] ?>" onclick="pop_up(this);return false;" class="btn btn-primary" role="button">View</a>
        <?php
        if($state == "blocked"){ ?>
         <button type="button" name="button" class="btn btn-danger" onclick="javascript:UnblockUser(<?php echo $row['id']; ?>)">Unblock</button>
       <?php
        }else{ ?>
        	<button type="button" name="button" class="btn btn-danger" onclick="javascript:BlockUser(<?php echo $row['id']; ?>)">Block</button>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php
}
?>
</div>

<!--<button type="button" class="btn btn-primary" onclick="exefunction()"><center>Submit</center></button>-->

</div>
</div>
</div>
</div>      
</div>
<!-- popup box of delete-->
<script type="text/javascript">
function BlockUser(id)
{
 if(confirm('Are you sure you want to Block this user?'))
 {
  window.location.href='block_user.php?blockid='+id;
 }
}

function UnblockUser(id)
{
 if(confirm('Are you sure you want to Unblock this user?'))
 {
  window.location.href='unblock_user.php?blockid='+id;
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
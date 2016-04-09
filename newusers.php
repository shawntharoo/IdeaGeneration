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
window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1000,height=400,directories=no,location=no') 
}
</script>
<!-- end of the popup window -->
<title>IDEAPOOL Admin Page</title>
<!-- body style/ table margin -->

</head>
<body>
<?php
//include('header.php');
?>

<div class="container">
<div class="row">
<div class="col-md-12">
<br/>
<h4>All New Registered Users </h4>
<br/>
<div class="table-responsive">
<table id="mytable" class="table table-hover">
<thead>

<th>Register ID</th>
<th>Name</th>
<th>ContactNo</th>
<th>Email</th>
<th>UniversityID</th>
<th>Approvement </th>
<th>View</th>
<th>Delete</th>
</thead>
<tbody>
<tr>
<?php
include("database_connect.php");

if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
$query = "select * from register where status='pending' ";
$result=mysqli_query($con,$query);

while($row=mysqli_fetch_array($result)){?>
<tr class="info">
<td><?php echo $row['id'] ?></td>
<td><?php echo $row['fname']." ".$row['lname'] ?></td>
<td><?php echo $row['contact']?></td>
<td><?php echo $row['emil']; ?></td>
<td><?php echo $row['universityID']; ?></td>
<td><input type="checkbox" class="checkthis" name="everybox" id="everybox"/></td>
<td><a href="approve.php?sendId=<?= $row['id'] ?>" onclick="pop_up(this);return false;"><img name="jsbutton" src="images/view.png" width="30" height="20" border="0" alt="javascript button"></a></td>
<td><a href="newuser_delete.php?variable=<?= $row['id'] ?>"><img name="jsbutton" src="images/delete.png" width="25" height="25" border="0" alt="javascript button"></a></td>

<?php
}
?>
</tbody>
</table>
<!--<button type="button" class="btn btn-primary" onclick="exefunction()"><center>Submit</center></button>-->

</div>
</div>
</div>
</div>      
</div>
<!-- popup box of delete-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
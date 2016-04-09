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
<th>Address</th>
<th>ContactNo</th>
<th>Gender</th>
<th>Email</th>
<th>Category</th>
<th>UniversityID</th>
<th>Status </th>
<th>View</th>
</thead>
<tbody>
<tr>
<?php
include("database_connect.php");

if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
$query = "select * from register where status != 'pending'";
$result=mysqli_query($con,$query);

while($row=mysqli_fetch_array($result)){?>
<tr class="danger">
<td><?php echo $row['id'] ?></td>
<td><?php echo $row['fname']." ".$row['lname'] ?></td>
<td><?php echo $row['address']?></td>
<td><?php echo $row['contact']?></td>
<td><?php echo $row['gender']?></td>
<td><?php echo $row['emil']; ?></td>
<td><?php echo $row['category']?></td>
<td><?php echo $row['universityID']; ?></td>
<td><?php echo $row['status']?></td>
<td><a href="block.php?sendId=<?= $row['id'] ?>" onclick="pop_up(this);return false;"><img name="jsbutton" src="images/view.png" width="30" height="20" border="0" alt="javascript button"></a></td>

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
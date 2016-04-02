<?php
include('database_connect.php');
$sql_query="SELECT * FROM register";
$result_set=mysqli_query($con,$sql_query);
if(isset($_GET['delete_id']))
{
 $sql_query="DELETE FROM register WHERE id=".$_GET['delete_id'];
 mysqli_query($con,$sql_query);
 header("Location: newusers.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="css/ideacss.css" />
<link rel="stylesheet" href="css/bootstrap.min.css"></link>

<!-- bootstrap table scripts -->
<script>

$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});


</script>
<!-- end of the boostrap table script -->




<!-- popup the edit window -->
<script>
function pop_up(url){
window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1000,height=400,directories=no,location=no') 
}
</script>
<!-- end of the popup window -->
<title>ideapool Admin Page</title>
<!-- body style/ table margin -->

<style>

.tablecontent
{
	margin-left:20em;
	margin-left:20em;
	margin-top:7em;
	margin-bottom:10em;
	
}

</style>
</head>
<body>
<?php
include('header.php');
?>

<!--start of navigation bar -->


<!--<nav class = "navbar navbar-inverse" role = "navigation">
<div class = "navbar-header" style="font-size:20px">
<a class = "navbar-brand" href = "#">Admin Page</a>
</div>
<div style="font-size:20px">
<div class="nav">
<ul class = "nav navbar-nav pull-right">
 <li class = "active"><a href = "#">User Reuqests</a></li>
 <li class = "dropdown">
<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
Submission
<b class = "caret"></b>
</a>
                                                    
<ul class = "dropdown-menu" style="font-size:20px">
<li id="page1"><a href = "editSubmissionEngi.php">Enginering</a></li>
<li id="page2"><a href = "editSubmissionCompu.php">Computing</a></li>
<li id="page3"><a href = "editSubmissionManag.php">Management</a></li>
<li id="page4"><a href ="editSubmissionHos.php">Art</a></li>
<li class = "divider"></li>
<li id="page5"><a href = "editSubmissionNonAc.php">Non Academic</a></li>
<li class = "divider"></li>
<li id="page6"><a href = "editSubmissionOther.php">Others</a></li>
</ul>
</li>
</ul>
</div>
</div>

</nav>-->


<!-- load the submission to the table-->

<!--<div id ="tablecontent">-->
<div class="container">
<div class="row">
<div class="col-md-12">
<h4> Submission of Faculty of Computing</h4>
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped">
<thead>

<th>Register ID</th>
<th>Name</th>
<th>ContactNo</th>
<th>Email</th>
<th>UniversityID</th>
<th>Approvement </th>
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
<tr>
<td><?php echo $row['id'] ?></td>
<td><?php echo $row['fname']." ".$row['lname'] ?></td>
<td><?php echo $row['contact']?></td>
<td><?php echo $row['emil']; ?></td>
<td><?php echo $row['universityID']; ?></td>
<td><input type="checkbox" class="checkthis" /></td>
<td><a href="approve.php?sendId=<?= $row['id'] ?>" onclick="pop_up(this);return false;"><img name="jsbutton" src="images/edit.png" width="25" height="25" border="0" alt="javascript button"></a></td>
<td><a href="javascript:delete_id(<?php echo $row['id']; ?>)"><img name="jsbutton" src="images/delete.png" width="25" height="25" border="0" alt="javascript button"></a></td>

</tr>
                                                                            
<?php
}
?>
</tbody>
</table>
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
  window.location.href='newusers.php?delete_id='+id;
 }
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
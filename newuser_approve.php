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
header("location: newusers.php");
}
?>
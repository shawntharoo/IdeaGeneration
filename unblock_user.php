<?php
include('database_connect.php');
if(isset($_GET['blockid']))
{
$getall="Select * from register where id='".$_GET['blockid']."'";
$result = mysqli_query($con,$getall);
$block="active";
echo "string";
$sqluq="update register set status='".$block."' WHERE id='".$_GET['blockid']."'";
mysqli_query($con,$sqluq);
header("location: allusers.php");
}
?>
<?php
include('database_connect.php');
if(isset($_GET['showid']))
{
$show=1;
echo "string";
$sqluq="update games set Availability='".$show."' WHERE id='".$_GET['showid']."'";
mysqli_query($con,$sqluq);
header("location: Gemification.php");
}
?>
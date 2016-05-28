<?php
include('database_connect.php');
if(isset($_GET['hideid']))
{
$show=0;
echo "string";
$sqluq="update games set Availability='".$show."' WHERE id='".$_GET['hideid']."'";
mysqli_query($con,$sqluq);
header("location: Gemification.php");
}
?>
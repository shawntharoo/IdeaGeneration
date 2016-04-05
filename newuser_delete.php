<?php

include('database_connect.php');
/*echo '<script language="javascript">';
echo 'alert("Username or Password is invalid")';
echo '</script>';*/
if(isset($_GET['variable']))
{
 $sql_query="DELETE FROM register WHERE id=".$_GET['variable'];
 mysqli_query($con,$sql_query);
 header("Location: newusers.php");
}
mysqli_close($con);
?>
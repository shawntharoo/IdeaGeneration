
  <?php
	include('database_connect.php');
	if(isset($_GET['delete_id']))
		{
 			$sql_query="DELETE FROM register WHERE id=".$_GET['delete_id'];
 			mysqli_query($con,$sql_query);
 			header("Location: newusers.php");
	
	mysqli_close($con);

}else{
	header("Location: newusers.php");
}
  ?>


<script type="text/javascript">
function delete_id(id)
{
 if(confirm('Are you sure To Remove This Record ?'))
 {
  <?php
	include('database_connect.php');
	if(isset($_GET['variable']))
		{
 			$sql_query="DELETE FROM register WHERE id=".$_GET['variable'];
 			mysqli_query($con,$sql_query);
 			header("Location: newusers.php");
		}
	mysqli_close($con);
  ?>
 }
}else{
	header("Location: newusers.php");
}
</script>


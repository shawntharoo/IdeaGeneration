<?php require_once('database_connect.php'); ?>

<?php
$pending=mysqli_fetch_array(mysqli_query($con,"SELECT count(id) FROM register WHERE status='pending'"));
$active=mysqli_fetch_array(mysqli_query($con,"SELECT count(id) FROM register WHERE status='active'"));
$blocked=mysqli_fetch_array(mysqli_query($con,"SELECT count(id) FROM register WHERE status='blocked'"));

	echo "$pending[0]<br>";

	echo "$active[0]<br>";

	echo "$blocked[0]";


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	

		<title>Admin charts</title>
		 <link rel="stylesheet" href="css/bootstrap.min.css"></link>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/diluni.css" rel="stylesheet">
		<link rel="stylesheet" href="css/ideacss.css" />

		<!-- color schema -->
		<link href="css/color-4.css" rel="stylesheet" id="layoutstyle">	
					
		<script src="js/jquery-1.12.0.min.js"></script>
        <script src="js/jsapi.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <link rel="stylesheet" href="themes_panel.css">	
        
        <script type="text/javascript"> 
		
		
        google.load("visualization", "l", {packages:["corechart"]});
		google.setOnLoadCallback(drawChart);
        function drawChart(){
			var data= google.visualization.arrayToDataTable([
			
			['pending', 6],
			['active', 6],
			['blocked', 4]
			
			]);
			var options={title: 'Users status'};
			var chart= new google.visualization.PieChart(document.getElementById('chart-div'));
			chart.draw(data, options);
			
		}
        </script>
        
        <style type="text/css">
 			body {background-image:url(images/body.jpg);}
		</style>

</head>


<body>

	<div class="container-fluid" style="background-image:url(images/banner2.jpg)">
    	<div class="container">
    		<?php
    		include("header.php");
    		?>
    	</div> 
	</div> 

	<div class="formfad">
		<div class="heading" >Summery of <span class="heading">Ideapool</span></div>

<div id="chart-div" style="width:300px; height:300px;">


</div>
  	
	</div>           
                        
                                          	   
	<script>
	 
		$(document).ready(function() { 

	    	  
		});
 

 
	</script>
 

 
	<script type="text/javascript">

	</script>

<footer style="background-image:url(images/footer.jpg);color:#FFF">
	<?php
	include('footer.php');
	?>
</footer>

</body>

</html>
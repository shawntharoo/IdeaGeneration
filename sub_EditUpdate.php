<!-- DataBase connection -->
<?php require_once('database_connect.php'); ?>
 
<html>

<head>

<title>Update & delete</title>

	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
		 
    <!-- fontawesome iconpack -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom styles -->
	<link href="css/diluni.css" rel="stylesheet">
    		
</head>

<body>

	<!-- Delete button -->
	<span class="pull-right"><button type="submit" class="btn btn-danger" onClick="deleteRow()"><i class="fa fa-trash-o"></i></button></span>

	<!-- Edit button -->
	<span style="pull-right"><a href="updateSubmission.php?postId=<?= $row['postId'] ?>" onClick="pop_up(this);return false;"><button class="btn bg-danger" style="background-color: #090; color:#FFF;"><i class="fa fa-edit"></i></button></a></span>

<script>
	<!-- Delete function -->
	function deleteRow(){
		if(confirm('Are you sure to remove this record?'))
 			{
  				window.location.href='deleteSubmission.php?postId=<?= $row['postId']?>';
 			}
	}

	<!-- popup the edit window -->
	function pop_up(url){
		window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1000,height=500,directories=no,location=no') 
	}

	//jQuery Library Comes First
	//Bootstrap Library
	$( document ).ready(function() {       
    	$('#myModal').on('show.bs.modal', function (e) { //Modal Event
        	var id = $(e.relatedTarget).data('id'); //Fetch id from modal trigger button
    		$.ajax({
      			type : 'post',
       			url : 'file.php', //Here you will fetch records 
      			data :  'post_id='+ id, //Pass $id
      			success : function(data){
         		$('.form-data').html(data);//Show fetched data from database
       			}
    		});
   		});
	});
	<!-- end of the popup window -->

</script>

</body>

</html>
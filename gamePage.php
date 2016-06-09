<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="css/bootstrap.min.css"></link>
 <link rel="stylesheet" href="css/ideacss.css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
 <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>

<?php

	//session_start();
	//$userNo = $_SESSION['userid'] ;
	$gameId = $_GET["id"];
	$gameString = "games/".$gameId.".swf";

?> 

<?php
  
    include('header.php');
?>

 <div class="container-fluid game_body" style="width:80%; height:80%;">
 	<embed src = "<?php echo $gameString; ?>" width="1000px" height="600px"> </embed>

 </div>


</body>
</html>
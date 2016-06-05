
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="css/ideacss.css" />
<link rel="stylesheet" href="css/bootstrap.min.css"></link>

<!-- bootstrap table scripts -->

<script src="//static.miniclipcdn.com/js/game-embed.js"></script>


<!-- popup the edit window -->

<!-- end of the popup window -->
<title>IDEAPOOL Game Page</title>
<!-- body style/ table margin -->
</head>




<body>
<?php
include('header.php');
?>

<div class="container">

<script src="//static.miniclipcdn.com/js/game-embed.js"></script>
<?php
include("database_connect.php");

if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
?>
<br/>
 <div class="col-md-4">
 <div class="jumbotron">
  <h2><span class="label label-default">IDEAPOOL</span></h2><br/>
  <p><a class="btn btn-success btn-lg" href="register.php" role="button">Register</a></p>
  <img src="images/interesting.jpg" class="img-responsive" alt="">
  <br/>
  <p>Are you already a member?</p>
  <p><a class="btn btn-primary btn-lg" href="login.php" role="button">Login</a></p>
</div>
 </div>
  <div class="col-md-1">
  </div>
 <div class="col-md-7">
<?php
$query1 = "select * from games where ID = '1'";
$result1=mysqli_query($con,$query1);
while($row=mysqli_fetch_array($result1)){ 
  $Available1 = $row['Availability'];
}
$query2 = "select * from games where ID = '2'";
$result2=mysqli_query($con,$query2);
while($row=mysqli_fetch_array($result2)){ 
  $Available2 = $row['Availability'];
}
$query3 = "select * from games where ID = '3'";
$result3=mysqli_query($con,$query3);
while($row=mysqli_fetch_array($result3)){ 
  $Available3 = $row['Availability'];
}
$query4 = "select * from games where ID = '4'";
$result4=mysqli_query($con,$query4);
while($row=mysqli_fetch_array($result4)){ 
  $Available4 = $row['Availability'];
}
$query5 = "select * from games where ID = '5'";
$result5=mysqli_query($con,$query5);
while($row=mysqli_fetch_array($result5)){ 
  $Available5 = $row['Availability'];
}
$query6 = "select * from games where ID = '6'";
$result6=mysqli_query($con,$query6);
while($row=mysqli_fetch_array($result6)){ 
  $Available6 = $row['Availability'];
}
  if($Available1 == 1){ ?>
<div class="miniclip-game-embed" data-game-name="thunderbirds" data-theme="0" data-width="700" data-height="500" data-language="en"><a href="http://www.miniclip.com/games/thunderbirds/">Play Thunderbirds Are Go: Team Rush</a></div>
 <?php } else if($Available2 == 1){ ?>
 <div class="miniclip-game-embed" data-game-name="free-running-2" data-theme="0" data-width="700" data-height="500" data-language="en"><a href="http://www.miniclip.com/games/free-running-2/">Play Free Running 2</a></div><br/>
  <?php } else if($Available3 == 1){?>
  <div class="miniclip-game-embed" data-game-name="8-ball-pool-multiplayer" data-theme="0" data-width="700" data-height="500" data-language="en"><a href="http://www.miniclip.com/games/8-ball-pool-multiplayer/">Play 8 Ball Pool</a></div><br/>
 <?php } else if($Available4 == 1){?>
<div class="miniclip-game-embed" data-game-name="basketball-stars" data-theme="0" data-width="700" data-height="500" data-language="en"><a href="http://www.miniclip.com/games/basketball-stars/">Play Basketball Stars</a></div><br/>
<?php } else if($Available5 == 1){?>
<div class="miniclip-game-embed" data-game-name="big-snow-tricks" data-theme="0" data-width="700" data-height="500" data-language="en"><a href="http://www.miniclip.com/games/big-snow-tricks/">Play Big Snow Tricks</a></div><br/>
<?php } else if($Available6 == 1){?>
<div class="miniclip-game-embed" data-game-name="bow-master-japan" data-theme="0" data-width="700" data-height="500" data-language="en"><a href="http://www.miniclip.com/games/bow-master-japan/">Play Bow Master Japan</a></div><br/>
<?php } else{?>
  <img class="media-object" src="images/under-construction-20-19.jpg" height="500" width="700" align="middle">
<?php } ?>
</div>
</div>

<?php
include('footer.php');
?>
</body>
</html>
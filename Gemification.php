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
<title>IDEAPOOL Gemification Page</title>
<!-- body style/ table margin -->
</head>




<body>
<?php
include('header.php');
?>

 <nav class = "navbar navbar-inverse" role = "navigation">
   
           <div class = "navbar-header" style="font-size:20px">
              <a class = "navbar-brand" href = "adminPanel.php">Admin Panel</a>
           </div>
           
           <div style="font-size:20px">
          
                            <div class="nav">
                                          <ul class = "nav navbar-nav pull-right">
                                                <li class = "active"><a href = "index.php">Home</a></li>
                                                <li class = "active"><a href = "adminPanel.php">Dashboard</a></li>   
                                          </ul>
                             </div>
              </div>

</nav>

<?php
include("database_connect.php");

if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
?>

<div class="container">
<h3>Available games In the WebSite </h3><br/>
<div class="row">
<div class="col-md-3">
<?php
$query1 = "select * from games where ID = '1'";
$result1=mysqli_query($con,$query1);
while($row=mysqli_fetch_array($result1)){ 
	$Available = $row['Availability']
 ?>
<div class="miniclip-game-embed" data-game-name="thunderbirds" data-theme="0" data-width="350" data-height="400" data-language="en"><a href="http://www.miniclip.com/games/thunderbirds/">Play Thunderbirds Are Go: Team Rush</a></div><br/>
 <?php
  if($Available == 0){ ?>
  <button type="button" name="button" class="btn btn-primary" onclick="javascript:ShowGame(<?php echo $row['ID']; ?>)">Show Game</button>
 <?php } else{ ?>
  <button type="button" name="button" class="btn btn-danger" onclick="javascript:HideGame(<?php echo $row['ID']; ?>)">Hide Game</button>
  <?php } ?>
</div>
 <?php
}
?>

<div class="col-md-1">
</div>

<div class="col-md-3">
<?php
$query2 = "select * from games where ID = '2'";
$result2=mysqli_query($con,$query2);
while($row=mysqli_fetch_array($result2)){ 
	$Available = $row['Availability']
 ?>
<div class="miniclip-game-embed" data-game-name="8-ball-pool-multiplayer" data-theme="0" data-width="350" data-height="400" data-language="en"><a href="http://www.miniclip.com/games/8-ball-pool-multiplayer/">Play 8 Ball Pool</a></div><br/>
 <?php
  if($Available == 0){ ?>
  <button type="button" name="button" class="btn btn-primary" onclick="javascript:ShowGame(<?php echo $row['ID']; ?>)">Show Game</button>
 <?php } else{ ?>
  <button type="button" name="button" class="btn btn-danger" onclick="javascript:HideGame(<?php echo $row['ID']; ?>)">Hide Game</button>
  <?php } ?>
</div>
 <?php
}
?>

<div class="col-md-1">
</div>

<div class="col-md-3">
<?php
$query3 = "select * from games where ID = '3'";
$result3=mysqli_query($con,$query3);
while($row=mysqli_fetch_array($result3)){ 
	$Available = $row['Availability']
 ?>
<div class="miniclip-game-embed" data-game-name="basketball-stars" data-theme="0" data-width="350" data-height="400" data-language="en"><a href="http://www.miniclip.com/games/basketball-stars/">Play Basketball Stars</a></div><br/>
 <?php
  if($Available == 0){ ?>
  <button type="button" name="button" class="btn btn-primary" onclick="javascript:ShowGame(<?php echo $row['ID']; ?>)">Show Game</button>
 <?php } else{ ?>
  <button type="button" name="button" class="btn btn-danger" onclick="javascript:HideGame(<?php echo $row['ID']; ?>)">Hide Game</button>
  <?php } ?>
</div>
 <?php
}
?>

<div class="col-md-1">
</div>

</div><br/>

<div class="row">
<div class="col-md-3">
<?php
$query4 = "select * from games where ID = '4'";
$result4=mysqli_query($con,$query4);
while($row=mysqli_fetch_array($result4)){ 
	$Available = $row['Availability']
 ?>
<div class="miniclip-game-embed" data-game-name="free-running-2" data-theme="0" data-width="350" data-height="400" data-language="en"><a href="http://www.miniclip.com/games/free-running-2/">Play Free Running 2</a></div><br/>
 <?php
  if($Available == 0){ ?>
  <button type="button" name="button" class="btn btn-primary" onclick="javascript:ShowGame(<?php echo $row['ID']; ?>)">Show Game</button>
 <?php } else{ ?>
  <button type="button" name="button" class="btn btn-danger" onclick="javascript:HideGame(<?php echo $row['ID']; ?>)">Hide Game</button>
  <?php } ?>
</div>
 <?php
}
?>

<div class="col-md-1">
</div>

<div class="col-md-3">
<?php
$query5 = "select * from games where ID = '5'";
$result5=mysqli_query($con,$query5);
while($row=mysqli_fetch_array($result5)){ 
	$Available = $row['Availability']
 ?>
<div class="miniclip-game-embed" data-game-name="big-snow-tricks" data-theme="0" data-width="350" data-height="400" data-language="en"><a href="http://www.miniclip.com/games/big-snow-tricks/">Play Big Snow Tricks</a></div><br/>
 <?php
  if($Available == 0){ ?>
  <button type="button" name="button" class="btn btn-primary" onclick="javascript:ShowGame(<?php echo $row['ID']; ?>)">Show Game</button>
 <?php } else{ ?>
  <button type="button" name="button" class="btn btn-danger" onclick="javascript:HideGame(<?php echo $row['ID']; ?>)">Hide Game</button>
  <?php } ?>
</div>
 <?php
}
?>

<div class="col-md-1">
</div>

<div class="col-md-3">
<?php
$query6 = "select * from games where ID = '6'";
$result6=mysqli_query($con,$query6);
while($row=mysqli_fetch_array($result6)){ 
	$Available = $row['Availability']
 ?>
<div class="miniclip-game-embed" data-game-name="bow-master-japan" data-theme="0" data-width="350" data-height="400" data-language="en"><a href="http://www.miniclip.com/games/bow-master-japan/">Play Bow Master Japan</a></div><br/>
 <?php
  if($Available == 0){ ?>
  <button type="button" name="button" class="btn btn-primary" onclick="javascript:ShowGame(<?php echo $row['ID']; ?>)">Show Game</button>
 <?php } else{ ?>
  <button type="button" name="button" class="btn btn-danger" onclick="javascript:HideGame(<?php echo $row['ID']; ?>)">Hide Game</button>
  <?php } ?>
</div>
 <?php
}
?>

<div class="col-md-1">
</div>
</div><br/>

</div>
<br/>

<script type="text/javascript">
function ShowGame(id)
{
 if(confirm('Are you sure you want to Show this game to the users?'))
 {
  window.location.href='showgame.php?showid='+id;
 }
}

function HideGame(id)
{
 if(confirm('Are you sure you want to Hide this game from the users?'))
 {
  window.location.href='hidegame.php?hideid='+id;
 }
}
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<?php
include('footer.php');
?>
</body>
</html>
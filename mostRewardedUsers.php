<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
 <!-- <tilte><h4>Register Here</h4></tilte>-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ideacss.css" rel="stylesheet">
</head>
<body>
<?php
 include('header.php');
?> <br/>

<div class="container">
<div class="row">
<div class="col-md-3">
<ul class="nav nav-pills nav-stacked">
  <li role="presentation"><a href="index.php">Home</a></li>
  <li role="presentation" class="active"><a href="adminPanel.php">Dashboard</a></li>
  <li role="presentation"><a href="adminProfile.php">Profile</a></li>
  <li role="presentation"><a href="editSubmissionCompu.php">Submission</a></li>
  <li role="presentation"><a href="awardDisplay.php">Reward</a></li>
  <li role="presentation"><a href="Gemification.php">Games</a></li>
  <li role="presentation"><a href="mostRewardedUsers.php">Most Rewarded Users</a></li>
</ul>
</div>

<div class="col-md-9">

<?php
include("database_connect.php");

if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
$query = "select * from register";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result)){ 
?>

<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="<?php echo $row['Image']?>" height="120px" width="150px" align="middle">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><?php echo $row['fname'].' '.$row['lname']; ?></h4>
   <img class="media-object" src="<?php echo $row['Image']?>" height="70px" width="60px" align="middle">
  </div>
</div>
<?php
}
?>
</div>
</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body><br/>
<?php
 include('footer.php');
?> 
</html>
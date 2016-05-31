<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="css/ideacss.css" />
<link rel="stylesheet" href="css/bootstrap.min.css"></link>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript" src="stickytooltip.js">
</script>

<link rel="stylesheet" type="text/css" href="stickytooltip.css" />

<!-- bootstrap table scripts -->
<style type="text/css">
#caption {
    position: relative;
}
#caption LevelImg {
    position: absolute;
    top: 0px;
    right: 0px;
}

</style>

<script>

  function exefunction(){
                var lfckv = document.getElementById("everybox").checked;
                
            }


</script>
<!-- end of the boostrap table script -->




<!-- popup the edit window -->
<script>
function pop_up(url){
window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=400,height=325,directories=no,location=no') 
}
</script>
<!-- end of the popup window -->
<title>IDEAPOOL Admin Page</title>
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




<div class="container">
<a href="addAwards.php" class="btn btn-success" role="button" width="20em" height: 2em;>New Badge</a>
<div class="row">
<div class="col-md-12">
<br/>
<h4>All Badges Given for the Improvement </h4>
<br/>
<?php
include("database_connect.php");

if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
$query = "select * from reward where type = 'improvement'";
$result=mysqli_query($con,$query);
?>
<tr class="info">
<div class="row">
<?php while($row=mysqli_fetch_array($result)){ 
  ?>
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail" data-tooltip="sticky1">
      <div class="caption">
      <img src="<?php echo $row['img']?>" height="120px" width="115px" align="middle">
        <p>Badge ID : <?php echo $row['id'] ?></p>
        <p>Badge Name : <?php echo $row['name']; ?></p>
        <p>Badge Type        : <?php echo $row['type'] ?></p>
        <p>Badge Level      : <?php echo $row['level'] ?></p>
         <p>Badge PostCount      : <?php echo $row['postcount'] ?></p>
        <!--<p>Badge Description      : <?php// echo $row['description'] ?></p>-->
        <p><a href="viewAwards.php?sendId=<?= $row['id'] ?>" onclick="pop_up(this);return false;" class="btn btn-primary" role="button">View</a>
        <button type="button" name="button" class="btn btn-success" onclick="javascript:Edit_id(<?php echo $row['id']; ?>)">Edit</button>
        <button type="button" name="button" class="btn btn-danger" onclick="javascript:delete_id(<?php echo $row['id']; ?>)">Delete</button>

      </div>
    </div>
  </div>
  <?php
}
?>
</div>

<!--<button type="button" class="btn btn-primary" onclick="exefunction()"><center>Submit</center></button>-->

</div>
</div>


<div class="row">
<div class="col-md-12">
<br/>
<h4>All Badges Given for the Votes </h4>
<br/>
<?php
include("database_connect.php");

if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
$query = "select * from reward where type = 'vote'";
$result=mysqli_query($con,$query);


?>
<tr class="info">
<div class="row">
<?php while($row=mysqli_fetch_array($result)){ 
  ?>
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail" data-tooltip="sticky2">
      <div class="caption">
      <img src="<?php echo $row['img']?>" height="120px" width="115px" align="middle">
        <p>Badge ID : <?php echo $row['id'] ?></p>
        <p>Badge Name : <?php echo $row['name']; ?></p>
        <p>Badge Type        : <?php echo $row['type'] ?></p>
        <p>Badge Level      : <?php echo $row['level'] ?></p>
        <p>Badge PostCount      : <?php echo $row['postcount'] ?></p>
        <p><a href="viewAwards.php?sendId=<?= $row['id'] ?>" onclick="pop_up(this);return false;" class="btn btn-primary" role="button">View</a>
          <button type="button" name="button" class="btn btn-success" onclick="javascript:Edit_id(<?php echo $row['id']; ?>)">Edit</button>
        <button type="button" name="button" class="btn btn-danger" onclick="javascript:delete_id(<?php echo $row['id']; ?>)">Delete</button>
      </div>
    </div>
  </div>
  <?php
}
?>
</div>

<!--<button type="button" class="btn btn-primary" onclick="exefunction()"><center>Submit</center></button>-->

</div>
</div>


<div class="row">
<div class="col-md-12">
<br/>
<h4>All Badges Given for the Submissions </h4>
<br/>
<?php
include("database_connect.php");

if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
$query = "select * from reward where type = 'submission'";
$result=mysqli_query($con,$query);


?>
<tr class="info">
<div class="row">
<?php while($row=mysqli_fetch_array($result)){ 
  ?>
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail" data-tooltip="sticky3">
      <div class="caption">
      <img src="<?php echo $row['img']?>" height="120px" width="115px" align="middle">
        <p>Badge ID : <?php echo $row['id'] ?></p>
        <p>Badge Name : <?php echo $row['name']; ?></p>
        <p>Badge Type        : <?php echo $row['type'] ?></p>
        <p>Badge Level      : <?php echo $row['level'] ?></p>
        <p>Badge PostCount      : <?php echo $row['postcount'] ?></p>
        <p><a href="viewAwards.php?sendId=<?= $row['id'] ?>" onclick="pop_up(this);return false;" class="btn btn-primary" role="button">View</a>
          <button type="button" name="button" class="btn btn-success" onclick="javascript:Edit_id(<?php echo $row['id']; ?>)">Edit</button>
        <button type="button" name="button" class="btn btn-danger" onclick="javascript:delete_id(<?php echo $row['id']; ?>)">Delete</button>
      </div>
    </div>
  </div>
  <?php
}
?>
</div>

<!--<button type="button" class="btn btn-primary" onclick="exefunction()"><center>Submit</center></button>-->

</div>
</div>



<!--HTML for the tooltips-->
<div id="mystickytooltip" class="stickytooltip">
<div style="padding:5px">

<div id="sticky1" class="atip" style="width:400px">
<img src="images/Ta1.png" /><br />
This is a Reward Given for the Users Who has Posted number of Improvements to the IDEAPOOL
</div>

<div id="sticky2" class="atip"  style="width:400px">
<img src="images/Ta2.png" /><br />This is a Reward Given for the Users Who has Exceeded The Desired number of Votes Count
</div>

<div id="sticky3" class="atip" style="width:400px">
<img src="images/Ta3.jpg" /><br />This is a Reward Given for the Users Who has Posted number of Submissions to the IDEAPOOL
</div>

</div>

<div class="stickystatus"></div>
</div>




</div>
</div>      
</div>
<!-- popup box of delete-->
<script type="text/javascript">

function delete_id(id)
{
 if(confirm('Are you sure you want To Remove This Badge?'))
 {
  window.location.href='award_delete.php?delete_id='+id;
 }
}

function Edit_id(id)
{
 if(confirm('Are you sure want To Edit This Badge ?'))
 {
  window.location.href='editawards.php?sendId='+id;
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
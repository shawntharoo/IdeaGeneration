
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="css/ideacss.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   
           
        <link rel="stylesheet" href="themes_panel.css">	
        
			<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">




<title>ideapool Admin Page</title>

</head>

<body>


<!-- header-->

 <?php
 
  include('header.php');
 ?>
 
 
 
<!--start of navigation bar -->


<nav class = "navbar navbar-inverse" role = "navigation">
   
           <div class = "navbar-header" style="font-size:20px">
              <a class = "navbar-brand" href = "#">Admin Page</a>
           </div>
           
           <div style="font-size:20px">
          
                            <div class="nav">
                                          <ul class = "nav navbar-nav pull-right">
                                                <li class = "active"><a href = "SearchUser.php">Users</a></li>
                                                <li class = "active"><a href = "editSubmissionCompu.php">Submission</a></li>
                                                 <li class = "active"><a href = "newusers.php">New Users</a></li>
                                                <li class = "active"><a href = "allusers.php">Current User</a></li>
                                                 
                                          </ul>
                             </div>
              </div>

</nav>


 <div class="container">
<div class="col-md-3"><br/>
 <ul class="nav nav-pills nav-stacked">
  <li role="presentation"><a href="index.php">Home</a></li>
    <li role="presentation"><a href="adminPanel.php">Dashboard</a></li>
  <li role="presentation" class="active"><a href="adminProfile.php" >Profile</a></li>
  <li role="presentation"><a href="editSubmissionCompu.php">Submission</a></li>
  <li role="presentation"><a href="awardDisplay.php">Reward</a></li>


</ul>
</div>
 <div class="col-md-1">
   
 </div>
 <div class="col-md-5"><br/>
 <?php  
 $adminId = $_SESSION['userid'];
 $_SESSION['admin'] = $adminId;
include("database_connect.php");
if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
$query ="SELECT * FROM register where id = $adminId";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result)){
$_SESSION['imagepath'] = $row['Image'];

 ?>

<div class="panel panel-default" style="width: 300px ">
  <div class="panel-body">
   <font size="4" color="black"> Name  :  </font> <font size="3" color="blue"><?php echo $row['fname'] . " " . $row['lname']; ?></font>
  </div>
</div>

<div class="panel panel-default" style="width: 300px ">
  <div class="panel-body">
  <font size="4" color="black"> Address  :  </font> <font size="3" color="blue"><?php echo $row['address']; ?></font>
  </div>
</div>

<div class="panel panel-default" style="width: 300px ">
  <div class="panel-body">
   <font size="4" color="black"> Contact  :  </font> <font size="3" color="blue"><?php echo $row['contact']; ?></font>
  </div>
</div>

<div class="panel panel-default" style="width: 300px ">
  <div class="panel-body">
    <font size="4" color="black"> E-Mail  :  </font> <font size="3" color="blue"><?php echo $row['emil']; ?></font>
  </div>
</div>

<div class="panel panel-default" style="width: 300px ">
  <div class="panel-body">
    <font size="4" color="black"> University ID  :  </font> <font size="3" color="blue"><?php echo $row['universityID']; ?></font> 
  </div>
</div>
<button type="button" name="button" class="btn btn-success" style="width:180px;" onclick="javascript:Edit_id(<?php echo $row['id']; ?>)">Edit & Change Password</button>

 </div>

 <div class="col-md-3">
 <div class="row">
  <div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail" style="width: 175px; height: 175px ">
      <img  src="<?php echo $row['Image']; ?>">
    </a>
  </div><br>
  ...
</div>
 <form name="form1"  method="POST" action="adminEditImage.php" enctype="multipart/form-data">
     <div class="form-group">
    <label for="ima">Change Image</label>
    <input type="file" name="input" id="i"/><br>
    <button type="submit" class="btn btn-primary" value="submit">Upload </button>
  </div>
  </form>
 </div>
 <?php } ?>
 </div>

<script type="text/javascript">
function Edit_id(id)
{
 if(confirm('Are you sure want To Edit Your Details ?'))
 {
  window.location.href='adminEdit.php?sendId='+id;
 }
}
</script>
 <?php
if(isset($_GET['var'])) {
   echo '<script language="javascript">';
    echo 'alert("Two passwords are not matched")';
    echo '</script>';
} else {
   
}
  ?>

</body><br>
<?php
 include('footer.php');
?> 
</html>


	<?php
	$Id = $_GET['id'];


?>
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





<!-- body style/ table margin -->

<style>


.tablecontent
{
	margin-left:20em;
	margin-left:20em;
	margin-top:7em;
	margin-bottom:10em;
	
}
 body {
	background-image:url(images/body.jpg);

}


.border
{
    width: 125px;
    height: 100px;
    border : 3px solid rgb(229, 255, 255);
}

.profile {
  border-radius: 50%;
  
  bottom: 100%;
  left: 25px;
  z-index: 1;
  max-width: 90px;
  opacity: 1;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
}

</style>

<!-- end of the body style -->



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



 


<!-- Search key-->

<div id ="tcontent" style="padding-bottom:20px;padding-left:150px;padding-right:50px;border:">


<div id="leftcontent" align="left" style="margin:15px;width:250px;padding-right:5px">
  <!--links-->
   
    <?php
                                                                               include("database_connect.php");
                                                                               if(mysqli_connect_errno()){
                                                                                   echo "failed to connect to MySQL.".mysqli_connect_error();
                                                                                   }
 $sqlGetData="Select * from register where id=".$Id;
                                                                                   $result=mysqli_query($con,$sqlGetData);
                                                                                  
                                                                               
                                                                                while($row=mysqli_fetch_array($result)){?>
     <img src="<?php echo $row['Image']; ?>" alt="profile-sample5" class="profile" />
    
    <?php }?>
    <p> </p>
    <p> </p>
    <ul class="nav nav-tabs nav-stacked">
    <li><a data-toggle="tab" href="#userProfile">Profile</a></li>
    <li class="active"><a data-toggle="tab" href="#userProfile_post.php">Post</a></li>
    
  </ul>
    
    
    
    
    
    
    
    
    
</div>
    <!--link details-->
    <div id="rightcontent" align="left" style="margin:-174px 15px 15px;width:730px;padding-left:300px">
    
  <div class="tab-content">
    <div id="Profile" class="tab-pane fade in active">
    
      <?php
                                                                               include("database_connect.php");
                                                                               if(mysqli_connect_errno()){
                                                                                   echo "failed to connect to MySQL.".mysqli_connect_error();
                                                                                   }
 $sqlGetData="Select * from register where id=".$Id;
                                                                                   $result=mysqli_query($con,$sqlGetData);
                                                                                  
                                                                               
                                                                                while($row=mysqli_fetch_array($result)){?>
    <div class="row" style="width:785px">
    <table>
    <tr>
    <td style="width:90%">
      <h3><?php echo $row['fname']." ".$row['lname']; ?></h3></td>
      <td style="padding-left:100px;width:10%"><a href="editUserProfile.php?id=<?=$row["id"]?>"><button type="submit" class="btn btn-primary" name="btn-signup" value="submit" ><img name="edit" src="images/edit.png" width="25" height="25"/></button></a></td>
      </tr>
      </table>
   </div>   
      <div id="userprofile" style="padding-left:40px;padding-top:10px">
      <div style="padding:30px;background:#FFFFFF;width:730px">
    <table style="width:730px">
    <tr>
    <td style="padding-right:70px"><label for="cat">Category</label></td>
     <td><label for="cat"><?php echo $row['category'];?> </label></td>
     </tr>
     <tr>
     <td><p> </p>  </td>
     <td> <p> </p> </td>
      </tr>
     
      <tr>
    <td style="padding-right:70px"><label for="uid">University ID</label></td>
     <td><label for="uid"><?php echo $row['universityID'];?> </label></td>
     </tr>
     <tr> 
     <td><p> </p>  </td>
     <td> <p> </p> </td>
     </tr>
     
      <tr>
    <td style="padding-right:70px"><label for="em">Email</label></td>
     <td><label for="em"><?php echo $row['emil'];?> </label></td>
     </tr>
     <tr>
     <td><p> </p>  </td>
     <td><p> </p>  </td>
      </tr>
     
      <tr>
    <td style="padding-right:70px"><label for="gen">Gender</label></td>
     <td><label for="gen"><?php echo $row['gender'];?> </label></td>
     </tr>
     <tr> 
     <td><p> </p>  </td>
     <td> <p> </p> </td>
     </tr>
     
      <tr>
    <td style="padding-right:70px"><label for="ad">Adress</label></td>
     <td><label for="ad"><?php echo $row['address'];?> </label></td>
     </tr>
     <tr> 
     <td> <p> </p> </td>
     <td> <p> </p> </td>
     </tr>
     
      <tr>
    <td style="padding-right:70px"><label for="con">Contact</label></td>
     <td><label for="con"><?php echo $row['contact'];?> </label></td>
     </tr>
     <tr>
     <td> <p> </p> </td>
     <td> <p> </p> </td>
      </tr>
     </table>
     </div>
     </div>
      </div>
      
      
      
      
      <?php } ?>
    </div>
  
    
  </div>
   </div>
 </div>
 
 
 
 
 
 
 
 
 
 
 
 
 
 <footer>
<div class="container-fluid footer">
     <div class="container">
          <div class="col-md-4" align="center">
            <img src="images/logo.png" class="img img-responsive footerimg"  />
          </div>
           <div class="col-md-4" align="center">
           <h6> CONTACT CURTIN </h6>
           <br />
           <p>
           <b>General enquiries</b>	 <br />
		   Telephone: +61 8 9266 9266	 <br />
		   Fax: +61 8 9266 3131	 <br />
           <br /><br/>
            <b>Address</b>	 <br />
			Kent Street, <br /> Bentley, <br /> Perth <br />
			Western Australia 6102
            </p>
          </div>
           <div class="col-md-4" align="center">
           <p><b>LOCATIONS</b>	<br /> <br />
			Bentley (main campus)	 <br />
			Other WA campuses	 <br />
			Curtin University Sydney	 <br />
			Curtin Sarawak	 <br />
			Curtin Singapore	 <br />
			</p>
          </div>
        
     </div>
 </div>
 </footer>

</body>
</html>
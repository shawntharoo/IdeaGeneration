

	<?php
	include("database_connect.php");
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
 
 



<div id ="tcontent" style="padding-bottom:20px;padding-left:150px;padding-right:50px;">


<div id="leftcontent" align="left" style="margin:15px;width:250px;padding-right:5px">
                                                                                <!--profile pic and two links-->
   
                                                                               <?php
                                                                               include("database_connect.php");
                                                                               if(mysqli_connect_errno()){
                                                                                   echo "failed to connect to MySQL.".mysqli_connect_error();
                                                                                   }
                                                                                   $sqlGetData="Select * from register where id=".$Id;
                                                                                   $result=mysqli_query($con,$sqlGetData);
                                                                                  
                                                                               
                                                                                while($row=mysqli_fetch_array($result)){?>
                                                                                 <img src="<?php echo $row['Image']; ?>" class="img-circle person" alt="profile-sample5" style="padding-left: 20px"/>
    
                                                                                <?php }?>
                                                                                     <p> </p>
                                                                                     <p> </p>
                                                                                    
                                                                                    <div class="col-3">
                                                                                             <a href="userProfile.php?id=<?=$Id?>" class="btn btn-info" role="button" style="width:200px;background-color: #009900">Profile</a>
                                                                                           <a href="#post" class="btn btn-info" role="button" style="width:200px;background-color: #1aff1a">Post</a>
                                                                                           
                                                                                    </div>
    
        
                    </div>

 
<div id="rightcontent" align="left" style="margin:-174px 15px 15px;width:730px;padding-left:300px">
    
  		<div class="tab-content">
    				<div id="Profile" class="tab-pane fade in active">
    
     
      																			<?php
                                                                               
                                                                               if(mysqli_connect_errno()){
                                                                                   echo "failed to connect to MySQL.".mysqli_connect_error();
                                                                                   }
 																				   $sqlGetData="Select * from register where id=".$Id;
                                                                                   $result=mysqli_query($con,$sqlGetData);
                                                                                  
                                                                               
                                                                                while($row=mysqli_fetch_array($result)){?>
  
   					</div>   
     				<div id="userprofile" style="padding-left:40px;padding-top:10px">
      							<div style="padding:30px;background:#FFFFFF;width:785px">
                                
                                <!--load the edit form -->
      									<form name="form3"  method="POST" action="editUserProfile_form.php">
     
    										<table style="width:750px">
    										<tr>
    										<td style="padding-right:60px"><label for="cat">First Name</label></td>
     										<td> <input type="text" class="form-control" name="fname" value="<?php echo $row['fname'];?>"></td>
     										</tr>
     										<tr>
     										<td><p> </p>  </td>
     										<td>  <input type="hidden" value="<?php echo $Id;?>" name="idd" /></td>
      										</tr>
      
        									<tr>
    										<td style="padding-right:60px"><label for="cat">Last Name</label></td>
     										<td><input type="text" class="form-control" name="lname" value="<?php echo $row['lname'];?>"></td>
     										</tr>
     										<tr>
     										<td><p> </p>  </td>
     										<td> <p> </p> </td>
      										</tr>
      
    
    										<tr>
    										<td style="padding-right:60px"><label for="cat">Category</label></td>
     										<td><input type="text" class="form-control" name="cat" value="<?php echo $row['category'];?>"></td>
     										</tr>
     										<tr>
     										<td><p> </p>  </td>
     										<td> <p> </p> </td>
      										</tr>
     
      										<tr>
    										<td style="padding-right:60px"><label for="uid">University ID</label></td>
     										<td><input type="text" class="form-control" name="uid" value="<?php echo $row['universityID'];?>"></td>
     										</tr>
     										<tr> 
     										<td><p> </p>  </td>
     										<td> <p> </p> </td>
     										</tr>
     
      										<tr>
    										<td style="padding-right:60px"><label for="em">Email</label></td>
     										<td><input type="text" class="form-control" name="email" value="<?php echo $row['emil'];?>"></td>
     										</tr>
     										<tr>
     										<td><p> </p>  </td>
     										<td><p> </p>  </td>
      										</tr>
     
      										<tr>
    										<td style="padding-right:60px"><label for="gen">Gender</label></td>
     										<td><input type="text" class="form-control" name="gender" value="<?php echo $row['gender'];?>"></td>
     										</tr>
     										<tr> 
     										<td><p> </p>  </td>
     										<td> <p> </p> </td>
     										</tr>
     
      										<tr>
    										<td style="padding-right:60px"><label for="ad">Address</label></td>
     										<td><input type="text" class="form-control" name="add" value="<?php echo $row['address'];?>"></td>
     										</tr>
     										<tr> 
     										<td> <p> </p> </td>
     										<td> <p> </p> </td>
     										</tr>
     
      										<tr>
    										<td style="padding-right:60px"><label for="con">Contact</label></td>
     										<td><input type="text" class="form-control" name="con" value="<?php echo $row['contact'];?>"></td>
     										</tr>
     										<tr>
     										<td> <p> </p> </td>
    
     										<td align="right" style="padding-top:5px">
     
     										<input type="submit" class="cansel" name="Cansel" value="Cansal" style="background:#cc0000;border-radius: 12px;width:90px;height:40px" >
     										<label style="width:5px">  </label>
     										<input type="submit" class="save" name="save" value="save" style="background:#008000;border-radius: 12px;width:90px;height:40px"></td>
      										</tr>
     										</table>
     									</form>
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
<?php
  session_start();
  $userNo = $_SESSION['userid'] ;
  
  
  

?>
<!--catch the user id-->
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
<?php 
include("database_connect.php");
$sqll="Select * from register where id=".$userNo;
$result222=mysqli_query($con,$sqll);
while($row222=mysqli_fetch_array($result222)){
if($row222['category']=='Operator'){

?>


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



 <?php  } }?>


<!-- Search key-->

<div class="container" id ="tcontent" style="padding-bottom:20px;padding-left:20px;padding-right:20px; margin-left:10px;margin-right:10px;">

                  <div class="row">
		                <div class="col-md-3" id="leftcontent"  style="margin:15px;padding-right:10px;" >
 			                                                                          <!--profile pic and two links-->
   
    																			                                     <?php
                                                                               include("database_connect.php");
                                                                               if(mysqli_connect_errno()){
                                                                                   echo "failed to connect to MySQL.".mysqli_connect_error();
                                                                                   }
                                                                                   $sqlGetData="Select * from register where id=".$Id;
                                                                                   $result=mysqli_query($con,$sqlGetData);
                                                                                  
                                                                               
                                                                                while($row=mysqli_fetch_array($result)){?>
                                                                                 <img src="<?php echo $row['Image']; ?>" class="img-circle person" alt="profile-sample5" style="padding-left: 20px; align:center;"/>
    
                                                                                <?php }?>
                                             																				 <p> </p>
                                             																				 <p> </p>

                                                                                    
                                                                                  <div class="col-3">
                                                                                           <a href="#Profile" class="btn btn-info" role="button" style="width:240px;background-color: #1aff1a">Profile</a>
                                                                                           <a href="userProfile_post.php?id=<?=$Id?>" class="btn btn-info" role="button" style="width:240px;background-color: #009900">Post</a>
                                                                                           <a href="gameHome.php" class="btn btn-info" role="button" style="width:240px;background-color: #009900">My Games</a>
                                                                                            <a href="leaderboard.php" class="btn btn-info" role="button" style="width:240px;background-color: #009900">Leader Board</a>
                                                                                            <a href="userHistory.php?id=" class="btn btn-info" role="button" style="width:240px;background-color: #009900">History</a>

                                                                                  </div>
                          
               

      
                    <div id="countpro" style="padding-top:10px; margin-left:0px;">

                      <div style="background:#FFFFFF;width:240px">
                        <a id="about" class="btn btn-info" role="button" style="background-color: #009900; width:240px; font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;">USER ACTIVITIES</a>
                        <div id="aboutdiv" class="countdetails" style="background-color: #009900;">
                          <?php include("countUsrActi.php"); //User actions count file?>
                          <table style=" color:#FFF; margin-top: 0px; font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;">
                            <tr>
                              <td style="padding-left:20px; padding:10px;">SUBMISSIONS</td>
                              <td style="padding-left:50px; padding:10px;"><?php echo "$submissions[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px; padding:10px;">IMPROVEMENTS</td>
                              <td style="padding-left:50px; padding:10px;"><?php echo "$improvements[0]<br>"; ?></td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px; padding:10px;">COMMENTS</td>
                              <td style="padding-left:50px; padding:10px;"><?php echo "$comments[0]<br>"; ?></td>
                            </tr>
                          </table>

                                                                                           
                        </div>
                      </div>

                      <div>
                           <?php
                              include("userprofilereward.php");
                            ?>
 
                      </div>
                  </div>
             
   
                   </div>
    <!--link details-->
            <div class="col-md-6" id="rightcontent"  style="margin:15px 15px 15px;padding-left:5px;" >
    
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
                                                                          								<?php 
                                                                                          $sql="Select * from register where id=".$userNo;
                                                                                         
                                                                                          $result22=mysqli_query($con,$sql);
                                                                                          while($row22=mysqli_fetch_array($result22)){
                                                                                         if($row22['category']!='Operator'){

                                                                                          ?>


                                                                                          <td style="padding-left:100px;width:10%"><a href="editUserProfile.php?id=<?=$row["id"]?>"><img name="jsbutton" src="images/edit.png" width="25" height="25" border="0" alt="javascript button"></a></td>

                                                                                          <?php }} ?>
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
                                                                                    <?php } ?>
      				             </div>
      
                        
 
      
      
    		         </div>

          
             </div>
            </div> 
             <!--  <?php
                //include("userprofilereward.php");
               ?>-->
 
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
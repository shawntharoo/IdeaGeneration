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
  <div class="container-fluid header">
       <div class="row headerrow">
          <div class="col-md-4">
            <img src="images/logo.png" class="img img-responsive"/>
          </div>
          <div class="col-md-2">
          
                      </div>
           <div class="col-md-2">
             
          </div>
          <div class="col-md-1">
             
          </div>
            <div class="col-md-1">
                 <?php 
	   if(!isset($_SESSION))
	   {
		   session_start();
	   }
		if(isset($_SESSION["name"])&&$_SESSION["level"]=='Operator')
		{
			?>
          <a class="btn btn-danger btndanger" href="adminPanel.php">Admin</a>
           <?php
		}
		?>
          
                      </div>
           <div class="col-md-2">
            <?php 
	   if(!isset($_SESSION))
	   {
		   session_start();
	   }
		if(!isset($_SESSION["name"]))
		{
			?>
          <a class="btn btn-success" href="login.php">Login</a>
           <?php
		}else{
			?>
             <a class="btn btn-success" href="logout.php">Logout</a>
                   <?php
		}
		?>
          </div>
          
          
       </div>
       <div class="row textrow">
         <h1 class="text1">SHARE YOUR IDEA WITH US</h1>
       </div>
        <div class="row textrow">
         <h3 class="text2">WHAT YOU SAY WILL MAKE A DIFFERENCE</h3>
       </div>
        <div class="row textrow">
                    <?php 
	   if(!isset($_SESSION))
	   {
		   session_start();
	   }
		if(!isset($_SESSION["name"]))
		{
			?>
           <a href="register.php"><button class="submitidea ">Get Started</button></a>
           <?php
		}else{
			?>
            <a href="#"><button class="submitidea" >Welcome <?php echo " ".$_SESSION["name"] ?></button></a>
                   <?php
		}
		?>
        
       </div>
        <div class="row textrow">
         over 1000+ student use ideapool
       </div>
  </div>
  <div class="container-fluid ">
        <div class="container section2">
            <div class="col-md-6">
              <div class="row">
              <h1>THE EASIEST WAY </h1>
             <h1> TO SHARE YOUR IDEAS</h1>
                <hr/>
              </div>
              <div class="row">
                         <?php 
	   if(!isset($_SESSION))
	   {
		   session_start();
	   }
		if(!isset($_SESSION["name"]))
		{
			?>
           <a><button class="submitidea" data-toggle="tooltip" data-placement="bottom" title="Please Register">SUBMIT IDEA</button></a>
          
            
           <?php
		    
		}else{
			?>
              <a href="postSubmission.php"><button class="submitidea">SUBMIT IDEA</button></a>
              <a href="view4.php"><button class="submitidea">VIEW IDEAS</button></a>
                   <?php
		}
		?>
             
              <hr />
              </div>
              <div class="row">
                Let's Start <i class="fa fa-arrow-circle-right"></i><a class="signup" href="register.php"> SIGN UP</a>
              </div>
            </div>
            <div class="col-md-6 centerimg">
              <img src="images/brain.jpg"  class="img img-responsive " width="300px" height="300px"/>
            </div>
        </div>
  </div>
   
   <div class="container-fluid section3">
       <div class="container section3container">
       <div class="col-md-3 box">
          <div class="row greenboxx">
            <h2>RECENT IDEAS</h2>
          </div>
          <div class="row greenbox">
           <img src="images/user2.jpg" width="60px" height="60px" class="img-responsive boximg" />
          </div>
          <div class="row greenboxx">
           <h3>Student Affairs</h3>
          </div>
          <div class="row description">
         <p> akvnkdnoendnneknnnlanl;cncnscon</p>
          <p> nnnrndknknkdnvknkkvndkndkvnknk</p>
          <p> dkvnkvnkvnkvnkvnvknkndkvnddnvk</p>
          <p> dvndvndvndknvvnvndkvndknbdkkdn</p>
          </div>
       </div>




















<!--Start From Here -->

<script src="//static.miniclipcdn.com/js/game-embed.js"></script>
<?php
include("database_connect.php");

if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
?>
<br/>
 <div class="col-md-3">
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
<div class="miniclip-game-embed" data-game-name="thunderbirds" data-theme="0" data-width="350" data-height="400" data-language="en"><a href="http://www.miniclip.com/games/thunderbirds/">Play Thunderbirds Are Go: Team Rush</a></div>
 <?php } else if($Available2 == 1){ ?>
 <div class="miniclip-game-embed" data-game-name="free-running-2" data-theme="0" data-width="350" data-height="400" data-language="en"><a href="http://www.miniclip.com/games/free-running-2/">Play Free Running 2</a></div><br/>
  <?php } else if($Available3 == 1){?>
  <div class="miniclip-game-embed" data-game-name="8-ball-pool-multiplayer" data-theme="0" data-width="350" data-height="400" data-language="en"><a href="http://www.miniclip.com/games/8-ball-pool-multiplayer/">Play 8 Ball Pool</a></div><br/>
 <?php } else if($Available4 == 1){?>
<div class="miniclip-game-embed" data-game-name="basketball-stars" data-theme="0" data-width="350" data-height="400" data-language="en"><a href="http://www.miniclip.com/games/basketball-stars/">Play Basketball Stars</a></div><br/>
<?php } else if($Available5 == 1){?>
<div class="miniclip-game-embed" data-game-name="big-snow-tricks" data-theme="0" data-width="350" data-height="400" data-language="en"><a href="http://www.miniclip.com/games/big-snow-tricks/">Play Big Snow Tricks</a></div><br/>
<?php } else if($Available6 == 1){?>
<div class="miniclip-game-embed" data-game-name="bow-master-japan" data-theme="0" data-width="350" data-height="400" data-language="en"><a href="http://www.miniclip.com/games/bow-master-japan/">Play Bow Master Japan</a></div><br/>
<?php } else{?>
  <img class="media-object" src="images/under-construction-20-19.jpg" height="250px" width="300px" align="middle">
<?php } ?>
</div>
<!--End Here -->
























         <div class="col-md-3 box">
          <div class="row greenboxx">
            <h2>TOP VOTES</h2>
          </div>
          <div class="row greenbox">
           <img src="images/user2.jpg" width="60px" height="60px" class="img-responsive boximg" />
          </div>
          <div class="row greenboxx">
           <h3>Student Affairs</h3>
          </div>
          <div class="row description">
         <p> akvnkdnoendnneknnnlanl;cncnscon</p>
          <p> nnnrndknknkdnvknkkvndkndkvnknk</p>
          <p> dkvnkvnkvnkvnkvnvknkndkvnddnvk</p>
          <p> dvndvndvndknvvnvndkvndknbdkkdn</p>
          </div>
       </div>
       
       
   </div>
   
  <div class="container section3container">
       		<div class="col-md-4">
            	<img src="images/sec4.1.png" height="200px" width="200px" class="section4size"/>
            </div>
            <div class="col-md-4">
            	<img src="images/sec4.2.png" height="200px" width="200px" class="section4size"/>
            </div>
            <div class="col-md-4">
            	<img src="images/sec4.3.png" height="200px" width="200px" class="section4size" />
            </div>
       
       </div>
    </div>
    
    
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
  </div>

  
</body>
</html>
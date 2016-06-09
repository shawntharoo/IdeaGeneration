<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="css/bootstrap.min.css"></link>
 <link rel="stylesheet" href="css/ideacss.css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
 <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>


  <style>

@keyframes slidy {
0% { left: 0%; }
20% { left: 0%; }
25% { left: -100%; }
45% { left: -100%; }
50% { left: -200%; }
70% { left: -200%; }
75% { left: -300%; }
95% { left: -300%; }
100% { left: -400%; }
}

body { margin: 0; } 
div#slider { overflow: hidden; }
div#slider figure img { width: 20%; float: left; }
div#slider figure { 
  position: relative;
  width: 500%;
  margin: 0;
  left: 0;
  text-align: left;
  font-size: 0;
  animation: 15s slidy infinite; 
}






.image2 { 
   position: relative; 
   width: 100%; /* for IE 6 */
}









 #slideshow { 
    margin: 50px auto; 
    position: relative; 
    width: 240px; 
    height: 240px; 
    padding: 10px; 
    box-shadow: 0 0 20px rgba(0,0,0,0.4); 
}

#slideshow > div { 
    position: absolute; 
    top: 10px; 
    left: 10px; 
    right: 10px; 
    bottom: 10px; 
}


* {
  margin: 0; 
  padding: 0;
}
body {
   background-image:url(../images/body.jpg);
  font-family: arial, verdana, tahoma;
}

/*Time to apply widths for accordian to work
Width of image = 640px
total images = 5
so width of hovered image = 640px
width of un-hovered image = 40px - you can set this to anything
so total container width = 640 + 40*4 = 800px;
default width = 800/5 = 160px;
*/

.accordian {
  width: 805px; height: 320px;
  overflow: hidden;
  
  /*Time for some styling*/
  margin: 5px auto;
  box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
  -webkit-box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
  -moz-box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.35);
}

/*A small hack to prevent flickering on some browsers*/
.accordian ul {
  width: 2000px;
  /*This will give ample space to the last item to move
  instead of falling down/flickering during hovers.*/
}

.accordian li {
  position: relative;
  display: block;
  width: 160px;
  float: left;
  
  border-left: 1px solid #888;
  
  box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);
  -webkit-box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);
  -moz-box-shadow: 0 0 25px 10px rgba(0, 0, 0, 0.5);
  
  /*Transitions to give animation effect*/
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  /*If you hover on the images now you should be able to 
  see the basic accordian*/
}

/*Reduce with of un-hovered elements*/
.accordian ul:hover li {width: 40px;}
/*Lets apply hover effects now*/
/*The LI hover style should override the UL hover style*/
.accordian ul li:hover {width: 640px;}


.accordian li img {
  display: block;
}


/*Image title styles*/
.image_title {
  background: rgba(0, 0, 0, 0.5);
  position: absolute;
  left: 0; bottom: 0; 
width: 640px; 
min-height: 110px;

}
.image_title a {
  display: block;
  color: #fff;
  text-decoration: none;
  padding: 20px;
  font-size: 16px;
  min-height: 110px;
}
  </style>

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

         <div class="row">
        <a href="indexGame.php"><img src="images/game_icon.png" height="50px" width="70px"></a>
        </div>
         <div class="row games">
         Free Games
       </div>

  </div>

</div>










 <div class="col-md-20 box" style="background-color : transparent">
      
<div class="row " style="min-height: 300px;padding-left: 50px">
<table> 
<th style="padding-left: 90px">
<td style="padding-left: 80px ;padding-right: 10px;min-width: 200px"><h3 style="color: red">Best Award Winners</h3>

                <div id="slider">
                      <figure>


                      <?php 
                                                                 include("database_connect.php");
                                                                 if(mysqli_connect_errno()){
                                                                 echo "failed to connect to MySQL.".mysqli_connect_error();
                                                                }
                                                                $k=3;

                                                              $sqlGetData="Select * FROM register WHERE reward=".$k;
                                                             $result=mysqli_query($con,$sqlGetData);
                                                             while($row=mysqli_fetch_array($result)){
                      ?>
                      <div class="image2">
                      <img src="<?php echo $row['Image']; ?>" height="150px" width="100px"/>
                      <h2 style="position: absolute;top: 200px; left: 0;  width: 100%;  "><?php echo $row['fname']; ?></h2>


                      </div>
                      <?php }  ?>
                      </figure>
                </div>
                </td>
<td style="padding-left: 10px">
          
            <div class="col-md-12" style="padding-left: 180px">
              <div class="row">
              <marquee behavior="slide" direction="left">

              <h1 style="padding-left: 100px">THE EASIEST WAY </h1></marquee>
               <marquee behavior="slide" direction="left">
             <h1 style="padding-left: 30px"> TO SHARE YOUR IDEAS</h1></marquee>
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
           <marquee behavior="slide" direction="left"> <a style="padding-left: 150px"><button class="submitidea" data-toggle="tooltip" data-placement="bottom" title="Please Register">SUBMIT IDEA</button></a></marquee>
              
          
            
           <?php
        
    }else{
      ?><marquee behavior="slide" direction="left"> 
              <a href="postSubmission.php"><button class="submitidea">SUBMIT IDEA</button></a>
              <a href="view4.php"><button class="submitidea">VIEW IDEAS</button></a></marquee>
                   <?php
    }
    ?>
             
             
                  
              </div>
          
            </div>
   
</td>


</th>
</table>

     
 


    </div>
  </div>











       <div class="col-md-20 box" style="background-color : transparent">
          <div class="row greenboxx">
            <h2 style="color: red">TOP VOTES</h2>
          </div>
         
          <div class="row description" style="min-height: 300px">
          <div class="accordian" style="width: 1250px">
                                            <?php 
                                           include("database_connect.php");
                                           if(mysqli_connect_errno()){
                                           echo "failed to connect to MySQL.".mysqli_connect_error();
                                          }
                                          $i=0;

                                        $sqlGetData="Select postId,dateTime,faculty,department,category,title,content,views,files FROM votes AS C JOIN post AS p ON C.submissionId=p.postId WHERE voteType='Upvote' GROUP BY p.postId ORDER BY SUM(C.weight) DESC";
                                       $result=mysqli_query($con,$sqlGetData);
                                       while($row=mysqli_fetch_array($result)){
                                        if($i<6){
?>


    <ul>
    <li>
    <div class="image_title">
        <a href="#"><h1><?php echo $row['title'];?></h1></a>
        <a href="#"><?php echo $row['content'];?></a>

        <div class="col-md-4 departments" style="min-width: 800px;padding-left: 7px"> 
                                                                                                <table style="color: #1aa3ff">
                                                                                                <tr>
                                                                                                <td style="padding-left: 7px"><h5><?php echo $row['faculty'];?></h5></td></td>
                                                                                                <td style="padding-left: 58px"><h5><?php echo $row['department'];?></h5></td>
                                                                                                <td style="padding-left: 58px"><h5><?php echo $row['category'];?></h5></td>
                                                                                                <td style="padding-left: 58px"><h5><?php echo $row['dateTime'];?></h5></td>
                                                                                                </tr>
                                                                                                </table>  
                                                                                                </div>

                                                                                                <table style="color:  #A8A8A8 ">
                                                                                                <tr>
                                                                                                <td><h6 style="padding-left: 100px"><?php echo $row['views'];?> Views</h6></td>
                                                                                                <?php
                                                                                                $pid=$row['postId'];

                                                                                                $sql2="select COUNT(*) AS comments FROM comment AS C JOIN register AS R ON C.userId=R.id WHERE C.submissionId='$pid' ORDER BY C.date desc";

                                                                                                $sql3="select COUNT(*) AS upvote FROM votes AS C JOIN post AS p ON C.submissionId=p.postId WHERE C.submissionId='$pid' and voteType='Upvote' ";
                                                                                                $sql5="select SUM(weight) AS weight FROM votes AS C JOIN post AS p ON C.submissionId=p.postId WHERE C.submissionId='$pid' and voteType='Upvote' ";

                                                                                                $sql4="select COUNT(*) AS downvote FROM votes AS C JOIN post AS p ON C.submissionId=p.postId WHERE C.submissionId='$pid' and voteType='Downvote' ";

                                                                                                $sql6="select SUM(weight) AS weightd FROM votes AS C JOIN post AS p ON C.submissionId=p.postId WHERE C.submissionId='$pid' and voteType='Downvote' ";
                                                                                                    
                                                                                                    $result2=mysqli_query($con,$sql2);
                                                                                                    $result3=mysqli_query($con,$sql3);
                                                                                                    $result4=mysqli_query($con,$sql4);
                                                                                                    $result5=mysqli_query($con,$sql5);
                                                                                                    $result6=mysqli_query($con,$sql6);
                                                                                                    if (!$result2) {
                                                                                                          printf("Error: %s\n", mysqli_error($con));
                                                                                                          exit();
                                                                                                      }
                                                                                            
                                                                                                    while($row2= mysqli_fetch_array($result2))
                                                                                                    {

                                                                                            
                                                                                                      ?>

                                                                                                      <td style="padding-left: 25px"><h6><?php echo $row2['comments'];?> Comment</h6></td>

                                                                                                       <?php }
                                                                                                        while($row3= mysqli_fetch_array($result3))
                                                                                                    {

                                                                                            
                                                                                                      ?>


                                                                                                      <td style="padding-left: 25px"><h6><?php echo $row3['upvote'];?> Upvotes</h6></td>

                                                                                                      <?php }
                                                                                                      while($row5= mysqli_fetch_array($result5))
                                                                                                    {
                                                                                                      $w=$row5['weight'];
                                                                                                      if($w<1){
                                                                                                        $w=0;
                                                                                                      }

                                                                                                         ?>

                                                                                                         <td style="padding-left: 25px"><h6><?php echo $w ;?> Upvote Weight</h6></td>


                                                                                                      <?php  }

                                                                                                        while($row4= mysqli_fetch_array($result4))
                                                                                                    {

                                                                                            
                                                                                                      ?>

                                                                                                      <td style="padding-left: 25px"><h6><?php echo $row4['downvote'];?> Downvotes</h6></td>

                                                                                                      <?php } 

                                                                                                       while($row6= mysqli_fetch_array($result6))
                                                                                                    {
                                                                                                      $dw=$row6['weightd'];
                                                                                                      if($dw<1){
                                                                                                        $dw=0;

                                                                                                      }


                                                                                                      ?>

                                                                                                      <td style="padding-left: 25px"><h6><?php echo $dw ;?> Downvote Weight</h6></td>

                                                                                                      <?php }



                                                                                                      ?>
                                                                                                      </tr>
                                                                                                      </table>










    </div>
      <a href="#">
       <?php
        $img=$row["files"];
         if(file_exists($img)&&strcmp($img,"images/")!=0)
          {
           ?>

     
      <img src=<?= $row["files"]?> width="1000" height="300" />
      <?php } else{?>
        <img src="images/brain.jpg" width="1000" height="300" />
      <?php } ?>
      

       </a>
    </li>
  </ul>
      

                                <?php

                                     }
                                     $i=$i+1;

                               }

                                  ?>

         </div>

        </div>
       </div>






















           
<div class="col-md-20 box" style="background-color : transparent">
    <div class="row greenboxx">
            <h2 style="color: red">RECENT IDEAS</h2>
     </div>
         
     <div class="row description" style="min-height: 300px">
        <div class="accordian" style="width: 1250px">
                                            <?php 
                                             include("database_connect.php");
                                             if(mysqli_connect_errno()){
                                             echo "failed to connect to MySQL.".mysqli_connect_error();
                                             }
                                             $i=0;

                                             $sqlGetData="Select postId,dateTime,faculty,department,category,title,content,views,files FROM votes AS C JOIN post AS p ON C.submissionId=p.postId GROUP BY p.postId ORDER BY MAX(p.dateTime) DESC";
                                             $result=mysqli_query($con,$sqlGetData);
                                             while($row=mysqli_fetch_array($result)){
                                             if($i<6){
                                             ?>


    <ul>
    <li>
    <div class="image_title">
        <a href="#"><h1><?php echo $row['title'];?></h1></a>
        <a href="#"><?php echo $row['content'];?></a>

                                                                                                <div class="col-md-4 departments" style="min-width: 800px;padding-left: 7px"> 
                                                                                                <table style="color: #1aa3ff">
                                                                                                <tr>
                                                                                                <td style="padding-left: 7px"><h5><?php echo $row['faculty'];?></h5></td></td>
                                                                                                <td style="padding-left: 58px"><h5><?php echo $row['department'];?></h5></td>
                                                                                                <td style="padding-left: 58px"><h5><?php echo $row['category'];?></h5></td>
                                                                                                <td style="padding-left: 58px"><h5><?php echo $row['dateTime'];?></h5></td>
                                                                                                </tr>
                                                                                                </table>  
                                                                                                </div>

                                                                                                <table style="color:  #A8A8A8 ">
                                                                                                <tr>
                                                                                                <td><h6 style="padding-left: 100px"><?php echo $row['views'];?> Views</h6></td>
                                                                                                <?php
                                                                                                $pid=$row['postId'];

                                                                                                $sql2="select COUNT(*) AS comments FROM comment AS C JOIN register AS R ON C.userId=R.id WHERE C.submissionId='$pid' ORDER BY C.date desc";

                                                                                                $sql3="select COUNT(*) AS upvote FROM votes AS C JOIN post AS p ON C.submissionId=p.postId WHERE C.submissionId='$pid' and voteType='Upvote' ";
                                                                                                $sql5="select SUM(weight) AS weight FROM votes AS C JOIN post AS p ON C.submissionId=p.postId WHERE C.submissionId='$pid' and voteType='Upvote' ";

                                                                                                $sql4="select COUNT(*) AS downvote FROM votes AS C JOIN post AS p ON C.submissionId=p.postId WHERE C.submissionId='$pid' and voteType='Downvote' ";

                                                                                                $sql6="select SUM(weight) AS weightd FROM votes AS C JOIN post AS p ON C.submissionId=p.postId WHERE C.submissionId='$pid' and voteType='Downvote' ";
                                                                                                    
                                                                                                    $result2=mysqli_query($con,$sql2);
                                                                                                    $result3=mysqli_query($con,$sql3);
                                                                                                    $result4=mysqli_query($con,$sql4);
                                                                                                    $result5=mysqli_query($con,$sql5);
                                                                                                    $result6=mysqli_query($con,$sql6);
                                                                                                    if (!$result2) {
                                                                                                          printf("Error: %s\n", mysqli_error($con));
                                                                                                          exit();
                                                                                                      }
                                                                                            
                                                                                                    while($row2= mysqli_fetch_array($result2))
                                                                                                    {

                                                                                            
                                                                                                      ?>

                                                                                                      <td style="padding-left: 25px"><h6><?php echo $row2['comments'];?> Comment</h6></td>

                                                                                                       <?php }
                                                                                                        while($row3= mysqli_fetch_array($result3))
                                                                                                    {

                                                                                            
                                                                                                      ?>


                                                                                                      <td style="padding-left: 25px"><h6><?php echo $row3['upvote'];?> Upvotes</h6></td>

                                                                                                      <?php }
                                                                                                      while($row5= mysqli_fetch_array($result5))
                                                                                                    {
                                                                                                      $w=$row5['weight'];
                                                                                                      if($w<1){
                                                                                                        $w=0;
                                                                                                      }

                                                                                                         ?>

                                                                                                         <td style="padding-left: 25px"><h6><?php echo $w ;?> Upvote Weight</h6></td>


                                                                                                      <?php  }

                                                                                                        while($row4= mysqli_fetch_array($result4))
                                                                                                    {

                                                                                            
                                                                                                      ?>

                                                                                                      <td style="padding-left: 25px"><h6><?php echo $row4['downvote'];?> Downvotes</h6></td>

                                                                                                      <?php } 

                                                                                                       while($row6= mysqli_fetch_array($result6))
                                                                                                    {
                                                                                                      $dw=$row6['weightd'];
                                                                                                      if($dw<1){
                                                                                                        $dw=0;

                                                                                                      }


                                                                                                      ?>

                                                                                                      <td style="padding-left: 25px"><h6><?php echo $dw ;?> Downvote Weight</h6></td>

                                                                                                      <?php }



                                                                                                      ?>
                                                                                                      </tr>
                                                                                                      </table>


    </div>
      <a href="#">
       <?php
                                                                                                   $img=$row["files"];
                                                                                                        if(file_exists($img)&&strcmp($img,"images/")!=0)
                                                                                                      {
                                                                                                          ?>

     
      <img src=<?= $row["files"]?> width="1000" height="300" />
      <?php } else{?>
      <img src="images/brain.jpg" width="1000" height="300" />
      <?php } ?>
      

      </a>
    </li>
   
  </ul>
      

                                <?php

                                     }
                                     $i=$i+1;

                               }

                                  ?>

                 </div>
            </div>
       </div>
   </div>







   
  <div class="container section3container" style="padding-left: 80px">
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
  <script type="text/javascript">
    $("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  3000);
    
  </script>
  
</body>
</html>
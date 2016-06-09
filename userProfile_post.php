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


.delupdate{
  
  width: 80px;
  height: 60px;
  margin-left: auto;
  margin-right: auto;
  border-bottom: 1px solid #999;
  border-right: 1px solid #999;
  border-left: 1px solid #999;
  border-top: 1px solid #999;
  margin-left:0px; 
  
  }


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

input[type=text] {
    width: 250px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
   
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 5px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
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


<div id ="tcontent" style="padding-bottom:20px;padding-left:150px;padding-right:50px">


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
                                                                                 <h3><?php echo $row['fname']." ".$row['lname']; ?></h3>
    
                                                                                <?php }?>
                                                                                     <p> </p>
                                                                                     <p> </p>
                                                                                    
                                                                                    <div class="col-3">
                                                                                             <a href="userProfile.php?id=<?=$Id?>" class="btn btn-info" role="button" style="width:200px;background-color: #009900">Profile</a>
                                                                                           <a href="userProfile_post.php?id=<?=$Id?>" class="btn btn-info" role="button" style="width:200px;background-color: #1aff1a">Post</a>
                                                                                      
                                                                                    </div>
    
        
                    </div>

   

    <!--link details-->
<div id="rightcontent" align="left" style="margin:-174px 15px 15px;width:730px;padding-left:300px">


 <div class="container" style="width:800px">
           





<!-- search and sort posts -->

                  <div class="row">
                      <table>
                        <tr>
                                <td style="width: 60%">
                                    <div class="row searchgroup" style="padding-left:20px;padding-bottom: 10px">
                                      <form method="post">
                                          <div class="row search_col">
                                          
                                          
                                                          
                                                    
                                                            <input type="text" class="search_text" placeholder="Search" name="searchkey3"/>
                                                            <select name="category" style="height:40px;border: 2px solid #ccc" >
                                                                <option value="searchval">Select the search category</option>
                                                                <option value="title">Title</option>
                                                                <option value="content">Content</option>
                                                                <option value="faculty">Faculty</option>
                                                                <option value="department">Department</option>
                                                                <option value="category">Category</option>
                                                                <option value="dateTime">Date</option>
                                                            </select>
                                          
                                                           <button class="search_btn" name="searchkey4" style="height:39px;width:45px"><img src="images/srch.png" width="25" height="25"/></button>
                                            </div>
                                       </form>
                                       </div>
                                </td>
                                <td style="width: 40%">
                                <form method="post">
                                                         <h5 style="padding-left: 100px">sort by
                                                         <select name="sortt" style="height:40px;border: 2px solid #ccc" >
                                                              <option value="sortval">Select</option>
                                                              <option value="dateTime">Date</option>
                                                              <option value="views">Views</option>
                                                               <option value="title">Title A-Z</option>
                                                              <option value="popularity">Popularity</option>
                                                                                                           
                                                        </select>
                                                        <button class="btn" name="sortkey" style="height:39px;width:45px"><img src="images/sort.png" width="25" height="25"/></button>
                                                        </h5>
                                                        </form>
                                </td>
                      </tr>
                    </table>
               
                                   
                    </div>
                 
                             
               </div>

<!-- end search and sort -->



<!--posts-->

    
              <div class="tab-content">
                           <div id="post" class="tab-pane fade in active">



                                                               <?php
                                                                    
                                                                 if(isset($_POST["sortkey"])){
                                                                                    
                                                                                                  $sort=$_POST["sortt"];
                                                                                                  if($sort=="sortval"){
                                                                                                      echo "<script type='text/javascript'>alert('Select the sort category')</script>"; 
                                                                                                       $sqlGetData="Select postId,dateTime,faculty,department,category,title,content,views,files from post where userId=".$Id;
                                                                                                      $result=mysqli_query($con,$sqlGetData);


                                                                                                  }else{
                                                                                                    if($sort=="title"){

                                                                                                      $sqlGetData="Select postId,dateTime,faculty,department,category,title,content,views,files from post where userId=".$Id." GROUP BY postId ORDER BY ".$sort." ASC";

                                                                                                    }elseif($sort=="popularity"){
                                                                                                      include("database_connect.php"); 
                                                                                                      $sqlGetDataa="Select postId,dateTime from post where userId=".$Id;
                                                                             
                                                                                                       $resulta=mysqli_query($con,$sqlGetDataa);

                                                                                                       while($roww=mysqli_fetch_array($resulta)){
                                                                                                        $piid=$roww['postId'];
                                                                                                        

                                                                                                       }
                                                                                                    $sqlGetData="Select postId,dateTime,faculty,department,category,title,content,views,files FROM votes AS C JOIN post AS p ON C.submissionId=p.postId WHERE voteType='Upvote' and p.userId=".$Id." GROUP BY p.postId ORDER BY SUM(C.weight) DESC";
                                                                                                   


                                                                                                    }else{
                                                                                                    $sqlGetData="Select postId,dateTime,faculty,department,category,title,content,views,files from post where userId=".$Id." GROUP BY postId ORDER BY ".$sort." DESC";
                                                                                                    }
                                                                                                    $result=mysqli_query($con,$sqlGetData);




                                                                                                  }

                                                                  }elseif(isset($_POST["searchkey4"])){
                                                                              $search= $_POST["searchkey3"];
                                                                              $cat=$_POST["category"];
                                                                              $where= $cat." like '%$search%'";

                                                                              
                                                                              
                                                                              if($cat=="searchval" && $search==NULL){
                                                                               echo "<script type='text/javascript'>alert('Enter the search key & select the search category')</script>";
                                                                               
                                                                               $sqlGetData="Select postId,dateTime,faculty,department,category,title,content,views,files from post where userId=".$Id;
                                                                               $result=mysqli_query($con,$sqlGetData);

                                                                              }else{
                                                                              
                                                                                                if($cat=="searchval"){ 
                                                                                                 
                                                                                                 echo "<script type='text/javascript'>alert('Select the search category')</script>"; 
                                                                                                 $sqlGetData="Select postId,dateTime,faculty,department,category,title,content,views,files from post where userId=".$Id;
                                                                                                 $result=mysqli_query($con,$sqlGetData);
                                                                                                  
                                                                                                 }elseif($search==NULL){
                                                                                                 echo "<script type='text/javascript'>alert('Enter the search key')</script>";
                                                                                                 $sqlGetData="Select postId,dateTime,faculty,department,category,title,content,views,files from post where userId=".$Id;
                                                                                                 $result=mysqli_query($con,$sqlGetData);
                                                                                                 }else{

                                                                                                
                                                                                               $sqlGetData="Select postId,dateTime,faculty,department,category,title,content,views,files from post where userId=$Id and ".$where;
                                                                                             
                                                                                              
                                                                             
                                                                            include("database_connect.php");    //provide database connection
                                                                            $result=mysqli_query($con,$sqlGetData);
                                                                            if (!$result) {
                                                                                        printf("Error: %s\n", mysqli_error($con)); 
                                                                                        exit();
                                                                                      }
                                                                                                                                                                              }
                                                                                                 if (mysqli_num_rows($result)==0)
                                                                                                 {
                                                                                                  ?>
                                                                                  <div style="height: 300px">
                                                                                  <?php
                                                                                                    echo "No posts Found";  
                                                                                                 }
                                                                                                 ?>
                                                                                  </div>
                                                                                  <?php

                                                                                               }
                                                                            
                                                                                                

                                                                        }else{
    
    
                                                                               include("database_connect.php");
                                                                               if(mysqli_connect_errno()){
                                                                                   echo "failed to connect to MySQL.".mysqli_connect_error();
                                                                                   }

                                                                                                  
                                                                               $sqlGetData="Select postId,dateTime,faculty,department,category,title,content,views,files from post where userId=".$Id;
                                                                             
                                                                               $result=mysqli_query($con,$sqlGetData);

                                                                                $numRows = mysqli_num_rows($result);

                                                                                if($numRows <1)
                                                                                {
                                                                                  ?>
                                                                                  <div style="height: 300px">
                                                                                  <?php
                                                                                  echo "No posts to show";

                                                                                  ?>
                                                                                  </div>
                                                                                  <?php

                                                                                }
                                                                               

                                                                             }
                                                                               while($row=mysqli_fetch_array($result)){?>

                                                                                  <div class="thumbnail" style="min-width: 800px">
                                                                                                <a href="viewidea.php?id=<?=$row["postId"]?>&comt=0"><h2 style="padding-top: -10px;padding-left: 7px;color: black"><strong><?php echo $row['title'];?></strong></h2></a>

                                                                                                 <!--Submission edit and delete links-->                                                                   
                        <div style="margin-left: 700px;margin-bottom:8px;"> 
                          <div style="margin-top:20px;">
                  <?php include("sub_EditUpdate.php"); ?>
                            </div>
                      </div>  

                                                                                                <div style="width: 700px;padding: 25px;border: 2px solid navy;margin: 25px">
                                                                                                <a href="viewidea.php?id=<?=$row["postId"]?>"><h4 style="padding-left: 35px;color: black"><?php echo $row['content'];?></h4></a>
                                                                                                <div class="row" style="padding-left: 30px">
                                                                                                   <?php
                                                                                                   $img=$row["files"];
                                                                                                        if(file_exists($img)&&strcmp($img,"images/")!=0)
                                                                                                      {
                                                                                                          ?>
                                                                                                   <a href="viewidea.php?id=<?=$row["postId"]?>"><img src=<?= $row["files"]?> width="500" height="350" class="img img-thumbnail"/></a>
                                                                                                    <?php
                                                                                                    }
                                                                                                   ?>
                                                                                                </div>
                                                                                                </div>


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

                                                                                                $sql2="SELECT COUNT(*) AS comments FROM comment AS C JOIN register AS R ON C.userId=R.id WHERE C.submissionId='$pid' ORDER BY C.date desc";

                                                                                                $sql3="SELECT COUNT(*) AS upvote FROM votes AS C JOIN post AS p ON C.submissionId=p.postId WHERE C.submissionId='$pid' and voteType='Upvote' ";
                                                                                                $sql5="SELECT SUM(weight) AS weight FROM votes AS C JOIN post AS p ON C.submissionId=p.postId WHERE C.submissionId='$pid' and voteType='Upvote' ";

                                                                                                $sql4="SELECT COUNT(*) AS downvote FROM votes AS C JOIN post AS p ON C.submissionId=p.postId WHERE C.submissionId='$pid' and voteType='Downvote' ";

                                                                                                $sql6="SELECT SUM(weight) AS weightd FROM votes AS C JOIN post AS p ON C.submissionId=p.postId WHERE C.submissionId='$pid' and voteType='Downvote' ";
                                                                                                    
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


                                                                           <?php } ?>


                                                                     

                           </div>
      
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
           <b>General enquiries</b>  <br />
       Telephone: +61 8 9266 9266  <br />
       Fax: +61 8 9266 3131  <br />
           <br /><br/>
            <b>Address</b>   <br />
      Kent Street, <br /> Bentley, <br /> Perth <br />
      Western Australia 6102
            </p>
          </div>
           <div class="col-md-4" align="center">
           <p><b>LOCATIONS</b>  <br /> <br />
      Bentley (main campus)  <br />
      Other WA campuses  <br />
      Curtin University Sydney   <br />
      Curtin Sarawak   <br />
      Curtin Singapore   <br />
      </p>
          </div>
        
     </div>
 </div>
 </footer>

</body>
</html>
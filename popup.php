<<<<<<< HEAD



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="css/ideacss.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>



<!--Closes the new window-->
<script>
function closeWin() {
    this.close(); 
}
</script>


<title>ideapool Admin Page</title>
</head>

<body>



<!-- load the selected submission details to textboxes-->
 <?php
     include("database_connect.php");
    
     if(mysqli_connect_errno()){
       echo "failed to connect to MySQL.".mysqli_connect_error();
       }
       
    if ( isset($_GET['postId'])){
      $postID = $_GET['postId'];
      echo "<script> window.postid = ".$postID." </script>";
      $result=mysqli_query($con,"Select p.postId,p.content,p.faculty,p.department from post p where p.postId='".$postID."' ");
                   if (!$result) {
                           printf("Error: %s\n", mysqli_error($con));
                           exit();
                       }
            while($row=mysqli_fetch_array($result)){?>

                    <div class="panel-body">
                                <form name="form1"  method="POST" action="popup.php">
                                       <div class="form-group">
                                            <label for="addr">Post</label>
                                            <input type="hidden" name="postid" value="<?php echo $row['postId']; ?>">
                                            <textarea class="form-control" name="post" rows="6"><?php echo $row['content'] ?></textarea>
                                        </div>
                                       
                                       <div class="form-group">
                                            <label for="fnam">Faculty</label>
                                            <input type="text" class="form-control" name="faculty" value="<?php echo $row['faculty'] ?>">
                                       </div>
                                       <div class="form-group">
                                            <label for="lnam">Department</label>
                                            <input type="text" class="form-control" name="department" value="<?php echo $row['department'] ?>">
                                       </div>
                                      
                                       <div class="row button_pad">
                                            <button type="submit" class="btn btn-danger"  name="confirm">Update</button>
                              
                                            <button type="button" class="btn btn-default" onclick="closeWin()"> Cancel</button>
                                        </div>
                                    </form>
  <?php }
        } ?>
                      </div>


<!--update the post(submission table)-->
      <?php 
                if(isset($_POST['faculty'])) {
                    
                    echo $_POST['postid'];
                    echo $_POST['faculty'];
                    echo $_POST['post'];
                    echo $_POST['department'];  
                    include('database_connect.php');
                     if(mysqli_connect_errno()){
                               echo "failed to connect to MySQL.".mysqli_connect_error();
                               }           
                    try {
                        echo "Done";
            
                       $sqluq="update post set content='".$_POST['post']."' ,faculty='".$_POST['faculty']."' ,department='".$_POST['department']."' WHERE postId='".$_POST['postid']."'";
                      
                        echo "Updated !";
                        mysqli_query($con, $sqluq);
            
                        echo "<script>window.close();</script>";
            
    

                    }
                    
                    catch(Exception $e) {
                      echo 'Message: ' .$e->getMessage();
                    }
                }
                
                
            ?>




</body>
=======



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="css/ideacss.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>



<!--Closes the new window-->
<script>
function closeWin() {
    this.close(); 
}
</script>


<title>ideapool Admin Page</title>
</head>

<body>



<!-- load the selected submission details to textboxes-->
 <?php
     include("database_connect.php");
    
     if(mysqli_connect_errno()){
       echo "failed to connect to MySQL.".mysqli_connect_error();
       }
       
    if ( isset($_GET['postId'])){
      $postID = $_GET['postId'];
      echo "<script> window.postid = ".$postID." </script>";
      $result=mysqli_query($con,"Select p.postId,p.content,p.faculty,p.department from post p where p.postId='".$postID."' ");
                   if (!$result) {
                           printf("Error: %s\n", mysqli_error($con));
                           exit();
                       }
            while($row=mysqli_fetch_array($result)){?>

                    <div class="panel-body">
                                <form name="form1"  method="POST" action="popup.php">
                                       <div class="form-group">
                                            <label for="addr">Post</label>
                                            <input type="hidden" name="postid" value="<?php echo $row['postId']; ?>">
                                            <textarea class="form-control" name="post" rows="6"><?php echo $row['content'] ?></textarea>
                                        </div>
                                       
                                       <div class="form-group">
                                            <label for="fnam">Faculty</label>
                                            <input type="text" class="form-control" name="faculty" value="<?php echo $row['faculty'] ?>">
                                       </div>
                                       <div class="form-group">
                                            <label for="lnam">Department</label>
                                            <input type="text" class="form-control" name="department" value="<?php echo $row['department'] ?>">
                                       </div>
                                      
                                       <div class="row button_pad">
                                            <button type="submit" class="btn btn-danger"  name="confirm">Update</button>
                              
                                            <button type="button" class="btn btn-default" onclick="closeWin()"> Cancel</button>
                                        </div>
                                    </form>
  <?php }
        } ?>
                      </div>


<!--update the post(submission table)-->
      <?php 
                if(isset($_POST['faculty'])) {
                    
                    echo $_POST['postid'];
                    echo $_POST['faculty'];
                    echo $_POST['post'];
                    echo $_POST['department'];  
                    include('database_connect.php');
                     if(mysqli_connect_errno()){
                               echo "failed to connect to MySQL.".mysqli_connect_error();
                               }           
                    try {
                        echo "Done";
            
                       $sqluq="update post set content='".$_POST['post']."' ,faculty='".$_POST['faculty']."' ,department='".$_POST['department']."' WHERE postId='".$_POST['postid']."'";
                      
                        echo "Updated !";
                        mysqli_query($con, $sqluq);
            
                        echo "<script>window.close();</script>";
            
    

                    }
                    
                    catch(Exception $e) {
                      echo 'Message: ' .$e->getMessage();
                    }
                }
                
                
            ?>




</body>
>>>>>>> d57608d56be1949eb28c6032b81c46cf51a7c686
</html>
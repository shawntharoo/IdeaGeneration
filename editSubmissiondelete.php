<?php
include('database_connect.php');


 $pid =  $_POST['postId2'];

 $sql_query="DELETE FROM post WHERE postId = '$pid'";
$result= mysqli_query($con,$sql_query);
      if (!$result) {
                                                                                        printf("Error: %s\n", mysqli_error($con)); 
                                                                                        exit();
                                                                                      }
 mysqli_close($con);


header("Location: editSubmissionCompu.php");

?>


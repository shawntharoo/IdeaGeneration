


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





                    <div class="panel-body">
 <h4 style="color: red">This record will be deleted permanently.Do you realy want to delete this record</h4>


                                        <div class="row" style="padding-left: 500px">
                                            <button class="btn btn-danger"  name="delete">Delete</button>
                              
                                            <button type="button" class="btn btn-default" onclick="closeWin()"> Cancel</button>
                                        </div>
                      </div>



 <?php

  if ( isset($_POST['delete'])){
     include("database_connect.php");
    echo "hahahah";
     if(mysqli_connect_errno()){
       echo "failed to connect to MySQL.".mysqli_connect_error();
       }
       
    if ( isset($_GET['postId'])){
      $postID = $_GET['postId'];
      echo "<script> window.postid = ".$postID." </script>";
      


$sql_query="SELECT * FROM post";
$result_set=mysqli_query($con,$sql_query);

 $sql_query="DELETE FROM post WHERE postId=".$postID;
 mysqli_query($con,$sql_query);

}}
?>



</body>
</html>
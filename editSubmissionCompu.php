
<?php 

include('database_connect.php');

//mysqli_select_db($database_connect, $database_database_connect);
$query_facultySet = "SELECT * FROM faculty";
$facultySet = mysqli_query($con, $query_facultySet) or die(mysqli_error());
$row_facultySet = mysqli_fetch_assoc($facultySet);
$totalRows_facultySet = mysqli_num_rows($facultySet);

//mysqli_select_db($database_connect, $database_database_connect);
 $query_depSet = "SELECT * FROM department";
$depSet = mysqli_query($con, $query_depSet) or die(mysqli_error());
$row_depSet = mysqli_fetch_assoc($depSet);
$totalRows_depSet = mysqli_num_rows($depSet);

//mysqli_select_db($database_connect, $database_database_connect);
$query_catSet = "SELECT * FROM categories";
$catSet = mysqli_query($con, $query_catSet) or die(mysqli_error());
$row_catSet = mysqli_fetch_assoc($catSet);
$totalRows_catSet = mysqli_num_rows($catSet);





?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="css/ideacss.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <script src="js/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="js/SpryValidationTextField.js" type="text/javascript"></script>
        <script src="js/SpryValidationTextarea.js" type="text/javascript"></script>    
        <link rel="stylesheet" href="themes_panel.css"> 
         <link href="css/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
   
   




<!-- popup the edit window -->
<script>
function pop_up(url){
window.open(url,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1000,height=500,directories=no,location=no') 
}




//jQuery Library Comes First
//Bootstrap Library
$( document ).ready(function() {       
    $('#myModal').on('show.bs.modal', function (e) { //Modal Event
        var id = $(e.relatedTarget).data('id'); //Fetch id from modal trigger button
    $.ajax({
      type : 'post',
       url : 'file.php', //Here you will fetch records 
      data :  'post_id='+ id, //Pass $id
      success : function(data){
         $('.form-data').html(data);//Show fetched data from database
       }
    });
    });
});
</script>
<!-- end of the popup window -->




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

.profile {
  border-radius: 50%;
  
  bottom: 100%;
  left: 25px;
  z-index: 1;
  max-width: 45px;
  opacity: 1;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
}



.border
{
    width: 125px;
    height: 100px;
    border : 3px solid rgb(229, 255, 255);
}
 body {
  background-image:url(images/body.jpg);

}

</style>

<!-- end of the body style -->



</head>
<body>


<!-- header-->


<!-- header-->

 <?php
 
  include('header.php');
 ?>
  

<!--start of navigation bar -->

 
 
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






<!-- load the submission to the table-->

<div id ="tablecontent" style="padding-bottom:100px">
           <div class="container">
                  <div class="row">
                          
                            
 <!-- select the faculty and department -->
<div class="fdc" style="padding-bottom:100px">
<form name="subForm" id='form' method="post" action=''>
<div class="row" >
<h3>Faculty</h3>
<span id="sprytextfield2">
<input for="faculty" name='faculty' type="text" class="form-control" id='about' data-toggle="tooltip" data-placement="left" title="Click to select the faculty" />
<input type="hidden" name="clicked" value="1"/>
<span class="textfieldRequiredMsg">You have to select a faculty!</span></span>
<div id="aboutdiv" class="details">
   <div class="gallery">
      <?php do { ?>
        <div class="selimg" id="<?php echo $row_facultySet['facName']; ?>">
          <div class="col-md-2 box">
            <figure><img src="<?php echo $row_facultySet['facImg']; ?>" class="border" width="100px" height="100px"/></figure>
            <h5 align="center"><?php echo $row_facultySet['facName']; ?></h5>
          </div>
        </div>
        <?php } while ($row_facultySet = mysqli_fetch_assoc($facultySet)); ?>
     </div>

</div>

</div>

<div class="row">
<h3>Department</h3>
<span id="sprytextfield3">
<input for="department" type="text" name='department' id='about1' class="form-control" data-toggle="tooltip" data-placement="left" title="Click to select department" />
<span class="textfieldRequiredMsg">You have to select the department</span></span>


<div id="aboutdiv1" class="details">
   <div class="gallery">
      <?php do { ?>     
        <div class="selimg1" id="<?php echo $row_depSet['depName']; ?>">
          <div class="col-md-2 box">
            <figure><img src="<?php echo $row_depSet['depImg']; ?>" class="border" width="100px" height="100px"/></figure>
            <h5 align="center"><?php echo $row_depSet['depName']; ?></h5>
          </div>
        </div>        
        <?php } while ($row_depSet = mysqli_fetch_assoc($depSet)); ?>       
     </div>
</div>
    </div>
    
    
    
<div class="row"> 
<h3>Category</h3>   
<span id="sprytextfield4">
<input for="category" type="text" name='category' id='about2' class="form-control" data-toggle="tooltip" data-placement="left" title="Click to select category" />
<span class="textfieldRequiredMsg">You have to select a category!</span></span>

<div id="aboutdiv2" class="details">
   <div class="gallery">
      <?php do { ?>
        <div class="selimg2" id="<?php echo $row_catSet['name']; ?>">
          <div class="col-md-2 box">
          <figure><img src="<?php echo $row_catSet['image']; ?>" class="border" width="100px" height="100px"/></figure>
          <h5 align="center"><div id="catname"><?php echo $row_catSet['name']; ?></div></h5>
          </div>
        </div>
        <?php } while ($row_catSet = mysqli_fetch_assoc($catSet)); ?>
     </div>
</div>
       
  <button class="bttn" id='sendpost' type="submit" style="width:1200px ; text-align:center">Search</button>
<input type="hidden" name="submitted" value="1"/>

</div>


</form> </div> 
                    <?php 
        if(isset($_POST['submitted']) == 1){

               
               ?>
      
  

<!-- load the submission to the table-->

<div id ="tablecontent">
           <div class="container">
                  <div class="row">
                            <div class="col-md-12">
                                    
                                            <div class="table-responsive">
                                                            <table id="mytable" class="table table-bordred table-striped">
                                                                       <thead>
                                                                      
                                                                       <th>Post ID</th>
                                                                       <th>User</th>
                                                                       <th>Submission</th>
                                                                       <th>Department</th>
                                                                       <th>Date</th>
                                                                       <th>Edit</th>
                                                                       <th>Delete</th>
                                                                       </thead>
                                                                       <tbody>
                                                                       <tr>
                                                        <?php
                                                                               include("database_connect.php");
                                                                               if(mysqli_connect_errno()){
                                                                                   echo "failed to connect to MySQL.".mysqli_connect_error();
                                                                                   }
                                                                                   
                                                                                   $sqlGetData="Select p.postId,u.id,u.Image,p.content,p.department,p.dateTime from post p,register u where p.userId=u.id and p.faculty='$_POST[faculty]' and p.department='$_POST[department]' and p.category='$_POST[category]'";
                                                                                   $result=mysqli_query($con,$sqlGetData);
                                                                                  
                                                                               
                                                                                while($row=mysqli_fetch_array($result)){?>
                                                                            <tr>
                                                                            
                                                                            <td><?php echo $row['postId'] ?></td>
                                                                          
                                                                             <td><a href="userProfile.php?id=<?=$row["id"]?>"><img src="<?php echo $row['Image']?>" class="profile"/></td>
                                                                            <td><a href="viewidea.php?id=<?=$row["postId"]?>"><?php echo $row['content']?></a></td>
                                                                            <td><?php echo $row['department']; ?></td>
                                                                            <td><?php echo $row['dateTime']; ?></td>
                                                                            <td><a href="popup.php?postId=<?= $row['postId'] ?>" onclick="pop_up(this);return false;"><img name="jsbutton" src="images/edit.png" width="25" height="25" border="0" alt="javascript button"></a></td>
                                                                            
                                                                            
                                                                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?= $row['postId'] ?>"><img name="jsbutton" src="images/delete.png" width="25" height="25" border="0" alt="javascript button"></button></td>



                                                                            </tr>
                                                                            
                                                                              <?php
                                                                                   }}
                                                                              ?>
                                                                            </tbody>
        
                                                             </table>
                                                </div>
            
                                   </div>
                    </div>
          </div>      
</div>







<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Confirm the deletion</h4>
      </div>
      <form  method="POST" action="editSubmissiondelete.php">
      <div class="modal-body">
        
          <div class="form-group">
            <label for="postId2" class="control-label">If you delete this record you will lost this permanently.Do you really want to delete this record ?</label>
            <input type="hidden" class="form-control" id="postId" name="postId2">
          </div>
         
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="deleteconfirm" value="submit">Delete</button>

      </div>
      </form>
    </div>
  </div>
</div>







<script type="text/javascript">
  
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var pid = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Confirm the delete of post ' + pid)
  modal.find('.modal-body input').val(pid)
})

</script>



<script>




   
 $(document).ready(function() { 
  
  $("#about").click(function() {
    if($('#aboutdiv').is(":hidden")) {
      $('#aboutdiv1').slideUp('slow');
      $('#aboutdiv2').slideUp('slow');
      $("#aboutdiv").slideDown('slow');
      }
    else{
      $('#aboutdiv').slideUp('slow');
      }
    }); 
    
    
    $("#about1").click(function() {
    if($('#aboutdiv1').is(":hidden")) {
      $('#aboutdiv').slideUp('slow');
      $('#aboutdiv2').slideUp('slow');
      $('#aboutdiv1').slideDown('slow');
      }
    else{
      $('#aboutdiv1').slideUp('slow');
      }
    }); 

  $("#about2").click(function() {
    if($('#aboutdiv2').is(":hidden")) {
      $('#aboutdiv').slideUp('slow');
      $('#aboutdiv1').slideUp('slow');
      $('#aboutdiv2').slideDown('slow');
      }
    else{
      $('#aboutdiv2').slideUp('slow');
      }
    }); 
   
   
     $(".selimg").click(function(event) {
      //alert(this.id);
      var input = document.getElementById("about");
      input.value = this.id;
      $('#aboutdiv').slideUp('slow');

    });
        
     
    $(".selimg1").click(function(event) {
      //alert(this.id);
      var input = document.getElementById("about1");
      input.value = this.id;
      $('#aboutdiv1').slideUp('slow');
      

    });
    
      $(".selimg2").click(function(event) {
      //alert(this.id);
      var input = document.getElementById("about2");
      input.value = this.id;
      $('#aboutdiv2').slideUp('slow');

    });
});
 
 

 
 </script>


<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield", "none", {validateOn:["blur"], minChars:5, maxChars:300});

var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
</script>
 
 
 
 

</body>
</html>
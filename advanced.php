<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="stylesheet" href="css/bootstrap.min.css"></link>
 <link rel="stylesheet" href="css/ideacss.css" />
  <link rel="stylesheet" href="css/slider.css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
 <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>
 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
 <script type="text/javascript" src="js/jquery-2.2.3.js"></script> 
 <script type="text/javascript" src="js/jquery-ui.js"></script>
   <script type="text/javascript" src="js/bootstrap-slider.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
 
 </script>

</head>
<body>
 <?php
    include('header.php');
 ?>
 <div class="container">
 <div class="col-md-2">
 </div>
  <div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title" align="center">Find Submissions</h4>
</div>
<div class="panel-body">
<form method="POST" action="advancedaction.php" onsubmit="return check()">
   <div class="form-group fgroup">
    <label for="title">Enter Keywords</label>
    <input type="text" class="form-control" name="title" placeholder="Title ....">
  </div>
  <hr/>
  <div class="form-group fgroup">
    <label for="description">Search Including</label>
    <input type="text" class="form-control" name="description" placeholder="Description ....">
  </div>
  <hr/>
  <div class="form-group fgroup">
                            <label for="faculty">Category</label>
			    				    <select class="form-control" id="category" name="category" placeholder="select one">
                                              <option></option>
             								 <option>Academic</option>
    										 <option>Student Affairs</option>
   											 <option>Sports and Societies</option>
                                              <option>External</option>
   											
 										 </select>
		</div>
     	<div class="form-group fgroup">
                            <label for="faculty">Faculty</label>
			    				    <select class="form-control" id="faculty" name="faculty">
                                              <option></option>
             								 <option>Faculty of Computing</option>
    										 <option>Faculty of Engineering</option>
   											 <option>Faculty of Management</option>
   											
 										 </select>
		</div>
        <hr/>
          	<div class="form-group fgroup">
                            <label for="department">Department</label>
			    				    <select class="form-control" id="department" name="department">
                                              <option></option>
             								 <option>Department of Software Engineering</option>
    										
   											
 										 </select>
		</div>
        <hr/>
       <div class="form-group fgroup">
        <label for="date">Posted date</label>
          <input size="8" type="text" id="date" name="date">
   
             <script type="text/javascript">
             $('#date').datepicker({
				 dateFormat: 'yy/mm/dd'
               
                 });
                 </script> 
                
              
                  
      </div>
      <hr/>
  <div class="form-group fgroup">
    <label for="name">Posted By</label>
    <input type="text" class="form-control" name="name" placeholder="Name ....">
  </div>
  <hr/>
  <div class="form-group fgroup">
    <label for="sort">Sort By</label>
    <div>
   <label class="radio-inline"><input type="radio" name="sort" value="vote">Top Voted</label>
   <label class="radio-inline"><input type="radio" name="sort" value="comment">Top Comments</label>
   <label class="radio-inline"><input type="radio" name="sort" value="improvement">Top Improvements</label>
   </div>
  </div>
  <hr/>


  <button type="submit" class="btn btn-success" name="search" value="submit">Search</button>
</form>
</div>
</div>
</div>
 </div>
  <div class="col-md-2">
 </div>
  <?php
    include('footer.php');
   ?>  
</body>
</html>
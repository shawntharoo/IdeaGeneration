

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

.snip1336 {
  font-family: 'Roboto', Arial, sans-serif;
  
  float: left;
  overflow: hidden;
  margin: 10px 1%;
  min-width: 230px;
  max-width: 300px;
   min-height: 335.2px;
  width: 100%;
  color: #ffffff;
  text-align: left;
  line-height: 1.4em;
  background-color: #141414;
}
.snip1336 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.20s ease;
  transition: all 0.25s ease;
}
.snip1336 img {
  max-width: 100%;
  vertical-align: top;
  opacity: 0.85;
}
.snip1336 figcaption {
  width: 100%;
  background-color: #141414;
  padding: 20px;

}
.snip1336 figcaption:before {

  content: '';
  bottom: 100%;
  left: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 50px 0 0 390px;
  border-color: transparent transparent transparent #141414;
}
.snip1336 figcaption a {
  padding: 5px;
  border: 1px solid #ffffff;
  color: #ffffff;
  font-size: 0.7em;
  text-transform: uppercase;
  margin: 10px 0;
  display: inline-block;
  opacity: 0.65;
  width: 47%;
  text-align: center;
  text-decoration: none;
  font-weight: 600;
  letter-spacing: 1px;
}
.snip1336 figcaption a:hover {
  opacity: 1;
}
.snip1336 .profile {
  border-radius: 50%;
  
  bottom: 100%;
  left: 25px;
  z-index: 1;
  max-width: 90px;
  opacity: 1;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
}
.snip1336 .follow {
  margin-right: 4%;
  border-color: #66CC00;
  color: #66CC00;
}
.snip1336 h2 {
  margin: 0 0 5px;
  font-weight: 300;
}
.snip1336 h2 span {
  display: block;
  font-size: 0.5em;
  color: #66CC00;
}
.snip1336 p {
  margin: 0 0 10px;
  font-size: 0.8em;
  letter-spacing: 1px;
  opacity: 0.8;
}




input[type=text] {
    width: 130px;
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

input[type=text]:focus {
    width: 50%;
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



 


<!-- Search key-->

<div id ="tablecontent" style="padding-bottom:200px">

           <div class="container">
           
	                <div class="row">
                    
                    <div class="row searchgroup" style="padding-left:680px">
                    <form method="post">
                    <div class="row search_col">
                    
                    
                                    
                              
                                     <input type="text" class="search_text" placeholder="Search" name="searchkey3"/>
                           <select name="category" style="height:43px;border: 2px solid #ccc" >
                    	<option value="searchval">Select the search category</option>
  						<option value="fname">Name</option>
                    	<option value="universityID">University ID</option>
                        <option value="emil">Email</option>
                        <option value="category">Category</option>
                        </select>
                    
                                     <button class="search_btn" name="searchkey4" style="height:40px;width:40px" src="images/delete.png">>
                                </button>
                            </div>
                                  </form>
                          </div>

 
 </div>
 
 <?php
	 	if(isset($_POST["searchkey4"]))
		{
			$search= $_POST["searchkey3"];
			$cat=$_POST["category"];
			$where= $cat." like '%$search%'";
			if($cat=="searchval" && $search==NULL){
			 echo "<script type='text/javascript'>alert('Enter the search key & select the search category')</script>";
		}else{
			
			if($cat=="searchval"){ 
			 
			 echo "<script type='text/javascript'>alert('Select the search category')</script>"; 
        
			 }elseif($search==NULL){
			 echo "<script type='text/javascript'>alert('Enter the search key')</script>";
			 }else{
			
			
     if($cat=="fname"){
		 $where="fname like '%$search%' OR lname like '%$search%'";
		 }
		$sql="select * from register where ".$where;
	   
	  include("database_connect.php");    //provide database connection
	  $result=mysqli_query($con,$sql);
	   if (mysqli_num_rows($result)==0)
		 {
		    echo "No user Found";	 
		 }
	  
	  while($row = mysqli_fetch_array($result))//retrieve data one by one
	  {
		
	  
   ?>
 
 

 
 <figure class="snip1336">
  <figcaption>
  <img src="<?php echo $row['Image']; ?>" alt="profile-sample5" class="profile" />
    <h2><?php echo $row['fname']; ?><span><?php echo $row['lname']; ?></span></h2>
    <h5><?php echo $row['universityID']; ?> </h5>
    <h5><?php echo $row['category']; ?> </h5>
    <h5><?php echo $row['emil']; ?> </h5>
    <a href="#" class="follow">Edit</a>
    <a href="#" class="info">More Info</a>
  </figcaption>
</figure>


 
 
 <?php }}} }?>
  </div>
 </div>
 
 <footer>
 
<?php
 include('footer.php');
?>
 </footer>

</body>
</html>
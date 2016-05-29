<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="stylesheet" href="css/ideacss.css" />
   <link rel="stylesheet" href="css/bootstrap.min.css"></link>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<body>

<?php
include('header.php');
?>
 <div class="container">

 <div class="col-md-3"><br/>
 <ul class="nav nav-pills nav-stacked">
  <li role="presentation"><a href="index.php">Home</a></li>
    <li role="presentation" class="active"><a href="adminPanel.php">Dashboard</a></li>
  <li role="presentation"><a href="adminProfile.php">Profile</a></li>
  <li role="presentation"><a href="editSubmissionCompu.php">Submission</a></li>
  <li role="presentation"><a href="awardDisplay.php">Reward</a></li>
  <li role="presentation"><a href="Gemification.php">Games</a></li>
  <li role="presentation"><a href="mostRewardedUsers.php">Most Rewarded Users</a></li>
</ul>
</div>

<div class="col-md-6"><br/>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" style="width:500px; height:300px">
    <div class="item active">
     <center><img src="images/si1.png" alt="..." style="width:550px; height:275px"></center> 
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
       <center><img src="images/si2.jpg" alt="..."></center>
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
       <center><img src="images/si3.jpg" alt="..."></center>
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
       <center><img src="images/si4.png" alt="..."></center>
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <center> <img src="images/si5.jpg" alt="..."></center>
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class="col-md-3"><br/>
<?php
include("database_connect.php");
if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
$query ="SELECT COUNT(postId) as posts FROM post";
$result=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($result);
$sub = $data['posts'];

$query ="SELECT COUNT(commentId) as comment FROM comment";
$result=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($result);
$com = $data['comment'];

$query ="SELECT COUNT(id) as improvements FROM improvements";
$result=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($result);
$improve = $data['improvements'];

$query ="SELECT COUNT(id) as ideas FROM idea";
$result=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($result);
$idea = $data['ideas'];
?>

<?php
include("database_connect.php");
if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
$query ="SELECT COUNT(id) as Total FROM register";
$result=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($result);
$temp = $data['Total'];
?>
<div class="row">
  <div>
    <a href="#" class="thumbnail" style="width:300px; height:75px">
     <!-- <img src="..." alt="...">-->
      <font size="3" color="black">Current IDEAPOOL Users <br/><font size="6" color="red"><?php echo $data['Total']; ?></font>
    </a>
  </div>  
</div>

<?php
include("database_connect.php");
if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
$query ="SELECT COUNT(status) as ActiveMembers FROM register where status = 'active'";
$result=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($result);
$active = $data['ActiveMembers'];
$presentage= ($data['ActiveMembers']/$temp)*100;
?>
<div class="row">
  <div>
    <a href="allusers.php" class="thumbnail" style="width:300px; height:75px">
      <font size="3" color="black"> Current Active Members  :</font><font size="4" color="red"><?php echo $data['ActiveMembers'];  ?></font><br/>
       Ratio With Total Members<br/><font size="4" color="red"><?php echo number_format($presentage,4); ?> %</font>
    </a>
  </div>  
</div>

<?php
include("database_connect.php");
if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
$query ="SELECT COUNT(status) as blocked FROM register where status = 'blocked'";
$result=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($result);
$blocked = $data['blocked'];
$presentage= ($data['blocked']/$temp)*100;
?>
<div class="row">
  <div>
    <a href="allusers.php" class="thumbnail" style="width:300px; height:75px">
      <font size="3" color="black"> Current Blocked Members  :</font><font size="4" color="red"><?php echo $data['blocked']; ?></font><br/>
       Ratio With Total Members<br/><font size="4" color="red"><?php echo number_format($presentage,4); ?> %</font>
    </a>
  </div>  
</div>

<?php
include("database_connect.php");
if(mysqli_connect_errno()){
echo "failed to connect to MySQL.".mysqli_connect_error();
}
$query ="SELECT COUNT(status) as pending FROM register where status = 'pending'";
$result=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($result);
$presentage= ($data['pending']/$temp)*100;
?>
<div class="row">
  <div>
    <a href="newusers.php" class="thumbnail" style="width:300px; height:75px">
      <font size="3" color="black"> New Registered Users  :</font><font size="4" color="red"><?php echo $data['pending']; ?></font><br/>
      Ratio With Total Members<br/><font size="4" color="red"><?php echo number_format($presentage,4); ?> %</font>
    </a>
  </div>  
</div>
</div>  
</div>
  
<script type="text/javascript">
google.charts.load('current', {packages: ["corechart"]});
google.charts.setOnLoadCallback(drawBasic);
   google.charts.setOnLoadCallback(drawChart);
function drawBasic() {
  $presentage = 100000;
      var data = google.visualization.arrayToDataTable([
        ['City', '2016 Population',],
        ['Total Users', <?php echo $temp ?>],
        ['Active Members',<?php echo $active ?>],
        ['Blocked Members',<?php echo $blocked ?>],
        ['Pending Users',<?php echo $data['pending']; ?>]
      ]);

      var options = {
        title: ' ',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total IDEAPOOL Users',
          minValue: 0
        },
        vAxis: {
          title: 'Users'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }

   
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Post Type', 'Posts per Day'],
          ['Submission',<?php echo $sub ?>],
          ['Ideas',     <?php echo $com ?> ],
          ['Improvements',  <?php echo $improve ?> ],
          ['Comments',  <?php echo $idea ?> ]

        ]);

        var options = {
          title: ' ',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

</div><br/>

<table>
      <tr>
      <center> <h4>Current Status of the User Levels of The IDEAPOOL Web Site </h4> </center>
        <td><div id="chart_div" style="width: 1475px; height: 350px;"></div></td>

      </tr>
  </table>
<br><br><br>
  <table>
      <tr>
      <center> <h4> Current Status of all Posts Types of The IDEAPOOL Web Site</h4> </center>
        <td><div id="piechart_3d" style="width: 1475px; height: 350px;"></div></td>
      </tr>
  </table>
</body>
<?php
include('footer.php');
?>
</html>
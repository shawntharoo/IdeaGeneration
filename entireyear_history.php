<?php require_once('database_connect.php'); ?>

<?php
//$currentMonth=date("m");
//echo "$currentMonth";



?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Submissions', 'Improvements', 'Comments'],
          ['January', 10, 4, 2],
          ['February', 11, 6, 5],
          ['March', 6, 11, 3],
		  ['April', 10, 4, 2],
          ['May', 11, 6, 5],
          ['June', 6, 11, 3],
		  ['July', 10, 4, 2],
          ['August', 11, 4, 2],
          ['September', 5, 8, 3],
		  ['October', 9, 6, 5],
          ['November', 7, 4, 3],
          ['December', 10, 5, 5]
        ]);

        var options = {
          chart: {
            title: 'Your Performance',
         //   subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  <?php /*
  	$query_monthSet = "SELECT monthOf FROM post";
	$monthSet = mysqli_query($con, $query_monthSet) or die(mysqli_error());
	$row_monthSet = mysqli_fetch_assoc($monthSet);
	$totalRows_monthSet = mysqli_num_rows($monthSet);
?>
  <?php //do { ?>
      	         <?php //echo $row_Set['monthOf']; ?>
        <?php //} while ($row_monthSet = mysqli_fetch_assoc($monthSet)); */?>
    <div id="columnchart_material" style="width: 1000px; height: 500px;"></div>
  </body>
</html>
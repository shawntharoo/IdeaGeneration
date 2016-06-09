<html>
  <head>
   
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Activity', 'Activities per month'],
          ['submissions',      <?php echo "$submissions[0]"; ?>],
          ['Improvements',      <?php echo "$improvements[0]"; ?>],
          ['Comments',    <?php echo "$comments[0]"; ?>]
        ]);

        var options = {
          title: 'My Monthly Activities',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 800px; height: 400px;"></div>
  </body>
</html>
<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', 'Today');
      data.addColumn('number', 'This Month');
      data.addColumn('number', 'Yesterday');

      data.addRows([
        [1,  37.8, 80.8, 41.8],
        [2,  3.9, 69.5, 32.4],
        [3,  25.4,   57, 25.7],
  
      ]);

      var options = {
        chart: {
          
        },
        width: 600,
        height: 300,
        axes: {
          x: {
            0: {side: 'bottom'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>
</head>
<body>
  <div id="line_top_x"></div>
</body>
</html>


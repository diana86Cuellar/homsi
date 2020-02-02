

<?php

$con = new mysqli("localhost","root","0000","usuarios");
if (!$con)
  {
  die("Conexion Fallida: " . mysqli_connect_errno());
  }
  $sql ="select meses, incapacidad from carrucel2";
  $res = $con->query($sql);
  $con->close();
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['INCAPACIDAD', '2019'],
           <?php
           while ($fila = $res->fetch_assoc()) {
           echo "['".$fila["meses"]."',".$fila["incapacidad"]."],";
         }
          ?>
        ]);
        var options = {
          chart: {
            title: 'Grafico Homsi  INCAPACIDAD ' ,
           
          } 
        };
        var chart = new google.charts.Bar(document.getElementById('columnchart_material2'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material2" style="width: 730px; height: 600px;">
    </div>
  </body>
</html>
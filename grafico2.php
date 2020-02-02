
<?php

$con = new mysqli("localhost","root","0000","usuarios");
if (!$con)
  {
  die("Conexion Fallida: " . mysqli_connect_errno());
  }
  $sql ="select meses, incidentes from carrucel1";
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
          ['INCIDENTES ', '2019'],
           <?php
           while ($fila = $res->fetch_assoc()) {
           echo "['".$fila["meses"]."',".$fila["incidentes"]."],";
         }
          ?>
        ]);
        var options = {
          chart: {
            title: 'Grafico Homsi  INCIDENTES ' ,
           
          } 
        };
        var chart = new google.charts.Bar(document.getElementById('columnchart_material1'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material1" style="width: 730px; height: 600px;">
    </div>
  </body>
</html>

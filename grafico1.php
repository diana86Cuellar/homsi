
<?php

$con = new mysqli("localhost","root","","homsi");
if (!$con)
  {
  die("Conexion Fallida: " . mysqli_connect_errno());
  }
  $sql ="select meses, accidentes from carrucel";
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
          ['ACCIDENTABILIDAD', '2019'],
           <?php
           while ($fila = $res->fetch_assoc()) {
           echo "['".$fila["meses"]."',".$fila["accidentes"]."],";
         }
          ?>
        ]);
        var options = {
          chart: {
            title: 'Grafico Homsi  ACCIDENTABILIDAD' ,
           
          } 
        };
        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 1100px; height: 600px;">
    </div>
  </body>
</html>

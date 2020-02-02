
<?php

$con = new mysqli("localhost","root","0000","usuarios");
if (!$con)
  {
  die("Conexion Fallida: " . mysqli_connect_errno());
  }
  $sql ="select meses, accidentes,incidentes,incapacidad from carrucel1
";
  $res = $con->query($sql);
  $con->close();
?>




 <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          


          ['ENERO ', '2019'],
           <?php
           while ($fila = $res->fetch_assoc()) {
           echo "['".$fila["meses"]."',".$fila["accidentes"]."',".$fila["incidentes"]."',".$fila["incapacidad"]."],";
        

          
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Chess opening moves',
            subtitle: 'popularity by percentage' },
          axes: {
            x: {
              0: { side: 'top', label: 'White to move'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
  </head>
  <body>
    <div id="top_x_div" style="width: 730px; height: 600px;">
  </body>
</html>

<?php


  


  session_start(); //iniciar sesion con segurida
  require 'funcs/conexion.php'; //agregar conexion con el contenido conexion.php y funcs.php
  include 'funcs/funcs.php'; // es incluir funcs.php 
  
  if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
    header("Location: inicio.php");
  }
  
  $idUsuario = $_SESSION['id_usuario']; //que la variable $idUsuario va a ser igual a $_session
  
  $sql = "SELECT  id, usuario, nombre, correo FROM usuarios WHERE id = '$idUsuario'";
  $result = $mysqli->query($sql); // la variable $result  guardara el resultado del 'query'
  
  $row = $result->fetch_assoc(); //Retorna una matriz de strings asociativa que representa a la fila obtenida del resultset,
?>  

<!DOCTYPE html>
<html>
    <head>  
        <title>Sistema Homsi</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="estilo.css">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">

	</script>
    </head>
    
    <body >

        <div class="container">
          <!-- header  visto desde lo responsive este es un row -->
            <div class="row">
				<header class="mt-3 pr-0 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="background: #107ade">
				<!--   <button type="button">REGISTRO</button> -->
					<div class="responsive">
						<a  href="https://www.facebook.com/HomeSentryColombia/"><img src="./img/face.png" alt="logo" class="imagen" width="40px" height="38px"/></a>
						<a href="https://www.instagram.com/homesentry/"><img src="./img/insta.jpg" alt="logo" width="40" height="38"/></a>
						<a href="https://www.pinterest.com/homesentry"><img src="./img/pinti.png" alt="logo" width="40" height="38"/></a>
						<a href="https://www.twitter.com/homesentry"><img src="./img/twitter.png" alt="logo" width="40" height="38"/></a>



					</div>
          <h4>
            <?php echo ' Bienvenid@ HOMSI '.utf8_decode($row['nombre']);?>
          </h4>
			    </header>
            </div>
          <div class="row">
               <header class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="logo"">
                  <div class="flotante">
                      <img src="./img/logo_empresa.jpg" width="80" >
                  </div>
                  <div class="pt-4">
                    <h1> Sistema de Información HOMSI  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<a  href="logout.php"><img src="./img/sesion.png" alt="sesion" class="imagen" width="40px" height="40px"/></a> 
                    </h1/>
                     
                  </div>
               </header>
            </div>


     <!-- aqui inica el cuerpo central de la pagina  -->
      <div class="row">
              <!-- articulo -->
               <nav class="d-none d-md-block d-none d-sm-block col-md-12 col-lg-12 col-xl-12" id="nav">  
               <style type="text/css">
               </style>             
                  <ul class="nav nav-pills-justified">
                              <li class="submenu">
                                <a class="nav-link" href="Registro.php"><strong> Registro</strong></a>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="foraccidente.php" role="button" aria-haspopup="true" aria-expanded="false"><strong>Empleado</strong></a>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="consultaempleado.php"><strong>Consultar</strong></a>                                  
                                  <a class="dropdown-item" href="#"> <strong>Registrar</strong></a>
                                  <a class="dropdown-item" href=""> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Generar reporte </strong>
                                  

                                  <div class="dropdown-menu">
                                  <a class="dropdown-item" href="./pdf/pdfindex.php"><img src="./img/pdf.png" alt="logo" class="imagen"></a>
                                  <a class="dropdown-item" href="./excel/reporte_ok.php"><img src="./img/excel.png" alt="logo" class="imagen"></a>
                                  
                                  </div>

                                                            
                                
                              </li>
                               <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Accidente</strong></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="./vistas/mostrarIncapacidad.php"><strong>Consultar</strong></a>                                  
                                  <a class="dropdown-item" href="./vistas/ingresarIncapacidad.php"> <strong>Registrar</strong></a>
                                  <a class="dropdown-item" href="./pdf/pdfindex.php"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Generar reporte</strong></a>

                                  <div class="dropdown-menu">
                                  <a class="dropdown-item" href="./pdf/pdfacci.php"><img src="./img/pdf.png" alt="logo" class="imagen"></a>
                                  <a class="dropdown-item" href="#"><img src="./img/excel.png" alt="logo" class="imagen"></a>
                                  
                                  

                                </div>
                              </li>
                               <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Incidentes</strong></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="./formu/empleados.html"><strong>Consultar</strong></a>
                                  <a class="dropdown-item" href=""><strong>Modificar</strong></a>
                                  <a class="dropdown-item" href=""> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Generar reporte</strong></a>

                                  <div class="dropdown-menu">
                                  <a class="dropdown-item" href="./pdf/pdfainci.php"><img src="./img/pdf.png" alt="logo" class="imagen"></a>
                                  <a class="dropdown-item" href="#"><img src="./img/excel.png" alt="logo" class="imagen"></a>
                                 
                                                                   
                                </div>

                              </li>
                              </li>
                               <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Incapacidad</strong></a>

                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="../vistas/mostrarIncapacidad.php"><strong>Consultar</strong></a>
                                  <a class="dropdown-item" href="../vistas/actualizarIncapacidad.php"><strong>Modificar</strong></a>
                                  <a class="dropdown-item" href="../vistas/ingresarIncapacidad.php"><strong>Registrar</strong></a>
                                  <a class="dropdown-item" href=""> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Generar reporte</strong></a>

                                  <div class="dropdown-menu">
                                  <a class="dropdown-item" href="./pdf/pdfinca.php"><img src="./img/pdf.png" alt="logo" class="imagen"></a>
                                  <a class="dropdown-item" href="#"><img src="./img/excel.png" alt="logo" class="imagen"></a>
                                  
                                                                   
                                </div>
                              </li>
                              </li>
                               <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Zonas Inseguras</strong></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#"><strong>Consultar</strong></a>
                                  <a class="dropdown-item" href="#"><strong>Modificar</strong></a>
                                  <a class="dropdown-item" href="#"><strong>Registrar</strong></a>

                                   <a class="dropdown-item" href=""> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Generar reporte</strong></a>

                                  <div class="dropdown-menu">
                                  <a class="dropdown-item" href="./pdf/pdfinsegu.php"><img src="./img/pdf.png" alt="logo" class="imagen"></a>
                                  <a class="dropdown-item" href="#"><img src="./img/excel.png" alt="logo" class="imagen"></a>
                                  
                                                                   
                                </div>

                              </li>
                              </li>
                               <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Riesgos</strong></a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#">Consultar</a>
                                  <a class="dropdown-item" href="#">Modificar</a>
                                  <a class="dropdown-item" href="#">Editar</a>                                 
                                </div>

                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Reportes</strong></a>
                                <div class="dropdown-menu">

                                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Empleado</strong></a>
                                  <div class="dropdown-menu">

                                  <a class="dropdown-item" href=""><strong>Generar reporte </a>
                                  </strong>

                                  <a class="dropdown-item" href="./pdf/pdfindex.php"><img src="./img/pdf.png" alt="logo" class="imagen"> 
                                    <a class="dropdown-item" href="#"><img src="./img/excel.png" alt="logo" class="imagen"></a>
                                  <a class="dropdown-item" href="#"><strong>CVS</strong></a>

                                </div>
                                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Accidente</strong></a>


                                  <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#"><img src="./img/pdf.png" alt="logo" class="imagen"> </a>
                                  <a class="dropdown-item" href="./pdf/pdfacci.php"><img src="./img/excel.png" alt="logo" class="imagen"></a></a>
                                  
                                  
                                  </div>

                                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Incidentes</strong></a>

                                  <div class="dropdown-menu">
                                  <a class="dropdown-item" href="./pdf/pdfacci.php"><img src="./img/pdf.png" alt="logo" class="imagen"></a>
                                  <a class="dropdown-item" href="#"><img src="./img/excel.png" alt="logo" class="imagen"></a>
                                  
                                  </div>

                                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Incapacidad</strong></a>

                                  <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#"><img src="./img/pdf.png" alt="logo" class="imagen"></a></a>
                                  <a class="dropdown-item" href="#"><img src="./img/excel.png" alt="logo" class="imagen"></a>
                                  
                                  </div>

                                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Zonas Inseguras</strong></a>

                                  <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#"><img src="./img/pdf.png" alt="logo" class="imagen"></a>
                                  <a class="dropdown-item" href="#"><img src="./img/excel.png" alt="logo" class="imagen"></a>
                                  <a class="dropdown-item" href="#"><strong>CVS</strong></a>
                                  </div>

                                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Riesgos </strong></a>

                                  <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#"><img src="./img/pdf.png" alt="logo" class="imagen"></a>
                                  <a class="dropdown-item" href="#"><img src="./img/excel.png" alt="logo" class="imagen"></a>
                                  <a class="dropdown-item" href="#"><strong>CVS</strong></a>
                                  </div>

                                                                                                                                    
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong>Perfil</strong>
                                </a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="editarperfil1.php">
                                    <img src="./img/editar1.jpg" alt="logo" class="imagen"></a>

                                  
                                  <a class="dropdown-item" href="#"><strong><?php echo 'nombre : '.utf8_decode($row['nombre']);?></strong></a>
                                  <a class="dropdown-item" href="#"><strong><?php echo 'correo : '.utf8_decode($row['correo']);?></strong></a>
                                  <a class="dropdown-item" href="#"><strong><?php echo 'usuario : '.utf8_decode($row['usuario']);?></strong></a>
                                                                                                   
                                </div>
                                                         
                      
                          </ul>   
               </nav>
</div>

        <div class="row">
              <!-- articulo

               <aside class="d-none d-md-block d-none d-md-block col-md-2 col-lg-2 col-xl-2" id="aside">
                  <p>Esto es el aside 1 </p>
               </aside>

                -->
                <main class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">                 
               
                    <div class="row" >
                        <article class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                           <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item active ">
                                  <?php require 'grafico1.php';?>

                                 <div id="columnchart_material">
                                 </div>
                                </div>



                                  <div class="carousel-item  ">
                                    <img src="img/trabajo1.jpg"style="width: 1100px; height: 600px;" class="avatar" alt="Avatar Image">
                                    <div id="columnchart_material1">
                                    </div>
                                  </div>

                                    <div class="carousel-item  ">
                                    <img src="img/trabajo2.jpg"style="width: 1100px; height: 600px;" class="avatar" alt="Avatar
                                    Image">
                                    
                                    </div>
                                  </div>
                              </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                          </div>
                        </article>
                    </div>

            <!--     </main>
               <aside class="d-none d-md-block d-none d-md-block col-md-2 col-lg-2 col-xl-2" id="aside">
                  <p>Esto es el aside 2 </p>
               </aside>-->
            

        </div>
         <!-- pie de  pagina  -->
        <div class="row">
           <footer class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="container-fluid">
                    <div class="map-responsive">
                   <iframe src="https://maps.google.com/maps?q=cedihomesentry&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe> 
                   <div style align="center">
                   <p>DERECHOS HOMSI &copy;2019.
                      <br><br>
                      CONTACTENOS: PROYECTO1751050@GMAIL.COM
                      <br><br>
                       CREADO: 1751050.</p>
                   </div>
                  </div>
                </div>
             </footer>
        </div>
    </div>
        
    </body>
</html>

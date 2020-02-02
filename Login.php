<?php
  require 'funcs/conexion.php';
  include 'funcs/funcs.php';
  
  session_start(); //Iniciar una nueva sesión o reanudar la existente
  
  if(isset($_SESSION["id_usuario"])){ //En caso de existir la sesión redireccionamos
    header("Location: welcome.php");
  }
  
  $errors = array();
  
  if(!empty($_POST)) //si esta vacio los campos
  {
    $usuario = $mysqli->real_escape_string($_POST['usuario']);
    $password = $mysqli->real_escape_string($_POST['password']);
    
    if(isNullLogin($usuario, $password))
    {
      $errors[] = "Debe llenar todos los campos";//error que muestra
    }
    
    $errors[] = login($usuario, $password); 
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio Sesion</title>
    <link rel="stylesheet" href="css/inicio.css">
  </head>
  <body>
    <div class="cont_rs_6wifeo_1572287447"><a href="https://www.facebook.com/HomeSentryColombia" target="_blank"><div class="f6wifeo_1572287447"><img src="logo_social/facebook_78404.png" border="0"/></div></a><a href="https://twitter.com/homesentry" target="_blank"><div class="t6wifeo_1572287447"><img src="logo_social/twitter_78404.png" border="0"/></div></a><a href="https://www.pinterest.com/homesentry" target="_blank"><div class="p6wifeo_1572287447"><img src="logo_social/pinterest_78404.png" border="0"/></div></a><a href="http://instagram.com/homesentry" target="_blank"><div class="i6wifeo_1572287447"><img src="logo_social/instagram_78404.png" border="0"/></div></a></div>
    <div class="login-box">
      <img src="img/logo2.JPG" class="avatar" alt="Avatar Image">
      <h1>Ingresa</h1>
      <form  action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
        <!-- USERNAME INPUT -->
        <label for="usuario">Usuario</label>
        <input type="text"  name="usuario" placeholder="Ingresa Tu Usuario" required>
        <!-- PASSWORD INPUT -->
        <label for="password">Contraseña</label>
        <input type="password"  name="password" placeholder="Ingresa Tu Contraseña" required> 
        <input type="submit" value="Ingresar">
        <a href="Recupera.php">Olvidaste tu Contraseña?</a><br>
        <a href="Registro.php">No tienes Cuenta?</a>

      </form>

      
    </div>
  </body>
</html>
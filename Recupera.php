<?php
  
  require 'funcs/conexion.php';
  include 'funcs/funcs.php';
  
  session_start();
  
  if(isset($_SESSION["id_usuario"])){
    header("Location: index.php");
  }
  
  $errors = array();
  
  if(!empty($_POST))
  {
    $email = $mysqli->real_escape_string($_POST['email']);
    
    if(!isEmail($email))
    {
      $errors[] = "Debe ingresar un correo electronico valido";
    }
    
    if(emailExiste($email))
    {     
      $user_id = getValor('id', 'correo', $email);
      $nombre = getValor('nombre', 'correo', $email);
      
      $token = generaTokenPass($user_id);
      
      $url = 'http://'.$_SERVER["SERVER_NAME"].'/homsi5/cambia_pass.php?user_id='.$user_id.'&token='.$token;
      
      $asunto = utf8_decode("Recuperar contraseña - Sistema de Usuarios");
      $cuerpo = "Hola $nombre: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>$url</a>";
      
      if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
        
        echo "<script language=\"javascript\">alert(\"Hemos enviado instrucciones al correo:$email para restablecer su contraseña\");document.location.href='inicio.php';</script>";
        
        exit;
      }
      }
      else {
      $errors[] = "La direccion de correo electronico no existe";
    }
  }
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>

    <div class="login-box">
      <img src="img/logo2.JPG" class="avatar" alt="Avatar Image">
      <h1>Ingresa</h1>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
        <!-- USERNAME INPUT -->
        <label for="username">Email</label>
        <input type="Email" placeholder="Ingresa Tu Email" name="email" required>
       
        <input type="submit" value="Enviar">
        <a href="index.php">Inicia Sesion</a><br>
        <a href="Registro.php">No tienes Cuenta?</a>
      </form>
    </div>
  </body>
</html>

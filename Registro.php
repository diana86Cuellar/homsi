<?php
  
  require 'funcs/conexion.php';
  require 'funcs/funcs.php';

  $errors = array();
  
  if(!empty($_POST))
  {
    $nombre = $mysqli->real_escape_string($_POST['nombre']);  
    $usuario = $mysqli->real_escape_string($_POST['usuario']);  
    $password = $mysqli->real_escape_string($_POST['password']);  
    $con_password = $mysqli->real_escape_string($_POST['con_password']);  
    $email = $mysqli->real_escape_string($_POST['email']);  
    $captcha = $mysqli->real_escape_string($_POST['g-recaptcha-response']);
    
    $activo = 0;
    $tipo_usuario = 3;
    $secret = '6LcvC70UAAAAAC4YDefdNOaoIJrvpNc5O5jtKj1F';
    
    if(!$captcha){
      $errors[] = "Por favor verifica el captcha";
    }
    
    if(isNull($nombre, $usuario, $password, $con_password, $email))
    {
      $errors[] = "Debe llenar todos los campos";
    }
    
    if(!isEmail($email))
    {
      $errors[] = "Dirección de correo inválida";
    }
    
    if(!validaPassword($password, $con_password))
    {
      $errors[] = "Las contraseñas no coinciden";
    }
    
    if(usuarioExiste($usuario))
    {
      $errors[] = "El nombre de usuario $usuario ya existe";
    }
    
    if(emailExiste($email))
    {
      $errors[] = "El correo electronico $email ya existe";
    }
    
    if(count($errors) == 0)
    {
      $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
      
      $arr = json_decode($response, TRUE);
      
      if($arr['success'])
      {
        
        $pass_hash = hashPassword($password);
        $token = generateToken();
        
        $registro = registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario);
        
        if($registro > 0 )
        {
          
          $url = 'http://'.$_SERVER["SERVER_NAME"].'/homsi5/activar.php?id='.$registro.'&val='.$token;
          
          $asunto = 'Activar Cuenta - Sistema de Usuarios';
          $cuerpo = "Estimado $nombre: <br /><br />Para continuar con el proceso de registro, es indispensable de click en el siguiente link <a href='$url'>Activar Cuenta</a>";
          
          if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
          
          echo "<script language=\"javascript\">alert(\"Para terminar el proceso de registro siga las instrucciones que le hemos enviado la direccion de correo electronico: $email\");document.location.href='inicio.php';</script>";
          
          //echo "<br><a href='inicio.php' >Iniciar Sesion</a>";
          exit;
          
          } else {
            $erros[] = "Error al enviar Email";
          }
          
          } else {
          $errors[] = "Error al Registrar";
        }
        
        } else {
        $errors[] = 'Error al comprobar Captcha';
      }
      
    }
    
  }
  

  ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/Registro.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>

    <div class="login-box">
      <img src="img/logo2.JPG" class="avatar" alt="Avatar Image">
      <h1>Registro</h1>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
        <div id="signupalert" style="display:none" class="alert alert-danger">
                <p>Error:</p>
                <span></span>
              </div>
              
        <!-- NOMBRE INPUT -->
        <label for="nombre">Nombre</label>
        <input type="text" placeholder="Ingresa Tu Usuario" name="nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" required >
           <!-- USUSARIO INPUT -->
        <label for="usuario">Usuario</label>
        <input type="text" placeholder="Ingresa Tu Usuario" name="usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required>
        <!-- PASSWORD INPUT -->
        <label for="password">Contraseña</label>
        <input type="password" placeholder="Ingresa Tu Contraseña" name="password" required>
        <!-- PASSWORD INPUT -->
        <label for="con_password">Confirmar Contraseña</label>
        <input type="password" placeholder="Ingresa Tu Contraseña" name="con_password" required>
        <!-- Email -->
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>" required>
        <!-- Captcha -->
        <label for="captcha"></label>
        <div class="g-recaptcha col-md-9" data-sitekey="6LcvC70UAAAAAF48or3yo3b_Nz8MpGrc4nCpzcvU"></div>
        <!-- BOTON ENVIAR -->
        <br>
        <br>
        <input type="submit" value="Registrar">
        <!-- enlaces -->
        <a href="index.php">Iniciar Sesion</a><br>
        
      </form>
      <?php echo resultBlock($errors); ?>
    </div>
  </body>
</html>

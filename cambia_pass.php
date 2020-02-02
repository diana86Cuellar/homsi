<?php
	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	
	if(empty($_GET['user_id'])){
		header('Location: inicio.php');
	}
	
	if(empty($_GET['token'])){
		header('Location: inicio.php');
	}
	
	$user_id = $mysqli->real_escape_string($_GET['user_id']);
	$token = $mysqli->real_escape_string($_GET['token']);
	
	if(!verificaTokenPass($user_id, $token))
	{
echo 'No se pudo verificar los Datos';
exit;
	}
	
	
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cambio Contraseña</title>
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>

    <div class="login-box">
      <img src="img/logo2.JPG" class="avatar" alt="Avatar Image">
      <h1>Ingresa</h1>
      <form action="guarda_pass.php" method="POST" autocomplete="off">
      	<input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />
					
		<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />
        <!-- USERNAME INPUT -->
        <label for="password">Nueva Contraseña</label>
        <input type="password" placeholder="Contraseña" name="password" required>

        <label for="con_password">Confirmar Contraseña</label>
        <input type="password" placeholder="Contraseña" name="con_password" required>
       
        <input type="submit" value="Modificar">
      </form>
    </div>
  </body>
</html>
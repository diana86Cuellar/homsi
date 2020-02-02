
<?php
  session_start(); //iniciar sesion con segurida
  require 'funcs/conexion.php'; //agregar conexion con el contenido conexion.php y funcs.php
  include 'funcs/funcs.php'; // es incluir funcs.php 
  
  if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
    header("Location: inicio.php");
  }
  
  $idUsuario = $_SESSION['id_usuario']; //que la variable $idUsuario va a ser igual a $_session
  
  $sql = "SELECT id, usuario, nombre, correo FROM usuarios WHERE id = '$idUsuario'";
  $result = $mysqli->query($sql); // la variable $result  guardara el resultado del 'query'
  
  $row = $result->fetch_assoc(); 
?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar </title>
    <link rel="stylesheet" href="css/estiloeditar.css">
  </head>
  <body>

    <div class="login-box">
      <img src="img/editar.jpg" class="avatar" alt="Avatar Image">
      <h1>Editar</h1>
      <form action="actualizar.php" method="POST" autocomplete="off">
        <div id="signupalert" style="display:none" class="alert alert-danger">
                <p>Error:</p>
                <span></span>
              </div>
              
        <!-- NOMBRE INPUT -->
        <label for="nombre">Nombre</label>
        <input type="text"  name="nombre" value="<?php echo $row['nombre']; ?>" required >
           <!-- USUSARIO INPUT -->
        <label for="usuario">Usuario</label>
        <input type="text"  name="usuario" value="<?php echo $row['usuario']; ?>" required>
        
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $row['correo']; ?>"required >
        
       
        <!-- BOTON ENVIAR -->
        <br>
        <br>
        
        <input type="submit" value="Guardar">
        <br>
       <a href="index.php"><input type="button" value="Cacelar"></a>
        <!-- enlaces -->
        
    </div>
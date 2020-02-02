<?php
  session_start(); //iniciar sesion con segurida
  require 'funcs/conexion.php'; //agregar conexion con el contenido conexion.php y funcs.php
  include 'funcs/funcs.php'; // es incluir funcs.php 
  
  if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
    header("Location: inicio.php");
  }
  
  $idUsuario = $_SESSION['id_usuario']; //que la variable $idUsuario va a ser igual a $_session
  
  $sql = "SELECT id, nombre FROM usuarios WHERE id = '$idUsuario'";
  $result = $mysqli->query($sql); // la variable $result  guardara el resultado del 'query'
  
  $row = $result->fetch_assoc(); 
   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Homsi</title>
        <body>
        	<h1>Aun no tiene un Rol asignado, por favor contactese con el administrador</h1>

        	<a href="logout.php"><button type="button" class="btn btn-primary"> CERRAR SESION</button></a>
        </body>
<?php

session_start(); //iniciar sesion con segurida
  require 'funcs/conexion.php'; //agregar conexion con el contenido conexion.php y funcs.php
  include 'funcs/funcs.php'; // es incluir funcs.php 
  
  if(!isset($_SESSION["id_usuario"])){ //Si no ha iniciado sesión redirecciona a index.php
    header("Location: inicio.php");
  }

    $idusuario = $_SESSION['id_usuario']; //que la variable $idUsuario va a ser igual a $_session

//se crean variables que se recogen con el metodo POST
  $nombre = $_POST['nombre'];
  $usuario = $_POST['usuario'];
  $correo = $_POST['correo'];
  
  //Sentencia para hacer la actualizacion
  $sql = "UPDATE Usuarios SET nombre='$nombre', usuario='$usuario', correo='$correo' WHERE id = '$idusuario'";
  //ejecucuion de la sentencia
  $result = $mysqli->query($sql);

  //echo $result;
//si la actualizacion fue correcta muestra el aviso
	echo "<script language=\"javascript\">alert(\"Se actualizo correctamente\" );document.location.href='inicio.php';</script>";

  ?>
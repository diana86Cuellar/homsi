<?php
	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	
	if(isset($_GET["id"]) AND isset($_GET['val']))
	{
		
		$idUsuario = $_GET['id'];
		$token = $_GET['val'];
		
		$mensaje = validaIdToken($idUsuario, $token);	
	}

	echo "<script language=\"javascript\">alert(\"$mensaje\");document.location.href='inicio.php';</script>";
?>


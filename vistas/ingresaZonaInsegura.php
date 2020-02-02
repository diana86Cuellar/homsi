
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
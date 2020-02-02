
<!DOCTYPE html>
<html lang="en">
  <head>  
    <meta charset="utf-8">
    <title>INCAPACIDAD HOME SENTRY </title>
    <link rel="stylesheet" href="../css/cssIncapacidad.css">   
      
  </head>
  <body>
    <div class="login-box">   
    <img src="../img/editar.jpg" class="avatar" alt="Avatar Image">
      <h1>Ingresar Incapacidad</h1>   
      <Form action='../controlador/incapacidadController.php' method='post' autocomplete="off">
            <div id="signupalert" style="display:none" class="alert alert-danger">
                <p>Error:</p>
                <span></span>
              </div>
          
          <!-- NOMBRE INPUT -->
        <label for="nombre">Código Incapacidad</label>
        <input type="text"  name="id" required >
           
        <label for="usuario">fecha Incapacidad</label>
        <input type="date"  name="fecha" required>
        
        <label for="email">Duración de Incapacidad</label>
        <input type="text" class="form-control" name="dias" required >

        <label for="email">Tipo</label>
        <input type="text" class="form-control" name="tipo" required >

        <label for="email">Area</label>
        <input type="text" class="form-control" name="area" required >

        <label for="email">Identificación Empleado</label>
        <input type="text" class="form-control" name="id_Empleado" required >

        <label for="email">Implicados</label>
        <input type="text" class="form-control" name="implicados" required >

        <label for="email">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" required >

        
        <!-- BOTON ENVIAR -->
        <br>
        <br>
        
        <input name="insertar" value="insertar" type="submit" value="Guardar">        
        <a href="../index.php"><input type="button" value="Cancelar"></a>
        <br>          
      </Form> 
<footer>   
</footer>    
</body>
</html>


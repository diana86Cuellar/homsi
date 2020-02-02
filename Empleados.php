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
          <title>Sistema Homsi</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<link rel="stylesheet" type="text/css" href="./estilo.css">

  	    <!-- Bootstrap CSS -->
  	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">

  	</script>
      </head>
     <body style=" background: aqua">        
         
          <form action="recibeEmpleado.php" method="post">
              <h3 text align="center"><b><i>  </i></b></h3>
          <br>
              
            <div>
            <p  text align="center">
                
              <img src="./img/logo_empresa.jpg"  ><br>  
              
              <br>
              <h2 text align="center" <b><i> BUSCAR EMPLEADO </i></b></h2>
              
              <br>
              
              
              <table border="1" width="300" text align="center">
                 
                  <tr bgcolor="skyblue">
                      <th> ID: </th>
                  <th>
                      <input type="text"  name="textid" style="width : 300px">
                  </th>
                  
                  </table>                
                           
                 <br>            
              </tr>
             </p>   
            </dvi>     
                  
          <div style align="center">
           <a href="index.php"><button type="button" class="btn btn-primary"> VALIDAR ID</button></a>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <a href="index.php"> <button type="button" class="btn btn-danger"> CANCELAR </button></a>

          </div>

          <?php
              include ("database.php");
              $clientes= new Database();
              if(isset($_POST) && !empty($_POST)){
                $nombres = $clientes->sanitize($_POST['nombres']);
                $apellidos = $clientes->sanitize($_POST['apellidos']);
                $telefono = $clientes->sanitize($_POST['telefono']);
                $direccion = $clientes->sanitize($_POST['direccion']);
                $correo_electronico = $clientes->sanitize($_POST['correo_electronico']);
                
                $res = $clientes->create($nombres, $apellidos, $telefono, $direccion, $correo_electronico);
                if($res){
                  $message= "Datos insertados con éxito";
                  $class="alert alert-success";
                }else{
                  $message="No se pudieron insertar los datos";
                  $class="alert alert-danger";
                }
                
                ?>
              <div class="<?php echo $class?>">
                <?php echo $message;?>
              </div>  
                <?php
              }
      
          ?>
        
          </form>
      </body>
  </html>

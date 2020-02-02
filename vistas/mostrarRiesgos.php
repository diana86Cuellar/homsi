<?php
//incluye la clase Incapacidad y CrudIncapacidad
require_once('../modelo/crud_incapacidad.php');
require_once('../modelo/incapacidadModelo.php');
$crud=new CrudIncapacidad();
$incapacidad= new Incapacidad();

$incapacidades=$crud->mostrar();
?>
<html>
<head>
	<title>Mostrar Incapacidad</title>
</head>
<body>
    <?php include_once '../config/header.php'; ?>    
    <?php include_once '../config/nav.php'; ?>    
	<table border=1>
		<head>
			<td>Codigo</td>
			<td>Fecha de Incapacidad</td>
			<td>Duración</td>
			<td>Tipo</td>
            <td>Area</td>
            <td>Identificación Empleado</td>
			<td>Implicados</td>
			<td>Descripción</td>
		</head>
		<body>
			<?php foreach ($incapacidades as $incapacidad) {?>
			<tr>
				<td><?php echo $incapacidad->getId() ?></td>
				<td><?php echo $incapacidad->getFecha() ?></td>
                <td><?php echo $incapacidad->getDias()?> </td>
                <td><?php echo $incapacidad->getTipo() ?></td>
				<td><?php echo $incapacidad->getArea() ?></td>
                <td><?php echo $incapacidad->getId_Empleado()?> </td>
                <td><?php echo $incapacidad->getImplicados() ?></td>
				<td><?php echo $incapacidad->getDescripcion()?> </td>
				<td><a href="actualizarIncapacidad.php?id=<?php echo $incapacidad->getId()?>&accion=a">Actualizar</a> </td>
				<td><a href="../controlador/incapacidadController.php?id=<?php echo $incapacidad->getId()?>&accion=e">Eliminar</a>   </td>
			</tr>
            <?php }?>            
		</body>
	</table>
    <a href="../index.php">Volver</a>
    <footer>
        <?php include_once '../config/footer.php'; ?>
    </footer>
</body>
</html>
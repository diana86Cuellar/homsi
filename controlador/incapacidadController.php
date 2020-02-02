<?php
//incluye la clase Libro y CrudLibro
require_once('../modelo/crud_incapacidad.php');
require_once('../modelo/incapacidadModelo.php');

$crudInca= new CrudIncapacidad();
$incapacidado= new Incapacidad();

	// si el elemento insertar no viene nulo llama al crud e inserta un libro
	if (isset($_POST['insertar'])) {
		$incapacidado->setId($_POST['id']);
		$incapacidado->setFecha($_POST['fecha']);			
		$incapacidado->setDias($_POST['dias']);
        $incapacidado->setTipo($_POST['tipo']);
        $incapacidado->setArea($_POST['area']);
		$incapacidado->setId_Empleado($_POST['id_Empleado']);
		$incapacidado->setImplicados($_POST['implicados']);
		$incapacidado->setDescripcion($_POST['descripcion']);
		//llama a la función insertar definida en el crud
		$crudInca->insertar($incapacidado);
		echo "<script language=\"javascript\">alert(\Registro insertado con exito</script>";
		header('Location: ../index.php');
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el libro
	}elseif(isset($_POST['actualizar'])){
		$incapacidado->setId($_POST['id']);
		$incapacidado->setFecha($_POST['fecha']);			
		$incapacidado->setDias($_POST['dias']);
        $incapacidado->setTipo($_POST['tipo']);
        $incapacidado->setArea($_POST['area']);
		$incapacidado->setId_Empleado($_POST['id_Empleado']);
		$incapacidado->setImplicados($_POST['implicados']);
		$incapacidado->setDescripcion($_POST['descripcion']);
		$crudInca->actualizar($incapacidado);
		header('Location: ../index.php');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un libro
	}elseif ($_GET['accion']=='e') {
		$crudInca->eliminar($_GET['id']);
		header('Location: ../index.php');		
	// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php 
	}elseif($_GET['accion']=='a'){
		header('Location: ../vistas/actualizarIncapacidad.php');
	}
?>
<?php
//incluye la clase Incapacidad y CrudIncapacidad
	require_once('../modelo/crud_incapacidad.php');
	require_once('../modelo/incapacidadModelo.php');
	$crud= new CrudIncapacidad();
	$incapacidad=new Incapacidad();
	//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
    $incapacidad=$crud->obtenerIncapacidad($_GET['id']);   
?>
<html>
<head>
	<title>Actualizar Incapacidad</title>
</head>
<body>
    <?php include_once '../config/header.php'; ?>    
    <?php include_once '../config/nav.php'; ?>  
	<form action='../controlador/incapacidadController.php' method='post'>
	<table>
        <div align="center">
                <div align="center" class="form-group row" >
                  <label align="center" class="col-xl-5 col-form-label">Código Incapacidad</label>
                    <div class="col-6 col-lg-8 col-xl-6">
                      <input class="button" disabled="false" maxlength="10" name="id" value='<?php echo $incapacidad->getId()?>'>
                    </div>
                </div>
                <div align="center" class="form-group row" >
                  <label align="center" class="col-xl-5 col-form-label">fecha Incapacidad</label>
                    <div class="col-6 col-lg-8 col-xl-6">
                      <input class="button" maxlength="12" required type="date" name="fecha" value='<?php echo $incapacidad->getFecha()?>'>
                    </div>
                </div>
                <div align="center" class="form-group row" >
                  <label align="center" class="col-xl-5 col-form-label">Duración de Incapacidad</label>
                    <div class="col-6 col-lg-8 col-xl-6">
                      <input class="button" maxlength="10" required type="type" name="dias" value='<?php echo $incapacidad->getDias()?>'>
                    </div>
                </div>
                <div align="center" class="form-group row" >
                  <label align="center" class="col-xl-5 col-form-label">Tipo</label>
                    <div class="col-6 col-lg-8 col-xl-6">
                    <select name="tipo" required name="tipo" id="tipo" class="button" value='<?php echo $incapacidad->getTipo()?>'>
                        <option value="">--Selecciona--</option>
                        <option value="A">ARL</option>
                        <option value="E">EPS</option>
                    </select>
                    </div>
                </div>
                <div align="center" class="form-group row" >
                  <label align="center" class="col-xl-5 col-form-label">Area</label>
                    <div class="col-6 col-lg-8 col-xl-6">
                    <select name="area" name="area" id="area" class="button" value='<?php echo $incapacidad->getArea()?>'>
                        <option value="">--Selecciona--</option>
                        <option value="Picking">Picking</option>
                        <option value="Packing">Packing</option>
                        <option value="Nacionales">Nacionales</option>
                        <option value="Crosdoking">Crosdoking</option>
                    </select>
                    </div>
                </div>
                <div align="center" class="form-group row" >
                  <label align="center" class="col-xl-5 col-form-label">Identificación Empleado</label>
                    <div class="col-6 col-lg-8 col-xl-6">
                      <input class="button" maxlength="15" required type="type" name="id_Empleado" value='<?php echo $incapacidad->getId_Empleado()?>'>
                    </div>
                </div>                
                <div align="center" class="form-group row" >
                  <label align="center" class="col-xl-5 col-form-label">Implicados</label>
                    <div class="col-6 col-lg-8 col-xl-6">
                      <input class="button" maxlength="15" type="type" name="implicados" value='<?php echo $incapacidad->getImplicados()?>'>
                    </div>
                </div>                
                <div align="center" class="form-group row" >
                  <label align="center" class="col-xl-5 col-form-label">Descripcion</label>
                    <div class="col-6 col-lg-8 col-xl-6">
                      <textarea name="descripcion" rows="4" cols="70" maxlength="100" class="button" value='<?php echo $incapacidad->getDescripcion()?>'></textarea>
                    </div>
                </div>  		
		<input type='hidden' name='actualizar' value='actualizar'>
	</table>
	<input type='submit' value='Guardar'>
	<a href="../index.php">Volver</a>
</form>
</body>
</html>
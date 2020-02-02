<?php
// incluye la clase Db
require_once('../config/conexion.php');

	class CrudIncapacidad{
		// constructor de la clase
		public function __construct(){}

		// método para insertar, recibe como parámetro un objeto de tipo incapacidadModelo
		public function insertar($incapacidad){
			$db=Db::conectar();
            $insert=$db->prepare('INSERT INTO `tb_incapacidad`(`id`, `fecha`, `dias`, `tipo`, `area`, `id_Empleado`, `implicados`, `descripcion`) VALUES(:id,:fecha,:dias,:tipo,:area,:id_Empleado,:implicados,:descripcion)');
            $insert->bindValue('id',$incapacidad->getId());
			$insert->bindValue('fecha',$incapacidad->getFecha());
            $insert->bindValue('dias',$incapacidad->getDias());
            $insert->bindValue('tipo',$incapacidad->getTipo());
            $insert->bindValue('area',$incapacidad->getArea());
			$insert->bindValue('id_Empleado',$incapacidad->getId_Empleado());            
            $insert->bindValue('implicados',$incapacidad->getImplicados());
			$insert->bindValue('descripcion',$incapacidad->getDescripcion());			
			$insert->execute();

		}
		// método para mostrar todos los incapacidades
		public function mostrar(){
			$db=Db::conectar();
			$listaIncapacidad=[];
			$select=$db->query('SELECT * FROM tb_incapacidad');

			foreach($select->fetchAll() as $incapacidad){
				$myIncapacidad= new Incapacidad();
				$myIncapacidad->setId($incapacidad['id']);
				$myIncapacidad->setFecha($incapacidad['fecha']);
				$myIncapacidad->setDias($incapacidad['dias']);
                $myIncapacidad->setTipo($incapacidad['tipo']);
                $myIncapacidad->setArea($incapacidad['area']);
				$myIncapacidad->setId_Empleado($incapacidad['id_Empleado']);
				$myIncapacidad->setImplicados($incapacidad['implicados']);
				$myIncapacidad->setDescripcion($incapacidad['descripcion']);
				$listaIncapacidad[]=$myIncapacidad;
			}
			return $listaIncapacidad;
		}

		// método para eliminar un Incapacidad, recibe como parámetro el id de la incapacidad
		public function eliminar($id){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM tb_incapacidad WHERE id=:id');
			$eliminar->bindValue('id',$id);
			$eliminar->execute();
		}

		// método para buscar una incapacidad, recibe como parámetro el id de la incapacidad
		public function obtenerIncapacidad($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM tb_incapacidad WHERE id=:id');
			$select->bindValue('id',$id);
			$select->execute();
			$incapacidad=$select->fetch();
			$myIncapacidad= new Incapacidad();
			$myIncapacidad->setId($incapacidad['id']);
			$myIncapacidad->setFecha($incapacidad['fecha']);
			$myIncapacidad->setDias($incapacidad['dias']);
            $myIncapacidad->setTipo($incapacidad['tipo']);
            $myIncapacidad->setArea($incapacidad['area']);
			$myIncapacidad->setId_Empleado($incapacidad['id_Empleado']);
			$myIncapacidad->setImplicados($incapacidad['implicados']);
			$myIncapacidad->setDescripcion($incapacidad['descripcion']);
			return $myIncapacidad;
		}

		// método para actualizar un Incapacidad, recibe como parámetro la incapacidad
		public function actualizar($incapacidad){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE tb_incapacidad SET fecha=:fecha, dias=:dias, tipo=:tipo, area=:area, id_Empleado=:id_Empleado, implicados=:implicados, descripcion=:descripcion  WHERE id=:id');            
			$actualizar->bindValue('id',$incapacidad->getId());	
			$actualizar->bindValue('fecha',$incapacidad->getFecha());
            $actualizar->bindValue('dias',$incapacidad->getDias());
            $actualizar->bindValue('tipo',$incapacidad->getTipo());
            $actualizar->bindValue('area',$incapacidad->getArea());
			$actualizar->bindValue('id_Empleado',$incapacidad->getId_Empleado());            
            $actualizar->bindValue('implicados',$incapacidad->getImplicados());
			$actualizar->bindValue('descripcion',$incapacidad->getDescripcion());			
			$actualizar->execute();
		}
	}
?>
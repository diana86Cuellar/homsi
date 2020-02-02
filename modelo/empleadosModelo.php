<?php
	class Empleado{
		private $id;
		private $nombre;
		private $apellidos;
		private $telefono;
		private $direccion;
		private $correo_electronico;


		function __construct(){}

		public function getNombre(){
		return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getApellido(){
		return $this->nombre;
		}

		public function setApellido($nombre){
			$this->nombre = $nombre;
		}
		public function getDireccion(){
		return $this->nombre;
		}

		public function setDireccion($nombre){
			$this->nombre = $nombre;
		}

		public function getCorreo_electronico(){
		return $this->nombre;
		}

		public function setCorreo_electronico($nombre){
			$this->nombre = $nombre;
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}
	}
?>
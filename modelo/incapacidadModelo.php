<?php
//esta clase es una copia de los datos de la base de datos
// tablas involucradas: tb_incapacidad
// getters y setters de todas las variables 

	class Incapacidad{
		private $id;
		private $fecha;
		private $dias;
                private $tipo;
                private $id_Empleado;
                private $area;
                private $implicados;
                private $descripcion;
                private $fecha_inser;
                private $usuario_inser;
                private $fecha_modi;
                private $usuario_modi;

        function __construct(){}   
        
	public function getId()
	{
		return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;
		return $this;
        }        
	public function getFecha()
	{
		return $this->fecha;
	}
	public function setFecha($fecha)
	{
		$this->fecha = $fecha;
		return $this;
        }        
	public function getDias()
	{
		return $this->dias;
	}
	public function setDias($dias)
	{
		$this->dias = $dias;
		return $this;
        }
        public function getTipo()
        {
                return $this->tipo;
        }
        public function setTipo($tipo)
        {
                $this->tipo = $tipo;
                return $this;
        }
        public function getId_Empleado()
        {
                return $this->id_Empleado;
        }
        public function setId_Empleado($id_Empleado)
        {
                $this->id_Empleado = $id_Empleado;
                return $this;
        }
        public function getArea()
        {
                return $this->area;
        }
        public function setArea($area)
        {
                $this->area = $area;
                return $this;
        }
        public function getImplicados()
        {
                return $this->implicados;
        }
        public function setImplicados($implicados)
        {
                $this->implicados = $implicados;
                return $this;
        }
        public function getDescripcion()
        {
                return $this->descripcion;
        }
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;
                return $this;
        }
        public function getFecha_inser()
        {
                return $this->fecha_inser;
        }
        public function setFecha_inser($fecha_inser)
        {
                $this->fecha_inser = $fecha_inser;
                return $this;
        }
        public function getUsuario_inser()
        {
                return $this->usuario_inser;
        }
        public function setUsuario_inser($usuario_inser)
        {
                $this->usuario_inser = $usuario_inser;
                return $this;
        }
        public function getFecha_modi()
        {
                return $this->fecha_modi;
        }
        public function setFecha_modi($fecha_modi)
        {
                $this->fecha_modi = $fecha_modi;
                return $this;
        }
        public function getUsuario_modi()
        {
                return $this->usuario_modi;
        }
        public function setUsuario_modi($usuario_modi)
        {
                $this->usuario_modi = $usuario_modi;
                return $this;
        }
	}
?>
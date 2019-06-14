<?php 
	class Conexion
	{
		private $servidor;
		private $usuario;
		private $clave;
		private $bd;
		/**
		 * 
		*/
		protected  function __construct()
		{
			$datosConectar = require_once '../config/datos_conexion.php';
			$this->servidor = $datosConectar['servidor'];
			$this->usuario = $datosConectar['usuario'];
			$this->clave = $datosConectar['clave'];
			$this->bd = $datosConectar['bd'];
			$conexion = new PDO("mysql:host=$this->servidor;dbname=$this->bd;charset=utf8",$this->usuario,$this->clave);
	        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        return $conexion;
		}
	}

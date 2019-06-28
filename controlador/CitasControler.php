<?php 
	include '../modelo/CitasModel.php';
	include '../core/Sanitizar.php';

	class CitasControler extends CitasModel
	{
		private $obj_CitasModel;
		/**
		* 
		*/
		public  function __construct()
		{
			$this->obj_CitasModel = new CitasModel;
			$this->obj_Sanitizar = new Sanitizar;
		}
		/**
		* 
		*/
		public function cargarSolicitud ()
		{
			$disponibilidad = $this->obj_CitasModel->citasDisponibles();
			if ($disponibilidad==0)
			{
				return include '../vistas/usuario/alertas/errorSolicitarCita.php';
			}
			else
			{
				$tiposCitas = $this->obj_CitasModel->getTipocitas();
				return include '../vistas/citas/form_solicitar.php';	
			}
		}
		/**
		* 
		*/
		public  function comboSedes()
		{
			$datoslimpios = Sanitizar::sanitizaXSS(['buscar'],['numero']);
			$tiposSedes = $this->obj_CitasModel->getSedes($datoslimpios[0]);
			$_SESSION['tipocita'] = $datoslimpios[0];
			return include '../vistas/usuario/combos/sedes.php';
		}
		/**
		* 
		*/
		public  function comboFechas()
		{
			$datoslimpios = Sanitizar::sanitizaXSS(['buscar'],['numero']);
			$fechas = $this->obj_CitasModel->getFechas($_SESSION['tipocita'],$datoslimpios[0]);
			$_SESSION['sede'] = $datoslimpios[0];
			return include '../vistas/usuario/combos/fechas.php';
		}
		/**
		* 
		*/
		public  function comboHorarios()
		{
			$datoslimpios = Sanitizar::sanitizaXSS(['buscar'],['fecha']);
			$horarios = $this->obj_CitasModel->getHorarios($_SESSION['tipocita'],$_SESSION['sede'],$datoslimpios[0]);
			$_SESSION['fecha'] = $datoslimpios[0];
			return include '../vistas/usuario/combos/horarios.php';
		}
		/**
		* 
		*/
		public  function comboFinal()
		{
			$datoslimpios = Sanitizar::sanitizaXSS(['buscar'],['hora']);
			$_SESSION['horario'] = $datoslimpios[0];
			return include '../vistas/usuario/combos/botones.php';
		}
		/**
		* 
		*/
		public  function guardarCita()
		{
			$datosUpdate = [$_SESSION['tipocita'],$_SESSION['sede'],$_SESSION['fecha'],$_SESSION['horario'])];
		}
		
	}

<?php 
	namespace controlador; 
	use modelo\CitasModel;
	use core\Sanitizar;
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
			$datosUpdate = [$_SESSION['tipocita'],$_SESSION['sede'],$_SESSION['fecha'].' '.$_SESSION['horario']];
			$this->obj_CitasModel->setAgenda($datosUpdate);
			return include '../vistas/usuario/alertas/exitoCrearCita.php';
		}
		/**
		* 
		*/
		public  function cargarAgenda()
		{
			$disponibilidad = $this->obj_CitasModel->agendaDisponible();
			if ($disponibilidad>0)
			{
				$agenda = $this->obj_CitasModel->getAgendaPaciente();
				$fecha_actual = strtotime(date("Y-m-d").'24:00:00');
				return include '../vistas/usuario/agenda.php';
			}
			else
			{	
				return include '../vistas/usuario/alertas/errorSolicitarCita.php';
			}
		}
		/**
		* 
		*/
		public  function cancelarCita()
		{
			$datoslimpios = Sanitizar::sanitizaXSS(['buscar'],['numero']);
			$this->obj_CitasModel->cancelAgenda($datoslimpios[0]);
			return include '../vistas/usuario/alertas/exitoCancelarCita.php';
		}
		
	}

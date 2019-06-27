<?php 
	include '../modelo/CitasModel.php';
	include '../core/Sanitizar.php';

	class AgendaControler extends CitasModel
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
		public function crearSolicitud ()
		{
			$sedes = $this->obj_CitasModel->getSedes();
			return include '../vistas/citas/form_crear.php';
		}
		/**
		* 
		*/
		public  function guardarAgenda()
		{
			$datoslimpios = Sanitizar::sanitizaXSS(['fecha','sede'],['fecha','numero']);
			$fecha_actual = strtotime(date("Y-m-d"));
			$fecha_entrada = strtotime($datoslimpios[0]);
			$existenciaAgenda=$this->obj_CitasModel->validarAgenda($datoslimpios[0]);
			if($fecha_actual > $fecha_entrada)
			{
				return include '../vistas/medico/alertas/errorFecha.php';
			}
			elseif($existenciaAgenda>0)
			{
				return include '../vistas/medico/alertas/errorAgenda.php';
			}
			else
			{
				$this->obj_CitasModel->insertAgenda($datoslimpios[1],$datoslimpios[0]);
				return include '../vistas/medico/alertas/exitoCrearAgenda.php';
			}
		}	
		/**
		* 
		*/
		public function listarAgenda ()
		{
			return include '../vistas/citas/form_listar_agenda.php';
		}
		/**
		* 
		*/
		public function verAgenda ()
		{
			$datoslimpios = Sanitizar::sanitizaXSS(['buscar'],['fecha']);
			$existenciaAgenda=$this->obj_CitasModel->validarAgenda($datoslimpios[0]);
			if($existenciaAgenda==0)
			{
				$fecha_actual = strtotime(date("Y-m-d"));
				$fecha_entrada = strtotime($datoslimpios[0]);
				if($fecha_actual > $fecha_entrada)
				{
					return include '../vistas/medico/alertas/errorAgendaDesactualizada.php';
				}
				else
				{
					return include '../vistas/medico/alertas/errorAgendaInexistente.php';
				}	
			}
			$datosAgenda = $this->obj_CitasModel->getAgenda($datoslimpios[0]);
			if (is_array($datosAgenda))
			{
				return include '../vistas/medico/agenda.php';
			}
			else
			{
				return include '../vistas/medico/alertas/errorAgendaSinPacientes.php';
			}
			
		}
	}

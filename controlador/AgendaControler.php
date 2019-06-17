<?php 
	include '../modelo/CitasModel.php';

	class AgendaControler extends CitasModel
	{
		private $obj_CitasModel;
		/**
		* 
		*/
		public  function __construct()
		{
			$this->obj_CitasModel = new CitasModel;
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
			$fecha_actual = strtotime(date("Y-m-d"));
			$fecha_entrada = strtotime($_POST['fecha']);
			$existenciaAgenda=$this->obj_CitasModel->validarAgenda($_POST['fecha']);
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
				$this->obj_CitasModel->insertAgenda($_POST['sede'],$_POST['fecha']);
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
			$existenciaAgenda=$this->obj_CitasModel->validarAgenda($_POST['buscar']);
			if($existenciaAgenda==0)
			{
				$fecha_actual = strtotime(date("Y-m-d"));
				$fecha_entrada = strtotime($_POST['buscar']);
				if($fecha_actual > $fecha_entrada)
				{
					return include '../vistas/medico/alertas/errorAgendaDesactualizada.php';
				}
				else
				{
					return include '../vistas/medico/alertas/errorAgendaInexistente.php';
				}	
			}
			$datosAgenda = $this->obj_CitasModel->getAgenda($_POST['buscar']);
			return include '../vistas/medico/agenda.php';
		}
	}

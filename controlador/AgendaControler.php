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
			return include '../vistas/medico/agenda.php';
			//SELECT IF(tb_agenda_medica.cedula_paciente=0,'DISPONIBLE',CONCAT(tb_user.primer_nombre," ",tb_user.segundo_nombre)) as nombre,prm_sedes.nombre_sede,tb_agenda_medica.horario FROM tb_agenda_medica INNER JOIN tb_user ON tb_agenda_medica.cedula_paciente = tb_user.cedula INNER JOIN prm_sedes on tb_agenda_medica.id_sede = prm_sedes.id_sede WHERE tb_agenda_medica.horario LIKE '%2019-06-14%'
		}
	}

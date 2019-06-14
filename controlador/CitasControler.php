<?php 
	include '../modelo/CitasModel.php';

	class CitasControler extends CitasModel
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
		public function cargarSolicitud ()
		{
			$disponibilidad = $this->obj_CitasModel->citasDisponibles();
			if ($disponibilidad==0)
			{
				return include '../vistas/alertas/danger.php';
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
			echo ' <option selected="selected">Seleccione una sedes</option>';
		}
		
	}

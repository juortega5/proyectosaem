<?php 
	include '../modelo/LoguinModel.php';

	class LoguinControler extends LoguinModel
	{
		private $obj_LoguinModel;
		/**
		* 
		*/
		public  function __construct()
		{
			$this->obj_LoguinModel = new LoguinModel;
		}
		/**
		* 
		*/
		public function validarUsuario ()
		{
			$datosLoguin = $this->obj_LoguinModel->validar($_POST['usuario'],$_POST['password']);
			if (is_array($datosLoguin))
			{
				$_SESSION['usuario'] = $datosLoguin[0]->cedula;
				$_SESSION['rol'] = $datosLoguin[0]->id_rol;
				switch ($datosLoguin[0]->id_rol) 
				{
					case '1':
						return include '../vistas/medico/opciones.php';
					break;
					
					case '2':
						return include '../vistas/usuario/opciones.php';
					break;
				}
			}
			else
			{
				return include '../vistas/alertas/danger.php';
			}
		}
		
	}

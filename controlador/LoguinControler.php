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
				$_SESSION['clave'] = $datosLoguin[0]->clave;
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
		/**
		* 
		*/
		public function actualizarDatos ()
		{
			$datosUser = $this->obj_LoguinModel->validar($_SESSION['usuario'],$_SESSION['clave']);
			return include '../vistas/form_actualiza.php';
		}
		/**
		* 
		*/
		public function setActualizarDatos ()
		{
			$arrayDatos = 	[
								$_POST['primer_nombre'],$_POST['segundo_nombre'],$_POST['primer_apellido'],$_POST['segundo_apellido'],
								$_POST['celular'],$_POST['direccion'],$_POST['correo']
							];
			$this->obj_LoguinModel->setUser($arrayDatos);
			return include '../vistas/alertas/actualizarDatosExito.php';
		}
		/**
		* 
		*/
		public function cambiaClave ()
		{
			return include '../vistas/form_clave.php';
		}
		/**
		* 
		*/
		public function guardarClave ()
		{
			if ($_POST['clave']!=$_SESSION['clave'] || $_POST['clave']==$_POST['nueva_clave'])
			{
				return include '../vistas/alertas/errorClave.php';
			}
			$arrayDatos = [$_POST['nueva_clave']];
			$this->obj_LoguinModel->setClave($arrayDatos);
			return include '../vistas/alertas/exitoClave.php';
		}
		
	}

<?php 
	include '../modelo/LoguinModel.php';
	include '../core/Sanitizar.php';

	class LoguinControler extends LoguinModel
	{
		private $obj_LoguinModel;
		/**
		* 
		*/
		public  function __construct()
		{
			$this->obj_LoguinModel = new LoguinModel;
			$this->obj_Sanitizar = new Sanitizar;
		}
		/**
		* 
		*/
		public function crearRegistro ()
		{
			return include '../vistas/form_registro.php';
		}
		/**
		* 
		*/
		public function setRegisterDatos ()
		{
			$datoslimpios = Sanitizar::sanitizaXSS(
								[
								'primer_nombre','segundo_nombre','primer_apellido','segundo_apellido',
								'celular','direccion','correo','cedula','clave'
								],
								['text','text','text','text','numero','direccion','correo','numero','logueo']);
			$datosLoguin = $this->obj_LoguinModel->validar($datoslimpios[7]);
			if (!is_array($datosLoguin)) 
			{
				$this->obj_LoguinModel->setRegisterUser($datoslimpios);
				return include '../vistas/alertas/exitoUsuario.php';
			}
			else
			{
				return include '../vistas/alertas/usuarioExiste.php';
			}

		}
		/**
		* 
		*/
		public function validarUsuario ()
		{
			$datoslimpios = Sanitizar::sanitizaXSS(['usuario','password'],['logueo','logueo']);
			$datosLoguin = $this->obj_LoguinModel->validar($datoslimpios[0]);
			if (is_array($datosLoguin))
			{
				$_SESSION['usuario'] = $datosLoguin[0]->cedula;
				$_SESSION['rol'] = $datosLoguin[0]->id_rol;
				if (password_verify($datoslimpios[1], $datosLoguin[0]->clave)) 
				{
					$_SESSION['clave'] = $datosLoguin[0]->clave;
				}
				else
				{
					return include '../vistas/alertas/danger.php';
				}
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
			$datosUser = $this->obj_LoguinModel->validar($_SESSION['usuario']);
			return include '../vistas/form_actualiza.php';
		}
		/**
		* 
		*/
		public function setActualizarDatos ()
		{
			$datoslimpios = Sanitizar::sanitizaXSS(
								[
								'primer_nombre','segundo_nombre','primer_apellido','segundo_apellido',
								'celular','direccion','correo'
								],
								['text','text','text','text','numero','direccion','correo']);
			$this->obj_LoguinModel->setUser($datoslimpios);
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
			$datoslimpios = Sanitizar::sanitizaXSS(['clave','nueva_clave'],['logueo','logueo']);
			if (!password_verify($datoslimpios[0],$_SESSION['clave']) || $datoslimpios[0]==$datoslimpios[1])
			{
				return include '../vistas/alertas/errorClave.php';
			}
			$arrayDatos = [$datoslimpios[1]];
			$this->obj_LoguinModel->setClave($arrayDatos);
			$datosnuevaSesion = $this->obj_LoguinModel->validar($_SESSION['usuario']);
			$_SESSION['clave'] = $datosnuevaSesion[0]->clave;
			return include '../vistas/alertas/exitoClave.php';
		}
			/*$clave = password_hash($_SESSION['clave'], PASSWORD_BCRYPT);
			echo $clave;
			if (password_verify('123', $clave)) {
			echo '¡La contraseña es válida!';
			} else {
			echo 'La contraseña no es válida.';
			}*/
		
	}

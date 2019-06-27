<?php 
	include '../core/Query.php';

	class LoguinModel extends Query
	{
		private $obj_Query;
		/**
		* 
		*/
		public  function __construct()
		{
			$this->obj_Query = new Query("tb_user");
		}
		/**
		* 
		*/
		public function validar($usuario)
		{
			$arrayDatos = ['usuario' => $usuario];
			$conteo = $this->obj_Query->select("COUNT(CEDULA) AS CONTEO","cedula=:usuario",$arrayDatos);
			if ($conteo[0]->CONTEO > 0)
			{
				$infoUsuario = $this->obj_Query->select("*","cedula=:usuario",$arrayDatos);
				return $infoUsuario;
			}
			else
			{
				return $conteo[0]->CONTEO;	
			}	
		}
		/**
		* 
		*/
		public function setRegisterUser($arrayDatos)
		{
			$datosInsert = 
			[
				'cedula' => strtoupper($arrayDatos[7]),
				'primer_nombre' => strtoupper($arrayDatos[0]),
				'segundo_nombre' => strtoupper($arrayDatos[1]),
				'primer_apellido' => strtoupper($arrayDatos[2]),
				'segundo_apellido' => strtoupper($arrayDatos[3]),
				'celular' => $arrayDatos[4],
				'direccion' => strtoupper($arrayDatos[5]),
				'correo' => $arrayDatos[6],
				'clave' => password_hash($arrayDatos[8], PASSWORD_BCRYPT),	
				'id_rol'=>'2'
			];
			$this->obj_Query->insertar("primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,celular,direccion,correo,cedula,clave,id_rol",":primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:celular,:direccion,:correo,:cedula,:clave,:id_rol",$datosInsert);
		}
		/**
		* 
		*/
		public function setUser($arrayDatos)
		{
			$datosUpdate = 
			[
				'cedula' => $_SESSION['usuario'],
				'primer_nombre' => strtoupper($arrayDatos[0]),
				'segundo_nombre' => strtoupper($arrayDatos[1]),
				'primer_apellido' => strtoupper($arrayDatos[2]),
				'segundo_apellido' => strtoupper($arrayDatos[3]),
				'celular' => $arrayDatos[4],
				'direccion' => strtoupper($arrayDatos[5]),
				'correo' => $arrayDatos[6]				
			];
			$this->obj_Query->update("primer_nombre=:primer_nombre,segundo_nombre=:segundo_nombre,primer_apellido=:primer_apellido,segundo_apellido=:segundo_apellido,celular=:celular,direccion=:direccion,correo=:correo","cedula=:cedula",$datosUpdate);
		}
		/**
		* 
		*/
		public function setClave($arrayDatos)
		{
			$datosUpdate = 
			[
				'cedula' => $_SESSION['usuario'],
				'clave' => password_hash($arrayDatos[0], PASSWORD_BCRYPT),	
			];
			$this->obj_Query->update("clave=:clave","cedula=:cedula",$datosUpdate);
		}
	}
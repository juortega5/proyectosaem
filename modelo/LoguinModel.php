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
		public function validar($usuario,$clave)
		{
			$arrayDatos = ['usuario' => $usuario,'clave' => $clave];
			$conteo = $this->obj_Query->select("COUNT(CEDULA) AS CONTEO","cedula=:usuario AND clave=:clave",$arrayDatos);
			if ($conteo[0]->CONTEO > 0)
			{
				$infoUsuario = $this->obj_Query->select("*","cedula=:usuario AND clave=:clave",$arrayDatos);
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
				'clave' => $arrayDatos[0],	
			];
			$this->obj_Query->update("clave=:clave","cedula=:cedula",$datosUpdate);
		}
	}
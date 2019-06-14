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
	}
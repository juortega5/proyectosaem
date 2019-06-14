<?php 
	include '../core/Query.php';

	class CitasModel extends Query
	{
		private $obj_Query;
		/**
		* 
		*/
		public  function __construct()
		{
			$this->obj_Query = new Query("tb_agenda_medica");
		}
		/**
		* 
		*/
		public function citasDisponibles()
		{
			$citasDisponibles = $this->obj_Query->select("COUNT(id_agenda_medica) AS CONTEO","cedula_paciente=0",[]);
			return $citasDisponibles[0]->CONTEO;
		}
		/**
		* 
		*/
		public function getTipocitas()
		{
			$infoCitas = $this->obj_Query->select("tb_agenda_medica.id_tipo_cita, prm_tipo_cita.nompre_tipo_cita","1",[],"tb_agenda_medica INNER JOIN prm_tipo_cita ON tb_agenda_medica.id_tipo_cita = prm_tipo_cita.id_tipo_cita");
			return $infoCitas;
		}
		/**
		* 
		*/
		public function getSedes($id_tipo_cita=null,$rol=null)
		{
			if ($rol=='1') 
			{
				$infoSedes = $this->obj_Query->select("id_sede,nombre_sede","1",[],"prm_sedes");
			}
			else
			{
				$arrayDatos = ['id_tipo_cita' => $id_tipo_cita];
				$infoSedes = $this->obj_Query->select("tb_agenda_medica.id_sede, prm_sedes.nombre_sede","tb_agenda_medica.id_tipo_cita:id_tipo_cita",$arrayDatos,"tb_agenda_medica INNER JOIN prm_tipo_cita ON tb_agenda_medica.id_tipo_cita = prm_tipo_cita.id_tipo_cita INNER JOIN prm_sedes ON tb_agenda_medica.id_sede = prm_sedes.id_sede");
			}			
			return $infoSedes;
		}
	}
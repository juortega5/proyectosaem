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
		public function getSedes($id_tipo_cita=null)
		{
			if ($_SESSION['rol']=='1') 
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
		/**
		* 
		*/
		public function validarAgenda($fecha)
		{
			$arrayDatos = ['fecha' => "%".$fecha."%"];
			$agendaExistente = $this->obj_Query->select("COUNT(id_agenda_medica) AS CONTEO","horario like :fecha",$arrayDatos);
			return $agendaExistente[0]->CONTEO;
		}
		/**
		* 
		*/
		public function insertAgenda($id_sede,$fecha)
		{
			switch ($_SESSION['rol']) 
			{
				case '1':
					$id_tipo_cita='1';
				break;
				
				case '3':
					$id_tipo_cita='2';
				break;
			}
			$horarios = ['08:00:00','08:30:00','09:00:00','09:30:00','10:00:00','10:30:00','11:00:00',
						'11:30:00','02:00:00','02:30:00','04:00:00','04:30:00','05:00:00','05:30:00'];
			for ($i=0; $i <14 ; $i++) 
			{ 
				$arrayDatos = ['cedula_paciente'=>'0','id_sede'=>$id_sede,'id_tipo_cita' => $id_tipo_cita,'cedula_medico'=>$_SESSION['usuario'],'horario'=>$fecha." ".$horarios[$i]];
				$this->obj_Query->insertar("cedula_paciente,id_sede,id_tipo_cita,cedula_medico,horario",":cedula_paciente,:id_sede,:id_tipo_cita,:cedula_medico,:horario",$arrayDatos);
			}		
		}
		/**
		* 
		*/
		public function getAgenda($fecha)
		{
			$arrayDatos = ['fecha' => "%".$fecha."%"];
			$agendaDisponible = $this->obj_Query->select("IF(COUNT(tb_agenda_medica.cedula_paciente)=0,'Sin pacientes asignados.',CONCAT(tb_user.primer_nombre,' ',tb_user.segundo_nombre)) as nombre,prm_sedes.nombre_sede,tb_agenda_medica.horario","tb_agenda_medica.horario like :fecha",$arrayDatos,"tb_agenda_medica INNER JOIN tb_user ON tb_agenda_medica.cedula_paciente = tb_user.cedula INNER JOIN prm_sedes on tb_agenda_medica.id_sede = prm_sedes.id_sede");
			return $agendaDisponible;
		}

	}
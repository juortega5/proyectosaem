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
			$arrayDatos = ['cedula_paciente' => $_SESSION['usuario']];
			$citasUsuario = $this->obj_Query->select("COUNT(id_agenda_medica) AS CONTEO","cedula_paciente=:cedula_paciente AND DATEDIFF(CURDATE(),horario)<=0",$arrayDatos);
			if ($citasUsuario[0]->CONTEO==0)
			{
				$citasDisponibles = $this->obj_Query->select("COUNT(id_agenda_medica) AS CONTEO","cedula_paciente=0 AND DATEDIFF(CURDATE(),horario)<=0",[]);
				return $citasDisponibles[0]->CONTEO;
			}
			else
			{
				return 0;
			}
		}
		/**
		* 
		*/
		public function getTipocitas()
		{
			$infoCitas = $this->obj_Query->select("DISTINCT tb_agenda_medica.id_tipo_cita, prm_tipo_cita.nompre_tipo_cita","tb_agenda_medica.cedula_paciente=0 AND DATEDIFF(CURDATE(),tb_agenda_medica.horario)<=0",[],"tb_agenda_medica INNER JOIN prm_tipo_cita ON tb_agenda_medica.id_tipo_cita = prm_tipo_cita.id_tipo_cita");
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
				$infoSedes = $this->obj_Query->select("DISTINCT tb_agenda_medica.id_sede, prm_sedes.nombre_sede","tb_agenda_medica.id_tipo_cita=:id_tipo_cita AND tb_agenda_medica.cedula_paciente=0 AND DATEDIFF(CURDATE(),tb_agenda_medica.horario)<=0",$arrayDatos,"tb_agenda_medica INNER JOIN prm_tipo_cita ON tb_agenda_medica.id_tipo_cita = prm_tipo_cita.id_tipo_cita INNER JOIN prm_sedes ON tb_agenda_medica.id_sede = prm_sedes.id_sede");
			}			
			return $infoSedes;
		}
		/**
		* 
		*/
		public function getFechas($id_tipo_cita,$id_sede)
		{
			$arrayDatos = ['id_tipo_cita' => $id_tipo_cita,'id_sede'=>$id_sede];
			$infiFechas = $this->obj_Query->select("DISTINCT SUBSTRING(tb_agenda_medica.horario,1,10) AS horario","tb_agenda_medica.id_tipo_cita=:id_tipo_cita AND tb_agenda_medica.id_sede=:id_sede AND tb_agenda_medica.cedula_paciente=0 AND DATEDIFF(CURDATE(),tb_agenda_medica.horario)<=0",$arrayDatos,"tb_agenda_medica INNER JOIN prm_tipo_cita ON tb_agenda_medica.id_tipo_cita = prm_tipo_cita.id_tipo_cita");
			return $infiFechas;
		}
		/**
		* 
		*/
		public function getHorarios($id_tipo_cita,$id_sede,$fecha)
		{
			$arrayDatos = ['id_tipo_cita' => $id_tipo_cita,'id_sede'=>$id_sede,'fecha'=>"%".$fecha."%"];
			$infoHorarios = $this->obj_Query->select("DISTINCT SUBSTRING(tb_agenda_medica.horario,12,10) AS horario","tb_agenda_medica.id_tipo_cita=:id_tipo_cita AND tb_agenda_medica.id_sede=:id_sede AND tb_agenda_medica.cedula_paciente=0 AND DATEDIFF(CURDATE(),tb_agenda_medica.horario)<=0 AND  tb_agenda_medica.horario LIKE :fecha",$arrayDatos,"tb_agenda_medica INNER JOIN prm_tipo_cita ON tb_agenda_medica.id_tipo_cita = prm_tipo_cita.id_tipo_cita");
			return $infoHorarios;
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
		public function setAgenda($datosEditar)
		{
			$datosUpdate = [ 'cedula_paciente' => $_SESSION['usuario'],'id_tipo_cita' =>$datosEditar[0],'id_sede' => $datosEditar[1],'horario' => $datosEditar[2]];
			$this->obj_Query->update("cedula_paciente=:cedula_paciente","id_tipo_cita=:id_tipo_cita AND id_sede=:id_sede AND horario=:horario ",$datosUpdate);			
		}
		/**
		* 
		*/
		public function getAgenda($fecha)
		{
			$arrayDatos = ['fecha' => "%".$fecha."%"];
			$agendaVacia = $this->obj_Query->select("COUNT(cedula_paciente) nombre","horario LIKE :fecha AND cedula_paciente=0",$arrayDatos);
			if ($agendaVacia[0]->nombre==14)
			{
				$agendaDisponible = 0;
				return $agendaDisponible;
			}
			else
			{
				$agendaDisponible = $this->obj_Query->select("CONCAT(tb_user.primer_nombre,' ',tb_user.segundo_nombre) as nombre,prm_sedes.nombre_sede,tb_agenda_medica.horario","tb_agenda_medica.horario like :fecha",$arrayDatos,"tb_agenda_medica INNER JOIN tb_user ON tb_agenda_medica.cedula_paciente = tb_user.cedula INNER JOIN prm_sedes on tb_agenda_medica.id_sede = prm_sedes.id_sede");
				return $agendaDisponible;
			}
		}
		/**
		* 
		*/
		public function getAgendaPaciente()
		{
			$arrayDatos = [ 'cedula_paciente' => $_SESSION['usuario']];
			$agenda = $this->obj_Query->select("tb_agenda_medica.id_agenda_medica,CONCAT(tb_user.primer_nombre,' ',tb_user.segundo_nombre) as doctor,prm_sedes.nombre_sede,tb_agenda_medica.horario","cedula_paciente=:cedula_paciente AND DATEDIFF(CURDATE(),horario)<=0",$arrayDatos,"tb_agenda_medica INNER JOIN tb_user ON tb_agenda_medica.cedula_medico=tb_user.cedula INNER JOIN prm_sedes ON prm_sedes.id_sede=tb_agenda_medica.id_sede");			
			return $agenda;
		}
		/**
		* 
		*/
		public function cancelAgenda($id_agenda)
		{
			$datosUpdate = ['id_agenda_medica' =>$id_agenda];
			$this->obj_Query->update("cedula_paciente=0","id_agenda_medica=:id_agenda_medica",$datosUpdate);			
		}
	}
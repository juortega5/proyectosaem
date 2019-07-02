<?php 
session_start();
$rutas=
[
	'crearRegistro'=>['archivo'=>'LoguinControler.php','controlador'=>'LoguinControler'],
	'setRegisterDatos'=>['archivo'=>'LoguinControler.php','controlador'=>'LoguinControler'],
	'validarUsuario'=>['archivo'=>'LoguinControler.php','controlador'=>'LoguinControler'],
	'actualizarDatos'=>['archivo'=>'LoguinControler.php','controlador'=>'LoguinControler'],
	'setActualizarDatos'=>['archivo'=>'LoguinControler.php','controlador'=>'LoguinControler'],
	'cambiaClave'=>['archivo'=>'LoguinControler.php','controlador'=>'LoguinControler'],
	'guardarClave'=>['archivo'=>'LoguinControler.php','controlador'=>'LoguinControler'],
	'cargarSolicitud'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'comboSedes'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'comboFechas'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'comboHorarios'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'comboFinal'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'guardarCita'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'guardarSolicitud'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'cargarAgenda'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'cancelarCita'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'guardarAgenda'=>['archivo'=>'AgendaControler.php','controlador'=>'AgendaControler'],
	'crearSolicitud'=>['archivo'=>'AgendaControler.php','controlador'=>'AgendaControler'],
	'listarAgenda'=>['archivo'=>'AgendaControler.php','controlador'=>'AgendaControler'],
	'verAgenda'=>['archivo'=>'AgendaControler.php','controlador'=>'AgendaControler'],
];
$metodo = $_POST['metodo'];
$controlador= $rutas[$metodo]['controlador'];
$archivoIncluir = $rutas[$metodo]['archivo'];
include '../controlador/'.$archivoIncluir;
$clase = new $controlador;
call_user_func([$clase,$metodo]);
$clase = null;

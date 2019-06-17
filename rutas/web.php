<?php 
session_start();
$rutas=
[
	'validarUsuario'=>['archivo'=>'LoguinControler.php','controlador'=>'LoguinControler'],
	'actualizarDatos'=>['archivo'=>'LoguinControler.php','controlador'=>'LoguinControler'],
	'setActualizarDatos'=>['archivo'=>'LoguinControler.php','controlador'=>'LoguinControler'],
	'cambiaClave'=>['archivo'=>'LoguinControler.php','controlador'=>'LoguinControler'],
	'guardarClave'=>['archivo'=>'LoguinControler.php','controlador'=>'LoguinControler'],
	'cargarSolicitud'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'comboSedes'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'guardarSolicitud'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
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

<?php 
session_start();
include '../vendor/autoload.php';
$rutas=
[
	'crearRegistro'      =>['controlador'=>'controlador\LoguinControler'],
	'setRegisterDatos'   =>['controlador'=>'controlador\LoguinControler'],
	'validarUsuario'     =>['controlador'=>'controlador\LoguinControler'],
	'actualizarDatos'    =>['controlador'=>'controlador\LoguinControler'],
	'setActualizarDatos' =>['controlador'=>'controlador\LoguinControler'],
	'cambiaClave'        =>['controlador'=>'controlador\LoguinControler'],
	'guardarClave'       =>['controlador'=>'controlador\LoguinControler'],
	'cargarSolicitud'    =>['controlador'=>'controlador\CitasControler'],
	'comboSedes'         =>['controlador'=>'controlador\CitasControler'],
	'comboFechas'        =>['controlador'=>'controlador\CitasControler'],
	'comboHorarios'      =>['controlador'=>'controlador\CitasControler'],
	'comboFinal'         =>['controlador'=>'controlador\CitasControler'],
	'guardarCita'        =>['controlador'=>'controlador\CitasControler'],
	'guardarSolicitud'   =>['controlador'=>'controlador\CitasControler'],
	'cargarAgenda'       =>['controlador'=>'controlador\CitasControler'],
	'cancelarCita'       =>['controlador'=>'controlador\CitasControler'],
	'guardarAgenda'      =>['controlador'=>'controlador\AgendaControler'],
	'crearSolicitud'     =>['controlador'=>'controlador\AgendaControler'],
	'listarAgenda'       =>['controlador'=>'controlador\AgendaControler'],
	'verAgenda'          =>['controlador'=>'controlador\AgendaControler'],
];
$metodo = $_POST['metodo'];
$controlador= $rutas[$metodo]['controlador'];
$clase = new $controlador;
call_user_func([$clase,$metodo]);
$clase = null;

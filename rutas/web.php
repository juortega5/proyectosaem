<?php 
session_start();
$rutas=
[
	'validarUsuario'=>['archivo'=>'LoguinControler.php','controlador'=>'LoguinControler'],
	'cargarSolicitud'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'crearSolicitud'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'comboSedes'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'guardarSolicitud'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
	'guardarAgenda'=>['archivo'=>'CitasControler.php','controlador'=>'CitasControler'],
];
$metodo = $_POST['metodo'];
$controlador= $rutas[$metodo]['controlador'];
$archivoIncluir = $rutas[$metodo]['archivo'];
include '../controlador/'.$archivoIncluir;
$clase = new $controlador;
call_user_func([$clase,$metodo]);
$clase = null;

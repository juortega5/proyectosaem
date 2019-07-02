$(document).ready(function() {
    $("#iniciarSesion").click(function() {
        sendForm('loguin','aside','rutas/web.php');
    });
   
});
/*---------Doctor-------------*/
var crearAgenda = function() {
	$("#bienvenida").remove();
	loadView('crearSolicitud','rta','rutas/web.php');
};
var guardaAgenda = function() {
	sendForm('crearAgenda','rta','rutas/web.php');
};
var listarAgendaMedica = function() {
	$("#bienvenida").remove();
	loadView('listarAgenda','rta','rutas/web.php');
};
var cargarListaAgenda = function() {
	var fecha = $("#fecha").val();
	loadView('verAgenda','tablaAgendaMedica','rutas/web.php',fecha);
};
var actualizarInfo = function() {
	$("#bienvenida").remove();
	loadView('actualizarDatos','rta','rutas/web.php');
};
var editDatos = function() {
	sendForm('actualizaDatos','rta','rutas/web.php');
};
var cambiaClave = function() {
	$("#bienvenida").remove();
	loadView('cambiaClave','rta','rutas/web.php');
};
var setCambiaClave = function() {
	sendForm('cambiarClave','rta','rutas/web.php');
};
/*---------Paciente-------------*/
var cargarFormregister = function() {
	loadView('crearRegistro','aside','rutas/web.php');
};
var registerDatos = function() {
	sendForm('regisraDatos','aside','rutas/web.php');
};
var agendarCita = function() {
	$("#bienvenida").remove();
	loadView('cargarSolicitud','rta','rutas/web.php');
};
var comboSede = function() {
	var id = $("#tipoCita").val();
	$("#tipoCita").attr("disabled","disabled");
	loadView('comboSedes','comboSede','rutas/web.php',id);
};
var comboFecha = function() {
	var id = $("#sede").val();
	$("#sede").attr("disabled","disabled");
	loadView('comboFechas','combofecha','rutas/web.php',id);
};
var comboHorarios = function() {
	var id = $("#fecha").val();
	$("#fecha").attr("disabled","disabled");
	loadView('comboHorarios','combohorario','rutas/web.php',id);
};
var comboFin = function() {
	var id = $("#horario").val();
	$("#horario").attr("disabled","disabled");
	$("#botones").empty();
	loadView('comboFinal','botones','rutas/web.php',id);
};
var guardarCita = function() {
	sendForm('solicitudCita','rta','rutas/web.php');
};
var listarAgendaPaciente = function() {
	$("#bienvenida").remove();
	loadView('cargarAgenda','rta','rutas/web.php');
};
var cancelarCita = function(id) {
	loadView('cancelarCita','rta','rutas/web.php',id);
};
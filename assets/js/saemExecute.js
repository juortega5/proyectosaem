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
/*---------Paciente-------------*/
var agendarCita = function() {
	$("#fecha").remove();
	loadView('cargarSolicitud','rta','rutas/web.php');
};
var comboSede = function(id) {
	loadView('comboSedes','comboSede','rutas/web.php',id);
};
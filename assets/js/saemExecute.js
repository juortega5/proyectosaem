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
/*---------Paciente-------------*/
var agendarCita = function() {
	$("#bienvenida").remove();
	loadView('cargarSolicitud','rta','rutas/web.php');
};
var comboSede = function(id) {
	loadView('comboSedes','comboSede','rutas/web.php',id);
};
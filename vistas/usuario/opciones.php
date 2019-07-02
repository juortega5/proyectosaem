<hr>
<div class="row">
  <div id="menu" class="col-md-2">
    <ul class="navbar-nav mr-auto">
      <div class="row">  
        <div class="col-md-12 bg-success" align="center">
          <a class="navbar-brand text-light" href="#">Menu</a>
        </div> 
        <div class="col-md-12 bg-dark  efecto btn-outline-secondary">
          <a onclick="agendarCita();" class="navbar-brand text-light" href="#">Agendar Cita</a>
        </div>   
        <div class="col-md-12 bg-dark  efecto btn-outline-secondary">
          <a onclick="listarAgendaPaciente();" class="navbar-brand text-light" href="#">Agenda</a>
        </div>  
        <div class="col-md-12 bg-dark  efecto btn-outline-secondary">
          <a  onclick="actualizarInfo();" class="navbar-brand text-light" href="#">Actualizar datos</a>
        </div> 
        <div class="col-md-12 bg-dark  efecto btn-outline-secondary">
          <a  onclick="cambiaClave();" class="navbar-brand text-light" href="#">Cambiar clave</a>
        </div> 
        <div class="col-md-12 bg-dark  efecto btn-outline-secondary">
           <a onclick="window.location.reload();" class="navbar-brand text-light" href="#">Salir</a>
        </div> 
      </div>
    </ul>
  </div>
  <div id="canvas" class=" col-md-10">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li id="indice" class="breadcrumb-item active" aria-current="page">Bienvenido <?php echo $datosLoguin[0]->primer_nombre.' '.$datosLoguin[0]->primer_apellido ?></li>
      </ol>
    </nav>
    <hr>
    <div class="alert alert-success" role="alert" id="bienvenida">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="alert-heading">Cordial saludo!</h4>
      <p>
       Para solicitar una cita médica seleccione la opción agendar cita; si desea actualizar sus datos seleccione la opción actualizar información; para consultar o cancelar citas médicas seleccione la opción agenda.
      </p>
    </div>
    <div id="rta"></div>
    <div id="msj"></div>
  </div>
</div>
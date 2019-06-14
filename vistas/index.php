<hr>
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <h4 class="alert-heading">Cordial saludo!</h4>
  <p>
    Y bienvenido al Sistema  de asignación de citas y autorización de exámenes médicos SAEM 2019, la opción amigable que le permite desde su hogar
    manejar y gestionar sus citas médicas, colocándolo mas cerca de su EPS por medio de la tecnología.
  </p>
  <hr>
  <p class="mb-0">Recuerde cancelar sus citas con 3 días de antelación, de lo contrario puede acarearle una multa.</p>
</div>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header text-light bg-dark">
       Noticias de interés  SAEM
      </div>
      <div class="card-body">
        <h5 class="card-title">Cambio sede Exámenes!</h5>
        <p class="card-text">Los exámenes médicos serán tomados en la nueva sede EPS.</p>
        <h5 class="card-title">Nuevo horario atención sede sur!</h5>
        <p class="card-text">Los horarios de atención durante el mes de mayo se extenderán hasta las 6:00 pm.</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
     <div class="card">
      <div class="card-header text-light bg-dark">
      Iniciar sesión
      </div>
      <div class="card-body">
        <form id="loguin" method="post" autocomplete="off">
          <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="userHelp" placeholder="Usuario">
            <small id="userHelp" class="form-text text-muted">Su usuario corresponde a su número de cedula.</small>
          </div>
          <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input type="password" class="form-control" name="password" clave="clave" id="contraseña" placeholder="Contraseña">
          </div>
          <input type="hidden" name="metodo" value="validarUsuario">
          <div align="center">
            <button type="button" id="iniciarSesion" class="btn btn-success">Iniciar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<hr>
  <div class="row">
   <div class="col-md-12">
      <div class="card">
        <div align="center" class="card-header text-light bg-dark">
          Registrar usuario.
        </div>
        <div class="card-body">
          <form id="regisraDatos" method="post" autocomplete="off">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="primer_nombre">Primer nombre</label>
                  <input name="primer_nombre"  id="primer_nombre"  onKeyPress="return soloLetras(event)" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="segundo_nombre">Segundo nombre</label>
                  <input name="segundo_nombre"  id="segundo_nombre"  onKeyPress="return soloLetras(event)" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="primer_apellido">Primer apellido</label>
                  <input name="primer_apellido" id="primer_apellido"  onKeyPress="return soloLetras(event)" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="segundo_apellido">Segundo apellido</label>
                  <input name="segundo_apellido" id="segundo_apellido"  onKeyPress="return soloLetras(event)" type="text" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group"> 
                  <label for="cedula">Cedula</label>
                  <input name="cedula"  id="cedula"  onKeyPress="return soloNumeros(event)" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="direccion">Direccion</label>
                  <input name="direccion"  id="direccion" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="correo">Correo</label>
                  <input name="correo"  id="correo" type="email" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="celular">Celular</label>
                  <input name="celular"  id="celular"  onKeyPress="return soloNumeros(event)" type="text" class="form-control">
                </div>
              </div>
            </div>  
             <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                    <label for="clave">Clave</label>
                    <input name="clave"  id="clave" type="password" class="form-control">
                </div>
              </div>
            </div>                 
            <input type="hidden" name="metodo" value="setRegisterDatos">
            <div align="center">
              <button type="button" onclick="registerDatos();" class="btn btn-success">Crear</button>
              <button type="button" onclick="window.location.reload();" class="btn btn-dark">Volver</button>
            </div>
          </form>
        </div>
      </div>
   </div>
</div>
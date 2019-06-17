<div class="row">
   <div class="col-md-12">
      <div class="card">
        <div align="center" class="card-header text-light bg-dark">
          Actualizar datos básicos.
        </div>
        <div class="card-body">
          <form id="actualizaDatos" method="post">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="primer_nombre">Primer nombre</label>
                  <input name="primer_nombre" value="<?php echo $datosUser[0]->primer_nombre ?>" onKeyPress="return soloLetras(event)" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="segundo_nombre">Segundo nombre</label>
                  <input name="segundo_nombre" value="<?php echo $datosUser[0]->segundo_nombre ?>" onKeyPress="return soloLetras(event)" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="primer_apellido">Primer apellido</label>
                  <input name="primer_apellido" value="<?php echo $datosUser[0]->primer_apellido ?>" onKeyPress="return soloLetras(event)" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="segundo_apellido">Segundo apellido</label>
                  <input name="segundo_apellido" value="<?php echo $datosUser[0]->segundo_apellido ?>" onKeyPress="return soloLetras(event)" type="text" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="celular">Celular</label>
                  <input name="celular" value="<?php echo $datosUser[0]->celular ?>" onKeyPress="return soloNumeros(event)" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="direccion">Direccion</label>
                  <input name="direccion" value="<?php echo $datosUser[0]->direccion ?>" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="correo">Correo</label>
                  <input name="correo" value="<?php echo $datosUser[0]->correo ?>" type="email" class="form-control">
                </div>
              </div>
            </div>                   
            <input type="hidden" name="metodo" value="setActualizarDatos">
            <div align="center">
              <button type="button" onclick="editDatos();" class="btn btn-success">Actualizar</button>
            </div>
          </form>
        </div>
      </div>
   </div>
</div>
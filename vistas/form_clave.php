<div class="row">
   <div class="col-md-3"></div>
   <div class="col-md-6">
      <div class="card">
        <div align="center" class="card-header text-light bg-dark">
          Cambiar clave
        </div>
        <div class="card-body">
          <form id="cambiarClave" method="post">
            <div class="form-group">
              <label for="clave">Clave </label>
              <input name="clave" type="password" class="form-control">
            </div>
            <div class="form-group">
              <label for="nueva_clave">Clave nueva</label>
              <input name="nueva_clave" type="password" class="form-control">
            </div>
            <input type="hidden" name="metodo" value="guardarClave">
            <div align="center">
              <button type="button" onclick="setCambiaClave();" class="btn btn-success">Crear</button>
            </div>
          </form>
        </div>
      </div>
   </div>
</div>
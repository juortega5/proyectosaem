<div class="row">
   <div class="col-md-3"></div>
   <div class="col-md-6">
      <div class="card">
        <div align="center" class="card-header text-light bg-dark">
          Crear Agenda Medica
        </div>
        <div class="card-body">
          <form id="crearAgenda" method="post">
            <div class="form-group">
              <label for="sede">Sede</label>
              <select class="form-control" name="sede" id="sede">
                <option selected="selected">Seleccione una sede</option>
                <?php foreach($sedes as $columna): ?>
                <option value="<?php echo $columna->id_sede; ?>"><?php echo $columna->nombre_sede; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="fecha">Fecha</label>
              <input id="fecha" name="fecha" type="date" class="form-control">
            </div>
            <input type="hidden" name="metodo" value="guardarAgenda">
            <div align="center">
              <button type="button" onclick="guardaAgenda();" class="btn btn-success">Crear</button>
            </div>
          </form>
        </div>
      </div>
   </div>
</div>

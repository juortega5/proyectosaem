<div class="row">
   <div class="col-md-3"></div>
   <div class="col-md-6">
      <div class="card">
        <div class="card-header text-light bg-dark">
          Solicitar cita medica
        </div>
        <div class="card-body">
          <form id="solicitudCita" method="post">
            <div class="form-group">
              <label for="tipoCita">Tipo de cita</label>
              <select  class="form-control" name="tipoCita" id="tipoCita">
                <option selected="selected">Seleccione un tipo de cita</option>
                <?php foreach($tiposCitas as $columna): ?>
                <option onclick="comboSede('<?php echo $columna->id_tipo_cita; ?>');" value="<?php echo $columna->id_tipo_cita; ?>"><?php echo $columna->nompre_tipo_cita; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div id="comboSede"></div>
            <div class="form-group">
              <label for="sede">Sede</label>
              <select class="form-control" name="sede" id="sede">
                <option selected="selected">Seleccione una sede</option>
              </select>
            </div>
            <div class="form-group">
              <label for="horario">Horario</label>
              <select class="form-control" name="horario" id="horario">
                <option selected="selected">Seleccione el horario</option>
              </select>
            </div>
            <input type="hidden" name="metodo" value="guardarSolicitud">
            <div align="center">
              <button type="button" id="iniciarSesion" class="btn btn-success">Solicitar</button>
            </div>
          </form>
        </div>
      </div>
   </div>
</div>

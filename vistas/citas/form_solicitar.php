<div class="row">
   <div class="col-md-3"></div>
   <div class="col-md-6">
      <div class="card">
        <div align="center" class="card-header text-light bg-dark">
          Solicitar cita medica
        </div>
        <div class="card-body">
          <form id="solicitudCita" method="post">
            <div class="form-group">
              <label for="tipoCita">Tipo de cita</label>
              <select onchange="comboSede();" class="form-control" name="tipoCita" id="tipoCita">
                <option selected="selected">Seleccione un tipo de cita</option>
                <?php foreach($tiposCitas as $columna): ?>
                <option  value="<?php echo $columna->id_tipo_cita; ?>"><?php echo $columna->nompre_tipo_cita; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div id="comboSede"></div>
            <div id="combofecha"></div>
            <div id="combohorario"></div>
            <input type="hidden" name="metodo" value="guardarCita">
            <div id="botones" align="center">
              <button type="button" onclick="agendarCita();" class="btn btn-success">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
   </div>
</div>

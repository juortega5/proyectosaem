<div class="form-group">
  <label for="sede">Sede</label>
  <select onchange="comboFecha();" class="form-control" name="sede" id="sede">
    <option selected="selected">Seleccione una sede</option>
    <?php foreach($tiposSedes as $columna): ?>
    	<option  value="<?php echo $columna->id_sede; ?>"><?php echo $columna->nombre_sede; ?></option>
    <?php endforeach; ?>
  </select>
</div>
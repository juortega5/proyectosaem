<div class="form-group">
  <label for="fecha">Fechas</label>
  <select onchange="comboHorarios();" class="form-control" name="fecha" id="fecha">
    <option selected="selected">Seleccione una fecha</option>
    <?php foreach($fechas as $columna): ?>
    	<option  value="<?php echo $columna->horario; ?>"><?php echo $columna->horario; ?></option>
    <?php endforeach; ?>
  </select>
</div>
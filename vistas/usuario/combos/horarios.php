<div class="form-group">
  <label for="horario">Horarios</label>
  <select onchange="comboFin();" class="form-control" name="horario" id="horario">
    <option selected="selected">Seleccione un horario</option>
    <?php foreach($horarios as $columna): ?>
    	<option  value="<?php echo $columna->horario; ?>"><?php echo $columna->horario; ?></option>
    <?php endforeach; ?>
  </select>
</div>

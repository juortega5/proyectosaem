<div class="table-responsive">
  <div id="tabla">
    <table class="table table-dark table-sm">
      <thead>
        <tr align="center">
          <th scope="col">Nombre del doctor</th>
          <th scope="col">Sede</th>
          <th scope="col">Horario</th>
          <th scope="col">Cancelar cita</th>
        </tr>
      </thead>
      <tbody>
         <?php foreach($agenda as $columna): ?>
         <tr align="center">
          <td><?php echo $columna->doctor; ?></td>
          <td><?php echo $columna->nombre_sede; ?></td>
          <td><?php echo $columna->horario; ?></td>
          <?php  if($fecha_actual < strtotime($columna->horario))  { ?>
          <td><button type="button" onclick="cancelarCita(<?php echo $columna->id_agenda_medica; ?>);" class="btn btn-danger"></button></td>
          <?php  } ?>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<div class="table-responsive">
  <div id="tabla">
    <table class="table table-dark table-sm">
      <thead>
        <tr align="center">
          <th scope="col">Nombre del paciente</th>
          <th scope="col">Sede</th>
          <th scope="col">Horario</th>
        </tr>
      </thead>
      <tbody>
         <?php foreach($datosParticipantes as $columna): ?>
         <tr align="center">
          <td><?php echo $columna->NOMBRE; ?></td>
          <td><?php echo $columna->categoria; ?></td>
          <td><?php echo $columna->JERSEY; ?></td>
          <td><a href="#"  class="btn btn-outline-danger">x</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
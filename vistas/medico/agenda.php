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
         <?php foreach($datosAgenda as $columna): ?>
         <tr align="center">
          <td><?php echo $columna->nombre; ?></td>
          <td><?php echo $columna->nombre_sede; ?></td>
          <td><?php echo $columna->horario; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
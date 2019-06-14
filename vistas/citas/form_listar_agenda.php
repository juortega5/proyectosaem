<div class="row">
   <div class="col-md-2"></div>
   <div class="col-md-12">
      <div class="card">
        <div class="card-header text-light bg-dark">
          Consultar agenda medica
        </div>
        <div class="card-body">
            <div class="row">
            <div class="form-group">
              <label for="fecha">Fecha</label>
              <input onchange="cargarListaAgenda();" id="fecha" type="date" class="form-control">
            </div>
            </div>
            <div id="tablaAgendaMedica"></div>
        </div>
      </div>
   </div>
</div>

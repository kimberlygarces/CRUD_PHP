<?php include_once('views/templates/header.php'); ?>

<?php include_once('views/templates/nav.php'); ?>


<section>
  <div class="container">
    <h1 class="text-center">Listado productos medicos</h1>
    <div class="row">
      <div class="col-md-10 mx-auto">
        <div><a class="btn-cliente" href="?c=nuevo">Nuevo Registro</a></div>

        <div>
        <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Buscar...">
      <hr> 
      </div>
        <div class="card">
          <div class="card-body">
            <table class="table table-hover order-table">
              <thead>
                <tr>
                <th>Foto</th>

                  <th>Referencia</th>
                  <th>Nombre</th>
                  <th>Laboratorio </th>
           
                  <th>Vencimiento</th>
                  <th>Cantidad</th>
                  <th>Ingreso</th>
                  <th>Eliminar</th>
                  <th>Editar</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($this->MODEL->listarMedicamentos() as $new) : ?>
                  <tr>
                    <td><img src="<?php echo $new->foto; ?>" class="image__width" alt=""></td>
                    <td><?php echo $new->referecia; ?></td>

                    <td><?php echo $new->name_producto; ?></td>
                    <td><?php echo $new->laboratorio; ?></td>
                    <td><?php echo $new->fecha_vencimiento; ?></td>
                    <td><?php echo $new->cantidad; ?></td>
                    <td><?php echo $new->created_at; ?></td>

                    <td><a href="?c=eliminar&id=<?php echo $new->id; ?>" class="btn btn-danger">Eliminar</a></td>
                    <td><a href="?c=editar&id=<?php echo $new->id; ?>" class="btn btn-info">Editar</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
    (function(document) {
      'use strict';

      var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
          _input = e.target;
          var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
          Arr.forEach.call(tables, function(table) {
            Arr.forEach.call(table.tBodies, function(tbody) {
              Arr.forEach.call(tbody.rows, _filter);
            });
          });
        }

        function _filter(row) {
          var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
          row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('light-table-filter');
            Arr.forEach.call(inputs, function(input) {
              input.oninput = _onInputEvent;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          LightTableFilter.init();
        }
      });

    })(document);
    </script>

<?php include_once('views/templates/footer.php'); ?>
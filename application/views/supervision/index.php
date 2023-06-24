<div class="content-wrapper">
  <section class="content-header">
    <h1>Registros supervisión</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Supervisión</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div id="messages"></div>

        <?php if (in_array('deleteVigilancia', $user_permission)) : ?>
          <button type="button" id="exportar_excel" class="btn btn-danger">Exportar a Excel</button>
          <br /><br />
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Unidades fuera</h3>
          </div>

          <div class="box-body">
            <input type="date" id="fecha" placeholder="Fecha">
            <button type="button" id="filtrar_fecha" class="btn btn-primary">Filtrar</button>
            <br /><br />

            <table id="manageTable" class="display responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Unidad</th>
                  <th>Hora de salida</th>
                  <th>Hora de entrada</th>
                  <th>turno</th>
                  <th>ruta</th>
                  <th>alias</th>
                  <th>operador</th>
                  <th># recolectores</th>
                  <th>Recolector 1</th>
                  <th>Recolector 2</th>
                  <th>Recolector 3</th>
                  <th>Recolector 4</th>
                  <th>Recolector 5</th>
                  <th>estatus</th>
                  <?php if (in_array('updateSupervision', $user_permission)) : ?>
                    <th>Finalizar</th>
                  <?php endif; ?>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $("#supervisionNav").addClass('active');

    var table = $('#manageTable').DataTable({
      'ajax': 'fetchSupervicionData',
      'order': [],
      'columnDefs': [{
        'targets': 14,
        'render': function(data, type, row) {
          if (data == 1) {
            return 'Encierro';
          } else {
            return 'Desconocido';
          }
        }
      }],
      'createdRow': function(row, data, dataIndex) {

      }
    });

    $('#filtrar_fecha').click(function() {
      filtrarRegistrosPorFecha();
    });

    $('#exportar_excel').click(function() {
      exportarExcel();
    });
  });

  function filtrarRegistrosPorFecha() {
    var fecha = $('#fecha').val();
    var table = $('#manageTable').DataTable();
    table.columns(2).search(fecha).draw();

    // Obtener los datos filtrados
    var filteredData = table.rows({
      search: 'applied'
    }).data().toArray();

    // Limpiar la tabla
    table.clear();

    // Agregar los datos filtrados a la tabla
    table.rows.add(filteredData).draw();
  }


  function exportarExcel() {
    var table = $('#manageTable').DataTable();
    var data = table.data().toArray(); // Obtener los datos filtrados

    var header = [];
    table.columns().every(function() {
      header.push(this.header().textContent.trim());
    });

    data.unshift(header);

    var sheet = XLSX.utils.json_to_sheet(data, {
      skipHeader: true
    });
    var workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, sheet, 'Hoja 1');

    var nombreArchivo = 'exportacion.xlsx';
    XLSX.writeFile(workbook, nombreArchivo);
  }
</script>

<style type="text/css">
  #loader {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.75) url(../assets/images/loading.gif) no-repeat center center;
    z-index: 10000;
  }
</style>
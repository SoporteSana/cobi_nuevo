<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Reporte por filtros
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Todos</li>
    </ol>
  </section>


  <section class="content">

    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
          <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">unidades finalizadas</h3>
          </div>
          <div class="box-header">
            <button type="button" id="exportar_excel" class="btn btn-danger">Exportar a Excel</button>
          </div>

          <div class="box-body">
            <table id="manageTable" class="display responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Unidad</th>
                  <th>asignacion</th>
                  <th>semana</th>
                  <th>supervisor</th>
                  <th>dia</th>
                  <th>fecha</th>
                  <th>turno</th>
                  <th>ruta</th>
                  <th>alias</th>
                  <th>operador</th>
                  <th># recolectores</th>
                  <th>Recoelctor 1</th>
                  <th>Recoelctor 2</th>
                  <th>Recoelctor 3</th>
                  <th>Recoelctor 4</th>
                  <th>Recoelctor 5</th>
                  <th>km salida</th>
                  <th>km entrada</th>
                  <th>recorrido</th>
                  <th>litros cargados</th>
                  <th>rendimiento</th>
                  <th>hora salida</th>
                  <th>hora de entrada</th>
                  <th>hora tablero</th>
                  <th>tempo ruta</th>
                  <th>perso total</th>
                  <th>destino final</th>
                  <th># folios</th>
                  <th>folio 1</th>
                  <th>descripcion 1</th>
                  <th>peso 1</th>
                  <th>folio 2</th>
                  <th>decripcion 2</th>
                  <th>peso 2</th>
                  <th>folio 3</th>
                  <th>decripcion 3</th>
                  <th>peso 3</th>
                  <th>folio 4</th>
                  <th>decripcion 4</th>
                  <th>peso 4</th>
                  <th>folio 5</th>
                  <th>decripcion 5</th>
                  <th>peso 5</th>
                  <th>folio 6</th>
                  <th>decripcion 6</th>
                  <th>peso 6</th>
                  <th>folio 7</th>
                  <th>decripcion 7</th>
                  <th>peso 7</th>
                  <th>folio 8</th>
                  <th>decripcion 8</th>
                  <th>peso 8</th>
                  <th>folio 9</th>
                  <th>decripcion 9</th>
                  <th>peso 9</th>
                  <th>folio 10</th>
                  <th>decripcion 10</th>
                  <th>peso 10</th>
                  <th>comentarios</th>
                  <th>estatus</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($filtros['data'])) : ?>
                  <?php foreach ($filtros['data'] as $filtro) : ?>
                    <tr>
                      <?php foreach ($filtro as $cell) : ?>
                        <td><?= $cell ?></td>
                      <?php endforeach; ?>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>

            </table>
          </div>

        </div>

      </div>

    </div>


  </section>

</div>

<script type="text/javascript">
  $(document).ready(function() {
    $("#editarNav").addClass('active');
    var table = $('#manageTable').DataTable({
      'order': [],
      'columnDefs': [{
          'targets': Array.from({
            length: 29
          }, (_, i) => i + 30),
          'render': function(data, type, row) {
            if (data == '') {
              return '0';
            } else {
              return data;
            }
          }
        },
        {
          'targets': 60,
          'render': function(data, type, row) {
            if (data == 2) {
              return 'Finalizado';
            } else {
              return 'Desconocido';
            }
          }
        }
      ],
      'createdRow': function(row, data, dataIndex) {

      }
    });

    $('#exportar_excel').click(function() {
      exportarExcel();
    });

  });

  function exportarExcel() {
    var table = $('#manageTable').DataTable();
    var data = table.data().toArray();

    // Convertir los números de texto a formato numérico
    for (var i = 0; i < data.length; i++) {
      for (var j = 0; j < data[i].length; j++) {
        if (!isNaN(Number(data[i][j]))) {
          data[i][j] = Number(data[i][j]);
        }
      }
    }

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
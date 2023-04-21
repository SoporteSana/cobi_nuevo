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
            <h3 class="box-title">unidades finalisadas</h3>
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
                  <th># tiros</th>
                  <th>tiro 1</th>
                  <th>destino tiro 1</th>
                  <th>tiro 2</th>
                  <th>destino tiro 2</th>
                  <th>tiro 3</th>
                  <th>destino tiro 3</th>
                  <th>tiro 4</th>
                  <th>destino tiro 4</th>
                  <th>tiro 5</th>
                  <th>destino tiro 5</th>
                  <th>tiro 6</th>
                  <th>destino tiro 6</th>
                  <th>tiro 7</th>
                  <th>destino tiro 7</th>
                  <th>tiro 8</th>
                  <th>destino tiro 8</th>
                  <th>tiro 9</th>
                  <th>destino tiro 9</th>
                  <th>tiro 10</th>
                  <th>destino tiro 10</th>
                  <th>observaciones</th>
                  <th>estatus</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($filtros as $filtro) : ?>
                  <tr>
                    <td><?= $filtro['registro_id'] ?></td>
                    <td><?= $filtro['unidad_numero'] ?></td>
                    <td><?= $filtro['asignacion_nombre'] ?></td>
                    <td><?= $filtro['semana'] ?></td>
                    <td><?= $filtro['nombres'] ?></td>
                    <td><?= $filtro['dia'] ?></td>
                    <td><?= $filtro['fecha_salida'] ?></td>
                    <td><?= $filtro['turno_nombre'] ?></td>
                    <td><?= $filtro['ruta_nombre'] ?></td>
                    <td><?= $filtro['alias_nombre'] ?></td>
                    <td><?= $filtro['operador_nombre'] ?></td>
                    <td><?= $filtro['numrecolectores'] ?></td>
                    <td><?= $filtro['recolector1'] ?></td>
                    <td><?= $filtro['recolector2'] ?></td>
                    <td><?= $filtro['recolector3'] ?></td>
                    <td><?= $filtro['recolector4'] ?></td>
                    <td><?= $filtro['recolector5'] ?></td>
                    <td><?= $filtro['km_salida'] ?></td>
                    <td><?= $filtro['km_entrada'] ?></td>
                    <td><?= $filtro['recorrido'] ?></td>
                    <td><?= $filtro['litroscargados'] ?></td>
                    <td><?= $filtro['rendimiento'] ?></td>
                    <td><?= $filtro['hora_salida'] ?></td>
                    <td><?= $filtro['hora_entrada'] ?></td>
                    <td><?= $filtro['hora_tablero'] ?></td>
                    <td><?= $filtro['tiempo_ruta'] ?></td>
                    <td><?= $filtro['totalpeso'] ?></td>
                    <td><?= $filtro['numtiros'] ?></td>
                    <td><?= $filtro['tiro1'] ?></td>
                    <td><?= $filtro['destinofinal1'] ?></td>
                    <td><?= $filtro['tiro2'] ?></td>
                    <td><?= $filtro['destinofinal2'] ?></td>
                    <td><?= $filtro['tiro3'] ?></td>
                    <td><?= $filtro['destinofinal3'] ?></td>
                    <td><?= $filtro['tiro4'] ?></td>
                    <td><?= $filtro['destinofinal4'] ?></td>
                    <td><?= $filtro['tiro5'] ?></td>
                    <td><?= $filtro['destinofinal5'] ?></td>
                    <td><?= $filtro['tiro6'] ?></td>
                    <td><?= $filtro['destinofinal6'] ?></td>
                    <td><?= $filtro['tiro7'] ?></td>
                    <td><?= $filtro['destinofinal7'] ?></td>
                    <td><?= $filtro['tiro8'] ?></td>
                    <td><?= $filtro['destinofinal8'] ?></td>
                    <td><?= $filtro['tiro9'] ?></td>
                    <td><?= $filtro['destinofinal9'] ?></td>
                    <td><?= $filtro['tiro10'] ?></td>
                    <td><?= $filtro['destinofinal10'] ?></td>
                    <td><?= $filtro['observaciones'] ?></td>
                    <td><?= $filtro['estatus'] ?></td>

                  </tr>
                <?php endforeach; ?>
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
          'targets': [25, 27, 29, 31, 33, 35, 37, 39, 41, 43],
          'render': function(data, type, row) {
            if (data == 0) {
              return '0';
            } else {
              return data;
            }
          }
        },
        {
          'targets': 45,
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
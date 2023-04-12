<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Reporte rendimiento
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
                  <th>rendjmiento</th>
                  <th>hora salida</th>
                  <th>hora entrada</th>
                  <th>tiempo ruta</th>
                  <th>total peso</th>
                  <th>estatus</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rendimientos as $rendimiento) : ?>
                  <tr>
                    <td><?= $rendimiento['registro_id'] ?></td>
                    <td><?= $rendimiento['unidad_numero'] ?></td>
                    <td><?= $rendimiento['rendimiento'] ?></td>
                    <td><?= $rendimiento['hora_salida'] ?></td>
                    <td><?= $rendimiento['hora_entrada'] ?></td>
                    <td><?= $rendimiento['tiempo_ruta'] ?></td>
                    <td><?= $rendimiento['totalpeso'] ?></td>
                    <td><?= $rendimiento['estatus'] ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>

      </div>
      < </div>


  </section>

</div>


<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#manageTable').DataTable({
      'order': [],
      'columnDefs': [{
        'targets': 7,
        'render': function(data, type, row) {
          if (data == 2) {
            return 'Finalizado';
          } else {
            return 'Desconocido';
          }
        }
      }],
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


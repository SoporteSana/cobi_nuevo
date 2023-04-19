<div class="content-wrapper">

  <section class="content-header">
    <h1>
      horas ruta
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
                  <th>hora salida</th>
                  <th>hora entrada</th>
                  <th>tiemp enruta</th>
                  <th>peso total</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($horarutas as $horaruta) : ?>
                  <tr>
                    <td><?= $horaruta['registro_id'] ?></td>
                    <td><?= $horaruta['unidad_numero'] ?></td>
                    <td><?= $horaruta['hora_salida'] ?></td>
                    <td><?= $horaruta['hora_entrada'] ?></td>
                    <td><?= $horaruta['tiempo_ruta'] ?></td>
                    <td><?= $horaruta['totalpeso'] ?></td>
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
      'columnDefs': []
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
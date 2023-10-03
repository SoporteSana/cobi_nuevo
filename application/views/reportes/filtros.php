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
              </thead>
              <!-- Cuerpo de la tabla (datos) se llenará dinámicamente desde JavaScript -->
              <tbody>
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

    // Obtén el JSON de PHP que pasaste a la vista
    var jsonData = <?php echo $jsonData; ?>;

    // Obtén los nombres de las columnas del JSON
    var columnNames = jsonData.columnNames;

    // Convierte los nombres de las columnas en un array de objetos
    var columns = columnNames.map(function(columnName) {
      return {
        title: columnName,
        data: columnName // Asigna el nombre de la columna a los datos correspondientes
      };
    });

    // Obtén los datos de las filas del JSON
    var data = jsonData.data;

    console.log("Column Names:", columnNames);
    console.log("Data:", data);

    // Configura DataTables con las columnas y datos
    var table = $('#manageTable').DataTable({
      data: data,
      columns: columns,
      // Configuración adicional de DataTables según tus necesidades
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
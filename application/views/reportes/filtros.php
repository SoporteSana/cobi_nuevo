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

    console.log(jsonData)

    // Configura DataTables con las columnas y datos
    var table = $('#manageTable').DataTable({
      data: data,
      columns: columns,
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
      // Configuración adicional de DataTables según tus necesidades
    });

  });

</script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
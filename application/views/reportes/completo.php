<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Todos los registros
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
                  <th>estatus</th>
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
    $("#editarNav").addClass('active');
    var table = $('#manageTable').DataTable({
      'ajax': 'fetchReporteCompletoData',
      'order': [],
      'columnDefs': [
        {
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

  });
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
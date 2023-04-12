<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Registros supervicion
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">supervicion</li>
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
            <h3 class="box-title">unidades fuera</h3>
          </div>

          <div class="box-body">
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
                  <th>Recoelctor 1</th>
                  <th>Recoelctor 2</th>
                  <th>Recoelctor 3</th>
                  <th>Recoelctor 4</th>
                  <th>Recoelctor 5</th>
                  <th>estatus</th>
                  <?php if (in_array('updateSupervision', $user_permission)) : ?>
                  <th>Finalisar</th>
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
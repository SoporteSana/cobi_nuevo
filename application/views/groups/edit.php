<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Groups</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url('groups/') ?>">Groups</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

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
            <h3 class="box-title">Edit Group</h3>
          </div>
          <form id="update" role="form" action="<?php base_url('groups/update') ?>" method="post">
            <div class="box-body">

              <?php echo validation_errors(); ?>

              <div class="form-group">
                <label for="group_name">Group Name</label>
                <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="<?php echo $group_data['grupo_nombre']; ?>">
              </div>
              <div class="form-group">
                <label for="permission">Permission</label>

                <?php $serialize_permission = unserialize($group_data['permisos']); ?>

                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Create</th>
                      <th>Update</th>
                      <th>View</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Empresas</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createEmpresa" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateEmpresa" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewEmpresa" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteEmpresa" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Sucursales</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createSucursales" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateSucursales" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewSucursales" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteSucursales" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Registros Vigilancia</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createVigilancia" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateVigilancia" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewVigilancia" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteVigilancia" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Registros Supervision</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createSupervision" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateSupervision" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewSupervision" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteSupervision" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Supervisores</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createSupervisor" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateSupervisor" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewSupervisor" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteSupervisor" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Turnos</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createTurno" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateTurno" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewTurno" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteTurno" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Rutas</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createRuta" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateRuta" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewRuta" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteRuta" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Alias</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createAlias" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateAlias" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewAlias" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteAlias" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Operadores</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createOperador" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateOperador" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewOperador" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteOperador" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Recolectores</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createRecolector" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateRecolector" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewRecolector" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteRecolector" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Unidades</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createUnidad" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateUnidad" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewUnidad" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteUnidad" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Destino Final</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createDestinoFinal" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateDestinoFinal" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewDestinoFinal" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteDestinoFinal" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Tickets</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createTicket" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateTicket" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewTicket" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteTicket" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Reportes</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createReporte" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateReporte" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewReporte" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteReporte" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Editar Registros</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createEditarRegistro" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateEditarRegistro" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewEditarRegistro" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteEditarRegistro" class="minimal"></td>
                    </tr>

                    <tr>
                      <td>Profile</td>
                      <td> - </td>
                      <td> - </td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewProfile" class="minimal"></td>
                      <td> - </td>
                    </tr>
                    <tr>
                      <td>Setting</td>
                      <td>-</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting" class="minimal"></td>
                      <td> - </td>
                      <td> - </td>
                    </tr>
                    <tr>
                      <td>Users</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createUser" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateUser" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewUser" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser" class="minimal"></td>
                    </tr>
                    <tr>
                      <td>Groups</td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="createGroup" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup" class="minimal"></td>
                      <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup" class="minimal"></td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="submitButton">Update Changes</button>
              <a href="<?php echo base_url('groups/') ?>" class="btn btn-warning">Back</a>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    <div id="loader"></div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#mainGroupNav").addClass('active');
    $("#manageGroupNav").addClass('active');

    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });

    $('#update').submit(function() {
        $('#loader').show();
        $("#submitButton").prop("disabled", true);
      })
      .done(function() {
        $('#loader').hide();
        $("#submitButton").prop("disabled", false);
      })
      .fail(function() {
        $('#loader').hide();
        $("#submitButton").prop("disabled", false);



      });

  });

  var valorConsulta = "Juan"; // Por ejemplo, asumamos que el valor es "Juan"

  // Recorrer los elementos de la columna de la tabla
  $("table tr td.nombre").each(function() {
    // Obtener el valor de cada elemento de la columna
    var valorColumna = $(this).text();

    // Comparar el valor de la consulta con el valor de la columna
    if (valorConsulta === valorColumna) {
      // Marcar la casilla de verificación correspondiente
      $(this).siblings("td.checkbox").children("input[type='checkbox']").prop("checked", true);
    }
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
    background: rgba(0, 0, 0, 0.75) url(<?php echo base_url('assets/images/loading.gif'); ?>) no-repeat center center;
    z-index: 10000;
  }
</style>
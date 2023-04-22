<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Rutas
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Rutas</li>
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

        <?php if (in_array('createRuta', $user_permission)) : ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Agregar</button>
          <br /> <br />
        <?php endif; ?>

        <div class="box-body">
          <table id="manageTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Estatus</th>
                <?php if (in_array('updateRuta', $user_permission) || in_array('deleteRuta', $user_permission)) : ?>
                  <th>Accion</th>
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


<?php if (in_array('createRuta', $user_permission)) : ?>

  <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar</h4>
        </div>

        <form role="form" action="<?php echo base_url('Rutas/create') ?>" method="post" id="createForm">

          <div class="modal-body">

            <div class="form-group">
              <label for="create_name">Nombre</label>
              <input type="text" class="form-control" id="create_name" name="create_name" placeholder="Enter store name" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="active">Status</label>
              <select class="form-control" id="create_active" name="create_active">
                <option value="0">Activo</option>
                <option value="1">Inactivo</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Crear</button>
          </div>

        </form>


      </div>
    </div>
  </div>
<?php endif; ?>

<?php if (in_array('updateRuta', $user_permission)) : ?>

  <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Editar</h4>
        </div>

        <form role="form" action="<?php echo base_url('Rutas/update') ?>" method="post" id="updateForm">

          <div class="modal-body">
            <div id="messages"></div>

            <div class="form-group">
              <label for="edit_name">Nombre</label>
              <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Enter store name" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="edit_active">Estatus</label>
              <select class="form-control" id="edit_active" name="edit_active">
                <option value="0">Activo</option>
                <option value="1">Inactivo</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

        </form>


      </div>
    </div>
  </div>
  < <?php endif; ?> <?php if (in_array('deleteRuta', $user_permission)) : ?> <div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Eliminar</h4>
        </div>

        <form role="form" action="<?php echo base_url('Rutas/remove') ?>" method="post" id="removeForm">
          <div class="modal-body">
            <p>¿Realmente quieres eliminaro?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
          </div>
        </form>


      </div>
    </div>
    </div>
    <div id="loader"></div>
  <?php endif; ?>



  <script type="text/javascript">
    var manageTable;
    var spinner = $('#loader');

    $(document).ready(function() {

      $("#rutasNav").addClass('active');

      manageTable = $('#manageTable').DataTable({
        'ajax': 'fetchRutasData',
        'order': []
      });

      $("#createForm").unbind('submit').on('submit', function() {
        var form = $(this);

        spinner.show();
        $("#btncreate").attr("disabled", true);

        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          data: form.serialize(),
          dataType: 'json',
          success: function(response) {

            manageTable.ajax.reload(null, false);

            if (response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                '</div>');

              $("#addModal").modal('hide');
              spinner.hide();

              $("#createForm")[0].reset();
              $("#createForm .form-group").removeClass('has-error').removeClass('has-success');

              $("#btncreate").attr("disabled", false);

            } else {

              if (response.messages instanceof Object) {
                $.each(response.messages, function(index, value) {
                  var id = $("#" + index);

                  id.closest('.form-group')
                    .removeClass('has-error')
                    .removeClass('has-success')
                    .addClass(value.length > 0 ? 'has-error' : 'has-success');
                  $("#btncreate").attr("disabled", false);

                  id.after(value);

                  spinner.hide();

                });
              } else {
                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                  '</div>');
              }
            }
          }
        });

        return false;
      });

    });

    function updateRuta(id) {
      $.ajax({
        url: 'fetchRutasDataById/' + id,
        type: 'post',
        dataType: 'json',
        success: function(response) {

          $("#edit_name").val(response.ruta_nombre);
          $("#edit_active").val(response.estatus);

          $("#updateForm").unbind('submit').bind('submit', function() {
            var form = $(this);

            spinner.show();
            $("#btnupdate").attr("disabled", true);

            $(".text-danger").remove();

            $.ajax({
              url: form.attr('action') + '/' + id,
              type: form.attr('method'),
              data: form.serialize(),
              dataType: 'json',
              success: function(response) {

                manageTable.ajax.reload(null, false);

                if (response.success === true) {
                  $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                    '</div>');


                  $("#editModal").modal('hide');
                  spinner.hide();

                  $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');

                  $("#btnupdate").attr("disabled", false);

                } else {

                  if (response.messages instanceof Object) {
                    $.each(response.messages, function(index, value) {
                      var id = $("#" + index);

                      id.closest('.form-group')
                        .removeClass('has-error')
                        .removeClass('has-success')
                        .addClass(value.length > 0 ? 'has-error' : 'has-success');

                      id.after(value);
                      $("#btnupdate").attr("disabled", false);
                      spinner.hide();

                    });
                  } else {
                    $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                      '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                      '</div>');
                  }
                }
              }
            });

            return false;
          });

        }
      });
    }

    function removeRuta(id) {
      if (id) {
        $("#removeForm").on('submit', function() {

          var form = $(this);

          spinner.show();
          $("#btndelete").attr("disabled", true);

          $(".text-danger").remove();

          $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: {
              ruta_id: id
            },
            dataType: 'json',
            success: function(response) {

              manageTable.ajax.reload(null, false);

              if (response.success === true) {
                $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                  '</div>');

                $("#removeModal").modal('hide');
                spinner.hide();
                $("#btndelete").attr("disabled", false);


              } else {

                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                  '</div>');

                spinner.hide();

              }
            }
          });

          return false;
        });
      }
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
      background: rgba(0, 0, 0, 0.75) url(<?php echo base_url('assets/images/loading.gif'); ?>) no-repeat center center;
      z-index: 10000;
    }
  </style>
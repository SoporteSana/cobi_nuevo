<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Tickets
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Turnos</li>
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

        <?php if (in_array('createTicket', $user_permission)) : ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Agregar</button>
          <br /> <br />
        <?php endif; ?>

        <div class="box-body">
          <table id="manageTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>folio</th>
                <th>unidad</th>
                <th>placas</th>
                <th>fecha</th>
                <th>peso</th>
                <th>destino</th>
                <th>Estatus</th>
                <?php if (in_array('updateTurno', $user_permission) || in_array('deleteTurno', $user_permission)) : ?>
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

<?php if (in_array('createTicket', $user_permission)) : ?>

  <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar</h4>
        </div>

        <form role="form" action="<?php echo base_url('tickets/create') ?>" method="post" id="createForm">

          <div class="modal-body ui-front">

            <div class="form-group">
              <label for="create_folio">Folio</label>
              <input type="text" class="form-control" id="create_folio" name="create_folio" placeholder="folio" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="create_unidad">Unidad</label>
              <input type="text" class="form-control" id="create_unidad" name="create_unidad" placeholder="unidad" autocomplete="off">
            </div>
            <div class="form-group">
              <input type="hidden" name="create_unidad_id" id="create_unidad_id" value='0'>
            </div>
            <div class="form-group">
              <label for="create_placas">Placas</label>
              <input readonly type="text" class="form-control" id="create_placas" name="create_placas" placeholder="placas" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="create_fecha">Fecha</label>
              <input type="date" class="form-control" id="create_fecha" name="create_fecha" placeholder="fecha" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="create_peso">Peso</label>
              <input type="text" class="form-control" id="create_peso" name="create_peso" placeholder="peso" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="create_destino">Destino</label>
              <input type="text" class="form-control" id="create_destino" name="create_destino" placeholder="destino" autocomplete="off">
            </div>
            <div class="form-group">
              <input type="hidden" name="create_destino_id" id="create_destino_id" value='0'>
            </div>

            <div class="form-group">
              <label for="create_active">Estatus</label>
              <select class="form-control" id="create_active" name="create_active">
                <option value="0">Activo</option>
                <option value="1">Inactivo</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="btncrear">Crear</button>
          </div>

        </form>


      </div>
    </div>
  </div>
<?php endif; ?>

<?php if (in_array('updateTurno', $user_permission)) : ?>

  <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Editar</h4>
        </div>

        <form role="form" action="<?php echo base_url('tickets/update') ?>" method="post" id="updateForm">

          <div class="modal-body ui-front">
            <div id="messages"></div>

            <div class="form-group">
              <label for="update_folio">Folio</label>
              <input type="text" class="form-control" id="update_folio" name="update_folio" placeholder="folio" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="update_unidad">Unidad</label>
              <input type="text" class="form-control" id="update_unidad" name="update_unidad" placeholder="unidad" autocomplete="off">
            </div>
            <div class="form-group">
              <input type="hidden" name="update_unidad_id" id="update_unidad_id" value='0'>
            </div>
            <div class="form-group">
              <label for="update_placas">Placas</label>
              <input readonly type="text" class="form-control" id="update_placas" name="update_placas" placeholder="placas" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="update_fecha">Fecha</label>
              <input type="date" class="form-control" id="update_fecha" name="update_fecha" placeholder="fecha" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="update_peso">Peso</label>
              <input type="text" class="form-control" id="update_peso" name="update_peso" placeholder="peso" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="update_destino">Destino</label>
              <input type="text" class="form-control" id="update_destino" name="update_destino" placeholder="destino" autocomplete="off">
            </div>
            <div class="form-group">
              <input type="hidden" name="update_destino_id" id="update_destino_id" value='0'>
            </div>

            <div class="form-group">
              <label for="update_active">Estatus</label>
              <select class="form-control" id="update_active" name="update_active">
                <option value="0">Activo</option>
                <option value="1">Inactivo</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="btneditar">Guardar</button>
          </div>

        </form>


      </div>
    </div>
  </div>
  <div id="loader"></div>
<?php endif; ?>

<?php if (in_array('deleteTicket', $user_permission)) : ?>

  <div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Eliminar</h4>
        </div>

        <form role="form" action="<?php echo base_url('tickets/remove') ?>" method="post" id="removeForm">
          <div class="modal-body">
            <p>¿De verdad quieres eliminarlo?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="btneliminar">Eliminar</button>
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
    $("#ticketNav").addClass('active');

    manageTable = $('#manageTable').DataTable({
      'ajax': 'fetchTicketsData',
      'order': []
    });

    $("#createForm").unbind('submit').on('submit', function() {
      var form = $(this);

      spinner.show();
      $("#btncrear").attr("disabled", true);

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

            $("#btncrear").attr("disabled", false);

          } else {

            if (response.messages instanceof Object) {
              $.each(response.messages, function(index, value) {
                var id = $("#" + index);

                id.closest('.form-group')
                  .removeClass('has-error')
                  .removeClass('has-success')
                  .addClass(value.length > 0 ? 'has-error' : 'has-success');

                $("#btncrear").attr("disabled", false);

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

    $("#create_unidad").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>tickets/unidadlist",
          type: 'post',
          dataType: "json",
          data: {
            search: request.term
          },
          success: function(data) {
            response(data);
          }
        });
      },
      select: function(event, ui) {

        $('#create_unidad').val(ui.item.label); // display the selected text
        $('#create_unidad_id').val(ui.item.value); // save selected id to input
        $('#create_placas').val(ui.item.label2);
        return false;
      },
      focus: function(event, ui) {
        $("#create_unidad").val(ui.item.label);
        $("#create_unidad_id").val(ui.item.value);
        $('#create_placas').val(ui.item.label2);
        return false;
      },
    });

    $("#create_destino").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>tickets/destinolist",
          type: 'post',
          dataType: "json",
          data: {
            search: request.term
          },
          success: function(data) {
            response(data);
          }
        });
      },
      select: function(event, ui) {

        $('#create_destino').val(ui.item.label); // display the selected text
        $('#create_destino_id').val(ui.item.value); // save selected id to input
        return false;
      },
      focus: function(event, ui) {
        $("#create_destino").val(ui.item.label);
        $("#create_destino_id").val(ui.item.value);
        return false;
      },
    });



  });

  function updateTicket(id) {
    $.ajax({
      url: 'fetchTicketsDataById/' + id,
      type: 'post',
      dataType: 'json',
      success: function(response) {

        $("#update_folio").val(response.folio);
        $("#update_unidad").val(response.unidad_numero);
        $("#update_unidad_id").val(response.unidad_id);
        $("#update_placas").val(response.unidad_placas);
        $("#update_fecha").val(response.fecha);
        $("#update_peso").val(response.peso);
        $("#update_destino").val(response.destinofinal_nombre);
        $("#update_destino_id").val(response.destinofinal_id);
        $("#update_active").val(response.estatus);

        $("#updateForm").unbind('submit').bind('submit', function() {
          var form = $(this);

          spinner.show();
          $("#btneditar").attr("disabled", true);

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

                $("#btneditar").attr("disabled", false);

              } else {

                if (response.messages instanceof Object) {
                  $.each(response.messages, function(index, value) {
                    var id = $("#" + index);

                    id.closest('.form-group')
                      .removeClass('has-error')
                      .removeClass('has-success')
                      .addClass(value.length > 0 ? 'has-error' : 'has-success');

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

      }
    });
  }

  function removeTicket(id) {
    if (id) {
      $("#removeForm").on('submit', function() {

        var form = $(this);

        spinner.show();
        $("#btneliminar").attr("disabled", true);

        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          data: {
            ticket_id: id
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

              $("#btneliminar").attr("disabled", false);
              spinner.hide();

            } else {

              $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                '</div>');
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
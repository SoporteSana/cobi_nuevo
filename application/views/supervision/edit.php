<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Registro de vigilancia
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"> Agregar registro</li>
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
            <h3 class="box-title">Finalisar registro</h3>
          </div>

          <div class="container-fluid">
            <div class="row">
              <div class="col-md-2">
              </div>
              <div class="col-md-8">
                <form id="editar" role="form" action="<?php base_url('supervicion/update') ?>" method="post">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="asignacion">Asignacion</label>
                      <br>
                      <select id="asignacion" name="asignacion" style="width:300px">
                        <?php foreach ($asignaciones as $asignacion) { ?>
                          <option value="<?php echo $asignacion['asignacion_id']; ?>"><?php echo $asignacion['asignacion_nombre']; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="numeroeconomico">Supervisor</label>
                      <input readonly type="text" class="form-control" id="numeroeconomico" name="numeroeconomico" placeholder="numero de unidad" autocomplete="off" value="<?php echo $username; ?>" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="supervisor_id" id="supervisor_id" value="<?php echo $usuario_id; ?>">
                    </div>

                    <div class="form-group">
                      <label for="numeroeconomico">No. Economico</label>
                      <input readonly type="text" class="form-control" id="numeroeconomico" name="numeroeconomico" placeholder="numero de unidad" autocomplete="off" value="<?php echo $registro_data['unidad_numero']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="semana">Semana</label>
                      <input readonly type="text" class="form-control" id="semana" name="semana" placeholder="semana de unidad" autocomplete="off" value="<?php echo $registro_data['semana']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="dia">Dia</label>
                      <input readonly type="text" class="form-control" id="dia" name="dia" placeholder="numero de unidad" autocomplete="off" value="<?php echo $registro_data['dia']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="horasalida">Hora de salida</label>
                      <input readonly type="text" class="form-control" id="horasalida" name="horasalida" placeholder="hora salida" autocomplete="off" value="<?php echo $registro_data['hora_salida']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="horaentrada">Hora de entrada</label>
                      <input readonly type="text" class="form-control" id="horaentrada" name="horaentrada" placeholder="horaentrada" autocomplete="off" value="<?php echo $registro_data['hora_entrada']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="horatablero">Hora tablero</label>
                      <input readonly type="text" class="form-control" id="horatablero" name="horatablero" placeholder="horatablero" autocomplete="off" value="<?php echo $registro_data['hora_tablero']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="tiemporuta">Tiempo de ruta</label>
                      <input readonly type="text" class="form-control" id="tiemporuta" name="tiemporuta" placeholder="horatablero" autocomplete="off" value="<?php echo $duracion_ruta; ?>" />
                    </div>


                    <div class="form-group">
                      <label for="alias">Alias</label>
                      <input readonly type="text" class="form-control" id="alias" name="alias" placeholder="alias" autocomplete="off" value="<?php echo $registro_data['alias_nombre']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="turno">Turno</label>
                      <input readonly type="text" class="form-control" id="turno" name="turno" placeholder="turno" autocomplete="off" value="<?php echo $registro_data['turno_nombre']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="ruta">Ruta</label>
                      <input readonly type="text" class="form-control" id="ruta" name="ruta" placeholder="ruta" autocomplete="off" value="<?php echo $registro_data['ruta_nombre']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="operador">Operador</label>
                      <input readonly type="text" class="form-control" id="operador" name="operador" placeholder="operador" autocomplete="off" value="<?php echo $registro_data['operador_nombre']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="norecolectores">No. recolectores</label>
                      <input readonly type="text" class="form-control" id="norecolectores" name="norecolectores" placeholder="norecolectores" autocomplete="off" value="<?php echo $registro_data['numrecolector']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="recolectores">recoelctor 1</label>
                      <input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['Recolector1']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="recolectores">recoelctor 2</label>
                      <input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['Recolector2']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="recolectores">recoelctor 3</label>
                      <input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['Recolector3']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="recolectores">recoelctor 4</label>
                      <input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['Recolector4']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="recolectores">recoelctor 5</label>
                      <input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['Recolector5']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="kmsalida">Km de salida</label>
                      <input readonly type="text" class="form-control" id="kmsalida" name="kmsalida" placeholder="kmsalida" autocomplete="off" value="<?php echo $registro_data['km_salida']; ?>" />
                    </div>


                    <div class="form-group">
                      <label for="kmentrada">Km de entrada</label>
                      <input readonly type="text" class="form-control" id="kmentrada" name="kmentrada" placeholder="kmentrada" autocomplete="off" value="<?php echo $registro_data['km_entrada']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="Recorrido">Recorrido</label>
                      <input readonly type="text" class="form-control" id="Recorrido" name="Recorrido" placeholder="Recorrido" autocomplete="off" value="<?php echo $registro_data['km_entrada'] - $registro_data['km_salida']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="Litroscargados">Litros cargados</label>
                      <input type="number" class="form-control" id="Litroscargados" name="Litroscargados" placeholder="Litroscargados" autocomplete="off" step="any" />
                      <div class="text-danger"><?php echo form_error('Litroscargados'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="Rendimiento">Rendimiento</label>
                      <input readonly type="text" class="form-control" id="Rendimiento" name="Rendimiento" placeholder="Rendimiento" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <label for="observaciones">observaciones</label>
                      <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Ingresa un comentario" autocomplete="off" value="N/A" />
                      <div class="text-danger"><?php echo form_error('observaciones'); ?></div>
                    </div>

                  </div>

                  <!-- Botón para agregar a la tabla -->
                  <button type="button" id="addResiduo" class="btn btn-info">Añadir Residuo</button>
                  <!-- Tabla/Listado de residuos agregados -->
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Manifiestos</th>
                        <th>acciones</th>
                      </tr>
                    </thead>
                    <tbody id="residuosList">
                      <!-- Los elementos se agregarán dinámicamente aquí -->
                    </tbody>
                  </table>



                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" id="submitButton" disabled>Guardar</button>
                    <a href="<?php echo base_url('vigilancia/') ?>" class="btn btn-warning">Regresar</a>
                  </div>
                </form>
              </div>
              <div class="col-md-2">
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>


  </section>

  <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar</h4>
        </div>

        <form role="form" action="#" method="post" id="createForm">

          <div class="modal-body ui-front">

            <div class="form-group">
              <label for="manifiesto"># manifiesto</label>
              <input type="text" class="form-control" id="manifiesto" name="manifiesto" placeholder="manifiesto" autocomplete="off">
            </div>
            <div class="form-group">
              <input type="hidden" name="manifiesto_id" id="manifiesto_id" value='0'>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" id="btncrear">Crear</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

<div id="loader"></div>

<script type="text/javascript">
  $(document).ready(function() {

    $('#addResiduo').click(function() {
      $('#addModal').modal('show'); // Este ID debe coincidir con el ID de tu modal
    });

    $(document).on('click', '.btnEliminarRow', function() {
      $(this).closest('tr').remove(); // Remove the closest <tr> when the "Delete" button is clicked
    });

    $('#btncrear').on('click', function(e) {
      e.preventDefault();
      var manifiesto = $('#manifiesto').val();
      var manifiesto_id = $('#manifiesto_id').val();

      if (manifiesto.trim() !== "" && manifiesto_id.trim() !== "") {
        // Generate a unique identifier for this row (e.g., timestamp)
        var uniqueId = new Date().getTime(); // You can use a different method for generating unique IDs

        // Create a new table row with the data, unique identifier, and a delete button
        var newRow = `
            <tr id="row_${uniqueId}">
                <td>${manifiesto_id}</td>
                <td>${manifiesto}</td>
                <td><button class="btn btn-danger btnEliminarRow" data-row-id="${uniqueId}">Eliminar</button></td>
            </tr>
        `;

        // Append the new row to the table
        $('#residuosList').append(newRow);

        // Create hidden input fields for the data and add them to the form
        var hiddenManifiestoIdInput = `<input type="hidden" name="manifiesto_id[]" value="${manifiesto_id}">`;
        var hiddenManifiestoInput = `<input type="hidden" name="manifiesto[]" value="${manifiesto}">`;

        // Append the hidden inputs to the form
        $('#editar').append(hiddenManifiestoIdInput);
        $('#editar').append(hiddenManifiestoInput);

        // Clear the modal fields
        $('#manifiesto').val('');
        $('#manifiesto_id').val('');

        // Close the modal
        $('#addModal').modal('hide');
      }
    });

    $("#supervisionNav").addClass('active');

    $('.Tiro').hide();

    $('#select').change(handleSelect);

    $('#Litroscargados').on('input', function() {
      var litros = parseFloat($('#Litroscargados').val());
      var recorrido = parseFloat($('#Recorrido').val());
      var rendimiento = recorrido / litros;
      $('#Rendimiento').val(rendimiento.toFixed(2));
    });

    var $pesoInputs = $('.peso-input');

    $pesoInputs.on('input', function() {

      var peso1 = Number($('#peso1').val());
      var peso2 = Number($('#peso2').val());
      var peso3 = Number($('#peso3').val());
      var peso4 = Number($('#peso4').val());
      var peso5 = Number($('#peso5').val());
      var peso6 = Number($('#peso6').val());
      var peso7 = Number($('#peso7').val());
      var peso8 = Number($('#peso8').val());
      var peso9 = Number($('#peso9').val());
      var peso10 = Number($('#peso10').val());

      var totalPeso = peso1 + peso2 + peso3 + peso4 + peso5 + peso6 + peso7 + peso8 + peso9 + peso10;

      $('#totalpeso').val(totalPeso);
    });

    $("input").on("input", function() {
      var Litroscargados = $("#Litroscargados").val();
      var observaciones = $("#observaciones").val();

      if (Litroscargados != "" && observaciones != "") {
        $("#submitButton").prop("disabled", false);
      } else {
        $("#submitButton").prop("disabled", true);
      }
    });

    /* $('#editar').submit(function() {
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
     */

    $("#manifiesto").autocomplete({
      source: "<?php echo base_url('supervision/manifiestoslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#manifiesto").val(ui.item.label);
        $("#manifiesto_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#manifiesto").val(ui.item.label);
        return false;
      },
      minLength: 1
    });

  });

  function handleSelect() {
    var numTiros = $('#select').val();
    for (var i = 1; i <= 10; i++) {
      if (i <= numTiros) {
        $('#Tiro_' + i).parent('.Tiro').show();
      } else {
        $('#Tiro_' + i).parent('.Tiro').hide();
      }
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
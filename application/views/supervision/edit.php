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
            <h3 class="box-title">Finaisar registro</h3>
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
                      <input readonly type="text" class="form-control" id="norecolectores" name="norecolectores" placeholder="norecolectores" autocomplete="off" value="<?php echo $registro_data['numrecolectores']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="recolectores">recoelctor 1</label>
                      <input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector1']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="recolectores">recoelctor 2</label>
                      <input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector2']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="recolectores">recoelctor 3</label>
                      <input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector3']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="recolectores">recoelctor 4</label>
                      <input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector4']; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="recolectores">recoelctor 5</label>
                      <input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector5']; ?>" />
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
                      <label for="select"># de tiros</label>
                      <br>
                      <select id="select" name="select" onchange="handleSelect()" style="width:300px">
                        <option value="0">Sin Tiros</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select>
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_1">Tiro 1</label>
                      <input type="text" class="form-control" id="Tiro_1" name="Tiro_1" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro1_id" id="Tiro1_id">
                      <div class="text-danger"><?php echo form_error('Tiro1_id'); ?></div>
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso1" id="peso1">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_2">Tiro 2</label>
                      <input type="text" class="form-control" id="Tiro_2" name="Tiro_2" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro2_id" id="Tiro2_id">
                      <div class="text-danger"><?php echo form_error('Tiro2_id'); ?></div>
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso2" id="peso2">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_3">Tiro 3</label>
                      <input type="text" class="form-control" id="Tiro_3" name="Tiro_3" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro3_id" id="Tiro3_id">
                      <div class="text-danger"><?php echo form_error('Tiro3_id'); ?></div>
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso3" id="peso3">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_4">Tiro 4</label>
                      <input type="text" class="form-control" id="Tiro_4" name="Tiro_4" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro4_id" id="Tiro4_id">
                      <div class="text-danger"><?php echo form_error('Tiro4_id'); ?></div>
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso4" id="peso4">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_5">Tiro 5</label>
                      <input type="text" class="form-control" id="Tiro_5" name="Tiro_5" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro5_id" id="Tiro5_id">
                      <div class="text-danger"><?php echo form_error('Tiro5_id'); ?></div>
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso5" id="peso5">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_6">Tiro 6</label>
                      <input type="text" class="form-control" id="Tiro_6" name="Tiro_6" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro6_id" id="Tiro6_id">
                      <div class="text-danger"><?php echo form_error('Tiro6_id'); ?></div>
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso6" id="peso6">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_7">Tiro 7</label>
                      <input type="text" class="form-control" id="Tiro_7" name="Tiro_7" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro7_id" id="Tiro7_id">
                      <div class="text-danger"><?php echo form_error('Tiro7_id'); ?></div>
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso7" id="peso7">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_8">Tiro 8</label>
                      <input type="text" class="form-control" id="Tiro_8" name="Tiro_8" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro8_id" id="Tiro8_id">
                      <div class="text-danger"><?php echo form_error('Tiro8_id'); ?></div>
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso8" id="peso8">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_9">Tiro 9</label>
                      <input type="text" class="form-control" id="Tiro_9" name="Tiro_9" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro9_id" id="Tiro9_id">
                      <div class="text-danger"><?php echo form_error('Tiro9_id'); ?></div>
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso9" id="peso9">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_10">Tiro 10</label>
                      <input type="text" class="form-control" id="Tiro_10" name="Tiro_10" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro10_id" id="Tiro10_id">
                      <div class="text-danger"><?php echo form_error('Tiro10_id'); ?></div>
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso10" id="peso10">
                    </div>

                    <div class="form-group">
                      <label for="totalpeso">Total de pesos</label>
                      <input readonly type="number" class="form-control" id="totalpeso" name="totalpeso" placeholder="totalpeso" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <label for="observaciones">Opservaciones</label>
                      <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Ingresa un comentario" autocomplete="off" value="N/A" />
                      <div class="text-danger"><?php echo form_error('observaciones'); ?></div>
                    </div>


                  </div>

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

</div>

<div id="loader"></div>

<script type="text/javascript">
  $(document).ready(function() {

    $("#supervisionNav").addClass('active');

    $('.Tiro').hide();

    $('#select').change(handleSelect);

    $('#Litroscargados').on('input', function() {
      var litros = parseFloat($('#Litroscargados').val());
      var recorrido = parseFloat($('#Recorrido').val());
      var rendimiento = recorrido / litros;
      $('#Rendimiento').val(rendimiento.toFixed(2));
    });

    $("#Tiro_1").autocomplete({
      source: "<?php echo base_url('supervision/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_1").val(ui.item.label);
        $("#Tiro1_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_1").val(ui.item.label);
        $('#peso1')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal1").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });


    $("#Tiro_2").autocomplete({
      source: "<?php echo base_url('supervision/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_2").val(ui.item.label);
        $("#Tiro2_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_2").val(ui.item.label);
        $('#peso2')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal2").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_3").autocomplete({
      source: "<?php echo base_url('supervision/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_3").val(ui.item.label);
        $("#Tiro3_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_3").val(ui.item.label);
        $('#peso3')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal3").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_4").autocomplete({
      source: "<?php echo base_url('supervision/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_4").val(ui.item.label);
        $("#Tiro4_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_4").val(ui.item.label);
        $('#peso4')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal4").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_5").autocomplete({
      source: "<?php echo base_url('supervision/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_5").val(ui.item.label);
        $("#Tiro5_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_5").val(ui.item.label);
        $('#peso5')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal5").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_6").autocomplete({
      source: "<?php echo base_url('supervision/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_6").val(ui.item.label);
        $("#Tiro6_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_6").val(ui.item.label);
        $('#peso6')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal6").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_7").autocomplete({
      source: "<?php echo base_url('supervision/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_7").val(ui.item.label);
        $("#Tiro7_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_7").val(ui.item.label);
        $('#peso7')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal7").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_8").autocomplete({
      source: "<?php echo base_url('supervision/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_8").val(ui.item.label);
        $("#Tiro8_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_8").val(ui.item.label);
        $('#peso8')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal8").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_9").autocomplete({
      source: "<?php echo base_url('supervision/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_9").val(ui.item.label);
        $("#Tiro9_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_9").val(ui.item.label);
        $('#peso9')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal9").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_10").autocomplete({
      source: "<?php echo base_url('supervision/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_10").val(ui.item.label);
        $("#Tiro10_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_10").val(ui.item.label);
        $('#peso10')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal10").val(ui.item.destino);
        return false;
      },
      minLength: 1
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

    $('#editar').submit(function() {
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
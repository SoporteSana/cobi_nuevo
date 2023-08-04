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
            <h3 class="box-title"> Agregar registro</h3>
          </div>

          <div class="container-fluid">
            <div class="row">
              <div class="col-md-2">
              </div>
              <div class="col-md-8">
                <form id="coregir" role="form" action="<?php base_url('supervicion/update') ?>" method="post">
                  <div class="box-body">

                    <div class=" form-group">
                      <label for="asignacion">Asignacion</label>
                      <input type="text" class="form-control" id="asignacion" name="asignacion" placeholder="asignacion de unidad" autocomplete="off" value="<?php echo $registro_data[0]->asignacion_nombre; ?>" />
                      <div class="text-danger"><?php echo form_error('asignacion_id'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="asignacion_id" id="asignacion_id" value="<?php echo $registro_data[0]->asignacion_id; ?>">
                    </div>

                    <div class="form-group">
                      <label for="supervisor">Supervisor</label>
                      <input readonly type="text" class="form-control" id="supervisor" name="supervisor" placeholder="numero de unidad" autocomplete="off" value="<?php echo $registro_data[0]->nombres; ?>" />
                    </div>

                    <div class=" form-group">
                      <label for="numeroeconomico">No. Economico</label>
                      <input type="text" class="form-control" id="numeroeconomico" name="numeroeconomico" placeholder="numero de unidad" autocomplete="off" value="<?php echo $registro_data[0]->unidad_numero; ?>" />
                      <div class="text-danger"><?php echo form_error('unidad_id'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="unidad_id" id="unidad_id" value="<?php echo $registro_data[0]->unidad_id; ?>">
                    </div>

                    <div class="form-group">
                      <label for="semana">Semana</label>
                      <input type="text" class="form-control" id="semana" name="semana" placeholder="semana de unidad" autocomplete="off" value="<?php echo $registro_data[0]->semana; ?>" />
                      <div class="text-danger"><?php echo form_error('semana'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="dia">Dia</label>
                      <input type="text" class="form-control" id="dia" name="dia" placeholder="numero de unidad" autocomplete="off" value="<?php echo $registro_data[0]->dia; ?>" />
                      <div class="text-danger"><?php echo form_error('dia'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="horasalida">hora salida:</label>
                      <input type="text" class="form-control datetimepicker-input" id="horasalida" name="horasalida" data-toggle="datetimepicker" data-target="#horasalida" value="<?php echo $registro_data[0]->hora_salida; ?>" />
                      <div class="text-danger"><?php echo form_error('horasalida'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="fechasalida">fecha salida:</label>
                      <input type="text" class="form-control datetimepicker-input" id="fechasalida" name="fechasalida" data-toggle="datetimepicker" data-target="#fechasalida" value="<?php echo $registro_data[0]->fecha_salida; ?>" />
                      <div class="text-danger"><?php echo form_error('fechasalida'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="horaentrada">hora entrada:</label>
                      <input type="text" class="form-control datetimepicker-input" id="horaentrada" name="horaentrada" data-toggle="datetimepicker" data-target="#horaentrada" value="<?php echo $registro_data[0]->hora_entrada; ?>" />
                      <div class="text-danger"><?php echo form_error('horaentrada'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="fechaentrada">fecha entrada:</label>
                      <input type="text" class="form-control datetimepicker-input" id="fechaentrada" name="fechaentrada" data-toggle="datetimepicker" data-target="#fechaentrada" value="<?php echo $registro_data[0]->fecha_entrada; ?>" />
                      <div class="text-danger"><?php echo form_error('fechaentrada'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="horatablero">Hora tablero</label>
                      <input type="number" class="form-control" id="horatablero" name="horatablero" placeholder="horatablero" autocomplete="off" value="<?php echo $registro_data[0]->hora_tablero; ?>" />
                      <div class="text-danger"><?php echo form_error('horatablero'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="tiemporuta">Tiempo de ruta</label>
                      <input readonly type="text" class="form-control" id="tiemporuta" name="tiemporuta" placeholder="horatablero" autocomplete="off" value="<?php echo $registro_data[0]->tiempo_ruta; ?>" />
                      <div class="text-danger"><?php echo form_error('tiemporuta'); ?></div>
                    </div>


                    <div class="form-group">
                      <label for="alias">Alias</label>
                      <input type="text" class="form-control" id="alias" name="alias" placeholder="alias" autocomplete="off" value="<?php echo $registro_data[0]->alias_nombre; ?>" />
                      <div class="text-danger"><?php echo form_error('alias_id'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="alias_id" id="alias_id" value="<?php echo $registro_data[0]->alias_id; ?>">
                    </div>

                    <div class="form-group">
                      <label for="turno">Turno</label>
                      <input readonly type="text" class="form-control" id="turno" name="turno" placeholder="turno" autocomplete="off" value="<?php echo $registro_data[0]->turno_nombre; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="ruta">Ruta</label>
                      <input readonly type="text" class="form-control" id="ruta" name="ruta" placeholder="ruta" autocomplete="off" value="<?php echo $registro_data[0]->ruta_nombre; ?>" />
                    </div>

                    <div class="form-group">
                      <label for="operador">Operador</label>
                      <input type="text" class="form-control" id="operador" name="operador" placeholder="operador" autocomplete="off" value="<?php echo $registro_data[0]->operador_nombre; ?>" />
                      <div class="text-danger"><?php echo form_error('operador_id'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="operador_id" id="operador_id" value="<?php echo $registro_data[0]->operador_id; ?>">
                    </div>

                    <div class="form-group">
                      <label for="norecolectores">No. recolectores</label>
                      <input type="text" class="form-control" id="norecolectores" name="norecolectores" placeholder="norecolectores" autocomplete="off" value="<?php echo $registro_data[0]->numrecolectores; ?>" />
                      <div class="text-danger"><?php echo form_error('norecolectores'); ?></div>
                    </div>

                    <?php for ($i = 0; $i < count($recolectores); $i++) : ?>
                      <div class="recolector">
                        <label for="Recolector_<?php echo ($i + 1); ?>">Recolector <?php echo ($i + 1); ?></label>
                        <input type="text" class="form-control" id="Recolector_<?php echo ($i + 1); ?>" name="Recolector_<?php echo ($i + 1); ?>" value="<?php echo isset($recolectores[$i]) ? $recolectores[$i] : ""; ?>" />
                        <input type="hidden" id="RecolectorId_<?php echo ($i + 1); ?>" name="RecolectorId_<?php echo ($i + 1); ?>" value="<?php echo isset($recolector_ids[$i]) ? $recolector_ids[$i] : ""; ?>" />
                      </div>
                    <?php endfor; ?>

                    <div class="form-group">
                      <label for="kmsalida">Km de salida</label>
                      <input type="text" class="form-control" id="kmsalida" name="kmsalida" placeholder="kmsalida" autocomplete="off" value="<?php echo $registro_data[0]->km_salida; ?>" />
                      <div class="text-danger"><?php echo form_error('kmsalida'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="kmentrada">Km de entrada</label>
                      <input type="text" class="form-control" id="kmentrada" name="kmentrada" placeholder="kmentrada" autocomplete="off" value="<?php echo $registro_data[0]->km_entrada; ?>" />
                      <div class="text-danger"><?php echo form_error('kmentrada'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="Recorrido">Recorrido</label>
                      <input readonly type="text" class="form-control" id="Recorrido" name="Recorrido" placeholder="Recorrido" autocomplete="off" value="<?php echo $registro_data[0]->km_entrada; ?>" - value="<?php echo $registro_data[0]->km_salida; ?>" />
                      <div class="text-danger"><?php echo form_error('Recorrido'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="Litroscargados">Litros cargados</label>
                      <input type="text" class="form-control" id="Litroscargados" name="Litroscargados" placeholder="Litroscargados" autocomplete="off" value="<?php echo $registro_data[0]->litroscargados; ?>" />
                      <div class="text-danger"><?php echo form_error('Litroscargados'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="Rendimiento">Rendimiento</label>
                      <input readonly type="text" class="form-control" id="Rendimiento" name="Rendimiento" placeholder="Rendimiento" autocomplete="off" value="<?php echo $registro_data[0]->rendimiento; ?>" />
                      <div class="text-danger"><?php echo form_error('Rendimiento'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="norecolectores">id manifiesto</label>
                      <input readonly type="text" class="form-control" id="norecolectores" name="norecolectores" placeholder="norecolectores" autocomplete="off" value="<?php echo $registro_data[0]->manifiesto_id; ?>" />
                      <div class="text-danger"><?php echo form_error('norecolectores'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="norecolectores">No. Folios</label>
                      <input type="text" class="form-control" id="norecolectores" name="norecolectores" placeholder="norecolectores" autocomplete="off" value="<?php echo $registro_data[0]->numfolios; ?>" />
                      <div class="text-danger"><?php echo form_error('norecolectores'); ?></div>
                    </div>

                    <?php for ($i = 0; $i < 10; $i++) : ?>
                      <div class="Tiro">
                        <label for="Tiro_<?php echo ($i + 1); ?>">Tiro <?php echo ($i + 1); ?></label>
                        <input type="text" class="form-control" id="Tiro_<?php echo ($i + 1); ?>" name="Tiro_<?php echo ($i + 1); ?>" value="folio: <?php echo isset($folios[$i]) ? $folios[$i] : "0"; ?> | peso: <?php echo isset($pesos_folios[$i]) ? $pesos_folios[$i] : "0"; ?>" />
                      </div>

                      <div class="form-group">
                        <input type="hidden" name="Tiro<?php echo ($i + 1); ?>_id" id="Tiro<?php echo ($i + 1); ?>_id" value="<?php echo isset($tiro_ids[$i]) ? $tiro_ids[$i] : ""; ?>">
                        <div class="text-danger"><?php echo form_error('Tiro' . ($i + 1) . '_id'); ?></div>
                      </div>

                      <div class="peso-input">
                        <input type="hidden" name="peso<?php echo ($i + 1); ?>" id="peso<?php echo ($i + 1); ?>" value="<?php echo isset($pesos[$i]) ? $pesos[$i] : ""; ?>">
                      </div>
                    <?php endfor; ?>


                    <div class="form-group">
                      <label for="totalpeso">Total de pesos</label>
                      <input readonly type="number" class="form-control" id="totalpeso" name="totalpeso" placeholder="totalpeso" autocomplete="off" value="<?php echo $registro_data[0]->peso_total; ?>" />
                      <div class="text-danger"><?php echo form_error('totalpeso'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="observaciones">Opservaciones</label>
                      <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Ingresa un comentario" autocomplete="off" value="<?php echo $registro_data[0]->observaciones; ?>" />
                      <div class="text-danger"><?php echo form_error('observaciones'); ?></div>
                    </div>

                  </div>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" id="submitButton" disabled>Gardar</button>
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

    handleSelect(); // Llama a la función al cargar la página

    $('#select').change(handleSelect); // Agrega un manejador para cuando el valor del select cambie

    $("#correccionesNav").addClass('active');

    $("#asignacion").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/asignacionlist",
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

        $('#asignacion').val(ui.item.label);
        $('#asignacion_id').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#asignacion").val(ui.item.label);
        $("#asignacion_id").val(ui.item.value);
        return false;
      },
    });

    $("#numeroeconomico").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/unidadlist",
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

        $('#numeroeconomico').val(ui.item.label);
        $('#unidad_id').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#numeroeconomico").val(ui.item.label);
        $("#unidad_id").val(ui.item.value);
        return false;
      },
    });

    $("#alias").autocomplete({
      source: "<?php echo base_url('correcciones/aliaslist'); ?>",
      select: function(event, ui) {
        $("#alias").val(ui.item.label);
        $("#alias_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#alias").val(ui.item.label);
        $("#turno").val(ui.item.turno);
        $("#ruta").val(ui.item.ruta);
        return false;
      },
      minLength: 2
    });

    $("#operador").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/operadoreslist",
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

        $('#operador').val(ui.item.label);
        $('#operador_id').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#operador").val(ui.item.label);
        $("#operador_id").val(ui.item.value);
        return false;
      },
    });

    $("#Recolector_1").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/recolectoreslist",
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

        $('#Recolector_1').val(ui.item.label);
        $('#RecolectorId_1').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Recolector_1").val(ui.item.label);
        $("#RecolectorId_1").val(ui.item.value);
        return false;
      },
    });

    $("#Recolector_2").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/recolectoreslist",
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

        $('#Recolector_2').val(ui.item.label);
        $('#RecolectorId_2').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Recolector_2").val(ui.item.label);
        $("#RecolectorId_2").val(ui.item.value);
        return false;
      },
    });

    $("#Recolector_3").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/recolectoreslist",
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

        $('#Recolector_3').val(ui.item.label);
        $('#RecolectorId_3').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Recolector_3").val(ui.item.label);
        $("#RecolectorId_3").val(ui.item.value);
        return false;
      },
    });

    $("#Recolector_4").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/recolectoreslist",
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

        $('#Recolector_4').val(ui.item.label);
        $('#RecolectorId_4').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Recolector_4").val(ui.item.label);
        $("#RecolectorId_4").val(ui.item.value);
        return false;
      },
    });

    $("#Recolector_5").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/recolectoreslist",
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

        $('#Recolector_5').val(ui.item.label);
        $('#RecolectorId_5').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Recolector_5").val(ui.item.label);
        $("#RecolectorId_5").val(ui.item.value);
        return false;
      },
    });

    $('#kmentrada, #kmsalida').on('input', function() {
      var kmsalida = parseFloat($('#kmsalida').val());
      var kmentrada = parseFloat($('#kmentrada').val());
      var recorrido = kmentrada - kmsalida;
      $('#Recorrido').val(recorrido);
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

    $("#Tiro_1").autocomplete({
      source: "<?php echo base_url('correcciones/manifiestoslist/') ?>" + "<?php echo $registro_data[0]->unidad_id; ?>", 
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
        return false;
      },
      minLength: 1
    });

    $("#Tiro_2").autocomplete({
      source: "<?php echo base_url('correcciones/manifiestoslist/') ?>" + "<?php echo $registro_data[0]->unidad_id; ?>", 
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
        return false;
      },
      minLength: 1
    });

    $("#Tiro_3").autocomplete({
      source: "<?php echo base_url('correcciones/manifiestoslist/') ?>" + "<?php echo $registro_data[0]->unidad_id; ?>", 
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
        return false;
      },
      minLength: 1
    });

    $("#Tiro_4").autocomplete({
      source: "<?php echo base_url('correcciones/manifiestoslist/') ?>" + "<?php echo $registro_data[0]->unidad_id; ?>", 
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
        return false;
      },
      minLength: 1
    });

    $("#Tiro_5").autocomplete({
      source: "<?php echo base_url('correcciones/manifiestoslist/') ?>" + "<?php echo $registro_data[0]->unidad_id; ?>", 
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
        return false;
      },
      minLength: 1
    });

    $("#Tiro_6").autocomplete({
      source: "<?php echo base_url('correcciones/manifiestoslist/') ?>" + "<?php echo $registro_data[0]->unidad_id; ?>", 
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
        return false;
      },
      minLength: 1
    });

    $("#Tiro_7").autocomplete({
      source: "<?php echo base_url('correcciones/manifiestoslist/') ?>" + "<?php echo $registro_data[0]->unidad_id; ?>", 
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
        return false;
      },
      minLength: 1
    });

    $("#Tiro_8").autocomplete({
      source: "<?php echo base_url('correcciones/manifiestoslist/') ?>" + "<?php echo $registro_data[0]->unidad_id; ?>", 
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
        return false;
      },
      minLength: 1
    });

    $("#Tiro_9").autocomplete({
      source: "<?php echo base_url('correcciones/manifiestoslist/') ?>" + "<?php echo $registro_data[0]->unidad_id; ?>", 
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
        return false;
      },
      minLength: 1
    });

    $("#Tiro_10").autocomplete({
      source: "<?php echo base_url('correcciones/manifiestoslist/') ?>" + "<?php echo $registro_data[0]->unidad_id; ?>", 
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
        return false;
      },
      minLength: 1
    });

    $('#horaentrada, #horasalida').on('input', function() {
      var hora_salida = moment($("#horasalida").val(), "YYYY-MM-DD HH:mm:ss");
      var hora_entrada = moment($("#horaentrada").val(), "YYYY-MM-DD HH:mm:ss");
      var duracion_ruta = moment.utc(moment(hora_entrada).diff(moment(hora_salida))).format("HH:mm:ss");
      $("#tiemporuta").val(duracion_ruta);
    });


  });

  function handleSelect() {
    var numFolios = parseInt($('#select').val(), 10); // Convierte el valor seleccionado a un número entero

    $('.group-folio').each(function() {
      var folioIndex = parseInt($(this).data('folio-index'), 10); // Convierte el atributo data-folio-index a un número entero

      if (folioIndex <= numFolios) {
        $(this).show(); // Muestra el elemento si cumple la condición
      } else {
        $(this).hide(); // Oculta el elemento si no cumple la condición
      }
    });
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
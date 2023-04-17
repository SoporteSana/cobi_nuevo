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
                <form id="create" role="form" action="<?php base_url('vigilancia/create') ?>" method="post" id="createForm" style=" display:inline!important;">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="numeroeconomico">No. Economico</label>
                      <input type="text" class="form-control" id="numeroeconomico" name="numeroeconomico" placeholder="numero de unidad" autocomplete="off" />
                      <div class="text-danger"><?php echo form_error('numeroeconomico'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="numeroeconomico_id" id="numeroeconomico_id" value='0'>
                    </div>

                    <div class="form-group">
                      <label for="semana">Semana</label>
                      <input readonly type="text" class="form-control" id="semana" name="semana" placeholder="semana" autocomplete="off" value="<?php echo set_value('semana_actual', $semana_actual); ?>" />
                    </div>

                    <div class="form-group">
                      <label for="dia">Dia</label>
                      <input readonly type="text" class="form-control" id="dia" name="dia" placeholder="dia" autocomplete="off" value="<?php echo set_value('dia', $dia); ?>" />
                    </div>

                    <div class="form-group">
                      <label for="horasalida">hora_salida:</label>
                      <input type="text" class="form-control datetimepicker-input" id="horasalida" name="horasalida" data-toggle="datetimepicker" data-target="#horasalida" value="<?php echo set_value('hora_salida', $hora_salida); ?>" />
                    </div>

                    <div class="form-group">
                      <label for="horatablero">Hora del tablero</label>
                      <input type="text" class="form-control" id="horatablero" name="horatablero" placeholder="hora de tablero" autocomplete="off" />
                      <div class="text-danger"><?php echo form_error('horatablero'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="alias">Alias</label>
                      <input type="text" class="form-control" id="alias" name="alias" placeholder="alias" autocomplete="off" />
                      <div class="text-danger"><?php echo form_error('alias'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="alias_id" id="alias_id" value='0'>
                    </div>

                    <div class="form-group">
                      <label for="turno">Turno</label>
                      <input readonly type="text" class="form-control" id="turno" name="turno" placeholder="turno" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <label for="ruta">Ruta</label>
                      <input readonly type="text" class="form-control" id="ruta" name="ruta" placeholder="ruta" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <label for="operador">Operador</label>
                      <input type="text" class="form-control" id="operador" name="operador" placeholder="operador" autocomplete="off" />
                      <div class="text-danger"><?php echo form_error('operador'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="operador_id" id="operador_id" value='0'>
                    </div>

                    <div class="form-group">
                      <label for="select">Recolectores</label>
                      <br>
                      <select id="select" name="select" onchange="handleSelect()" style="width:300px">
                        <option value="0">Sin recolectores</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>

                    <div class="Recolector">
                      <label for="Recolector_1">Recolector 1</label>
                      <input type="text" class="form-control" id="Recolector_1" name="Recolector_1" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="Recolector">
                      <input type="hidden" name="Recolector1_id" id="Recolector1_id">
                    </div>

                    <div class="Recolector">
                      <label for="Recolector_2">Recolector 2</label>
                      <input type="text" class="form-control" id="Recolector_2" name="Recolector_2" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="Recolector">
                      <input type="hidden" name="Recolector2_id" id="Recolector2_id">
                    </div>

                    <div class="Recolector">
                      <label for="Recolector_3">Recolector 3</label>
                      <input type="text" class="form-control" id="Recolector_3" name="Recolector_3" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="Recolector">
                      <input type="hidden" name="Recolector3_id" id="Recolector3_id">
                    </div>

                    <div class="Recolector">
                      <label for="Recolector_4">Recolector 4</label>
                      <input type="text" class="form-control" id="Recolector_4" name="Recolector_4" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="Recolector">
                      <input type="hidden" name="Recolector4_id" id="Recolector4_id">
                    </div>

                    <div class="Recolector">
                      <label for="Recolector_5">Recolector 5</label>
                      <input type="text" class="form-control" id="Recolector_5" name="Recolector_5" placeholder="nombre" autocomplete="off" />
                    </div>

                    <div class="Recolector">
                      <input type="hidden" name="Recolector5_id" id="Recolector5_id">
                    </div>

                    <div class="form-group">
                      <label for="kmsalida">Km de salida</label>
                      <input type="text" class="form-control" id="kmsalida" name="kmsalida" placeholder="kmsalida" autocomplete="off" />
                      <div class="text-danger"><?php echo form_error('kmsalida'); ?></div>
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

  <div id="loader"></div>
</div>

<script type="text/javascript">
  $(document).ready(function() {

    $("#vigilanciaNav").addClass('active');

    $("#numeroeconomico").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>vigilancia/unidadlist",
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
        $('#numeroeconomico_id').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#numeroeconomico").val(ui.item.label);
        $("#numeroeconomico_id").val(ui.item.value);
        return false;
      },
    });

    $("#alias").autocomplete({
      source: "<?php echo base_url('vigilancia/aliaslist'); ?>",
      select: function(event, ui) {
        $("#alias").val(ui.item.label);
        $("#alias_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#alias").val(ui.item.label);
        $("#turno").val(ui.item.turno);
        $("#ruta").val(ui.item.ruta);
        $("#turno").val(ui.item.turno);
        return false;
      },
      minLength: 2
    });

    $("#operador").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>vigilancia/operadorlist",
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
          url: "<?= base_url() ?>vigilancia/recolectoreslist",
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
        $('#Recolector1_id').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Recolector1_id").val(ui.item.label);
        return false;
      },
    })

    $("#Recolector_2").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>vigilancia/recolectoreslist",
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
        $('#Recolector2_id').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Recolector2_id").val(ui.item.label);
        return false;
      },
    })

    $("#Recolector_3").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>vigilancia/recolectoreslist",
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
        $('#Recolector3_id').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Recolector3_id").val(ui.item.label);

        return false;
      },
    })

    $("#Recolector_4").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>vigilancia/recolectoreslist",
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
        $('#Recolector4_id').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Recolector_4").val(ui.item.label);
        $("#Recolector4_id").val(ui.item.value);
        return false;
      },
    })

    $("#Recolector_5").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>vigilancia/recolectoreslist",
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
        $('#Recolector5_id').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Recolector_5").val(ui.item.label);
        $("#Recolector5_id").val(ui.item.value);
        return false;
      },
    })

    handleSelect();

    $("input").on("input", function() {
      var numeroeconomico = $("#numeroeconomico").val();
      var horatablero = $("#horatablero").val();
      var alias = $("#alias").val();
      var operador = $("#operador").val();
      var kmsalida = $("#kmsalida").val();

      if (numeroeconomico != "" && horatablero != "" && alias != "" && operador != "" && kmsalida != "") {
        $("#submitButton").prop("disabled", false);
      } else {
        $("#submitButton").prop("disabled", true);
      }
    });

    $('#create').submit(function() {
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

  $(function() {
    $('#horasalida').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss'
    });
  });

  function handleSelect() {
    var numRecolectores = $('#select').val();
    for (var i = 1; i <= 5; i++) {
      if (i <= numRecolectores) {
        $('#Recolector_' + i).parent('.Recolector').show();
      } else {
        $('#Recolector_' + i).parent('.Recolector').hide();
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

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Actualizar Manifiestos
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"> Agregar Manifiesto</li>
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
                <form id="create" role="form" action="<?php base_url('manifiestos/update') ?>" method="post" id="createForm" style=" display:inline!important;">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="nummanifiesto"># Manifiesto</label>
                      <input type="text" class="form-control" id="nummanifiesto" name="nummanifiesto" placeholder="numero manifiesto" value="<?php echo $registro_data[0]->nummanifiesto; ?>" />
                      <div class="text-danger"><?php echo form_error('nummanifiesto'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="numeroeconomico">Unidad</label>
                      <input type="text" class="form-control" id="numeroeconomico" name="numeroeconomico" placeholder="numero de unidad" value="<?php echo $registro_data[0]->unidad_numero; ?>" />
                      <div class="text-danger"><?php echo form_error('numeroeconomico_id'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="numeroeconomico_id" id="numeroeconomico_id" value="<?php echo $registro_data[0]->unidad_id; ?>">
                    </div>

                    <div class="form-group">
                      <label for="placas">Placas</label>
                      <input readonly type="text" class="form-control" id="placas" name="placas" placeholder="placas" value="<?php echo $registro_data[0]->unidad_placas; ?>">
                    </div>

                    <div class="form-group">
                      <label for="fecha">Fecha:</label>
                      <input type="text" class="form-control datetimepicker-input" id="fecha" name="fecha" data-toggle="datetimepicker" data-target="#horasalida" value="<?php echo $registro_data[0]->fecha; ?>" />
                      <div class="text-danger"><?php echo form_error('fecha'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="destino">Destino</label>
                      <input type="text" class="form-control" id="destino" name="destino" placeholder="destino" value="<?php echo $registro_data[0]->destinofinal_nombre; ?>">
                      <div class="text-danger"><?php echo form_error('destino_id'); ?></div>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="destino_id" id="destino_id" value="<?php echo $registro_data[0]->destinofinal_id; ?>">
                    </div>

                    <div class="form-group">
                      <label for="select">Folios</label>
                      <br>
                      <select id="select" name="select" onchange="handleSelect()" style="width:300px">
                        <option value="0" <?php echo (count($folios) == 0) ? 'selected' : ''; ?>>Sin Folios</option>
                        <?php for ($i = 1; $i <= 10; $i++) : ?>
                          <option value="<?php echo $i; ?>" <?php echo (count($folios) == $i) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                        <?php endfor; ?>
                      </select>
                    </div>

                    <?php for ($i = 0; $i < 10; $i++) : ?>
                      <div class="group-folio" data-folio-index="<?php echo $i + 1; ?>" style="display: <?php echo $i < count($folios) ? 'block' : 'none'; ?>;">
                        <input type="hidden" id="FolioId_<?php echo ($i + 1); ?>" name="FolioId_<?php echo ($i + 1); ?>" value="<?php echo isset($folios_ids[$i]) ? $folios_ids[$i] : ""; ?>" />
                        <div class="Folio">
                          <label for="Folio_<?php echo ($i + 1); ?>">Folio <?php echo ($i + 1); ?></label>
                          <input type="text" class="form-control" id="Folio_<?php echo ($i + 1); ?>" name="Folio_<?php echo ($i + 1); ?>" placeholder="numero folio" value="<?php echo isset($folios[$i]) ? $folios[$i] : ""; ?>" />
                        </div>
                        <div class="Folio">
                          <label for="Descripcion_<?php echo ($i + 1); ?>">Descripcion</label>
                          <input type="text" class="form-control" id="Descripcion_<?php echo ($i + 1); ?>" name="Descripcion_<?php echo ($i + 1); ?>" placeholder="Descripcion" value="<?php echo isset($descripciones[$i]) ? $descripciones[$i] : ""; ?>" autocomplete="off" />
                        </div>
                        <div class="Folio">
                          <label for="Peso_<?php echo ($i + 1); ?>">Peso</label>
                          <input type="text" class="form-control" id="Peso_<?php echo ($i + 1); ?>" name="Peso_<?php echo ($i + 1); ?>" placeholder="peso" value="<?php echo isset($pesos_folios[$i]) ? $pesos_folios[$i] : ""; ?>" autocomplete="off" />
                        </div>
                      </div>
                    <?php endfor; ?>

                    <div class="form-group">
                      <label for="pesototal">Peso Total</label>
                      <input type="number" class="form-control" id="pesototal" name="pesototal" placeholder="peso total" value="<?php echo $registro_data[0]->peso_total; ?>" />
                      <div class="text-danger"><?php echo form_error('pesototal'); ?></div>
                    </div>

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary" id="submitButton" disabled>Guardar</button>
                      <a href="<?php echo base_url('manifiestos/') ?>" class="btn btn-warning">Regresar</a>
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

    $("#manifiestosNav").addClass('active');

    $("#numeroeconomico").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>manifiestos/unidadlist",
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

        $('#numeroeconomico').val(ui.item.label); // display the selected text
        $('#numeroeconomico_id').val(ui.item.value); // save selected id to input
        $('#placas').val(ui.item.label2);
        return false;
      },
      focus: function(event, ui) {
        $("#numeroeconomico").val(ui.item.label);
        $("#numeroeconomico_id").val(ui.item.value);
        $('#placas').val(ui.item.label2);
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

    $("#destino").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>manifiestos/destinolist",
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

        $('#destino').val(ui.item.label); // display the selected text
        $('#destino_id').val(ui.item.value); // save selected id to input
        return false;
      },
      focus: function(event, ui) {
        $("#destino").val(ui.item.label);
        $("#destino_id").val(ui.item.value);
        return false;
      },
    });

    var camposPeso = document.querySelectorAll('[id^="Peso_"]');
    var campoPesoTotal = document.getElementById("pesototal");

    camposPeso.forEach(function(campoPeso) {
      campoPeso.addEventListener('input', actualizarPesoTotal);
    });

    function actualizarPesoTotal() {
      var suma = 0;
      camposPeso.forEach(function(campoPeso) {
        var valor = parseFloat(campoPeso.value);
        if (!isNaN(valor)) {
          suma += valor;
        }
      });
      campoPesoTotal.value = suma.toFixed(2);
    }

    actualizarPesoTotal();

    handleSelect();

    $("input").on("input", function() {
      var numeroeconomico = $("#numeroeconomico").val();
      var numeroeconomico_id = $("#numeroeconomico_id").val();
      var horatablero = $("#horatablero").val();
      var alias = $("#alias").val();
      var alias_id = $("#alias_id").val();
      var operador = $("#operador").val();
      var operador_id = $("#operador_id").val();
      var kmsalida = $("#kmsalida").val();

      if (numeroeconomico != "" && numeroeconomico_id != "" && horatablero != "" && alias != "" && operador != "" && kmsalida != "") {
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
    var numFolios = $('#select').val();

    $('.group-folio').each(function() {
      var folioIndex = $(this).data('folio-index');

      if (folioIndex <= numFolios) {
        $(this).show();
      } else {
        $(this).hide();
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
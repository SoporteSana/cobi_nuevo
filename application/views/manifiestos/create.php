<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Manifiestos
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
                <form id="create" role="form" action="<?php base_url('vigilancia/create') ?>" method="post" id="createForm" style=" display:inline!important;">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="nummanifiesto"># Manifiesto</label>
                      <input type="text" class="form-control" id="nummanifiesto" name="nummanifiesto" placeholder="numero manifiesto" autocomplete="off" />
                      <div class="text-danger"><?php echo form_error('nummanifiesto'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="numeroeconomico">Unidad</label>
                      <input type="text" class="form-control" id="numeroeconomico" name="numeroeconomico" placeholder="numero de unidad" autocomplete="off" />
                      <div class="text-danger"><?php echo form_error('numeroeconomico'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="numeroeconomico_id" id="numeroeconomico_id">
                    </div>

                    <div class="form-group">
                      <label for="placas">Placas</label>
                      <input readonly type="text" class="form-control" id="placas" name="placas" placeholder="placas" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="fecha">Fecha:</label>
                      <input type="text" class="form-control datetimepicker-input" id="fecha" name="fecha" data-toggle="datetimepicker" data-target="#horasalida" value="<?php echo set_value('hora_salida', $hora_salida); ?>" />
                      <div class="text-danger"><?php echo form_error('fecha'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="destino">Destino</label>
                      <input type="text" class="form-control" id="destino" name="destino" placeholder="destino" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="destino_id" id="destino_id" value='0'>
                    </div>

                    <div class="form-group">
                      <label for="select">Folios</label>
                      <br>
                      <select id="select" name="select" onchange="handleSelect()" style="width:300px">
                        <option value="0">Sin Folios</option>
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

                    <div class="Folio">
                      <label for="Folio_1">Folio 1</label>
                      <input type="text" class="form-control" id="Folio_1" name="Folio_1" placeholder="numero folio" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Descripcion_1">Descripcion</label>
                      <input type="text" class="form-control" id="Descripcion_1" name="Descripcion_1" placeholder="Descripcion" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Peso_1">Peso</label>
                      <input type="text" class="form-control" id="Peso_1" name="Peso_1" placeholder="peso" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Folio_2">Folio 2</label>
                      <input type="text" class="form-control" id="Folio_2" name="Folio_2" placeholder="numero folio" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Descripcion_2">Descripcion</label>
                      <input type="text" class="form-control" id="Descripcion_2" name="Descripcion_2" placeholder="Descripcion" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Peso_2">Peso</label>
                      <input type="text" class="form-control" id="Peso_2" name="Peso_2" placeholder="peso" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Folio_3">Folio 3</label>
                      <input type="text" class="form-control" id="Folio_3" name="Folio_3" placeholder="numero folio" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Descripcion_3">Descripcion</label>
                      <input type="text" class="form-control" id="Descripcion_3" name="Descripcion_3" placeholder="Descripcion" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Peso_3">Peso</label>
                      <input type="text" class="form-control" id="Peso_3" name="Peso_3" placeholder="peso" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Folio_4">Folio 4</label>
                      <input type="text" class="form-control" id="Folio_4" name="Folio_4" placeholder="numero folio" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Descripcion_4">Descripcion</label>
                      <input type="text" class="form-control" id="Descripcion_4" name="Descripcion_4" placeholder="Descripcion" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Peso_4">Peso</label>
                      <input type="text" class="form-control" id="Peso_4" name="Peso_4" placeholder="peso" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Folio_5">Folio 5</label>
                      <input type="text" class="form-control" id="Folio_5" name="Folio_5" placeholder="numero folio" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Descripcion_5">Descripcion</label>
                      <input type="text" class="form-control" id="Descripcion_5" name="Descripcion_5" placeholder="Descripcion" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Peso_5">Peso</label>
                      <input type="text" class="form-control" id="Peso_5" name="Peso_5" placeholder="peso" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Folio_6">Folio 6</label>
                      <input type="text" class="form-control" id="Folio_6" name="Folio_6" placeholder="numero folio" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Descripcion_6">Descripcion</label>
                      <input type="text" class="form-control" id="Descripcion_6" name="Descripcion_6" placeholder="Descripcion" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Peso_6">Peso</label>
                      <input type="text" class="form-control" id="Peso_6" name="Peso_6" placeholder="peso" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Folio_7">Folio 7</label>
                      <input type="text" class="form-control" id="Folio_7" name="Folio_7" placeholder="numero folio" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Descripcion_7">Descripcion</label>
                      <input type="text" class="form-control" id="Descripcion_7" name="Descripcion_7" placeholder="Descripcion" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Peso_7">Peso</label>
                      <input type="text" class="form-control" id="Peso_7" name="Peso_7" placeholder="peso" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Folio_8">Folio 8</label>
                      <input type="text" class="form-control" id="Folio_8" name="Folio_8" placeholder="numero folio" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Descripcion_8">Descripcion</label>
                      <input type="text" class="form-control" id="Descripcion_8" name="Descripcion_8" placeholder="Descripcion" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Peso_8">Peso</label>
                      <input type="text" class="form-control" id="Peso_8" name="Peso_8" placeholder="peso" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Folio_9">Folio 9</label>
                      <input type="text" class="form-control" id="Folio_9" name="Folio_9" placeholder="numero folio" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Descripcion_9">Descripcion</label>
                      <input type="text" class="form-control" id="Descripcion_9" name="Descripcion_9" placeholder="Descripcion" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Peso_9">Peso</label>
                      <input type="text" class="form-control" id="Peso_9" name="Peso_9" placeholder="peso" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Folio_10">Folio 10</label>
                      <input type="text" class="form-control" id="Folio_10" name="Folio_10" placeholder="numero folio" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Descripcion_10">Descripcion</label>
                      <input type="text" class="form-control" id="Descripcion_10" name="Descripcion_10" placeholder="Descripcion" autocomplete="off" />
                    </div>

                    <div class="Folio">
                      <label for="Peso_10">Peso</label>
                      <input type="text" class="form-control" id="Peso_10" name="Peso_10" placeholder="peso" autocomplete="off" />
                    </div>

                    <div class="form-group">
                      <label for="pesototal">Peso Total</label>
                      <input type="number" class="form-control" id="pesototal" name="pesototal" placeholder="peso total" autocomplete="off" />
                      <div class="text-danger"><?php echo form_error('pesototal'); ?></div>
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
    for (var i = 1; i <= 10; i++) {
      if (i <= numFolios) {
        $('#Folio_' + i).parent().show();
        $('#Descripcion_' + i).parent().show();
        $('#Peso_' + i).parent().show();
      } else {
        $('#Folio_' + i).parent().hide();
        $('#Descripcion_' + i).parent().hide();
        $('#Peso_' + i).parent().hide();
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
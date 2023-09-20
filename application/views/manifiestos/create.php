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
                <form id="createForm" role="form" action="<?php echo base_url('manifiestos/create') ?>" method="post" style=" display:inline!important;">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="nummanifiesto"># Manifiesto</label>
                      <input type="text" class="form-control" id="nummanifiesto" name="nummanifiesto" placeholder="numero manifiesto" autocomplete="off" />
                      <div class="text-danger"><?php echo form_error('nummanifiesto'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="numeroeconomico">Unidad</label>
                      <input type="text" class="form-control" id="numeroeconomico" name="numeroeconomico" placeholder="numero de unidad" autocomplete="off" />
                      <div class="text-danger"><?php echo form_error('numeroeconomico_id'); ?></div>
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
                    </div>

                    <div class="form-group">
                      <label for="destino">Destino</label>
                      <input type="text" class="form-control" id="destino" name="destino" placeholder="destino" autocomplete="off">
                      <div class="text-danger"><?php echo form_error('destino_id'); ?></div>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="destino_id" id="destino_id" value='0'>
                    </div>


                  </div>
                  <!-- Botón para agregar a la tabla -->
                  <button type="button" id="addResiduo" class="btn btn-info">Añadir Residuo</button>
                  <!-- Tabla/Listado de residuos agregados -->
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Categoría</th>
                        <th>Residuo</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Medida</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody id="residuosList">
                      <!-- Los elementos se agregarán dinámicamente aquí -->
                    </tbody>
                  </table>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="<?php echo base_url('manifiestos/') ?>" class="btn btn-warning">Regresar</a>
                  </div>
              </div>
            </div>
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
            <label for="categoria">Categoria</label>
            <input readonly type="text" class="form-control" id="categoria" name="categoria" placeholder="categoria" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="producto">Producto</label>
            <input type="text" class="form-control" id="producto" name="producto" placeholder="producto" autocomplete="off">
          </div>
          <div class="form-group">
            <input type="hidden" name="producto_id" id="producto_id" value='0'>
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" autocomplete="off">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="medida">Medida</label>
                <select class="form-control" id="medida" name="medida">
                  <?php foreach ($medidas as $medida) { ?>
                    <option value="<?php echo $medida['medidas_id']; ?>">
                      <?php echo $medida['medida_nombre']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
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


</section>

<div id="loader"></div>
</div>

<script type="text/javascript">
  $(document).ready(function() {

    $('#addResiduo').click(function() {
      $('#addModal').modal('show'); // Este ID debe coincidir con el ID de tu modal
    });

    // Escuchar el evento click del botón eliminar
    $('#residuosList').on('click', '.btnEliminar', function() {
      $(this).closest('tr').remove(); // Busca la fila más cercana y la elimina
    });

    $('#btncrear').on('click', function(e) {
      e.preventDefault(); // Prevenir el envío del formulario

      var categoria = $('#categoria').val();
      var producto = $('#producto').val();
      var producto_id = $('#producto_id').val();
      var descripcion = $('#descripcion').val();
      var cantidad = $('#cantidad').val();
      var medida = $('#medida').val();

      // Validaciones
      if (categoria.trim() === "" || producto.trim() === "" || descripcion.trim() === "" || cantidad.trim() === "") {
        // Muestra un mensaje de error o realiza alguna acción cuando un campo está en blanco
        alert("Por favor, completa todos los campos.");
        return;
      }

      // Añadir los valores a la tabla junto con los campos de entrada ocultos
      $('#residuosList').append(`
        <tr>
            <td>
                ${categoria}
                <input type="hidden" name="categoria[]" value="${categoria}">
            </td>
            <td>
                ${producto}
                <input type="hidden" name="producto[]" value="${producto}">
                <input type="hidden" name="producto_id[]" value="${producto_id}">
            </td>
            <td>
                ${descripcion}
                <input type="hidden" name="descripcion[]" value="${descripcion}">
            </td>
            <td>
                ${cantidad}
                <input type="hidden" name="cantidad[]" value="${cantidad}">
            </td>
            <td>
                ${medida}
                <input type="hidden" name="medida[]" value="${medida}">
            </td>
            <td><button type="button" class="btn btn-danger btnEliminar">Eliminar</button></td>
        </tr>
    `);

      // Cerrar el modal
      $('#addModal').modal('hide');
    });

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

    $("#producto").autocomplete({
      source: "<?php echo base_url('manifiestos/residuoslist'); ?>",
      select: function(event, ui) {
        $("#producto").val(ui.item.label);
        $("#producto_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#producto").val(ui.item.label);
        $("#categoria").val(ui.item.label2);
        return false;
      },
      minLength: 2
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
    background: rgba(0, 0, 0, 0.75) url(<?php echo base_url('assets/images/loading.gif'); ?>) no-repeat center center;
    z-index: 10000;
  }
</style>
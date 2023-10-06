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
                <form id="createForm" role="form" action="<?php echo base_url('manifiestos/update/' . $registros['data'][0]['manifiesto_id']); ?>" method="post" style=" display:inline!important;">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="nummanifiesto"># Manifiesto</label>
                      <input type="text" class="form-control" id="nummanifiesto" name="nummanifiesto" placeholder="numero manifiesto" value="<?= $registros['data'][0]['nummanifiesto']; ?>" />
                      <div class="text-danger"><?php echo form_error('nummanifiesto'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="fecha">Fecha</label>
                      <input type="text" class="form-control" id="fecha" name="fecha" placeholder="fecha manifiesto" value="<?= $registros['data'][0]['fecha']; ?>" />
                      <div class="text-danger"><?php echo form_error('nummanifiesto'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="unidad">Unidad</label>
                      <input type="text" class="form-control" id="unidad" name="unidad" placeholder="unidad manifiesto" value="<?= $registros['data'][0]['unidad_numero']; ?>" />
                      <div class="text-danger"><?php echo form_error('nummanifiesto'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="unidad_id" id="unidad_id" value="<?= $registros['data'][0]['unidad_id']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="destino">Destino</label>
                      <input type="text" class="form-control" id="destino" name="destino" placeholder="destino manifiesto" value="<?= $registros['data'][0]['destinofinal_nombre']; ?>" />
                      <div class="text-danger"><?php echo form_error('nummanifiesto'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="destino_id" id="destino_id" value="<?= $registros['data'][0]['destinofinal_id']; ?>">
                    </div>

                    <input type="hidden" id="tableDataInput" name="tableDataInput">

                    <!-- Botón para agregar a la tabla -->
                    <button type="button" id="addResiduo" class="btn btn-info">Añadir Residuo</button>

                    <table id="residuosList" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Folios</th>
                          <th>Categoria</th>
                          <th>Residuo</th>
                          <th>Descripcion</th>
                          <th>Cantidad</th>
                          <th>Medida</th>
                          <th>Peso total</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($productos as $producto) : ?>
                          <tr>
                            <td><?= $producto->folio_id; ?></td>
                            <td><?= $producto->categoriaProducto_nombre; ?></td>
                            <td><?= $producto->tipoProducto_nombre; ?></td>
                            <td><?= $producto->descripcion; ?></td>
                            <td><?= $producto->cantidad; ?></td>
                            <td><?= $producto->medida_nombre; ?></td>
                            <td><?= $producto->suma_cantidad; ?></td>
                            <td>
                              <button type="button" class="btn btn-danger btnEliminar" data-producto-id="<?= $producto->folio_id; ?>">Eliminar</button>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>


                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary" id="btnActualizar">Actualizar</button>
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

<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar</h4>
      </div>

      <form role="form" action="<?php echo base_url('manifiestos/addfolio/' . $registros['data'][0]['manifiesto_id']); ?>" method="post" id="createForm">

        <div class="modal-body ui-front">

          <div class="form-group">
            <label for="categoria">Categoria</label>
            <input readonly type="text" class="form-control" id="categoria" name="categoria" placeholder="categoria" autocomplete="off">
          </div>
          <div class="form-group">
            <input type="hidden" name="categoria_id" id="categoria_id" value='0'>
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
      $('#addModal').modal('show'); // Muestra el modal
    });

    $('#residuosList').on('click', '.btnEliminar', function() {
      var productoId = $(this).data('producto-id');

      // Realiza una solicitud AJAX para eliminar el producto en la base de datos
      $.ajax({
        url: "<?= base_url() ?>manifiestos/eliminarProducto", // Reemplaza con la URL real para eliminar el producto
        method: 'POST',
        data: {
          producto_id: productoId
        },
        success: function(response) {
          // Si la eliminación en la base de datos fue exitosa, elimina la fila de la tabla
          window.location.reload();
          if (response.success) {
            $(this).closest('tr').remove();
          }

        },
        error: function() {
          // Maneja el error si ocurrió un problema al eliminar en la base de datos
        }
      });
    });


    $("#manifiestosNav").addClass('active');

    $("#unidad").autocomplete({
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
        $('#unidad').val(ui.item.label);
        $('#unidad_id').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#unidad").val(ui.item.label);
        $("#unidad_id").val(ui.item.value);
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
        $('#destino').val(ui.item.label);
        $('#destino_id').val(ui.item.value);
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
        $("#categoria_id").val(ui.item.value2);
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
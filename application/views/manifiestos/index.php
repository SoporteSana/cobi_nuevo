<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Manifiestos
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Manifiestos</li>
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

        <?php if (in_array('createVigilancia', $user_permission)) : ?>
          <a href="<?php echo base_url('manifiestos/create') ?>" class="btn btn-primary">Agregar</a>
          <br /> <br />
        <?php endif; ?>

        <?php if (in_array('deleteVigilancia', $user_permission)) : ?>
          <button type="button" id="exportar_excel" class="btn btn-danger">Exportar a Excel</button>
          <br /> <br />
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manifiestos</h3>
          </div>

          <div class="box-body">
            <table id="manageTable" class="display responsive nowrap" style="width:100%">
              <thead>
              </thead>

            </table>
          </div>

        </div>

      </div>

    </div>

  </section>

</div>

<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
      url: 'fetchManifiestosData',
      method: 'GET',
      dataType: 'json',
      success: function(response) {
        if (response && Array.isArray(response['data'])) {
          var maxProducts = 0;
          response['data'].forEach(function(manifiesto) {
            var numberOfProducts = (manifiesto.length - 5 - 1) / 6;
            if (numberOfProducts > maxProducts) {
              maxProducts = numberOfProducts;
            }
          });

          // Define las columnas para DataTables
          var columns = [{
              title: "ID"
            },
            {
              title: "Codigo"
            },
            {
              title: "Fecha"
            },
            {
              title: "Factura"
            },
            {
              title: "Remision"
            },
            {
              title: "Proveedor ID"
            }
            // ... agregar todas las otras columnas fijas aquí
          ];

          for (var i = 0; i < maxProducts; i++) {
            columns.push({
              title: "Producto " + (i + 1)
            });
            columns.push({
              title: "Descripción " + (i + 1)
            });
            columns.push({
              title: "Cantidad " + (i + 1)
            });
            columns.push({
              title: "Unidad " + (i + 1)
            });
            columns.push({
              title: "Peso " + (i + 1)
            });
            columns.push({
              title: "Acciones " + (i + 1)
            });
          }

          // Llena el encabezado de la tabla
          var thead = $("#manageTable thead");
          var row = $("<tr>");
          columns.forEach(function(col) {
            row.append($("<th>").text(col.title));
          });
          thead.append(row);

          // Asegurarse de que cada fila tiene el mismo número de columnas
          response['data'].forEach(function(manifiesto, index) {
            while (manifiesto.length < columns.length) {
              manifiesto.push("");
            }
            response['data'][index] = manifiesto;
          });

          // Inicializa DataTables
          $('#manageTable').DataTable({
            data: response['data'],
            columns: columns
          });

        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error('Error en la llamada AJAX:', textStatus, errorThrown);
      }
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
    background: rgba(0, 0, 0, 0.75) url(../assets/images/loading.gif) no-repeat center center;
    z-index: 10000;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Manifiestos</h1>
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
          <a href="<?php echo base_url('manifiestos/create') ?>" class="btn btn-primary">Agregar</a> <br /> <br />
        <?php endif; ?>

        <?php if (in_array('deleteVigilancia', $user_permission)) : ?>
          <button type="button" id="exportar_excel" class="btn btn-danger">Exportar a Excel</button> <br /> <br />
        <?php endif; ?>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Manifiestos</h3>
          </div>

          <div class="box-body">
            <table id="manageTable" class="display responsive nowrap" style="width:100%">
              <thead></thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal para ver productos -->
  <div id="productsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="productsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productsModalLabel">Productos del Manifiesto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table id="productsTable" class="table">
            <thead>
              <tr>
                <th>Folio ID</th>
                <th>Tipo de producto</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Medidas nombres</th>
                <th>Peso</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

          <div class="col-4 text-center">
            <p id="pesototal">pesos totales</p>
          </div>
          <!-- Contenedor específico para las medidas de peso -->
          <div class="row justify-content-center pesos-container">
            <!-- Las medidas de peso se agregarán aquí de manera dinámica -->
          </div>
        </div>
      </div>
    </div>
  </div>



</div>


<script type="text/javascript">
  function fetchProductDetails(manifiesto_id) {
    $.ajax({
      url: 'showProducts/' + manifiesto_id,
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        populateProductsModal(data);
        fetchProductopesos(manifiesto_id);
        $('#productsModal').modal('show');
      },
      error: function(error) {
        console.log("Error al obtener los detalles del producto", error);
      }
    });
  }

  function fetchProductopesos(manifiesto_id) {
    $.ajax({
      url: 'showProductopesos/' + manifiesto_id,
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        // Limpia el contenedor antes de agregar nuevos elementos
        $('.pesos-container').empty();

        // Calcula el ancho dinámico de las columnas basado en el número total de medidas
        let colWidth = 12 / data.length;

        data.forEach(item => {
          let pesoElement = `<div class="col-${colWidth} text-center">
                             <p id="${item['Medidas nombres'].toLowerCase()}">${item['Peso Total']} ${item['Medidas nombres']}</p>
                           </div>`;
          $('.pesos-container').append(pesoElement);
        });
      },
      error: function(error) {
        console.log("Error al obtener los pesos totales", error);
      }
    });
  }

  function populateProductsModal(data) {
    $('#productsTable tbody').empty();

    // Si data es un arreglo, procesa directamente
    if (Array.isArray(data)) {
      data.forEach(producto => {
        $('#productsTable tbody').append(`
                <tr>
                    <td>${producto.folio_id}</td>
                    <td>${producto.categoriaProducto_nombre}</td>
                    <td>${producto.tipoProducto_nombre}</td>
                    <td>${producto.descripcion}</td>
                    <td>${producto.medida_nombre}</td>
                    <td>${producto.cantidad}</td>
                </tr>
            `);
      });
    } else {
      console.warn("La respuesta no es un arreglo válido:", data);
    }
  }

  $(document).ready(function() {

    $.ajax({
      url: 'fetchManifiestosData',
      type: 'GET',
      dataType: 'json',
      success: function(dataFromServer) {

        // Configurar las columnas para DataTables
        let columns = [{
            title: "ID",
            data: "manifiesto_id"
          },
          {
            title: "Nº Manifiesto",
            data: "nummanifiesto"
          },
          {
            title: "Fecha",
            data: "fecha"
          },
          {
            title: "Número Unidad",
            data: "unidad_numero"
          },
          {
            title: "Nombre Destino",
            data: "destinofinal_nombre"
          },
          {
            title: "Acciones",
            data: "manifiesto_id",
            render: function(data, type, row) {
              return `<button class="btn btn-primary" onclick="fetchProductDetails(${data})">Ver productos</button>
                            <a href="update/${data}" class="btn btn-warning">Editar</a>`;
            }
          }
        ];

        $('#manageTable').DataTable({
          data: dataFromServer.data,
          columns: columns,
          //... otras configuraciones si las hay
        });
      },
      error: function(error) {
        console.log("Error al obtener los datos", error);
      }
    });
  });
</script>


<style type="text/css">
  #loader {
    display: none;
    position: fixed;
    z-index: 1000;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: rgba(0, 0, 0, 0.6) url('http://i.imgur.com/fKopw1E.gif') 50% 50% no-repeat;
  }

  body.loading #loader {
    overflow: hidden;
    display: block;
  }

  body.loading #loader {
    overflow: visible;
  }
</style>
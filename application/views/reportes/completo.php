<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Todos los registros
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Todos</li>
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
            <button type of="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">unidades finalizadas</h3>
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

</div>
<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
      url: 'fetchReporteCompletoData',
      type: 'GET',
      dataType: 'json',
      success: function(dataFromServer) {
        let columns = [];

        // Verificar que hay datos disponibles
        if (dataFromServer.data.length > 0) {
          // Obtener la primera fila de datos para determinar la cantidad de columnas
          const firstRow = dataFromServer.data[0];

          // Nombres personalizados para las primeras 26 columnas
          const customColumnNames = [
            "id",
            "unidad",
            "asignacion",
            "semana",
            "supervisor",
            "dia",
            "fecha",
            "turno",
            "ruta",
            "alias",
            "operador",
            "recolectores",
            "km salida",
            "km entrada",
            "recorrido",
            "litros cargados",
            "rendimiento",
            "fecha salida",
            "fecha netrada",
            "# recolectores",
            "tiempo ruta",
            "Recoelctor 1",
            "Recoelctor 2",
            "Recoelctor 3",
            "Recoelctor 4",
            "Recoelctor 5",
            "# manifiestos",
            "# folios",
          ];

          // Nombres para las columnas de manifiesto
          const manifiestoColumnNames = [
            "# manifiesto",
            "# folio",
            "folio",
            "categoria",
            "cantidad",
            "medida",
            "pesos totales",
            "descripcion",
          ];

          // Crear las columnas dinámicamente según el número de elementos en la primera fila
          for (let i = 0; i < firstRow.length; i++) {
            let columnName = '';

            if (i < 28) {
              columnName = customColumnNames[i]; // Usar nombres específicos para las primeras 26 columnas
            } else {
              const additionalColumnIndex = i - 26; // Índice para las columnas adicionales

              if (additionalColumnIndex < 8) {
                // Asignar nombres de manifiesto a las primeras 8 columnas
                columnName = manifiestoColumnNames[additionalColumnIndex];
              } else {
                const groupIndex = Math.floor((additionalColumnIndex - 8) / 8) + 1; // Calcular el índice del bloque
                const columnIndexWithinGroup = (additionalColumnIndex - 8) % 8; // Índice dentro del bloque actual

                if (columnIndexWithinGroup < 8) {
                  // Asignar nombres a las 8 columnas dentro del bloque actual
                  columnName = manifiestoColumnNames[columnIndexWithinGroup];
                } else {
                  columnName = `Manifiesto ${groupIndex} (Col ${columnIndexWithinGroup + 1})`;
                }
              }
            }

            columns.push({
              title: columnName,
              data: function(row) {
                return row[i];
              }
            });
          }
        }

        $('#manageTable').DataTable({
          data: dataFromServer.data,
          columns: columns,
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
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.75) url(../assets/images/loading.gif) no-repeat center center;
    z-index: 10000;
  }
</style>
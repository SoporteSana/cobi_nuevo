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

        let columns = [{
            title: "id",
            data: function(row) {
              return row[0];
            }
          },
          {
            title: "unidad",
            data: function(row) {
              return row[1];
            }
          },
          {
            title: "asignacion",
            data: function(row) {
              return row[2];
            }
          },
          {
            title: "semana",
            data: function(row) {
              return row[3];
            }
          },
          {
            title: "supervisor",
            data: function(row) {
              return row[4];
            }
          },
          {
            title: "dia",
            data: function(row) {
              return row[5];
            }
          },
          {
            title: "fecha",
            data: function(row) {
              return row[6];
            }
          },
          {
            title: "turno",
            data: function(row) {
              return row[7];
            }
          },
          {
            title: "ruta",
            data: function(row) {
              return row[8];
            }
          },
          {
            title: "alias",
            data: function(row) {
              return row[9];
            }
          },
          {
            title: "operador",
            data: function(row) {
              return row[10];
            }
          },
          {
            title: "# recolectores",
            data: function(row) {
              return row[11];
            }
          },
          {
            title: "km_salida",
            data: function(row) {
              return row[12];
            }
          },
          {
            title: "km_entrada",
            data: function(row) {
              return row[13];
            }
          },
          {
            title: "recorrido",
            data: function(row) {
              return row[14];
            }
          },
          {
            title: "litroscargados",
            data: function(row) {
              return row[15];
            }
          },
          {
            title: "rendimiento",
            data: function(row) {
              return row[16];
            }
          },
          {
            title: "hora_salida",
            data: function(row) {
              return row[17];
            }
          },
          {
            title: "hora_entrada",
            data: function(row) {
              return row[18];
            }
          },
          {
            title: "hora_tablero",
            data: function(row) {
              return row[19];
            }
          },
          {
            title: "tiempo_ruta",
            data: function(row) {
              return row[20];
            }
          },
          {
            title: "# manifiestos",
            data: function(row) {
              return row[21];
            }
          },
          {
            title: "recolector 1",
            data: function(row) {
              return row[22];
            }
          },
          {
            title: "recolector 2",
            data: function(row) {
              return row[23];
            }
          },
          {
            title: "recolector 3",
            data: function(row) {
              return row[24];
            }
          },
          {
            title: "recolector 4",
            data: function(row) {
              return row[25];
            }
          },
          {
            title: "recolector 5",
            data: function(row) {
              return row[26];
            }
          },
        ];

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
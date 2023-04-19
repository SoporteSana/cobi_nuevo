
<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Correciones
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Correcciones</li>
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
          
          <div class="box-body">
            <table id="manageTable" class="display responsive nowrap" style="width:100%">
              <thead>
                <tr>
                <th>id</th>
                  <th>Unidad</th>
                  <th>asignacion</th>
                  <th>semana</th>
                  <th>supervisor</th>
                  <th>turno</th>
                  <th>ruta</th>
                  <th>alias</th>
                  <th>operador</th>
                  <th>Hora de salida</th>
                  <th>Hora de entrada</th>
                  <th># recolectores</th>
                  <th>Recoelctor 1</th>
                  <th>Recoelctor 2</th>
                  <th>Recoelctor 3</th>
                  <th>Recoelctor 4</th>
                  <th>Recoelctor 5</th>
                  <th>km salida</th>
                  <th>km entrada</th>
                  <th>recorrido</th>
                  <th>litros cargados</th>
                  <th>rendimento</th>
                  <th>hora tablero</th>
                  <th>tiempo ruta</th>
                  <th># tiros</th>
                  <th>tiro 1</th>
                  <th>destino tiro 1</th>
                  <th>tiro 2</th>
                  <th>destino tiro 2</th>
                  <th>tiro 3</th>
                  <th>destino tiro 3</th>
                  <th>tiro 4</th>
                  <th>destino tiro 4</th>
                  <th>tiro 5</th>
                  <th>destino tiro 5</th>
                  <th>tiro 6</th>
                  <th>destino tiro 6</th>
                  <th>tiro 7</th>
                  <th>destino tiro 7</th>
                  <th>tiro 8</th>
                  <th>destino tiro 8</th>
                  <th>tiro 9</th>
                  <th>destino tiro 9</th>
                  <th>tiro 10</th>
                  <th>destino tiro 10</th>
                  <th>peso total</th>
                  <th>cometarios</th>
                  <th>estatus</th>
                  <th>editar</th>
                </tr>
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

    $("#correccionesNav").addClass('active');

    var table = $('#manageTable').DataTable({
      'ajax': 'getCorreccionData',
      'order': [],
      'columnDefs': [{
        'targets': 47,
        'render': function(data, type, row) {
          if (data == 2) {
            return 'Finalisado';
          } else {
            return 'Desconocido';
          }
        }
      }],
      'createdRow': function(row, data, dataIndex) {
       
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
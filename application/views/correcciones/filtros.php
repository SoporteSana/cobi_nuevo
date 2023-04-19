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
                <th>comentarios</th>
                <th>estatus</th>
                <th>editar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $row) : ?>
                <tr>
                  <td><?php echo $row[0]; ?></td>
                  <td><?php echo $row[1]; ?></td>
                  <td><?php echo $row[2]; ?></td>
                  <td><?php echo $row[3]; ?></td>
                  <td><?php echo $row[4]; ?></td>
                  <td><?php echo $row[5]; ?></td>
                  <td><?php echo $row[6]; ?></td>
                  <td><?php echo $row[7]; ?></td>
                  <td><?php echo $row[8]; ?></td>
                  <td><?php echo $row[9]; ?></td>
                  <td><?php echo $row[10]; ?></td>
                  <td><?php echo $row[11]; ?></td>
                  <td><?php echo $row[12]; ?></td>
                  <td><?php echo $row[13]; ?></td>
                  <td><?php echo $row[14]; ?></td>
                  <td><?php echo $row[15]; ?></td>
                  <td><?php echo $row[16]; ?></td>
                  <td><?php echo $row[17]; ?></td>
                  <td><?php echo $row[18]; ?></td>
                  <td><?php echo $row[19]; ?></td>
                  <td><?php echo $row[20]; ?></td>
                  <td><?php echo $row[21]; ?></td>
                  <td><?php echo $row[22]; ?></td>
                  <td><?php echo $row[23]; ?></td>
                  <td><?php echo $row[24]; ?></td>
                  <td><?php echo $row[25]; ?></td>
                  <td><?php echo $row[26]; ?></td>
                  <td><?php echo $row[27]; ?></td>
                  <td><?php echo $row[28]; ?></td>
                  <td><?php echo $row[29]; ?></td>
                  <td><?php echo $row[30]; ?></td>
                  <td><?php echo $row[31]; ?></td>
                  <td><?php echo $row[32]; ?></td>
                  <td><?php echo $row[33]; ?></td>
                  <td><?php echo $row[34]; ?></td>
                  <td><?php echo $row[35]; ?></td>
                  <td><?php echo $row[36]; ?></td>
                  <td><?php echo $row[37]; ?></td>
                  <td><?php echo $row[38]; ?></td>
                  <td><?php echo $row[39]; ?></td>
                  <td><?php echo $row[40]; ?></td>
                  <td><?php echo $row[41]; ?></td>
                  <td><?php echo $row[42]; ?></td>
                  <td><?php echo $row[43]; ?></td>
                  <td><?php echo $row[44]; ?></td>
                  <td><?php echo $row[45]; ?></td>
                  <td><?php echo $row[46]; ?></td>
                  <td><?php echo $row[47]; ?></td>
                  <td><?php echo $row[48]; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
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
      'order': [],
      'columnDefs': [{
          'targets': [25, 27, 29, 31, 33, 35, 37, 39, 41, 43],
          'render': function(data, type, row) {
            if (data == 0) {
              return '0';
            } else {
              return data;
            }
          }
        },
        {
          'targets': 47,
          'render': function(data, type, row) {
            if (data == 2) {
              return 'Finalizado';
            } else {
              return 'Desconocido';
            }
          }
        }
      ],
      'createdRow': function(row, data, dataIndex) {

      }
    });

  });
</script>
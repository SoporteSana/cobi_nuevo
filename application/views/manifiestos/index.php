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
            <h3 class="box-title">unidades fuera</h3>
          </div>

          <div class="box-body">
            <table id="manageTable" class="display responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>id</th>
                  <th># manifiesto</th>
                  <th>unidad</th>
                  <th>destino final</th>
                  <th>peso total</th>
                  <th>id folio 1</th>
                  <th># folio</th>
                  <th>descripcion</th>
                  <th>peso folio</th>
                  <th>id folio 2</th>
                  <th># folio</th>
                  <th>descripcion</th>
                  <th>peso folio</th>
                  <th>id folio 3</th>
                  <th># folio</th>
                  <th>descripcion</th>
                  <th>peso folio</th>
                  <th>id folio 4</th>
                  <th># folio</th>
                  <th>descripcion</th>
                  <th>peso folio</th>
                  <th>id folio 5</th>
                  <th># folio</th>
                  <th>descripcion</th>
                  <th>peso folio</th>
                  <th>id folio 6</th>
                  <th># folio</th>
                  <th>descripcion</th>
                  <th>peso folio</th>
                  <th>id folio 7</th>
                  <th># folio</th>
                  <th>descripcion</th>
                  <th>peso folio</th>
                  <th>id folio 8</th>
                  <th># folio</th>
                  <th>descripcion</th>
                  <th>peso folio</th>
                  <th>id folio 9</th>
                  <th># folio</th>
                  <th>descripcion</th>
                  <th>peso folio</th>
                  <th>id folio 10</th>
                  <th># folio</th>
                  <th>descripcion</th>
                  <th>peso folio</th>
                  <?php if (in_array('updateVigilancia', $user_permission)) : ?>
                    <th>Finalizar</th>
                  <?php endif; ?>
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

    $("#manifiestosNav").addClass('active');

    var table = $('#manageTable').DataTable({
      'ajax': 'fetchManifiestosData',
      'order': [],
      'createdRow': function(row, data, dataIndex) {

      }
    });

    $('#exportar_excel').click(function() {
      exportarExcel();
    });
  });

  function exportarExcel() {
    var table = $('#manageTable').DataTable();
    var data = table.data().toArray();

    var header = [];
    table.columns().every(function() {
      header.push(this.header().textContent.trim());
    });

    data.unshift(header);

    var sheet = XLSX.utils.json_to_sheet(data, {
      skipHeader: true
    });
    var workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, sheet, 'Hoja 1');

    var nombreArchivo = 'exportacion.xlsx';
    XLSX.writeFile(workbook, nombreArchivo);
  }

  setInterval(function() {
    location.reload();
  }, 60000); // 60000 = 1 minuto en milisegundos
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
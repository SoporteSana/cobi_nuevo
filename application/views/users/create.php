<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Users</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Users</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

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
            <h3 class="box-title">Add User</h3>
          </div>
          <form id="create" role="form" action="<?php base_url('users/create') ?>" method="post">
            <div class="box-body">

              <?php echo validation_errors(); ?>

              <div class="form-group">
                <label for="groups">Groups</label>
                <select class="form-control" id="groups" name="groups">
                  <option value="">Select Groups</option>
                  <?php foreach ($group_data as $k => $v) : ?>
                    <option value="<?php echo $v['grupo_id'] ?>"><?php echo $v['grupo_nombre'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label for="groups">Empresas</label>
                <br>
                <select name="empresa_id" id="empresa_id">
                  <option value="">Seleccione una empresa</option>
                  <?php foreach ($empresas_data as $empresa) : ?>
                    <option value="<?php echo $empresa['empresa_id']; ?>"><?php echo $empresa['empresa_nombre']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="groups">Sucursales</label>
                <br>
                <select name="sucursal_id" id="sucursal_id">
                  <option value="">Seleccione una sucursal</option>
                </select>
              </div>

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="cpassword">Confirm password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="fname">First name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="lname">Last name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="gender">Gender</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="gender" id="male" value="1">
                    Male
                  </label>
                  <label>
                    <input type="radio" name="gender" id="female" value="2">
                    Female
                  </label>
                </div>
              </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="submitButton">Save Changes</button>
              <a href="<?php echo base_url('users/') ?>" class="btn btn-warning">Back</a>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->


  </section>

  <div id="loader"></div>

</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {

    $("#groups").select2();

    $("#mainUserNav").addClass('active');
    $("#createUserNav").addClass('active');

    $('#empresa_id').change(function() {
      var empresa_id = $(this).val();

      if (empresa_id !== '') {
        $.ajax({
          url: '<?php echo base_url('users/sucursaleslist/'); ?>' + empresa_id,
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            var options = '<option value="">Seleccione una sucursal</option>';

            $.each(data, function(key, value) {
              options += '<option value="' + value.sucursal_id + '">' + value.sucursal_nombre + '</option>';
            });

            $('#sucursal_id').html(options);
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      } else {
        $('#sucursal_id').html('<option value="">Seleccione una sucursal</option>');
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
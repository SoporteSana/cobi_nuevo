<div class="content-wrapper">

	<section class="content-header">
		<h1>
			Registro de vigilancia
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"> Agregar registro</li>
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
								<form id="editar" role="form" action="<?php base_url('vigilancia/update') ?>" method="post">
									<div class="box-body">

										<div class="form-group">
											<label for="numeroeconomico">No. Economico</label>
											<input readonly type="text" class="form-control" id="numeroeconomico" name="numeroeconomico" placeholder="numero de unidad" autocomplete="off" value="<?php echo $registro_data['unidad_numero']; ?>" />
										</div>

										<div class="form-group">
											<label for="semana">Semana</label>
											<input readonly type="text" class="form-control" id="semana" name="semana" placeholder="semana de unidad" autocomplete="off" value="<?php echo $registro_data['semana']; ?>" />
										</div>

										<div class="form-group">
											<label for="dia">Dia</label>
											<input readonly type="text" class="form-control" id="dia" name="dia" placeholder="numero de unidad" autocomplete="off" value="<?php echo $registro_data['dia']; ?>" />
										</div>

										<div class="form-group">
											<label for="horasalida">Hora de salida</label>
											<input readonly type="text" class="form-control" id="horasalida" name="horasalida" placeholder="hora salida" autocomplete="off" value="<?php echo $registro_data['hora_salida']; ?>" />
										</div>

										<div class="form-group">
											<label for="horatablero">Hora tablero</label>
											<input readonly type="text" class="form-control" id="horatablero" name="horatablero" placeholder="horatablero" autocomplete="off" value="<?php echo $registro_data['hora_tablero']; ?>" />
										</div>

										<div class="form-group">
											<label for="alias">Alias</label>
											<input readonly type="text" class="form-control" id="alias" name="alias" placeholder="alias" autocomplete="off" value="<?php echo $registro_data['alias_nombre']; ?>" />
										</div>

										<div class="form-group">
											<label for="turno">Turno</label>
											<input readonly type="text" class="form-control" id="turno" name="turno" placeholder="turno" autocomplete="off" value="<?php echo $registro_data['turno_nombre']; ?>" />
										</div>

										<div class="form-group">
											<label for="ruta">Ruta</label>
											<input readonly type="text" class="form-control" id="ruta" name="ruta" placeholder="ruta" autocomplete="off" value="<?php echo $registro_data['ruta_nombre']; ?>" />
										</div>

										<div class="form-group">
											<label for="operador">Operador</label>
											<input readonly type="text" class="form-control" id="operador" name="operador" placeholder="operador" autocomplete="off" value="<?php echo $registro_data['operador_nombre']; ?>" />
										</div>

										<div class="form-group">
											<label for="norecolectores">No. recolectores</label>
											<input readonly type="text" class="form-control" id="norecolectores" name="norecolectores" placeholder="norecolectores" autocomplete="off" value="<?php echo $registro_data['numrecolectores']; ?>" />
										</div>

										<div class="form-group">
											<label for="recolectores">Recoelctor 1</label>
											<input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector1']; ?>" />
										</div>

										<div class="form-group">
											<label for="recolectores">Recoelctor 2</label>
											<input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector2']; ?>" />
										</div>

										<div class="form-group">
											<label for="recolectores">Recoelctor 3</label>
											<input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector3']; ?>" />
										</div>

										<div class="form-group">
											<label for="recolectores">Recoelctor 4</label>
											<input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector4']; ?>" />
										</div>

										<div class="form-group">
											<label for="recolectores">Recoelctor 5</label>
											<input readonly type="text" class="form-control" id="recolectores" name="recolectores" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector5']; ?>" />
										</div>

										<div class="form-group">
											<label for="kmsalida">Km de salida</label>
											<input readonly type="text" class="form-control" id="kmsalida" name="kmsalida" placeholder="kmsalida" autocomplete="off" value="<?php echo $registro_data['km_salida']; ?>" />
										</div>

										<div class="form-group">
											<label for="horaentrada">Hora de entrada</label>
											<input readonly type="text" class="form-control" id="horaentrada" name="horaentrada" placeholder="horaentrada" autocomplete="off" value="<?php echo $horaentrada['hora_entrada']; ?>" />
										</div>

										<div class="form-group">
											<label for="kmentrada">Km de entrada</label>
											<input type="text" class="form-control" id="kmentrada" name="kmentrada" placeholder="kmentrada" autocomplete="off" />
											<div class="text-danger"><?php echo form_error('kmentrada'); ?></div>
										</div>

									</div>

									<div class="box-footer">
										<button type="submit" class="btn btn-primary" id="submitButton" disabled>Save Changes</button>
										<a href="<?php echo base_url('vigilancia/') ?>" class="btn btn-warning">Back</a>
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


	</section>

</div>

<div id="loader"></div>

<script type="text/javascript">
	$(document).ready(function() {

		$("#vigilanciaNav").addClass('active');

		$("input").on("input", function() {
			var kmentrada = $("#kmentrada").val();

			if (kmentrada != "") {
				$("#submitButton").prop("disabled", false);
			} else {
				$("#submitButton").prop("disabled", true);
			}
		});

		$('#editar').submit(function() {
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
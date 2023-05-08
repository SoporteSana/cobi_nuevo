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
                <form id="coregir" role="form" action="<?php base_url('supervicion/update') ?>" method="post">
                  <div class="box-body">

                    <div class=" form-group">
                      <label for="asignacion">Asignacion</label>
                      <input type="text" class="form-control" id="asignacion" name="asignacion" placeholder="asignacion de unidad" autocomplete="off" value="<?php echo $registro_data['asignacion_nombre']; ?>" />
                      <div class="text-danger"><?php echo form_error('asignacion_id'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="asignacion_id" id="asignacion_id" value="<?php echo $registro_data['asignacion_id']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="supervisor">Supervisor</label>
                      <input readonly type="text" class="form-control" id="supervisor" name="supervisor" placeholder="numero de unidad" autocomplete="off" value="<?php echo $registro_data['nombres']; ?>" />
                    </div>

                    <div class=" form-group">
                      <label for="numeroeconomico">No. Economico</label>
                      <input type="text" class="form-control" id="numeroeconomico" name="numeroeconomico" placeholder="numero de unidad" autocomplete="off" value="<?php echo $registro_data['unidad_numero']; ?>" />
                      <div class="text-danger"><?php echo form_error('unidad_id'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="unidad_id" id="unidad_id" value="<?php echo $registro_data['unidad_id']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="semana">Semana</label>
                      <input type="text" class="form-control" id="semana" name="semana" placeholder="semana de unidad" autocomplete="off" value="<?php echo $registro_data['semana']; ?>" />
                      <div class="text-danger"><?php echo form_error('semana'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="dia">Dia</label>
                      <input type="text" class="form-control" id="dia" name="dia" placeholder="numero de unidad" autocomplete="off" value="<?php echo $registro_data['dia']; ?>" />
                      <div class="text-danger"><?php echo form_error('dia'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="horasalida">hora salida:</label>
                      <input type="text" class="form-control datetimepicker-input" id="horasalida" name="horasalida" data-toggle="datetimepicker" data-target="#horasalida" value="<?php echo $registro_data['hora_salida']; ?>" />
                      <div class="text-danger"><?php echo form_error('horasalida'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="fechasalida">fecha salida:</label>
                      <input type="text" class="form-control datetimepicker-input" id="fechasalida" name="fechasalida" data-toggle="datetimepicker" data-target="#fechasalida" value="<?php echo $registro_data['fecha_salida']; ?>" />
                      <div class="text-danger"><?php echo form_error('fechasalida'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="horaentrada">hora entrada:</label>
                      <input type="text" class="form-control datetimepicker-input" id="horaentrada" name="horaentrada" data-toggle="datetimepicker" data-target="#horaentrada" value="<?php echo $registro_data['hora_entrada']; ?>" />
                      <div class="text-danger"><?php echo form_error('horaentrada'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="fechaentrada">fecha entrada:</label>
                      <input type="text" class="form-control datetimepicker-input" id="fechaentrada" name="fechaentrada" data-toggle="datetimepicker" data-target="#fechaentrada" value="<?php echo $registro_data['fecha_entrada']; ?>" />
                      <div class="text-danger"><?php echo form_error('fechaentrada'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="horatablero">Hora tablero</label>
                      <input type="number" class="form-control" id="horatablero" name="horatablero" placeholder="horatablero" autocomplete="off" value="<?php echo $registro_data['hora_tablero']; ?>" />
                      <div class="text-danger"><?php echo form_error('horatablero'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="tiemporuta">Tiempo de ruta</label>
                      <input readonly type="text" class="form-control" id="tiemporuta" name="tiemporuta" placeholder="horatablero" autocomplete="off" value="<?php echo $registro_data['tiempo_ruta']; ?>" />
                      <div class="text-danger"><?php echo form_error('tiemporuta'); ?></div>
                    </div>


                    <div class="form-group">
                      <label for="alias">Alias</label>
                      <input type="text" class="form-control" id="alias" name="alias" placeholder="alias" autocomplete="off" value="<?php echo $registro_data['alias_nombre']; ?>" />
                      <div class="text-danger"><?php echo form_error('alias_id'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="alias_id" id="alias_id" value="<?php echo $registro_data['alias_id']; ?>">
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
                      <input type="text" class="form-control" id="operador" name="operador" placeholder="operador" autocomplete="off" value="<?php echo $registro_data['operador_nombre']; ?>" />
                      <div class="text-danger"><?php echo form_error('operador_id'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="operador_id" id="operador_id" value="<?php echo $registro_data['operador_id']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="norecolectores">No. recolectores</label>
                      <input type="text" class="form-control" id="norecolectores" name="norecolectores" placeholder="norecolectores" autocomplete="off" value="<?php echo $registro_data['numrecolectores']; ?>" />
                      <div class="text-danger"><?php echo form_error('norecolectores'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="recolector1">recoelctor 1</label>
                      <input type="text" class="form-control" id="recolector1" name="recolector1" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector1']; ?>" />
                      <div class="text-danger"><?php echo form_error('recolector_id1'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="recolector_id1" id="recolector_id1" value="<?php echo $registro_data['recolectorid1']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="recolector2">recoelctor 2</label>
                      <input type="text" class="form-control" id="recolector2" name="recolector2" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector2']; ?>" />
                      <div class="text-danger"><?php echo form_error('recolector_id2'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="recolector_id2" id="recolector_id2" value="<?php echo $registro_data['recolectorid2']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="recolector3">recoelctor 3</label>
                      <input type="text" class="form-control" id="recolector3" name="recolector3" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector3']; ?>" />
                      <div class="text-danger"><?php echo form_error('recolector_id3'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="recolector_id3" id="recolector_id3" value="<?php echo $registro_data['recolectorid3']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="recolector4">recoelctor 4</label>
                      <input type="text" class="form-control" id="recolector4" name="recolector4" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector4']; ?>" />
                      <div class="text-danger"><?php echo form_error('recolector_id4'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="recolector_id4" id="recolector_id4" value="<?php echo $registro_data['recolectorid4']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="recolector5">recoelctor 5</label>
                      <input type="text" class="form-control" id="recolector5" name="recolector5" placeholder="recolectores" autocomplete="off" value="<?php echo $registro_data['recolector5']; ?>" />
                      <div class="text-danger"><?php echo form_error('recolector_id5'); ?></div>
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="recolector_id5" id="recolector_id5" value="<?php echo $registro_data['recolectorid5']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="kmsalida">Km de salida</label>
                      <input type="text" class="form-control" id="kmsalida" name="kmsalida" placeholder="kmsalida" autocomplete="off" value="<?php echo $registro_data['km_salida']; ?>" />
                      <div class="text-danger"><?php echo form_error('kmsalida'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="kmentrada">Km de entrada</label>
                      <input type="text" class="form-control" id="kmentrada" name="kmentrada" placeholder="kmentrada" autocomplete="off" value="<?php echo $registro_data['km_entrada']; ?>" />
                      <div class="text-danger"><?php echo form_error('kmentrada'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="Recorrido">Recorrido</label>
                      <input readonly type="text" class="form-control" id="Recorrido" name="Recorrido" placeholder="Recorrido" autocomplete="off" value="<?php echo $registro_data['km_entrada'] - $registro_data['km_salida']; ?>" />
                      <div class="text-danger"><?php echo form_error('Recorrido'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="Litroscargados">Litros cargados</label>
                      <input type="text" class="form-control" id="Litroscargados" name="Litroscargados" placeholder="Litroscargados" autocomplete="off" value="<?php echo $registro_data['litroscargados']; ?>" step="any" />
                      <div class="text-danger"><?php echo form_error('Litroscargados'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="Rendimiento">Rendimiento</label>
                      <input readonly type="text" class="form-control" id="Rendimiento" name="Rendimiento" placeholder="Rendimiento" autocomplete="off" value="<?php echo $registro_data['rendimiento']; ?>" />
                      <div class="text-danger"><?php echo form_error('Rendimiento'); ?></div>
                    </div>

                    <div class="Tiro">
                      <label for="ntiros"># tiros</label>
                      <input type="text" class="form-control" id="ntiros" name="ntiros" placeholder="# tiros" autocomplete="off" value="<?php echo $registro_data['numtiros']; ?>" />
                      <div class="text-danger"><?php echo form_error('ntiros'); ?></div>
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_1">Tiro 1</label>
                      <input type="text" class="form-control" id="Tiro_1" name="Tiro_1" placeholder="nombre" autocomplete="off" value="Folio: <?php echo $registro_data['folio1']; ?> | peso: <?php echo $registro_data['tiro1']; ?>" />
                      <div class="text-danger"><?php echo form_error('Tiro1_id'); ?></div>
                    </div>

                    <div class="Tiro">
                      <label for="detinofinal1">Destino final tiro 1</label>
                      <input readonly type="text" class="form-control" id="detinofinal1" name="detinofinal1" placeholder="destino final" autocomplete="off" value="<?php echo $registro_data['destinofinal1']; ?>" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro1_id" id="Tiro1_id" value="<?php echo $registro_data['ticket_id1']; ?>">
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso1" id="peso1" value="<?php echo $registro_data['tiro1']; ?>">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_2">Tiro 2</label>
                      <input type="text" class="form-control" id="Tiro_2" name="Tiro_2" placeholder="nombre" autocomplete="off" value="Folio: <?php echo $registro_data['folio2']; ?> | peso: <?php echo $registro_data['tiro2']; ?>" />
                      <div class="text-danger"><?php echo form_error('Tiro2_id'); ?></div>
                    </div>

                    <div class="Tiro">
                      <label for="detinofinal2">Destino final tiro 2</label>
                      <input readonly type="text" class="form-control" id="detinofinal2" name="detinofinal2" placeholder="destino final" autocomplete="off" value="<?php echo $registro_data['destinofinal2']; ?>" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro2_id" id="Tiro2_id" value="<?php echo $registro_data['ticket_id2']; ?>">
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso2" id="peso2" value="<?php echo $registro_data['tiro2']; ?>">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_3">Tiro 3</label>
                      <input type="text" class="form-control" id="Tiro_3" name="Tiro_3" placeholder="nombre" autocomplete="off" value="Folio: <?php echo $registro_data['folio3']; ?> | peso: <?php echo $registro_data['tiro3']; ?>" />
                      <div class="text-danger"><?php echo form_error('Tiro3_id'); ?></div>
                    </div>

                    <div class="Tiro">
                      <label for="detinofinal3">Destino final tiro 3</label>
                      <input readonly type="text" class="form-control" id="detinofinal3" name="detinofinal3" placeholder="destino final" autocomplete="off" value="<?php echo $registro_data['destinofinal3']; ?>" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro3_id" id="Tiro3_id" value="<?php echo $registro_data['ticket_id3']; ?>">
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso3" id="peso3" value="<?php echo $registro_data['tiro3']; ?>">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_4">Tiro 4</label>
                      <input type="text" class="form-control" id="Tiro_4" name="Tiro_4" placeholder="nombre" autocomplete="off" value="Folio: <?php echo $registro_data['folio4']; ?> | peso: <?php echo $registro_data['tiro4']; ?>" />
                      <div class="text-danger"><?php echo form_error('Tiro4_id'); ?></div>
                    </div>

                    <div class="Tiro">
                      <label for="detinofinal4">Destino final tiro 4</label>
                      <input readonly type="text" class="form-control" id="detinofinal4" name="detinofinal4" placeholder="destino final" autocomplete="off" value="<?php echo $registro_data['destinofinal4']; ?>" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro4_id" id="Tiro4_id" value="<?php echo $registro_data['ticket_id4']; ?>">
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso4" id="peso4" value="<?php echo $registro_data['tiro4']; ?>">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_5">Tiro 5</label>
                      <input type="text" class="form-control" id="Tiro_5" name="Tiro_5" placeholder="nombre" autocomplete="off" value="Folio: <?php echo $registro_data['folio5']; ?> | peso: <?php echo $registro_data['tiro5']; ?>" />
                      <div class="text-danger"><?php echo form_error('Tiro5_id'); ?></div>
                    </div>

                    <div class=" Tiro">
                      <label for="detinofinal5">Destino final tiro 5</label>
                      <input readonly type="text" class="form-control" id="detinofinal5" name="detinofinal5" placeholder="destino final" autocomplete="off" value="<?php echo $registro_data['destinofinal5']; ?>" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro5_id" id="Tiro5_id" value="<?php echo $registro_data['ticket_id5']; ?>">
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso5" id="peso5" value="<?php echo $registro_data['tiro5']; ?>">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_6">Tiro 6</label>
                      <input type="text" class="form-control" id="Tiro_6" name="Tiro_6" placeholder="nombre" autocomplete="off" value="Folio: <?php echo $registro_data['folio6']; ?> | peso: <?php echo $registro_data['tiro6']; ?>" />
                      <div class="text-danger"><?php echo form_error('Tiro6_id'); ?></div>
                    </div>

                    <div class=" Tiro">
                      <label for="detinofinal6">Destino final tiro 6</label>
                      <input readonly type="text" class="form-control" id="detinofinal6" name="detinofinal6" placeholder="destino final" autocomplete="off" value="<?php echo $registro_data['destinofinal6']; ?>" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro6_id" id="Tiro6_id" value="<?php echo $registro_data['ticket_id6']; ?>">
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso6" id="peso6" value="<?php echo $registro_data['tiro6']; ?>">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_7">Tiro 7</label>
                      <input type="text" class="form-control" id="Tiro_7" name="Tiro_7" placeholder="nombre" autocomplete="off" value="Folio: <?php echo $registro_data['folio7']; ?> | peso: <?php echo $registro_data['tiro7']; ?>" />
                      <div class="text-danger"><?php echo form_error('Tiro7_id'); ?></div>
                    </div>

                    <div class="Tiro">
                      <label for="detinofinal7">Destino final tiro 7</label>
                      <input readonly type="text" class="form-control" id="detinofinal7" name="detinofinal7" placeholder="destino final" autocomplete="off" value="<?php echo $registro_data['destinofinal7']; ?>" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro7_id" id="Tiro7_id" value="<?php echo $registro_data['ticket_id7']; ?>">
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso7" id="peso7" value="<?php echo $registro_data['tiro7']; ?>">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_8">Tiro 8</label>
                      <input type="text" class="form-control" id="Tiro_8" name="Tiro_8" placeholder="nombre" autocomplete="off" value="Folio: <?php echo $registro_data['folio8']; ?> | peso: <?php echo $registro_data['tiro8']; ?>" />
                      <div class="text-danger"><?php echo form_error('Tiro8_id'); ?></div>
                    </div>

                    <div class="Tiro">
                      <label for="detinofinal8">Destino final tiro 8</label>
                      <input readonly type="text" class="form-control" id="detinofinal8" name="detinofinal8" placeholder="destino final" autocomplete="off" value="<?php echo $registro_data['destinofinal8']; ?>" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro8_id" id="Tiro8_id" value="<?php echo $registro_data['ticket_id8']; ?>">
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso8" id="peso8" value="<?php echo $registro_data['tiro8']; ?>">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_9">Tiro 9</label>
                      <input type="text" class="form-control" id="Tiro_9" name="Tiro_9" placeholder="nombre" autocomplete="off" value="Folio: <?php echo $registro_data['folio9']; ?> | peso: <?php echo $registro_data['tiro9']; ?>" />
                      <div class="text-danger"><?php echo form_error('Tiro9_id'); ?></div>
                    </div>

                    <div class="Tiro">
                      <label for="detinofinal9">Destino final tiro 9</label>
                      <input readonly type="text" class="form-control" id="detinofinal9" name="detinofinal9" placeholder="destino final" autocomplete="off" value="<?php echo $registro_data['destinofinal9']; ?>" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro9_id" id="Tiro9_id" value="<?php echo $registro_data['ticket_id9']; ?>">
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso9" id="peso9" value="<?php echo $registro_data['tiro9']; ?>">
                    </div>

                    <div class="Tiro">
                      <label for="Tiro_10">Tiro 10</label>
                      <input type="text" class="form-control" id="Tiro_10" name="Tiro_10" placeholder="nombre" autocomplete="off" value="Folio: <?php echo $registro_data['folio10']; ?> | peso: <?php echo $registro_data['tiro10']; ?>" />
                      <div class="text-danger"><?php echo form_error('Tiro10_id'); ?></div>
                    </div>

                    <div class="Tiro">
                      <label for="detinofinal10">Destino final tiro 10</label>
                      <input readonly type="text" class="form-control" id="detinofinal10" name="detinofinal10" placeholder="destino final" autocomplete="off" value="<?php echo $registro_data['destinofinal10']; ?>" />
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="Tiro10_id" id="Tiro10_id" value="<?php echo $registro_data['ticket_id10']; ?>">
                    </div>

                    <div class="peso-input">
                      <input type="hidden" name="peso10" id="peso10" value="<?php echo $registro_data['tiro10']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="totalpeso">Total de pesos</label>
                      <input readonly type="number" class="form-control" id="totalpeso" name="totalpeso" placeholder="totalpeso" autocomplete="off" value="<?php echo $registro_data['totalpeso']; ?>" />
                      <div class="text-danger"><?php echo form_error('totalpeso'); ?></div>
                    </div>

                    <div class="form-group">
                      <label for="observaciones">Opservaciones</label>
                      <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Ingresa un comentario" autocomplete="off" value="<?php echo $registro_data['observaciones']; ?>" />
                      <div class="text-danger"><?php echo form_error('observaciones'); ?></div>
                    </div>


                  </div>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" id="submitButton" disabled>Gardar</button>
                    <a href="<?php echo base_url('vigilancia/') ?>" class="btn btn-warning">Regresar</a>
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

    $("#correccionesNav").addClass('active');

    $("#asignacion").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/asignacionlist",
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

        $('#asignacion').val(ui.item.label);
        $('#asignacion_id').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#asignacion").val(ui.item.label);
        $("#asignacion_id").val(ui.item.value);
        return false;
      },
    });

    $("#numeroeconomico").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/unidadlist",
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

        $('#numeroeconomico').val(ui.item.label);
        $('#unidad_id').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#numeroeconomico").val(ui.item.label);
        $("#unidad_id").val(ui.item.value);
        return false;
      },
    });

    $("#alias").autocomplete({
      source: "<?php echo base_url('correcciones/aliaslist'); ?>",
      select: function(event, ui) {
        $("#alias").val(ui.item.label);
        $("#alias_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#alias").val(ui.item.label);
        $("#turno").val(ui.item.turno);
        $("#ruta").val(ui.item.ruta);
        return false;
      },
      minLength: 2
    });

    $("#operador").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/operadoreslist",
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

        $('#operador').val(ui.item.label);
        $('#operador_id').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#operador").val(ui.item.label);
        $("#operador_id").val(ui.item.value);
        return false;
      },
    });

    $("#recolector1").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/recolectoreslist",
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

        $('#recolector1').val(ui.item.label);
        $('#recolector_id1').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#recolector1").val(ui.item.label);
        $("#recolector_id1").val(ui.item.value);
        return false;
      },
    });

    $("#recolector2").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/recolectoreslist",
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

        $('#recolector2').val(ui.item.label);
        $('#recolector_id2').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#recolector2").val(ui.item.label);
        $("#recolector_id2").val(ui.item.value);
        return false;
      },
    });

    $("#recolector3").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/recolectoreslist",
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

        $('#recolector3').val(ui.item.label);
        $('#recolector_id3').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#recolector3").val(ui.item.label);
        $("#recolector_id3").val(ui.item.value);
        return false;
      },
    });

    $("#recolector4").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/recolectoreslist",
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

        $('#recolector4').val(ui.item.label);
        $('#recolector_id4').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#recolector4").val(ui.item.label);
        $("#recolector_id4").val(ui.item.value);
        return false;
      },
    });

    $("#recolector5").autocomplete({
      source: function(request, response) {

        $.ajax({
          url: "<?= base_url() ?>correcciones/recolectoreslist",
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

        $('#recolector5').val(ui.item.label);
        $('#recolector_id5').val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#recolector5").val(ui.item.label);
        $("#recolector_id5").val(ui.item.value);
        return false;
      },
    });

    $('#Litroscargados').on('input', function() {
      var litros = parseFloat($('#Litroscargados').val());
      var recorrido = parseFloat($('#Recorrido').val());
      var rendimiento = recorrido / litros;
      $('#Rendimiento').val(rendimiento.toFixed(2));
    });

    $('#kmentrada, #kmsalida').on('input', function() {
      var kmsalida = parseFloat($('#kmsalida').val());
      var kmentrada = parseFloat($('#kmentrada').val());
      var recorrido = kmentrada - kmsalida;
      $('#Recorrido').val(recorrido);
    });

    var $pesoInputs = $('.peso-input');


    $pesoInputs.on('input', function() {

      var peso1 = Number($('#peso1').val());
      var peso2 = Number($('#peso2').val());
      var peso3 = Number($('#peso3').val());
      var peso4 = Number($('#peso4').val());
      var peso5 = Number($('#peso5').val());
      var peso6 = Number($('#peso6').val());
      var peso7 = Number($('#peso7').val());
      var peso8 = Number($('#peso8').val());
      var peso9 = Number($('#peso9').val());
      var peso10 = Number($('#peso10').val());

      var totalPeso = peso1 + peso2 + peso3 + peso4 + peso5 + peso6 + peso7 + peso8 + peso9 + peso10;

      $('#totalpeso').val(totalPeso);
    });

    $("input").on("input", function() {
      var Litroscargados = $("#Litroscargados").val();
      var observaciones = $("#observaciones").val();

      if (Litroscargados != "" && observaciones != "") {
        $("#submitButton").prop("disabled", false);
      } else {
        $("#submitButton").prop("disabled", true);
      }
    });

    $("#Tiro_1").autocomplete({
      source: "<?php echo base_url('correcciones/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_1").val(ui.item.label);
        $("#Tiro1_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_1").val(ui.item.label);
        $('#peso1')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal1").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_2").autocomplete({
      source: "<?php echo base_url('correcciones/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_2").val(ui.item.label);
        $("#Tiro2_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_2").val(ui.item.label);
        $('#peso2')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal2").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_3").autocomplete({
      source: "<?php echo base_url('correcciones/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_3").val(ui.item.label);
        $("#Tiro3_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_3").val(ui.item.label);
        $('#peso3')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal3").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_4").autocomplete({
      source: "<?php echo base_url('correcciones/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_4").val(ui.item.label);
        $("#Tiro4_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_4").val(ui.item.label);
        $('#peso4')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal4").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_5").autocomplete({
      source: "<?php echo base_url('correcciones/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_5").val(ui.item.label);
        $("#Tiro5_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_5").val(ui.item.label);
        $('#peso5')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal5").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_6").autocomplete({
      source: "<?php echo base_url('correcciones/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_6").val(ui.item.label);
        $("#Tiro6_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_6").val(ui.item.label);
        $('#peso6')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal6").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_7").autocomplete({
      source: "<?php echo base_url('correcciones/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_7").val(ui.item.label);
        $("#Tiro7_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_7").val(ui.item.label);
        $('#peso7')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal7").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_8").autocomplete({
      source: "<?php echo base_url('correcciones/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_8").val(ui.item.label);
        $("#Tiro8_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_8").val(ui.item.label);
        $('#peso8')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal8").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_9").autocomplete({
      source: "<?php echo base_url('correcciones/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_9").val(ui.item.label);
        $("#Tiro9_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_9").val(ui.item.label);
        $('#peso9')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal9").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $("#Tiro_10").autocomplete({
      source: "<?php echo base_url('correcciones/ticketslist/') ?>" + "<?php echo $registro_data['unidad_id']; ?>",
      select: function(event, ui) {
        $("#Tiro_10").val(ui.item.label);
        $("#Tiro10_id").val(ui.item.value);
        return false;
      },
      focus: function(event, ui) {
        $("#Tiro_10").val(ui.item.label);
        $('#peso10')
          .val(ui.item.peso)
          .trigger("input");
        $("#detinofinal10").val(ui.item.destino);
        return false;
      },
      minLength: 1
    });

    $('#horaentrada, #horasalida').on('input', function() {
      var hora_salida = moment($("#horasalida").val(), "YYYY-MM-DD HH:mm:ss");
      var hora_entrada = moment($("#horaentrada").val(), "YYYY-MM-DD HH:mm:ss");
      var duracion_ruta = moment.utc(moment(hora_entrada).diff(moment(hora_salida))).format("HH:mm:ss");
      $("#tiemporuta").val(duracion_ruta);
    });

    $('#coregir').submit(function() {
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

  $(function() {
    $('#horasalida').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss'
    });
    $('#horaentrada').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss'
    });
    $('#fechasalida').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#fechaentrada').datetimepicker({
      format: 'YYYY-MM-DD'
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
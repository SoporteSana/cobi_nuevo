<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Reportes
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Filtro</li>
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
                        <h3 class="box-title">Completo</h3>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">

                                <div class="box-body">
                                    <br>
                                    <a href="<?php echo base_url('correcciones/completo') ?>" target="_blank">
                                        <button type="button" class="btn btn-primary">Reporte completo</button>
                                    </a>
                                </div>

                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Filtros</h3>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <form role="form" action="<?php echo base_url('correcciones/filtro') ?>" method="post" target="_blank" id="filtros">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="filtroid">id</label>
                                            <input type="number" class="form-control" id="filtroid" name="filtroid" autocomplete="off" />
                                        </div>

                                        <div class="form-group">
                                            <label for="fecha1filtro">Fecha de:</label>
                                            <input type="date" class="form-control" id="fecha1filtro" name="fecha1filtro" autocomplete="off" />
                                        </div>

                                        <div class="form-group">
                                            <label for="fecha2filtro">Fecha hasta</label>
                                            <input type="date" class="form-control" id="fecha2filtro" name="fecha2filtro" autocomplete="off" />
                                        </div>

                                        <div class="form-group">
                                            <label for="filtrounidad">no economico</label>
                                            <input type="text" class="form-control" id="filtrounidad" name="filtrounidad" autocomplete="off" />
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="filtrounidad_id" id="filtrounidad_id">
                                        </div> 

                                    </div>

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary" target="_blank" id="btnfiltros" disabled>ver</button>
                                        <button type="button" class="btn btn-warning" id="btnlimpiar">Limpiar</button>
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

<script type="text/javascript">
    $(document).ready(function() {

        $("#correccionesNav").addClass('active');

        $("#filtrounidad").autocomplete({
            source: function(request, response) {

                $.ajax({
                    url: "<?= base_url() ?>reportes/unidadlist",
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
                // Set selection
                $('#filtrounidad').val(ui.item.label);
                $('#filtrounidad_id').val(ui.item.value);
                return false;
            },
            focus: function(event, ui) {
                $("#filtrounidad").val(ui.item.label);
                $("#filtrounidad_id").val(ui.item.value);
                return false;
            },
        });

        $("#filtroasignacion").autocomplete({
            source: function(request, response) {

                $.ajax({
                    url: "<?= base_url() ?>reportes/asignacionlist",
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

                $('#filtroasignacion').val(ui.item.label);
                $('#filtroasignacion_id').val(ui.item.value);
                return false;
            },
            focus: function(event, ui) {
                $("#filtroasignacion").val(ui.item.label);
                $("#filtroasignacion_id").val(ui.item.value);
                return false;
            },
        });


        $("#supervisor").autocomplete({
            source: function(request, response) {

                $.ajax({
                    url: "<?= base_url() ?>reportes/supervisorlist",
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

                $('#supervisor').val(ui.item.label);
                $('#supervisor_id').val(ui.item.value);
                return false;
            },
            focus: function(event, ui) {
                $("#supervisor").val(ui.item.label);
                $("#supervisor_id").val(ui.item.value);
                return false;
            },
        });


        $("#alias").autocomplete({
            source: function(request, response) {

                $.ajax({
                    url: "<?= base_url() ?>reportes/aliaslist",
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

                $('#alias').val(ui.item.label);
                $('#alias_id').val(ui.item.value);
                return false;
            },
            focus: function(event, ui) {
                $("#alias").val(ui.item.label);
                $("#alias_id").val(ui.item.value);
                return false;
            },
        });

        $("#turno").autocomplete({
            source: function(request, response) {

                $.ajax({
                    url: "<?= base_url() ?>reportes/turnolist",
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

                $('#turno').val(ui.item.label);
                $('#turno_id').val(ui.item.value);
                return false;
            },
            focus: function(event, ui) {
                $("#turno").val(ui.item.label);
                $("#turno_id").val(ui.item.value);
                return false;
            },
        });

        $("#operador").autocomplete({
            source: function(request, response) {

                $.ajax({
                    url: "<?= base_url() ?>reportes/operadorlist",
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

        $("#destinofinal").autocomplete({
            source: function(request, response) {

                $.ajax({
                    url: "<?= base_url() ?>reportes/destinofinallist",
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

                $('#destinofinal').val(ui.item.label);
                $('#destinofinal_id').val(ui.item.value);
                return false;
            },
            focus: function(event, ui) {
                $("#destinofinal").val(ui.item.label);
                $("#destinofinal_id").val(ui.item.value);
                return false;
            },
        });

        $("#rendimientounidad").autocomplete({
            source: function(request, response) {

                $.ajax({
                    url: "<?= base_url() ?>reportes/unidadlist",
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

                $('#rendimientounidad').val(ui.item.label);
                $('#rendimientounidad_id').val(ui.item.value);
                return false;
            },
            focus: function(event, ui) {
                $("#rendimientounidad").val(ui.item.label);
                $("#rendimientounidad_id").val(ui.item.value);
                return false;
            },
        });

        $("#tonelageasignacion").autocomplete({
            source: function(request, response) {

                $.ajax({
                    url: "<?= base_url() ?>reportes/asignacionlist",
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

                $('#tonelageasignacion').val(ui.item.label);
                $('#tonelageasignacion_id').val(ui.item.value);
                return false;
            },
            focus: function(event, ui) {
                $("#tonelageasignacion").val(ui.item.label);
                $("#tonelageasignacion_id").val(ui.item.value);
                return false;
            },
        });

        $("#horarutaunidad").autocomplete({
            source: function(request, response) {

                $.ajax({
                    url: "<?= base_url() ?>reportes/unidadlist",
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

                $('#horarutaunidad').val(ui.item.label);
                $('#horarutaunidad_id').val(ui.item.value);
                return false;
            },
            focus: function(event, ui) {
                $("#horarutaunidad").val(ui.item.label);
                $("#horarutaunidad_id").val(ui.item.value);
                return false;
            },
        });

        $('#fecha1, #fecha2, input').on('change input', function() {
            var fecha1 = $('#fecha1filtro').val();
            var fecha2 = $('#fecha2filtro').val();
            var filtrounidad = $("#filtrounidad").val();
            var filtroasignacion = $("#filtroasignacion").val();
            var supervisor = $("#supervisor").val();
            var alias = $("#alias").val();
            var turno = $("#turno").val();
            var operador = $("#operador").val();
            var destinofinal = $("#destinofinal").val();

            var algunoLleno = false;

            if (filtrounidad != "" || filtroasignacion != "" || supervisor != "" || alias != "" || turno != "" || operador != "" || destinofinal != "") {
                algunoLleno = true;
            }

            if (fecha1 != '' && fecha2 != '') {
                algunoLleno = true;
            }

            if (algunoLleno) {
                $("#btnfiltros").prop("disabled", false);
            } else {
                $("#btnfiltros").prop("disabled", true);
            }
        });

        $('#2kmfecha1, #2kmfecha2').on('change', function() {
            var fecha1 = $('#2kmfecha1').val();
            var fecha2 = $('#2kmfecha2').val();

            if (fecha1 !== '' && fecha2 !== '') {
                $("#btn2km").prop("disabled", false);
            } else {
                $("#btn2km").prop("disabled", true);
            }
        });

        $('#fecha1rendimiento, #fecha2rendimiento, input').on('change input', function() {
            var fecha1 = $('#fecha1rendimiento').val();
            var fecha2 = $('#fecha2rendimiento').val();
            var rendimientounidad = $("#rendimientounidad").val();


            var algunoLleno = false;

            if (rendimientounidad != "") {
                algunoLleno = true;
            }

            if (fecha1 != '' && fecha2 != '') {
                algunoLleno = true;
            }

            if (algunoLleno) {
                $("#rendimiento").prop("disabled", false);
            } else {
                $("#rendimiento").prop("disabled", true);
            }
        });

        $('#fecha1tonelage, #fecha2tonelage, input').on('change input', function() {
            var fecha1 = $('#fecha1tonelage').val();
            var fecha2 = $('#fecha2tonelage').val();
            var tonelageasignacion = $("#tonelageasignacion").val();


            var algunoLleno = false;

            if (tonelageasignacion != "") {
                algunoLleno = true;
            }

            if (fecha1 != '' && fecha2 != '') {
                algunoLleno = true;
            }

            if (algunoLleno) {
                $("#btntonelage").prop("disabled", false);
            } else {
                $("#btntonelage").prop("disabled", true);
            }
        });

        $('#fecha1horaruta, #fecha2horaruta, input').on('change input', function() {
            var fecha1 = $('#fecha1horaruta').val();
            var fecha2 = $('#fecha2horaruta').val();
            var horarutaunidad = $("#horarutaunidad").val();


            var algunoLleno = false;

            if (horarutaunidad != "") {
                algunoLleno = true;
            }

            if (fecha1 != '' && fecha2 != '') {
                algunoLleno = true;
            }

            if (algunoLleno) {
                $("#btnhoraruta").prop("disabled", false);
            } else {
                $("#btnhoraruta").prop("disabled", true);
            }
        });

        document.getElementById("btnlimpiar").addEventListener("click", function() {
            document.getElementById("filtros").reset();
            var hiddenInputs = document.querySelectorAll('#filtros input[type=hidden]');
            for (var i = 0; i < hiddenInputs.length; i++) {
                hiddenInputs[i].value = '';
            }
        });

        document.getElementById("btnlimpiar2").addEventListener("click", function() {
            document.getElementById("rendimientoform").reset();
            var hiddenInputs = document.querySelectorAll('#rendimientoform input[type=hidden]');
            for (var i = 0; i < hiddenInputs.length; i++) {
                hiddenInputs[i].value = '';
            }
        });

        document.getElementById("btnlimpiar3").addEventListener("click", function() {
            document.getElementById("2km").reset();
            var hiddenInputs = document.querySelectorAll('#2km input[type=hidden]');
            for (var i = 0; i < hiddenInputs.length; i++) {
                hiddenInputs[i].value = '';
            }
        });

        document.getElementById("btnlimpiar4").addEventListener("click", function() {
            document.getElementById("tonelage").reset();
            var hiddenInputs = document.querySelectorAll('#tonelage input[type=hidden]');
            for (var i = 0; i < hiddenInputs.length; i++) {
                hiddenInputs[i].value = '';
            }
        });

        document.getElementById("btnlimpiar5").addEventListener("click", function() {
            document.getElementById("horaruta").reset();
            var hiddenInputs = document.querySelectorAll('#horaruta input[type=hidden]');
            for (var i = 0; i < hiddenInputs.length; i++) {
                hiddenInputs[i].value = '';
            }
        });


    });
</script>
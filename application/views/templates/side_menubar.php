<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

      <li id="dashboardMainMenu">
        <a href="<?php echo base_url('dashboard') ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <?php if ($user_permission) : ?>
        <?php if (in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>
          <li id="mainUserNav">
            <a href="<?php echo base_url('users/') ?>">
              <i class="fa fa-circle-o"></i> <span>Usarios</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)) : ?>
          <li id="addGroupNav">
            <a href="<?php echo base_url('groups/') ?>">
              <i class="fa fa-circle-o"></i> <span>Grupos</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createEmpresa', $user_permission) || in_array('updateEmpresa', $user_permission) || in_array('viewEmpresa', $user_permission) || in_array('deleteEmpresa', $user_permission)) : ?>
          <li id="EmpresasNav">
            <a href="<?php echo base_url('empresas/') ?>">
              <i class="fa fa-files-o"></i> <span>Empresas</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createSucursales', $user_permission) || in_array('updateSucursales', $user_permission) || in_array('viewSucursales', $user_permission) || in_array('deleteSucursales', $user_permission)) : ?>
          <li id="SucursalesNav">
            <a href="<?php echo base_url('sucursales/') ?>">
              <i class="fa fa-files-o"></i> <span>Sucursales</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createVigilancia', $user_permission) || in_array('updateVigilancia', $user_permission) || in_array('viewVigilancia', $user_permission) || in_array('deleteVigilancia', $user_permission)) : ?>
          <li id="vigilanciaNav">
            <a href="<?php echo base_url('vigilancia/') ?>">
              <i class="fa fa-files-o"></i> <span>Vigilancia</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createSupervision', $user_permission) || in_array('updateSupervision', $user_permission) || in_array('viewSupervision', $user_permission) || in_array('deleteSupervision', $user_permission)) : ?>
          <li id="supervisionNav">
            <a href="<?php echo base_url('supervision/') ?>">
              <i class="fa fa-files-o"></i> <span>Supervision</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createEditarRegistro', $user_permission) || in_array('updateEditarRegistro', $user_permission) || in_array('viewEditarRegistro', $user_permission) || in_array('deleteEditarRegistro', $user_permission)) : ?>
          <li id="correccionesNav">
            <a href="<?php echo base_url('correcCiones/') ?>">
              <i class="fa fa-files-o"></i> <span>correcciones</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createSupervisor', $user_permission) || in_array('updateSupervisor', $user_permission) || in_array('viewSupervisor', $user_permission) || in_array('deleteSupervisor', $user_permission)) : ?>
          <li id="supervisoresNav">
            <a href="<?php echo base_url('supervisores/') ?>">
              <i class="glyphicon glyphicon-tags"></i> <span>Supervisores</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createTurno', $user_permission) || in_array('updateTurno', $user_permission) || in_array('viewTurno', $user_permission) || in_array('deleteTurno', $user_permission)) : ?>
          <li id="turnosNav">
            <a href="<?php echo base_url('turnos/') ?>">
              <i class="fa fa-files-o"></i> <span>Turnos</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createRuta', $user_permission) || in_array('updateRuta', $user_permission) || in_array('viewRuta', $user_permission) || in_array('deleteRuta', $user_permission)) : ?>
          <li id="rutasNav">
            <a href="<?php echo base_url('rutas/') ?>">
              <i class="fa fa-files-o"></i> <span>Rutas</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createAlias', $user_permission) || in_array('updateAlias', $user_permission) || in_array('viewAlias', $user_permission) || in_array('deleteAlias', $user_permission)) : ?>
          <li id="aliasNav">
            <a href="<?php echo base_url('alias/') ?>">
              <i class="fa fa-files-o"></i> <span>Rutas-alias</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createOperador', $user_permission) || in_array('updateOperador', $user_permission) || in_array('viewOperador', $user_permission) || in_array('deleteOperador', $user_permission)) : ?>
          <li id="operadoresNav">
            <a href="<?php echo base_url('operadores/') ?>">
              <i class="fa fa-files-o"></i> <span>Operadores</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createRecolector', $user_permission) || in_array('updateRecolector', $user_permission) || in_array('viewRecolector', $user_permission) || in_array('deleteRecolector', $user_permission)) : ?>
          <li id="recolectoresNav">
            <a href="<?php echo base_url('recolectores/') ?>">
              <i class="fa fa-files-o"></i> <span>Recolectores</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createUnidad', $user_permission) || in_array('updateUnidad', $user_permission) || in_array('viewUnidad', $user_permission) || in_array('deleteUnidad', $user_permission)) : ?>
          <li id="unidadesNav">
            <a href="<?php echo base_url('unidades/') ?>">
              <i class="fa fa-files-o"></i> <span>Unidades</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createDestinoFinal', $user_permission) || in_array('updateDestinoFinal', $user_permission) || in_array('viewDestinoFinal', $user_permission) || in_array('deleteDestinoFinal', $user_permission)) : ?>
          <li id="destinofinalNav">
            <a href="<?php echo base_url('destinofinal/') ?>">
              <i class="fa fa-files-o"></i> <span>Destino final</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createTicket', $user_permission) || in_array('updateTicket', $user_permission) || in_array('viewTicket', $user_permission) || in_array('deleteTicket', $user_permission)) : ?>
          <li id="ticketNav">
            <a href="<?php echo base_url('tickets/') ?>">
              <i class="fa fa-files-o"></i> <span>Tickets</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (in_array('createReporte', $user_permission) || in_array('updateReporte', $user_permission) || in_array('viewReporte', $user_permission) || in_array('deleteReporte', $user_permission)) : ?>
          <li id="editarNav">
            <a href="<?php echo base_url('reportes/') ?>">
              <i class="fa fa-files-o"></i> <span>Reportes</span>
            </a>
          </li>
        <?php endif; ?>

        <!-- <li class="header">Settings</li> -->

        <?php if (in_array('viewProfile', $user_permission)) : ?>
          <li><a href="<?php echo base_url('users/profile/') ?>"><i class="fa fa-user-o"></i> <span>Perfil</span></a></li>
        <?php endif; ?>
      <?php endif; ?>
      <!-- user permission info -->
      <li><a href="<?php echo base_url('auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Cerrar sesion</span></a></li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
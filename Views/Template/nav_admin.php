    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="justify-content-center text-center">
          <p class="app-sidebar__user-designation text-white"><?= $_SESSION['userData']['nombres']; ?></p>
          <p class="app-sidebar__user-designation text-white"><?= $_SESSION['userData']['nombrerol']; ?></p>
      </div>
      <div class="app-sidebar__user justify-content-center">
        <!-- <img class="app-sidebar__user-avatar" src="<?= media();?>/images/foto_nestor_small.jpg" alt="User Image">  -->       
      </div>
      <ul class="app-menu">
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>" target="_blank">
                <i class="app-menu__icon fa fas fa-globe" aria-hidden="true"></i>
                <span class="app-menu__label font-weight-bold">Ver sitio web</span>
            </a>
        </li>
        <?php if(!empty($_SESSION['permisos'][MDASHBOARD]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                <i class="app-menu__icon fas fa-chart-pie" ></i>
                <span class="app-menu__label font-weight-bold">Dashboard</span>
            </a>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][MUSUARIOS]['r']) || !empty($_SESSION['permisos'][MROLES]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                <span class="app-menu__label font-weight-bold">Usuarios</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <?php if(!empty($_SESSION['permisos'][MUSUARIOS]['r'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="app-menu__icon far fa-dot-circle"></i> Usuarios</a></li>
                <?php } ?>
                <?php if(!empty($_SESSION['permisos'][MROLES]['r'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class="app-menu__icon far fa-dot-circle"></i> Roles</a></li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][MCLIENTES]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>/clientes">
                <i class="app-menu__icon fa fa-user" aria-hidden="true"></i>
                <span class="app-menu__label font-weight-bold">Clientes</span>
            </a>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][MPRODUCTOS]['r']) || !empty($_SESSION['permisos'][MCATEGORIAS]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-archive" aria-hidden="true"></i>
                <span class="app-menu__label font-weight-bold">Rifas</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <?php if(!empty($_SESSION['permisos'][MPRODUCTOS]['r'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/productos"><i class="app-menu__icon far fa-dot-circle"></i> Productos</a></li>
                <?php } ?>
                <?php if(!empty($_SESSION['permisos'][MCATEGORIAS]['r'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/categorias"><i class="app-menu__icon far fa-dot-circle"></i> Categorías</a></li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][MPEDIDOS]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>/pedidos">
                <i class="app-menu__icon fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="app-menu__label font-weight-bold">Pedidos</span>
            </a>
        </li>
         <?php } ?>
        <?php if(!empty($_SESSION['permisos'][MAPOYO]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>/apoyo_admin">
                <i class="app-menu__icon fa fa-hands-helping" aria-hidden="true"></i>
                <span class="app-menu__label font-weight-bold">Apoyo</span>
            </a>
        </li>
         <?php } ?>
         <?php if(!empty($_SESSION['permisos'][MGANADOR]['r']) || !empty($_SESSION['permisos'][MFUNDACIONES]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-archive" aria-hidden="true"></i>
                <span class="app-menu__label font-weight-bold">Ganadores</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <?php if(!empty($_SESSION['permisos'][MGANADOR]['r'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/ganadores_admin"><i class="app-menu__icon far fa-dot-circle"></i>Sorteos</a></li>
                <?php } ?>
                <?php if(!empty($_SESSION['permisos'][MFUNDACIONES]['r'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/fundaciones_admin"><i class="app-menu__icon far fa-dot-circle"></i>Fundaciones</a></li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][MREPORTES]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>/reporte">
                <i class="app-menu__icon fas fa-list-ul" aria-hidden="true"></i>
                <span class="app-menu__label font-weight-bold">Reporte Final</span>
            </a>            
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][MREPORTESC]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>/reporte_cliente">
                <i class="app-menu__icon fas fa-list-ul" aria-hidden="true"></i>
                <span class="app-menu__label font-weight-bold">Reporte </span>
            </a>            
        </li>
        <?php } ?>
         <?php if(!empty($_SESSION['permisos'][MDCONTACTO]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>/contacto_admin">
                <i class="app-menu__icon fas fa-envelope" aria-hidden="true"></i>
                <span class="app-menu__label font-weight-bold">Mensajes</span>
            </a>            
        </li>
         <?php } ?>
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                <i class="app-menu__icon fa fa-sign-out-alt" aria-hidden="true"></i>
                <span class="app-menu__label font-weight-bold">Salir</span>
            </a>
        </li>
      </ul>
    </aside>
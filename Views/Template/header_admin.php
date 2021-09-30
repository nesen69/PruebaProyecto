<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Este META es muy IMPORTANTE porque lo usan los navegadores para ubicar tu pagina en google -->
  <meta charset="utf-8">
  <meta name="description" content="Cambiando Vidas con turifa.net">   
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Nestor Ramirez">
  <meta name="theme-color" content="#ffffff">
  <link rel="icon" type="image/png" href="<?= FAVICON ?>"/> <!-- AQUI se coloca el icono -->
  <title><?= $data['page_tag']; ?></title>
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap-select.min.css">
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/js/datepicker/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/jquery.datetimepicker.css">    
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">

</head>
<body class="app sidebar-mini">
  <div id="divLoading"><!--  Implementando LOADING -->
    <div>
      <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
    </div>            
  </div>
  <!-- Navbar-->
  <header class="app-header">
    <!-- <a class="app-header__logo" href="<?= base_url(); ?>/Dashboard"></a> -->
    <div class="">
      <a class="app-header__logo" href="<?= base_url(); ?>/dashboard"><img src="<?= LOGOADMIN ?>" alt="<?= NOMBRE_EMPRESA ?>" style="width: 100%;max-width: 200px;">
      </a>
      <!-- Sidebar toggle button--></a>
    </div>
    <!-- Sidebar toggle button--><i class="fas fa-bars app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></i>

    <!-- Navbar Right Menu-->
    <ul class="app-nav">
      <!-- User Menu-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="<?= base_url(); ?>/Usuarios/Perfil"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
          <li><a class="dropdown-item" href="<?= base_url(); ?>/Logout"><i class="fa fa-sign-out-alt fa-lg"></i> Salir</a></li>
        </ul>
      </li>
    </ul>
  </header>
  <?php require_once("nav_admin.php") ?>

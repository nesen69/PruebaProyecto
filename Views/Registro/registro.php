<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Nestor Ramirez">
    <meta name="theme-color" content="#009688">
    <link rel="icon" type="image/png" href="<?= FAVICON ?>"/> <!-- AQUI se coloca el icono -->
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/all.min.css">
    <title><?= $data['page_tag']; ?></title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      

      <div class="login-box">
        
        <div id="divLoading"><!--  Implementando LOADING -->
          <div>
            <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
          </div>            
        </div>

        <form class="login-form" name="" id="frmRegistroCuenta" action="">
          <div class="row logo justify-content-center">
            <a href="<?= base_url(); ?>"><img src="<?= LOGO ?>" alt="<?= NOMBRE_EMPRESA ?>"></a>
          </div>
          <h3 class="login-head"><i class="fas fa-user-plus"></i> Registro</h3>
          <div class="form-group row">
            <div class="col-6">
              <input id="txtNombre" name="txtNombre" class="form-control" type="text" placeholder="Nombre" autofocus>
            </div>
            <div class="col-6">
              <input id="txtApellido" name="txtApellido" class="form-control" type="text" placeholder="Apellido" autofocus>
            </div>
          </div>
          <div class="form-group">
            <input id="txtCedula" name="txtCedula" class="form-control valid validNumber" type="text" required="" onkeypress="return controlTag(event);" placeholder="Cédula">
          </div>
          <div class="form-group">
            <input id="txtTelefono" name="txtTelefono" class="form-control" type="text" placeholder="Teléfono">
          </div>
          <div class="form-group">
            <input id="txtEmailCliente" name="txtEmailCliente" class="form-control valid validEmail" type="text" placeholder="Correo electrónico" autofocus>
          </div>
          <div class="form-group">
            <div class="utility">
              <p class="semibold-text mb-2"><a href="<?= base_url(); ?>/login"><i class="fa fa-angle-left fa-fw"></i> Iniciar sesion</a></p>
            </div>
          </div>
          <div class="alertLogin" class="text-center"></div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Registrar</button>
          </div>
        </form>

        
      </div>
    </section>
    <script>
      const base_url = "<?= base_url(); ?>"
    </script>
    <!-- Essential javascripts for application to work-->
    <script src="<?= media(); ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
    <script src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>
    <script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>
    <script src="<?= media(); ?>/js/<?= $data['page_registro_js']; ?>"></script>
    
    
  </body>
</html>
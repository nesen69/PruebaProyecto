<?php 

$cantCarrito = 0;
if(isset($_SESSION['arrCarrito']) and count($_SESSION['arrCarrito']) > 0){
	foreach ($_SESSION['arrCarrito'] as $product) {
		$cantCarrito += $product['cantidad']; 
		
	}
}

//dep($_SESSION['userData']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title> <?= $data['page_tag'] ?> </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<?php 
		$nombreSitio = NOMBRE_EMPRESA;
		$descripcion = "";
		$nombreProducto = NOMBRE_EMPRESA;
		$urlWeb = base_url();
		$urlImg = media()."images/portada.jpg";
		if(!empty($data['producto'])){
			$descripcion = $data['producto']['descripcion_corta'];
			$nombreProducto = $data['producto']['nombre'];
			$urlWeb = base_url()."/tienda/producto/".$data['producto']['idproducto']."/".$data['producto']['ruta'];
			$urlImg = $data['producto']['images'][0]['url_image'];
		}
	?>

	<meta property="og:locale" 			content='es_ES' />
	<meta property="og:type" 				content="website" />
	<meta property="og:site_name" 	content="<?= $nombreSitio ?>" />
	<meta property="og:description" content="<?= $descripcion ?>" />
	<meta property="og:title" 			content="<?= $nombreProducto ?>" />
	<meta property="og:url" 				content="<?= $urlWeb ?>" />
	<meta property="og:image" 			content="<?= $urlImg ?>" />

	<!--<link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/fontawesome.min.css"> -->
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= FAVICON ?>"/> <!-- AQUI se oloca el icono -->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/fonts/font-awesome-4.7.0/css/font-awesome.min.css"> -->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= media() ?>/tienda/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">	

	<!--===============================================================================================-->
</head>
<body class="animsition">

	<div id="divLoading"><!--  Implementando LOADING -->
		<div>
			<img src="<?= media(); ?>/images/loading.svg" alt="Loading">
		</div>            
	</div>
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						<?php if(isset($_SESSION['login'])){ ?>
						Bienvenido <?= $_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'] ?>
						<?php } ?>

					</div>

					<div class="right-top-bar flex-w h-full">
						<!--<a href="#" class="flex-c-m trans-04 p-lr-25">
    					 DOLAR-TODAY
    					<div id="texto"></div>
						<div id="al"></div> 
    					</a>-->
						<?php 
							if(isset($_SESSION['login'])){
						 ?>
						<a href="<?= base_url(); ?>/dashboard" class="flex-c-m trans-04 p-lr-25" target="_blank">Ir a mi cuenta</a>
						<?php }
							if(isset($_SESSION['login'])){
						?>

						<a href="<?= base_url(); ?>/logout" class="flex-c-m trans-04 p-lr-25">Cerrar sesión</a>
					<?php }else{ ?>
						<a href="<?= base_url(); ?>/login" class="flex-c-m trans-04 p-lr-25" target="_blank">Iniciar sesión</a>
						<a href="<?= base_url(); ?>/registro" class="flex-c-m trans-04 p-lr-25" target="_blank">Crear cuenta</a>
					<?php } ?>
					
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="<?= base_url(); ?>" class="">
						<img src="<?= LOGO ?>" alt="<?= NOMBRE_EMPRESA ?>"> <!-- Sugerencia 133x17 -->
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="">
								<a href="<?= base_url(); ?>">Inicio</a>
							</li>

							<li>
								<a href="<?= base_url(); ?>/tienda">Rifas</a>
							</li>

							<li>
								<a href="<?= base_url(); ?>/carrito">Carrito</a>
							</li>

							<li>
								<a href="<?= base_url(); ?>/ganadores">Ganadores</a>
							</li>	

							<li>
								<a href="<?= base_url(); ?>/fundaciones">Donaciones</a>
							</li>	

							<li>
								<a href="<?= base_url(); ?>/nosotros">Nosotros</a>
							</li>

							<li>
								<a href="<?= base_url(); ?>/contacto">Contacto</a>
							</li>
											
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>
						<?php 
						if($data['page_name'] != "carrito" and $data['page_name'] != "procesarpago"){							
							?>
							<div class="cantCarrito icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify=" <?= $cantCarrito; ?> ">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
						<?php } ?>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<!-- <a href=" <?= base_url(); ?> "><img src="<?= media() ?>/tienda/images/icons/logo01.jpg" alt="IMG-LOGO"></a> -->
				<a href="<?= base_url(); ?>" class="logo">
					<img src="<?= LOGO ?>" alt="<?= NOMBRE_EMPRESA ?>"> <!-- Sugerencia 133x17 -->
				</a>
			</div>

			

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>
				<?php 
				if($data['page_name'] != "carrito" and $data['page_name'] != "procesarpago"){							
					?>
					<div class="cantCarrito icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?= $cantCarrito; ?>">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				<?php } ?>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						<?php if(isset($_SESSION['login'])){ ?>
						Bienvenido <?= $_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'] ?>
						<?php } ?>
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<?php 
							if(isset($_SESSION['login'])){
						 ?>
						<a href="<?= base_url(); ?>/dashboard" class="flex-c-m trans-04 p-lr-25" target="_blank">Ir a mi cuenta</a>
						<?php }
							if(isset($_SESSION['login'])){
						?>

						<a href="<?= base_url(); ?>/logout" class="flex-c-m trans-04 p-lr-25">Salir</a>
					<?php }else{ ?>
						<a href="<?= base_url(); ?>/login" class="flex-c-m trans-04 p-lr-25">Iniciar sesión</a>
						<a href="<?= base_url(); ?>/registro" class="flex-c-m trans-04 p-lr-25" target="_blank">Crear cuenta</a>
					<?php } ?>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href=" <?= base_url(); ?> ">Inicio</a>								
				</li>

				<li>
					<a href="<?= base_url(); ?>/tienda">Rifas</a>
				</li>

				<li>
					<a href="<?= base_url(); ?>/carrito">Carrito</a>
				</li>


				<li>
					<a href="<?= base_url(); ?>/ganadores">Ganadores</a>
				</li>						

				<li>
					<a href="<?= base_url(); ?>/fundaciones">Donaciones</a>
				</li>	

				<li>
					<a href="<?= base_url(); ?>/nosotros">Nosotros</a>
				</li>

				<li>
					<a href="<?= base_url(); ?>/contacto">Contacto</a>
				</li>
<!-- 
				<li>
					<a href="<?= base_url(); ?>/carrito">¿Preguntas?</a>
				</li> -->
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="<?= media() ?>/tienda/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15" method="GET" action=" <?= base_url() ?>/tienda/search">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input type="hidden" name="p" value="1">
					<input class="plh3" type="text" name="s" placeholder="Buscar...">
				</form>
			</div>
		</div>
	</header>
	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Tu Carrito
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div id="productosCarrito" class="header-cart-content flex-w js-pscroll">
				
				<?php getModal('modalCarrito',$data); ?>

			</div>
		</div>
	</div>

	


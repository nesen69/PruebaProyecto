<?php 
headerTienda($data);
$arrSlider = $data['slider'];
$arrBanner = $data['banner'];
$arrProductos = $data['productos'];
$totalRecaudado = $data['recaudado'];
$arrApoyo = $data['apoyo'];

?>
<!-- Slider -->
<section class="section-slide">
	<div class="wrap-slick1 p-b-100">
		<div class="slick1">
			<?php 
			for ($i=0; $i < count($arrSlider) ; $i++) { 
				$ruta = $arrSlider[$i]['ruta'];
				?>
				<div class="item-slick1" style="background-image: url(<?= $arrSlider[$i]['portada'] ?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									<?= $arrSlider[$i]['descripcion'] ?>
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									<?= $arrSlider[$i]['nombre'] ?>
								</h2>
								
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="<?= base_url().'/tienda/categoria/'.$arrSlider[$i]['idcategoria'].'/'.$ruta; ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Ver Productos
								</a>
							</div>

						</div>
					</div>
				</div>
				<?php 
			}
			?>
		</div>
	</div>
</section>

<section class="bg0 p-t-23 p-b-40">
	<div class="container">
		
		<div class="box_semanal d-md-flex flex-md-equal w-100 my-md-3 pl-md-3" >

			<div id="bg_uno" class="box_semanal_interna mr-md-3 pt-3 px-3 pt-md-3 px-md-1 text-center overflow-hidden">
				<div class="my-3 p-3">
					<h2 class="mtext-109 display-5 p-b-10">Paso 1</h2>
					<p class="lead stext-110">Elige una Rifa</p>
				</div>
				<a href="<?= base_url() ?>/tienda">
					<div class="bg-white shadow-sm mx-auto row align-items-center justify-content-center" style="width: 80%; height: 300px; border-radius: 11px 11px 11px 11px;"><img src="<?= media(); ?>/images/sorteos/undraw_Choose_bwbs.svg">
					</div>
				</a>
			</div>
			<div id="bg_dos" class="box_semanal_interna mr-md-3 pt-3 px-3 pt-md-3 px-md-1 text-center overflow-hidden">
				<div class="my-3 p-3">
					<h2 class="mtext-109 display-5 p-b-10">Paso 2</h2>
					<p class="lead stext-110">Concreta tu pago y listo!</p>
				</div>
				<div class="bg-white shadow-sm mx-auto row align-items-center justify-content-center" style="width: 80%; height: 300px; border-radius: 11px 11px 11px 11px;"><img src="<?= media(); ?>/images/sorteos/undraw_transfer_money_rywa.svg"></div>
			</div>
			<div id="bg_tres" class="box_semanal_interna mr-md-3 pt-3 px-3 pt-md-3 px-md-1 text-center overflow-hidden">
				<div class="my-3 p-3">
					<p class="lead stext-110 text-dark">Atento al sorteo</p>
					<h2 class="mtext-109 display-5 p-b-10 text-dark">Mucha suerte!</h2>
				</div>
				<div class="bg-white shadow-sm mx-auto row align-items-center justify-content-center" style="width: 80%; height: 300px; border-radius: 11px 11px 11px 11px;"><img src="<?= media(); ?>/images/sorteos/undraw_gifts_btw0.svg"></div>
			</div>
		</div>
	</div>
</section>		


<!-- Banner -->
<div class="sec-banner bg0 p-t-40 p-b-50">
	<div class="container">
		<div class="row">
			<?php 
			for ($j=0; $j < count($arrBanner); $j++) { 
				$ruta = $arrBanner[$j]['ruta'];
				?>
				<div class="col-md-6 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="<?= $arrBanner[$j]['portada'] ?>" alt="<?= $arrBanner[$j]['nombre'] ?>">

						<a href="<?= base_url().'/tienda/categoria/'.$arrBanner[$j]['idcategoria'].'/'.$ruta; ?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									<?= $arrBanner[$j]['nombre'] ?>
								</span>
								<!-- <span class="block1-info stext-102 trans-04">
									Spring 2018
								</span> -->
							</div>
							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Ver productos
								</div>
							</div>
						</a>
					</div>
				</div>
				<?php 
			}
			?>
		</div>
	</div>
</div>
<hr class="p-b-100" style="width: 60%; margin: auto;">

<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
	<div class="container">
		<div class="p-b-10">
			<h3 class="ltext-108 cl5 text-center">
				RIFAS DISPONIBLES
			</h3>
		</div>
		
		<div class="row isotope-grid">
			<?php 
			for ($p=0; $p < count($arrProductos); $p++) { 

				$ruta = $arrProductos[$p]['ruta'];
				if(count($arrProductos[$p]['images']) > 0 ){
					$portada = $arrProductos[$p]['images'][0]['url_image'];
				}else{
					$portada = media().'/images/uploads/product.png';
				}
				?>
				<div class="col-sm-6 col-md-3 col-lg-3 p-b-35 isotope-item women"  >
					<!-- Block2 -->
					<div class="block2 p-l-10 p-r-10 p-t-10" id="borderProduct">
						
						<div class="block2-pic hov-img0 ">
							
							<img src="<?= $portada ?>" alt="<?= $arrProductos[$p]['nombre'] ?>">
							<a href="<?= base_url().'/tienda/producto/'.$arrProductos[$p]['idproducto'].'/'.$ruta; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Ver producto
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14" >
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?= base_url().'/tienda/producto/'.$arrProductos[$p]['idproducto'].'/'.$ruta; ?>" class="stext-301 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 p-l-10 ">
									<?= $arrProductos[$p]['nombre'] ?>	
									
								</a>

								<span class="stext-105 cl4 p-l-10 ">
									<?= SMONEY.formatMoney($arrProductos[$p]['precio']) ?>

								</span>
								<?php if($arrProductos[$p]['stock'] > 0){ ?>
									<p class="stext-105 cl4 p-l-10">Este sorteo se realizará al acumular los <?= SMONEY.formatMoney($arrProductos[$p]['stock']) ?>
									</p>
								<?php }else{ ?>
									<p class="stext-105 cl4 p-l-10">Fecha del sorteo: <?= $arrProductos[$p]['fecha_sorteo'] ?>
								</p>
							<?php } ?>
							
							</div>
							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#"
								 id="<?= openssl_encrypt($arrProductos[$p]['idproducto'],METHODENCRIPT,KEY); ?>"
								 class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 js-addcart-detail
								 icon-header-item cl3 hov-cl1 trans-04 p-l-22 p-r-11
								 ">
									<i class="zmdi zmdi-shopping-cart"></i>
								</a>
							</div>
						<div class="col text-center p-b-16">
							<br>
							<p class="stext-105 text-primary ">Recaudado: </p>
							<span class="mtext-111 cl3 text-primary">
								<?php 
								for ($j=0; $j < count($totalRecaudado); $j++) { 
									if ($arrProductos[$p]['idproducto'] == $totalRecaudado[$j]['productoid']) {
										echo SMONEY.formatMoney($totalRecaudado[$j]['totalrecaudado']);
									}
								}
								
								?>
							</span>
						</div>	
					</div>
				</div>
			</div>
		<?php } ?>

	</div>
	<!-- Load more -->
	<div class="flex-c-m flex-w w-full p-t-45">
		<a href=" <?= base_url() ?>/tienda " class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
			Ver más
		</a>
	</div>
</div>
</section>

<hr class="p-b-100" style="width: 60%; margin: auto;">
<div class="container">
	<div class="row">
		<div class="order-md-1 col-md-7 col-lg-8 p-b-30">
			<div class="p-t-7 p-l-5 p-l-15-lg p-l-0-md">
				<h3 class="mtext-111 cl2 p-b-16 text-center">
					CONSTRUYENDO UN MEJOR FUTURO
				</h3>

				<p class="stext-113 cl6 p-b-26">
					Nuestros sorteos forman parte de un gran programa benéfico para diversas instituciones que se encargan de velar por la salud y el desarrollo personal y profesional de los niños.
				</p>

				<div class="bor16 p-l-29 p-b-9 m-t-22">
					<p class="stext-114 cl6 p-r-40 p-b-11">
						La pregunta más urgente y persistente en la vida es: ¿Qué estás haciendo por los demás?
					</p>

					<span class="stext-111 cl8">
						- Martin Luther King 
					</span>
				</div>
			</div>
		</div>

		<div class="order-md-2 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
			<div class="how-bor2">
				<div class="hov-img0">
					<img src="<?= media() ?>/images/empresa/arbol.jpg" alt="IMG">
				</div>
			</div>
		</div>
	</div> 
</div>

	<div class="container p-b-100 p-t-70" id="containerImg">

		<?php
		for ($i=0; $i < count($arrApoyo); $i++) { 
			if($arrApoyo[$i]['status'] == 1){
				$responsable[$i] = $arrApoyo[$i]['responsable'];

				if(count($arrApoyo[$i]['images']) > 0 ){							
					$arrImages = $arrApoyo[$i]['images'];								
				
				?>
				<div class="row container p-t-50 p-b-0 stext-113 cl2 ">
					
						<p class="mtext-106 p-l-3 p-r-3">Con nuestra rifa de <a class="text-success" href="<?= base_url().'/tienda/producto/'.$arrApoyo[$i]['productoid'].'/'.$arrApoyo[$i]['ruta']?>"><?= $arrApoyo[$i]['producto'];?></a> estaremos apoyando a:</p>

				</div>

				<div class="row p-b-40" >
					
					<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
						<div class="p-t-7 p-l-10 p-l-15-lg p-l-0-md">
							<h3 class="mtext-109 cl2 p-b-16">
								<?= $arrApoyo[$i]['nombre_org'];//Nombre de la organizacion?>				
								
							</h3>

							<h3 class="stext-113 cl6 p-b-26">
								<?= $arrApoyo[$i]['descripcion_org'];//Descripcion de la organizacion?>				
								<br> 
								<?= "Responsable por parte de ".$arrApoyo[$i]['nombre_org'].": ".$responsable[$i]."<br> Telefono: ".$arrApoyo[$i]['telefono'];
								?>
							</h3>
						</div>
					</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30 p-t-30">
					
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb" >
							<?php 
								if(!empty($arrImages)){									
									for ($img=0; $img < count($arrImages) ; $img++) { 
										
							 ?>
								<div class="item-slick3" data-thumb="<?= $arrImages[$img]['url_image']; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?= $arrImages[$img]['url_image']; ?>" alt="<?= $arrApoyo[$i]['nombre_org']; ?>">
										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?= $arrImages[$img]['url_image']; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							<?php 
									}
								} 
							?>
							</div>
						</div>
					
				</div>
				
			</div>
			<?php	
			} 			
		}  
	}
	
	?>
	</div>

</div>


<?php 
footerTienda($data);
?>


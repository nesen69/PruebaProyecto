<?php 
headerTienda($data);
$arrProducto = $data['producto'];
//dep($arrProducto);
//$arrProductos = $data['productos'];
$arrImages = $arrProducto['images']; 
$rutacategoria = $arrProducto['categoriaid'].'/'.$arrProducto['ruta_categoria'];
$urlShared = base_url()."/tienda/producto/".$arrProducto['idproducto']."/".$arrProducto['ruta'];
?>
<br><br><br>
<hr>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?= base_url(); ?>" class="stext-109 cl8 hov-cl1 trans-04">
				Inicio
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<a href="<?= base_url().'/tienda/categoria/'.$rutacategoria; ?>" class="stext-109 cl8 hov-cl1 trans-04">
				<?= $arrProducto['categoria'] ?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<span class="stext-109 cl4">
				<?= $arrProducto['nombre'] ?>
			</span>
		</div>
	</div>
	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
							<?php 
								if(!empty($arrImages)){
									
									for ($img=0; $img < count($arrImages) ; $img++) { 
										
							 ?>
								<div class="item-slick3" data-thumb="<?= $arrImages[$img]['url_image']; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?= $arrImages[$img]['url_image']; ?>" alt="<?= $arrProducto['nombre']; ?>">
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
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?= $arrProducto['nombre']; ?>
						</h4>
						<span class="mtext-106 cl2">
							<?= SMONEY.formatMoney($arrProducto['precio']); ?>
						</span>
						<p class="stext-102 cl3 p-t-15"><?= $arrProducto['descripcion']; ?></p>
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input id="cant-product" class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1" min="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>

									<button id="<?= openssl_encrypt($arrProducto['idproducto'],METHODENCRIPT,KEY); ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										Agregar al carrito
									</button>
								</div>
							</div>	
						</div>
						<!-- Compartir en redes sociales -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								Compartir en:
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook"
								onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?= $urlShared; ?> &t=<?= $arrProducto['nombre'] ?>','ventanacompartir','toolbar=0, status=0, width=650, height=450');"
								>
								<i class="fab fa-facebook"></i>
							</a>

							<a href="https://twitter.com/intent/tweet?text=<?= $arrProducto['nombre'] ?>&url=<?= $urlShared; ?>&hashtags=<?= SHAREDHASH; ?>" target="_blank" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fab fa-twitter"></i>
							</a>

							<a href="https://api.whatsapp.com/send?text=<?= $arrProducto['nombre'].' '.$urlShared ?>" target="_blank" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Whatsapp">
								<i class="fab fa-whatsapp" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	</section>

	<!-- Related Products -->
	
<?php 
	footerTienda($data);
?>

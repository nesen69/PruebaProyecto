<?php 
headerTienda($data);
$arrProductos = $data['productos'];
 ?>
<br><br><br>
<hr>
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<h3 class=""><?= $data['page_title']; ?></h3>
				</div>
				
			</div>

			<div class="row isotope-grid">
			<?php 
			if(count($arrProductos) > 0){
				for ($p=0; $p < count($arrProductos); $p++) { 
					$ruta = $arrProductos[$p]['ruta'];
					if(count($arrProductos[$p]['images']) > 0 ){
						$portada = $arrProductos[$p]['images'][0]['url_image'];
					}else{
						$portada = media().'/images/uploads/product.png';
					}
			 ?>
				<div class="col-sm-6 col-md-3 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2 p-l-10 p-r-10 p-b-10 p-t-10" id="borderProduct"> 
						<div class="block2-pic hov-img0">
							<img src="<?= $portada ?>" alt="<?= $arrProductos[$p]['nombre'] ?>">
							<a href="<?= base_url().'/tienda/producto/'.$arrProductos[$p]['idproducto'].'/'.$ruta; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Ver producto
							</a>
						</div>
						<div class="block2-txt flex-w flex-t p-t-14" >
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?= base_url().'/tienda/producto/'.$arrProductos[$p]['idproducto'].'/'.$ruta; ?>" class="stext-301 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?= $arrProductos[$p]['nombre'] ?>
								</a>
								<span class="stext-105 cl3">
									<?= SMONEY.formatMoney($arrProductos[$p]['precio']); ?>
								</span>
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
						</div>
					</div>
				</div>
			<?php } 
				}else{
			?>
			<div class="container p-b-150">
				<p class="stext-115 text-center">No hay rifas para mostrar <a href="<?= base_url() ?>/tienda" class="stext-301"> Ver rifas</a></p>
			</div>
			<?php } ?>
			</div>
			<!-- Load more -->
			<?php 
				if(count($data['productos']) > 0){
					$prevPagina = $data['pagina'] - 1;
					$nextPagina = $data['pagina'] + 1;
			?>
			<div class="flex-c-m flex-w w-full p-t-45">
				<?php if($data['pagina'] > 1){ ?>
				<a href=" <?= base_url() ?>/tienda/page/<?= $prevPagina ?> " class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04"><i class="fas fa-chevron-left"></i> &nbsp; Anterior </a>&nbsp;&nbsp;
				<?php } ?>
				<?php if($data['pagina'] != $data['total_paginas']){ ?>
				<a href=" <?= base_url() ?>/tienda/page/<?= $nextPagina ?> " class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04"> Siguiente &nbsp; <i class="fas fa-chevron-right"></i> </a>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
<?php 
	footerTienda($data);
?>
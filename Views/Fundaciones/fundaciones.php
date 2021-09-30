<?php 
headerTienda($data);
$arrFundaciones = $data['fundaciones'];
$banner = media()."/tienda/images/carro.jpg";
//dep($arrFundaciones);
//$arrFundaciones['images'][2]['images'];

?>

	<script>
		document.querySelector('header').classList.add('header-v4');
		//Cuando se cargu esta vists(Pagina completa)se agregara la clase header-v4
	</script>
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url(<?= $banner ?>);">
		<h2 class="ltext-105 cl0 txt-center">
			Donaciones
		</h2>
	</section>
<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
	<div class="container" id="container_help">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<p class="stext-113 cl6 p-b-26 text-center">Nosotros, el equipo de "<?= NOMBRE_EMPRESA ?>" queremos darles las GRACIAS, GRACIAS por colaborar, muchas GRACIAS por participar, cada compra que has realizado a sido fundamental para materializar los sueños de estos pequeños, con mucha dicha compartiremos con ustedes los detalles de las importantes contribuciones realizadas hasta el momento.</p>
			</div>
		</div>

		<div class="row isotope-grid" >
			<?php 
			for ($g=0; $g < count($arrFundaciones); $g++) { 
					//$ruta = $arrFundaciones[$g]['ruta'];
				if($arrFundaciones[$g]['images']>0){	
					
					$arrImages = $arrFundaciones[$g]['images'];
					?> 
					<div class="col-sm-6 col-md-6 col-lg-3 p-b-35 isotope-item women">
						<!-- Block2 -->
						<div class="block2">
							
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
													<img src="<?= $arrImages[$img]['url_image']; ?>" alt="<?= $arrFundaciones[$g]['nombre_org']; ?>">
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
							<hr>
							<div class="block2-txt flex-w flex-t p-t-14 p-l-20">
								<div class="stext-117 cl6 p-b-26 block2-txt-child1 flex-col-l ">
									<p class="card-text">Sorteo Número: <?= $arrFundaciones[$g]['id_beneficio'] ?> </p>
									<p class="card-text ">Nombre de la institución: <?= $arrFundaciones[$g]['nombre_org'] ?> </p>
									<p class="card-text">RIF ó Cédula: <?= $arrFundaciones[$g]['codigo'] ?> </p>
									<p class="card-text">Dirección: <?= $arrFundaciones[$g]['direccion'] ?></p>
									<p class="card-text">Premio: <?= $arrFundaciones[$g]['premio'] ?> </p>
									<p class="card-text">Fecha: <?= $arrFundaciones[$g]['fecha'] ?> </p>
									<?php 
									if($arrFundaciones[$g]['status'] == 1)
									{
										$arrFundaciones[$g]['status'] = '<span class="badge badge-danger">Pendiente por entregar</span>';
									}else{
										$arrFundaciones[$g]['status'] = '<span class="badge badge-success">Entregado exitosamente</span>';
									}?>
									<p class="card-text">Estado: <?= $arrFundaciones[$g]['status'] ?> </p>	
									<p class="card-text">Descripción: <?= $arrFundaciones[$g]['descripcion'] ?> </p>
								</div>
								
							</div>
						</div>

					</div>
					
				<?php }  
			}?> 
		</div>

		
	</div>
</div>
<?php 
footerTienda($data);
?>
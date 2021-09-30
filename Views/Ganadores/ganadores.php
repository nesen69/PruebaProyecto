<?php 
headerTienda($data);
$arrGanadores = $data['ganadores'];
$banner = media()."/tienda/images/nino.jpg";
//dep($arrGanadores);
//$arrGanadores['images'][2]['images'];
	

?>

	<script>
		document.querySelector('header').classList.add('header-v4');
		//Cuando se cargu esta vists(Pagina completa)se agregara la clase header-v4
	</script>
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url(<?= $banner ?>);">
		<h2 class="ltext-105 cl0 txt-center">
			Ganadores
		</h2>
	</section>
<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
	<div class="container" id="container_help">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<p class="stext-113 cl6 p-b-26 text-center">A continuación encontrarás la lista de los ganadores de las distintas rifas, hacemos pública esta información con el pleno consentimiento de los ganadores, sin su aprobación solo colocaremos datos personales ficticios, ahora bien, los datos sobre los premios otorgados siempre serán los reales</p>
			</div>
		</div>

		<div class="row isotope-grid p-t-50" >
			<?php 
			for ($g=0; $g < count($arrGanadores); $g++) { 
					//$ruta = $arrGanadores[$g]['ruta'];
				if($arrGanadores[$g]['images']>0){	
												
				$arrImages = $arrGanadores[$g]['images'];
				?> 
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women ">
					<!-- Block2 -->
					<div class="block2 ">
						
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
										<img src="<?= $arrImages[$img]['url_image']; ?>" alt="<?= $arrGanadores[$g]['nombres']; ?>">
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
						<div class="block2-txt flex-w flex-t">
							<div class="stext-117 cl6 p-b-26 block2-txt-child1 flex-col-l ">
								<p class="card-text">Ganador: <?= $arrGanadores[$g]['nombres'] ?> </p>
								<p class="card-text">Ganador del sorteo numero: <?= $arrGanadores[$g]['idsorteo'] ?> </p>
								<p class="card-text">Realizado el: <?= $arrGanadores[$g]['fechaSimple'] ?></p>
								<p class="card-text">Cédula: <?= $arrGanadores[$g]['cedula'] ?> </p>
								<p class="card-text">Teléfono: <?= $arrGanadores[$g]['telefono'] ?> </p>
								<p class="card-text">Dirección: <?= $arrGanadores[$g]['direccion'] ?> </p>
								<?php 
								if($arrGanadores[$g]['status'] == 1)
								{
									$arrGanadores[$g]['status'] = '<span class="badge badge-danger">Pendiente por entregar</span>';
								}else{
									$arrGanadores[$g]['status'] = '<span class="badge badge-success">Entregado</span>';
								}?>
								<p class="card-text">Status: <?= $arrGanadores[$g]['status'] ?> </p>
								<p>Premio: <?= $arrGanadores[$g]['premio'] ?> </p>						
								
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
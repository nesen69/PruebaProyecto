<?php 
headerTienda($data); 
$banner = media()."/tienda/images/cel.jpg";
?>
	<script>
		document.querySelector('header').classList.add('header-v4');
		//Cuando se cargue esta vista(Pagina completa)se agregara la clase header-v4
	</script>
<!-- Title page -->
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url(<?= $banner ?>);">
		<h2 class="ltext-105 cl0 txt-center">
			Contacto
		</h2>
	</section>

	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form id="frmContacto">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Enviar un mensaje
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent ">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="nombreContacto" name="nombreContacto" placeholder="Nombre completo">
							<img class="how-pos4 pointer-none " src="<?= media() ?>/tienda/images/icons/icon-name.png" alt="ICON" >
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="emailContacto" name="emailContacto" placeholder="Correo electrónico">
							<img class="how-pos4 pointer-none" src="<?= media() ?>/tienda/images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" id="mensaje" name="mensaje" placeholder="En que te podemos ayudar?"></textarea>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Enviar
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Dirección
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								<?= DIRECCION ?>
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Teléfono
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								<a class="cl6" href="tel:<?= TELEMPRESA ?>"><?= TELEMPRESA ?></a>
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Email
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								<a class="cl6" href="mailto:<?= EMAIL_EMPRESA ?>"><?= EMAIL_EMPRESA ?></a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="map"><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.9849579893507!2d-71.14651808589737!3d8.597441797967425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e6486e02f855f89%3A0x2b0203b30ed01c13!2zUGxhemEgQm9sw612YXIsIE3DqXJpZGEgNTEwMSwgTcOpcmlkYQ!5e0!3m2!1ses!2sve!4v1625220032449!5m2!1ses!2sve" width="100%" height="450" allowfullscreen="allowfullscreen" loading="lazy"></iframe>
	</div>
		
	<?php
		footerTienda($data); 
	?>
<?php $catFooter = getCatFooter(); ?>
<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-lg-4 p-b-50">
				<div class="container-fluid " >
					<h4 class="stext-301 cl0 p-b-30">
						Categorias
					</h4>
					<?php if(count($catFooter) > 0){ ?>
						<ul>
							<?php foreach ($catFooter as $cat) { ?>
								<li class="p-b-10">
									<a href="<?= base_url() ?>/tienda/categoria/<?= $cat['idcategoria'].'/'.$cat['ruta'] ?>" class="stext-107 cl7 hov-cl1 trans-04">
										<?= $cat['nombre'] ?>
									</a>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>

					<!-- -FLUID adapta el elemento a lo ancho de la pagina y lo hace responsivo -->

					<h4 class="stext-301 cl0 p-b-30" >
						
						<a href="#" style="color: white;" data-toggle="modal" data-target="#mimodal">Cuenta Bancaria</a>
					</h4>

					<!-- EL MODAL -->

					<div class="modal fade " id="mimodal">
						<div class="modal-dialog">
							<div class="modal-content">
								<!-- Cabecera -->

								<div class="modal-header">
									<h4 class="modl-title">Transferencia y Pago móvil</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>

								<!-- Cuerpo -->

								<div class="modal-body">
									Para participar concrete el pago de la rifa que eligió a través de:<br><br>
									Banco Provincial 0108 0105 0092 0028 2028<br>
									A nombre de: Nestor Enrique Ramirez<br>
									Cédula de identidad: V.- 16.581.374<br>
  									Celular: 0426-570-76-77<br><br>
  									<p class="">NOTA: Cuando pague por favor envié el número de refencia por SMS ó capture al Whatsapp (0426-570-76-77)</p>
								</div>
								<!-- Pie -->

								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal" >Cerrar</button>
								</div>

							</div>
						</div>			
					</div>

				</div>
			</div>



			<div class="col-sm-6 col-lg-4 p-b-30">
				<h4 class="stext-301 cl0 p-b-30">
					Contacto
				</h4>

				<p class="stext-107 cl7 size-201">
					<?= DIRECCION ?> <br>
					Tel: <a class="linkFooter" href="tel:<?= TELEMPRESA ?>"><?= TELEMPRESA ?></a> <br>
					Email: <a class="linkFooter" href="mailto:<?= EMAIL_EMPRESA ?>"><?= EMAIL_EMPRESA ?></a>
				</p>

				<div class="p-t-10">
					<a href=" <?= FACEBOOK ?> " target="_blanck" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fab fa-facebook"></i>
					</a>

					<a href="<?= INSTAGRAM ?>" target="_blanck" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fab fa-instagram"></i>
					</a>

					<a href="https://wa.me/<?= WHATSAPP ?>" target="_blanck" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fab fa-whatsapp"></i>
					</a>
				</div>
			</div>

			<div class="col-sm-6 col-lg-4 p-b-50" >
				<h4 class="stext-301 cl0 p-b-50">
					<a href="<?= base_url(); ?>/preguntas" style="color: white;">Preguntas Frecuentes</a>
				</h4>
				<img src="<?= LOGOADMIN ?>" alt="Logo">

			</div>
		</div>

		<div class="">

			<p class="stext-107 cl6 txt-center">

				<?= NOMBRE_EMPRESA;  ?> | <?= WEB_EMPRESA;  ?> 

			</p>
		</div>
	</div>
</footer>


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="zmdi zmdi-chevron-up"></i>
	</span>
</div>

<script>
	const base_url = "<?= base_url(); ?>";
	const smony = "<?= SMONEY; ?>";
</script>
<!--===============================================================================================-->	
<script src="<?= media() ?>/tienda/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?= media() ?>/tienda/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?= media() ?>/tienda/vendor/bootstrap/js/popper.js"></script>
<script src="<?= media() ?>/tienda/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?= media() ?>/tienda/vendor/select2/select2.min.js"></script>

<!--===============================================================================================-->
<script src="<?= media() ?>/tienda/vendor/daterangepicker/moment.min.js"></script>
<script src="<?= media() ?>/tienda/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?= media() ?>/tienda/vendor/slick/slick.min.js"></script>
<script src="<?= media() ?>/tienda/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script src="<?= media() ?>/tienda/vendor/parallax100/parallax100.js"></script>

<!--===============================================================================================-->
<script src="<?= media() ?>/tienda/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>

<!--===============================================================================================-->
<script src="<?= media() ?>/tienda/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="<?= media() ?>/tienda/vendor/sweetalert/sweetalert.min.js"></script>

<!--===============================================================================================-->
<script src="<?= media() ?>/tienda/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!--===============================================================================================-->
<script src="<?= media() ?>/tienda/js/main.js"></script>
<script src="<?= media() ?>/js/functions_admin.js"></script>
<script src="<?= media() ?>/js/functions_login.js"></script>
<script src="<?= media() ?>/tienda/js/functions.js"></script>
<script src="<?= media() ?>/js/all.min.js"></script>
<script src="<?= media() ?>/js/fontawesome.js"></script>


</body>
</html>
<?php 
headerTienda($data);
$banner = media()."/tienda/images/pato.jpg";
?>
	<script>
		document.querySelector('header').classList.add('header-v4');
		//Cuando se cargue esta vista(Pagina completa)se agregara la clase header-v4
	</script>
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url(<?= $banner ?>);">
		<h2 class="ltext-105 cl0 txt-center">
			Nosotros
		</h2>
	</section>	
	<!-- Content page -->	

<div class="container_team p-t-260 p-l-15-lg p-l-0-md row p-b-50">
	<div class="">
		<h3 class="ltext-103 cl5 p-b-16 text-center">TEAM</h3> 
		<p class="stext-113 cl6 p-b-26">Los mejores logros florecen al trabajar con las fortalezas de tu equipo de trabajo, las debilidades de cada individuo deben pasar a un segundo plano.</p>
	</div>
	<div class="content">

		<div class="box">
			<figure>
				<img src="Assets/images/empresa/foto_trina.jpg" alt="">
				<div class="redes-sociales">
					<a href="" class=""><i class="fab fa-youtube"></i></a>
					<a href="" class=""><i class="fab fa-instagram"></i></a>
					<a href="" class=""><i class="fab fa-facebook"></i></a>
				</div>
			</figure>
			<div class="name">
				<h4 class="stext-113 cl8 font-weight-bold">Trina Becerra</h4>
				<span class="stext-114 cl8">Traductora & Creadora de contenido</span>
			</div>
		</div>

		<div class="box">
			<figure>
				<img src="<?= media(); ?>/images/empresa/noserio.jpg" alt="">
				<div class="redes-sociales">
					<a href="" class=""><i class="fab fa-youtube"></i></a>
					<a href="" class=""><i class="fab fa-instagram"></i></a>
					<a href="" class=""><i class="fab fa-facebook"></i></a>
				</div>
			</figure>
			<div class="name">
				<h4 class="stext-113 cl8 font-weight-bold">Nestor Ramirez</h4>
				<span class="stext-114 cl8">Desarrollador Frot End & Back End</span>
			</div>
		</div>
	</div>
</div>

<section class="bg0 p-t-75 p-b-120">
	<div class="container" id="container_help">
		<div class="row p-b-148">
			<div class="col-md-7 col-lg-8">
				<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
					<h3 class="mtext-111 cl2 p-b-16">
						MISI??N
					</h3>
					<p class="stext-113 cl6 p-b-26">
						Ofrecer con nuestra plataforma diversos sorteos para recaudar fondos y as?? impulsar el crecimiento profesional de los ni??os a trav??s de la educaci??n, el deporte, la danza, la m??sica, y sobre todo brindar apoyo a aquellos que desafortunadamente padezcan de alguna enfermedad.
					</p>
				</div>
			</div>

			<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
				<div class="how-bor1 ">
					<div class="hov-img0">
						<img src="Assets/images/empresa/mision.jpg" alt="IMG">
					</div>
				</div>
			</div>
		</div>

		<div class="row p-b-148">
			<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
				<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
					<h3 class="mtext-111 cl2 p-b-16">
						VISI??N
					</h3>

					<p class="stext-113 cl6 p-b-26">
						Nuestra Visi??n? es simple, ver ni??os felices! creemos firmemente que a trav??s de nuestra plataforma podremos conectarnos con millones de personas que al igual que nosotros tambi??n desean dibujar sonrisas en quien m??s lo necesita. Nuestro sistema facilitar?? la realizaci??n de sorteos con un alcance ilimitado de productos tales como art??culos para el hogar, bicicletas, motos, veh??culos, inmuebles y m??s, esto permitir?? recaudar fondos destinados a la compra de materiales para equipar instituciones deportivas, recreativas y culturales, as?? como tambi??n para la compra de insumos hospitalarios, tratamientos, medicamentos de alto costo y m??s.
					</p>
					<p class="stext-113 cl6 p-b-26">
						 Estaremos trabajando de la mano con todo tipo de instituciones cuyo objetivo sea el de mejorar la salud y el desarrollo personal y profesional de los ni??os, cada contribuci??n hecha a cada uno de estos so??adores mantendr?? siempre viva la esperanza de ganar la competencia de su vida, bien sea en el deporte, la m??sica, la danza y mejor a??n ganar esas batallas contra enfermedades que nos quitan la salud, nuestra organizaci??n har?? la diferencia, ser?? de las que hacen posibles las cosas, ya que en los malos momentos se cuenta con pocos, pero nosotros siempre estaremos con ellos.
					</p>
				</div>
			</div>

			<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
				<div class="how-bor2">
					<div class="hov-img0">
						<img src="Assets/images/empresa/vision.jpg" alt="IMG">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container" id="container_help">
		<div class="row p-b-148">
			<div class="col-md-7 col-lg-8">
				<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
					<h3 class="mtext-111 cl2 p-b-16">
						VALORES
					</h3>

					<p class="stext-113 cl6 p-b-26">
						Para lograr alcanzar el ??xito de una organizaci??n es importante tener presente muchos principios ??ticos y morales tanto de forma individual como grupal, en nuestra empresa haremos ??nfasis en 3 de ellos:
					</p>
					<p class="stext-113 cl6 p-b-26">
						Pasi??n, deseamos que nuestro equipo de trabajo al momento de realizar una actividad sienta felicidad y placer al hacerlo, ese sentimiento de absoluta satisfacci??n evitar?? el cansancio y agotamiento f??sico y mental.	 
					</p>
					<p class="stext-113 cl6 p-b-26">
						Servicio, cada uno de nosotros trae consigo un esp??ritu servicial el cual permite que tiendas la mano a alguien cuando m??s lo necesite, este valor habla de nuestro m??s alto sentido de colaboraci??n para hacer la vida m??s placentera a los dem??s, dicha actitud se supone que debe ser trasladada a todos los ??mbitos de la vida, bien sea en lo acad??mico, laboral, recreativo y sobre todo en lo familiar, ya que como bien sabemos la familia es la base de la sociedad.	 
					</p>
					<p class="stext-113 cl6 p-b-26">
						Integridad, una persona ??ntegra cumple con sus compromisos y trabaja duro por alcanzar sus objetivos y sino los cumple asumen su responsabilidad sin buscar excusas y hacen los ajustes necesarios al respecto para mejorar, para tener integridad, las palabras y las acciones deben ir de la mano ya que una persona ??ntegra es alguien en quien se puede confiar.
					</p>
				</div>
			</div>

			<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
				<div class="how-bor1 ">
					<div class="hov-img0">
						<img src="Assets/images/empresa/valores.jpg" alt="IMG">
					</div>
				</div>
			</div>
		</div>

		<div class="row p-b-148">
			<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
				<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
					<h3 class="mtext-111 cl2 p-b-16">
						HISTORIA
					</h3>

					<p class="stext-113 cl6 p-b-26">
						Mauris non lacinia magna. Sed nec lobortis dolor. Vestibulum rhoncus dignissim risus, sed consectetur erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam maximus mauris sit amet odio convallis, in pharetra magna gravida. Praesent sed nunc fermentum mi molestie tempor. Morbi vitae viverra odio. Pellentesque ac velit egestas, luctus arcu non, laoreet mauris. Sed in ipsum tempor, consequat odio in, porttitor ante. Ut mauris ligula, volutpat in sodales in, porta non odio. Pellentesque tempor urna vitae mi vestibulum, nec venenatis nulla lobortis. Proin at gravida ante. Mauris auctor purus at lacus maximus euismod. Pellentesque vulputate massa ut nisl hendrerit, eget elementum libero iaculis.
					</p>

					<p class="stext-113 cl6 p-b-26">
						Mauris non lacinia magna. Sed nec lobortis dolor. Vestibulum rhoncus dignissim risus, sed consectetur erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam maximus mauris sit amet odio convallis, in pharetra magna gravida. Praesent sed nunc fermentum mi molestie tempor. Morbi vitae viverra odio. Pellentesque ac velit egestas, luctus arcu non, laoreet mauris. Sed in ipsum tempor, consequat odio in, porttitor ante. Ut mauris ligula, volutpat in sodales in, porta non odio. Pellentesque tempor urna vitae mi vestibulum, nec venenatis nulla lobortis. Proin at gravida ante. Mauris auctor purus at lacus maximus euismod. Pellentesque vulputate massa ut nisl hendrerit, eget elementum libero iaculis.
					</p>
				</div>
			</div>

			<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
				<div class="how-bor2">
					<div class="hov-img0">
						<img src="Assets/images/empresa/historia.jpg" alt="IMG">
					</div>
				</div>
			</div>
		</div>
	</div>

</section>

<?php 
	footerTienda($data);
?>
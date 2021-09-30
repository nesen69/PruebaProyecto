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
						MISIÓN
					</h3>
					<p class="stext-113 cl6 p-b-26">
						Ofrecer con nuestra plataforma diversos sorteos para recaudar fondos y así impulsar el crecimiento profesional de los niños a través de la educación, el deporte, la danza, la música, y sobre todo brindar apoyo a aquellos que desafortunadamente padezcan de alguna enfermedad.
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
						VISIÓN
					</h3>

					<p class="stext-113 cl6 p-b-26">
						Nuestra Visión? es simple, ver niños felices! creemos firmemente que a través de nuestra plataforma podremos conectarnos con millones de personas que al igual que nosotros también desean dibujar sonrisas en quien más lo necesita. Nuestro sistema facilitará la realización de sorteos con un alcance ilimitado de productos tales como artículos para el hogar, bicicletas, motos, vehículos, inmuebles y más, esto permitirá recaudar fondos destinados a la compra de materiales para equipar instituciones deportivas, recreativas y culturales, así como también para la compra de insumos hospitalarios, tratamientos, medicamentos de alto costo y más.
					</p>
					<p class="stext-113 cl6 p-b-26">
						 Estaremos trabajando de la mano con todo tipo de instituciones cuyo objetivo sea el de mejorar la salud y el desarrollo personal y profesional de los niños, cada contribución hecha a cada uno de estos soñadores mantendrá siempre viva la esperanza de ganar la competencia de su vida, bien sea en el deporte, la música, la danza y mejor aún ganar esas batallas contra enfermedades que nos quitan la salud, nuestra organización hará la diferencia, será de las que hacen posibles las cosas, ya que en los malos momentos se cuenta con pocos, pero nosotros siempre estaremos con ellos.
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
						Para lograr alcanzar el éxito de una organización es importante tener presente muchos principios éticos y morales tanto de forma individual como grupal, en nuestra empresa haremos énfasis en 3 de ellos:
					</p>
					<p class="stext-113 cl6 p-b-26">
						Pasión, deseamos que nuestro equipo de trabajo al momento de realizar una actividad sienta felicidad y placer al hacerlo, ese sentimiento de absoluta satisfacción evitará el cansancio y agotamiento físico y mental.	 
					</p>
					<p class="stext-113 cl6 p-b-26">
						Servicio, cada uno de nosotros trae consigo un espíritu servicial el cual permite que tiendas la mano a alguien cuando más lo necesite, este valor habla de nuestro más alto sentido de colaboración para hacer la vida más placentera a los demás, dicha actitud se supone que debe ser trasladada a todos los ámbitos de la vida, bien sea en lo académico, laboral, recreativo y sobre todo en lo familiar, ya que como bien sabemos la familia es la base de la sociedad.	 
					</p>
					<p class="stext-113 cl6 p-b-26">
						Integridad, una persona íntegra cumple con sus compromisos y trabaja duro por alcanzar sus objetivos y sino los cumple asumen su responsabilidad sin buscar excusas y hacen los ajustes necesarios al respecto para mejorar, para tener integridad, las palabras y las acciones deben ir de la mano ya que una persona íntegra es alguien en quien se puede confiar.
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
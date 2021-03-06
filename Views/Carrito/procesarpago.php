<?php 
headerTienda($data);

$subtotal = 0;
foreach ($_SESSION['arrCarrito'] as $producto) {
	$subtotal += $producto['precio'] * $producto['cantidad'];
}

?>
<script
src="https://www.paypal.com/sdk/js?client-id=<?= IDCLIENTE ?>&currency=<?= CURRENCY ?>">
</script>

<script>
	paypal.Buttons({
		createOrder: function(data, actions) {

			return actions.order.create({
				purchase_units: [{
					amount: {
						value: <?= $subtotal; ?>
					},
					description: "Compra de articulos en <?= NOMBRE_EMPRESA ?> por <?= SMONEY.$subtotal ?>",
				}]
			});
		},
		onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        let base_url = "<?= base_url(); ?>";// This function shows a transaction success message to your buyer.
        /*let dir = document.querySelector("#txtDireccion").value;
        let ciudad = document.querySelector("#txtCiudad").value;*/
        let inttipopago = 1;//Valor que tenemos en la tabla tipopago de la bd en papmyadmin (PAYPAL)
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Tienda/procesarVenta'; 
        let formData = new FormData();
        /*formData.append('direccion',dir);    
        formData.append('ciudad',ciudad);*/
        formData.append('inttipopago',inttipopago);
        formData.append('datapay',JSON.stringify(details));
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
        	if(request.readyState != 4) return;
        	if(request.status == 200){
        		let objData = JSON.parse(request.responseText);
        		if(objData.status){
        			window.location = base_url+"/Tienda/confirmarpedido/";
        		}else{
        			swal("", objData.msg , "error");
        		}
        	}

        }
    });
  }
}).render('#paypal-btn-container');
</script>

<!-- Modal -->
<div class="modal fade" id="modalTerminos" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">T??rminos y condiciones</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="page-content">
      		<ol>				
				<li>
					<h5> INFORMACI??N RELEVANTE</h5>
					<p>Es requisito necesario para la adquisici??n de los productos que se ofrecen en este sitio, que lea y acepte los siguientes T??rminos y Condiciones que a continuaci??n se redactan. El uso de nuestros servicios as?? como la compra de nuestros productos implicar?? que usted ha le??do y aceptado los T??rminos y Condiciones de Uso en el presente documento. Todas los productos  que son ofrecidos por nuestro sitio web pudieran ser creadas, cobradas, enviadas o presentadas por una p??gina web tercera y en tal caso estar??an sujetas a sus propios T??rminos y Condiciones. En algunos casos, para adquirir un producto, ser?? necesario el registro por parte del usuario, con ingreso de datos personales fidedignos y definici??n de una contrase??a.</p>
					<p>El usuario puede elegir y cambiar la clave para su acceso de administraci??n de la cuenta en cualquier momento, en caso de que se haya registrado y que sea necesario para la compra de alguno de nuestros productos. <?= EMAIL_EMPRESA ?> no asume la responsabilidad en caso de que entregue dicha clave a terceros.</p>
					<p>Todas las compras y transacciones que se lleven a cabo por medio de este sitio web, est??n sujetas a un proceso de confirmaci??n y verificaci??n, el cual podr??a incluir la verificaci??n del stock y disponibilidad de producto, validaci??n de la forma de pago, validaci??n de la factura (en caso de existir) y el cumplimiento de las condiciones requeridas por el medio de pago seleccionado. En algunos casos puede que se requiera una verificaci??n por medio de correo electr??nico.</p>
					<p>Los precios de los productos ofrecidos en esta Tienda Online es v??lido solamente en las compras realizadas en este sitio web.</p>
				</li>
				<li>
					<h5>LICENCIA</h5>
					<p><?= NOMBRE_EMPRESA ?>  a trav??s de su sitio web concede una licencia para que los usuarios utilicen  los productos que son vendidos en este sitio web de acuerdo a los T??rminos y Condiciones que se describen en este documento.</p>
				</li>
				<li>
					<h5>USO NO AUTORIZADO</h5>
					<p>En caso de que aplique (para venta de software, templetes, u otro producto de dise??o y programaci??n) usted no puede colocar uno de nuestros productos, modificado o sin modificar, en un CD, sitio web o ning??n otro medio y ofrecerlos para la redistribuci??n o la reventa de ning??n tipo.</p>
				</li>
				<li>
					<h5>PROPIEDAD</h5>
					<p>Usted no puede declarar propiedad intelectual o exclusiva a ninguno de nuestros productos, modificado o sin modificar. Todos los productos son propiedad  de los proveedores del contenido. En caso de que no se especifique lo contrario, nuestros productos se proporcionan  sin ning??n tipo de garant??a, expresa o impl??cita. En ning??n esta compa????a ser??  responsables de ning??n da??o incluyendo, pero no limitado a, da??os directos, indirectos, especiales, fortuitos o consecuentes u otras p??rdidas resultantes del uso o de la imposibilidad de utilizar nuestros productos.</p>
				</li>
				<li>
					<h5>POL??TICA DE REEMBOLSO Y GARANT??A</h5>
					<p>En el caso de productos que sean  mercanc??as irrevocables no-tangibles, no realizamos reembolsos despu??s de que se env??e el producto, usted tiene la responsabilidad de entender antes de comprarlo.  Le pedimos que lea cuidadosamente antes de comprarlo. Hacemos solamente excepciones con esta regla cuando la descripci??n no se ajusta al producto. Hay algunos productos que pudieran tener garant??a y posibilidad de reembolso pero este ser?? especificado al comprar el producto. En tales casos la garant??a solo cubrir?? fallas de f??brica y s??lo se har?? efectiva cuando el producto se haya usado correctamente. La garant??a no cubre aver??as o da??os ocasionados por uso indebido. Los t??rminos de la garant??a est??n asociados a fallas de fabricaci??n y funcionamiento en condiciones normales de los productos y s??lo se har??n efectivos estos t??rminos si el equipo ha sido usado correctamente. Esto incluye:</p>
					<ul class="lista_legal">
						<li>De acuerdo a las especificaciones t??cnicas indicadas para cada producto.</li>
						<li>En condiciones ambientales acorde con las especificaciones indicadas por el fabricante.</li>
						<li>En uso espec??fico para la funci??n con que fue dise??ado de f??brica.</li>
						<li>En condiciones de operaci??n el??ctricas acorde con las especificaciones y tolerancias indicadas.</li>
					</ul>
				</li>
				<li>
					<h5>COMPROBACI??N ANTIFRAUDE</h5>
					<p>La compra del cliente puede ser aplazada para la comprobaci??n antifraude. Tambi??n puede ser suspendida por m??s tiempo para una investigaci??n m??s rigurosa, para evitar transacciones fraudulentas.</p>
				</li>
				<li>
					<h5>PRIVACIDAD</h5>
					<p>El sitio web <?= WEB_EMPRESA ?> garantiza que la informaci??n personal que usted env??a cuenta con la seguridad necesaria. Los datos ingresados por usuario o en el caso de requerir una validaci??n de los pedidos no ser??n entregados a terceros, salvo que deba ser revelada en cumplimiento a una orden judicial o requerimientos legales.</p>
					<p>La suscripci??n a boletines de correos electr??nicos publicitarios es voluntaria y podr??a ser seleccionada al momento de crear su cuenta.</p>
					<p><?= NOMBRE_EMPRESA ?> reserva los derechos de cambiar o de modificar estos t??rminos sin previo aviso.</p>
				</li>
			</ol>
      	</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<br><br><br>
<hr>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="<?= base_url() ?>" class="stext-109 cl8 hov-cl1 trans-04">
			Inicio
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<span class="stext-109 cl4">
			<?= $data['page_title'] ?>
		</span>
	</div>
</div>
<br>
<div class="container" id="containerList">
	<div class="row">
		<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
			<div class=" m-r--38 m-lr-0-xl">
				<div class="">
					<?php 
					if(isset($_SESSION['login'])){
						?>
						<!-- <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
							<div class="m-l-25 m-r--38 m-lr-0-xl"> -->
								<div class="wrap-table-shopping-cart">
									<table id="tblCarrito" class="table-shopping-cart">
										<tr class="table_head">
											<th class="column-1">Producto</th>
											<th class="column-2"></th>
											<th class="column-3">Precio</th>
											<th class="column-4">Cantidad</th>
											<th class="column-5">Total</th>
										</tr>
										<?php 
										$subtotal = 0;
										foreach ($_SESSION['arrCarrito'] as $producto) {
											$totalProducto = $producto['precio'] * $producto['cantidad'];
											$subtotal += $totalProducto;
											$idProducto = openssl_encrypt($producto['idproducto'],METHODENCRIPT,KEY);
											
											?>
											<tr class="table_row <?= $idProducto ?>">
												<td class="column-1">
													<div class="how-itemcart1" idpr="<?= $idProducto ?>" op="2" onclick="fntdelItem(this)" >
														<img src="<?= $producto['imagen'] ?>" alt="<?= $producto['producto'] ?>">
													</div>
												</td>
												<td class="column-2"><?= $producto['producto'] ?></td>
												<td class="column-3"><?= SMONEY.formatMoney($producto['precio']) ?></td>
												<td class="column-4">
													<div class="wrap-num-product flex-w m-l-auto m-r-0">
														<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m"
														idpr="<?= $idProducto ?>">
														<i class="fs-16 zmdi zmdi-minus"></i>
													</div>

													<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="<?= $producto['cantidad'] ?>" idpr="<?= $idProducto ?>">

													<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"
													idpr="<?= $idProducto ?>">
													<i class="fs-16 zmdi zmdi-plus"></i>
												</div>
											</div>
										</td>
										<td class="column-5"><?= SMONEY.formatMoney($totalProducto) ?></td>
									</tr>
								<?php } ?>

							</table>
						</div>						
					<!-- </div>
					</div> -->
				<?php }else{ ?>
					<div class="col-lg-12 col-xl-12 m-lr-auto m-b-50" >
						<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r--38 m-lr-0-xl" >
							<ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 100%;">
								<li class="nav-item row">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">Iniciar Sesi??n</a>
								</li>
								<li class="nav-item row m-l-12" >
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#registro" role="tab" aria-controls="profile" aria-selected="false" >Crear cuenta</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
									<br>
									<form id="formLogin">
										<div class="form-group">
											<label for="txtEmail">Email</label>
											<input type="email" class="form-control" id="txtEmail" name="txtEmail">
										</div>
										<div class="form-group">
											<label for="txtPassword">Contrase??a</label>
											<input type="password" class="form-control" id="txtPassword" name="txtPassword">
										</div>
										<div class="row justify-content-center" >
											<div class="">
												<button type="submit" class="btn btn-primary">Iniciar sesi??n</button>
											</div>
											<div class="ml-1">
												<a href="<?= base_url() ?>/login" class="btn btn-warning" target="_blank" style="color: white">Olvid?? la clave</a>
											</div>

											
										
										</div>
										<p class="txt-center mt-2 stext-109 cl9">Si olvido su Email escribanos su caso a trav??s de la secci??n Contacto.</p>
										
									</form>

								</div>
								<div class="tab-pane fade" id="registro" role="tabpanel" aria-labelledby="profile-tab">
									<br>
									<form id="formRegister"> 
										<div class="row">
											<div class="col col-md-6 form-group">
												<label for="txtNombre">Nombres</label>
												<input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="">
											</div>
											<div class="col col-md-6 form-group">
												<label for="txtApellido">Apellidos</label>
												<input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" required="">
											</div>
										</div>
										<div class="row">
											<div class="col col-md-6 form-group">
												<label for="txtCedula">Cedula</label>
												<input type="text" class="form-control valid validNumber" id="txtCedula" name="txtCedula" required="" onkeypress="return controlTag(event);">
											</div>
											<div class="col col-md-6 form-group">
												<label for="txtTelefono">Tel??fono</label>
												<input type="text" class="form-control" id="txtTelefono" name="txtTelefono" required="" onkeypress="return">
												<!-- <input type="text" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" required="" onkeypress="return controlTag(event);"> -->
											</div>
										</div>
										<div class="row">											
											<div class="col col-md-12 form-group">
												<label for="txtEmailCliente">Email</label>
												<input type="email" class="form-control valid validEmail" id="txtEmailCliente" name="txtEmailCliente" required="">
											</div>
										</div>
										<button type="submit" class="btn btn-primary">Reg??strate</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
		<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
			<h4 class="mtext-109 cl2 p-b-30">
				Resumen
			</h4>
			<?php 
			$subtotal = 0;

			foreach ($_SESSION['arrCarrito'] as $producto) {
				$subtotal += $producto['precio'] * $producto['cantidad'];
			} 

			?>
			<div class="flex-w flex-t bor12 p-b-13">
				<div class="size-208">
					<span class="stext-110 cl2">
						Subtotal:
					</span>
				</div>

				<div class="size-209">
					<span id="subTotalCompra" class="mtext-110 cl2">
						<?= SMONEY.formatMoney($subtotal) ?>
					</span>
				</div>

			</div>
			<div class="flex-w flex-t p-t-27 p-b-33">
				<div class="size-208">
					<span class="stext-110 cl2">
						Total:
					</span>
				</div>

				<div class="size-209 p-t-1">
					<span id="totalCompra" class="mtext-110 cl2">
						<?= SMONEY.formatMoney($subtotal) ?>
					</span>
				</div>
			</div>
			<?php 
			if(isset($_SESSION['login'])){
				?>
				<div id="divMetodoPago" class="">
					<div id="divCondiciones"><div id="texto"></div>
							<div id="al"></div>
						<input type="checkbox" id="condiciones" >
						<label for="condiciones"> Aceptar </label>
						<a href="#" data-toggle="modal" data-target="#modalTerminos" > T??rminos y Condiciones </a>
					</div>
					<div id="optMetodoPago" class="notblock">	
						<hr>					
						<h4 class="mtext-109 cl2 p-b-30">
							M??todo de pago
						</h4>
						<div class="divmetodpago">
							<div>
								<label for="paypal">
									<input type="radio" id="paypal" class="methodpago" name="payment-method" checked="" value="Paypal">
									<img src="<?= media()?>/images/img-paypal.jpg" alt="Icono de PayPal" class="ml-space-sm" width="74" height="20"> (Pr??ximamente)
								</label>
							</div>
							<div>
								<label for="contraentrega">
									<input type="radio" id="contraentrega" class="methodpago" name="payment-method" value="CT">
									<span>Otros medios de pago</span>
								</label>
							</div>
							
							<div id="divtipopago" class="notblock" >
								<label for="listtipopago">Tipo de pago</label>
								<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
									<select id="listtipopago" class="js-select2" name="listtipopago">
										<?php 
										if(count($data['tiposPago']) > 0){ 
											foreach ($data['tiposPago'] as $tipopago) {
												if($tipopago['idtipopago'] != 1){
													?>
													<option value="<?= $tipopago['idtipopago']?>"><?= $tipopago['tipopago']?></option>
													<?php
												}
											}
										} ?>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
								<br>
								<button type="submit" id="btnComprar" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Procesar pedido</button>
							</div>
							<div id="divpaypal">
								<div>
									<p>Para completar la transacci??n, te enviaremos a los servidores seguros de PayPal.</p>
								</div>
								<br>
								<div id="paypal-btn-container"></div>
							</div>
						</div>
					</div>
				</div>				
			<?php } ?>
		</div>
	</div>
</div>
</div>

<?php 
footerTienda($data);
?>
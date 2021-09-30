<?php 
require_once("Models/TCategoria.php");
require_once("Models/TProducto.php");
require_once("Models/TCliente.php");
require_once("Models/LoginModel.php");

class Tienda extends Controllers{
	use TCategoria, TProducto, TCliente;
	public $login;
	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->login = new LoginModel();
	}

	public function tienda(){
		$data['page_tag'] = "Tienda - ".NOMBRE_EMPRESA;
		$data['page_title'] = NOMBRE_EMPRESA;
		$data['page_name'] = "tienda";
		
		$pagina = 1;
		$cantProductos = $this->cantProductos();
		$total_registro = $cantProductos['total_registro'];
		$desde = ($pagina-1)*PRODPORPAGINA;//El numero que se coloque en esta linea debe ser el mismo de la siguiente
		$total_paginas = ceil($total_registro/PRODPORPAGINA);//CEIL obtiene un numero entero
		$data['productos'] = $this->getProductosPage($desde,PRODPORPAGINA);
		$data['pagina'] = $pagina;
		$data['total_paginas'] = $total_paginas;
		$this->views->getView($this,"tienda",$data);
	}

	public function categoria($params){
		if(empty($params)){
			header("Location:".base_url());
		}else{

			$arrParams = explode(",",$params);
			$idcategoria = intval($arrParams[0]);
			$ruta = strClean($arrParams[1]);
			$pagina = 1;
			if(count($arrParams) > 2 AND is_numeric($arrParams[2])){
				$pagina = $arrParams[2];
			}

			$cantProductos = $this->cantProductos($idcategoria);
			$total_registro = $cantProductos['total_registro'];
			$desde = ($pagina-1)*PROCATEGORIA;//El numero que se coloque en esta linea debe ser el mismo de la siguiente
			$total_paginas = ceil($total_registro/PROCATEGORIA);//CEIL obtiene un numero entero
			$infoCategoria = $this->getProductosCategoriaT($idcategoria,$ruta,$desde,PROCATEGORIA);
			$categoria = strClean($params);
			$data['page_tag'] = NOMBRE_EMPRESA." - ".$infoCategoria['categoria'];
			$data['page_title'] = $infoCategoria['categoria'];
			$data['page_name'] = "categoria";
			$data['productos'] = $infoCategoria['productos'];
			$data['infoCategoria'] = $infoCategoria;
			$data['pagina'] = $pagina;
			$data['total_paginas'] = $total_paginas;
			$this->views->getView($this,"categoria",$data);
		}
	}

	public function producto($params){
		if(empty($params)){
			header("Location:".base_url());
		}else{
			$arrParams = explode(",",$params);
			$idproducto = intval($arrParams[0]);
			$ruta = strClean($arrParams[1]);
			$infoProducto = $this->getProductoT($idproducto,$ruta);
			if(empty($infoProducto) || $infoProducto['status'] != 1){
				header("Location:".base_url());
			}
			$data['page_tag'] = NOMBRE_EMPRESA." - ".$infoProducto['nombre'];
			$data['page_title'] = $infoProducto['nombre'];
			$data['page_name'] = "producto";
			$data['producto'] = $infoProducto;
			$this->views->getView($this,"producto",$data);
		}
	}

	public function addCarrito(){
		if($_POST){
				//unset($_SESSION['arrCarrito']);exit;
			$arrCarrito = array();
			$cantCarrito = 0;
			$idproducto = openssl_decrypt($_POST['id'], METHODENCRIPT, KEY);
			$cantidad = $_POST['cant'];
			if(is_numeric($idproducto) and is_numeric($cantidad)){
				$arrInfoProducto = $this->getProductoIDT($idproducto);
				if(!empty($arrInfoProducto)){
					$arrProducto = array('idproducto' => $idproducto,
						'producto' => $arrInfoProducto['nombre'],
						'cantidad' => $cantidad,
						'precio' => $arrInfoProducto['precio'],
						'imagen' => $arrInfoProducto['images'][0]['url_image']
					);
					if(isset($_SESSION['arrCarrito'])){
						$on = true;
						$arrCarrito = $_SESSION['arrCarrito'];
						for ($pr=0; $pr < count($arrCarrito); $pr++) {
							if($arrCarrito[$pr]['idproducto'] == $idproducto){
								$arrCarrito[$pr]['cantidad'] += $cantidad;
								$on = false;
							}
						}
						if($on){
							array_push($arrCarrito,$arrProducto);
						}
						$_SESSION['arrCarrito'] = $arrCarrito;
					}else{
						array_push($arrCarrito, $arrProducto);
						$_SESSION['arrCarrito'] = $arrCarrito;
					}

					foreach ($_SESSION['arrCarrito'] as $pro) {
						$cantCarrito += $pro['cantidad'];
					}
					$htmlCarrito ="";
					$htmlCarrito = getFile('Template/Modal/modalCarrito',$_SESSION['arrCarrito']);
					$arrResponse = array("status" => true, 
						"msg" => '¡Se agrego al corrito!',
						"cantCarrito" => $cantCarrito,
						"htmlCarrito" => $htmlCarrito
					);

				}else{
					$arrResponse = array("status" => false, "msg" => 'Producto no existente.');
				}
			}else{
				$arrResponse = array("status" => false, "msg" => 'Dato incorrecto.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function delCarrito(){
		if($_POST){
			$arrCarrito = array();
			$cantCarrito = 0;
			$subtotal = 0;
			$idproducto = openssl_decrypt($_POST['id'], METHODENCRIPT, KEY);
			$option = $_POST['option'];
			if(is_numeric($idproducto) and ($option == 1 or $option == 2)){
				$arrCarrito = $_SESSION['arrCarrito'];
				for ($pr=0; $pr < count($arrCarrito); $pr++) {
					if($arrCarrito[$pr]['idproducto'] == $idproducto){
						unset($arrCarrito[$pr]);
					}
				}
				sort($arrCarrito);
				$_SESSION['arrCarrito'] = $arrCarrito;
				foreach ($_SESSION['arrCarrito'] as $pro) {
					$cantCarrito += $pro['cantidad'];
					$subtotal += $pro['cantidad'] * $pro['precio'];
				}
				$htmlCarrito = "";
				if($option == 1){
					$htmlCarrito = getFile('Template/Modal/modalCarrito',$_SESSION['arrCarrito']);
				}
				$arrResponse = array("status" => true, 
					"msg" => '¡Producto eliminado!',
					"cantCarrito" => $cantCarrito,
					"htmlCarrito" => $htmlCarrito,
					"subTotal" => SMONEY.formatMoney($subtotal),
					"total" => SMONEY.formatMoney($subtotal + COSTOENVIO)
				);
			}else{
				$arrResponse = array("status" => false, "msg" => 'Dato incorrecto.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function updCarrito(){
		if($_POST){
			$arrCarrito = array();
			$totalProducto = 0;
			$subtotal = 0;
			$total = 0;
			$idproducto = openssl_decrypt($_POST['id'], METHODENCRIPT, KEY);
			$cantidad = intval($_POST['cantidad']);
			if(is_numeric($idproducto) and $cantidad > 0){
				$arrCarrito = $_SESSION['arrCarrito'];
				for ($p=0; $p < count($arrCarrito); $p++) { 
					if($arrCarrito[$p]['idproducto'] == $idproducto){
						$arrCarrito[$p]['cantidad'] = $cantidad;
						$totalProducto = $arrCarrito[$p]['precio'] * $cantidad;
						break;
					}
				}
				$_SESSION['arrCarrito'] = $arrCarrito;
				foreach ($_SESSION['arrCarrito'] as $pro) {
					$subtotal += $pro['cantidad'] * $pro['precio']; 
				}
				$arrResponse = array("status" => true, 
					"msg" => '¡Producto actualizado!',
					"totalProducto" => SMONEY.formatMoney($totalProducto),
					"subTotal" => SMONEY.formatMoney($subtotal),
					"total" => SMONEY.formatMoney($subtotal + COSTOENVIO)
				);

			}else{
				$arrResponse = array("status" => false, "msg" => 'Dato incorrecto.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function registro(){
		error_reporting(0);
		if($_POST){
			if(empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtCedula']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmailCliente']))
			{
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			}else{ 
				$strNombre = ucwords(strClean($_POST['txtNombre']));
				$strApellido = ucwords(strClean($_POST['txtApellido']));
				$intCedula = intval(strClean($_POST['txtCedula']));
				$intTelefono = intval(strClean($_POST['txtTelefono']));
				$strEmail = strtolower(strClean($_POST['txtEmailCliente']));
				$intTipoId = RCLIENTES;
				$request_user = "";

				$strPassword =  passGenerator();
				$strPasswordEncript = hash("SHA256",$strPassword);
				$request_user = $this->insertCliente($strNombre, 
														$strApellido,
														$intCedula, 
														$intTelefono, 
														$strEmail,
														$strPasswordEncript,
														$intTipoId );

				if($request_user > 0 )
				{
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					$nombreUsuario = $strNombre.' '.$strApellido;
					$dataUsuario = array('nombreUsuario' => $nombreUsuario,
						'email' => $strEmail,
						'password' => $strPassword,
						'asunto' => 'Bienvenido a tu tienda en línea');
					$_SESSION['idUser'] = $request_user;
					$_SESSION['login'] = true;
					$this->login->sessionLogin($request_user);
						sendEmail($dataUsuario,'email_bienvenida');

				}else if($request_user == 'exist'){
					$arrResponse = array('status' => false, 'msg' => '¡Atención! el email ó la cedula ya existe, ingrese otro.');		
				}else{
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function procesarVenta(){

		if($_POST){
			$idtransaccionpaypal = NULL;
			$datospaypal = NULL;
			$personaid = $_SESSION['idUser'];
			$monto = 0;
			$tipopagoid = intval($_POST['inttipopago']);
			$status = "Pendiente";
			$subtotal = 0;

			if(!empty($_SESSION['arrCarrito'])){
				foreach ($_SESSION['arrCarrito'] as $pro) {
					$subtotal += $pro['cantidad'] * $pro['precio'];
				}
				//$monto = formatMoney($subtotal + COSTOENVIO);
				$monto = $subtotal;

				if (empty($_POST['datapay'])) {
					//CREAR PEDIDO
					$request_pedido = $this->insertPedido($idtransaccionpaypal,
						$datospaypal,
						$personaid,
						$monto,
						$tipopagoid,
						$status);
					if($request_pedido > 0){
									//INSERTAMOS DETALLE
						foreach ($_SESSION['arrCarrito'] as $producto) {
							$productoid = $producto['idproducto'];
							$precio = $producto['precio'];
							$cantidad = $producto['cantidad'];
							$this->insertDetalle($request_pedido,$productoid,$precio,$cantidad);
						}

						$infoOrden = $this->getPedido($request_pedido);
						$dataEmailOrden = array('asunto' => "Se ha creado la orden No.".$request_pedido,
							'email' => $_SESSION['userData']['email_user'], 
							'emailCopia' => EMAIL_PEDIDOS,
							'pedido' => $infoOrden );
						
						sendEmail($dataEmailOrden,"email_notificacion_orden");

						$orden = openssl_encrypt($request_pedido, METHODENCRIPT, KEY);
						$transaccion = openssl_encrypt($idtransaccionpaypal, METHODENCRIPT, KEY);
						$arrResponse = array("status" => true, 
							"orden" => $orden,
							"transaccion" => $transaccion,
							"msg" => 'Pedido realizado'
						);
						$_SESSION['dataorden'] = $arrResponse;
						unset($_SESSION['arrCarrito']);
						session_regenerate_id(true);
					}

				}else{//PAGO CON PAYPAL
					$jsonPaypal = $_POST['datapay'];
					$objPaypal = json_decode($jsonPaypal);
					$status = "Aprobado";

					if (is_object($objPaypal)) {
						$datospaypal = $jsonPaypal;
						$idtransaccionpaypal = $objPaypal->purchase_units[0]->payments->captures[0]->id;
						if($objPaypal->status == "COMPLETED"){
							$totalPaypal = formatMoney($objPaypal->purchase_units[0]->amount->value);
							if($monto == $totalPaypal){
								$status = "Completo";
							}
								//CREAR PEDIDO
							$request_pedido = $this->insertPedido($idtransaccionpaypal,
								$datospaypal,
								$personaid,
								$monto,
								$tipopagoid,
								$status);
							if($request_pedido > 0){
									//INSERTAMOS DETALLE
								foreach ($_SESSION['arrCarrito'] as $producto) {
									$productoid = $producto['idproducto'];
									$precio = $producto['precio'];
									$cantidad = $producto['cantidad'];
									$this->insertDetalle($request_pedido,$productoid,$precio,$cantidad);
								}

								$infoOrden = $this->getPedido($request_pedido);
								$dataEmailOrden = array('asunto' => "Se ha creado la orden No.".$request_pedido,
									'email' => $_SESSION['userData']['email_user'], 
									'emailCopia' => EMAIL_PEDIDOS,
									'pedido' => $infoOrden );
								
								sendEmail($dataEmailOrden,"email_notificacion_orden");

								$orden = openssl_encrypt($request_pedido, METHODENCRIPT, KEY);
								$transaccion = openssl_encrypt($idtransaccionpaypal, METHODENCRIPT, KEY);
								$arrResponse = array("status" => true, 
									"orden" => $orden,
									"transaccion" => $transaccion,
									"msg" => 'Pedido realizado'
								);
								$_SESSION['dataorden'] = $arrResponse;
								unset($_SESSION['arrCarrito']);
								session_regenerate_id(true);

							}else{
								$arrResponse = array("status" => false, "msg" => 'No es posible procesar el pedido.');
							}

						}else{
							$arrResponse = array("status" => false, "msg" => 'No es posible completar el pago con Paypal.');
						}
					}else{
						$arrResponse = array("status" => false, "msg" => 'Hubo un error en la transaccion.');
					}
				}

			}else{
				$arrResponse = array("status" => false, "msg" => 'No es posible procesar el pedido.');
			}

		}else{
			$arrResponse = array("status" => false, "msg" => 'No es posible procesar el pedido.');
		}
		echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		die();
	}

	public function confirmarpedido(){
		if(empty($_SESSION['dataorden'])){
			header("Location: ".base_url());
		}else{
			$dataorden = $_SESSION['dataorden'];
			$idpedido = openssl_decrypt($dataorden['orden'], METHODENCRIPT, KEY);
			$transaccion = openssl_decrypt($dataorden['transaccion'], METHODENCRIPT, KEY);
			$data['page_tag'] = "Confirmar pedido";
			$data['page_title'] = "Confirmar pedido";
			$data['page_name'] = "confirmarpedido";
			$data['orden'] = $idpedido;
			$data['transaccion'] = $transaccion;
			$this->views->getView($this,"confirmarpedido",$data);
		}
		unset($_SESSION['dataorden']);
	}

	public function page($pagina = null){

		$pagina = is_numeric($pagina) ? $pagina : 1;		
		$cantProductos = $this->cantProductos();
		$total_registro = $cantProductos['total_registro'];
		$desde = ($pagina-1)*PRODPORPAGINA;//El numero que se coloque en esta linea debe ser el mismo de la siguiente
		$total_paginas = ceil($total_registro/PRODPORPAGINA);//CEIL obtiene un numero entero
		$data['productos'] = $this->getProductosPage($desde,PRODPORPAGINA);
		$data['page_tag'] = "Tienda - ".NOMBRE_EMPRESA;
		$data['page_title'] = NOMBRE_EMPRESA;
		$data['page_name'] = "tienda";
		$data['pagina'] = $pagina;
		$data['total_paginas'] = $total_paginas;
		/*dep($data['productos']);
		die();*/
		$this->views->getView($this,"tienda",$data);
	}

	public function search(){
		if(empty($_REQUEST['s'])){
			header("Location: ".base_url());
		}else{
			$busqueda = strClean($_REQUEST['s']);
		}
		$pagina = empty($_REQUEST['p']) ? 1 : intval($_REQUEST['p']);
		$cantProductos = $this->cantProdSearch($busqueda);

		$total_registro = $cantProductos['total_registro'];
		$desde = ($pagina-1)*PROBUSCAR;//El numero que se coloque en esta linea debe ser el mismo de la siguiente
		$total_paginas = ceil($total_registro/PROBUSCAR);//CEIL obtiene un numero entero
		$data['productos'] = $this->getProdSearch($busqueda,$desde,PRODPORPAGINA);
		//dep($data['productos']);
		$data['page_tag'] = "Tienda - ".NOMBRE_EMPRESA;
		$data['page_title'] = "Resultado de: ".$busqueda;
		$data['page_name'] = "tienda";
		$data['pagina'] = $pagina;
		$data['total_paginas'] = $total_paginas;
		$data['busqueda'] = $busqueda;
		/*dep($data['productos']);
		die();*/
		$this->views->getView($this,"search",$data);
	}



	public function contacto(){
		if($_POST){
			//dep($_POST);
			$nombre = ucwords(strtolower(strClean($_POST['nombreContacto'])));
			$email = strtolower(strClean($_POST['emailContacto']));
			$mensaje = strClean($_POST['mensaje']);

			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$ip = $_SERVER['REMOTE_ADDR'];
			$dispositivo = "PC";

			if(preg_match("/mobile/i",$useragent)){
				$dispositivo = "Movil";
			} else if(preg_match("/tablet/i",$useragent)){
				$dispositivo = "Tablet";
			} else if(preg_match("/iPhone/i",$useragent)){
				$dispositivo = "iPhone";
			} else if(preg_match("/iPad/i",$useragent)){
				$dispositivo = "iPad";
			} 

			$userContact = $this->setContacto($nombre,$email,$mensaje,$ip,$dispositivo,$useragent);

			if($userContact > 0){
				$arrResponse = array('status' => true, 'msg' => "Su mensaje fue enviado correctamente");
				//Enviar correo
				$dataUsuario = array('asunto' => "Nuevo usuario en contacto",
									'email' => EMAIL_CONTACTO, 
									'nombreContacto' => $nombre,
									'emailContacto' => $email,
									'mensaje' => $mensaje );
				sendEmail($dataUsuario,"email_contacto");//Este es el template
			}else{
				$arrResponse = array('status' => false, 'msg' => "No es posible enviar el mensaje");
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
?>

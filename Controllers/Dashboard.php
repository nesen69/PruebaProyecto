<?php 

	class Dashboard extends Controllers{
		public function __construct(){
			parent::__construct();

			session_start();
			if(empty($_SESSION['login'])){ // Bloqueamos el acceso por barra de direcciones y se accedera solo con sesiones activas
				header('location: '.base_url().'/login');
			}
			getPermisos(MDASHBOARD);
		}

		public function dashboard(){			
			$data['page_tag'] = "Dashboard -".NOMBRE_EMPRESA;
			$data['page_title'] = "DASHBOARD - <small>".NOMBRE_EMPRESA."</small>";
			$data['page_name'] = "dashboard";
			$data['page_functions_js'] = "functions_dashboard.js";
			$data['usuarios'] = $this->model->cantUsuarios();
			$data['clientes'] = $this->model->cantClientes();
			$data['productos'] = $this->model->cantProductos();
			$data['pedidos'] = $this->model->cantPedidos();
			$data['lastOrders'] = $this->model->lastOrders();
			$data['productosTen'] = $this->model->productosTen();
			$anio = date('Y');
			$mes = date('m');
			$data['pagoMes'] = $this->model->selectPagosMes($anio,$mes);
			$data['ventasMDia'] = $this->model->selectVentasMes($anio,$mes);
			$data['ventasAnio'] = $this->model->selectVentasAnio($anio);
			if( $_SESSION['userData']['idrol'] == RCLIENTES ){
				$this->views->getView($this,"dashboardCliente",$data);
			}else{
				$this->views->getView($this,"dashboard",$data);
			}
		}

		public function tipoPagoMes(){
			if($_POST){
				$grafica = "tipoPagoMes";
				$nFecha = str_replace(" ","",$_POST['fecha']); // Limpia el arreglo y devuelve ejm solo 4-2021
				$arrFecha = explode('-',$nFecha); 
				$mes = $arrFecha[0];
				$anio = $arrFecha[1];
				$pagos = $this->model->selectPagosMes($anio,$mes);

				$script = getFile("Template/Modal/graficas",$pagos);
				echo $script;
				//dep($pagos);
				die();
			}
		}

		public function ventasMes(){
			if($_POST){
				$grafica = "ventasMes";
				$nFecha = str_replace(" ","",$_POST['fecha']); // Limpia el arreglo y devuelve ejm solo 4-2021
				$arrFecha = explode('-',$nFecha); 
				$mes = $arrFecha[0];
				$anio = $arrFecha[1];
				$pagos = $this->model->selectVentasMes($anio,$mes);

				$script = getFile("Template/Modal/graficas",$pagos);
				echo $script;
				//dep($pagos);
				die();
			}
		}

		public function ventasAnio(){
			if($_POST){
				$grafica = "ventasAnio";
				$anio = intval($_POST['anio']);
				$pagos = $this->model->selectVentasAnio($anio);

				$script = getFile("Template/Modal/graficas",$pagos);
				echo $script;
				//dep($pagos);
				die();
			}
		}
		
	}

 ?>
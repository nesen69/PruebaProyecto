<?php 

class Reporte_cliente extends Controllers{
	
	public function __construct(){

		parent::__construct();
		session_start();
		if(empty($_SESSION['login']))
		{
			header('Location: '.base_url().'/login');
		}
			getPermisos(MREPORTESC); // Corresponde al numero en la BD/Tabla Modulo->idmodulo
		}

		public function Reporte_cliente(){
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}

			$data['page_tag'] = "Reporte - ".NOMBRE_EMPRESA;
			$data['page_title'] = "REPORTE - <small>".NOMBRE_EMPRESA."</small>";
			$data['page_name'] = "reporte_cliente";
			$data['page_functions_js'] = "functions_reporte.js";
			$data['arreglo'] = $this->model->selectReportes();
			$this->views->getView($this,"reporte_cliente",$data);
		}

		public function getReportes(){
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectReportes();
				
				$cont = "";
				for ($i=0; $i < count($arrData); $i++) {					
					$cont = $i+1;
					$arrData[$i]['cont'] = $cont;
					//Codigo para colocar asteriscos al número de cedula
					$arrData[$i]['identificacion'] = substr($arrData[$i]['identificacion'], 0, 3) . str_repeat('*', strlen($arrData[$i]['identificacion']) - 3);

				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		

	}

?>
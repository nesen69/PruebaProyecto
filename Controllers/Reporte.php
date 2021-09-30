<?php 

class Reporte extends Controllers{
	
	public function __construct(){

		parent::__construct();
		session_start();
		if(empty($_SESSION['login']))
		{
			header('Location: '.base_url().'/login');
		}
			getPermisos(MREPORTES); // Corresponde al numero en la BD/Tabla Modulo->idmodulo
		}

		public function Reporte(){
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}

			$data['page_tag'] = "Reporte - ".NOMBRE_EMPRESA;
			$data['page_title'] = "REPORTE - <small>".NOMBRE_EMPRESA."</small>";
			$data['page_name'] = "reporte";
			$data['arreglo'] = $this->model->selectReportes();
			$this->views->getView($this,"reporte",$data);
		}

		public function reporte_busqueda(){
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$busqueda = $_REQUEST['busqueda'];
			$data['palabra']= $busqueda;
			$data['page_tag'] = "Reporte - ".NOMBRE_EMPRESA;
			$data['page_title'] = "REPORTE - <small>".NOMBRE_EMPRESA."</small>";
			$data['page_name'] = "reporte_busqueda";
			$data['arreglo'] = $this->model->selectReporte($busqueda);
			$this->views->getView($this,"reporte_busqueda",$data);
		}

		public function export(){
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=Reporte.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			echo $_POST['test'];
		}

	}

?>
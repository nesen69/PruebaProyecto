<?php 

	class Contacto_admin extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			getPermisos(MDCONTACTO);
		}

		public function Contacto_admin(){

			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Contacto -".NOMBRE_EMPRESA;
			$data['page_title'] = "Contacto - <small>".NOMBRE_EMPRESA."</small>";
			$data['page_name'] = "contacto_admin";
			$data['page_functions_js'] = "functions_contacto_admin.js";
			$this->views->getView($this,"contacto_admin",$data);
		}

		public function getContacto_admin(){
			if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectContacto_admin();

			for ($i=0; $i < count($arrData); $i++) { 
				$btnView ='';
				if($_SESSION['permisosMod']['r']){
					$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['id'].')" title="Ver mensaje"><i class="far fa-eye"></i></button>';
				}
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			
			die();
		}

		public function getMensaje($idmensaje){
			if($_SESSION['permisosMod']['r']){
				$idmensaje = intval($idmensaje);
				if($idmensaje > 0){

					$arrData = $this->model->selectMensaje($idmensaje);
					

					if(empty($arrData)){
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
	}
?>
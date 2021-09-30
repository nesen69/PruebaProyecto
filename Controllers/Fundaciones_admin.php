<?php 

	class Fundaciones_admin extends Controllers{
		
		public function __construct(){

			parent::__construct();
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			getPermisos(MFUNDACIONES); // Corresponde al numero en la BD/Tabla Modulo->idmodulo
		}

		public function fundaciones_admin(){
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Fundaciones - ".NOMBRE_EMPRESA;
			$data['page_title'] = "FUNDACIONES - <small>".NOMBRE_EMPRESA."</small>";
			$data['page_name'] = "fundaciones_admin";
			$data['page_functions_js'] = "functions_fundacion.js";
			
			$this->views->getView($this,"fundaciones_admin",$data);
		}


		public function getFundacion($idBeneficio){//Sirve para hacer la consulta de los datos del cliente
			if($_SESSION['permisosMod']['r']){
				$idbeneficio = intval($idBeneficio);
				if($idbeneficio > 0){
					$arrData = $this->model->selectFundacion($idbeneficio);
					$arrResponse = array('status' => true, 'data' => $arrData);
					
					if(empty($arrData)){
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrImg = $this->model->selectImages($idbeneficio);
						if(count($arrImg) > 0){
							for ($i=0; $i < count($arrImg); $i++) { 
								$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
							}
						}
						$arrData['images'] = $arrImg;
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					/*dep($arrResponse);
					die();*/
			
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		

		public function setFundacion(){
			/*dep($_POST);
				die();*/
		if($_POST){
			if(empty($_POST['txtNombre']) || empty($_POST['txtCodigo']) || empty($_POST['txtPremio']) || empty($_POST['txtDireccion']) )
			{
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectoss.');
			}else{ 
				$intFundacion = intval($_POST['idFundacion']);
				$strNombre = strClean($_POST['txtNombre']);
				$intCodigo = strClean($_POST['txtCodigo']);
				$strPremio = strClean($_POST['txtPremio']);
				$strDireccion = strClean($_POST['txtDireccion']);
				$strDescripcion = strClean($_POST['txtDescripcionF']);
				$intStatus = intval($_POST['listStatus']);
				$request_fundacion = "";
				/*dep(strNombre);*/

				if($intFundacion == 0){
					$option = 1;
					if($_SESSION['permisosMod']['w']){
						$request_fundacion = $this->model->insertFundacion($strNombre,
																	$intCodigo,
																	$strPremio,
																	$strDireccion,
																	$strDescripcion,
																	$intStatus
																	);

					}
				}else{
					$option = 2;
					if($_SESSION['permisosMod']['u']){
						$request_fundacion = $this->model->updateFundacion($intFundacion,
																	$strNombre,
																	$intCodigo,
																	$strPremio,
																	$strDireccion,
																	$strDescripcion,
																	$intStatus
																	);
					}
				}
				if($request_fundacion > 0 )
					{
						if($option == 1){
							$arrResponse = array('status' => true, 'id_beneficio' => $request_fundacion, 'msg' => 'Datos guardados correctamente.');
						}else{
							$arrResponse = array('status' => true, 'id_beneficio' => $intFundacion, 'msg' => 'Datos Actualizados correctamente.');
						}
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}

				}

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getFundaciones(){
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectFundaciones();
				
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';

					if($arrData[$i]['status'] == 1)
					{
						$arrData[$i]['status'] = '<span class="badge badge-danger">Pendiente por entregar</span>';
					}else{
						$arrData[$i]['status'] = '<span class="badge badge-success">Entregado exitosamente</span>';
					}

					
					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['id_beneficio'].')" title="Ver fundación"><i class="far fa-eye"></i></button>';
					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['id_beneficio'].')" title="Editar fundación"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['id_beneficio'].')" title="Eliminar fundación"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['opciones'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
			die();
	}

	public function setImage(){

		if($_POST){
			
//$_POST['id_beneficio'] = 5;
			if(empty($_POST['id_beneficio'])){
				$arrResponse = array('status' => false, 'msg' => 'Error de dato.');
			}else{
				$idfundacion = intval($_POST['id_beneficio']);
				$foto      = $_FILES['foto'];
				$imgNombre = 'fun_'.md5(date('d-m-Y H:i:s')).'.jpg';
				$request_image = $this->model->insertImageFundacion($idfundacion,$imgNombre);
				if($request_image){
					$uploadImage = uploadImage($foto,$imgNombre);
					$arrResponse = array('status' => true, 'imgname' => $imgNombre, 'msg' => 'Archivo cargado.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error de carga.');
				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

		public function delFile(){
			if($_POST){
				if(empty($_POST['id_beneficio']) || empty($_POST['file'])){
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					//Eliminar de la DB
					$idFundacion = intval($_POST['id_beneficio']);
					$imgNombre  = strClean($_POST['file']);
					$request_image = $this->model->deleteImage($idFundacion,$imgNombre);

					if($request_image){//Con la imea siguiente eliminamos la foto de la carpeta uploads
						$deleteFile =  deleteFile($imgNombre);//Eliminar la foto de uploads, la funcion esta en helpers
						$arrResponse = array('status' => true, 'msg' => 'Archivo eliminado correctamente');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function delFundacion(){
			if($_POST){

				if($_SESSION['permisosMod']['d']){
					$intBeneficio = intval($_POST['idBeneficio']);
					$requestDelete = $this->model->deleteFundacion($intBeneficio);
					if($requestDelete)
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la Fundación.');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la Fundación.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

/*		public function getSelectSorteos(){
			$htmlOptions = "";
			$arrData = $this->model->selectSorteos();
			
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idproducto'].'">'.$arrData[$i]['nombre'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}*/

		/*public function getSelectSorteos(){
			$htmlOptions = "";
			$arrData = $this->model->selectSorteos();
			
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['id_beneficio'].'">'.$arrData[$i]['sorteo'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}*/

	}

 ?>
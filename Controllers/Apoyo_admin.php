<?php 

	require_once("Models/TProducto.php");
	require_once("Models/TApoyo.php");
	class Apoyo_admin extends Controllers{

		use TProducto,TApoyo;
		public function __construct(){

			parent::__construct();
			session_start();

			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			getPermisos(MAPOYO); // Corresponde al numero en la BD/Tabla Modulo->idmodulo
		}
		
		public function apoyo_admin(){
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Apoyo - ".NOMBRE_EMPRESA;
			$data['page_title'] = "APOYO - <small>".NOMBRE_EMPRESA."</small>";
			$data['page_name'] = "apoyo_admin";
			$data['page_functions_js'] = "functions_apoyo.js";
			//$data['pru'] = $this->model->selectProductos();
			$this->views->getView($this,"apoyo_admin",$data);
		}

		public function getSelectProductos(){
			if($_SESSION['permisosMod']['r']){
				$htmlOptions = "";
				$arrData = $this->model->selectProductos();
				if(count($arrData) > 0 ){
					for ($i=0; $i < count($arrData); $i++) { 
						if($arrData[$i]['status'] != 0 ){
							$htmlOptions .= '<option value="'.$arrData[$i]['idproducto'].'">'.$arrData[$i]['nombre'].'</option>';
						}
					}
				}
				echo $htmlOptions;
			}
			die();	
		}

		public function getApoyos(){
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectApoyos();
				/*dep($arrData);
				die();*/
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';

					if($arrData[$i]['status'] == 1)
					{
						$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
					}else{
						$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
					}

					//$arrData[$i]['precio'] = SMONEY.' '.formatMoney($arrData[$i]['precio']);
					//if($_SESSION['permisosMod']['r']){
						

						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idapoyo'].')" title="Ver producto"><i class="far fa-eye"></i></button>';
					//}
					//if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idapoyo'].')" title="Editar producto"><i class="fas fa-pencil-alt"></i></button>';
					//}
					//if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idapoyo'].')" title="Eliminar producto"><i class="far fa-trash-alt"></i></button>';
					//}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getApoyo($idapoyo){
			if($_SESSION['permisosMod']['r']){
				$idapoyo = intval($idapoyo);
				if($idapoyo > 0){
					$arrData = $this->model->selectApoyo($idapoyo);
					/*dep($arrData);
					die();*/
					$arrResponse = array('status' => true, 'data' => $arrData);
					if(empty($arrData)){
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrImg = $this->model->selectImages($idapoyo);
						if(count($arrImg) > 0){
							for ($i=0; $i < count($arrImg); $i++) { 
								$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
							}
						}
						$arrData['images'] = $arrImg;
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					//dep($arrData);die();
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
					
				}
			}
			die();
		}

	
		public function setApoyo(){
			if($_POST){
				/*dep($_POST);
				die();*/
				$arrResponse = array();
				if(empty($_POST['txtNombreOrg']) || empty($_POST['txtCodigoOrg']) || empty($_POST['txtResponsable']) || empty($_POST['txtCedula']) || empty($_POST['txtTelefono']))
				{
					$arrResponse = array("status" => false, "msg" => 'Todos los campos son obigatorios.');
				}else{
					
					$idApoyo = intval($_POST['idApoyo']);
					$strNombreOrg = strClean($_POST['txtNombreOrg']);
					$intCodigoOrg = intval($_POST['txtCodigoOrg']);
					$strResponsable = strClean($_POST['txtResponsable']);
					$intCedula = intval($_POST['txtCedula']);
					$intTelefono = intval($_POST['txtTelefono']);
					$strDescripcionOrg = strClean($_POST['txtDescripcionOrg']);
					$intSorteoId = intval($_POST['listSorteos']);
					$intStatus = intval($_POST['listStatus']);
					$request_apoyo = "";

					if($idApoyo == 0)//SI es igual a cero inserta, si tiene valor modifica
					{
						$option = 1;
						if($_SESSION['permisosMod']['w']){
							$request_apoyo = $this->model->insertApoyo($strNombreOrg,
																		$intCodigoOrg,
																		$strResponsable,
																		$intCedula,
																		$intTelefono,
																		$strDescripcionOrg,
																		$intSorteoId,
																		$intStatus
																		);
						}
					}else{
						$option = 2;
						if($_SESSION['permisosMod']['u']){
							$request_apoyo = $this->model->updateApoyo($idApoyo,
																		$strNombreOrg,
																		$intCodigoOrg,
																		$strResponsable,
																		$intCedula,
																		$intTelefono,
																		$strDescripcionOrg,
																		$intSorteoId,
																		$intStatus
																		);
						}
					}
					if($request_apoyo > 0 )
					{
						if($option == 1){
							$arrResponse = array('status' => true, 'idapoyo' => $request_apoyo, 'msg' => 'Datos guardados correctamente.');
						}else{
							$arrResponse = array('status' => true, 'idapoyo' => $idApoyo, 'msg' => 'Datos Actualizados correctamente.');
						}
					}else if($request_apoyo == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! ya existe un apoyo con el RIF Ingresado.');		
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}

				}

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setImage(){

			if($_POST){
				
				if(empty($_POST['idapoyo'])){
					$arrResponse = array('status' => false, 'msg' => 'Error de dato.');
				}else{
					$idApoyo = intval($_POST['idapoyo']);
					$foto      = $_FILES['foto'];
					$imgNombre = 'apo_'.md5(date('d-m-Y H:i:s')).'.jpg';
					$request_image = $this->model->insertImageApoyo($idApoyo,$imgNombre);
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
				if(empty($_POST['idapoyo']) || empty($_POST['file'])){
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					//Eliminar de la DB
					$idApoyo = intval($_POST['idapoyo']);
					$imgNombre  = strClean($_POST['file']);
					$request_image = $this->model->deleteImage($idApoyo,$imgNombre);

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

		public function delApoyo(){
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdapoyo = intval($_POST['idApoyo']);
					$requestDelete = $this->model->deleteApoyo($intIdapoyo);
					if($requestDelete)
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el apoyo');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el apoyo.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

				
	}

 ?>
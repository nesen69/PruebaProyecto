<?php 

	class Ganadores_admin extends Controllers{
		
		public function __construct(){

			parent::__construct();
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			getPermisos(MGANADOR); // Corresponde al numero en la BD/Tabla Modulo->idmodulo
		}

		public function ganadores_admin(){
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Ganadores - ".NOMBRE_EMPRESA;
			$data['page_title'] = "GANADORES - <small>".NOMBRE_EMPRESA."</small>";
			$data['page_name'] = "ganadores_admin";
			$data['page_functions_js'] = "functions_ganador.js";
			
			$this->views->getView($this,"ganadores_admin",$data);
		}

		public function getGanador($strIdGanador){//Sirve para hacer la consulta de los datos del cliente 

			if($_SESSION['permisosMod']['r']){
				
				$identificacion = intval($strIdGanador);
				if($identificacion > 0){

					$dataWin = $this->model->selectCliente($identificacion);
				/*	dep($dataWin);
					die();*/
					if(empty($dataWin)){
						$dataWin = array('status' => false, 'msg' => 'El numero de cedula no esta registrado.');
					}
			
					echo json_encode($dataWin,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		public function getGanadorFinal($idsorteo){//Sirve para extraer los datos de la tabla sorteo y/o ganador
			if($_SESSION['permisosMod']['r']){
			
			
				$idsorteo = intval($idsorteo);
				//if($identificacion > 0){


				$dataWin = $this->model->selectGanador($idsorteo);
				/*dep($dataWin);
				die();*/
				$arrResponse = array('status' => true, 'data' => $dataWin);

				if(empty($dataWin)){
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrImg = $this->model->selectImages($idsorteo);
						if(count($arrImg) > 0){
							for ($i=0; $i < count($arrImg); $i++) { 
								$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
							}
						}
						$dataWin['images'] = $arrImg;
						$arrResponse = array('status' => true, 'data' => $dataWin);
					}
					
				
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				//}
			}
			die();
		}

		

		public function setGanador(){
			/*dep($_POST);
				die();*/
		if($_POST){
			if(empty($_POST['txtNombrePremio']) )
			{
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectoss.');
			}else{ 
				$idGanador = intval($_POST['idGanador']);
				$idPersona = intval($_POST['idPersona']);
				$strDireccion = strtolower(strClean($_POST['txtDireccion']));
				$strNombrePremio = strtolower(strClean($_POST['txtNombrePremio']));
				/*$intListSorteo = intval(strClean($_POST['listSorteo']));*/
				$intListStatus = intval(strClean($_POST['listStatus']));
				$request_ganador = "";
				
				//$intTipoId = RCLIENTES;//Verificar el la tabla ROL el numero

				if($idGanador == 0){
					$option = 1;
					if($_SESSION['permisosMod']['w']){
						$request_ganador = $this->model->insertGanador($idPersona,
																	$strDireccion,
																	$strNombrePremio,
																	$intListStatus
																	);

					}
				}else{
					$option = 2;
					if($_SESSION['permisosMod']['u']){
						$request_ganador = $this->model->updateGanador($idGanador,
																	$strDireccion,
																	$strNombrePremio,
																	$intListStatus
																	);
					}
				}
				if($request_ganador > 0 )
					{
						if($option == 1){
							$arrResponse = array('status' => true, 'idsorteo' => $request_ganador, 'msg' => 'Datos guardados correctamente.');
						}else{
							$arrResponse = array('status' => true, 'idsorteo' => $idGanador, 'msg' => 'Datos Actualizados correctamente.');
						}
					}else if($request_ganador == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! ya existe un ganador con el id Ingresado.');		
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}

				}

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getGanadores(){
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectGanadores();
				/*dep($arrData);
				die();*/
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';
					$nombres = '';

					if($arrData[$i]['status'] == 1)
					{
						$arrData[$i]['status'] = '<span class="badge badge-danger">Pendiente</span>';
					}else{
						$arrData[$i]['status'] = '<span class="badge badge-success">Entregado</span>';
					}

					/*if($arrData[$i]['tipo_sorteo'] == 1)
					{
						$arrData[$i]['tipo_sorteo'] = "Sorteo Semanal";
					}else if($arrData[$i]['tipo_sorteo'] == 2){
						$arrData[$i]['tipo_sorteo'] = "Sorteo Especialttt";
					}else if($arrData[$i]['tipo_sorteo'] == 3){
						$arrData[$i]['tipo_sorteo'] = "Rifa de productos";
					}*/

					$arrData[$i]['nombresc'] = $arrData[$i]['nombres'].' '.$arrData[$i]['apellidos'];

					
					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idsorteo'].')" title="Ver ganador"><i class="far fa-eye"></i></button>';
					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idsorteo'].')" title="Editar ganador"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idsorteo'].')" title="Eliminar ganador"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['opciones'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				/*dep($arrData);
				die();*/
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setImage(){
			/*dep($_POST);
			dep($_FILES);
			die();*/

			/*$arrResponse = array('status' => true, 'imgname' => "img_32d232323.jpg");
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();*/

			if($_POST){
				
				//$_POST['idapoyo'] = 1;
				if(empty($_POST['idganador'])){
					$arrResponse = array('status' => false, 'msg' => 'Error de dato.');
				}else{
					$idGanador = intval($_POST['idganador']);
					$foto      = $_FILES['foto'];
					$imgNombre = 'win_'.md5(date('d-m-Y H:i:s')).'.jpg';
					$request_image = $this->model->insertImageGanador($idGanador,$imgNombre);
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
				if(empty($_POST['idsorteo']) || empty($_POST['file'])){
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					//Eliminar de la DB
					$idSorteo = intval($_POST['idsorteo']);
					$imgNombre  = strClean($_POST['file']);
					$request_image = $this->model->deleteImage($idSorteo,$imgNombre);

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

		public function delSorteo(){
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdsorteo = intval($_POST['idSorteo']);
					$requestDelete = $this->model->deleteSorteo($intIdsorteo);
					if($requestDelete)
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el sorteo');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el sorteo.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

		public function getSelectSorteos(){
			$htmlOptions = "";
			$arrData = $this->model->selectSorteos();
			/*dep($arrData);
			die();*/
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idproducto'].'">'.$arrData[$i]['nombre'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}

		/*public function getSelectSorteos(){
			$htmlOptions = "";
			$arrData = $this->model->selectSorteos();
			
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idsorteo'].'">'.$arrData[$i]['sorteo'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();	
		}*/

			

				
	}

 ?>
<?php 

	class Roles extends Controllers{
		public function __construct(){
			parent::__construct();
			session_start();
			if(empty($_SESSION['login'])){ // Bloqueamos el acceso por barra de direcciones y se accedera solo con sesiones activas
				header('location: '.base_url().'/login');
			}
			getPermisos(MROLES);// Corresponde al numero en la BD/Tabla Modulo->idmodulo
		}

		public function roles(){

			if(empty($_SESSION['permisosMod']['r'])){ //Restringir en Permisos
				header("Location:".base_url().'/dashboard');
			}			
			
			$data['page_tag'] = "Roles Usuario - ".NOMBRE_EMPRESA;
			$data['page_title'] = "ROLES - <small>".NOMBRE_EMPRESA."</small>";
			$data['page_name'] = "rol_usuario";
			$data['page_functions_js'] = "functions_roles.js";			
			$this->views->getView($this,"roles",$data);
		}

		public function getRoles(){

			if($_SESSION['permisosMod']['r']){
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				$arrData = $this->model->selectRoles();

				for ($i=0; $i < count($arrData); $i++) {	

					if($arrData[$i]['status'] == 1){

						$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
					} else {

						$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
					} 

					if($_SESSION['permisosMod']['u']){
						$btnView = '<button class="btn btn-secondary btn-sm btnPermisosRol" onClick="fntPermisos('.$arrData[$i]['idrol'].')" title="Permisos"><i class="fas fa-key"></i></button>';
						$btnEdit = '<button class="btn btn-primary btn-sm btnEditRol" onClick="fntEditRol('.$arrData[$i]['idrol'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelRol" onClick="fntDelRol('.$arrData[$i]['idrol'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
						</div>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getSelectRoles(){
			$htmlOptions = "";
			$arrData = $this->model->selectRoles();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idrol'].'">'.$arrData[$i]['nombrerol'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();
		}

		public function getRol(int $idrol){
			if($_SESSION['permisosMod']['r']){
			$intIdrol = intval(strClean($idrol));//Evita inyecciones SQL y confirma que sea un entero
			if($intIdrol > 0){
				$arrData = $this->model->selectRol($intIdrol);
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

		public function setRol(){ //Con esto podremos almacenar un nuevo Rol

			$intIdrol = intval($_POST['idRol']);
			$strRol = strClean($_POST['txtNombre']); // Con strClean limpiamos para 
			$strDescripcion = strClean($_POST['txtDescripcion']); //evitar inyecciones SQL
			$intStatus = intval($_POST['listStatus']);			
			$request_rol = "";
			if($intIdrol == 0) {
				if($_SESSION['permisosMod']['w']){
					$request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);//Enviamos informacion al modelo, enviamos parametros
					$option = 1;
				}
			}else{
				//Actualizar
				if($_SESSION['permisosMod']['u']){
					$request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescripcion, $intStatus);//Enviamos informacion al modelo, enviamos parametros
					$option = 2;
				}
			}

			if($request_rol > 0){

				if($option == 1){
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados exitosamente.');
				}else{
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados exitosamente.');
				}

			} else if($request_rol == 'exist'){

				$arrResponse = array('status' => false, 'msg' => '¡Atencion!, El Rol ya existe');

			} else {

				$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				
			}
			
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die(); //Con "die" detenemos o cerramos el proceso de este metodo

		}


		public function delRol(){
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdrol = intval($_POST['idrol']);
					$requestDelete = $this->model->deleteRol($intIdrol);
					if($requestDelete == 'ok'){
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el rol');
					}else if($requestDelete == 'exist'){
						$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Rol asociado a usuarios.');
					}else {
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Rol');
					} 
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			} 
			die();
		}		
	}

 ?>
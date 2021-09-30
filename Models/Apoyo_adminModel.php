<?php /*Todos los modelos deben crearse con la primera letra mayuscula*/

	class Apoyo_adminModel extends Mysql{
		private $intIdApoyo;
		private $strNombreOrg;
		private $intCodigoOrg;
		private $strResponsable;
		private $intCedula;
		private $intTelefono;
		private $strDescripcionOrg;
		private $intSorteoId;
		private $intStatus;
		private $strImagen;


		public function __construct(){
			 parent::__construct();
		}

		

		public function selectProductos()
		{
			$sql = "SELECT * FROM producto 
					WHERE status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectApoyos(){
			$sql = "SELECT apo.idapoyo,
							apo.nombre_org,
							apo.codigo,
							apo.responsable,
							apo.cedula,
							apo.telefono,
							p.nombre as producto,
							apo.descripcion_org,
							apo.status
					FROM apoyo apo
					INNER JOIN producto p
					ON apo.productoid = p.idproducto
					WHERE apo.status != 0 ";
					$request = $this->select_all($sql);
			return $request;
		}
			
		public function insertApoyo(string $nombre_org, int $codigo, string $responsable, int $cedula, int $telefono, string $descripcion_org, int $productoid, int $status){
			$this->strNombreOrg = $nombre_org;
			$this->intCodigoOrg = $codigo;
			$this->strResponsable = $responsable;
			$this->intCedula = $cedula;
			$this->intTelefono = $telefono;
			$this->strDescripcionOrg = $descripcion_org;
			/*$this->strTituloApoyo = $titulo_apoyo;*/
			$this->intSorteoId = $productoid;
			$this->intStatus = $status;			
			//WHERE categoriaid = '{$this->intSorteoId}'
			$return = 0;
			$sql = "SELECT * FROM apoyo WHERE codigo = '{$this->intCodigoOrg}'";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$query_insert  = "INSERT INTO apoyo(nombre_org,
													codigo,
													responsable,
													cedula,
													telefono,
													descripcion_org,
													/*titulo_apoyo,*/
													productoid,
													status
													) 
								  VALUES(?,?,?,?,?,?,?,?)";
	        	$arrData = array($this->strNombreOrg,
        						$this->intCodigoOrg,
								$this->strResponsable,
								$this->intCedula,
								$this->intTelefono,
								$this->strDescripcionOrg,
								/*$this->strTituloApoyo,*/
								$this->intSorteoId,
								$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}

		public function updateApoyo(int $idapoyo, string $nombre_org, int $codigo, string $responsable, int $cedula, int $telefono, string $descripcion_org, int $productoid, int $status){
			$this->intIdApoyo = $idapoyo;
			$this->strNombreOrg = $nombre_org;
			$this->intCodigoOrg = $codigo;
			$this->strResponsable = $responsable;
			$this->intCedula = $cedula;
			$this->intTelefono = $telefono;
			$this->strDescripcionOrg = $descripcion_org;
			/*$this->strTituloApoyo = $titulo_apoyo;*/
			$this->intSorteoId = $productoid;
			$this->intStatus = $status;			
			//WHERE categoriaid = '{$this->intSorteoId}'
			$return = 0;
			$sql = "SELECT * FROM apoyo WHERE codigo = '{$this->intCodigoOrg}' AND idapoyo != $this->intIdApoyo";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql  = "UPDATE apoyo 
						 SET nombre_org=?,
						 	 codigo=?,
						 	 responsable=?,
							 cedula=?,
							 telefono=?,
							 descripcion_org=?,
							 /*titulo_apoyo=?,*/
							 productoid=?,
							 status=?
							 WHERE idapoyo = $this->intIdApoyo ";
	        	$arrData = array($this->strNombreOrg,
        						$this->intCodigoOrg,
								$this->strResponsable,
								$this->intCedula,
								$this->intTelefono,
								$this->strDescripcionOrg,
								/*$this->strTituloApoyo,*/
								$this->intSorteoId,
								$this->intStatus);
	        	$request = $this->update($sql,$arrData);
	        	$return = $request;
			}else{
				$return = "exist";
			}
	        return $return;
		}


		public function selectApoyo(int $idapoyo){
			$this->intIdApoyo = $idapoyo;
			$sql = "SELECT  apo.idapoyo,
							apo.nombre_org,
							apo.codigo,
							apo.responsable,
							apo.cedula,
							apo.telefono,
							apo.productoid,
							apo.descripcion_org,
							p.nombre as producto,
							apo.status
					FROM apoyo apo
					INNER JOIN producto p
					ON p.idproducto = apo.productoid
					WHERE idapoyo = $this->intIdApoyo";
			$request = $this->select($sql);
			return $request;
		}

		public function insertImageApoyo(int $idapoyo, string $imagen){
			$this->intIdApoyo = $idapoyo;
			$this->strImagen = $imagen;
			$query_insert  = "INSERT INTO imagen(apoyoid,img) VALUES(?,?)";
	        $arrData = array($this->intIdApoyo,
        					$this->strImagen);
	        $request_insert = $this->insert($query_insert,$arrData);
	        return $request_insert;
		}

		public function selectImages(int $idapoyo){
			$this->intIdApoyo = $idapoyo;
			$sql = "SELECT apoyoid,img
					FROM imagen
					WHERE apoyoid = $this->intIdApoyo";
			$request = $this->select_all($sql);
			return $request;
		}

		public function deleteImage(int $idapoyo, string $imagen){
			$this->intIdApoyo = $idapoyo;
			$this->strImagen = $imagen;
			$query  = "DELETE FROM imagen 
						WHERE apoyoid = $this->intIdApoyo 
						AND img = '{$this->strImagen}'";
	        $request_delete = $this->delete($query);
	        return $request_delete;
		}

		public function deleteApoyo(int $idapoyo){
			$this->intIdApoyo = $idapoyo;
			$sql = "UPDATE apoyo SET status = ? WHERE idapoyo = $this->intIdApoyo ";
			$arrData = array(0);//Al tener estatus cero seran marcados como eliminados
			$request = $this->update($sql,$arrData);
			return $request;
		}


	}

 ?>
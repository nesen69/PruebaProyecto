<?php /*Todos los modelos deben crearse con la primera letra mayuscula*/

	class Fundaciones_adminModel extends Mysql{
		//private $intIdApoyo;
		
	private $intFundacion;
	private $strNombre;
	private $intCodigo;
	private $strPremio;
	private $strFecha;
	private $strDireccion;
	private $intStatus;
	private $strDescripcion;
	private $idBeneficio;
	private $strToken;
	private $intTipoId;


		public function __construct(){
			 parent::__construct();
		}


		public function selectFundacion($idbeneficio)
		{
		$this->idBeneficio = $idbeneficio;
			$sql = "SELECT id_beneficio,
						nombre_org,
						codigo,premio,
						DATE_FORMAT(fecha_entrega, '%d/%m/%Y') as fecha,
						direccion,
						descripcion,
						status 
					FROM funda_beneficiada 
					WHERE status != 0 AND id_beneficio = $this->idBeneficio" ;
			$request = $this->select($sql);
			return $request;
		}

		public function insertFundacion(string $nombre, int $codigo, string $premio, string $direccion, string $descripcion, int $estado){

		$this->strNombre = $nombre;
		$this->intCodigo = $codigo;
		$this->strPremio = $premio;
		$this->strDireccion = $direccion;
		$this->strDescripcion = $descripcion;
		$this->intStatus = $estado;

			$return = 0;
			$query_insert  = "INSERT INTO funda_beneficiada(nombre_org,
												codigo,
												premio,
												direccion,
												descripcion,
												status) 
							  VALUES(?,?,?,?,?,?)";
        	$arrData = array($this->strNombre,
    						$this->intCodigo,
							$this->strPremio,
							$this->strDireccion,
							$this->strDescripcion,
							$this->intStatus);
        	$request_insert = $this->insert($query_insert,$arrData);
        	$return = $request_insert;
		
        return $return;
	}

	public function selectFundaciones(){
		
		$sql = "SELECT id_beneficio,
						nombre_org,
						codigo,
						premio,
						DATE_FORMAT(fecha_entrega, '%d/%m/%Y') as fecha,
						direccion,
						descripcion,
						status 
						FROM funda_beneficiada WHERE status != 0 ";
			$request = $this->select_all($sql);
		return $request;
	}

	public function insertImageFundacion(int $idfundacion, string $imagen){
			$this->intIdFundacion = $idfundacion;
			$this->strImagen = $imagen;
			$query_insert  = "INSERT INTO imagen(beneficio_id,img) VALUES(?,?)";
	        $arrData = array($this->intIdFundacion,
        					$this->strImagen);
	        $request_insert = $this->insert($query_insert,$arrData);
	        return $request_insert;
	}

	public function updateFundacion(int $idfundacion, string $nombre, int $codigo, string $premio, string $direccion, string $descripcion, int $estado){

		$this->intIdFundacion = $idfundacion;
		$this->strNombre = $nombre;
		$this->intCodigo = $codigo;
		$this->strPremio = $premio;
		$this->strDireccion = $direccion;
		$this->strDescripcion = $descripcion;
		$this->intStatus = $estado;
		$return = 0;

		$sql  = "UPDATE funda_beneficiada SET nombre_org=?,
											codigo=?,
											premio=?,
											direccion=?,
											descripcion=?,
											status=?
				 WHERE id_beneficio = $this->intIdFundacion ";
		$arrData = array($this->strNombre,
						$this->intCodigo,
						$this->strPremio,
						$this->strDireccion,
						$this->strDescripcion,
						$this->intStatus);
		$request = $this->update($sql,$arrData);
		$return = $request;

		return $return;
	}

	

	public function selectImages(int $idbeneficio){
			$this->intIdBeneficio = $idbeneficio;
			$sql = "SELECT beneficio_id,img
					FROM imagen
					WHERE beneficio_id = $this->intIdBeneficio";
			$request = $this->select_all($sql);
			return $request;
		}

		public function deleteImage(int $idbeneficio, string $imagen){
			$this->intIdBeneficio = $idbeneficio;
			$this->strImagen = $imagen;
			$query  = "DELETE FROM imagen 
						WHERE beneficio_id = $this->intIdBeneficio 
						AND img = '{$this->strImagen}'";
	        $request_delete = $this->delete($query);
	        return $request_delete;
		}

		public function deleteFundacion(int $idbeneficio){
			$this->intIdBeneficio = $idbeneficio;
			$sql = "UPDATE funda_beneficiada SET status = ? WHERE id_beneficio = $this->intIdBeneficio ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}

/*	public function selectGanadores(){
		
		$sql = "SELECT s.idsorteo,
						s.direccion,
						s.premio,
						s.status,
						p.idpersona,
						p.nombres,
						p.apellidos,
						p.identificacion,
						p.telefono,
						p.email_user
		FROM sorteo s 
		INNER JOIN persona p
		ON s.personaid = p.idpersona
		WHERE s.status != 0 ";
			$request = $this->select_all($sql);
		return $request;
	}

	public function selectGanador($idsorteo){
		$this->idsorteo = $idsorteo;
		//$this->idpersona = $personaid;
		$sql = "SELECT s.idsorteo,
						s.personaid,
						s.direccion,
						s.premio,
						s.fecha,
						s.status,
						p.idpersona,
						p.nombres,
						p.apellidos,
						p.identificacion,
						p.telefono,
						p.email_user 
		FROM sorteo s 
		INNER JOIN persona p
		ON s.personaid = p.idpersona
		WHERE s.status != 0 AND s.idsorteo = $this->idsorteo" ;
		$request = $this->select($sql);
		return $request;
	}

	public function selectGanador($idsorteo){
		$this->idsorteo = $idsorteo;
		$sql = "SELECT s.idsorteo, 
						s.personaid, 
						CONCAT(s.nombre,' ',s.apellido) as nombres, 
						s.cedula, 
						s.telefono, 
						s.email, 
						s.direccion, 
						 
						s.premio, 
						s.fecha, 
						pro.nombre as sorteo, 
						s.status 
						FROM sorteo s 
						INNER JOIN producto pro 
						ON s.productoid = pro.idproducto 
						WHERE s.status != 0 AND s.idsorteo = $this->idsorteo" ;
		$request = $this->select($sql);
		return $request;
	}

	public function insertImageGanador(int $idganador, string $imagen){
			$this->intIdGanador = $idganador;
			$this->strImagen = $imagen;
			$query_insert  = "INSERT INTO imagen(sorteoid,img) VALUES(?,?)";
	        $arrData = array($this->intIdGanador,
        					$this->strImagen);
	        $request_insert = $this->insert($query_insert,$arrData);
	        return $request_insert;
	}
	



	

	public function selectSorteos()
		{
			$sql = "SELECT * FROM producto 
					WHERE status != 0 AND status != 2";
			$request = $this->select_all($sql);
			return $request;
		}*/

	/*public function selectSorteos()
		{
			$sql = "SELECT s.idsorteo, 
						s.personaid, 
						s.productoid, 
						CONCAT(s.nombre,' ',s.apellido) as nombres, 
						s.cedula, 
						s.telefono, 
						s.email, 
						s.direccion, 
						s.tipo_sorteo, 
						s.premio, 
						s.fecha, 
						pro.nombre as sorteo, 
						s.status 
						FROM sorteo s 
						INNER JOIN producto pro 
						ON s.productoid = pro.idproducto 
						WHERE s.status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}*/



	}

 ?>
<?php /*Todos los modelos deben crearse con la primera letra mayuscula*/

	class Ganadores_adminModel extends Mysql{
		//private $intIdApoyo;
		
	private $intIdUsuario;
	private $strIdentificacion;
	private $strNombre;
	private $strApellido;
	private $intTelefono;
	private $strEmail;
	private $strPassword;
	private $strToken;
	private $intTipoId;
	private $intStatus;
	private $strNit;
	private $strNomFiscal;
	private $strDirFiscal;
	private $intIdPersona;
	private $idsorteo;

		public function __construct(){
			 parent::__construct();
		}

		

		public function selectCliente($identificacion)
		{
		$this->cedula = $identificacion;
			$sql = "SELECT * FROM persona 
					WHERE status != 0 AND identificacion = $this->cedula" ;
			$request = $this->select($sql);
			return $request;
		}

		public function insertGanador(int $idpersona, string $direccion, string $premio, int $estado){

		$this->intIdPersona = $idpersona;
		$this->strDireccion = $direccion;
		$this->strNombrePremio = $premio;
		$this->intListStatus = $estado;

			$return = 0;
			$query_insert  = "INSERT INTO sorteo(personaid,
												direccion,
												premio,
												status) 
							  VALUES(?,?,?,?)";
        	$arrData = array($this->intIdPersona,
    						$this->strDireccion,
							$this->strNombrePremio,
							$this->intListStatus);
        	$request_insert = $this->insert($query_insert,$arrData);
        	$return = $request_insert;
		
        return $return;
	}

	public function updateGanador(int $idsorteo, string $direccion,  string $premio, int $estado){
			
			$this->intIdSorteo = $idsorteo;
			$this->strDireccion = $direccion;
			$this->strNombrePremio = $premio;
			$this->intListStatus = $estado;
			$return = 0;
			
				$sql  = "UPDATE sorteo 
						 SET direccion=?,
							 premio=?,
							 status=?
							 WHERE idsorteo = $this->intIdSorteo ";
	        	$arrData = array($this->strDireccion,
								$this->strNombrePremio,
								$this->intListStatus);
	        	$request = $this->update($sql,$arrData);
	        	$return = $request;
			
	        return $return;
		}

	public function selectGanadores(){
		
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

	/*public function selectGanador($idsorteo){
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
	}*/

	public function insertImageGanador(int $idganador, string $imagen){
			$this->intIdGanador = $idganador;
			$this->strImagen = $imagen;
			$query_insert  = "INSERT INTO imagen(sorteoid,img) VALUES(?,?)";
	        $arrData = array($this->intIdGanador,
        					$this->strImagen);
	        $request_insert = $this->insert($query_insert,$arrData);
	        return $request_insert;
		}
	public function selectImages(int $idsorteo){
			$this->intIdSorteo = $idsorteo;
			$sql = "SELECT sorteoid,img
					FROM imagen
					WHERE sorteoid = $this->intIdSorteo";
			$request = $this->select_all($sql);
			return $request;
		}

	public function deleteImage(int $idsorteo, string $imagen){
			$this->intIdSorteo = $idsorteo;
			$this->strImagen = $imagen;
			$query  = "DELETE FROM imagen 
						WHERE sorteoid = $this->intIdSorteo 
						AND img = '{$this->strImagen}'";
	        $request_delete = $this->delete($query);
	        return $request_delete;
		}

	public function deleteSorteo(int $idsorteo){
		$this->intIdSorteo = $idsorteo;
		$sql = "UPDATE sorteo SET status = ? WHERE idsorteo = $this->intIdSorteo ";
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		return $request;
	}

	public function selectSorteos()
		{
			$sql = "SELECT * FROM producto 
					WHERE status != 0 AND status != 2";
			$request = $this->select_all($sql);
			return $request;
		}

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
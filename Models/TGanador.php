<?php 
require_once("Libraries/Core/Mysql.php");
trait TGanador{
	private $con;
	private $intIdGanador;
	private $intIdSorteo;

public function getGanadoresT(){
		$this->con = new Mysql();
		$sql = "SELECT s.idsorteo,
					s.direccion,
					s.premio,
					DATE_FORMAT(s.fecha,'%d/%m/%Y') AS fechaSimple,
					s.status,
					CONCAT(p.nombres,' ',p.apellidos) as nombres,
					p.identificacion as cedula,
					p.telefono
				FROM sorteo s 
				INNER JOIN persona p 
				ON s.personaid = p.idpersona
				WHERE s.status != 0";
				$request = $this->con->select_all($sql);
				if(count($request) > 0){
					for ($c=0; $c < count($request) ; $c++) { 
						$intIdSorteo = $request[$c]['idsorteo'];
						$sqlImg = "SELECT img
								FROM imagen
								WHERE sorteoid = $intIdSorteo";
						$arrImg = $this->con->select_all($sqlImg);
						if(count($arrImg) > 0){
							for ($i=0; $i < count($arrImg); $i++) { 
								$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
							}
						}
						$request[$c]['images'] = $arrImg;
					}
				}
		return $request;
	}


}
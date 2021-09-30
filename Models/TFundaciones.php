<?php 
require_once("Libraries/Core/Mysql.php");
trait TFundaciones{
	private $con;
	private $intIdFundacion;

public function getFundacionesT(){
		$this->con = new Mysql();
		$sql = "SELECT id_beneficio,
						nombre_org,
						codigo,
						premio,
						DATE_FORMAT(fecha_entrega,'%d/%m/%Y') AS fecha,
						direccion,
						descripcion,
						status
				FROM funda_beneficiada
				WHERE status != 0";
				$request = $this->con->select_all($sql);
				if(count($request) > 0){
					for ($c=0; $c < count($request) ; $c++) { 
						$intIdFundacion = $request[$c]['id_beneficio'];
						$sqlImg = "SELECT img
								FROM imagen
								WHERE beneficio_id = $intIdFundacion";
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
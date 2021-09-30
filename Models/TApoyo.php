<?php 
require_once("Libraries/Core/Mysql.php");
trait TApoyo{
	private $con;
	private $intIdApoyo;



	/*public function getApoyosT(){
		$this->con = new Mysql();
		//$this->intIdApoyo = $idapoyo;
		//$this->strRuta = $ruta;
		$sql = "SELECT apo.idapoyo,
						apo.nombre_org,
						apo.codigo,
						apo.responsable,
						apo.cedula,
						apo.telefono,
						apo.descripcion_org,
						apo.productoid,
						p.nombre as producto,
						p.ruta,						
						apo.status						
				FROM apoyo apo 
				INNER JOIN producto p
				ON apo.productoid = p.idproducto
				WHERE apo.status != 0 AND apo.status != 2";
				$request = $this->con->select_all($sql);
				if(count($request) > 0){
					for ($c=0; $c < count($request) ; $c++) { 
						$intIdApoyo = $request[$c]['idapoyo'];
						$sqlImg = "SELECT img
								FROM imagen
								WHERE apoyoid = $intIdApoyo";
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
	}*/

}
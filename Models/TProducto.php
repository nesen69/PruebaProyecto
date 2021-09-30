<?php 
require_once("Libraries/Core/Mysql.php");
trait TProducto{
	private $con;
	private $strCategoria;
	private $intIdcategoria;
	private $intIdProducto;
	private $strProducto;
	private $cant;
	private $option;
	private $strRuta;
	private $strRutaCategoria;
	
	public function getProductosT(){//Extrae lo productos que se muestran en el controlador-vista Home
		$this->con = new Mysql();
		$sql = "SELECT p.idproducto,
						p.codigo,
						p.nombre,
						p.descripcion,
						p.categoriaid,
						DATE_FORMAT(p.fecha_sorteo,'%d/%m/%Y %H:%i') AS fecha_sorteo,
						c.nombre as categoria,
						p.precio,
						p.ruta,
						p.stock
				FROM producto p 
				INNER JOIN categoria c
				ON p.categoriaid = c.idcategoria
				WHERE p.status = 1 ORDER BY p.idproducto DESC LIMIT ".CANTPRODHOME;
				$request = $this->con->select_all($sql);
				if(count($request) > 0){
					for ($c=0; $c < count($request) ; $c++) { 
						$intIdProducto = $request[$c]['idproducto'];
						$sqlImg = "SELECT img
								FROM imagen
								WHERE productoid = $intIdProducto";
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

	public function getProductosPage($desde,$porpagina){//Extrae lo productos que se muestran en el controlador-vista tienda
		$this->con = new Mysql();
		/*echo*/ $sql = "SELECT p.idproducto,
						p.codigo,
						p.nombre,
						p.descripcion,
						p.categoriaid,
						c.nombre as categoria,
						p.precio,
						p.ruta,
						p.stock
				FROM producto p 
				INNER JOIN categoria c
				ON p.categoriaid = c.idcategoria
				WHERE p.status = 1 ORDER BY p.idproducto DESC LIMIT $desde,$porpagina";
				/*exit;*/ 
				$request = $this->con->select_all($sql);
				if(count($request) > 0){
					for ($c=0; $c < count($request) ; $c++) { 
						$intIdProducto = $request[$c]['idproducto'];
						$sqlImg = "SELECT img
								FROM imagen
								WHERE productoid = $intIdProducto";
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

	public function getProductosCategoriaT(int $idcategoria, string $ruta, $desde = null, $porpagina = null){
		$this->intIdcategoria = $idcategoria;
		$this->strRuta = $ruta;

		$where = "";
		if(is_numeric($desde) AND is_numeric($porpagina)){
			$where = " LIMIT ".$desde.",".$porpagina;
		}

		$this->con = new Mysql();
		$sql_cat = "SELECT idcategoria, nombre, ruta FROM categoria WHERE idcategoria = '{$this->intIdcategoria}'";
		$request = $this->con->select($sql_cat);

		if(!empty($request)){
			$this->strCategoria = $request['nombre'];
			$this->strRutaCategoria = $request['ruta'];
			$sql = "SELECT p.idproducto,
							p.codigo,
							p.nombre,
							p.descripcion,
							p.categoriaid,
							c.nombre as categoria,
							p.precio,
							p.ruta,
							p.stock
					FROM producto p 
					INNER JOIN categoria c
					ON p.categoriaid = c.idcategoria
					WHERE p.status != 0 AND p.status != 2 AND p.categoriaid = $this->intIdcategoria AND c.ruta = '{$this->strRuta}' ORDER BY p.idproducto DESC ".$where;
					$request = $this->con->select_all($sql);
					if(count($request) > 0){
						for ($c=0; $c < count($request) ; $c++) { 
							$intIdProducto = $request[$c]['idproducto'];
							$sqlImg = "SELECT img
									FROM imagen
									WHERE productoid = $intIdProducto";
							$arrImg = $this->con->select_all($sqlImg);
							if(count($arrImg) > 0){
								for ($i=0; $i < count($arrImg); $i++) { 
									$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
								}
							}
							$request[$c]['images'] = $arrImg;
						}
					}

					$request = array('idcategoria' => $this->intIdcategoria,
										'ruta' => $this->strRutaCategoria,
										'categoria' => $this->strCategoria, 
										'productos' => $request);

		}
		return $request;
	}

	public function getProductoT(int $idproducto, string $ruta){
		$this->con = new Mysql();
		$this->intIdProducto = $idproducto;
		$this->strRuta = $ruta;
		$sql = "SELECT p.idproducto,
						p.codigo,
						p.nombre,
						p.descripcion,
						p.descripcion_corta,
						p.categoriaid,
						c.nombre as categoria,						
						c.ruta as ruta_categoria,
						p.precio,
						p.ruta,
						p.stock,
						p.status
				FROM producto p 
				INNER JOIN categoria c
				ON p.categoriaid = c.idcategoria
				WHERE p.status != 0 AND p.idproducto = '{$this->intIdProducto}' AND p.ruta = '{$this->strRuta}' ";
				$request = $this->con->select($sql);
				if(!empty($request)){
					$intIdProducto = $request['idproducto'];
					$sqlImg = "SELECT img
							FROM imagen
							WHERE productoid = $intIdProducto";
					$arrImg = $this->con->select_all($sqlImg);
					if(count($arrImg) > 0){
						for ($i=0; $i < count($arrImg); $i++) { 
							$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
						}
					}else{
						$arrImg[0]['url_image'] = media().'/images/uploads/product.png';
					}
					$request['images'] = $arrImg;
				}
		return $request;
	}

	public function getProductoIDT(int $idproducto){
		$this->con = new Mysql();
		$this->intIdProducto = $idproducto;
		$sql = "SELECT p.idproducto,
		p.codigo,
		p.nombre,
		p.descripcion,
		p.categoriaid,
		c.nombre as categoria,
		p.precio,
		p.ruta,
		p.stock
		FROM producto p 
		INNER JOIN categoria c
		ON p.categoriaid = c.idcategoria
		WHERE p.status != 0 AND p.idproducto = '{$this->intIdProducto}' ";
		$request = $this->con->select($sql);
		if(!empty($request)){
			$intIdProducto = $request['idproducto'];
			$sqlImg = "SELECT img
			FROM imagen
			WHERE productoid = $intIdProducto";
			$arrImg = $this->con->select_all($sqlImg);
			if(count($arrImg) > 0){
				for ($i=0; $i < count($arrImg); $i++) { 
					$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
				}
			}else{
				$arrImg[0]['url_image'] = media().'/images/uploads/product.png';
			}
			$request['images'] = $arrImg;
		}
		return $request;
	}

	public function cantProductos($categoria = null){
		$where = " ";
		if($categoria != null){
			$where = " AND categoriaid = ".$categoria;
		}
		$this->con = new Mysql();
		$sql = "SELECT COUNT(*) as total_registro FROM producto WHERE status = 1 ".$where;
		$result_register = $this->con->select($sql);
		$total_registro = $result_register;
		return $total_registro;
	}

	public function totalRecaudado(){
		
		$sql = "SELECT det.productoid, det.precio, SUM(det.cantidad) as cantidadtotal, pro.status, ped.status 
		FROM detalle_pedido det
		INNER JOIN producto pro
		ON det.productoid = pro.idproducto
        INNER JOIN pedido ped
        ON det.pedidoid = ped.idpedido
		WHERE pro.status = 1 AND ped.status = 'Pagado'
        GROUP BY det.productoid ORDER BY pro.idproducto DESC";
		$request = $this->con->select_all($sql);
		return $request;
	}

	public function cantProdSearch($busqueda){
		
		$this->con = new Mysql();
		$sql = "SELECT COUNT(*) as total_registro FROM producto WHERE nombre LIKE '%$busqueda%' AND status = 1 ";
		/*echo $sql = "SELECT COUNT(*) as total_registro FROM producto WHERE nombre LIKE '%$busqueda%' AND status = 1 ";*///Funciona colocando tambien un DEP en el ontrolador ejm 
		/*exit;*/
		$result_register = $this->con->select($sql);
		$total_registro = $result_register;
		return $total_registro;
	}

	public function getProdSearch($busqueda,$desde,$porpagina){//Extrae lo productos que se muestran en el controlador-vista tienda
		$this->con = new Mysql();
		/*echo*/ $sql = "SELECT p.idproducto,
						p.codigo,
						p.nombre,
						p.descripcion,
						p.categoriaid,
						c.nombre as categoria,
						p.precio,
						p.ruta,
						p.stock
				FROM producto p 
				INNER JOIN categoria c
				ON p.categoriaid = c.idcategoria
				WHERE p.status = 1 AND p.nombre LIKE '%$busqueda%' ORDER BY p.idproducto DESC LIMIT $desde,$porpagina";
				/*exit;*/ 
				$request = $this->con->select_all($sql);
				if(count($request) > 0){
					for ($c=0; $c < count($request) ; $c++) { 
						$intIdProducto = $request[$c]['idproducto'];
						$sqlImg = "SELECT img
								FROM imagen
								WHERE productoid = $intIdProducto";
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

	public function getApoyosT(){
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
	}
}

 ?>
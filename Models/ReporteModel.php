<?php 

	class ReporteModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}


		public function selectReportes(){
			
			$sql = "SELECT pro.idproducto,
					pro.nombre as nombrepro,
					pro.precio,
					det.id,
					det.cantidad,
					per.identificacion,
					per.nombres,
					per.apellidos,
					per.telefono,
					per.email_user,
					DATE_FORMAT(ped.fecha, '%d/%m/%Y') as fecha,
					ped.referenciacobro,
					ped.idtransaccionpaypal,
                    cat.nombre as nombrecat
			FROM persona per
			INNER JOIN pedido ped
			ON per.idpersona = ped.personaid
			INNER JOIN detalle_pedido det
			ON det.pedidoid = ped.idpedido
            INNER JOIN producto pro
            ON pro.idproducto = det.productoid
            INNER JOIN categoria cat
            ON cat.idcategoria = pro.categoriaid
            WHERE pro.status != 0 AND ped.status = 'Pagado'";
					$request = $this->select_all($sql);
					return $request;
		}

public function selectReporte($busqueda){
			
			$sql = "SELECT pro.idproducto,
					pro.nombre as nombrepro,
					pro.precio,
					det.id,
					det.cantidad,
					per.identificacion,
					per.nombres,
					per.apellidos,
					per.telefono,
					per.email_user,
					DATE_FORMAT(ped.fecha, '%d/%m/%Y') as fecha,
					ped.referenciacobro,
					ped.idtransaccionpaypal,
                    cat.nombre as nombrecat
			FROM persona per
			INNER JOIN pedido ped
			ON per.idpersona = ped.personaid
			INNER JOIN detalle_pedido det
			ON det.pedidoid = ped.idpedido
            INNER JOIN producto pro
            ON pro.idproducto = det.productoid
            INNER JOIN categoria cat
            ON cat.idcategoria = pro.categoriaid
            WHERE pro.nombre LIKE '%$busqueda%' OR
            		per.nombres LIKE '%$busqueda%' OR
            		per.apellidos LIKE '%$busqueda%' OR 
            		per.identificacion LIKE '%$busqueda%' OR 
            		cat.nombre LIKE '%$busqueda%' 
            AND pro.status != 0 AND ped.status = 'Pagado'";
					$request = $this->select_all($sql);
					return $request;
		}

	}
?>
<?php 

class Contacto_adminModel extends Mysql{

	public function selectContacto_admin(){

		$sql = "SELECT id, nombre, email, DATE_FORMAT(datecreated, '%d/%m/%Y') as fecha 
		FROM contacto ORDER BY id DESC";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectMensaje(int $idmensaje){
		$sql = "SELECT id, nombre, email, DATE_FORMAT(datecreated, '%d/%m/%Y') as fecha, mensaje 
		FROM contacto WHERE id = {$idmensaje}";
		$request = $this->select($sql);
		return $request;
	}
}


?>
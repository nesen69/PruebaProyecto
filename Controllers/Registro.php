<?php 

class Registro extends Controllers{

	public function __construct(){
		parent::__construct();
		session_start();
		if(isset($_SESSION['login'])){
			header("Location:".base_url().'/dashboard');
		}
	}

	public function registro(){
		$data['page_tag'] = "Registro";
		$data['page_title'] = "Registro";
		$data['page_name'] = "registro";
		$data['page_functions_js'] = "functions_registro.js";
		$data['page_registro_js'] = "functions_admin.js";
		$this->views->getView($this,"registro",$data);
	}
}
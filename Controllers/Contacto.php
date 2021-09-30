<?php 

	class Contacto extends Controllers{
		public function __construct(){
			parent::__construct();
			session_start();
		}

		public function contacto(){
			
			$data['page_tag'] = "Contacto - ".NOMBRE_EMPRESA;
			$data['page_title'] = "Contacto - ".NOMBRE_EMPRESA;
			$data['page_name'] = "contacto";
			$this->views->getView($this,"contacto",$data);
		}		
	}

?>
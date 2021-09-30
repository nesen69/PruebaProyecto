<?php 

	class Privacidad extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function privacidad(){
			$data['page_tag'] = "Politicas de Privacidad - ".NOMBRE_EMPRESA;
			$data['page_title'] = "Politicas de Privacidad - <small>".NOMBRE_EMPRESA."</small>";
			$data['page_name'] = "privacidad";
			$data['page_slogan'] = '"Todos los dias se aprende algo nuevo".';
			
			$this->views->getView($this,"privacidad",$data);
		}		

		
		
	}

 ?>
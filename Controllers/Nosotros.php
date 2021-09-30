<?php 

	class Nosotros extends Controllers{
		public function __construct(){
			parent::__construct();
			session_start();	
		}

		public function nosotros(){
			
				$data['page_tag'] = "Nosotros";
				$data['page_title'] = "Nosotros - <small>".NOMBRE_EMPRESA."</small>";
				$data['page_name'] = "nosotros";
				$this->views->getView($this,"nosotros",$data);  
		}		
		
	}

 ?>
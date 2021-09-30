<?php 

	class Terminos extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function terminos(){
			$data['page_id'] = 2;
			$data['page_tag'] = "Terminos y condiciones - IDIOMAS";
			$data['page_title'] = "Terminos - IDIOMAS de Trina";
			$data['page_name'] = "terminos";
			$data['page_slogan'] = '"Todos los dias se aprende algo nuevo".';
			
			$this->views->getView($this,"terminos",$data);
		}		

		
		
	}

 ?>
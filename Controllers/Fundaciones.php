<?php 

	require_once("Models/TFundaciones.php");
	class Fundaciones extends Controllers{
		use TFundaciones;
		public function __construct(){
			parent::__construct();			
		}

		public function fundaciones(){
			
			$data['page_tag'] = "Donaciones";
			$data['page_title'] = "Donaciones";
			$data['page_name'] = "fundaciones";
			$data['fundaciones'] = $this->getFundacionesT();
			$this->views->getView($this,"fundaciones",$data);
		}
				
	}

 ?>
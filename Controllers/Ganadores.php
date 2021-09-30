<?php 

	require_once("Models/TGanador.php");
	class Ganadores extends Controllers{
		use TGanador;
		public function __construct(){
			parent::__construct();			
		}

		public function ganadores(){			
			$data['page_tag'] = "Ganadores";
			$data['page_title'] = "Ganadores";
			$data['page_name'] = "ganadores";
			$data['ganadores'] = $this->getGanadoresT();
			$this->views->getView($this,"ganadores",$data);
		}				
	}

 ?>
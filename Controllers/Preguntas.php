<?php 

/*	require_once("Models/TProducto.php");*/
	class Preguntas extends Controllers{
/*		use TProducto;*/
		public function __construct(){
			parent::__construct();
			session_start();
		}

		public function preguntas(){
			
			$data['page_tag'] = "Preguntas - ".NOMBRE_EMPRESA;
			$data['page_title'] = "Preguntas - ".NOMBRE_EMPRESA;
			$data['page_name'] = "preguntas";
/*			$data['productos'] = $this->getProductosT();*/
			$this->views->getView($this,"preguntas",$data);
		}

				
	}

 ?>
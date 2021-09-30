<?php 
	require_once("Models/TCategoria.php");
	require_once("Models/TProducto.php");
	class Home extends Controllers{
		use TCategoria, TProducto;
		public function __construct()
		{
			parent::__construct();
			session_start();
		}

		public function home(){
			$data['page_tag'] = NOMBRE_EMPRESA;
			$data['page_title'] = NOMBRE_EMPRESA;
			$data['page_name'] = "home";
			$data['slider'] = $this->getCategoriasT(CAT_SLIDER);
			$data['banner'] = $this->getCategoriasT(CAT_BANNER);
			$data['productos'] = $this->getProductosT();
			$data['recaudado'] = $this->totalRecaudado();
			$data['apoyo'] = $this->getApoyosT();
			
			for ($i=0; $i <count($data['recaudado']) ; $i++) { 
				$data['recaudado'][$i]['totalrecaudado'] = 0;
					$data['recaudado'][$i]['totalrecaudado'] = $data['recaudado'][$i]['precio']*$data['recaudado'][$i]['cantidadtotal'];
			}			
			$this->views->getView($this,"home",$data);
		}

	}
 ?>

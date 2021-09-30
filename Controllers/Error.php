<?php 

class Errors extends Controllers{
	public function __construct(){
		parent::__construct();
	}

	public function notFound(){
		$data['page_tag'] = "Error";
		$data['page_title'] = "Error - <small>".NOMBRE_EMPRESA."</small>";
		$data['page_name'] = "error";
		$this->views->getView($this,"error",$data);
	}
}

$notFound = new Errors();
$notFound->notFound();

?>
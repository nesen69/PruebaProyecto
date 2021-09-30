<?php 

	class Controllers{

		public function __construct(){
			
			$this->locadModel();
			$this->views = new Views();
		}

		public function locadModel(){

			$model = get_class($this)."Model";
			$routClass = "Models/".$model.".php";
			if(file_exists($routClass)){
				require_once($routClass);
				$this->model = new $model();
			}
		} 
	}

 ?>
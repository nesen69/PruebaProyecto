<?php 

	class Mysql extends Conexion{
		private $conexion;
		private $strquery;
		private $arrValues;

		function __construct(){
			$this->conexion = new Conexion();
			$this->conexion = $this->conexion->conect();
		}
		//Insertar un registro
		public function insert(string $query, array $arrValues){
			$this->strquery = $query;
			$this->arrValues = $arrValues;

			$insert = $this->conexion->prepare($this->strquery);
			$resInsert = $insert->execute($this->arrValues); // Ejecuta las instrucciones SQL

			if ($resInsert) {
				$lastInsert = $this->conexion->lastInsertId();
			} else {
				$lastInsert = 0;
			}
			return $lastInsert;
		}

		public function select(string $query){
			$this->strquery = $query;
			$result = $this->conexion->prepare($this->strquery);
			$result->execute();
			$data = $result->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		public function select_all(string $query){
			$this->strquery = $query;
			$result = $this->conexion->prepare($this->strquery);
			$result->execute();
			$data = $result->fetchall(PDO::FETCH_ASSOC);
			return $data;
		}

		public function update(string $query, array $arrValues){
			$this->strquery = $query;
			$this->arravalues = $arrValues;
			$update = $this->conexion->prepare($this->strquery);
			$resExecute = $update->execute($this->arravalues);
			return $resExecute;
		}

		public function delete(string $query){
			$this->strquery = $query;
			$result = $this->conexion->prepare($this->strquery);
			$del = $result->execute();
			return $del;
		}


	}

 ?>
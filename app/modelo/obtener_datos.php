<?php
	include_once(__dir__."/BD_conexion.php");

	class GetDatos extends conexion_bd
	{
		public function selectQuery($query){
			$datos = array();
		
			if(!$this->esta_conectado){
				$this->conectar();
			}

			$consulta =  $this->consultar($query);

			if($this->numero_filas($consulta)){
				while($arreglo = $consulta->fetch_assoc()){
					$datos[]   = $arreglo;
				}
			}

			return $datos;
		}

		public function getLastInsert(){
			return $this->conexion->insert_id;
		}

		public function insert_query($query){
			if(!$this->esta_conectado){
				$this->conectar();
			}

			$consulta = $this->consultar($query);

			return $this->getLastInsert();
		}

		public function update_query($query){
			if(!$this->esta_conectado){
				$this->conectar();
			}

			$consulta = $this->consultar($query);

			return true;
		}

		public function delete_query($query){
			if(!$this->esta_conectado){
				$this->conectar();
			}

			$consulta = $this->consultar($query);

			return true;
		}
	}
?>
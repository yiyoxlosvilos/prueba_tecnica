<?php 
	class conexion_bd
	{
		protected $conexion;
		protected $esta_conectado = false;

		public function conectar(){
			$this->conexion = new mysqli("localhost","root","","login_usuarios");

			if ($this->conexion->connect_errno) {
				echo "Error de conexion".$this->conexion->connect_error;

				$this->isConnected = false;
			} else {
				$this->isConnected = true;
			}

			return $this->isConnected;
		}

		public function consultar($sql){
			$result = $this->conexion->query($sql);

			if ($this->conexion->errno) {
				echo "Error mysql:".$this->conexion->error;
			}
			return $result;
		}

		public function numero_filas($result){
			return $result->num_rows;
		}

		public function select_mysqli($query) {
	        $con    = mysqli_connect("localhost","root","","login_usuarios")or die("connection failed".mysqli_errno());

	        $result = mysqli_query($con, $query);

	        return $result;
	    }
	}
?>
<?php
	if(!class_exists("Funciones")){
		include("funciones.php");
	}

	class Conexion{
		private $baseDatos;
		private $usuario;
		private $clave;
		private $servidor;
		private $conexion;
		private $puerto;
		private $logs;

		public function __construct($logs){
			$this->baseDatos = 'monsters';
			$this->usuario = 'root';
			$this->clave = '';
			$this->servidor = 'localhost';
			$this->puerto = '3306';
			$this->logs = $logs;
		}

		public function parametros($baseDatos, $usuario, $clave, $servidor, $puerto = 3306){
			$this->baseDatos = $baseDatos;
			$this->usuario = $usuario;
			$this->clave = $clave;
			$this->servidor = $servidor;
			$this->puerto = $puerto;
		}

		public function conectar(){
			$mysqli = new mysqli($this->servidor, $this->usuario, $this->clave, $this->baseDatos, $this->puerto);
			if( $mysqli->connect_error ){
				Funciones::Logs("ConexionDB", $this->logs, "Error de conexion: ( ".$mysqli->connect_errno. ") ".$mysqli->connect_error);
				die("Error de conexion: ( ".$mysqli->connect_errno." ) ".$mysqli->connect_error);
				$this->conexion = false;
				return false;
			}else{
				$this->conexion = $mysqli;
				$this->conexion->set_charset('utf8');
				return true;
			}
		}

		public function ejecutarConsulta($sql){
			$resultado = $this->conexion->query($sql);

			if($resultado){
				return $resultado;
			}else{
				Funciones::Logs("consultaDB", $this->logs, "Error en el query: ( ".$this->conexion->error." ) ".$sql);
					die("Error en el query: ( ".$this->conexion->error." ) ".$sql);
			}
		}

		public function __destruct(){
			if( $this->conexion ){
				$this->conexion->close();
			}
		}
	}

	$conexion = new Conexion('../logs/');
	$conexion->conectar();


	
	/*
	print_r($resultado->num_rows);
	if($resultado->num_rows > 0){
		foreach ($resultado as $fila) {
			echo "<pre>";
			print_r($fila);
			echo "</pre>";
		}
	*/
	
	
?>
<?php
abstract class DBAbstractModel {
	
	private static $db_host = 'localhost';
	private static $db_user = 'adminjose';
	private static $db_pass = 'Adm1nj0s3';
	//protected $db_name = 'dbUsuarios';
	protected $query;
	protected $rows = array();
	private $conn;
	
	# métodos abstractos para ABM de clases que hereden
	abstract protected function get();
	//abstract protected function set();
	//abstract protected function edit();
	//abstract protected function delete();
	
	# los siguientes métodos pueden definirse y no son abstractos
	
	# Conectar a la base de datos
	private function open_connection() {
		$this->conn =new MongoClient("mongodb://{$this->db_user}:{$this->db_pass}@{$this->db_host}/{$this->db_name}");
	}
	
	# Desconectar la base de datos
	private function close_connection() {
		$this->conn->close();
	}
	
	# Ejecutar un query simple
	protected function exec_query() {
		$this->open_connection();
		$this->conn->query($this->query);
		$this->close_connection();
	}
	
	# Traer resultados de una consulta en un Array
	protected function get_results_from_query() {
		$this->open_connection();
		$result = $this->conn->query($this->query);
		while ($this->rows[] = $result->fetch_assoc());
		$result->close();
		$this->close_connection();
		array_pop($this->rows);
	}
}
?>

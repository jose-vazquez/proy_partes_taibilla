<?php


class Conexion{
	/*
		Clase para gestionar las conexiones, se le pasa al constructor
		la bbdd con la que se quiere conectar.
	*/
	
	private $db_host  	= 'localhost';
    private $username 	= 'adminjose';
    private $pwd  		= 'Adm1nj0s3';
	private $dbname;
	private $db;
	private $conn;
	
	function __construct($name){
	//	$firephp = FirePHP::getInstance(true);
		$this->dbname = $name;
		$this->_openConn();
//		$firephp->log($this->dbname);
		return $this->db;
		}
	
	//inicio ddbb ...
	private function _openConn(){
	    try{
			$firephp = FirePHP::getInstance(true);
		//	$firephp->log("mongodb://{$this->username}:{$this->pwd}@{$this->db_host}");
			$this->conn=new MongoClient("mongodb://{$this->username}:{$this->pwd}@{$this->db_host}");
			$firephp->log($this->conn->listDBs());
			$this->db = $this->conn->selectDB($this->dbname);
			$firephp->log($this->db);
		}catch (MongoCursorException $e){
			error_log($e->getMessage());
			$firephp->log('ERROR $db_name ...');
			die("Error al conectar con la base de datos ".$e.getMessage());
		}
    }
  }
?>

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
	
	function __construct($db){
		$firephp = FirePHP::getInstance(true);
		$this->dbname = $db;
		$firephp->log($db);
		$this->_initdb();
		return $this->db;
		}
	
	//inicio ddbb ...
	private function _initdb(){
	    try{
			$firephp = FirePHP::getInstance(true);
			//$firephp->log("Conectado a $this->dbname ...");
			$conn=new MongoClient("mongodb://{$this->username}:{$this->pwd}@{$this->db_host}");
			$this->db = $conn->selectDB($this->dbname  );
			$firephp->log("Conectado a $this->dbname ...");
		}catch (MongoCursorException $e){
			error_log($e->getMessage());
			$firephp->log('ERROR $db_name ...');
			die("Error al conectar con la base de datos ".$e.getMessage());
		}
    }
  }
?>
